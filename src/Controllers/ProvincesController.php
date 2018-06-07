<?php

namespace Yajra\Address\Controllers;

use Illuminate\Routing\Controller;
use Yajra\Address\Repositories\Provinces\ProvincesRepository;

class ProvincesController extends Controller
{
    /**
     * @var ProvincesRepository
     */
    protected $repository;

    /**
     * ProvincesController constructor.
     *
     * @param ProvincesRepository $repository
     */
    public function __construct(ProvincesRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get all provinces.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->repository->all();
    }

    /**
     * Get province by region Id.
     *
     * @param int $regionId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getByRegion($regionId)
    {
        return $this->repository->getProvinceByRegion($regionId);
    }
}
