<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daerah extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'daerah';

    public function kabupaten() {
        return $this->belongsTo(Kabupaten::class, 'kabupaten_id');
    }
}
