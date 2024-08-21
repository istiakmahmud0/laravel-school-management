?<?php

    use App\Interfaces\SchoolClassRepositoryInterface;
    use App\Models\SchoolClass;

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
         * Store SchoolClass data
         */
        public function createSchoolClass(array $schoolClassDetails): SchoolClass
        {
            return $this->model->create($schoolClassDetails);
        }
    }
