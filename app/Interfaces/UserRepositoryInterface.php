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
}
