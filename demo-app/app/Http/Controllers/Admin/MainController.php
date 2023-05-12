<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\App;
use Illuminate\Support\Facades\Auth;
use Session;

class MainController extends Controller
{

    public function index()
    {

        $role =Auth::user()->role;

        if($role == 'app_admin')
        {
            $id = Auth::user()->app_id;
            $app = app::find($id);

            return view('admin.home',['title' => 'admin quản trị','app'=> $app]);
        }

        $app = app::first();
        session()->put('id_app' , $app->id);

        return view('admin.home',['title' => 'admin quản trị','app'=> $app]);

    }

    public function search(Request $request)
    {
        $app = app::find($request->input('id'));
        $request->session()->put('id_app', $request->input('id'));

        return view('admin.home',['title' => 'admin quản trị','app'=> $app]);
    }

}
