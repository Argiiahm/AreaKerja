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
        Schema::create('riwayat_pendidikans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelamar_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('pendidikan')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('asal_pendidikan')->nullable();
            $table->string('tahun_awal')->nullable();
            $table->string('tahun_akhir')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_pendidikans');
    }
};
