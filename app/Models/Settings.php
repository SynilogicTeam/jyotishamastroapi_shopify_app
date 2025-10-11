<?php

namespace App\Models;
use App\Scope\ShopId;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table = 'shop_settings';
    protected $fillable = ['key', 'value', 'shop_id'];
}
