<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserKundali extends Model
{
    use HasFactory;
    protected $table = 'user_kundalis';
    protected $fillable = [
        'shop_id',
        'customer_id',
        'name',
        'birth_date',
        'birth_time',
        'birth_place',
        'latitude',
        'longitude',
        'city',
        'state',
        'country',
        'tz',
        'style',
        'language'
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
