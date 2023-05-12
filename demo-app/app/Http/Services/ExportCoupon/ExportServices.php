<?php

namespace App\Http\Services\ExportCoupon;
use App\Models\App;
use App\Models\CustomerCoupon;
use App\Models\Coupon;
use Illuminate\Support\Str;
use Session;

class ExportServices
{


    public function app()
    {

        return App::find(Session('id_app'));

    }


}
