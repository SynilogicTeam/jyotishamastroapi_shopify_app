<?php

namespace App\Lib\CommanClass;
use App\Models\Settings;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

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
}