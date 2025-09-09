<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatatanCash extends Model
{
    use HasFactory;
    protected $table = 'catatan_cashes';
    protected $guarded = [];

    public function users() {
        return $this->belongsTo(User::class, 'user_id');
    }

}
