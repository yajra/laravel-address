<?php

namespace Yajra\Address\Repositories\Cities;

use Yajra\Address\Repositories\EloquentRepositoryInterface;

interface CitiesRepository extends EloquentRepositoryInterface
{
    /**
     * Get province by region ID.
     *
     * @param int $regionId
     * @param int $provinceId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getByProvinceAndRegion($regionId, $provinceId);

    /**
     * Get cities by province.
     *
     * @param int $provinceId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getByProvince($provinceId);

    /**
     * Get cities by region.
     *
     * @param int $regionId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getByRegion($regionId);
}
