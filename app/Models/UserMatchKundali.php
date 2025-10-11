<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserMatchKundali extends Model
{
    use HasFactory;
    protected $table = 'user_matching_kundalis';
    protected $fillable = [
        'shop_id',
        'customer_id',
        'boy_name',
        'boy_dob',
        'boy_tob',
        'boyPob',
        'boy_lat',
        'boy_lon',
        'boy_city',
        'boy_state',
        'boy_country',
        'boy_tz',
        'girl_name',
        'girl_dob',
        'girl_tob',
        'girlPob',
        'girl_lat',
        'girl_lon',
        'girl_city',
        'girl_state',
        'girl_country',
        'girl_tz'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',

    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
