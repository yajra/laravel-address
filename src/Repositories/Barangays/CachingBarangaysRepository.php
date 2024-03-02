<?php

namespace Yajra\Address\Repositories\Barangays;

use Illuminate\Contracts\Cache\Repository as Cache;
use Illuminate\Database\Eloquent\Collection;

class CachingBarangaysRepository extends BarangaysRepositoryEloquent implements BarangaysRepository
{
    public function __construct(public BarangaysRepository $repository, public Cache $cache)
    {
        parent::__construct();
    }

    public function getByRegionProvinceAndCityId(string $regionId, string $provinceId, string $cityId): Collection
    {
        $key = "barangays.{$regionId}.{$provinceId}.{$cityId}";

        return $this->cache->rememberForever($key,
            fn () => $this->repository->getByRegionProvinceAndCityId($regionId, $provinceId, $cityId));
    }

    public function getByCity(string $cityId): Collection
    {
        return $this->cache->rememberForever("barangays.{$cityId}", fn () => $this->repository->getByCity($cityId));
    }
}
