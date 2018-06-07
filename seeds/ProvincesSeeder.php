<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class ProvincesSeeder
 */
class ProvincesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (! DB::table('provinces')->count()) {
            DB::unprepared(file_get_contents(__DIR__ . '/sql/provinces.sql'));
        }
    }
}
