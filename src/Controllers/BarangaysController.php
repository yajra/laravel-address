<?php

namespace Yajra\Address\Controllers;

use Illuminate\Routing\Controller;
use Yajra\Address\Repositories\Barangays\BarangaysRepository;

class BarangaysController extends Controller
{
    /**
     * BarangaysController constructor.
     */
    public function __construct(protected BarangaysRepository $repository)
    {
    }

    /**
     * @param  string  $cityId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getByCity($cityId)
    {
        return $this->repository->getByCity($cityId);
    }

    /**
     * Get barangays by region, province and city ID.
     *
     * @param  string  $regionId
     * @param  string  $provinceId
     * @param  string  $cityId
     * @return string
     */
    public function getBarangaysByRegionProvinceCityId($regionId, $provinceId, $cityId)
    {
        return $this->repository->getByProvinceRegionAndCityId($regionId, $provinceId, $cityId);
    }
}
