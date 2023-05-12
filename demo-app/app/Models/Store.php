<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $table = "store";

    protected $fillable = [
        'name',
        'address',
        'app_id',
    ];

    public function app()
    {
      return $this->belongsTo('App\Models\App', 'app_id', 'id');
    }
}
