<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Coupon\CreateFromRequest;
use App\Http\Requests\Coupon\UpdateFromRequest;
use App\Http\Services\Coupon\CouponServices;
use App\Models\App;
use App\Models\Coupon;
use Illuminate\Http\Request;

use Session;

class CouponController extends Controller
{

    protected $couponsevices;

    public function __construct(CouponServices $couponsevices)
    {

        $this->couponsevices = $couponsevices;

    }

    public function index()
    {

        $app = $this->couponsevices->app();

        return view('admin.coupon.index',[
            'title' => 'coupon của '.$app->name,
            'app' => $app
        ]);

    }

    public function create()
    {

        $app = $this->couponsevices->app();

        return view('admin.coupon.add',[
            'title' => 'cài đặt coupon cho : '.$app->name,
            'app' => $app
        ]);
    }

    public function store(CreateFromRequest $request)
    {
        $app = $this->couponsevices->app();

        if(isset($app->stamp->stamp_number))
        {
            if($request->stamp_number > $app->stamp->stamp_number)
            {
                session()->flash('error' ,'số lần tích stamp không thể lớn hơn stamp hiện tại');

                return redirect()->route('coupon.create');
            }
        }
         $this->couponsevices->store($request);

         return redirect('/admin/coupon/index');
    }

    public function show()
    {
        $app = $this->couponsevices->app();

        return view('admin.coupon.edit',
        [
            'title' => ' sửa coupon cho app: '.$app->name,
            'app' => $app
        ]);

    }

    public function update(UpdateFromRequest $request , Coupon $coupon)
    {
        $app = $this->couponsevices->app();

        if(isset($app->stamp->stamp_number))
        {
            if($request->stamp_number > $app->stamp->stamp_number)
            {
                session()->flash('error' ,'số lần tích stamp không thể lớn hơn stamp hiện tại');

                return redirect()->back();
            }
        }
        $this->couponsevices->update($request ,$coupon);

        return redirect('/admin/coupon/index');
    }
}
