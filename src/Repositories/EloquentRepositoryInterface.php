<?php

namespace Yajra\Address\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface EloquentRepositoryInterface
{
    /**
     * Get all records.
     *
     * @return \Illuminate\Database\Eloquent\Collection<array-key, \Illuminate\Database\Eloquent\Model>
     */
    public function all(): Collection;

    /**
     * Paginate records.
     */
    public function paginate(int $limit = 10): LengthAwarePaginator;

    /**
     * Find data by id.
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function find(int $id, array $columns = ['*']): Model;

    /**
     * Save a new entity in repository
     */
    public function create(array $attributes): Model;

    /**
     * Make a new entity in repository.
     */
    public function make(array $attributes): Model;

    /**
     * Update a entity in repository by id.
     */
    public function update(array $attributes, Model|int $id): Model;

    /**
     * Delete a entity in repository by id.
     */
    public function delete(Model|int $id): ?bool;

    /**
     * Get repository model.
     */
    public function getModel(): Model;

    /**
     * Set repository model instance.
     *
     * @return $this
     */
    public function forModel(Model $model): static;
}
