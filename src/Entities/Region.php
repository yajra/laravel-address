<?php

namespace Yajra\Address\Entities;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    /**
     * @var string
     */
    protected $table = 'regions';

    /**
     * @var bool
     */
    public $timestamps = false;
}
