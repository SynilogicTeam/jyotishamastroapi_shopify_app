<?php

namespace App\Models;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;

class Shops extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;
    protected $table = 'shops';

    public static function getShopUserByShopName($shopName, $columns = ["*"])
    {
        $shop = Shops::where('shop_name',$shopName)->where('is_active',1)->orderBy('id','desc')->first($columns);
        return $shop;
    }

    public function getRememberToken()
    {
        return null; // not supported
    }

    public function setRememberToken($value)
    {
        // not supported
    }

    public function getRememberTokenName()
    {
        return null; // not supported
    }

    /**
     * Overrides the method to ignore the remember token.
     */
    public function setAttribute($key, $value)
    {
        $isRememberTokenAttribute = $key == $this->getRememberTokenName();
        if (!$isRememberTokenAttribute)
        {
            parent::setAttribute($key, $value);
        }
    }


    public static function getPendingShop($shopName, $columns = array("*"))
    {
        return Shops::where('payment_status', 'pending')->where('is_active', 1)->where('shop_name', $shopName)->first($columns);
    }

    public static function getActiveShop($shopName, $columns = array("*"))
    {
        return Shops::where('is_active', 1)->where('shop_name', $shopName)->first($columns);
    }
}
