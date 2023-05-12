<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Store\CreateStoreFromRequest;
use App\Http\Services\Store\StoreServices;
use Illuminate\Http\Request;
use App\Models\Store;


class StoreController extends Controller
{

    protected $storeSevices;

    public function __construct(StoreServices $storeSevices)
    {
        $this->storeSevices = $storeSevices;
    }

    public function index()
    {
        $app = $this->storeSevices->app();
        $listStore = Store::where('app_id',Session('id_app'))->paginate(5);

        return view('admin.store.index',[
            'title' => 'danh sach cua hàng của: '.$app->name,
            'listStore' => $listStore
        ]);

    }

    public function store(CreateStoreFromRequest $request)
    {
       $this->storeSevices->store($request);

       return redirect('/admin/store/index');
    }
}
