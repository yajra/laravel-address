<?php

namespace Yajra\Address\Repositories\Provinces;

use Illuminate\Contracts\Cache\Repository as Cache;

class CachingProvincesRepository extends ProvincesRepositoryEloquent implements ProvincesRepository
{
    /**
     * @var ProvincesRepository
     */
    protected $repository;

    /**
     * @var Cache
     */
    protected $cache;

    /**
     * CachingProvincesRepository constructor.
     *
     * @param ProvincesRepository $repository
     * @param Cache               $cache
     */
    public function __construct(ProvincesRepository $repository, Cache $cache)
    {
        $this->repository = $repository;
        $this->cache      = $cache;

        parent::__construct();
    }

    /**
     * Get province by region ID.
     *
     * @param int $regionId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getProvinceByRegion($regionId)
    {
        return $this->cache->rememberForever("provinces.{$regionId}", function () use ($regionId) {
            return $this->repository->getProvinceByRegion($regionId);
        });
    }

    /**
     * Get all provinces.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->cache->rememberForever("provinces", function () {
            return $this->repository->all();
        });
    }
}
