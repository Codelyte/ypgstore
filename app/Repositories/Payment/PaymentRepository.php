<?php

namespace App\Repositories\Payment;

use LaravelEasyRepository\Repository;

interface PaymentRepository extends Repository{

    public function getAll();
    public function findPayment(int $id);
    public function createPayment(array $data);
    public function updatePayment(int $id, array $data);
    public function deletePayment(int $id);
}
