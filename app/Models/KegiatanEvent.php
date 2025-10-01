<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanEvent extends Model
{
    use HasFactory;
    protected $table = 'kegiatan_events';
    protected $guarded = [];

    public function event() {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
