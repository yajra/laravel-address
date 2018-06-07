<?php

namespace Yajra\Address\Controllers;

use Illuminate\Routing\Controller;
use Yajra\Address\Repositories\Regions\RegionsRepository;

class RegionsController extends Controller
{
    /**
     * @var RegionsRepository
     */
    private $repository;

    /**
     * RegionsController constructor.
     *
     * @param RegionsRepository $repository
     */
    public function __construct(RegionsRepository $repository)
    {
        $this->repository = $repository;
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
