<?php

namespace App\Repositories\Inventory;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Inventory;

class InventoryRepositoryImplement extends Eloquent implements InventoryRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected Inventory $model;

    public function __construct(Inventory $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function findInventory(int $id)
    {
        return $this->model->find($id);
    }

    public function createInventory(array $data)
    {
        return $this->model->create($data);
    }

    public function updateInventory(int $id, array $data)
    {
        $inventory = $this->model->find($id);
        if (!$inventory) {
            return false;
        }

        return $inventory->update($data);
    }

    public function deleteInventory(int $id)
    {
        $inventory = $this->model->find($id);
        if (!$inventory) {
            return false;
        }

        return $inventory->delete();
    }


}
