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

    public function perusahaan() {
        return $this->hasMany(Alamatperusahaan::class, 'perusahaan_id');
    }
}
