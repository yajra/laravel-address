<?php

namespace Yajra\Address\Repositories;

use Illuminate\Database\Eloquent\Model;
use Yajra\CMS\Repositories\RepositoryAbstract;

abstract class EloquentBaseRepository extends RepositoryAbstract implements EloquentRepositoryInterface
{
    /**
     * BaseRepository constructor.
     */
    public function __construct()
    {
        $this->model = $this->getModel();
    }

    /**
     * Get all records.
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection|static[]
     */
    public function all()
    {
        return $this->model->newQuery()->get();
    }

    /**
     * Paginate records.
     *
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($limit = 10)
    {
        return $this->model->newQuery()->paginate($limit);
    }

    /**
     * Save a new entity in repository.
     *
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        $model = $this->model->newInstance($attributes);
        $model->save();

        $this->resetModel();

        return $model;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function resetModel()
    {
        return $this->model = $this->getModel();
    }

    /**
     * Make a new entity in repository.
     *
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function make(array $attributes)
    {
        return $this->model->forceFill($attributes);
    }

    /**
     * Update a entity in repository by id.
     *
     * @param array $attributes
     * @param int   $id
     * @return mixed
     */
    public function update(array $attributes, $id)
    {
        if ($id instanceof Model) {
            $id = $id->getKey();
        }

        $model = $this->model->findOrFail($id);
        $model->fill($attributes);
        $model->save();

        $this->resetModel();

        return $model;
    }

    /**
     * Delete a entity in repository by id.
     *
     * @param int $id
     * @return int
     */
    public function delete($id)
    {
        if ($id instanceof Model) {
            $id = $id->getKey();
        }

        $model = $this->find($id);
        $this->resetModel();

        return $model->delete();
    }

    /**
     * Find data by id.
     *
     * @param int   $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $columns = ['*'])
    {
        $model = $this->model->findOrFail($id, $columns);
        $this->resetModel();

        return $model;
    }

    /**
     * Set repository model instance.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return $this
     */
    public function forModel(Model $model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Count all records.
     *
     * @return int
     */
    public function count()
    {
        return $this->model->count();
    }
}
