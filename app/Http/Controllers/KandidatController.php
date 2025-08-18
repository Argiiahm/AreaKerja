<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KandidatController extends Controller
{
    public function index() {
        return view('daftar-kandidat');
    }
}
