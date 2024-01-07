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

    /**
     * Find role by id
     */
    public function getCategoryByID(int $categoryId): Role;

    /**
     * Update role
     */
    public function updateCategory(object $category, array $newDetails): bool;

    /**
     * Delete category
     */
    public function deleteCategory(object $category): bool;
}
