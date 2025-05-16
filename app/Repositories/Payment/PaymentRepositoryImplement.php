<?php

namespace App\Repositories\Payment;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Payment;

class PaymentRepositoryImplement extends Eloquent implements PaymentRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected Payment $model;

    public function __construct(Payment $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function findPayment(int $id)
    {
        return $this->model->find($id);
    }

      public function createPayment(array $data)
    {
        return $this->model->create($data);
    }

    public function updatePayment(int $id, array $data)
    {
        $payment = $this->model->find($id);
        if ($payment) {
            return $payment->update($data);
        }
        return false;
    }

    public function deletePayment(int $id)
    {
        $payment = $this->model->find($id);
        if ($payment) {
            return $payment->delete();
        }
        return false;
    }
}
