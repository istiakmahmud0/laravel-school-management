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

    /**
     * Create new permission
     */
    public function createNewPermission(array $permissionDetails): Permission
    {
        return $this->model->create($permissionDetails);
    }

    /**
     * Find permission by it's ID
     */
    public function findPermissionById(int $permissionID): Permission
    {
        return $this->model->findOrFail($permissionID);
    }

    /**
     * Update permission
     */

    public function updatePermission(object $permission, array $newDetails): bool
    {
        return $permission->update($newDetails);
    }

    /**
     * Delete permission
     */

    public function deletePermission(object $permission): bool
    {
        return $permission->delete();
    }

    /**
     * Assign  role in permission
     */
    public function assignRole(object $permission, array $permissionRoleDetails): Permission
    {
        return $permission->assignRole($permissionRoleDetails);
    }
}
