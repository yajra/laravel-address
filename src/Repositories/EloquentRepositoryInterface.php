<?php

namespace Yajra\Address\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

interface EloquentRepositoryInterface
{
    /**
     * Get all records.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all();

    /**
     * Paginate records.
     *
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($limit = 10);

    /**
     * Find data by id.
     *
     * @param int   $id
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Model
     * @throws ModelNotFoundException
     */
    public function find($id, $columns = ['*']);

    /**
     * Save a new entity in repository
     *
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $attributes);

    /**
     * Make a new entity in repository.
     *
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function make(array $attributes);

    /**
     * Update a entity in repository by id.
     *
     * @param array     $attributes
     * @param int|mixed $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update(array $attributes, $id);

    /**
     * Delete a entity in repository by id.
     *
     * @param int|mixed $id
     * @return bool|null
     */
    public function delete($id);

    /**
     * Get repository model.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getModel();

    /**
     * Set repository model instance.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return $this
     */
    public function forModel(Model $model);
}
