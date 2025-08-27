<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamatpelamar extends Model
{
    use HasFactory;
    protected $table = 'alamatpelamars';
    protected $guarded = [];

    public function pelamars() {
        return $this->belongsTo(Pelamar::class, 'pelamar_id');
    }

}
