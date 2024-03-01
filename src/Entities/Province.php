<?php

namespace Yajra\Address\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $code
 * @property string $region_id
 * @property string $province_id
 * @property string $name
 */
class Province extends Model
{
    /**
     * @var string
     */
    protected $table = 'provinces';

    /**
     * @var bool
     */
    public $timestamps = false;
}
