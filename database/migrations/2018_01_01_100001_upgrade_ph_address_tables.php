<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('regions', function (Blueprint $table) {
            $table->string('code', 10)->change();
        });

        Schema::table('provinces', function (Blueprint $table) {
            $table->string('code', 10)->change();
            $table->string('province_id', 5)->change();
        });

        Schema::table('cities', function (Blueprint $table) {
            $table->string('code', 10)->change();
            $table->string('province_id', 5)->change();
            $table->string('city_id', 7)->change();
        });

        Schema::table('barangays', function (Blueprint $table) {
            $table->string('code', 10)->change();
            $table->string('region_id', 2)->change();
            $table->string('province_id', 5)->change();
            $table->string('city_id', 7)->change();
        });
    }

    public function down(): void
    {
        // touch move T_T
    }
};
