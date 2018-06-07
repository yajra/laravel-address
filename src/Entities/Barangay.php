<?php

namespace Yajra\Address\Entities;

use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    /**
     * @var string
     */
    protected $table = 'barangays';

    /**
     * @var bool
     */
    public $timestamps = false;
}
