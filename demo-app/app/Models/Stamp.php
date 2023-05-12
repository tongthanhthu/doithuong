<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stamp extends Model
{
    use HasFactory;


    protected $table = "stamp";

    protected $fillable = [
        'many_time',
        'stamp_number',
        'app_id',
    ];

    public function imagestamp()
    {
        return $this->hasMany('App\Models\ImageStamp','stamp_id','id');
    }


}
