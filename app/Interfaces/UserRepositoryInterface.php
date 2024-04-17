<?php

namespace App\Interfaces;

use App\Models\User;
use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    /**
     * Return the list of users
     */
    public function getAllUser(): Collection;

    /**
     * Find user by it's ID
     */
    public function getUserByID(int $userId): User;

    /**
     * Assign role to user
     */

    public function assignRoleToUser(object $user, array $userDetails): User;
    /**
     * Assign permission to user
     */

    public function assignPermissionToUser(object $user, array $permissionDetails): User;
}
