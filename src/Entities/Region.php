<?php

namespace Yajra\Address\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $code
 * @property string $region_id
 * @property string $name
 */
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
