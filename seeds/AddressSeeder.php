<?php

use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RegionsSeeder::class);
        $this->call(ProvincesSeeder::class);
        $this->call(CitiesSeeder::class);
        $this->call(BarangaysSeeder::class);
    }
}
