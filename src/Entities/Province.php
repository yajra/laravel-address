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
    protected $table = 'provinces';

    public $timestamps = false;
}
