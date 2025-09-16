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
        Schema::create('lowongan_perusahaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perusahaan_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama')->nullable();
            $table->string('slug')->nullable();
            $table->string('jenis')->nullable();
            $table->tinyInteger('rekomendasi')->default(0);
            $table->string('gaji_awal')->nullable();
            $table->string('gaji_akhir')->nullable();
            $table->string('label_gaji')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kategori')->nullable();
            $table->date('batas_lamaran')->nullable();
            $table->text('syarat_pekerjaan')->nullable();
            $table->text('tanggung_jawab')->nullable();
            $table->text('benefit')->nullable();
            $table->foreignId('paket_id')->nullable()->constrained('paket_lowongans')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lowongan_perusahaans');
    }
};
