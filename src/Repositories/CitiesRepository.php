<?php

namespace Yajra\Address\Repositories;

interface CitiesRepository extends EloquentRepositoryInterface
{
    /**
     * Get province by region ID.
     *
     * @param int $regionId
     * @param int $provinceId
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getByProvinceAndRegion($regionId, $provinceId);
}
