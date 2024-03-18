<?php

namespace App\Interfaces;

use Illuminate\Support\Collection;
use Spatie\Permission\Models\Role;

interface RoleRepositoryInterface
{
    /**
     * Retrieve all roles
     */
    public function getAllRoles(): Collection;

    /**
     * Create new roles
     */
    public function createNewRoles(array $roleDetails): Role;

    /**
     * Find role by id
     */
    public function getRoleByID(int $RoleId): Role;

    /**
     * Update role
     */
    public function updateRole(object $Role, array $newDetails): bool;

    /**
     * Delete Role
     */
    public function deleteRole(object $Role): bool;


    /**
     * Assign permission in role
     */
    public function assignRole(object $role, array $rolePermissionDetails): Role;
}
