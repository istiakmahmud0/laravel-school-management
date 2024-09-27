<?php

namespace App\Repositories;

use App\Interfaces\SubjectRepositoryInterface;
use App\Models\Subject;
use Illuminate\Support\Collection;

class SubjectRepository implements SubjectRepositoryInterface
{
    /**
     * Subject Repository constructor
     */
    public function __construct(protected Subject $model)
    {

        $this->$model = $model;
    }

    /**
     * Get All Subjects
     */
    public function getAllSubjects(): Collection
    {
        return $this->model->all();
    }

    /**
     * Create new subject
     */
    public function createNewSubject(array $subjectDetails): Subject
    {

        return $this->model->create($subjectDetails);
    }
}
