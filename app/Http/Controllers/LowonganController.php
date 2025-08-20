<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LowonganController extends Controller
{
    public function index() {
        return view('pasang-lowongan');
    }

    public function lowongan_tersimpan() {
        return view('Lowongan-tersimpan.index');
    }
}
