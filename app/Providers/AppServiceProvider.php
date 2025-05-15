<?php

namespace App\Providers;

use App\Services\User\UserService;
use App\Services\Order\OrderService;
use Illuminate\Support\ServiceProvider;
use App\Repositories\User\UserRepository;
use App\Repositories\Order\OrderRepository;
use App\Services\User\UserServiceImplement;
use App\Repositories\User\UserRepositoryImplement;

use App\Services\Order\OrderServiceImplement;
use App\Repositories\Order\OrderRepositoryImplement;


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

     // Bind Order services and repositories
        $this->app->bind(OrderService::class, OrderServiceImplement::class);
        $this->app->bind(OrderRepository::class, OrderRepositoryImplement::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
