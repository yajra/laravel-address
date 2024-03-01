<?php

namespace Yajra\Address\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $code
 * @property string $region_id
 * @property string $province_id
 * @property string $city_id
 * @property string $name
 */
class City extends Model
{
    /**
     * @var string
     */
    protected $table = 'cities';

    /**
     * @var bool
     */
    public $timestamps = false;
}
