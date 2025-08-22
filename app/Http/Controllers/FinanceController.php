<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function index() {
        return view('Dashboard-finance.dashboard',[
            "title"    =>     "Dashboard"
        ]);
    }

    public function paket_harga() {
        return view('Dashboard-finance.paket-harga_finance',[
            "title"   =>    "Paket Harga"
        ]);
    }

    public function omset() {
        return view('Dashboard-finance.omset-finance',[
            "title"   =>    "Omset Perusahaan"
        ]);
    }

    public function catatan_transaksi() {
        return view('Dashboard-finance.catatan_transaksi',[
            "title"   =>    "Catatan Transaksi"
        ]);
    }

    public function catatan_transaksi_tunai_detail() {
        return view('Dashboard-finance.riwayat-transaksi_tunai',[
            "title"   =>     "Catatan Transaksi"
        ]);
    }
    public function catatan_transaksi_koin_detail() {
        return view('Dashboard-finance.riwayat-transaksi_koin',[
            "title"   =>     "Catatan Transaksi"
        ]);
    }

    public function catatan_laporan_transaksi() {
        return view('Dashboard-finance.laporan-transaksi',[
            "title"   =>     "Catatan Transaksi"
        ]);
    }

    public function catatan_laporan_transaksi_penghasilan() {
        return view('Dashboard-finance.details-laporan_transaksi_penghasilan',[
            "title"   =>      "Catatan Transaksi"
        ]);
    }
}
