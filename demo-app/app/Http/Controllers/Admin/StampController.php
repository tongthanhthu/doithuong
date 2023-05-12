<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Stamp\StampServices;
use App\Http\Requests\stamp\CreateFromRequest;
use App\Http\Requests\Stamp\CreateImageFromRequest;
use App\Http\Requests\stamp\UpdateFromRequest;
use App\Models\App;
use App\Models\Stamp;
use App\Models\ImageStamp;
use Illuminate\Http\Request;

class StampController extends Controller
{

    protected $stampservices;

    public function __construct(StampServices $stampservices)
    {
        $this->stampservices = $stampservices;

    }


    public function index()
    {

        $app = $this->stampservices->app();

        return view('admin.stamp.index',[
            'title' => 'stamp của app :'.$app->name,
            'app' => $app
        ]);

    }

    public function create()
    {

        $app = $this->stampservices->app();

        return view('admin.stamp.add',[
            'title' => 'cài đặt ngay: '.$app->name,
            'app' => $app
        ]);

    }

    public function store(UpdateFromRequest $request)
    {

        $app = $this->stampservices->app();

        if(isset($app->coupon->stamp_number))
        {
            if($request->stamp_number < $app->coupon->stamp_number)
            {
                session()->flash('error' ,'số stamp không thể bé hơn stamp coupon cần tích');

                return redirect()->route('stamp.create');
            }
        }

        $this->stampservices->store($request);

        return redirect('/admin/stamp/index');

    }

    public function show()
    {

        $app = $this->stampservices->app();

        return view('admin.stamp.edit',[
            'title' => 'sửa số stamp: '.$app->name,
            'app' => $app
        ]);

    }

    public function update(UpdateFromRequest $request , Stamp $stamp)
    {
        $app = $this->stampservices->app();

        if(isset($app->coupon->stamp_number))
        {
            if($request->stamp_number < $app->coupon->stamp_number)
            {
                session()->flash('error' ,'số stamp không thể bé hơn stamp coupon cần tích');

                return redirect()->back();
            }
        }

        $value = $this->stampservices->update($request ,$stamp);

        return redirect('/admin/stamp/index');
    }

    public function createImage()
    {

        $app = $this->stampservices->app();

        return view('admin.imagestamp.add',[
            'title' => 'thêm ảnh cho stamp '.$app->name,
            'app' => $app
        ]);
    }

    public function stroreImage(CreateImageFromRequest $request)
    {

        $app = $this->stampservices->app();
        $this->stampservices->stroreImage($request,$app);

        return redirect('/admin/stamp/index');

    }

    public function indexImage()
    {

        $app = $this->stampservices->app();

        return view('admin.imagestamp.index',[
            'title' => ' danh sách ảnh của stamp',
            'app' => $app
        ]);

    }
}
