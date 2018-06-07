<?php

namespace Yajra\Address\Repositories;

use Yajra\Address\Entities\Utilities\Region;

class RegionsRepositoryEloquent extends EloquentBaseRepository implements RegionsRepository
{
    /**
     * Get repository model.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getModel()
    {
        return new Region;
    }
}
