<?php

namespace App\Providers;

use DB;
use Log;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

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
        DB::listen(function($query) {
            Log::info(
                $query->sql,
                $query->bindings,
                $query->time
            );
        });

        Paginator::useBootstrap();

        if (Cache::has('search_categories')) {
            $search_categories = Cache::get('search_categories');
        } else {
            $search_categories = Category::all();
            Cache::put('search_categories', $search_categories);
        }

        View::share('search_categories', $search_categories);
    }
}
