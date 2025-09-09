<?php

namespace App\Http\Controllers;

use App\Models\CatatanCash;
use App\Models\CatatanKoin;
use App\Models\HargaKoin;
use App\Models\HargaPembayaran;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function index()
    {
        return view('Dashboard-finance.dashboard', [
            "title"    =>     "Dashboard"
        ]);
    }

    public function paket_harga()
    {
        return view('Dashboard-finance.paket-harga_finance', [
            "title"   =>   "Paket Harga",
            "koin"    =>   HargaKoin::all(),
            "tunai"   =>   HargaPembayaran::all()
        ]);
    }
    public function edit_koin()
    {
        return view('Dashboard-finance.edit-paket-harga-koin', [
            "title"   =>    "Edit Harga",
            "koin"    =>     HargaKoin::all(),
        ]);
    }
    public function edit_harga()
    {
        return view('Dashboard-finance.edit-paket-harga-harga', [
            "title"   =>    "Edit Harga",
            "harga"   =>   HargaPembayaran::all()
        ]);
    }

    public function update_koin(Request $request)
    {


        foreach ($request->id as $i => $id) {
            $koin = HargaKoin::find($id);
            if ($koin) {
                $koin->harga = $request->harga[$i];
                $koin->save();
            }
        }

        return redirect('/dashboard/finance/paketharga');
    }
    public function update_harga(Request $request)
    {
        foreach ($request->id as $i => $id) {
            $harga = HargaPembayaran::find($id);
            if ($harga) {
                $harga->harga = $request->harga[$i];
                $harga->save();
            }
        }

        return redirect('/dashboard/finance/paketharga');
    }



    public function omset()
    {
        return view('Dashboard-finance.omset-finance', [
            "title"   =>    "Omset Perusahaan"
        ]);
    }

    public function catatan_transaksi()
    {
        return view('Dashboard-finance.catatan_transaksi', [
            "title"   =>    "Catatan Transaksi"
        ]);
    }

    public function catatan_transaksi_tunai_detail()
    {
        return view('Dashboard-finance.riwayat-transaksi_tunai', [
            "title"   =>     "Catatan Transaksi",
            "data"    =>     CatatanCash::all()
        ]);
    }
    public function catatan_transaksi_koin_detail()
    {
        return view('Dashboard-finance.riwayat-transaksi_koin', [
            "title"   =>     "Catatan Transaksi",
            "data"    =>     CatatanKoin::all() 
        ]);
    }

    public function catatan_laporan_transaksi()
    {
        return view('Dashboard-finance.laporan-transaksi', [
            "title"   =>     "Catatan Transaksi"
        ]);
    }

    public function catatan_laporan_transaksi_penghasilan()
    {
        return view('Dashboard-finance.details-laporan_transaksi_penghasilan', [
            "title"   =>      "Catatan Transaksi"
        ]);
    }
}
