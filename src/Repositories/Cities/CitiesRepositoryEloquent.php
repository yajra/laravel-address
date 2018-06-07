<?php

namespace Yajra\Address\Repositories\Cities;

use Yajra\Address\Entities\City;
use Yajra\Address\Repositories\EloquentBaseRepository;

class CitiesRepositoryEloquent extends EloquentBaseRepository implements CitiesRepository
{
    /**
     * Get repository model.
     *
     * @return City
     */
    public function getModel()
    {
        return new City;
    }

    /**
     * Get cities by region ID and province ID.
     *
     * @param int $regionId
     * @param int $provinceId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getByProvinceAndRegion($regionId, $provinceId)
    {
        return City::query()
                   ->where('region_id', $regionId)
                   ->where('province_id', $provinceId)
                   ->orderBy('name', 'asc')
                   ->get();
    }

    /**
     * Get cities by region.
     *
     * @param int $regionId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getByRegion($regionId)
    {
        return City::query()
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
        return City::query()
                   ->where('province_id', $provinceId)
                   ->orderBy('name', 'asc')
                   ->get();
    }
}
