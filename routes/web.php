<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AppInstallationController;
use App\Http\Controllers\WebhookController;
use App\Http\Middleware\VerifySessionToken;
use App\Http\Middleware\VerifyWebhooks;
use App\Models\Settings;
use App\Models\Shops;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


/*
 * Installer Controller Routes
 * */
Route::get('shop/install', [AppInstallationController::class, 'installShopifyApp']);
Route::get('shop/auth', [AppInstallationController::class, 'AuthorizeShopifyApp']);
Route::get('shop/rac/{shop_id}/{plan_id}', [AppInstallationController::class, 'ActivateShopifyRACCharge']);

Route::get('shopify/install', [AppInstallationController::class, 'installShopifyApp']);
Route::get('shopify/auth', [AppInstallationController::class, 'AuthorizeShopifyApp']);
Route::get('shopify/rac/{shop_id}/{plan_id}', [AppInstallationController::class, 'ActivateShopifyRACCharge']);

Route::get('plan/{plan_id}/{shop_id}', [AppInstallationController::class, 'SubscribePlan']);

/* WebHooks */

Route::post('webhook/{type}/{event}', [WebhookController::class, 'WebhookAllRequests'])->withoutMiddleware(VerifyCsrfToken::class)->middleware(VerifyWebhooks::class);

/* Pricing */

Route::get('pricing/{shop_id}', [AppInstallationController::class, 'ShowNewUsersPricingTable']);

Route::get('pricing', function () {

    Session::put('host', Request::get('host'));

    $plan = Shops::where('id', session('shop_id'))->where('is_active', 1)->first(['plan_id']);

    $plan_id = !empty($plan['plan_id']) ? $plan['plan_id'] : 1;

    return view('pages/pricing', compact('plan_id'));
});

/* Checkout Page */

Route::get('/generate/checkout-url/{plan_id}', [AppController::class, 'GenerateCheckoutURL']);

/* App Routes */

Route::get('skeleton/dashboard', function () {

    Session::put('host', Request::get('host'));
    
    return view('pages/dash_skeleton');
});


Route::get('dashboard', [AppController::class, 'Dashboard'])->name('dashboard');
Route::get('create-meta', [AppController::class, 'CreateMeta']);

/* Kundalis List */
Route::get('kundalis', [AppController::class, 'purchasedKundalisList']);

Route::get('regenerate-pdf', [AppController::class, 'regeneratePDF']);

Route::get('kundali-prices', function() {

    $settings = Settings::where('shop_id', session('shop_id'))->whereIn('key', ['small_kundali_price', 'medium_kundali_price', 'large_kundali_price', 'kundali_match_price'])->pluck('value', 'key');

    return view('pages/kundali_prices', compact('settings'));   
});

Route::post('save-kundali-prices', [AppController::class, 'SaveKundaliPrices'])->withoutMiddleware(VerifyCsrfToken::class);

Route::get('shopify/login',[AppController::class, 'SessionNotFoundLogin']);

/* Get & Save Kundali User Details On Front Store */
Route::get('get-user-details',[AppController::class, 'getUserDetails']);
Route::post('kundali/save-user-details',[AppController::class, 'SaveKundaliUserDetails'])->withoutMiddleware(VerifyCsrfToken::class);

/* Get & Save Kundali Matching User Details On Front Store */
Route::get('get-user-matching-details',[AppController::class, 'getMatchingUserDetails']);
Route::post('kundali-matching/save-user-details',[AppController::class, 'SaveKundaliMatchingUserDetails'])->withoutMiddleware(VerifyCsrfToken::class);

Route::get('api-keys',[AppController::class, 'API_Keys']);
Route::post('save-api-keys', [AppController::class, 'SaveAPI_Keys'])->withoutMiddleware(VerifyCsrfToken::class);

Route::post('check-credits',[AppController::class, 'checkAPI_KeyAndDeductCredits'])->withoutMiddleware(VerifyCsrfToken::class);
Route::post('check-remaining-credits',[AppController::class, 'checkCredits'])->withoutMiddleware(VerifyCsrfToken::class);
