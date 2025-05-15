<?php

namespace App\Services\Order;

use LaravelEasyRepository\BaseService;

interface OrderService extends BaseService{

     public function getAll();
    public function getById(int $id);
    public function createOrder(array $data);
    public function updateOrder(int $id, array $data);
    public function deleteOrder(int $id);

}
