<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KandidatController extends Controller
{
    public function index() {
        return view('daftar-kandidat');
    }

    public function kandidat_kosong(){
        return view('kandidat.kandidat-kosong');
    }

    public function kandidat_lengkap(){
        return view('kandidat.kandidat-lengkap');
    }

    public function rekrut(){
        return view('kandidat.rekrut');
    }

    public function rekrut_detail(){
        return view('kandidat.rekrut-detail');
    }
    
    public function status(){
        return view('kandidat.status-profile');
    }
}
