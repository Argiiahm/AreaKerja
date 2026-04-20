<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Divisi;
use App\Models\Pelamar;
use App\Models\CatatanCash;
use Illuminate\Http\Request;
use App\Models\HargaPembayaran;
use App\Models\PembeliKandidat;
use App\Models\LowonganPerusahaan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KandidatController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $harga = HargaPembayaran::where('id', 1)->first();

        // Cek Pending User 
        $pending_kandidat = CatatanCash::where('user_id', $user->id)
            ->where('status', 'pending')
            ->whereNotNull('bukti')
            ->first();

        return view('daftar-kandidat', [
            "payment" => Bank::all(),
            "divisi" => Divisi::all(),
            "Harga" => $harga,
            "pending_kandidat" => $pending_kandidat
        ]);
    }

    public function transaksi(Request $request)
    {
        // dd($request->all());
        $pelamar = Auth::user()->pelamars;
        $noref = "AK" . rand(1000000, 9000000);
        $Pembayaran = HargaPembayaran::where('id', $request->harga_pembayaran)->first();
        $Bank = Bank::where('id', $request->id_bank)->first();

        $validasi_data = $request->validate([
            'divisi' => "required|array",
            'divisi.*' => "string",
        ]);

        $validasi_data = $request->validate([
            'no_referensi' => "nullable",
            'pesanan' => "nullable",
            'dari' => "nullable",
            'sumber_dana' => "nullable",
            'total' => "nullable",
            'status' => "nullable"
        ]);

        $validasi_data['user_id'] = Auth::user()->id;
        $validasi_data['no_referensi'] = $noref;
        $validasi_data['pesanan'] = $Pembayaran->nama;
        $validasi_data['dari'] = $pelamar->nama_pelamar;
        $validasi_data['sumber_dana'] = $Bank->nama_bank;
        $validasi_data['total'] = $Pembayaran->jumlah_koin;
        $validasi_data['status'] = "pending";
        $validasi_data['expired_date'] = now()->addHours(24);

        session(['pending_kandidat_data' => $validasi_data]);
        session(['pending_kandidat_divisi' => $request->divisi]);

        return redirect('/daftarkandidat')->with('konfirmasi_transaksi', [
            "no_referensi" => $noref,
            "pesanan" => $Pembayaran->nama,
            "dari" => $pelamar->nama_pelamar,
            "sumber_dana" => $Bank->nama_bank,
            "total" => $Pembayaran->harga
        ]);
    }

    public function transaksi_preview()
    {
        if (!session()->has('pending_kandidat_data')) {
            return redirect('/daftarkandidat')->with('error', 'Sesi tidak valid.');
        }

        $pendingData = session('pending_kandidat_data');
        $bank = Bank::where('nama_bank', $pendingData['sumber_dana'])->first();
        $pembayaran = HargaPembayaran::where('nama', $pendingData['pesanan'])->first();

        $trx = new CatatanCash($pendingData);
        $trx->created_at = now();

        return view('Detail-tf_pembayaran.detail_pembeli_kandidat', [
            "Data" => $trx,
            "Bank" => $bank,
            "pembayaran" => $pembayaran,
            "isPreview" => true
        ]);
    }

    public function final_upload_transaksi(Request $request)
    {
        if (!session()->has('pending_kandidat_data')) {
            return redirect('/daftarkandidat')->with('error', 'Sesi berakhir.');
        }

        $validasi = $request->validate([
            "bukti" => "required|file|image|mimes:png,jpg,jpeg"
        ]);

        $pendingData = session('pending_kandidat_data');
        $divisi = session('pending_kandidat_divisi');

        if ($request->hasFile('bukti')) {
            $pendingData['bukti'] = $request->file('bukti')->store('images', 'public');
        }

        CatatanCash::create($pendingData);
        if ($divisi) {
            $pelamar = Auth::user()->pelamars;
            $pelamar->update(['divisi' => json_encode($divisi)]);
        }

        session()->forget('pending_kandidat_data');
        session()->forget('pending_kandidat_divisi');
        session()->forget('konfirmasi_transaksi');

        return redirect()->route('kandidat.success');
    }

    public function transaksi_success()
    {
        return view('Detail-tf_pembayaran.success-kandidat');
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
        $pembayaran = HargaPembayaran::where('nama', $p->pesanan)->first();


        return view('Detail-tf_pembayaran.detail_pembeli_kandidat', [
            "Data" => $p,
            "Bank" => $bank,
            "pembayaran" => $pembayaran
        ]);
    }

    public function transaksi_update(Request $request, CatatanCash $p)
    {
        $validasi = $request->validate([
            "bukti" => "required|file|image|mimes:png,jpg,jpeg"
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
        $kandidat = Auth::user()->pelamars;
        $rekrut = PembeliKandidat::where('pelamar_id', $kandidat->id)
            ->with(['lowongan_perusahaan', 'lowongan_perusahaan.perusahaan'])
            ->get();
        return view('kandidat.rekrut', [
            "rekrut" => $rekrut
        ]);
    }

    public function rekrut_detail(PembeliKandidat $pembeli)
    {
        $pembeli->load(['lowongan_perusahaan', 'lowongan_perusahaan.perusahaan']);
        $lowongan = $pembeli->lowongan_perusahaan
            ? LowonganPerusahaan::where('perusahaan_id', $pembeli->lowongan_perusahaan->perusahaan_id)
                ->with('perusahaan')->get()
            : collect();

        return view('kandidat.rekrut-detail', [
            "Data" => $pembeli,
            "lowongan" => $lowongan
        ]);
    }

    public function diterima_kandidat(Request $request, PembeliKandidat $p)
    {
        $data = $request->validate([
            "status" => 'required'
        ]);

        $p->update($data);

        // Pelamar::where('id', $p->pelamar_id)->update([
        //     "kategori" => "kandidat nonaktif"
        // ]);

        return redirect()->back()->with('showModalSelesai', true);
    }
    public function ditolak_kandidat(Request $request, PembeliKandidat $p)
    {
        $request->validate([
            'status' => 'required',
            'alasan' => 'nullable',
            'alasan_lainya' => 'nullable|string'
        ]);

        $alasan = $request->alasan_lainya ?: $request->alasan;

        $p->update([
            'status' => $request->status,
            'alasan' => $alasan,
            'expired_date' => now()->addHours(24)
        ]);

        return redirect()->back()->with('showModalSelesaiTolak', true);
    }


    public function status()
    {
        return view('kandidat.status-profile');
    }
}
