<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Collection;

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
     * Find user by it's ID
     */
    public function getUserByID(int $userId): User
    {
        return $this->model->where('id', $userId)->first();
    }
}
