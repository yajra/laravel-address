<?php

namespace Yajra\Address\Repositories\Regions;

use Illuminate\Database\Eloquent\Model;
use Yajra\Address\Entities\Region;
use Yajra\Address\Repositories\EloquentBaseRepository;

class RegionsRepositoryEloquent extends EloquentBaseRepository implements RegionsRepository
{
    public function getModel(): Model
    {
        $class = config('address.models.region', Region::class);
        $model = new $class;

        if (! is_subclass_of($model, Region::class)) {
            return new Region;
        }

        return $model;
    }
}
