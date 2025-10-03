<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembeliKandidat extends Model
{
    use HasFactory;
    protected $table = 'pembeli_kandidats';
    protected $guarded = [];

    public function pelamar() {
        return $this->belongsTo(Pelamar::class, 'pelamar_id');
    }

    public function lowongan_perusahaan() {
        return $this->belongsTo(LowonganPerusahaan::class, 'lowongan_id');
    }

}
