<?php

namespace App\Lib\ShopInstall;

use App\Lib\CommanClass\SeedAppLib;
use App\Models\Shops;
use Illuminate\Support\Facades\Request;

class AppRACActivator
{
    /*
     * Activate Recurring charge if user accept payment
     *  save user selection of recurring charge
     * */
    public static function activeShopRAC($shop_id, $plan_id)
    {
        $shops = Shops::find($shop_id);

        if(empty($shops) || empty(Request::get("charge_id"))){
            return response()->json(['error'=>'Something went wrong'], 500);
        }

        $shopName = $shops->shop_name;

        self::SaveRACResponseInDB($shop_id);

        SeedAppLib::seedDefaultData($shop_id);

        $shopUpdates = array();

        $shopUpdates['plan_id'] = $plan_id;

        if(!empty($shopUpdates))
        {
            Shops::where('id', $shop_id)->update($shopUpdates);
        }

        return $shopName;
    }

    /*
     * Save Status of Recurring charge in DB
     * */
    public static function SaveRACResponseInDB($shop_id)
    {
        $shops = Shops::find($shop_id);
        $shops->payment_status = "active";
        $shops->save();
    }
}