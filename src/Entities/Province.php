<?php

namespace Yajra\Address\Entities;

use Illuminate\Database\Eloquent\Model;

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
