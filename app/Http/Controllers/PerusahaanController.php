<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    public function index(){
        return view('Perusahaan.dashboard-perusahaan');
    }

    //profile
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

    //lowongan
    public function lowongan(){
        return view('Perusahaan.Lowongan_saya.lowongan');
    }
    public function isi_lowongan(){
        return view('Perusahaan.Lowongan_saya.isi-lowongan');
    }
    public function edit_lowongan(){
        return view('Perusahaan.Lowongan_saya.edit-lowongan');
    }
    public function detail_lowongan(){
        return view('Perusahaan.Lowongan_saya.detail-lowongan');
    }
    public function kandidat(){
        return view('Perusahaan.kandidat');
    }

    //pengaturan
    public function pengaturan(){
        return view('Perusahaan.Pengaturan.pengaturan');
    }
    public function password(){
        return view('Perusahaan.Pengaturan.change-password');
    }
    
    //pelamar
    public function pelamar(){
        return view('Perusahaan.Pelamar.pelamar');
    }
    public function konfirmasi_terima_lamaran(){
        return view('Perusahaan.Pelamar.konfirmasi-terima-lamaran');
    }
     public function konfirmasi_lamaran_terkirim(){
        return view('Perusahaan.Pelamar.konfirmasi-lamaran-terkirim');
    }

    public function kandidat_ak(){
        return view('Perusahaan.Pelamar.Kandidat-AK.kandidat');
    }
    public function cv_kandidat(){
        return view('Perusahaan.Pelamar.Kandidat-AK.cv-kandidat');
    }


    //berlangganan
    public function berlangganan(){
        return view('Perusahaan.Berlangganan.index');
    }
    public function berlangganan_kandidat(){
        return view('Perusahaan.Berlangganan.kandidat');
    }
    public function kandidat_info(){
        return view('Perusahaan.Berlangganan.info-kandidat');
    }
}
