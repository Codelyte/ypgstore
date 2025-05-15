<?php

namespace App\Repositories\Order;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use LaravelEasyRepository\Implementations\Eloquent;

class OrderRepositoryImplement extends Eloquent implements OrderRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected Order $model;

    public function __construct(Order $model)
    {
        $this->model = $model;
    }

   public function all()
    {
        return Order::with(['items', 'user'])->get();
    }

    public function findById(int $id)
    {
        return Order::with(['items', 'user'])->find($id);
    }

    public function createOrder(array $data)
    {
        return Order::create($data);
    }

    public function updateOrder(int $id, array $data): bool
    {
        return Order::where('id', $id)->update($data) > 0;
    }

    public function deleteOrder(int $id): bool
    {
        return Order::destroy($id) > 0;
    }
}
