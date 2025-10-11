<?php

namespace App\Http\Controllers;

use App\Models\LowonganPerusahaan;
use App\Models\PelamarLowongan;
use App\Models\PembeliKandidat;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            "Data"  =>    LowonganPerusahaan::all(),
            "Pesan"  =>   PelamarLowongan::all(),
            "PesanPerusahaan"  =>   PembeliKandidat::all()
        ]);
    }
    
    public function viewjob(LowonganPerusahaan $job)
    {
        return view('details-job', [
            "Data"  =>   $job,
            "Pesan" =>   PelamarLowongan::all(),
            "PesanPerusahaan"  =>   PembeliKandidat::all()
        ]);
    }

    public function read_detail_notif(PelamarLowongan $lowongan)
    {
        $lowongan->timestamps = false;
        $lowongan->is_read = true;
        $lowongan->save();
        if($lowongan->status === 'diterima'){
            return view('detail_status-melamar',[
                "Data"  => $lowongan
            ]);
        }elseif($lowongan->status === 'ditolak'){
            return view('detail_status-tolak-melamar',[
                "Data"  => $lowongan
            ]);
            
        }
    }
}
