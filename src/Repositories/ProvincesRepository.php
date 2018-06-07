<?php

namespace Yajra\Address\Repositories;

interface ProvincesRepository extends EloquentRepositoryInterface
{
    /**
     * Get province by region ID.
     *
     * @param int $regionId
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getProvinceByRegion($regionId);
}
