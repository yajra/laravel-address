<?php

namespace Yajra\Address;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Yajra\Address\Entities\Barangay;
use Yajra\Address\Entities\City;
use Yajra\Address\Entities\Province;
use Yajra\Address\Entities\Region;

/**
 * @property string $address
 * @property string $street
 * @property string $region_id
 * @property Region $region
 * @property string $province_id
 * @property Province $province
 * @property string $city_id
 * @property City $city
 * @property string $barangay_id
 * @property Barangay $barangay
 */
trait HasAddress
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Region>
     */
    public function region(): BelongsTo
    {
        return $this->belongsTo(config('address.model.region', Region::class), 'region_id', 'region_id')->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Province>
     */
    public function province(): BelongsTo
    {
        return $this->belongsTo(config('address.model.province', Province::class), 'province_id', 'province_id')->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<City>
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(config('address.model.city', City::class), 'city_id', 'city_id')->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Barangay>
     */
    public function barangay(): BelongsTo
    {
        return $this->belongsTo(config('address.model.barangay', Barangay::class), 'barangay_id', 'code')->withDefault();
    }

    public function getAddressAttribute(): string
    {
        return sprintf('%s %s, %s, %s',
            $this->street,
            $this->barangay->name,
            $this->city->name,
            $this->province->name
        );
    }
}
