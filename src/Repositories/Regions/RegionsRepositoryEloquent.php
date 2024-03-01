<?php

namespace Yajra\Address\Repositories\Regions;

use Illuminate\Database\Eloquent\Model;
use Yajra\Address\Entities\Region;
use Yajra\Address\Repositories\EloquentBaseRepository;

class RegionsRepositoryEloquent extends EloquentBaseRepository implements RegionsRepository
{
    public function getModel(): Model
    {
        $model = config('address.models.region', Region::class);

        return new $model;
    }
}
