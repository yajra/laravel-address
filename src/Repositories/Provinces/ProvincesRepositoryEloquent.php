<?php

namespace Yajra\Address\Repositories\Provinces;

use Yajra\Address\Entities\Province;
use Yajra\Address\Repositories\EloquentBaseRepository;

class ProvincesRepositoryEloquent extends EloquentBaseRepository implements ProvincesRepository
{
    /**
     * Get repository model.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getModel()
    {
        return new Province;
    }

    /**
     * Get province by region ID.
     *
     * @param int $regionId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getProvinceByRegion($regionId)
    {
        return Province::query()->where('region_id', $regionId)->orderBy('name', 'asc')->get();
    }
}
