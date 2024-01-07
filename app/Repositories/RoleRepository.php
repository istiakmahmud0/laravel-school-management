<?php

namespace App\Repositories;

use App\Interfaces\RoleRepositoryInterface;
use Illuminate\Support\Collection;
use Spatie\Permission\Models\Role;

class RoleRepository implements RoleRepositoryInterface
{
    /**
     * Role repository constructor
     */
    public function __construct(protected Role $model)
    {
        $this->model = $model;
    }

    /**
     * Retrieve all roles
     */
    public function getAllRoles(): Collection
    {
        return $this->model->all();
    }

    /**
     * Create new roles
     */
    public function createNewRoles(array $roleDetails): Role
    {
        return $this->model->create($roleDetails);
    }

    /**
     * Find category by id
     */
    public function getCategoryByID(int $categoryId): Role
    {
        return $this->model->findOrFail($categoryId);
    }

    /**
     * Update role
     */
    public function updateCategory(object $category, array $newDetails): bool
    {
        return $category->update($newDetails);
    }

    /**
     * Delete category
     */
    public function deleteCategory(object $category): bool
    {
        return $category->delete();
    }
}
