<?php

namespace Yajra\Address\Repositories\Cities;

use Illuminate\Database\Eloquent\Collection;
use Yajra\Address\Repositories\EloquentRepositoryInterface;

interface CitiesRepository extends EloquentRepositoryInterface
{
    /**
     * Get province by region ID.
     *
     * @return \Illuminate\Database\Eloquent\Collection<\Yajra\Address\Entities\City>
     */
    public function getByProvinceAndRegion(string $regionId, string $provinceId): Collection;

    /**
     * Get cities by province.
     *
     * @return \Illuminate\Database\Eloquent\Collection<\Yajra\Address\Entities\City>
     */
    public function getByProvince(string $provinceId): Collection;

    /**
     * Get cities by region.
     *
     * @return \Illuminate\Database\Eloquent\Collection<\Yajra\Address\Entities\City>
     */
    public function getByRegion(string $regionId): Collection;
}
