<?php

namespace Yajra\Address\Repositories\Regions;

use Illuminate\Database\Eloquent\Collection;
use Yajra\Address\Repositories\EloquentRepositoryInterface;

interface RegionsRepository extends EloquentRepositoryInterface
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection<array-key, \Yajra\Address\Entities\Region>
     */
    public function all(): Collection;
}
