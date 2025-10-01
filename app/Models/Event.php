<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $guarded = [];

    public function kegiatan_events() {
        return $this->hasMany(KegiatanEvent::class, 'event_id');
    }

}
