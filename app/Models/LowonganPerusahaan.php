<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LowonganPerusahaan extends Model
{
    use HasFactory;
    protected $table = 'lowongan_perusahaans';
    protected $guarded = [];
    protected $casts = [
        'syarat_pekerjaan' => 'array'
    ];

    /**
     * Global scope: otomatis sembunyikan lowongan yang belum dipublish
     * atau yang waktu publish-nya (expired_date) sudah habis.
     * Berlaku untuk semua query tanpa perlu cron/scheduler.
     * Gunakan ->withoutGlobalScope('aktif') untuk bypass (misal di halaman admin/perusahaan).
     */
    protected static function booted()
    {
        static::addGlobalScope('aktif', function (Builder $builder) {
            $builder->whereNotNull('paket_id')
                    ->where(function ($q) {
                        $q->whereNull('expired_date')
                          ->orWhere('expired_date', '>=', now());
                    });
        });
    }

    /**
     * Override route model binding agar admin/perusahaan tetap bisa akses
     * lowongan yang sudah expired via URL (misal edit, detail, hapus).
     */
    public function resolveRouteBinding($value, $field = null)
    {
        return $this->withoutGlobalScope('aktif')
            ->where($field ?? $this->getRouteKeyName(), $value)
            ->firstOrFail();
    }

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'perusahaan_id');
    }

    public function paket()
    {
        return $this->belongsTo(PaketLowongan::class, 'paket_id');
    }

    public function simpan_lowongan()
    {
        return $this->belongsToMany(Pelamar::class, 'simpan_lowongans', 'lowongan_id', 'pelamar_id');
    }

    public function Pelamar()
    {
        return $this->belongsToMany(Pelamar::class, 'pelamar_lowongans', 'lowongan_id', 'pelamar_id');
    }

    public function pembeli_kandidat() {
        return $this->hasMany(PembeliKandidat::class, 'lowongan_id');
    }


}
