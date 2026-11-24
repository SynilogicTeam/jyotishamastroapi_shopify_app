<?php

namespace App\Lib\ShopInstall;

use App\Http\Controllers\AppController;
use App\Lib\CommanClass\SeedAppLib;
use App\Lib\CommanClass\SessionHelper;
use App\Models\Settings;
use App\Models\Shops;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use PHPShopify\AuthHelper;
use PHPShopify\ShopifySDK;

class AppAuthorizer
{
    public static $secret;

    public function __construct()
    {
        self::$secret = env("App_Client_Secret");
    }

    /*
     * Authorize the request
     * Get Permanent Token
     * */
    public static function AuthorizeShopifyRequest($input)
    {
        $shopName = $input['shop'];

        $shopName = AppInstaller::getShopNameFromString($shopName);
        ShopifySDK::config(AppInstaller::getAppConfig($shopName));
      
      	// Check if this authorization code has already been used
        if (isset($input['code'])) {
            $codeKey = 'used_auth_code_' . md5($input['code']);
            if (cache()->has($codeKey)) {
                \Log::warning("Authorization code already used", [
                    'shop' => $shopName,
                    'code_hash' => md5($input['code'])
                ]);
                // Return a redirect to dashboard instead of error for better UX
              return view('pages.dash_skeleton');
                return response()->json(['url' => url('dashboard')]);
            }
            
            // Mark this code as used (expires in 10 minutes)
            cache()->put($codeKey, true, 600);
        }

        /*
         * Show error if authorization failed
         * */
        if(AuthHelper::verifyShopifyRequest())
        {
            $accessToken = AuthHelper::getAccessToken();

            if ($accessToken)
            {
                /*
                 * Update App version if App has been updated
                 * */
                $shops = Shops::getActiveShop($shopName, ['id', 'version']);
                
                $config = self::returnConfig($shopName, $accessToken);

                $shopify = new ShopifySDK($config);
                               
                if(!empty($shops) && $shops->version < env("App_Version"))
                {
                    self::updateShopIfActive($shopName);
              
                    return response()->json(["url" => url('dashboard')]);
                }
                
                /*
                * Save Shop details in DB
                * */
                $shop_id = self::SaveDataInDB($shops, $shopName, $accessToken);

                /*
                 * Create webhook of app/uninstalled
                 * */
                Webhooks::createWebhooks($shopify, ["APP_UNINSTALLED", "ORDERS_CREATE"]);
                
                $shops = Shops::getShopUserByShopName($shopName);

                SeedAppLib::seedDefaultData($shop_id);

                Session::put('host', Request::get("host"));
                
                SessionHelper::saveHostVariable($shop_id, Request::get("host"));

                /* Generate Metafields for kundali widgets */
                Session::put('shop_id', $shop_id);
                Session::put('plan_id', 1);
                AppController::CreateMeta();
              
              return view('pages.dash_skeleton');

                
            }
        }
        return \response()->json(['error'=>"Authorization Failed!"], 500);
    }

    /*
     * Update shop version if
     * App version has been change in env file
     * */
    public static function updateShopIfActive($shopName)
    {
        Shops::where('shop_name', $shopName)->where("payment_status", "active")->where("is_active", 1)->update(["version" => env("App_Version")]);
    }


    /*
     * Save Shop data in DB
     * Save Access Token in DB
     * */
    public static function SaveDataInDB($shopId, $shopName, $accessToken)
    {
        $shops = Shops::find(isset($shopId->id)?$shopId->id:0);

        if(empty($shops)){
          $shops = new Shops();
        }
        $shops->shop_name = $shopName;
        $shops->permanent_token = $accessToken;
        $shops->is_active = 1;

        $shops->payment_status = "active";
        $shops->plan_id = 1;
        $shops->version = env("App_Version");
        $shops->save();

        return $shops->id;
    }


    /*
     * Make Recurring Charge and redirect to accept/decline
     * */
     public static function makeRecurringCharge($shop_id, $plan_id, $host)
    {
        $shop = Shops::find($shop_id);
        $config = self::returnConfig($shop->shop_name, $shop->permanent_token);

        $shopify = new ShopifySDK($config);
        $shopName = $shop->shop_name;

        if($plan_id != 1)
        {
            $freeStores = env('FreeStores');
            $planType = env("Plan_Is_Test");

            if(!empty($freeStores))
            {
                $freeStores = explode(',', $freeStores);
                if(in_array($shopName, $freeStores))
                {
                    $planType = 1;
                }
            }

            try
            {
                $graphQL = '
                    mutation {
                        appSubscriptionCreate(
                            name: "'.env("Plan_Name_".$plan_id).'"
                            returnUrl: "'.url("shop/rac/".$shop_id."/".$plan_id).'?shop='.$shop->shop_name.'.myshopify.com"
                            trialDays: '.env("Plan_Trial_Days").'
                            test: '.(($planType == 1) ? "true" : "false").'
                            lineItems: [{
                                plan: {
                                    appRecurringPricingDetails: {
                                        price: { amount: '.env("Plan_Price_".$plan_id).', currencyCode: USD },
                                        interval: '.(($plan_id == 2 || $plan_id == 3) ? "EVERY_30_DAYS" : "ANNUAL").'
                                    }
                                }
                            }],
                        ) {
                            appSubscription {
                                id
                            }
                            confirmationUrl
                            userErrors {
                                field
                                message
                            }
                        }
                    }';

                $response = $shopify->GraphQL->post($graphQL);

                $subscription_data = Settings::where("shop_id", $shop_id)->where("key", "appSubscriptionId")->first();

                if(empty($subscription_data->value))
                {
                    $subscription_data = new Settings();
                    $subscription_data->shop_id = $shop_id;
                    $subscription_data->key = 'appSubscriptionId';
                }
                $subscription_data->value = $response['data']['appSubscriptionCreate']['appSubscription']['id'];
                $subscription_data->save();
            }
            catch (\Exception $e)
            {
                \Log::alert($e->getMessage().$e->getFile().$e->getLine());
            }

            if(isset($response['data']['appSubscriptionCreate']['confirmationUrl']))
            {
                $appSubscriptionCreate = $response['data']['appSubscriptionCreate'];

                return response()->json(["url" => $appSubscriptionCreate['confirmationUrl']]);
            }

            return response()->json(['error' => 'RAC not created'], 500);
        }
        else
        {
            try
            {
                $subscription_data = Settings::where("shop_id", $shop_id)->where("key", "appSubscriptionId")->first();

                if(!empty($subscription_data->value))
                {
                    $graphQL = '
                        mutation {
                            appSubscriptionCancel(
                                id: "'.$subscription_data->value.'"
                                prorate: true
                            
                            ) {
                                appSubscription {
                                    id
                                    status
                                }
                            }
                        }';

                    $response = $shopify->GraphQL->post($graphQL);
                }
            }
            catch (\Exception $e)
            {
                \Log::alert($e->getMessage().$e->getFile().$e->getLine());
            }

            Shops::where('id', $shop_id)->update(['payment_status' => 'active', 'plan_id' => $plan_id]);

            $shop = Shops::find($shop_id);
            SessionHelper::setShopSession($shop);

            /* Get Shop ID from Shopify */

            $query = '
                {
                    shop
                    {
                        id
                    }
                }';

            $shop = $shopify->GraphQL->post($query);

            $shopify_shop_id = $shop['data']['shop']['id'];
            
            /* Save Credits in DB for Free Plans */

            Settings::updateOrCreate(
                ['shop_id' => $shop_id, 'key' => 'plan_credits'],
                ['value' => env('Plan_'.$plan_id.'_Credits')]
            );

            return response()->json(["url" => url('dashboard')]);
        }
    }
    
    public static function returnConfig($shopName, $accessToken)
    {
        $config = array(
            'ShopUrl' => $shopName.'.myshopify.com',
            'AccessToken' => $accessToken,
            'ApiVersion' => '2025-04'
        );
        return $config;
    }
}