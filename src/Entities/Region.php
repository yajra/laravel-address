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
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;
}
