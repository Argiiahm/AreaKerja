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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('status')->nullable();
            $table->string('title')->nullable();
            $table->string('pendaftaran')->nullable();
            $table->string('kuota')->nullable();
            $table->string('image')->nullable();
            $table->text('content')->nullable();
            $table->date('tgl_mulai')->nullable();
            $table->string('jam_mulai')->nullable();
            $table->date('tgl_akhir')->nullable();
            $table->string('jam_akhir')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('link_form')->nullable();
            $table->date('penutupan_pendaftaran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
