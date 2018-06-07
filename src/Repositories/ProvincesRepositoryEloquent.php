<?php

namespace Yajra\Address\Repositories;

use Yajra\Address\Entities\Utilities\Province;

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
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getProvinceByRegion($regionId)
    {
        return Province::query()->where('region_id', $regionId)->orderBy('region_id', 'asc')->get();
    }
}
