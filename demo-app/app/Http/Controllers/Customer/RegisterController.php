<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Http\Requests\Register\CreateCustomerFromRequest;
use Illuminate\Support\Facades\Cookie;

class RegisterController extends Controller
{

    public function index(){

        return view('customer.register',[
            'title' => 'đăng ký thông tin '
        ]);
    }

    public function store(CreateCustomerFromRequest $request)
    {

        $check = Customer::where('phone',$request->phone)->first();

        if(!$check)
        {
            Customer::create($request->all());
            $check = Customer::where('phone',$request->phone)->first();
        }

        Cookie::queue('id_customer', $check->id, 2628000);

        if ($request->session()->has('url'))
        {
            $url = $request->session()->pull('url', 'default');

            return redirect($url);
        }

        return view('customer.home',[
            'title' => 'chào mừng: '.$check->phone,
        ]);

    }







}
