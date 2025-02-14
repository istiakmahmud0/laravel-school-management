<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    /**
     * User repository constructor
     */
    public function __construct(public User $model)
    {
        $this->model = $model;
    }

    /**
     * Return the list of users
     */
    public function getAllUser(): Collection
    {
        return $this->model->all();
    }


    /**
     * Create new user
     */

    public function createUser(array $userDetails): User
    {
        return $this->model->create($userDetails);
    }

    /**
     * Find user by it's ID
     */
    public function getUserByID(int $userId): User
    {
        return $this->model->where('id', $userId)->first();
    }

    /**
     * Update User
     */

    public function updateUser(object $user, array $userDetails): bool
    {
        return $user->update($userDetails);
    }

    /**
     * Delete user
     */

    public function deleteUser(object $user): bool
    {
        return $user->delete();
    }

    /**
     * Assign role to user
     */

    public function assignRoleToUser(object $user, array $userDetails): User
    {
        return $user->assignRole($userDetails);
    }

    /**
     * Assign permission to user
     */

    public function assignPermissionToUser(object $user, array $permissionDetails): User
    {
        return $user->givePermissionTo($permissionDetails);
    }

    /**
     * updateUsersPassword
     */
    public function updateUserPassword(object $user, array $passwordDetails): bool
    {
        return $user->update($passwordDetails);
    }
}
