<?php

namespace Yajra\Address\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

abstract class EloquentBaseRepository extends RepositoryAbstract
{
    public function __construct()
    {
        $this->model = $this->getModel();
    }

    public function all(): Collection
    {
        return $this->model->newQuery()->get();
    }

    public function paginate(int $limit = 10): LengthAwarePaginator
    {
        return $this->model->newQuery()->paginate($limit);
    }

    public function create(array $attributes): Model
    {
        $model = $this->model->newInstance($attributes);
        $model->save();

        $this->resetModel();

        return $model;
    }

    public function resetModel(): Model
    {
        return $this->model = $this->getModel();
    }

    public function make(array $attributes): Model
    {
        return $this->model->forceFill($attributes);
    }

    public function update(array $attributes, Model|int $id): Model
    {
        if (is_int($id)) {
            $model = $this->model->newQuery()->findOrFail($id);
        } else {
            $model = $id;
        }

        $model->fill($attributes);
        $model->save();

        $this->resetModel();

        return $model;
    }

    /**
     * @throws \Exception
     */
    public function delete(Model|int $id): ?bool
    {
        if (is_int($id)) {
            $model = $this->model->newQuery()->findOrFail($id);
        } else {
            $model = $id;
        }

        $this->resetModel();

        return $model->delete();
    }

    /**
     * @throws ModelNotFoundException
     */
    public function find(int $id, array $columns = ['*']): Model
    {
        $model = $this->model->newQuery()->findOrFail($id, $columns);
        $this->resetModel();

        return $model;
    }

    public function forModel(Model $model): static
    {
        $this->model = $model;

        return $this;
    }

    public function count(): int
    {
        return $this->model->newQuery()->count();
    }
}
