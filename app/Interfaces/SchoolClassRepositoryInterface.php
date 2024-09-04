<?php

namespace App\Interfaces;

use App\Models\SchoolClass;
use Illuminate\Database\Eloquent\Collection;

interface SchoolClassRepositoryInterface
{

    /**
     * Get all school class data
     */
    public function getAllSchoolClass(): Collection;



    /**
     * Store SchoolClass data
     */
    public function createSchoolClass(array $schoolClassDetails): SchoolClass;

    /**
     * Get school class by id
     */

    public function getSchoolClassById(string $id): SchoolClass;
}
