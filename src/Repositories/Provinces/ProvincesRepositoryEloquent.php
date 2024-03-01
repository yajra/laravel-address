<?php

namespace Yajra\Address\Repositories\Provinces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Yajra\Address\Entities\Province;
use Yajra\Address\Repositories\EloquentBaseRepository;

class ProvincesRepositoryEloquent extends EloquentBaseRepository implements ProvincesRepository
{
    public function getProvinceByRegion(string $regionId): Collection
    {
        return $this->getModel()->newQuery()->where('region_id', $regionId)->orderBy('name', 'asc')->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model<Province>
     */
    public function getModel(): Model
    {
        $model = config('address.models.province', Province::class);

        return new $model;
    }
}
