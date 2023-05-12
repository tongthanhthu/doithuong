<?php

use App\Http\Controllers\Admin\User\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\AppController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\CustomerCouponController;
use App\Http\Controllers\Admin\StampController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\User;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Customer\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('admin/user/login', [LoginController::class, 'index'])->name('login');
Route::get('admin/user/logout', [LoginController::class, 'logout']);
Route::post('admin/user/login/store', [LoginController::class, 'store']);
//admin
Route::middleware(['auth'])->group(function () {
    Route::middleware(['checkshare'])->group(function () {

        Route::prefix('admin')->group(function () {

            Route::get('/main', [MainController::class, 'index'])->name('admin');
            Route::post('/search', [MainController::class, 'search'])->name('admin.search');
            //coupon
            Route::prefix('/coupon')->group(function () {
                route::get('/index', [CouponController::class, 'index'])->name('coupon.index');
                Route::get('/add', [CouponController::class, 'create'])->name('coupon.create');
                Route::post('/store', [CouponController::class, 'store'])->name('coupon.store');
                route::get('/edit', [CouponController::class, 'show'])->name('coupon.show');
                Route::post('/edit/{coupon}',[CouponController::class, 'update'])->name('coupon.update');
            });
             //stamp card
             Route::prefix('/stamp')->group(function () {
                route::get('/index', [StampController::class, 'index'])->name('stamp.index');
                Route::get('/add', [StampController::class, 'create'])->name('stamp.create');
                Route::post('/store', [StampController::class, 'store'])->name('stamp.store');
                route::get('/edit', [StampController::class, 'show'])->name('stamp.show');
                route::post('/edit/{stamp}', [StampController::class, 'update'])->name('stamp.update');
                //image stamp
                route::get('/image', [StampController::class, 'createImage'])->name('stamp.createImage');
                route::post('/image/store', [StampController::class, 'stroreImage'])->name('stamp.createImage.store');
                route::get('/image/index', [StampController::class, 'indexImage'])->name('stamp.indexImage');
            });
            //store
            route::prefix('/store')->group(function (){
                route::get('/index',[StoreController::class, 'index'])->name('store.index');
                route::post('/store',[StoreController::class, 'store'])->name('store.store');
            });

            //customer coupon
            route::prefix('/customer-coupon')->group(function (){
                route::get('/index',[CustomerCouponController::class, 'index'])->name('customer-coupon.index');
                route::post('/store',[CustomerCouponController::class, 'export'])->name('customer-coupon.export');

            });

            //system_admin
            Route::middleware(['checkadmin'])->group(function () {
                 //app
                Route::prefix('/app')->group(function () {
                    Route::get('/list', [AppController::class, 'index'])->name('app.list');
                    Route::get('/add', [AppController::class, 'create'])->name('app.create');
                    Route::post('/store', [AppController::class, 'store'])->name('app.store');
                    Route::get('/edit/{app}',[AppController::class, 'show'])->name('app.show');
                    Route::post('/edit/{app}',[AppController::class, 'update'])->name('app.update');
                });
                 //user
                Route::prefix('/user')->group(function () {
                    Route::get('/list', [UserController::class, 'index'])->name('user.index');
                    Route::get('/add', [UserController::class, 'create'])->name('user.create');
                    Route::post('/store', [UserController::class, 'store'])->name('user.store');
                    Route::get('/edit/{user}',[UserController::class, 'show'])->name('user.show');
                    Route::post('/edit/{user}',[UserController::class, 'update'])->name('user.update');
                    Route::get('/delete/{user}',[UserController::class, 'delete'])->name('user.delete');
                });
            });
        });
    });

});

//customer
route::get('register', [RegisterController::class,'index'])->name('register.index');
route::post('register', [RegisterController::class,'store'])->name('register.store');
route::get('home', [CustomerController::class,'index'])->name('home.index');

Route::prefix('customer')->group(function () {
    Route::middleware(['checkcustomer'])->group(function () {
        route::get('/qr/{app}', [CustomerController::class,'update']);
        route::get('list', [CustomerController::class,'listcoupon'])->name('customer.listcoupon');
        route::get('/show/{id}', [CustomerController::class,'show'])->name('customer.show');
        route::get('edit/{coupon}', [CustomerController::class,'edit'])->name('customer.edit');

    });

});
