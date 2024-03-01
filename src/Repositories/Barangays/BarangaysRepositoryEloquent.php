<?php

namespace Yajra\Address\Repositories\Barangays;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Yajra\Address\Entities\Barangay;
use Yajra\Address\Repositories\EloquentBaseRepository;

class BarangaysRepositoryEloquent extends EloquentBaseRepository implements BarangaysRepository
{
    public function getByCity(string $cityId): Collection
    {
        return $this->getModel()
            ->newQuery()
            ->where('city_id', $cityId)
            ->orderBy('name', 'asc')
            ->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model<\Yajra\Address\Entities\Barangay>
     */
    public function getModel(): Model
    {
        $model = config('address.models.barangay', Barangay::class);

        return new $model;
    }

    public function getByProvinceRegionAndCityId(string $regionId, string $provinceId, string $cityId): Collection
    {
        return $this->getModel()
            ->newQuery()
            ->where('region_id', $regionId)
            ->where('province_id', $provinceId)
            ->where('city_id', $cityId)
            ->orderBy('name', 'asc')
            ->get();
    }
}
