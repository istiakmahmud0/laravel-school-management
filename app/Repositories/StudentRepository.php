<?php

use App\Interfaces\StudentRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class StudentRepository implements StudentRepositoryInterface
{
    public function __construct(protected User $model)
    {
        $this->model = $model;
    }
    public function getAll(?int $limit, ?array $relationNames): Collection
    {
        return $this->model->with($relationNames)->get();
    }

    public function findById(string $id, array|null $relationNames): User|null
    {
        return $this->model->with($relationNames)->find($id);
    }

    public function store(array $details): User
    {
        return $this->model->create($details);
    }

    public function update(Model $model, array $newDetails): bool
    {
        return $model->update($newDetails);
    }

    public function delete(Model $model): bool
    {
        return $model->delete();
    }
}
