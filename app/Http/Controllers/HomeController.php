<?php

namespace App\Http\Controllers;

use App\Models\Kategories;
use App\Models\LowonganPerusahaan;
use App\Models\PelamarLowongan;
use App\Models\PembeliKandidat;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $lokasi = $request->get('lokasi');

        if ($search) {
            $historySearch = session('history_search', []);

            if (!in_array($search, $historySearch)) {
                $historySearch[] = $search;
            }

            session(['history_search' => array_slice($historySearch, -5)]);
        }

        if ($lokasi) {
            $historyLokasi = session('history_lokasi', []);

            if (!in_array($lokasi, $historyLokasi)) {
                $historyLokasi[] = $lokasi;
            }

            session(['history_lokasi' => array_slice($historyLokasi, -5)]);
        }


        $Data = LowonganPerusahaan::with('perusahaan')
            ->when($search, function ($q) use ($search) {

                $q->where(function ($query) use ($search) {
                    $query->where('nama', 'like', "%$search%")
                        ->orWhere('jenis', 'like', "%$search%")
                        ->orWhere('kategori', 'like', "%$search%")
                        ->orWhere('slug', 'like', "%$search%")
                        ->orWhere('alamat', 'like', "%$search%")
                        ->orWhere('deskripsi', 'like', "%$search%");
                });

                // search dalam tabel perusahaan
                $q->orWhereHas('perusahaan', function ($p) use ($search) {
                    $p->where('nama_perusahaan', 'like', "%$search%")
                        ->orWhere('jenis_perusahaan', 'like', "%$search%")
                        ->orWhere('website_perusahaan', 'like', "%$search%")
                        ->orWhere('telepon_perusahaan', 'like', "%$search%")
                        ->orWhere('whatsapp', 'like', "%$search%");
                });
            })

            ->when($lokasi, function ($q) use ($lokasi) {

                $q->where('alamat', 'like', "%$lokasi%")

                    ->orWhereHas('perusahaan.alamatperusahaan', function ($p) use ($lokasi) {
                        $p->where('desa', 'like', "%$lokasi%")
                            ->orWhere('kecamatan', 'like', "%$lokasi%")
                            ->orWhere('kota', 'like', "%$lokasi%")
                            ->orWhere('provinsi', 'like', "%$lokasi%")
                            ->orWhere('kode_pos', 'like', "%$lokasi%")
                            ->orWhere('detail', 'like', "%$lokasi%");
                    });
            })->get();

        $lastSearch = session('history_search')[count(session('history_search', [])) - 1] ?? null;
        $lastLokasi = session('history_lokasi')[count(session('history_lokasi', [])) - 1] ?? null;

        $recentResult = collect();

        if ($lastSearch || $lastLokasi) {
            $recentResult = LowonganPerusahaan::with('perusahaan')
                ->when($lastSearch, function ($q) use ($lastSearch) {
                    $q->where('nama', 'like', "%$lastSearch%");
                })
                ->when($lastLokasi, function ($q) use ($lastLokasi) {
                    $q->where('alamat', 'like', "%$lastLokasi%");
                })
                ->get();
        }

        return view('home', [
            "Data"  =>    $Data,
            "Pesan"  =>   PelamarLowongan::all(),
            "PesanPerusahaan"  =>   PembeliKandidat::all(),
            'historySearch' => session('history_search', []),
            'historyLokasi' => session('history_lokasi', []),
            'recentResult' => $recentResult,
            'Kategories'   =>  Kategories::all()
        ]);
    }

    public function viewjob(LowonganPerusahaan $job)
    {
        return view('details-job', [
            "Data"  =>   $job,
            "Pesan" =>   PelamarLowongan::all(),
            "PesanPerusahaan"  =>   PembeliKandidat::all(),
            'Kategories'   =>  Kategories::all()
        ]);
    }

    public function lowongan_kategori(Kategories $kategori)
    {
        return view('lowongan-kategori', [
            "Kategori"   =>   $kategori,
            "Data"       =>   LowonganPerusahaan::all()
        ]);
    }

    public function read_detail_notif(PelamarLowongan $lowongan)
    {
        $lowongan->timestamps = false;
        $lowongan->is_read = true;
        $lowongan->save();
        if ($lowongan->status === 'diterima') {
            return view('detail_status-melamar', [
                "Data"  => $lowongan
            ]);
        } elseif ($lowongan->status === 'ditolak') {
            return view('detail_status-tolak-melamar', [
                "Data"  => $lowongan
            ]);
        }
    }
}
