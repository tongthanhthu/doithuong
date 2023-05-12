<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    use HasFactory;

    protected $table = "app";

    protected $fillable = [
        'name',
        'image',
        'status',
    ];

    public function coupon()
    {
        return $this->hasOne('App\Models\Coupon');
    }

    public function stamp()
    {
        return $this->hasOne('App\Models\Stamp');
    }

    public function imagestamp()
    {
        return $this->hasManyThrough(
            'App\Models\ImageStamp',
            'App\Models\Stamp',
            'app_id',
            'stamp_id',
            'id',
            'id'
        );

    }

}
