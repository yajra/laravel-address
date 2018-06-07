<?php

namespace Yajra\Address\Entities;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'city_id';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = 'cities';
}
