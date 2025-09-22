<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pelamar_lowongans', function (Blueprint $table) {
            $table->date('tanggal_wawancara')->nullable()->after('status');
            $table->time('waktu_wawancara')->nullable()->after('tanggal_wawancara');
            $table->string('tempat_wawancara')->nullable()->after('waktu_wawancara');
            $table->text('catatan_wawancara')->nullable()->after('tempat_wawancara');
        });
    }

    public function down(): void
    {
        Schema::table('pelamar_lowongans', function (Blueprint $table) {
            $table->dropColumn([
                'tanggal_wawancara',
                'waktu_wawancara',
                'tempat_wawancara',
                'catatan_wawancara'
            ]);
        });
    }
};
