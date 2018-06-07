<?php

namespace Yajra\Address\Entities;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'region_id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var string
     */
    protected $table = 'regions';
}
