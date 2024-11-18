<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('fact_kinerja_pegawai', function (Blueprint $table) {
            $table->decimal('longitude', 7, 5)->nullable()->after('jumlah_proyek');
            $table->decimal('latitude', 9, 5)->nullable()->after('longitude');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fact_kinerja_pegawai', function (Blueprint $table) {
            $table->dropColumn(['longitude', 'latitude']);
        });
    }
};
