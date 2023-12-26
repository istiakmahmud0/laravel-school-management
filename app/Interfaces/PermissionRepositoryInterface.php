<?php

namespace App\Interfaces;

use Illuminate\Support\Collection;

interface PermissionRepositoryInterface
{
    /**
     * Retrieve all the permission
     */

    public function getAllPermission(): Collection;
}
