<?php

namespace App\Exports;

use App\Invoice;
use App\Models\CustomerCoupon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;


class CouponExport implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct($id,$date)
    {
        $this->id = $id;

        $this->date = $date;
    }

    public function view(): View
    {

        $coupons = CustomerCoupon::whereDate('created_at' , $this->date)
        ->where('app_id', $this->id)->get();

        return view('admin.export.coupon', [
            'coupons' => $coupons
        ]);
    }


}
