<?php

namespace App\Repositories;

use App\Interfaces\SchoolClassRepositoryInterface;
use App\Models\SchoolClass;
use Illuminate\Database\Eloquent\Collection;

class SchoolClassRepository implements SchoolClassRepositoryInterface
{
    /**
     * SchoolClass repository construct
     */
    public function __construct(protected SchoolClass $model)
    {
        $this->model = $model;
    }

    /**
     * Get all school class data
     */
    public function getAllSchoolClass(?array $relationships = []): Collection
    {
        return $this->model::when($relationships, function ($query) use ($relationships) {
            $query->with($relationships);
        })->get();
    }

    /**
     * Store SchoolClass data
     */
    public function createSchoolClass(array $schoolClassDetails): SchoolClass
    {
        return $this->model->create($schoolClassDetails);
    }

    /**
     * Get school class by id
     */
    public function getSchoolClassById(string $id, ?array $relationships = []): SchoolClass
    {
        $sc = $this->model->query();
        return $sc->when($relationships, function ($query) use ($relationships) {
            $query->with($relationships);
        })->findOrFail($id);
        // return $sc->findOrFail($id);
    }

    /**
     * Update post
     */

    public function updatePost(object $sc, array $newDetails): bool
    {
        return $sc->update($newDetails);
    }

    /**
     * Delete post
     */

    public function deletePost(object $sc): bool
    {
        return $sc->delete();
    }
}
