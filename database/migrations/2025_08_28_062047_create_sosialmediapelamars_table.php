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
        Schema::create('sosialmediapelamars', function (Blueprint $table) {
            $table->id();
            $table->string("instagram")->default(null);
            $table->string("linkedin")->default(null);
            $table->string("website")->default(null);
            $table->string("twitter")->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sosialmediapelamars');
    }
};
