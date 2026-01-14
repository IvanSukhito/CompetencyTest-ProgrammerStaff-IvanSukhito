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
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_karyawan',255)->nullable();
            $table->date('tanggal_lahir');
            $table->unsignedBigInteger('jabatan_id')->nullable();
            $table->unsignedBigInteger('kota_id')->nullable();
            $table->foreign('jabatan_id')->references('id')->on('jabatan')->onDelete('CASCADE');
            $table->foreign('kota_id')->references('id')->on('kota')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawan');
    }
};
