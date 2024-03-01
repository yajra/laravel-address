<?php

namespace Yajra\Address\Controllers;

use Illuminate\Routing\Controller;
use Yajra\Address\Repositories\Regions\RegionsRepository;

class RegionsController extends Controller
{
    /**
     * RegionsController constructor.
     */
    public function __construct(private RegionsRepository $repository)
    {
    }

    /**
     * Get all regions.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->repository->all();
    }
}
