<?php

namespace App\Interfaces;

use App\Models\Subject;
use Illuminate\Support\Collection;

interface SubjectRepositoryInterface
{
    /**
     * Get All Subjects
     */
    public function getAllSubjects(): Collection;

    /**
     * Create new subject
     */
    public function createNewSubject(array $subjectDetails): Subject;
}
