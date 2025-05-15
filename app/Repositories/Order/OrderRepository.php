<?php

namespace App\Repositories\Order;

use LaravelEasyRepository\Repository;
use Illuminate\Support\Collection;

interface OrderRepository extends Repository{

    public function all();
    public function findById(int $id);
    public function createOrder(array $data);
    public function updateOrder(int $id, array $data): bool;
    public function deleteOrder(int $id): bool;
}
