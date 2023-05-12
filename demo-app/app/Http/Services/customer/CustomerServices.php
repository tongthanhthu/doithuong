<?php

namespace App\Http\Services\Customer;
use App\Models\App;
use App\Models\Customer;
use App\Models\CustomerStamp;
use App\Models\CustomerCoupon;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use App\Models\Coupon;
use Illuminate\Support\Str;
use Session;
use App\MyApp;

class CustomerServices
{

    public function createStamp($id)
    {
        $customerstamp = new CustomerStamp;
        $customerstamp->app_id = $id;
        $customerstamp->customer_id = Cookie::get('id_customer');
        $customerstamp->stamp_number = MyApp::ONE;
        $customerstamp->save();

        session()->flash('success' ,'quét mã thành công ');

        return $customerstamp;
    }

    public function createCoupon($customerstamp)
    {
            $coupon = new CustomerCoupon;
            $coupon->name = $customerstamp->app->coupon->name;
            $coupon->image = $customerstamp->app->coupon->image;
            $coupon->introduce = $customerstamp->app->coupon->introduce;
            $coupon->app_id = $customerstamp->app->id;
            $coupon->status = MyApp::ONE;
            $coupon->customer_id = Cookie::get('id_customer');
            $coupon->save();

           return $coupon;


    }

    public function customerStamp($id)
    {

        return  CustomerStamp::where( 'app_id' , $id)
        ->Where('customer_id' ,Cookie::get('id_customer') )->first();

    }

    public function show($id)
    {
        return  CustomerCoupon::find($id);

    }

    public function listcoupon()
    {
        return CustomerCoupon::where('customer_id',Cookie::get('id_customer'))->get();
    }


}
