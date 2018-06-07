<?php

namespace Yajra\Address\Repositories\Cities;

use Illuminate\Contracts\Cache\Repository as Cache;

class CachingCitiesRepository extends CitiesRepositoryEloquent implements CitiesRepository
{
    /**
     * @var CitiesRepository
     */
    protected $repository;

    /**
     * @var \Illuminate\Contracts\Cache\Repository
     */
    protected $cache;

    /**
     * CachingCitiesRepository constructor.
     *
     * @param CitiesRepository $repository
     * @param Cache            $cache
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
        $key = "cities.{$regionId}.{$provinceId}";

        return $this->cache->rememberForever($key, function () use ($regionId, $provinceId) {
            return $this->repository->getByProvinceAndRegion($regionId, $provinceId);
        });
    }

    /**
     * Get cities by province.
     *
     * @param int $provinceId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getByProvince($provinceId)
    {
        $key = "cities.{$provinceId}";

        return $this->cache->rememberForever($key, function () use ($provinceId) {
            return $this->repository->getByProvince($provinceId);
        });
    }

    /**
     * Get cities by region.
     *
     * @param int $regionId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getByRegion($regionId)
    {
        $key = "cities.region.{$regionId}";

        return $this->cache->rememberForever($key, function () use ($regionId) {
            return $this->repository->getByRegion($regionId);
        });
    }
}
