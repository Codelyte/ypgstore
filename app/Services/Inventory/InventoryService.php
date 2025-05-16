<?php

namespace App\Services\Inventory;

use LaravelEasyRepository\BaseService;

interface InventoryService extends BaseService{

   public function getAll();
    public function findInventory(int $id);
    public function createInventory(array $data);
    public function updateInventory(int $id, array $data);
    public function deleteInventory(int $id);
}
