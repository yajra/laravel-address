<?php

namespace Yajra\Address\Controllers;

use Illuminate\Routing\Controller;
use Yajra\Address\Repositories\Provinces\ProvincesRepository;

class ProvincesController extends Controller
{
    /**
     * ProvincesController constructor.
     */
    public function __construct(protected ProvincesRepository $repository)
    {
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
     * @param  string  $regionId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getByRegion($regionId)
    {
        return $this->repository->getProvinceByRegion($regionId);
    }
}
