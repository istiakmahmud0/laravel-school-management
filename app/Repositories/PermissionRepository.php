<?php

namespace App\Repositories;

use App\Interfaces\PermissionRepositoryInterface;
use Illuminate\Support\Collection;
use Spatie\Permission\Models\Permission;

class PermissionRepository implements PermissionRepositoryInterface
{
    /**
     * Permission Repository Constructor
     */

    public function __construct(protected Permission $model)
    {
        $this->model = $model;
    }

    /**
     * Retrieve all the permission
     */
    public function getAllPermission(): Collection
    {
        return $this->model->all();
    }
}
