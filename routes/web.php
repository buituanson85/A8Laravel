<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalaxyController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleAddPermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SendEmailController;
use App\Http\Controllers\Admin\SliderBannerController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Pages\BrandsPagesController;
use App\Http\Controllers\Pages\CartController;
use App\Http\Controllers\Pages\CategoryPagesController;
use App\Http\Controllers\Pages\CheckOutController;
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Pages\OrderDetailsController;
use App\Http\Controllers\Pages\ProductPagesController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::resource('/', HomeController::class);

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');

//for users
Route::middleware(['auth:sanctum', 'verified'])->group(function (){
//pages
    Route::resource('/pages/checkout', CheckOutController::class);
    Route::post('/pages/save-checkout', [CheckOutController::class,'saveCheckout'])->name('pages.savecheckout');
    //payment
    Route::get('pages/payment', [CheckOutController::class,'payment'])->name('pages.payment');
    Route::get('pages/change-payment', [CheckOutController::class, 'changePayment'])->name('pages.changepayment');
    //order-place
    Route::post('/pages/order-place', [CheckOutController::class,'orderPlace'])->name('pages.orderplace');
    Route::post('/pages/payment-online', [CheckOutController::class, 'paymentOnline'])->name('pages.paymentonline');
    Route::get('/pages/payment-vnpay', [CheckOutController::class,'paymentVnpay'])->name('pages.vnpayreturn');
    Route::get('/pages/payment-handcash',[CheckOutController::class,'paymentHandcash'])->name('pages.paymenthandcash');

    //check coupon
    Route::post('/check_coupon', [CartController::class, 'checkCoupon']);
    Route::get('/delete_coupon', [CartController::class, 'deleteCoupon']);
    //History order
    Route::resource('/pages/orderDetails', OrderDetailsController::class);
});

//for admin
Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function (){
    Route::resource('/dashboard', DashboardController::class);

    //SupperAdmin
    Route::middleware(['auth:sanctum', 'verified','authsupperadmin'])->group(function (){
        //Admin
        Route::resource('/dashboards/permissions', PermissionController::class);
        Route::resource('/dashboards/roles', RoleController::class);
        Route::resource('/dashboards/roles-permissions', RoleAddPermissionController::class);

        //users
        Route::resource('/dashboards/users',UserController::class);
    });
    //Staff
    Route::middleware(['auth:sanctum', 'verified','authstaff'])->group(function (){
        //category
        Route::resource('/dashboards/categories', CategoryController::class);
        Route::get('/dashboards/categoryunlock/{id}', [CategoryController::class, 'unlockstatustcategory'])->name('admin.unlockstatustcategory');
        Route::get('/dashboards/categorylock/{id}', [CategoryController::class, 'lockstatustcategory'])->name('admin.lockstatustcategory');

        //brand
        Route::resource('/dashboards/brands',BrandController::class);
        Route::get('/dashboards/brandunlock/{id}', [BrandController::class, 'unlockstatustbrand'])->name('admin.unlockstatustbrand');
        Route::get('/dashboards/brandlock/{id}', [BrandController::class, 'lockstatustbrand'])->name('admin.lockstatustbrand');

        //product
        Route::resource('/dashboards/products', ProductController::class);
        Route::get('/dashboards/productunlock/{id}', [ProductController::class, 'unlockstatustproduct'])->name('admin.unlockstatustproduct');
        Route::get('/dashboards/productlock/{id}', [ProductController::class, 'lockstatustproduct'])->name('admin.lockstatustproduct');

        //manager orders
        Route::resource('/dashboards/orders', OrderController::class);
        //shiflt order
        Route::post('/pages/order-details-delivering', [ OrderController::class,'orderDetailsDelivering'])->name('pages.orderdetailsdelivering');
    });
    //Support
    Route::middleware(['auth:sanctum', 'verified','authsupport'])->group(function (){
        //Galaxy product
        Route::get('/dashboards/product/galaxys/{id}', [GalaxyController::class, 'galaxys'])->name('product.galaxys');
        Route::post('/dashboards/product/galaxys/{id}',[GalaxyController::class, 'store'])->name('product.storegalaxy');

        //Sliders
        Route::resource('/dashboards/sliders', SliderController::class);
        Route::get('/dashboards/sliderunlock/{id}', [SliderController::class, 'lockstatustslider'])->name('admin.unlockstatustslider');
        Route::get('/dashboards/sliderlock/{id}', [SliderController::class, 'lockstatustimage'])->name('admin.lockstatustimage');
        Route::get('/dashboards/speciesunlock/{id}', [SliderController::class, 'unlockspeciesslider'])->name('admin.unlockspeciesslider');
        Route::get('/dashboards/specieslock/{id}', [SliderController::class, 'lockspeciesslider'])->name('admin.lockspeciesslider');

        //Slider_banner
        Route::resource('/dashboards/sliderbanner', SliderBannerController::class);
        Route::get('/dashboards/sliderbannerunlock/{id}', [SliderBannerController::class, 'unlockstatustsliderbanner'])->name('admin.unlockstatustsliderbanner');
        Route::get('/dashboards/sliderbannerlock/{id}', [SliderBannerController::class, 'lockstatustsliderbanner'])->name('admin.lockstatustsliderbanner');
        //Coupon
        Route::resource('/dashboards/coupons', CouponController::class);
    });

    //profile
    Route::get('/dashboards/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('/dashboards/profile', [UserController::class,'editProfile'])->name('user.updateprofile');

    //password
    Route::get('/dashboards/password/change', [UserController::class,'getPassword'])->name('user.getpassword');
    Route::post('/dashboards/password/change', [UserController::class,'editPassword'])->name('user.editpassword');

});


//pages
Route::resource('/pages/single-products', ProductPagesController::class);
Route::resource('/pages/pages-brands', BrandsPagesController::class);
Route::resource('/pages/pages-categories', CategoryPagesController::class);
////cart
Route::post('/add-cart-ajax', [CartController::class,'addCartAjax']);
Route::get('/show-cart-ajax', [ CartController::class,'showCartAjax'])->name('pages.showcartajax');
Route::post('/update_cart_ajax', [ CartController::class,'updateCartAjax'])->name('pages.updatecartajax');
Route::get('/delete_cart_ajax/{id}', [ CartController::class,'deleteCartAjax'])->name('pages.deletecartajax');
Route::get('/del-all-product',[CartController::class,'deleteAllAjax']);

Route::get('/send-mail', [SendEmailController::class,'sendMail']);
//Route::get('/mail-example', [SendEmailController::class,'mailExample']);
