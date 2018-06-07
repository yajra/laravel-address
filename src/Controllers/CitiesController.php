<?php

namespace Yajra\Address\Controllers;

use Illuminate\Routing\Controller;
use Yajra\Address\Repositories\Cities\CitiesRepository;

class CitiesController extends Controller
{
    /**
     * @var CitiesRepository
     */
    protected $repository;

    /**
     * CitiesController constructor.
     *
     * @param CitiesRepository $repository
     */
    public function __construct(CitiesRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get cities by province.
     *
     * @param string $provinceId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getByProvince($provinceId)
    {
        return $this->repository->getByProvince($provinceId);
    }

    /**
     * Get cities by region and province Id.
     *
     * @param string $regionId
     * @param string $provinceId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getByRegionAndProvince($regionId, $provinceId)
    {
        return $this->repository->getByProvinceAndRegion($regionId, $provinceId);
    }
}
