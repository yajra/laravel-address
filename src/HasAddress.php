<?php

namespace Yajra\Address;

use Yajra\Address\Entities\City;
use Yajra\Address\Entities\Region;
use Yajra\Address\Entities\Province;
use Yajra\Address\Entities\Barangay;

/**
 * @property string address
 * @property string street
 * @property string region_id
 * @property Region region
 * @property string province_id
 * @property Province province
 * @property string city_id
 * @property City city
 * @property string barangay_id
 * @property Barangay barangay
 */
trait HasAddress
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function region()
    {
        return $this->belongsTo(config('address.model.region', Region::class), 'region_id', 'region_id')->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function province()
    {
        return $this->belongsTo(config('address.model.province', Province::class), 'province_id', 'province_id')->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(config('address.model.city', City::class), 'city_id', 'city_id')->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function barangay()
    {
        return $this->belongsTo(config('address.model.barangay', Barangay::class), 'barangay_id', 'code')->withDefault();
    }

    /**
     * @return string
     */
    public function getAddressAttribute()
    {
        return sprintf("%s %s, %s, %s",
            $this->street,
            $this->barangay->name,
            $this->city->name,
            $this->province->name
        );
    }
}
