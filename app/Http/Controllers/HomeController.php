<?php

namespace App\Http\Controllers;

use App\Models\LowonganPerusahaan;
use App\Models\PelamarLowongan;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            "Data"  =>    LowonganPerusahaan::all(),
            "Pesan"  =>   PelamarLowongan::all()
        ]);
    }

    public function viewjob(LowonganPerusahaan $job)
    {
        return view('details-job', [
            "Data"  =>   $job,
            "Pesan" =>   PelamarLowongan::all()
        ]);
    }

    public function read_detail_notif(PelamarLowongan $lowongan)
    {
        $lowongan->timestamps = false;
        $lowongan->is_read = true;
        $lowongan->save();
        return view('detail_status-melamar',[
            "Data"  => $lowongan
        ]);
    }
}
