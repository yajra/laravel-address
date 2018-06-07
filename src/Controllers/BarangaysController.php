<?php

namespace Yajra\Address\Controllers;

use Illuminate\Routing\Controller;
use Yajra\Address\Repositories\Barangays\BarangaysRepository;

class BarangaysController extends Controller
{
    /**
     * @var BarangaysRepository
     */
    protected $repository;

    /**
     * BarangaysController constructor.
     *
     * @param BarangaysRepository $repository
     */
    public function __construct(BarangaysRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getByCity($cityId)
    {
        return $this->repository->getByCity($cityId);
    }

    /**
     * Get barangays by region, province and city ID.
     *
     * @param int $regionId
     * @param int $provinceId
     * @param int $cityId
     * @return string
     */
    public function getBarangaysByRegionProvinceCityId($regionId, $provinceId, $cityId)
    {
        return $this->repository->getByProvinceRegionAndCityId($regionId, $provinceId, $cityId);
    }
}
