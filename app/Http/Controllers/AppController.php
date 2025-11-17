<?php

namespace App\Http\Controllers;

use App\Lib\ShopInstall\AppAuthorizer;
use App\Http\Controllers\Controller;
use App\Lib\API\Kundali;
use App\Lib\API\Recharge;
use App\Models\KundaliPayment;
use App\Models\Settings;
use PHPShopify\ShopifySDK;
use App\Models\Shops;
use App\Models\UserKundali;
use App\Models\UserMatchKundali;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Log;
class AppController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public static function CreateShopifyObject($shop_id)
    {
        $shop = Shops::find($shop_id);
        
        $config = AppAuthorizer::returnConfig($shop->shop_name, $shop->permanent_token);
        
        $shopify = new ShopifySDK($config);

        return $shopify;
    }

    public static function CreateMeta()
    {
        $shopify = self::CreateShopifyObject(session('shop_id'));

        $query = '
            {
                shop
                {
                    id
                }
            }';

        $shop = $shopify->GraphQL->post($query);

        $shopify_shop_id = $shop['data']['shop']['id'];

        /* Get Price Format from DB */

        $currency_format = Settings::where(['shop_id' => session('shop_id'), 'key' => 'currency_format'])->first(['value']);

        $currency_format = !empty($currency_format['value']) ? $currency_format['value'] : '{{amount}}';

        /* Get Jyotisham API Key from DB */

        $api_key = Settings::where(['shop_id' => session('shop_id'), 'key' => 'jyotisham_astro_api'])->first(['value']);
        
        /* Get Kundali Price from DB */

        $expected_keys = ['small_kundali_price', 'medium_kundali_price', 'large_kundali_price', 'kundali_match_price'];

        $settings = Settings::where('shop_id', session('shop_id'))->whereIn('key', ['small_kundali_price', 'medium_kundali_price', 'large_kundali_price', 'kundali_match_price'])->pluck('value', 'key');

        foreach ($expected_keys as $key)
        {
            if (!isset($settings[$key]))
            {
                $settings[$key] = 0;
            }
        }

        $formatted_prices = [];

        foreach ($settings as $key => $price) {
            $formatted_prices[$key] = str_replace('{{amount}}', $price, $currency_format);
        }

        $formatted_prices['jyotisham_astro_api'] = !empty($api_key['value']) ? $api_key['value'] : '';

        /* Kundali Metafield */

        try
        {
            $kundali_html = view("shopify.kundali", $formatted_prices)->render();
            
            self::CreateMetaField($shopify, $kundali_html, $shopify_shop_id, "kundali");
        }
        catch (\Exception $e)
        {
            Log::error('Error creating Kundali Metafield: ' . $e->getMessage());
        }

        try
        {
            /* Kundali Matching Metafield */
    
            $kundali_matching = view("shopify.kundali_matching", $formatted_prices)->render();

            self::CreateMetaField($shopify, $kundali_matching, $shopify_shop_id, "kundali_matching");
        }
        catch (\Exception $e)
        {
            Log::error('Error creating Kundali Matching Metafield: ' . $e->getMessage());
        } 

        try
        {
            /* Panchang Metafield */

            $panchang = view("shopify.panchang", $formatted_prices)->render();

            self::CreateMetaField($shopify, $panchang, $shopify_shop_id, "panchang");
        }
        catch (\Exception $e)
        {
            Log::error('Error creating Panchang Metafield: ' . $e->getMessage());
        }
    }
    
    public function SaveKundaliPrices()
    {
        Settings::updateOrCreate(
            ['shop_id' => session('shop_id'), 'key' => 'small_kundali_price'],
            ['value' => Request::get('small_kundali_price')]
        );
        
        Settings::updateOrCreate(
            ['shop_id' => session('shop_id'), 'key' => 'medium_kundali_price'],
            ['value' => Request::get('medium_kundali_price')]
        );
        
        Settings::updateOrCreate(
            ['shop_id' => session('shop_id'), 'key' => 'large_kundali_price'],
            ['value' => Request::get('large_kundali_price')]
        );
        
        Settings::updateOrCreate(
            ['shop_id' => session('shop_id'), 'key' => 'kundali_match_price'],
            ['value' => Request::get('kundali_match_price')]
        );
        
        self::CreateMeta(); /* Generate Metafield */
    }

    public function purchasedKundalisList()
    {
        $payments = KundaliPayment::where('shop_id', session('shop_id'))
            ->orderBy('id', 'desc')
            ->get(['id','customer_id', 'order_id', 'kundali_type', 'plan_id', 'pdf_link', 'price', 'created_at']);
      Log::info('payment', ['data' => $payments]);
        $currency_format = Settings::where(['shop_id' => session('shop_id'), 'key' => 'currency_format'])->first(['value']);

        $currency_format = !empty($currency_format['value']) ? $currency_format['value'] : '';

        return view('pages.payments', compact('payments', 'currency_format'));
    }

    public function regeneratePDF()
    {
        $data = Request::all();
        $payment_id = $data['id'];
        
        try
        {
            $payment = KundaliPayment::find($payment_id);
            
            $shop = Shops::find($payment->shop_id);
                       
            $customer = [];
            
            try {
                $config = AppAuthorizer::returnConfig($shop->shop_name, $shop->permanent_token);
                $shopify = new ShopifySDK($config);
                
                $query = '
                {
                    customer(id: "gid://shopify/Customer/'.$payment->customer_id.'") {
                        firstName
                        lastName
                        email
                    }
                }';
                
                $customerResponse = $shopify->GraphQL->post($query);
                $customer = ($customerResponse['data']['customer']) ? $customerResponse['data']['customer'] : [];
            } catch (\Exception $e) {
                Log::error('Error fetching customer data: ' . $e->getMessage());
            }
                        
            $kundali=Kundali::generateKundaliPDF($payment->shop_id, $payment->kundali_id, $payment_id, $payment->plan_id, $payment->kundali_type, $customer);
           /*Log::info('kundali', ['data' => $kundali]);*/

        } catch (\Exception $e) {
            Log::error('Error regenerating PDF: ' . $e->getMessage());
        }

        return redirect()->to('kundalis')->with('success', 'PDF regenerated successfully');
    }

    public static function CreateMetaField($shopify, $html, $shopify_shop_id, $namespace)
    {
        try
        {
            $content = preg_replace('/\s+/', ' ', $html);
  
            $query = '
                mutation {
                    metafieldsSet(
                        metafields: [{
                            namespace: "'.$namespace.'",
                            key: "script",
                            value: "'.str_replace(['"', "'"], ['\"', '\''], $content).'",
                            type: "single_line_text_field",
                            ownerId: "'.$shopify_shop_id.'"
                        }]
                    ) {
                        metafields {
                            key
                            namespace
                            value
                            ownerType
                        }
                        userErrors {
                            field
                            message
                        }
                    }
                }';

            $dd = $shopify->GraphQL->post($query);

            \Log::info("Kundali Matching Metafield: " . json_encode($dd));
        }
        catch (\Exception $e)
        {
            Log::alert($e->getMessage().$e->getFile().$e->getLine()." in CreateMetaField function");
        }
    }

    public function Dashboard()
    {
      $value=SessionHelper::getCustomizerPublishStatus;
      dd($value);
        return view('pages/dashboard');
    }

    public function API_Keys()
    {
        if(env('AdminShop') == session('shop_name'))
        {
            $settings = Settings::where(['shop_id' => session('shop_id'), 'key' => 'jyotisham_astro_api'])->first(['value']);

            $jyotisham_astro_api = !empty($settings['value']) ? $settings['value'] : '';

            if(!empty($jyotisham_astro_api))
            {
                try {
                    $client = new \GuzzleHttp\Client();
                    $response = $client->post('https://jyotishamastroapi.com/api/getUserRecords', [
                        'headers' => [
                            'Accept' => 'application/json',
                            'Content-Type' => 'application/json'
                        ],
                        'json' => [
                            'apiKey' => $jyotisham_astro_api
                        ]
                    ]);

                    $api_records = json_decode($response->getBody(), true);

                    $api_records = $api_records['data'];
                }
                catch (\Exception $e)
                {
                    Log::error('Data not found for get API Key data request: ' . $e->getMessage());
                    $api_records['data'] = [];
                }
            }
            else
            {
                $api_records['data'] = [];
            }
            return view('pages/api_keys', compact('jyotisham_astro_api', 'api_records'));
        }
        else
        {
            $settings = Settings::where(['shop_id' => session('shop_id'), 'key' => 'plan_credits'])->first(['value']);

            $plan_credits = !empty($settings['value']) ? $settings['value'] : 0;

            return view('pages/api_keys', compact('plan_credits'));
        }
    }

    public function SaveAPI_Keys()
    {        
        Settings::updateOrCreate(
            ['shop_id' => session('shop_id'), 'key' => 'jyotisham_astro_api'],
            ['value' => Request::get('jyotisham_astro_api')]
        );

        self::CreateMeta(); /* Generate Metafield */

        return redirect()->to('api-keys');
    }

    public function GenerateCheckoutURL($plan_id)
    {
        $invoice_url = Recharge::CreateRechargeDraftOrder(Request::get('customerId'), Request::get('shop_id'), Request::get('kundali_id'), Request::get('kundali_type'), $plan_id);
         Log::alert($invoice_url . ' - invoice_url');

        if(empty($invoice_url))
        {
            return response()->json(['url'=> ""]);
        }

        return response()->json(['url'=>$invoice_url]);
    }

    public function SessionNotFoundLogin()
    {
        return view('pages/login');
    }

    public function getUserDetails()
    {
        $data = Request::all();

        $kundali = UserKundali::where('shop_id', $data['shop_id'])->where('customer_id', $data['customer_id'])->latest()->first();

        return $kundali ? $kundali->toArray() : [];
    }

    public function SaveKundaliUserDetails()
    {
        $data = Request::all();
        
        try
        {
            $kundaliUser = new UserKundali();
            $kundaliUser->shop_id = $data['shop_id'];
            $kundaliUser->customer_id = $data['customer_id'];
            $kundaliUser->name = $data['name'];
            $kundaliUser->birth_date = $data['birth_date'];
            $kundaliUser->birth_time = $data['birth_time'];
            $kundaliUser->birth_place = $data['birth_place'];
            $kundaliUser->latitude = $data['latitude'];
            $kundaliUser->longitude = $data['longitude'];
            $kundaliUser->city = $data['city'];
            $kundaliUser->state = $data['state'];
            $kundaliUser->country = $data['country'];
            $kundaliUser->tz = $data['tz'];
            $kundaliUser->style = $data['style'];
            $kundaliUser->language = $data['lang'];          
            $kundaliUser->save();

            return response()->json(['status' => 'success', 'kundali_id' => $kundaliUser->id, 'message' => 'Kundali user details saved successfully.']);
        }
        catch (\Exception $e)
        {
            Log::error('Error saving kundali user: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Failed to save kundali user details.']);
        }
    }

    public function getMatchingUserDetails()
    {
        $data = Request::all();

        $kundali = UserMatchKundali::where('shop_id', $data['shop_id'])->where('customer_id', $data['customer_id'])->latest()->first();

        return $kundali ? $kundali->toArray() : [];
    }

    public function SaveKundaliMatchingUserDetails()
    {
        $data = Request::all();
        
        try
        {
            $kundaliMatchUser = new UserMatchKundali();
            $kundaliMatchUser->shop_id = $data['shop_id'];
            $kundaliMatchUser->customer_id = $data['customer_id'];

            $kundaliMatchUser->boy_name = $data['boy_name'];
            $kundaliMatchUser->boy_dob = $data['boy_dob'];
            $kundaliMatchUser->boy_tob = $data['boy_tob'];
            $kundaliMatchUser->boyPob = $data['boyPob'];
            $kundaliMatchUser->boy_lat = $data['boy_lat'];
            $kundaliMatchUser->boy_lon = $data['boy_lon'];
            $kundaliMatchUser->boy_city = $data['boy_city'];
            $kundaliMatchUser->boy_state = $data['boy_state'];
            $kundaliMatchUser->boy_country = $data['boy_country'];
            $kundaliMatchUser->boy_tz = $data['boy_tz'];

            $kundaliMatchUser->girl_name = $data['girl_name'];
            $kundaliMatchUser->girl_dob = $data['girl_dob'];
            $kundaliMatchUser->girl_tob = $data['girl_tob'];
            $kundaliMatchUser->girlPob = $data['girlPob'];
            $kundaliMatchUser->girl_lat = $data['girl_lat'];
            $kundaliMatchUser->girl_lon = $data['girl_lon'];
            $kundaliMatchUser->girl_city = $data['girl_city'];
            $kundaliMatchUser->girl_state = $data['girl_state'];
            $kundaliMatchUser->girl_country = $data['girl_country'];
            $kundaliMatchUser->girl_tz = $data['girl_tz'];
                   
            $kundaliMatchUser->save();

            return response()->json(['status' => 'success', 'kundali_id' => $kundaliMatchUser->id, 'message' => 'Kundali Matching User details saved successfully.']);
        }
        catch (\Exception $e)
        {
            Log::error('Error saving kundali matching user: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Failed to save kundali matching user details.']);
        }
    }

    public function checkAPI_KeyAndDeductCredits()
    {
        $is_available = 0;

        $data = Request::all();

        $settings = Settings::where('shop_id', (int)$data['shop_id'])->where('key', 'plan_credits')->first();

        $currentCredits = (float)$settings->value;
        
        $deductAmount = (float)$data['credits'];
        
        $newCredits = $currentCredits - $deductAmount;

        if($currentCredits >= $deductAmount)
        {
            $is_available = 1;
        }

        if ($newCredits < 0) {
            $newCredits = 0;
        }

        $settings->value = $newCredits;
        $settings->save();

        return response()->json(['status' => 'success', 'is_available' => $is_available, 'new_credits' => $newCredits, 'message' => 'Credits deducted successfully.']);
    }
    public function checkAPI_KeyAndDeductCredits_Hemant()
    {
      $is_available = 0;
      $data = Request::all();
      Log::alert($data);
      $settings = Settings::where('shop_id', $data['shop_id'])
        ->where('key', 'plan_credits')
        ->first();
      if (empty($settings)) {
        return response()->json([
          'status'  => 'error',
          'message' => 'Plan credits not found for this shop.'
        ], 404);
      }

      $currentCredits = (int) $settings->value;
      $deductAmount   = isset($data['credits']) ? (int) $data['credits'] : 0;

      $newCredits = $currentCredits - $deductAmount;
      if ($currentCredits >= $deductAmount) {
        $is_available = 1;
      }
      if ($newCredits < 0) {
        $newCredits = 0;
      }
      $settings->value = $newCredits;
      $settings->save();

      return response()->json([
        'status'      => 'success',
        'is_available'=> $is_available,
        'new_credits' => $newCredits,
        'message'     => 'Credits deducted successfully.'
      ]);
    }


    public function checkCredits()
    {
        $data = Request::all();

        $settings = Settings::where('shop_id', $data['shop_id'])->where('key', 'plan_credits')->first(['value']);

        $currentCredits = $settings['value'] ?? 0;

        $is_enable_kundali = config("constants.basic_kundali_credits") + config("constants.chart_api_charge") + config("constants.dosh_api_charge") + config("constants.planet_api_charge")  + config("constants.dasha_api_charge") + config("constants.ashtakvarga_api_charge") + config("constants.ascendant_api_charge") + config("constants.rudraksh_api_charge") + config("constants.gem_api_charge") + config("constants.bhav_chalit_chart_api_charge") + config("constants.kp_detail_api_charge");
        $is_enable_kundali = ($is_enable_kundali <= $currentCredits) ? 1 : 0;
        
        $is_enable_match_kundali = config("constants.ashtakoot_match_api_charge") + config("constants.dashakoot_match_api_charge") + config("constants.aggregate_match_api_charge") + config("constants.nakshatra_match_api_charge");
        $is_enable_match_kundali = ($is_enable_match_kundali <= $currentCredits) ? 1 : 0;
        
        $is_enable_panchang = config("constants.panchang_data_api_charge");
        $is_enable_panchang = ($is_enable_panchang <= $currentCredits) ? 1 : 0;
        
        return response()->json(['is_enable_kundali' => $is_enable_kundali, 'is_enable_match_kundali' => $is_enable_match_kundali, 'is_enable_panchang' => $is_enable_panchang]);
    }
}
