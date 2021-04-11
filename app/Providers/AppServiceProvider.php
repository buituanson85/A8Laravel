<?php

namespace App\Providers;

use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\Role;
use App\Models\Admin\Slider;
use App\Models\Pages\Order;
use App\Models\Pages\OrderDetails;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        $id_customer = \Auth::user()->id;
        //Admin
        $users = User::with('roles')->get();
        $roles = Role::with('users','permissions')->get();
        //Customer
        $categories = Category::all();
        $cates = Category::where('parent', 0)->get();
        $brands = Brand::all();
        $bras = Brand::where('parent', 0)->get();
        $sliders = Slider::all();

        View::share(array('users'=>$users));
        View::share(array('roles'=>$roles));
        View::share('categories', $categories);//461
        View::share('cates', $cates);
        View::share('brands', $brands);//142
        View::share('bras', $bras);
        View::share('sliders', $sliders);
//        View::share('orders_details',$orders_details);
    }
}
