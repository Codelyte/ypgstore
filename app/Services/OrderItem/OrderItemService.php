<?php

namespace App\Services\OrderItem;

use LaravelEasyRepository\BaseService;

interface OrderItemService extends BaseService{

    public function getAll();

    public function getById(int $id);

    public function createItem(array $data);

    public function updateItem(int $id, array $data);

    public function deleteItem(int $id);
}
