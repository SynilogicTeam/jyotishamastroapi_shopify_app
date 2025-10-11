<?php

namespace App\Lib\ShopInstall;
use \App\Models\Shops;

class AppInstaller
{

    /*
     * Get Active Shops Data
     * */
    public static function getShopData($shopName, $columns = array("*"))
    {
        $data = Shops::where('is_active', 1)->where('shop_name', $shopName)->first($columns);
        return $data;
    }

    public static function getAppConfig($shopName = '')
    {
        $config = array(
            'ShopUrl' => "$shopName.myshopify.com",
            'ApiKey' =>env('App_Client_Id'),
            'SharedSecret' =>env('App_Client_Secret'),
        );
        return $config;
    }

    public static function getShopNameFromString($shopName)
    {
        if( strpos( $shopName, ".myshopify.com" ) !== false ) {
            $shopName = explode( ".myshopify.com", $shopName);
            $shopName = preg_replace("(^https?://)", "", $shopName[0] );
        }
        return $shopName;
    }

}