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
        Schema::create('perusahaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama_perusahaan')->nullable();
            $table->string('jenis_perusahaan')->nullable();
            $table->string('website_perusahaan')->nullable();
            $table->string('telepon_perusahaan')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('legalitas')->nullable();
            $table->string('deskripsi')->nullable();
            $table->string('visi')->nullable();
            $table->string('misi')->nullable();
            $table->string('koin_perusahaan')->nullable();
            $table->tinyInteger('is_berlangganan')->default(0);
            $table->string('img_profile')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perusahaans');
    }
};
