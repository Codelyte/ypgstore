<?php

namespace App\Services\AccessGrant;

use LaravelEasyRepository\BaseService;

interface AccessGrantService extends BaseService{

    public function getAll();
    public function findAccessGrant(int $id);
    public function createAccessGrant(array $data);
    public function updateAccessGrant(int $id, array $data);
    public function deleteAccessGrant(int $id);
}
