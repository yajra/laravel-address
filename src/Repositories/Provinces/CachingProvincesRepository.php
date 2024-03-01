<?php

namespace Yajra\Address\Repositories\Provinces;

use Illuminate\Contracts\Cache\Repository as Cache;
use Illuminate\Database\Eloquent\Collection;

class CachingProvincesRepository extends ProvincesRepositoryEloquent implements ProvincesRepository
{
    public function __construct(public ProvincesRepository $repository, public Cache $cache)
    {
        parent::__construct();
    }

    public function getProvinceByRegion(string $regionId): Collection
    {
        return $this->cache->rememberForever("provinces.{$regionId}", fn () => $this->repository->getProvinceByRegion($regionId));
    }

    public function all(): Collection
    {
        return $this->cache->rememberForever('provinces', fn () => $this->repository->all());
    }
}
