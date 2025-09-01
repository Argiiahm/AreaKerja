<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamatperusahaan extends Model
{
    use HasFactory;
    protected $table = 'alamatperusahaans';
    protected $guarded = [];

    public function perusahaan() {
        return $this->belongsTo(Perusahaan::class, 'perusahaan_id');
    }

}
