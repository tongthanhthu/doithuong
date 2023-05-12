<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserAdmin\CreateFromRequest;
use App\Http\Requests\UserAdmin\UpdateFromRequest;
use App\Http\Services\User\UserServices;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userservices;

    public function __construct(UserServices $userservices)
    {

        $this->userservices = $userservices;

    }

    public function index()
    {
        
        $listUser = User::where('role','app_admin')->get();

        return view('admin.user.list',[
            'title' => 'danh sách app admin',
            'listUser' => $listUser
        ]);
    }

    public function create()
    {

        return view('admin.user.add',[
            'title' => 'thêm app admin'
        ]);
    }

    public function store(CreateFromRequest $request)
    {

        $this->userservices->store($request);

        return redirect()->back();

    }

    public function show(User $user)
    {

        return view('admin.user.edit',[
            'title' => 'sửa người dùng: '.$user->name,
            'user' => $user
        ]);
    }

    public function update(UpdateFromRequest $request ,User $user)
    {

        if($request->changePassword == "on")
        {
            $this->validate($request,[
                'password' => 'required',
            ],[
                'password.required' => 'password không được bỏ trống',
            ]);
        }

        $this->userservices->update($request , $user);

        return redirect('/admin/user/list');
    }

    public function delete(user $user)
    {
       $user->delete();
       session()->flash('success','xóa thành công tài khoản');

       return redirect('/admin/user/list');
    }
}
