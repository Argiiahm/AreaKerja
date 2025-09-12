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
        Schema::create('paket_lowongans', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->integer('publikasi')->nullable();
            $table->integer('batas_listing')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket_lowongans');
    }
};
