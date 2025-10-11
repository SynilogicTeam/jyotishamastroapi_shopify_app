<?php

namespace App\Http\Controllers;

use App\Lib\CommanClass\SessionHelper;
use App\Lib\ShopInstall\AppAuthorizer;
use App\Lib\ShopInstall\AppInstaller;
use App\Lib\ShopInstall\AppRACActivator;
use App\Http\Controllers\Controller;
use App\Models\Settings;
use PHPShopify\AuthHelper;
use PHPShopify\ShopifySDK;
use App\Models\Shops;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log; 

class AppInstallationController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function installShopifyApp()
    {
        $shop = Request::get('shop');
        
        ShopifySDK::config(AppInstaller::getAppConfig($shop));
        if (!AuthHelper::verifyShopifyRequest())
        {
            return response("<h1>Invalid Request</h1>", 500) ;
        }

        $shopName = AppInstaller::getShopNameFromString($shop);
        $shopData = AppInstaller::getShopData($shopName);
        Log::alert(env('App_Scope') . ' - scope app installation');
        /*
         * Install App if not exist in DB
         * */
        if(empty($shopData) || (!empty($shopData) && ($shopData->version < env("App_Version")) || $shopData->payment_status!='active'))
        {
            ShopifySDK::config(AppInstaller::getAppConfig($shopName));
            $response = AuthHelper::createAuthRequest(env('App_Scope'), url('/shop/auth'), null, null, true);

            return view("partials.RedirectToRAC", ['url' => $response]);
            
        }
        
        SessionHelper::setShopSession($shopData);

        Session::put('host', Request::get("host"));

        return view('pages.dash_skeleton');
    }

    public function AuthorizeShopifyApp()
    {
        $input = Request::all();

        SessionHelper::setHost($input['host']);
        
        $response = AppAuthorizer::AuthorizeShopifyRequest($input);
        
        if ($response instanceof JsonResponse)
        {
            $responseData = $response->getData(true);
        
            if (isset($responseData['url'])) {
                return redirect($responseData['url']);
            }
        
            return $response;
        }

        return $response;
    }

    public function ActivateShopifyRACCharge($shop_id, $plan_id)
    {
        AppRACActivator::activeShopRAC($shop_id, $plan_id);

        $shops = Shops::find($shop_id)->toArray();
        
        SessionHelper::setShopSession($shops);

        /* Save Credits in DB for Plans 2, 3, 5, 6 */
        Settings::updateOrCreate(
            ['shop_id' => $shop_id, 'key' => 'plan_credits'],
            ['value' => env('Plan_'.$plan_id.'_Credits')]
        );

        /* Generate Metafields for kundali widgets */
        AppController::CreateMeta();

        return view('pages.dash_skeleton');
    }
    
    public function SubscribePlan($plan_id, $shop_id)
    {
        Session::put('host', Request::get("host"));
        $host =Request::get("host");

        $response = AppAuthorizer::makeRecurringCharge($shop_id, $plan_id, $host);

        if ($response instanceof JsonResponse)
        {
            $responseData = $response->getData(true);
        
            if (isset($responseData['url']))
            {
                return redirect($responseData['url']);
            }
        
            return $response;
        }

        return $response;
    }

    public function ShowNewUsersPricingTable($shop_id)
    {
        $plan = Shops::where('id', session('shop_id'))->where('is_active', 1)->first(['plan_id']);

        $plan_id = !empty($plan['plan_id']) ? $plan['plan_id'] : 1;

        Session::put('host', Request::get("host"));
        Session::put('shop_id', $shop_id);

        return view('layouts/default', ['content' => view('pages/pricing', compact('plan_id'))]);
    }
}
