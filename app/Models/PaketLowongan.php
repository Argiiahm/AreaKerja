<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketLowongan extends Model
{
    use HasFactory;
    protected $table = 'paket_lowongans';
    protected $guarded = [];

    public function lowongan() {
        return $this->hasMany(LowonganPerusahaan::class, 'paket_id');
    }
    

}
