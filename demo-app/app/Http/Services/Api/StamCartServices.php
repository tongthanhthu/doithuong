<?php

namespace App\Http\Services\Api;

use App\Models\App;
use Illuminate\Support\Str;
use App\Models\CustomerStamp;
use Illuminate\Support\Facades\Cookie;
use App\Models\CustomerCoupon;
use App\MyApp;
use Session;

class StamCartServices
{

    public function getImage($customerstamp,$max_stamp)
    {

        $number = $customerstamp->stamp_number%$max_stamp;
        $stamp_images =[];
        $image = $customerstamp->app->stamp->imagestamp;

        for($i = 0; $i < $number; $i++)
        {
            $stamp_images[$i] = url('upload/stamp/'.$image[$i]->image_change);
        }
        for($i = $number; $i < $max_stamp; $i++)
        {
            $stamp_images[$i] =url('upload/stamp/'.$image[$i]->current_image);
        }


        return $stamp_images;

    }

    public function customerStamp($app , $customer)
    {

        return  CustomerStamp::where( 'app_id' , $app->id)
        ->Where('customer_id' , $customer->id)->first();

    }

    public function createStamp($id , $customer)
    {
        dd($id);
        $customerstamp = new CustomerStamp;
        $customerstamp->app_id = $id;
        $customerstamp->customer_id = $customer->id;
        $customerstamp->stamp_number = MyApp::ONE;
        $customerstamp->save();

        return $customerstamp;
    }

    public function createCoupon($customerstamp,$customer)
    {

        $coupon = new CustomerCoupon;
        $coupon->name = $customerstamp->app->coupon->name;
        $coupon->image = $customerstamp->app->coupon->image;
        $coupon->introduce = $customerstamp->app->coupon->introduce;
        $coupon->app_id = $customerstamp->app->id;
        $coupon->status = 1;
        $coupon->customer_id = $customer->id;
        $coupon->save();

        return $coupon;


    }

}
