<?php

namespace Yajra\Address\Repositories\Barangays;

use Illuminate\Contracts\Cache\Repository as Cache;

class CachingBarangaysRepository extends BarangaysRepositoryEloquent implements BarangaysRepository
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
     * @param BarangaysRepository $repository
     * @param Cache               $cache
     */
    public function __construct(BarangaysRepository $repository, Cache $cache)
    {
        $this->repository = $repository;
        $this->cache      = $cache;

        parent::__construct();
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
        $key = "barangays.{$regionId}.{$provinceId}.{$cityId}";

        return $this->cache->rememberForever($key, function () use ($provinceId, $regionId, $cityId) {
            return $this->repository->getByProvinceRegionAndCityId($regionId, $provinceId, $cityId);
        });
    }

    /**
     * Get barangays by region, province and city ID.
     *
     * @param int $cityId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getByCity($cityId)
    {
        //        return $this->cache->rememberForever("barangays.{$cityId}", function () use ($cityId) {
        return $this->repository->getByCity($cityId);
        //        });
    }
}
