<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\CatatanCash;
use App\Models\Divisi;
use Illuminate\Http\Request;
use App\Models\HargaPembayaran;
use App\Models\PembeliKandidat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KandidatController extends Controller
{
    public function index()
    {
        $harga = HargaPembayaran::where('id', 1)->get()->first();

        return view('daftar-kandidat', [
            "payment"   =>    Bank::all(),
            "divisi"    =>    Divisi::all(),
            "Harga"     =>    $harga
        ]);
    }

    public function transaksi(Request $request)
    {
        // dd($request->all());
        $pelamar = Auth::user()->pelamars;
        $noref = "AK" . rand(1000000, 9000000);
        $Pembayaran = HargaPembayaran::where('id', $request->harga_pembayaran)->get()->first();
        $Bank = Bank::where('id', $request->id_bank)->get()->first();

        $validasi_data = $request->validate([
            'no_referensi'  =>   "nullable",
            'pesanan'       =>   "nullable",
            'dari'          =>   "nullable",
            'sumber_dana'   =>   "nullable",
            'total'         =>   "nullable",
            'status'        =>   "nullable"
        ]);

        $validasi_data['user_id'] = Auth::user()->id;
        $validasi_data['no_referensi'] = $noref;
        $validasi_data['pesanan'] = $Pembayaran->nama;
        $validasi_data['dari'] = $pelamar->nama_pelamar;
        $validasi_data['sumber_dana'] = $Bank->nama_bank;
        $validasi_data['total'] = $Pembayaran->jumlah_koin;
        $validasi_data['status'] = "pending";
        $validasi_data['expired_date'] = now()->addHours(24);



        $pembeli = CatatanCash::create($validasi_data);


        return redirect('/daftarkandidat')->with('konfirmasi_transaksi', [
            "id"   =>    $pembeli->id,
            "no_referensi" => $noref,
            "pesanan"   =>   $Pembayaran->nama,
            "dari"     =>  $pelamar->nama_pelamar,
            "sumber_dana"  =>  $Bank->nama_bank,
            "total"    =>   $Pembayaran->harga
        ]);
    }

    public function transaksi_detail(CatatanCash $p)
    {

        if ($p->status === 'pending' && now()->greaterThan($p->expired_date)) {
            abort(404, 'Halaman Tidak Tersedia!');
        }

        if ($p->status !== 'pending') {
            return redirect('/profile')->with('success_topup', 'pembayaran berhasil');
        }

        $bank = Bank::where('nama_bank', $p->sumber_dana)->first();
        $pembayaran = CatatanCash::where('total', $p->total)->first();


        return view('Detail-tf_pembayaran.detail_pembeli_kandidat', [
            "Data"   =>   $p,
            "Bank"   =>   $bank,
            "pembayaran"  =>  $pembayaran
        ]);
    }

    public function transaksi_update(Request $request, CatatanCash $p)
    {
        $validasi = $request->validate([
            "bukti"    =>     "required|file|image|mimes:png,jpg,jpeg"
        ]);

        if ($request->hasFile('bukti')) {
            if ($p->$p && Storage::exists('public/' . $p->$p)) {
                Storage::delete('public/' . $p->$p);
            }
            $validasi['bukti'] = $request->file('bukti')->store('images', 'public');
        }

        $p->update($validasi);

        return back();
    }


    public function kandidat_kosong()
    {
        return view('kandidat.kandidat-kosong');
    }

    public function kandidat_lengkap()
    {
        return view('kandidat.kandidat-lengkap');
    }

    public function rekrut()
    {
        return view('kandidat.rekrut');
    }

    public function rekrut_detail()
    {
        return view('kandidat.rekrut-detail');
    }

    public function status()
    {
        return view('kandidat.status-profile');
    }
}
