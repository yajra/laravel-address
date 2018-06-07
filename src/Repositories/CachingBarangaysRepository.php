<?php

namespace Yajra\Address\Repositories;

use Illuminate\Contracts\Cache\Repository as Cache;

class CachingBarangaysRepository extends EloquentBaseRepository implements BarangaysRepository
{
    /**
     * @var \App\Repositories\Utilities\BarangaysRepository
     */
    protected $repository;

    /**
     * @var \Illuminate\Contracts\Cache\Repository
     */
    protected $cache;

    /**
     * CachingBarangaysRepository constructor.
     *
     * @param \App\Repositories\Utilities\BarangaysRepository $repository
     * @param \Illuminate\Contracts\Cache\Repository          $cache
     */
    public function __construct(BarangaysRepository $repository, Cache $cache)
    {
        $this->repository = $repository;
        $this->cache      = $cache;

        parent::__construct();
    }

    /**
     * Get repository model.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function getModel()
    {
        return $this->repository->getModel();
    }

    /**
     * Get barangays by region, province and city ID.
     *
     * @param int $regionId
     * @param int $provinceId
     * @param int $cityId
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getByProvinceRegionAndCityId($regionId, $provinceId, $cityId)
    {
        return $this->repository->getByProvinceRegionAndCityId($regionId, $provinceId, $cityId);
    }
}
