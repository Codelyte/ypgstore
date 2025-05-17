<?php

namespace App\Repositories\AccessGrant;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\AccessGrant;

class AccessGrantRepositoryImplement extends Eloquent implements AccessGrantRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected AccessGrant $model;

    public function __construct(AccessGrant $model)
    {
        $this->model = $model;
    }

   public function getAll()
    {
        return $this->model->all();
    }

    public function findAccessGrant(int $id)
    {
        return $this->model->find($id);
    }

    public function createAccessGrant(array $data)
    {
        return $this->model->create($data);
    }

    public function updateAccessGrant(int $id, array $data)
    {
        $accessGrant = $this->model->find($id);
        if (!$accessGrant) {
            return false;
        }

        return $accessGrant->update($data);
    }

     public function deleteAccessGrant(int $id)
    {
        $accessGrant = $this->model->find($id);
        if (!$accessGrant) {
            return false;
        }

        return $accessGrant->delete();
    }


}
