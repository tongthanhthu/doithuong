<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\ExportCoupon\ExportServices;
use App\Exports\CouponExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class CustomerCouponController extends Controller
{

    protected $exporServices;

    public function __construct(ExportServices $exporServices )
    {

        $this->exporServices = $exporServices;

    }

    public function index()
    {

        $app = $this->exporServices->app();

        return view('admin.export.index',[
            'title' => 'export coupon :'.$app->name,
        ]);
    }


    public function export(Request $request)
    {
        $date = $request->date;
        $id = Session('id_app');

        return Excel::download(new CouponExport($id,$date), $date.'send_coupon.csv');
        
    }
}
