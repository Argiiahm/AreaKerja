<?php

namespace App\Http\Controllers;

use App\Models\CatatanCash;
use App\Models\CatatanKoin;
use App\Models\HargaKoin;
use Illuminate\Http\Request;
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
            "totalKoin"   =>   $totalKoin
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
            "pesanan" => "required",
            "total"   => "required|numeric"
        ]);

        $user = Auth::user();

        $totalSaldo = CatatanCash::where('user_id', $user->id)->sum('total');

        if ($totalSaldo < $request->total) {
            return back()->with('error', 'Saldo koin tidak mencukupi!');
        }

        $noref = "AK" . rand(1000000000, 9999999999);
        CatatanKoin::create([
            "user_id"      => $user->id,
            "no_referensi" => $noref,
            "pesanan"      => $request->pesanan,
            "dari"         => $user->username,
            "sumber_dana"  => "Koin-" . $user->username,
            "total"        => $request->total,
        ]);

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
        return back();
    }
}
