<?php

namespace Yajra\Address\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Routing\Controller;
use Yajra\Address\Repositories\Barangays\BarangaysRepository;

class BarangaysController extends Controller
{
    public function __construct(protected BarangaysRepository $repository)
    {
    }

    public function getByCity(string $cityId): Collection
    {
        return $this->repository->getByCity($cityId);
    }

    public function getBarangaysByRegionProvinceCityId(
        string $regionId,
        string $provinceId,
        string $cityId
    ): Collection {
        return $this->repository->getByRegionProvinceAndCityId($regionId, $provinceId, $cityId);
    }
}
