<?php

namespace App\Http\Middleware;

use App\Lib\CommanClass\SessionHelper;
use App\Lib\ShopInstall\AppInstaller;
use App\Models\Settings;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class VerifySessionToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public static function base64UrlEncode($data)
    {
        $base64 = base64_encode($data);
        $base64Url = strtr($base64, '+/', '-_');
        return rtrim($base64Url, '=');
    }

    public function handle(Request $request, Closure $next): Response
    {
        // \Log::info("MIDDLEWARE: VerifySessionToken");
        // \Log::info($request);

        // return $next($request);

        $excludedRoutes = [
            'shopify/login',  
            'shop/install',
            'shop/auth',
            'shop/rac/*/*',
          	'shopify/install',
            'shopify/auth',
            'shopify/rac/*/*',
            'plan/*/*',
            'pricing/*',
            'webhook/*/*',
            'check-credits',
          	'check-panchang-credits',
            'check-remaining-credits',
            'skeleton/dashboard',
            'generate/checkout-url/*',
            'get-user-details',
            'kundali/save-user-details',
            'get-user-matching-details',
            'kundali-matching/save-user-details',
        ];

        // Check if the current request path is in the excluded routes
        foreach ($excludedRoutes as $route) {
        if (Str::is($route, $request->path())) {
            return $next($request);
        }
    }
        // \Log::info("MIDDLEWARE: VerifySessionToken ------------". $request->path());

       if(!empty($request['id_token']) )
        {
            $hmac_header = 'Bearer '.$request['id_token'];
        }
        else
        {
            // Get the authorization header and handle potential duplicates
            $auth_header = app('request')->header('Authorization');
            
            
            // If there are multiple Bearer tokens (duplicate headers), take only the second one
            if ($auth_header && strpos($auth_header, 'Bearer ') === 0) {
                // Split by comma and space to handle multiple Bearer tokens
                $parts = explode(', Bearer ', $auth_header);
                
                if (count($parts) > 1) {
                    // Take the second Bearer token
                    $hmac_header = 'Bearer '.$parts[1];
                    // Log the duplicate for debugging
                    // Log::warning('Duplicate X-Shopify-Authorization headers detected. Using second token only.');
                } else {
                    $hmac_header = $auth_header;
                }
            } else {
                $hmac_header = $auth_header;
            }
        }
        
        if (empty($hmac_header) || ($hmac_header == "Bearer undefined"))
        {
            $referer = $request->header('Referer');
            
            if ($referer)
            {
                $parsedUrl = parse_url($referer);
                if (isset($parsedUrl['query'])) {
                    parse_str($parsedUrl['query'], $queryParams);
                }
                $hmac_header = !empty($queryParams['id_token']) ? 'Bearer '.$queryParams['id_token'] : '';
            }
        }

        
        // \Log::info($hmac_header);

        if (!empty($hmac_header))
        {
            $payload = explode('.', $hmac_header);

            /* Remove Bearer from token */

            $payload_0_pos = explode(' ', $payload[0]);

            $payload_sec = $payload[1];

            $sha256Hash = $payload_0_pos[1] . '.' . $payload[1];

            $received_signature = trim($payload[2]);

            $payload = json_decode(base64_decode($payload_sec), true);

            $shop_url = $payload['dest'];

            $calculated_hmac = self::base64UrlEncode(hash_hmac('sha256', $sha256Hash, env('App_Client_Secret'), true));

            /* 
            * Verify that the datetime (exp) value is in the future.
            * Verify that the datetime (nbf) value was in the past. (adding 5 seconds to nbf to avoid same time issue)
            * Verify that the value matches the client ID of your app.
            * Verify that the calculated hmac value matches the received signature token value.
            */

            $relaxation = 30; /* 30 seconds */

            if ((time() < ($payload['exp'] + $relaxation)) && ((time() + $relaxation) > $payload['nbf']) && ($payload['aud'] == env("App_Client_Id")) && hash_equals($calculated_hmac, $received_signature))
            {
                $shopName = AppInstaller::getShopNameFromString($shop_url);

                /* Admin Login Into Shop Code */

                if($shopName == env('AdminShop'))
                {
                    $settings = Settings::where('shop_id', 0)->where('key', 'active_shop')->first(['value']);

                    $shopName = !empty($settings['value']) ? $settings['value'] : $shopName;

                    \Session::put('is_admin_login', 1);
                }
                
                $shopData = AppInstaller::getShopData($shopName);
                
                SessionHelper::setShopSession($shopData);

                return $next($request);
            }
            else
            {
                \Log::info('Verification Failed, hmac_header: '.$hmac_header);

                return redirect()->to('shopify/login');
            }
        }
        else
        {
            \Log::info('Empty hmac_header: '.$hmac_header);

            return redirect()->to('shopify/login');
        }
    }
}
