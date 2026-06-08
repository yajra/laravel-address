<?php

namespace Yajra\Address\Repositories\Barangays;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Yajra\Address\Entities\Barangay;

interface BarangaysRepository
{
    /**
     * Get barangays by region, province and city ID.
     *
     * @return Collection<Barangay>
     */
    public function getByRegionProvinceAndCityId(string $regionId, string $provinceId, string $cityId): Collection;

    /**
     * Get barangays by region, province and city ID.
     *
     * @return Collection<Barangay>
     */
    public function getByCity(string $cityId): Collection;

    /**
     * @return Barangay
     */
    public function getModel(): Model;
}
