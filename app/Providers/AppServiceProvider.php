<?php

namespace App\Providers;

use App\Services\User\UserService;
use Illuminate\Support\ServiceProvider;
use App\Repositories\User\UserRepository;
use App\Services\User\UserServiceImplement;
use App\Repositories\User\UserRepositoryImplement;


// ✅ Product
use App\Services\Product\ProductService;
use App\Services\Product\ProductServiceImplement;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductRepositoryImplement;



// Order
use App\Services\Order\OrderService;
use App\Services\Order\OrderServiceImplement;
use App\Repositories\Order\OrderRepository;
use App\Repositories\Order\OrderRepositoryImplement;

// ✅ Order Item
use App\Services\OrderItem\OrderItemService;
use App\Services\OrderItem\OrderItemServiceImplement;
use App\Repositories\OrderItem\OrderItemRepository;
use App\Repositories\OrderItem\OrderItemRepositoryImplement;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    $this->app->bind(UserService::class, UserServiceImplement::class);
      // ➕ Add this line
    $this->app->bind(UserRepository::class, UserRepositoryImplement::class);

         // ✅ Product bindings
        $this->app->bind(ProductService::class, ProductServiceImplement::class);
        $this->app->bind(ProductRepository::class, ProductRepositoryImplement::class);

        // Order bindings
        $this->app->bind(OrderService::class, OrderServiceImplement::class);
        $this->app->bind(OrderRepository::class, OrderRepositoryImplement::class);

        // ✅ Order Item bindings
        $this->app->bind(OrderItemService::class, OrderItemServiceImplement::class);
        $this->app->bind(OrderItemRepository::class, OrderItemRepositoryImplement::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
