<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Vendor\VendorController;
use App\Http\Controllers\Vendor\VendorDashboardController;
use App\Http\Controllers\Vendor\CategoryController;
use App\Http\Controllers\Vendor\ProductController;
use App\Http\Controllers\Vendor\CouponController;
use App\Http\Controllers\Vendor\OrderController;

use App\Http\Controllers\Website\HomeController;

use Illuminate\Support\Facades\Artisan;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    Artisan::call('clear-compiled');
    echo '<center> Cache cleared!!</center>';    
    // return view('admin/dashboard.clear_cache');
})
  ->name('clear.all.cache');

// Route::get('/', function () {
//     return view('welcome');
// });
/*Website-------------------------------*/
  Route::get('/', [HomeController::class, 'index']);
/*End Website-------------------------------*/


Route::get('/become-vendor', [VendorController::class, 'index'])->name('vendor.signup');
Route::get('/vendor-sigin', [VendorController::class, 'signIn'])->name('vendor.signin');
Route::post('/vendor-register', [VendorController::class, 'store'])->name('vendor.store');

/*Vendor Dashboard-------------------------------*/
Route::get('/vendor/dashboard', [VendorDashboardController::class, 'dashboard'])->name('vendor.dashboard');
Route::get('/vendor/profile', [VendorDashboardController::class, 'profile'])->name('vendor.profile');
Route::get('/vendor/categories', [CategoryController::class, 'categories'])->name('vendor.categories');
Route::get('/vendor/sub-categories', [CategoryController::class, 'subcategories'])->name('vendor.subcategories');
Route::get('/vendor/product/list', [ProductController::class, 'list'])->name('vendor.prolist');
Route::get('/vendor/product/add', [ProductController::class, 'add'])->name('vendor.proadd');
Route::get('/vendor/product/edit', [ProductController::class, 'edit'])->name('vendor.proedit');

Route::get('/vendor/coupon/list', [CouponController::class, 'list'])->name('vendor.couponlist');
Route::post('/vendor/coupon/add', [CouponController::class, 'store'])->name('vendor.couponstore');

Route::get('/vendor/order/list', [OrderController::class, 'orderlist'])->name('vendor.orderlist');
/*End Vendor Dashboard-------------------------------*/
