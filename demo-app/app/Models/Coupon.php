<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $table = "coupon";

    protected $fillable = [
        'name',
        'image',
        'introduce',
        'note',
        'stamp_number',
        'app_id',
    ];

    public function app()
    {
      return $this->belongsTo('App\Models\App', 'app_id', 'id');
    }
}
