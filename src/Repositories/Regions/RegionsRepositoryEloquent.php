<?php

namespace Yajra\Address\Repositories\Regions;

use Yajra\Address\Entities\Region;
use Yajra\Address\Repositories\EloquentBaseRepository;

class RegionsRepositoryEloquent extends EloquentBaseRepository implements RegionsRepository
{
    /**
     * Get repository model.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getModel()
    {
        $model = config('address.models.region', Region::class);

        return new $model;
    }
}
