<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LowonganPerusahaan extends Model
{
    use HasFactory;
    protected $table = 'lowongan_perusahaans';
    protected $guarded = [];

    public function perusahaan() {
        return $this->belongsTo(Perusahaan::class, 'perusahaan_id');
    }

    public function paket() {
        return $this->belongsTo(PaketLowongan::class, 'paket_id');
    }


}
