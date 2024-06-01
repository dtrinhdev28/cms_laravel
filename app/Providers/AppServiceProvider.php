<?php

namespace App\Providers;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(
        \App\Repositories\Product\ProductRepositoryInterface::class,
        \App\Repositories\Product\ProductRepository::class
    );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $category = CategoryModel::where('hidden', '1')->orderBy('order', 'desc')->get();
        View::share('category', $category);
    }
}
