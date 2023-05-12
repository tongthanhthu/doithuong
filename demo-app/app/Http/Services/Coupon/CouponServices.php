<?php

namespace App\Http\Services\Coupon;
use App\Models\App;
use App\Models\Coupon;
use Illuminate\Support\Str;
use Session;

class CouponServices
{

    public function app()
    {

        return App::find(Session('id_app'));
        
    }

    public function store($request)
    {

        try
        {
            $coupon = new coupon;
            $coupon->name = $request->input('name');
            $coupon->introduce = $request->input('introduce');
            $coupon->note = $request->input('note');
            $coupon->stamp_number = $request->input('stamp_number');
            $coupon->app_id = Session()->get('id_app');
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $image = str::random(4)."_".$name;

            while(file_exists("upload/coupon/".$image))
            {
                $image = str::random(4)."_".$name;
            }

            $file->move("upload/coupon/",$image);
            $coupon->image = $image;
            $coupon->save();

            session()->flash('success' ,'tạo coupon thành công');

        }
        catch(\exception $err)
        {
            session()->flash('error' ,'tạo coupon thất bại');
        }


    }

    public function update($request , $coupon)
    {

        try
        {
            $coupon->name = $request->input('name');
            $coupon->introduce = $request->input('introduce');
            $coupon->note = $request->input('note');
            $coupon->stamp_number = $request->input('stamp_number');
            $coupon->app_id = Session()->get('id_app');
            if($request->hasFile('image'))
            {
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                $image = str::random(4)."_".$name;

                while(file_exists("upload/coupon/".$image))
                {
                    $image = str::random(4)."_".$name;
                }

                $file->move("upload/coupon/",$image);
                unlink("upload/coupon/".$coupon->image);
                $coupon->image = $image;
            }
            $coupon->save();

            session()->flash('success' ,'cập nhật thành công');

        }
        catch(\exception $err)
        {
            session()->flash('error' ,'sửa coupon thất bại');
        }

    }



}

