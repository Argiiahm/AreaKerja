<?php

namespace App\Http\Controllers;

use App\Models\HargaKoin;
use App\Models\CatatanCash;
use App\Models\CatatanKoin;
use App\Models\TalentHunter;
use App\Models\Tipskerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TalentHunterController extends Controller
{
    public function index()
    {
        $totalKoin = CatatanCash::where('user_id', Auth::id())->where('status', 'diterima')->sum('total');
        $harga = HargaKoin::where('id', '4')->get()->first();
        return view('talentHunter', [
            "totalKoin"  =>  $totalKoin,
            "harga"  => $harga
        ]);
    }

    public function beli()
    {

        $hargaKoin = HargaKoin::where('id', 4)->value('harga') ?? 0;
        $user = Auth::user();

        $sisaKurang = $hargaKoin;
        $cashRecords = CatatanCash::where('user_id', $user->id)
            ->where('status', 'diterima')
            ->orderBy('created_at', 'asc')
            ->get();

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

        CatatanKoin::create([
            "user_id" => $user->id,
            "no_referensi" =>  'AK' . rand(100000, 999999),
            "pesanan"  =>   'Open Talent Hunter',
            "dari"  =>  "Koin-" . $user->perusahaan->nama_perusahaan,
            "sumber_dana" => $user->perusahaan->nama_perusahaan,
            "total" => $hargaKoin,
        ]);


        return back()->with('showModalForm', true)->with('success', 'Pembelian berhasil, lanjut isi form pendaftaran.');
    }

    public function isi_form(Request $request)
    {
        $validated = $request->validate([
            "perusahaan_id"     => "nullable",
            "alamat"            => "nullable",
            "posisi"            => "nullable",
            "pengalaman_kerja"  => "nullable",
            "gender"            => "nullable",
            "gaji_awal"         => "nullable",
            "gaji_akhir"        => "nullable",
            "deskripsi"        => "nullable",
        ]);

        $validated['perusahaan_id'] = Auth::user()->perusahaan->id;

        
        $perusahaan = Auth::user()->perusahaan;
        
        $nama_perusahaan = $perusahaan->nama_perusahaan ?? '-';
        $alamat = $validated['alamat'];
        $posisi = $validated['posisi'];
        $pengalaman_kerja = $validated['pengalaman_kerja'];
        $gender = $validated['gender'];
        $gaji_awal = number_format($validated['gaji_awal'], 0, ',', '.');
        $gaji_akhir = number_format($validated['gaji_akhir'], 0, ',', '.');
        
        $pesan = "Halo Talent Hunter 👋%0A"
        . "Saya ingin mendaftarkan perusahaan kami.%0A%0A"
        . "*Nama Perusahaan:* {$nama_perusahaan}%0A"
        . "*Alamat:* {$alamat}%0A"
        . "*Posisi yang Dibutuhkan:* {$posisi}%0A"
        . "*Pengalaman Kerja:* {$pengalaman_kerja}%0A"
        . "*Gender Kandidat:* {$gender}%0A"
        . "*Range Gaji:* Rp {$gaji_awal} - Rp {$gaji_akhir}%0A%0A"
        . "Mohon ditindaklanjuti ya, terima kasih 🙏";
        
        $nomorAdmin = "6287874732189";
        
        TalentHunter::create($validated);

        return redirect()->away("https://wa.me/{$nomorAdmin}?text={$pesan}");
    }
}
