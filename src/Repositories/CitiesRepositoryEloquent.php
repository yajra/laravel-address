<?php

namespace Yajra\Address\Repositories;

use Yajra\Address\Entities\Utilities\City;

class CitiesRepositoryEloquent extends EloquentBaseRepository implements CitiesRepository
{
    /**
     * Get repository model.
     *
     * @return \Illuminate\Database\Eloquent\Model
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
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getByProvinceAndRegion($regionId, $provinceId)
    {
        return City::query()
                   ->where('region_id', $regionId)
                   ->where('province_id', $provinceId)
                   ->orderBy('city_id', 'asc')
                   ->get();
    }
}
