<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function find(int $id): ?Model
    {
        return $this->model->find($id);
    }

    public function all(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->model->all();
    }

    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data): bool
    {
        $record = $this->find($id);
        return $record ? $record->update($data) : false;
    }

    public function delete(int $id): bool
    {
        $record = $this->find($id);
        return $record ? $record->delete() : false;
    }

    public function filter(array $filters, array $relations = []): \Illuminate\Database\Eloquent\Collection
    {
        $query = $this->model->newQuery();

        foreach ($filters as $column => $value) {
            // Support for exact matches or "like" queries
            if (is_array($value)) {
                $query->whereIn($column, $value);
            } else {
                $query->where($column, 'LIKE', "%{$value}%");
            }
        }

        // Eager load relations if specified
        if (!empty($relations)) {
            $query->with($relations);
        }

        return $query->get();
    }
}
