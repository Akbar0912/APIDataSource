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
        Schema::create('fact_kinerja_pegawai', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('departemen_id');
            $table->unsignedBigInteger('jabatan_id');
            $table->decimal('nilai_kinerja', 5, 2);
            $table->decimal('gaji', 10, 2);
            $table->integer('jumlah_proyek');
            $table->timestamps();

            $table->foreign('employee_id')->references('employee_id')->on('dim_employee');
            $table->foreign('departemen_id')->references('departemen_id')->on('dim_departemen');
            $table->foreign('jabatan_id')->references('jabatan_id')->on('dim_jabatan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fact_kinerja_pegawai');
    }
};
