<?php

namespace App\Repositories;

use App\Interfaces\RoleRepositoryInterface;
use Illuminate\Support\Collection;
use Spatie\Permission\Models\Role;

class RoleRepository implements RoleRepositoryInterface
{
    /**
     * Role repository constructor
     */
    public function __construct(protected Role $model)
    {
        $this->model = $model;
    }

    /**
     * Retrieve all roles
     */
    public function getAllRoles(): Collection
    {
        return $this->model->all();
    }

    /**
     * Create new roles
     */
    public function createNewRoles(array $roleDetails): Role
    {
        return $this->model->create($roleDetails);
    }

    /**
     * Find Role by id
     */
    public function getRoleByID(int $RoleId): Role
    {
        return $this->model->findOrFail($RoleId);
    }

    /**
     * Update role
     */
    public function updateRole(object $Role, array $newDetails): bool
    {
        return $Role->update($newDetails);
    }

    /**
     * Delete Role
     */
    public function deleteRole(object $Role): bool
    {
        return $Role->delete();
    }
}
