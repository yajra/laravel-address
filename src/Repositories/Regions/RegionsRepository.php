<?php

namespace Yajra\Address\Repositories\Regions;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Yajra\Address\Repositories\EloquentRepositoryInterface;

interface RegionsRepository extends EloquentRepositoryInterface
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection<array-key, \Yajra\Address\Entities\Region>
     */
    public function all(): Collection;

    /**
     * @return \Illuminate\Database\Eloquent\Model<\Yajra\Address\Entities\Region>
     */
    public function getModel(): Model;
}
