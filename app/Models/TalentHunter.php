<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TalentHunter extends Model
{
    use HasFactory;
    protected $table = 'talent_hunters';
    protected $guarded = [];

    public function perusahaan() {
        return $this->belongsTo(Perusahaan::class, 'perusahaan_id');
    }
}
