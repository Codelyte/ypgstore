<?php

namespace App\Repositories\Inventory;

use LaravelEasyRepository\Repository;

interface InventoryRepository extends Repository{

  public function all();
    public function findInventory(int $id);
    public function createInventory(array $data);
    public function updateInventory(int $id, array $data);
    public function deleteInventory(int $id);
}
