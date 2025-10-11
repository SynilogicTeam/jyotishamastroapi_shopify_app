<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyWebhooks
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {       
        $hmac_header = $_SERVER['HTTP_X_SHOPIFY_HMAC_SHA256'];
        
        $data = file_get_contents('php://input');

        if(!$this->verify_webhook($data, $hmac_header))
        {
          /*\Log::alert("Error! Request Not Verified");*/
            echo 'Error! Request Not Verified';die;
        }
        else
        {
         /** \Log::alert($request);
          *\Log::alert("request");
          */
            return $next($request);
        }
    }

    public function verify_webhook($data, $hmac_header)
    {
      /**\Log::alert($data);
      \Log::alert("data");
      */
        $calculated_hmac = base64_encode(hash_hmac('sha256', $data, env('App_Client_Secret'), true));
        return hash_equals($hmac_header, $calculated_hmac);
    }
}
