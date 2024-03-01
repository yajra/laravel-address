<?php

namespace Yajra\Address\Repositories\Provinces;

use Illuminate\Database\Eloquent\Collection;
use Yajra\Address\Repositories\EloquentRepositoryInterface;

interface ProvincesRepository extends EloquentRepositoryInterface
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection<array-key, \Yajra\Address\Entities\Province>
     */
    public function getProvinceByRegion(string $regionId): Collection;

    /**
     * @return \Illuminate\Database\Eloquent\Collection<array-key, \Yajra\Address\Entities\Province>
     */
    public function all(): Collection;
}
