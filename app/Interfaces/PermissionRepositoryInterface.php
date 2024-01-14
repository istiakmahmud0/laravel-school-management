<?php

namespace App\Interfaces;

use Illuminate\Support\Collection;
use Spatie\Permission\Models\Permission;

interface PermissionRepositoryInterface
{
    /**
     * Retrieve all the permission
     */
    public function getAllPermission(): Collection;

    /**
     * Create new permission
     */

    public function createNewPermission(array $permissionDetails): Permission;

    /**
     * Find permission by it's ID
     */

    public function findPermissionById(int $permissionID): Permission;

    /**
     * Update permission
     */

    public function updatePermission(object $permission, array $newDetails): bool;

    /**
     * Delete permission
     */

    public function deletePermission(object $permission): bool;
}
