<?php

namespace App\Interfaces;

use App\Models\SchoolClass;

interface SchoolClassRepositoryInterface
{

    /**
     * Store SchoolClass data
     */
    public function createSchoolClass(array $schoolClassDetails): SchoolClass;
}
