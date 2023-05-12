<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerStamp extends Model
{
    use HasFactory;

    protected $table = "customer_stamp";

    protected $fillable = [
        'stamp_number',
        'app_id',
        'customer_id',
    ];

    public function app()
    {
      return $this->belongsTo('App\Models\App', 'app_id', 'id');
    }

    public function customer()
    {
      return $this->belongsTo('App\Models\CustomerStamp', 'customer_id', 'id');
    }
}
