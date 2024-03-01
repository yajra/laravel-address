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
    protected $table = 'regions';

    public $timestamps = false;
}
