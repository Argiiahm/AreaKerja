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
            $table->string('nama_pelamar');
            $table->string('deskripsi_diri');
            $table->date('tanggal_lahir');
            $table->enum('gender',['laki-laki','perempuan'])->default(null);
            $table->string('telepon_pelamar')->default(null);
            $table->string('divisi')->default(null);
            $table->date('mulai_pelatihan')->default(null);
            $table->date('selesai_pelatihan')->default(null);
            $table->string('img_profile')->default('black.png');
            $table->enum('kategori',['pelamar','calon kandidat','kandidat aktif','kandidat nonaktif'])->default(null);
            $table->string('gaji_minimal')->default(null);
            $table->string('gaji_maksimal')->default(null);
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
