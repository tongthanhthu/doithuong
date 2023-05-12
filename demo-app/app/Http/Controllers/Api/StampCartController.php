<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerStamp;
use App\Http\Services\Api\StamCartServices;
use App\Models\App;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use App\MyApp;
use \DateTime;

class StampCartController extends Controller
{

    protected $stamCartServices;

    public function __construct(StamCartServices $stamCartServices)
    {

        $this->stamCartServices = $stamCartServices;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {

        $customerstamp = CustomerStamp::find($id);
        $app_name = $customerstamp->app->name;
        $max_stamp = $customerstamp->app->stamp->stamp_number;
        $stamp_images = $this->stamCartServices->getImage($customerstamp,$max_stamp);

        $arr = [
            'app_name' => $app_name,
            'max_stamp' => $max_stamp,
            'stamp_images' => $stamp_images
        ];

        return response()->json($arr, 201);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        try
        {
            $datetime = new DateTime();
            $now = $datetime->format('Y-m-d');
            $id = $request->app_id;
            $app = App::find($id);
            $customer = Customer::where('phone', $request->phone)->first();
            $manyTime = $app->stamp->many_time;
            $status = 'true';
            $customerStamp = $this->stamCartServices->customerStamp($app , $customer);

            if(!$customerStamp)
            {
                $customerstamp = $this->stamCartServices->createStamp($id ,$customer);

                return response()->json($status, 201);
            }
            $updateAt = $customerStamp->updated_at->format('Y-m-d');

            if($manyTime == 'false' && $updateAt == $now)
            {
                $status ='false';
                return response()->json($status, 201);
            }
            $number = $customerStamp->stamp_number;
            $customerStamp->stamp_number = $number + MyApp::ONE;
            $customerStamp->save();
            $stamp_number = $app->coupon->stamp_number;

            if($customerStamp->stamp_number % $stamp_number == MyApp::ZERO)
            {
                $coupon = $this->stamCartServices->createCoupon($customerStamp, $customer);

                return response()->json($status, 201);
            }

            return response()->json($status, 201);
        }
        catch(\exception $err)
        {
            $status ='false';

            return response()->json($status, 201);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
