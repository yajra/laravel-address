<?php

namespace Yajra\Address\Repositories\Cities;

use Yajra\Address\Entities\City;
use Yajra\Address\Repositories\EloquentBaseRepository;

class CitiesRepositoryEloquent extends EloquentBaseRepository implements CitiesRepository
{
    /**
     * Get cities by region ID and province ID.
     *
     * @param int $regionId
     * @param int $provinceId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getByProvinceAndRegion($regionId, $provinceId)
    {
        return $this->getModel()
                    ->newQuery()
                    ->where('region_id', $regionId)
                    ->where('province_id', $provinceId)
                    ->orderBy('name', 'asc')
                    ->get();
    }

    /**
     * Get repository model.
     *
     * @return City
     */
    public function getModel()
    {
        $model = config('address.models.city', City::class);

        return new $model;
    }

    /**
     * Get cities by region.
     *
     * @param int $regionId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getByRegion($regionId)
    {
        return $this->getModel()
                    ->newQuery()
                    ->where('region_id', $regionId)
                    ->orderBy('name', 'asc')
                    ->get();
    }

    /**
     * Get cities by province.
     *
     * @param int $provinceId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getByProvince($provinceId)
    {
        return $this->getModel()
                    ->newQuery()
                    ->where('province_id', $provinceId)
                    ->orderBy('name', 'asc')
                    ->get();
    }
}
