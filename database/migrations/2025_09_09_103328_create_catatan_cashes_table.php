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
        Schema::create('catatan_cashes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('no_referensi')->nullable();
            $table->string('pesanan')->nullable();
            $table->string('dari')->nullable();
            $table->string('sumber_dana')->nullable();
            $table->string('total')->nullable();
            $table->enum('status',['pending','diterima','ditolak'])->nullable();
            $table->string('bukti')->nullable();
            $table->timestamp('expired_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catatan_cashes');
    }
};
