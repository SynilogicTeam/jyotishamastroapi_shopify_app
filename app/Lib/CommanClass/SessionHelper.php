<?php

namespace App\Lib\CommanClass;
use App\Models\Settings;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use App\Lib\ShopInstall\AppAuthorizer;
use GuzzleHttp\Client;

class SessionHelper
{

    /**
     * @param $shop
     * @return bool
     */
    public static function setShopSession($shop)
    {
        $shop = (object)$shop;
     
        if(empty(Session::get('host')))
        {
            Session::put('host', Request::get("host"));
        }

        Session::put('shop_name', $shop->shop_name);
        Session::put('shop_id', $shop->id);
        Session::put('plan_id', $shop->plan_id);
        
        $plan_credits = Settings::where('shop_id', $shop->id)->where('key', 'plan_credits')->first(['value']);
        
        Session::put('plan_credits', $plan_credits->value ?? 0);
        
        $email = Settings::where('shop_id', $shop->id)->where('key', 'email_from')->first(['value']);

        if(isset($email->value)){
            Session::put('shop_email', $email->value);
        }

        Session::save();

        return true;
    }

    /**
     * @param $data
     */
    public static function setMultiSession($data)
    {
        if(is_array($data)) {
            foreach($data as $key => $value){
                Session::put($key, $value);
            }
        }
        Session::save();
    }

    public static function saveHostVariable($shop_id, $host)
    {
        $data = Settings::where('shop_id', $shop_id)->where('key', 'host_variable')->first(['value']);

        if(empty($data->value))
        {
            $data = new Settings();
            $data->shop_id = $shop_id;
            $data->key = 'host_variable';
            $data->value = $host;
            $data->save();
        }
    }

    public static function setHost($host)
    {
        Session::put('host', $host);
        Session::save();

        return true;
    }
  public static function getCustomizerPublishStatus()
    {
        $enabled = false;
        $themeId = null;
 
 
        try {
            
            $config = AppAuthorizer::returnConfig(session('shop_name'), session('permanent_token'));
 
            $client = new Client();
                        
            $themesResponse = $client->get("https://{$config['ShopUrl']}/admin/api/{$config['ApiVersion']}/themes.json", [
                'headers' => [
                    'X-Shopify-Access-Token' => session('permanent_token')
                ]
            ]);
 
            $themes = json_decode($themesResponse->getBody(), true);
            
            $mainTheme = null;
 
            foreach ($themes['themes'] as $theme) {
 
                
                if ($theme['role'] === 'main') {
                    $mainTheme = $theme;
                    $themeId = basename($theme['admin_graphql_api_id']);
                    break;
                }
            }
            
            $settingsResponse = $client->get("https://{$config['ShopUrl']}/admin/api/{$config['ApiVersion']}/themes/{$mainTheme['id']}/assets.jso…, [
                'headers' => ['X-Shopify-Access-Token' => $config['AccessToken']]
            ]);
 
            $settings = json_decode($settingsResponse->getBody(), true);
 
            $data = json_decode($settings['asset']['value'] ?? '{}', true);
 
            if (isset($data['current']['blocks'])) {
                foreach ($data['current']['blocks'] as $block) {
                    if (isset($block['type']) && strpos($block['type'], env('AppEmbedUID')) !== false && ($block['disabled'] ?? false) === false) {
                        $enabled = true;
                        break;
                    }
                }
            }
        }
        catch (\Exception $e)
        {
            \Log::alert($e->getMessage().$e->getFile().$e->getLine());
            $enabled = false;
        }
 
        return array('enabled' => $enabled, 'themeId' => $themeId);
    }
}