<?php

namespace Yajra\Address\Repositories\Cities;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Yajra\Address\Entities\City;
use Yajra\Address\Repositories\EloquentBaseRepository;

class CitiesRepositoryEloquent extends EloquentBaseRepository implements CitiesRepository
{
    public function getByRegionAndProvince(string $regionId, string $provinceId): Collection
    {
        return $this->getModel()
            ->newQuery()
            ->where('region_id', $regionId)
            ->where('province_id', $provinceId)
            ->orderBy('name', 'asc')
            ->get();
    }

    /**
     * @return City
     */
    public function getModel(): Model
    {
        $class = config('address.models.city', City::class);
        $model = new $class;

        if (! is_subclass_of($model, City::class)) {
            return new City;
        }

        return $model;
    }

    public function getByRegion(string $regionId): Collection
    {
        return $this->getModel()
            ->newQuery()
            ->where('region_id', $regionId)
            ->orderBy('name', 'asc')
            ->get();
    }

    public function getByProvince(string $provinceId): Collection
    {
        return $this->getModel()
            ->newQuery()
            ->where('province_id', $provinceId)
            ->orderBy('name', 'asc')
            ->get();
    }
}
