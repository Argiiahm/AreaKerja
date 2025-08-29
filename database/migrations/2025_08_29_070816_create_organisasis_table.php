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
        Schema::create('pengalaman_organisasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelamar_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama_organisasi')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('tahun_awal')->nullable();
            $table->string('tahun_akhir')->nullable();
            $table->string('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengalaman_organisasis');
    }
};
