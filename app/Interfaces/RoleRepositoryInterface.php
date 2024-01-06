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
}
