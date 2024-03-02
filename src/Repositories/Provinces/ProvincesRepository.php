<?php

namespace Yajra\Address\Repositories\Provinces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Yajra\Address\Repositories\EloquentRepositoryInterface;

interface ProvincesRepository extends EloquentRepositoryInterface
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection<array-key, \Yajra\Address\Entities\Province>
     */
    public function getByRegion(string $regionId): Collection;

    /**
     * @return \Illuminate\Database\Eloquent\Collection<array-key, \Yajra\Address\Entities\Province>
     */
    public function all(): Collection;

    /**
     * @return \Illuminate\Database\Eloquent\Model<\Yajra\Address\Entities\Province>
     */
    public function getModel(): Model;
}
