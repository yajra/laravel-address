<?php

namespace Yajra\Address\Repositories\Cities;

use Illuminate\Contracts\Cache\Repository as Cache;
use Illuminate\Database\Eloquent\Collection;

class CachingCitiesRepository extends CitiesRepositoryEloquent implements CitiesRepository
{
    public function __construct(public CitiesRepository $repository, public Cache $cache)
    {
        parent::__construct();
    }

    public function getByRegionAndProvince(string $regionId, string $provinceId): Collection
    {
        $key = "cities.{$regionId}.{$provinceId}";

        return $this->cache->rememberForever($key,
            fn () => $this->repository->getByRegionAndProvince($regionId, $provinceId));
    }

    public function getByProvince(string $provinceId): Collection
    {
        $key = "cities.{$provinceId}";

        return $this->cache->rememberForever($key, fn () => $this->repository->getByProvince($provinceId));
    }

    public function getByRegion(string $regionId): Collection
    {
        $key = "cities.region.{$regionId}";

        return $this->cache->rememberForever($key, fn () => $this->repository->getByRegion($regionId));
    }
}
