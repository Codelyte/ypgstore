<?php

namespace App\Repositories\OrderItem;

use LaravelEasyRepository\Repository;

interface OrderItemRepository extends Repository{

     public function getAll();
    public function getById(int $id);
    public function createOrderItem(array $data);
    public function updateOrderItem(int $id, array $data): bool;
    public function deleteOrderItem(int $id): bool;
}
