<?php

namespace App\Repositories\OrderItem;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\OrderItem;

class OrderItemRepositoryImplement extends Eloquent implements OrderItemRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected OrderItem $model;

    public function __construct(OrderItem $model)
    {
        $this->model = $model;
    }

     public function getAll()
    {
        return $this->model->with(['order', 'product'])->get();
    }

    public function getById(int $id)
    {
        return $this->model->with(['order', 'product'])->find($id);
    }

    public function createOrderItem(array $data)
    {
        return $this->model->create($data);
    }

    public function updateOrderItem(int $id, array $data): bool
    {
        $item = $this->model->find($id);
        return $item ? $item->update($data) : false;
    }

     public function deleteOrderItem(int $id): bool
    {
        return $this->model->destroy($id);
    }
}
