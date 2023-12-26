<?php

namespace App\Interfaces;

use Illuminate\Support\Collection;

interface RoleRepositoryInterface
{
    /**
     * Retrieve all roles
     */
    public function getAllRoles(): Collection;
}
