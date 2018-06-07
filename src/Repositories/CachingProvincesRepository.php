<?php

namespace Yajra\Address\Repositories;

use Illuminate\Contracts\Cache\Repository as Cache;

class CachingProvincesRepository extends EloquentBaseRepository implements ProvincesRepository
{
    /**
     * @var \App\Repositories\Utilities\ProvincesRepository
     */
    protected $repository;

    /**
     * @var \Illuminate\Contracts\Cache\Repository
     */
    protected $cache;

    /**
     * CachingProvincesRepository constructor.
     *
     * @param \App\Repositories\Utilities\ProvincesRepository $repository
     * @param \Illuminate\Contracts\Cache\Repository          $cache
     */
    public function __construct(ProvincesRepository $repository, Cache $cache)
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
     * Get province by region ID.
     *
     * @param int $regionId
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getProvinceByRegion($regionId)
    {
        return $this->repository->getProvinceByRegion($regionId);
    }
}
