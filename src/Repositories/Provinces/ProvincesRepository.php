<?php

namespace Yajra\Address\Repositories\Provinces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Yajra\Address\Entities\Province;

interface ProvincesRepository
{
    /**
     * @return Collection<array-key, Province>
     */
    public function getByRegion(string $regionId): Collection;

    /**
     * @return Collection<array-key, Province>
     */
    public function all(): Collection;

    /**
     * @return Province
     */
    public function getModel(): Model;
}
