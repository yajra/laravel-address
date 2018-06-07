<?php

namespace Yajra\Address\Repositories;

use Illuminate\Database\Eloquent\Model;

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
     * @return mixed
     */
    public function find($id, $columns = ['*']);

    /**
     * Save a new entity in repository
     *
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * Make a new entity in repository.
     *
     * @param array $attributes
     * @return mixed
     */
    public function make(array $attributes);

    /**
     * Update a entity in repository by id.
     *
     * @param array     $attributes
     * @param int|mixed $id
     * @return mixed
     */
    public function update(array $attributes, $id);

    /**
     * Delete a entity in repository by id.
     *
     * @param int|mixed $id
     * @return int
     */
    public function delete($id);

    /**
     * Get repository model.
     *
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Builder
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
