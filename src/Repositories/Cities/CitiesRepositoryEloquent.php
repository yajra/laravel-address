<?php

namespace Yajra\Address\Repositories\Cities;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Yajra\Address\Entities\City;
use Yajra\Address\Repositories\EloquentBaseRepository;

class CitiesRepositoryEloquent extends EloquentBaseRepository implements CitiesRepository
{
    public function getByProvinceAndRegion(string $regionId, string $provinceId): Collection
    {
        return $this->getModel()
            ->newQuery()
            ->where('region_id', $regionId)
            ->where('province_id', $provinceId)
            ->orderBy('name', 'asc')
            ->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model<\Yajra\Address\Entities\City>
     */
    public function getModel(): Model
    {
        $model = config('address.models.city', City::class);

        return new $model;
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
