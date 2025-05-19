<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Product\ProductService;
use App\Services\Product\ProductServiceImplement;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
       // Bind the interface to the concrete implementation
        $this->app->bind(ProductService::class, ProductServiceImplement::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
