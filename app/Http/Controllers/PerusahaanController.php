<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\User;
use App\Models\Event;
use App\Models\Daerah;
use App\Models\Divisi;
use App\Models\Pelamar;
use App\Models\Provinsi;
use App\Models\HargaKoin;
use App\Models\Kabupaten;
use App\Models\Perusahaan;
use App\Models\CatatanCash;
use App\Models\CatatanKoin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\HargaPembayaran;
use App\Models\PelamarLowongan;
use App\Models\PembeliKandidat;
use App\Models\Alamatperusahaan;
use App\Models\LowonganPerusahaan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class PerusahaanController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $totalSaldo = CatatanCash::where('user_id', $user->id)->where('status', 'diterima')->sum('total');

        return view('Perusahaan.dashboard-perusahaan', [
            "data"      =>      HargaPembayaran::all(),
            "payment"      =>    Bank::all(),
            "totalSaldo"   =>    $totalSaldo
        ]);
    }

    public function topup(Request $request)
    {
        // dd($request->all());
        // dd($request->id_koin);

        $koin = HargaPembayaran::where('id', $request->id_koin)->get()->first();
        $bank = Bank::where('id', $request->id_bank)->get()->first();
        $noref = "AK" . rand(1000000000, 9999999999);

        $validasi = $request->validate([
            'no_referensi'  =>   "nullable",
            'pesanan'       =>   "nullable",
            'dari'          =>   "nullable",
            'sumber_dana'   =>   "nullable",
            'total'         =>   "nullable",
            'status'        =>   "nullable"
        ]);

        $validasi['user_id']  =   Auth::user()->id;
        $validasi['no_referensi'] = $noref;
        $validasi['pesanan'] = $koin->nama;
        $validasi['dari']  =   Auth::user()->username;
        $validasi['sumber_dana'] = $bank->nama_bank;
        $validasi['total'] = $koin->jumlah_koin;
        $validasi['status'] = 'pending';
        $validasi['expired_date'] = now()->addHours(24);

        $transaksi = CatatanCash::create($validasi);
        return back()->with('success_topup', [
            "id"          =>   $transaksi->id,
            'no_referensi' => $noref,
            'pesanan' => $koin->nama,
            'dari' => Auth::user()->username,
            'sumber_dana' => $bank->nama_bank,
            'total' => $koin->harga + 2000,
        ]);
    }

    public function detail_pembayaran(CatatanCash $trx)
    {
        if ($trx->status === 'pending' && now()->greaterThan($trx->expired_date)) {
            abort(404, 'Halaman Tidak Tersedia!');
        }

        if ($trx->status !== 'pending') {
            abort(404, 'Top Up Berhasil');
        }

        $bank = Bank::where('nama_bank', $trx->sumber_dana)->first();
        $pembayaran = HargaPembayaran::where('jumlah_koin', $trx->total)->first();
        $pembayaran = HargaPembayaran::where('jumlah_koin', $trx->total)->first();

        return view('Detail-tf_pembayaran.detail-transaksi_pembayaran', [
            "Data"   =>    $trx,
            "Bank"   =>    $bank,
            "pembayaran" =>   $pembayaran
        ]);
    }

    public function uploadBukti(Request $request, CatatanCash $bukti)
    {
        $validasi = $request->validate([
            "bukti"    =>     "required|file|image|mimes:png,jpg,jpeg"
        ]);

        if ($request->hasFile('bukti')) {
            if ($bukti->$bukti && Storage::exists('public/' . $bukti->$bukti)) {
                Storage::delete('public/' . $bukti->$bukti);
            }
            $validasi['bukti'] = $request->file('bukti')->store('images', 'public');
        }

        $bukti->update($validasi);

        return back();
    }



    //profile
    public function profile()
    {
        return view('Perusahaan.profile.profile');
    }

    public function edit_profile()
    {
        return view('Perusahaan.profile.edit-profile');
    }

    public function update_profile(Request $request, Perusahaan $perusahaan)
    {

        $v = $request->validate([
            'nama_perusahaan'    =>      "nullable",
            'jenis_perusahaan'    =>      "nullable",
            'website_perusahaan'    =>      "nullable",
            'telepon_perusahaan'    =>      "nullable",
            'whatsapp'    =>      "nullable",
            'legalitas'    =>      "nullable",
            'deskripsi'    =>      "nullable",
            'visi'    =>      "nullable",
            'misi'    =>      "nullable",
            'img_profile'  =>    "nullable"
        ]);


        if ($request->hasFile('img_profile')) {

            if ($perusahaan->img_profile && Storage::exists('public/' . $perusahaan->img_profile)) {
                Storage::delete('public/' . $perusahaan->img_profile);
            }

            $v['img_profile'] = $request->file('img_profile')->store('images', 'public');
        }

        $perusahaan->update($v);
        return redirect('/dashboard/perusahaan/profile');
    }

    public function tambah_alamat()
    {
        return view('Perusahaan.profile.tambah-alamat');
    }
    public function isi_alamat()
    {
        return view('Perusahaan.profile.isi-alamat', [
            "Provinsi"    =>    Provinsi::all(),
            "Kabupaten"   =>    Kabupaten::all(),
            "Daerah"      =>  Daerah::all()
        ]);
    }

    public function create_alamat(Request $request)
    {
        $vData = $request->validate([
            'label'  => 'nullable',
            'desa'   => 'nullable',
            'kecamatan' => 'nullable',
            'kota'  =>  'nullable',
            'provinsi' => 'nullable',
            'kode_pos' => 'nullable',
            'detail' =>   'nullable'
        ]);

        $vData['perusahaan_id'] = Auth::user()->perusahaan->id;
        $vData['detail'] = $request->desa . ', ' . $request->kecamatan . ', ' . $request->kota . ', ' . $request->provinsi;

        Alamatperusahaan::create($vData);
        return redirect('/dashboard/perusahaan/tambah/alamat');
    }

    public function edit_alamat(Alamatperusahaan $alamatperusahaan)
    {
        return view('Perusahaan.profile.edit-alamat', [
            "Data"      =>     $alamatperusahaan
        ]);
    }

    public function update_alamat(Request $request, Alamatperusahaan $alamatperusahaan)
    {
        dd($request->all());
        $vData = $request->validate([
            'label'  => 'nullable',
            'desa'   => 'nullable',
            'kecamatan' => 'nullable',
            'kota'  =>  'nullable',
            'provinsi' => 'nullable',
            'kode_pos' => 'nullable',
            'detail' =>   'nullable'
        ]);

        $vData['perusahaan_id'] = Auth::user()->perusahaan->id;
        $vData['detail'] = $request->desa . ', ' . $request->kecamatan . ', ' . $request->kota . ', ' . $request->provinsi;


        $alamatperusahaan->update($vData);
        return redirect('/dashboard/perusahaan/tambah/alamat');
    }


    //lowongan
    public function lowongan()
    {
        $data = LowonganPerusahaan::all();
        foreach ($data as $d) {
            if (now()->greaterThan($d->expired_date)) {
                $d->paket_id = null;
                $d->expired_date = null;
                $d->save();
            }
        }

        return view('Perusahaan.Lowongan_saya.lowongan', [
            "Data"  => $data
        ]);
    }

    public function isi_lowongan()
    {
        return view('Perusahaan.Lowongan_saya.isi-lowongan');
    }

    public function create_lowongan(Request $request)
    {
        $v = $request->validate([
            "nama"    =>    "required",
            "alamat"  =>    "required",
            "jenis"   =>    "required",
            "gaji_awal"  =>   "required",
            "gaji_akhir"  =>   "required",
            "deskripsi"   =>    "required",
            "syarat_pekerjaan"  =>   "required",
            "batas_lamaran"        =>   "required"
        ]);

        $v['perusahaan_id']  = Auth::user()->perusahaan->id;
        $v['slug'] = Str::slug($request->nama) . '-' . uniqid();
        $v['tanggung_jawab']  = Auth::user()->perusahaan->nama_perusahaan;
        LowonganPerusahaan::create($v);
        return redirect('/dashboard/perusahaan/lowongan');
    }

    public function edit_lowongan(LowonganPerusahaan $lowongan)
    {

        return view('Perusahaan.Lowongan_saya.edit-lowongan', [
            "data"   =>  $lowongan
        ]);
    }

    public function update_lowongan(Request $request, LowonganPerusahaan $lowongan)
    {
        $v = $request->validate([
            "nama"    =>    "required",
            "alamat"  =>    "required",
            "jenis"   =>    "required",
            "gaji_awal"  =>   "required",
            "gaji_akhir"  =>   "required",
            "deskripsi"   =>    "required",
            "syarat_pekerjaan"  =>   "required",
            "batas_lamaran"        =>   "required"
        ]);

        $v['perusahaan_id'] = Auth::user()->perusahaan->id;

        $lowongan->update($v);
        return redirect('/dashboard/perusahaan/lowongan');
    }
    public function hapus_lowongan(LowonganPerusahaan $lowongan)
    {
        $lowongan->destroy($lowongan->id);
        return redirect('/dashboard/perusahaan/lowongan');
    }


    public function detail_lowongan(LowonganPerusahaan $lowongan)
    {
        return view('Perusahaan.Lowongan_saya.detail-lowongan', [
            "data"    =>   $lowongan,
            "Data"    =>   LowonganPerusahaan::all()
        ]);
    }
    public function kandidat()
    {
        $perusahaan = Auth::user()->perusahaan;
        $lowonganIds = $perusahaan->pasanglowongan->pluck('id');
        $Kandidats = PembeliKandidat::whereIn('lowongan_id', $lowonganIds)->get();
        return view('Perusahaan.kandidat', [
            "Kandidats"  =>   $Kandidats,
            "Skills"     =>    Divisi::all()
        ]);
    }

    public function kandidat_delete(PembeliKandidat $kandidat) {
        $kandidat->destroy($kandidat->id);
        return back();
    }

    //pengaturan
    public function pengaturan()
    {
        return view('Perusahaan.Pengaturan.pengaturan');
    }
    public function password()
    {
        return view('Perusahaan.Pengaturan.change-password');
    }

    public function password_change(Request $request, User $user)
    {
        $request->validate([
            "password" => "required",
            "password_new" => "required|min:6|confirmed",
        ], [
            "password.required" => "Kata sandi lama wajib diisi",
            "password_new.required" => "Kata sandi baru wajib diisi",
            "password_new.min" => "Kata sandi baru minimal 6 karakter",
            "password_new.confirmed" => "Kata sandi tidak sama",
        ]);

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Kata sandi salah'])->withInput();
        }

        if ($request->password === $request->password_new) {
            return back()->withErrors(['password_new' => 'Kata sandi tidak bisa sama dengan sandi lama'])->withInput();
        }

        $user->update([
            'password' => Hash::make($request->password_new)
        ]);

        return redirect('/dashboard/perusahaan/pengaturan')->with('success', 'berhasil di ubah');
    }

    public function email(){
        return view('Perusahaan.Pengaturan.change-email');
    }

    public function email_change(Request $request, User $user){
        $v = $request->validate([
            "email"  => 'required|email'
        ]);

        $user->update($v);
        return back()->with('email_success', 'Email berhasil diganti!');
    }


    //pelamar
    public function pelamar(LowonganPerusahaan $lowongan)
    {
        // dd($lowongan);
        return view('Perusahaan.Pelamar.pelamar', [
            "data"  =>  $lowongan,
            "datas" => PelamarLowongan::all()
        ]);
    }
    public function formKonfirmasiLamaran(Request $request, PelamarLowongan $lowongan)
    {

        return view('Perusahaan.Pelamar.konfirmasi-terima-lamaran', [
            "Data"  =>   $lowongan
        ]);
    }
    public function formTolakLamaran(Request $request, PelamarLowongan $lowongan)
    {
        return view('perusahaan.pelamar.konfirmasi-tolak-lamaran', [
            "Data"  =>   $lowongan
        ]);
    }

    public function konfirmasi_lamaran(Request $request, PelamarLowongan $lowongan)
    {
        $validasi = $request->validate([
            "tanggal_wawancara"   =>       "nullable",
            "waktu_wawancara"     =>       "nullable",
            "tempat_wawancara"    =>       "nullable",
            "catatan_wawancara"   =>       "nullable"
        ]);

        $validasi['waktu_wawancara'] = $request->jam . ':' . $request->menit;

        $lowongan->update($validasi);
        return redirect()->route('konfirmasi.lamaran.terkirim', ['lowongan' => $lowongan->id]);
    }
    public function konfirmasi_tolak_lamaran(Request $request, PelamarLowongan $lowongan)
    {
        $validasi = $request->validate([
            "catatan_wawancara"   =>       "nullable"
        ]);

        $lowongan->update($validasi);
        return redirect()->route('konfirmasi.lamaran.terkirim.tolak', ['lowongan' => $lowongan->id]);
    }

    public function konfirmasi_lamaran_terkirim(PelamarLowongan $lowongan)
    {
        return view('Perusahaan.Pelamar.konfirmasi-lamaran-terkirim', [
            "Data" => $lowongan
        ]);
    }
    public function konfirmasi_tolak_lamaran_terkirim(PelamarLowongan $lowongan)
    {
        return view('perusahaan.pelamar.konfirmasi-lamaran-terkirim-tolak', [
            "Data" => $lowongan
        ]);
    }

    public function konfirmasi_status(Request $request, PelamarLowongan $lowongan)
    {
        $v = $request->validate([
            "status"   =>    "required"
        ]);

        $lowongan->expired_date = Carbon::now()->addDays(30);

        $lowongan->update($v);
        return redirect('/dashboard/perusahaan');
    }
    public function konfirmasi_tolak_status(Request $request, PelamarLowongan $lowongan)
    {
        $v = $request->validate([
            "status"   =>    "required"
        ]);

        $lowongan->expired_date = Carbon::now()->addDays(30);

        $lowongan->update($v);
        return redirect('/dashboard/perusahaan');
    }

    public function kandidat_ak(Request $request)
    {
        $user = Auth::user();
        $perusahaan = Perusahaan::where('id', $user->perusahaan->id)->get()->first();

        $totalSaldo = CatatanCash::where('user_id', $user->id)->where('status', 'diterima')->sum('total');
        $lowongan = LowonganPerusahaan::where('perusahaan_id', $perusahaan->id)->get();

        $query = Pelamar::where('kategori', 'kandidat aktif');

        if ($request->skill) {
            $skillFilter = strtolower(preg_replace("/[^a-z0-9]/", "", $request->skill));

            $query->whereHas('skill', function ($q) use ($skillFilter) {
                $q->whereRaw("LOWER(REPLACE(REPLACE(REPLACE(skill, '/', ''), '-', ''), ' ', '')) LIKE ?", ["%{$skillFilter}%"]);
            });
        }

        if ($request->umur) {
            [$min, $max] = explode('-', $request->umur);
            $query->whereRaw("TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN ? AND ?", [$min, $max]);
        }

        if ($request->gender) {
            $query->where('gender', $request->gender);
        }

        $Data = $query->get();

        $pembeliKandidat = PembeliKandidat::whereIn('pelamar_id', $Data->pluck('id'))->get()->keyBy('pelamar_id');


        return view('Perusahaan.Pelamar.Kandidat-AK.kandidat', [
            "Data"    =>    $Data,
            "totalSaldo"  =>  $totalSaldo,
            "data"  =>  HargaPembayaran::all(),
            "harga" => HargaKoin::where('id', 7)->get()->first(),
            "payment"  =>  Bank::all(),
            "divisi"  =>   Divisi::all(),
            "lowongan" => $lowongan,
            "pembeliKandidat" => $pembeliKandidat
        ]);
    }

    public function beli_kandidat(Request $request)
    {
        $request->validate([
            'pelamar_id' => 'required',
            'lowongan_id' => 'required',
        ]);

        $user = Auth::user();

        $totalSaldo = CatatanCash::where('user_id', $user->id)
            ->where('status', 'diterima')
            ->sum('total');

        $hargaKoin = HargaKoin::where('id', 7)->value('harga') ?? 0;

        if ($totalSaldo < $hargaKoin) {
            return back()->with('error', 'Saldo koin tidak mencukupi untuk membeli kandidat!');
        }

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
            'user_id' => $user->id,
            'no_referensi' => 'AK' . rand(100000, 999999),
            'pesanan' => 'Pembelian Kandidat Aktif',
            'dari' => $user->username,
            'sumber_dana' => 'Koin-' . $user->username,
            'total' => $hargaKoin,
        ]);

        PembeliKandidat::create([
            'no_referensi' => 'AK' . rand(100000, 999999),
            'pelamar_id' => $request->pelamar_id,
            'lowongan_id' => $request->lowongan_id,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Berhasil membeli kandidat! Koin telah dikurangi.');
    }
    public function read_detail_notif_perusahaan(PembeliKandidat $pembeli)
    {
        // dd($pembeli->id);

        $pembeli->update(
            [
                "is_read" => true
            ]
        );
        return redirect()->back();
    }

    public function cv_kandidat()
    {
        return view('Perusahaan.Pelamar.Kandidat-AK.cv-kandidat');
    }


    //berlangganan
    public function berlangganan()
    {
        $user = Auth::user();
        $sudahBeli = CatatanKoin::where('user_id', $user->id)->where('pesanan', 'Berlangganan')->first();
        $harga = HargaKoin::where('nama', 'Berlangganan')->get()->first();
        $totalSaldo = CatatanCash::where('user_id', $user->id)->where('status', 'diterima')->sum('total');
        return view('Perusahaan.Berlangganan.index', [
            "totalSaldo" => $totalSaldo,
            "harga"  =>  $harga,
            "sudahBeli" => $sudahBeli
        ]);
    }


    public function berlangganan_bayar(Request $request)
    {
        $user = Auth::user();

        $totalSaldo = CatatanCash::where('user_id', $user->id)
            ->where('status', 'diterima')
            ->sum('total');

        $hargaKoin = HargaKoin::where('id', 6)->value('harga') ?? 0;

        if ($totalSaldo < $hargaKoin) {
            return back()->with('error', 'Saldo koin tidak mencukupi untuk membeli kandidat!');
        }

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

        $noref = "AK" . rand(1000000000, 9999999999);

        $v = $request->validate([
            "user_id"        =>    "nullable",
            "no_referensi"   =>    "nullable",
            "pesanan"        =>    "nullable",
            "dari"           =>    "nullable",
            "sumber_dana"    =>    "nullable",
            "total"          =>    "nullable",
        ]);

        $v['user_id'] = $user->id;
        $v['no_referensi'] = $noref;
        $v['pesanan']  = "Berlangganan";
        $v['dari']  = $user->perusahaan->nama_perusahaan;
        $v['sumber_dana']  = "koin-" . $user->perusahaan->nama_perusahaan;
        $v['total']    = $request->total;

        CatatanKoin::create($v);

        session([
            'berlangganan_noref' => $noref,
            'berlangganan_total' => $request->total
        ]);

        return redirect('dashboard/perusahaan/berlangganan#b')->with('success', 'Berlangganan Berhasil, Mohon Tunggu Informasi Selanjutnya');
    }

    public function berlangganan_send_email()
    {
        $user = auth()->user();
        $noref = session('berlangganan_noref');
        $total = session('berlangganan_total');

        $pesan = "📢 Pembayaran berlangganan baru\n\n" .
            "Nama Perusahaan : {$user->perusahaan->nama_perusahaan}\n" .
            "Nama User       : {$user->perusahaan->nama_perusahaan}\n" .
            "Email User      : {$user->email}\n" .
            "No Referensi    : {$noref}\n" .
            "Pesanan         : Berlangganan\n" .
            "Total Koin      : {$total}\n\n";

        Mail::raw($pesan, function ($message) {
            $message->to(env('ADMIN_EMAIL'))
                ->subject('Pembayaran Berlangganan Baru');
        });

        return redirect('dashboard/perusahaan/berlangganan#b')->with('success_email', 'email terikirim');
    }


    public function berlangganan_kandidat()
    {
        return view('Perusahaan.Berlangganan.kandidat');
    }
    public function kandidat_info()
    {
        return view('Perusahaan.Berlangganan.info-kandidat');
    }
    public function kandidat_bermasalah()
    {
        return view('Perusahaan.Berlangganan.pekerja-bermasalah');
    }
    public function kandidat_nama()
    {
        return view('Perusahaan.Berlangganan.nama-pekerja');
    }
    public function kandidat_laporan()
    {
        return view('Perusahaan.Berlangganan.laporan-harian');
    }
    public function lapor_pekerja()
    {
        return view('Perusahaan.Berlangganan.laporan-pekerja');
    }


    //event
    public function halaman_event()
    {
        return view('Perusahaan.Event.halaman-event', [
            "Data"   =>   Event::all()
        ]);
    }
    public function gabung_event(Event $event)
    {
        return view('Perusahaan.Event.gabung-event', [
            "Data"  =>  $event
        ]);
    }
    public function detail_event_kosong()
    {
        return view('Perusahaan.Event.detail-event-kosong');
    }

    public function koin()
    {
        return view('Perusahaan.koin-saya', [
            "HargaKoin" => HargaPembayaran::all(),
            "payment" => Bank::all()
        ]);
    }
}
