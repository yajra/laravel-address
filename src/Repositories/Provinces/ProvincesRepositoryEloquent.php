<?php

namespace Yajra\Address\Repositories\Provinces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Yajra\Address\Entities\Province;
use Yajra\Address\Repositories\EloquentBaseRepository;

class ProvincesRepositoryEloquent extends EloquentBaseRepository implements ProvincesRepository
{
    public function getByRegion(string $regionId): Collection
    {
        return $this->getModel()->newQuery()->where('region_id', $regionId)->orderBy('name', 'asc')->get();
    }

    /**
     * @return Province
     */
    public function getModel(): Model
    {
        $class = config('address.models.province', Province::class);
        $model = new $class;

        if (! is_subclass_of($model, Province::class)) {
            return new Province;
        }

        return $model;
    }
}
