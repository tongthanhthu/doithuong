<?php

namespace App\Http\Services\Store;

use App\Models\App;
use Illuminate\Support\Str;
use App\Imports\StoreImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Store;
use Illuminate\Support\Facades\DB;
use Session;


class StoreServices
{

    public function app()
    {

        return App::find(Session('id_app'));

    }

    public function store($request)
    {
        DB::beginTransaction();
        
        try
        {
            Store::where('app_id',Session('id_app'))->delete();
            Excel::import(new StoreImport, request()->file('file'));
            DB::commit();

            session()->flash('success' ,'tạo thành công');

        }
        catch(\exception $err)
        {
            DB::rollBack();

            session()->flash('error' ,'tạo store thất bại');
        }

    }

}
