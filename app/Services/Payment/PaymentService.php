<?php

namespace App\Services\Payment;

use LaravelEasyRepository\BaseService;

interface PaymentService extends BaseService{

    public function getAll();
    public function findPayment(int $id);
    public function createPayment(array $data);
    public function updatePayment(int $id, array $data);
    public function deletePayment(int $id);
}
