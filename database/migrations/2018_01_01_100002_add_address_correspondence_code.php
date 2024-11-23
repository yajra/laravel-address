<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('regions', function (Blueprint $table) {
            $table->string('correspondence_code', 9)->after('code');
        });

        Schema::table('provinces', function (Blueprint $table) {
            $table->string('correspondence_code', 9)->after('code');
        });

        Schema::table('cities', function (Blueprint $table) {
            $table->string('correspondence_code', 9)->after('code');
        });

        Schema::table('barangays', function (Blueprint $table) {
            $table->string('correspondence_code', 9)->after('code');
        });
    }

    public function down(): void
    {
        Schema::dropColumns('regions', ['correspondence_code']);
        Schema::dropColumns('provinces', ['correspondence_code']);
        Schema::dropColumns('cities', ['correspondence_code']);
        Schema::dropColumns('barangays', ['correspondence_code']);
    }
};
