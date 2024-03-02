<?php

namespace Yajra\Address\Repositories\Cities;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Yajra\Address\Repositories\EloquentRepositoryInterface;

interface CitiesRepository extends EloquentRepositoryInterface
{
    /**
     * Get province by region ID.
     *
     * @return \Illuminate\Database\Eloquent\Collection<\Yajra\Address\Entities\City>
     */
    public function getByRegionAndProvince(string $regionId, string $provinceId): Collection;

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

    /**
     * @return \Illuminate\Database\Eloquent\Model<\Yajra\Address\Entities\City>
     */
    public function getModel(): Model;
}
