<?php

namespace Yajra\Address\Repositories\Regions;

use Illuminate\Contracts\Cache\Repository as Cache;
use Illuminate\Database\Eloquent\Collection;

class CachingRegionsRepository extends RegionsRepositoryEloquent implements RegionsRepository
{
    public function __construct(public RegionsRepository $repository, public Cache $cache)
    {
        parent::__construct();
    }

    public function all(): Collection
    {
        return $this->cache->rememberForever(
            'regions.all',
            fn () => $this->repository->getModel()->query()->orderBy('region_id', 'asc')->get()
        );
    }
}
