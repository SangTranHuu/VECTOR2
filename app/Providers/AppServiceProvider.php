<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use View;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $categoriesMenu = Category::createMenuCategory();
        View::share('categoriesMenu', $categoriesMenu);

        $categories = Category::getAllCategoriesOption();
        View::share('categories', $categories);

        $firstCategories = Category::where('parent_id', 0)->pluck('name', 'id');
        View::share('firstCategories', $firstCategories);

        $brands = Brand::pluck('name', 'id')->toArray();
        View::share('brands', $brands);

        $measure = config('common.measure');
        View::share('measure', $measure);

        $dataType = config('common.data_type');
        View::share('dataType', $dataType);
        $provinces = Province::all();
        $districts = District::all();
        $wards = Ward::all();
        View::share('provinces', $provinces);
        View::share('districts', $districts);
        View::share('wards', $wards);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
