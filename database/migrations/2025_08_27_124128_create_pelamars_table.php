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
        Schema::create('pelamars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama_pelamar')->nullable();
            $table->string('deskripsi_diri')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('gender',['laki-laki','perempuan'])->nullable();
            $table->string('telepon_pelamar')->nullable();
            $table->string('divisi')->nullable();
            $table->date('mulai_pelatihan')->nullable(); 
            $table->date('selesai_pelatihan')->nullable();
            $table->string('img_profile')->default('black.png');
            $table->enum('kategori',['pelamar','calon kandidat','kandidat aktif','kandidat nonaktif'])->nullable();
            $table->string('gaji_minimal')->nullable();
            $table->string('gaji_maksimal')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelamars');
    }
};
