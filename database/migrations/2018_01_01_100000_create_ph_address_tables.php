<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->id();
            $table->string('code', 9)->unique();
            $table->string('name');
            $table->string('region_id', 2)->index();
        });

        Schema::create('provinces', function (Blueprint $table) {
            $table->id();
            $table->string('code', 9)->unique();
            $table->string('name');
            $table->string('region_id', 2)->index();
            $table->string('province_id', 4)->index();
            $table->index(['region_id', 'province_id'], 'province_idx_1');
        });

        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('code', 9)->unique();
            $table->string('name');
            $table->string('region_id', 2)->index();
            $table->string('province_id', 4)->index();
            $table->string('city_id', 6)->index();

            $table->index(['region_id', 'province_id'], 'cities_idx_1');
            $table->index(['region_id', 'province_id', 'city_id'], 'cities_idx_2');
        });

        Schema::create('barangays', function (Blueprint $table) {
            $table->id();
            $table->string('code', 9)->unique();
            $table->string('name');
            $table->string('region_id', 2)->index();
            $table->string('province_id', 4)->index();
            $table->string('city_id', 6)->index();

            $table->index(['region_id', 'province_id'], 'barangay_idx_1');
            $table->index(['region_id', 'province_id', 'city_id'], 'barangay_idx_2');
        });
    }

    public function down(): void
    {
        Schema::drop('barangays');
        Schema::drop('cities');
        Schema::drop('provinces');
        Schema::drop('regions');
    }
};
