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
     * @var \Illuminate\Contracts\Cache\Repository
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
     * Get repository model.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function getModel()
    {
        return $this->repository->getModel();
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
