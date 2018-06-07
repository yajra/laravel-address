<?php

namespace Yajra\Address\Repositories\Regions;

use Illuminate\Contracts\Cache\Repository as Cache;

class CachingRegionsRepository extends RegionsRepositoryEloquent implements RegionsRepository
{
    /**
     * @var RegionsRepository
     */
    protected $repository;

    /**
     * @var Cache
     */
    protected $cache;

    /**
     * CachingRegionsRepository constructor.
     *
     * @param RegionsRepository $repository
     * @param Cache             $cache
     */
    public function __construct(RegionsRepository $repository, Cache $cache)
    {

        $this->repository = $repository;
        $this->cache      = $cache;

        parent::__construct();
    }

    /**
     * Get all records.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->cache->rememberForever('regions.all', function () {
            return $this->repository->getModel()->query()->orderBy('region_id', 'asc')->get();
        });
    }
}
