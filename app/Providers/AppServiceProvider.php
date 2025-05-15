<?php

namespace App\Providers;

use App\Services\User\UserService;
use App\Services\Order\OrderService;
use Illuminate\Support\ServiceProvider;
use App\Repositories\User\UserRepository;
use App\Repositories\Order\OrderRepository;
use App\Services\User\UserServiceImplement;
use App\Repositories\User\UserRepositoryImplement;
use App\Repositories\OrderRepositoryInterface;
use App\Services\OrderServiceInterface;


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

     $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
    $this->app->bind(OrderServiceInterface::class, OrderService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
