<?php

namespace Yajra\Address\Repositories\Barangays;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Yajra\Address\Repositories\EloquentRepositoryInterface;

interface BarangaysRepository extends EloquentRepositoryInterface
{
    /**
     * Get barangays by region, province and city ID.
     *
     * @return \Illuminate\Database\Eloquent\Collection<\Yajra\Address\Entities\Barangay>
     */
    public function getByRegionProvinceAndCityId(string $regionId, string $provinceId, string $cityId): Collection;

    /**
     * Get barangays by region, province and city ID.
     *
     * @return \Illuminate\Database\Eloquent\Collection<\Yajra\Address\Entities\Barangay>
     */
    public function getByCity(string $cityId): Collection;

    /**
     * @return \Illuminate\Database\Eloquent\Model<\Yajra\Address\Entities\Barangay>
     */
    public function getModel(): Model;
}
