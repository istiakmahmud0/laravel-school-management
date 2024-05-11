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
     * Create new user
     */

    public function createUser(array $userDetails): User;

    /**
     * Find user by it's ID
     */
    public function getUserByID(int $userId): User;

    /**
     * Update User
     */

    public function updateUser(object $user, array $userDetails): bool;

    /**
     * Delete user
     */

    public function deleteUser(object $user): bool;

    /**
     * Assign role to user
     */

    public function assignRoleToUser(object $user, array $userDetails): User;
    /**
     * Assign permission to user
     */

    public function assignPermissionToUser(object $user, array $permissionDetails): User;

    /**
     * updateUsersPassword
     */
    public function updateUserPassword(object $user, array $passwordDetails): bool;
}
