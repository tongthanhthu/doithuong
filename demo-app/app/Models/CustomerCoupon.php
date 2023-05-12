<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerCoupon extends Model
{
    use HasFactory;

    protected $table = "customer_coupon";

    protected $fillable = [
        'name',
        'image',
        'introduce',
        'app_id',
        'status',
        'customer_id',
    ];

    public function customer()
    {
      return $this->belongsTo('App\Models\Customer', 'customer_id', 'id');
    }

}
