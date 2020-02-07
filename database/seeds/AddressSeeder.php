<?php

use Illuminate\Database\Seeder;
use Yajra\Address\Entities\Barangay;
use Rap2hpoutre\FastExcel\FastExcel;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Box\Spout\Common\Exception\IOException
     * @throws \Box\Spout\Common\Exception\UnsupportedTypeException
     * @throws \Box\Spout\Reader\Exception\ReaderNotOpenedException
     */
    public function run()
    {
        $publication = config('address.publication.path', __DIR__ . '/publication/PSGC_Publication_Dec2019.xlsx');
        $sheet       = config('address.publication.sheet', 4);

        $regions   = [];
        $provinces = [];
        $cities    = [];
        $barangays = [];

        (new FastExcel)
            ->sheet($sheet)
            ->import($publication, function ($line) use (&$regions, &$provinces, &$cities, &$barangays) {
                $attributes              = [];
                $attributes['code']      = $line['Code'];
                $attributes['name']      = $line['Name'];
                $attributes['region_id'] = substr($attributes['code'], 0, 2);

                switch ($line['Geographic Level']) {
                    case 'Reg':
                        $regions[] = $attributes;
                        break;

                    case 'Prov':
                        $attributes['province_id'] = substr($attributes['code'], 0, 4);

                        $provinces[] = $attributes;
                        break;

                    case 'Bgy':
                        $attributes['province_id'] = substr($attributes['code'], 0, 4);
                        $attributes['city_id']     = substr($attributes['code'], 0, 6);

                        $barangays[] = $attributes;
                        break;

                    default:
                        $attributes['province_id'] = substr($attributes['code'], 0, 4);
                        $attributes['city_id']     = substr($attributes['code'], 0, 6);

                        $cities[] = $attributes;
                        break;
                }
            });

        $region = config('address.models.region', Region::class);
        $region::query()->insert($regions);

        $province = config('address.models.province', Province::class);
        collect($provinces)->chunk(100)->each(function ($chunk) use ($province) {
            $province::query()->insert($chunk->toArray());
        });

        $city = config('address.models.city', City::class);
        collect($cities)->chunk(100)->each(function ($chunk) use ($city) {
            $city::query()->insert($chunk->toArray());
        });

        $barangay = config('address.models.barangay', Barangay::class);
        collect($barangays)->chunk(100)->each(function ($chunk) use ($barangay) {
            $barangay::query()->insert($chunk->toArray());
        });
    }
}
