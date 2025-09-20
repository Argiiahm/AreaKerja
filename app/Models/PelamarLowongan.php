<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelamarLowongan extends Model
{
    use HasFactory;
    protected $table = 'pelamar_lowongans';
    protected $guarded = [];

    public function pelamars() {
        return $this->belongsTo(Pelamar::class, 'pelamar_lowongans', 'pelamar_id', 'lowongan_id');
    }

    public function lowongan() {
        return $this->belongsToMany(LowonganPerusahaan::class, 'pelamar_lowongans', 'pelamar_id', 'lowongan_id');
    }
}
