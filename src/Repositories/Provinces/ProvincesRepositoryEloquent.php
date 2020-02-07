<?php

namespace Yajra\Address\Repositories\Provinces;

use Yajra\Address\Entities\Province;
use Yajra\Address\Repositories\EloquentBaseRepository;

class ProvincesRepositoryEloquent extends EloquentBaseRepository implements ProvincesRepository
{
    /**
     * Get province by region ID.
     *
     * @param int $regionId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getProvinceByRegion($regionId)
    {
        return $this->getModel()->newQuery()->where('region_id', $regionId)->orderBy('name', 'asc')->get();
    }

    /**
     * Get repository model.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getModel()
    {
        $model = config('address.models.province', Province::class);

        return new $model;
    }
}
