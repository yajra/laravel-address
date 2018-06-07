<?php

namespace Yajra\Address\Repositories;

use Illuminate\Contracts\Cache\Repository as Cache;

class CachingCitiesRepository extends EloquentBaseRepository implements CitiesRepository
{
    /**
     * @var \App\Repositories\Utilities\CitiesRepository
     */
    protected $repository;

    /**
     * @var \Illuminate\Contracts\Cache\Repository
     */
    protected $cache;

    /**
     * CachingCitiesRepository constructor.
     *
     * @param \App\Repositories\Utilities\CitiesRepository $repository
     * @param \Illuminate\Contracts\Cache\Repository       $cache
     */
    public function __construct(CitiesRepository $repository, Cache $cache)
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
     * Get cities by region ID and province ID.
     *
     * @param int $regionId
     * @param int $provinceId
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getByProvinceAndRegion($regionId, $provinceId)
    {
        return $this->repository->getByProvinceAndRegion($regionId, $provinceId);
    }
}
