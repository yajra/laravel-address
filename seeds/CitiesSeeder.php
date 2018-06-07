<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class CitiesSeeder
 */
class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (! DB::table('cities')->count()) {
            DB::unprepared(file_get_contents(__DIR__ . '/sql/cities.sql'));
        }
    }
}
