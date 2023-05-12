<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login',
        ['title' => 'Đăng nhập hệ thống']);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ],[
            'name.required' => 'tên đăng nhập không được bỏ trống',
            'password.required' => 'bạn chưa nhập mật khẩu'

        ]);

        if (Auth::attempt([
            'name' => $request->input('name'),
            'password' => $request->input('password'),
            'status' => 1
        ], $request->input('remember')))
        {
            session()->put('id_app' , auth::user()->app_id);

            return redirect()->route('admin');
        }
        $request->session()->flash('error', 'đăng nhập thất bại');

        return redirect()->back();

    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

}
