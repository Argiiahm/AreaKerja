<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HargaPembayaran extends Model
{
    use HasFactory;
    protected $table = 'harga_pembayarans';
    protected $guarded = [];
}
