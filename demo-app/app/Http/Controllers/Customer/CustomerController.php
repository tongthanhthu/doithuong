<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\App;
use App\Models\Customer;
use App\Models\CustomerStamp;
use App\Models\CustomerCoupon;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use App\Http\Services\Customer\CustomerServices;
use App\MyApp;
use \DateTime;

class CustomerController extends Controller
{


    protected $customerServices;

    public function __construct(CustomerServices $customerServices)
    {

        $this->customerServices = $customerServices;

    }

    public function index(){

        return view('customer.home',[
            'title' => 'chào mừng '
        ]);
    }


    public function update(App $app)
    {

        $datetime = new DateTime();
        $now = $datetime->format('Y-m-d');
        $manyTime = $app->stamp->many_time;
        $id = $app->id;
        $customerStamp = $this->customerServices->customerStamp($id);

        if(!$customerStamp)
        {
            $customerStamp = $this->customerServices->createStamp($id);

            return view('customer.stamp_card',[
                'title' => 'màn stamp của bạn',
                'customerStamp' => $customerStamp
            ]);
        }

        $updateAt = $customerStamp->updated_at->format('Y-m-d');

        if($manyTime == 'false' && $updateAt == $now)
        {
            session()->flash('error' ,'bạn chỉ được quét 1 lần trên ngày');

            return view('customer.stamp_card',[
                'title' => 'màn stamp của bạn',
                'customerStamp' => $customerStamp
            ]);
        }

        $number = $customerStamp->stamp_number;
        $customerStamp->stamp_number = $number + Myapp::ONE;
        $customerStamp->save();
        $stampNumber = $app->coupon->stamp_number;

        if($customerStamp->stamp_number % $stampNumber == Myapp::ZERO)
        {

            $coupon = $this->customerServices->createCoupon($customerStamp);

            return view('customer.stamp_card',[
                'title' => 'màn stamp của bạn',
                'customerStamp' => $customerStamp,
                'coupon' => $coupon
                ]);

        }

        session()->flash('success' ,'quét mã thành công ');

        return view('customer.stamp_card',[
            'title' => 'màn stamp của bạn',
            'customerStamp' => $customerStamp
        ]);

        session()->flash('error' ,'quét mã thất bại');

        return view('customer.home',[
            'title' => 'trang chủ'
        ]);

    }

    public function show($id)
    {

        $coupon = $this->customerServices->show($id);

        return view('customer.coupon.detail',[
            'title' => 'chi tiết coupon',
            'coupon' => $coupon
        ]);

    }

    public function listcoupon()
    {
        $listCoupon = $this->customerServices->listcoupon();

        return view('customer.coupon.list',[
            'title' => 'danh sách coupon của bạn',
            'listCoupon' => $listCoupon
        ]);

    }

    public function edit(CustomerCoupon $coupon)
    {

        $coupon->status = MyApp::ZERO;
        $coupon->save();
        session()->flash('success' ,'bạn đã sử dụng thành công coupon');

        return redirect()->back();

    }
}
