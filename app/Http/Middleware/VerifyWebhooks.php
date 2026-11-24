<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyWebhooks
{
    /**
     * Handle an incoming webhook request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $hmacHeader = $request->header('x-shopify-hmac-sha256');

        // Get the raw body data (Shopify sends it as JSON)
        $data = $request->getContent();

        // Verify webhook
        if (! $this->verifyWebhook($data, $hmacHeader)) {
            return response('Error! Request not verified.', 401);
        }

        return $next($request);
    }

    /**
     * Verify that the webhook is from Shopify.
     */
    protected function verifyWebhook(string $data, ?string $hmacHeader): bool
    {
        if (!$hmacHeader) {
            return false;
        }
        //\Log::alert($data);
      	//\Log::alert("data");
        // Generate HMAC using your app’s client secret
        $calculatedHmac = base64_encode(
            hash_hmac('sha256', $data, env('App_Client_Secret'), true)
        );

        // Use timing-safe comparison to avoid timing attacks
        return hash_equals($hmacHeader, $calculatedHmac);
    }
}
