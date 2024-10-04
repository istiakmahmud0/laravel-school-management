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

    /**
     * Get subjects by id
     */
    public function getSubjectById(string $id): Subject;

    /**
     * Update subject
     */
    public function updateSubject(object $subject, array $newDetails): bool;
    /**
     * Delete subject
     */
    public function deleteSubject(object $subject): bool;
}
