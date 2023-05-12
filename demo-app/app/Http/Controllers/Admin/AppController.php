<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AppAdmin\CreateFromRequest;
use App\Http\Requests\AppAdmin\UpdateFromRequest;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use App\Http\Services\App\AppServices;
use App\Models\App;

class AppController extends Controller
{

    protected $appsevices;

    public function __construct(AppServices $appsevices)
    {

        $this->appsevices = $appsevices;

    }

    public function index()
    {

        return view('admin.app.list', [
            'title' => 'danh sách app'
        ]);

    }


    public function create()
    {

        return view('admin.app.add',[
            'title' => 'thêm app'
        ]);
    }

    public function store(CreateFromRequest $request)
    { 

         $this->appsevices->store($request);

         return redirect()->back();
    }

    public function show(App $app)
    {

        return view('admin.app.edit',[
            'title' => 'chỉnh sửa app: ' . $app->name,
            'app' => $app

        ]);

    }

    public function update(UpdateFromRequest $request ,App $app)
    {

        $this->appsevices->update($request , $app);

        return redirect('/admin/app/list');
    }
}
