<?php

namespace Yajra\Address;

use Yajra\Address\Entities\Barangay;
use Yajra\Address\Entities\City;
use Yajra\Address\Entities\Province;
use Yajra\Address\Entities\Region;

/**
 * @property string   street
 * @property Region   region
 * @property Province province
 * @property City     city
 * @property Barangay barangay
 */
trait HasAddress
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function barangay()
    {
        return $this->belongsTo(Barangay::class, 'barangay_id');
    }

    /**
     * @return string
     */
    public function getAddressAttribute()
    {
        return sprintf("%s %s %s, %s",
            $this->street,
            $this->barangay->description,
            $this->city->description,
            $this->province->description
        );
    }
}
