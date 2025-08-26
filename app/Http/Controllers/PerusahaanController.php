<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    public function index(){
        return view('Perusahaan.dashboard-perusahaan');
    }

    public function profile(){
        return view('Perusahaan.profile.profile');
    }

    public function edit_profile(){
        return view('Perusahaan.profile.edit-profile');
    }
    public function tambah_alamat(){
        return view('Perusahaan.profile.tambah-alamat');
    }
    public function isi_alamat(){
        return view('Perusahaan.profile.isi-alamat');
    }
    public function alamat_jadi(){
        return view('Perusahaan.profile.alamat-jadi');
    }

    public function lowongan(){
        return view('Perusahaan.Lowongan_saya.lowongan');
    }
    public function isi_lowongan(){
        return view('Perusahaan.Lowongan_saya.isi-lowongan');
    }
}
