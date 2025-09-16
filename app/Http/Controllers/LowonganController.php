<?php

namespace App\Http\Controllers;

use App\Models\HargaKoin;
use App\Models\CatatanCash;
use App\Models\CatatanKoin;
use App\Models\LowonganPerusahaan;
use Illuminate\Http\Request;
use App\Models\PaketLowongan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LowonganController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $koin = CatatanCash::where('user_id', $user)->where('status', 'diterima')->get();
        $totalKoin = CatatanCash::where('user_id', Auth::id())->where('status', 'diterima')->sum('total');

        return view('pasang-lowongan', [
            "Data"   =>    HargaKoin::all(),
            "data"   =>    $koin,
            "totalKoin"   =>   $totalKoin,
            "Pakets"   =>    PaketLowongan::all()
        ]);
    }

    public function lowongan_tersimpan()
    {
        return view('Lowongan-tersimpan.index');
    }

    public function lowongan_tersimpan_detail()
    {
        return view('Lowongan-tersimpan.lowongan-tersimpan_detail');
    }

    public function topup(Request $request)
    {
        $request->validate([
            "pesanan"   => "required",
            "total"     => "required|numeric",
            "paket_id"  => "required",
            "id_lowongan" => "required" // wajib pilih lowongan
        ]);

        $user = Auth::user();

        // hitung total saldo user
        $totalSaldo = CatatanCash::where('user_id', $user->id)->sum('total');

        if ($totalSaldo < $request->total) {
            return back()->with('error', 'Saldo koin tidak mencukupi!');
        }

        // simpan catatan koin
        $noref = "AK" . rand(1000000000, 9999999999);
        CatatanKoin::create([
            "user_id"      => $user->id,
            "no_referensi" => $noref,
            "pesanan"      => $request->pesanan,
            "dari"         => $user->username,
            "sumber_dana"  => "Koin-" . $user->username,
            "total"        => $request->total,
        ]);

        // potong saldo cash user
        $sisaKurang = $request->total;
        $cashRecords = CatatanCash::where('user_id', $user->id)->orderBy('created_at', 'asc')->get();

        foreach ($cashRecords as $record) {
            if ($sisaKurang <= 0) break;

            if ($record->total <= $sisaKurang) {
                $sisaKurang -= $record->total;
                $record->total = 0;
            } else {
                $record->total -= $sisaKurang;
                $sisaKurang = 0;
            }
            $record->save();
        }

        // update paket_id pada lowongan
        $lowongan = LowonganPerusahaan::find($request->id_lowongan);
        if ($lowongan) {
            $lowongan->paket_id = $request->paket_id;
            $lowongan->save();
        }

        return back()->with('success', 'Lowongan berhasil dipasang dengan paket ' . $request->pesanan);
    }
}
