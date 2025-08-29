<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    use HasFactory;
    protected $table = 'pengalaman_organisasis';
    protected $guarded = [];

    public function pelamars() {
        return $this->belongsTo(User::class, 'pelamar_id');
    }
}
