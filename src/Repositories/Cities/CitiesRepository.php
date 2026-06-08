<?php

namespace Yajra\Address\Repositories\Cities;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Yajra\Address\Entities\City;

interface CitiesRepository
{
    /**
     * Get province by region ID.
     *
     * @return Collection<City>
     */
    public function getByRegionAndProvince(string $regionId, string $provinceId): Collection;

    /**
     * Get cities by province.
     *
     * @return Collection<City>
     */
    public function getByProvince(string $provinceId): Collection;

    /**
     * Get cities by region.
     *
     * @return Collection<City>
     */
    public function getByRegion(string $regionId): Collection;

    /**
     * @return City
     */
    public function getModel(): Model;
}
