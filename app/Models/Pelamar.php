<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelamar extends Model
{
    use HasFactory;
    protected $table = 'pelamars';
    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function organisasi()
    {
        return $this->hasMany(Organisasi::class, 'pelamar_id');
    }

    public function pengalaman_kerja()
    {
        return $this->hasMany(Pengalamankerja::class, 'pelamar_id');
    }

    public function riwayat_pendidikan()
    {
        return $this->hasMany(RiwayatPendidikan::class, 'pelamar_id');
    }

    public function alamat_pelamars()
    {
        return $this->hasMany(Alamatpelamar::class, 'pelamar_id');
    }

    public function skill()
    {
        return $this->hasMany(Skill::class, 'pelamar_id');
    }

    public function sosmed()
    {
        return $this->hasOne(Sosialmediapelamar::class, 'pelamar_id');
    }

    public function simpan_lowongan()
    {
        return $this->belongsToMany(LowonganPerusahaan::class, 'simpan_lowongans', 'pelamar_id', 'lowongan_id');
    }
}
