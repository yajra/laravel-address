<?php

namespace Yajra\Address\Repositories\Regions;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Yajra\Address\Entities\Region;

interface RegionsRepository
{
    /**
     * @return Collection<array-key, Model>
     */
    public function all(): Collection;

    /**
     * @return Region
     */
    public function getModel(): Model;
}
