<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KundaliPayment extends Model
{
    use HasFactory;
    protected $fillable = [
        'shop_id',
        'customer_id',
        'kundali_id',
        'kundali_type',
        'plan_id',
        'pdf_link',
        'price'
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
