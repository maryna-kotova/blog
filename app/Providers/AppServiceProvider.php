<?php

namespace App\Providers;

use App\Models\Category;
use App\Services\CartService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

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
        $this->app->bind('Cart', CartService::class);
        Paginator::useBootstrap();
        View::share('shareCategories', Category::withCount('products')->having('products_count', '>', '0')->get());
    }
}
