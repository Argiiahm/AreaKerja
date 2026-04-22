<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;
    protected $table = 'perusahaans';
    protected $guarded = [];

    public function users() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function alamatperusahaan() {
        return $this->hasMany(Alamatperusahaan::class, 'perusahaan_id');
    }

    public function pasanglowongan() {
        return $this->hasMany(LowonganPerusahaan::class, 'perusahaan_id');
    }

    public function talent_hunter() {
        return $this->hasMany(TalentHunter::class, 'perusahaan_id');
    }

    public function getProfileCompletionPercentageAttribute()
    {
        $fields = [
            'nama_perusahaan',
            'jenis_perusahaan',
            'website_perusahaan',
            'telepon_perusahaan',
            'visi',
            'misi',
            'img_profile',
            'deskripsi'
        ];

        $completed = 0;
        foreach ($fields as $field) {
            if (!empty($this->$field)) {
                $completed++;
            }
        }

        $total = count($fields) + 1; // +1 for alamat
        if ($this->alamatperusahaan()->exists()) {
            $completed++;
        }

        return (int) round(($completed / $total) * 100);
    }

}
