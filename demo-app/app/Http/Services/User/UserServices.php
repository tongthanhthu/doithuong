<?php

namespace App\Http\Services\User;
use App\Models\App;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use Session;

class UserServices
{

    public function store($request)
    {
        try
        {
            User::create([
                'name' => $request->input('name'),
                'password' => Hash::make($request->input('password')),
                'app_id' => $request->input('appid'),
                'status' => $request->input('status'),
                'role' => 'app_admin'
            ]);

            session()->flash('success','tạo thành công tài khoản');

        }
        catch(\exception $err)
        {
            session()->flash('error','tạo tài khoản lỗi');
        }

    }

    public function update($request ,$user)
    {
        try
        {
            $user->name = $request->input('name');
            $user->status = $request->input('status');
            $user->app_id = $request->input('appid');
            if($request->changePassword == "on")
            {
                $user->password = Hash::make($request->input('password'));
            }
            $user->save();

            session()->flash('success' ,'cập nhật thành công');
        }
        catch(\exception $err)
        {
            session()->flash('error' ,'cập nhật lỗi');
        }

    }




}
?>
