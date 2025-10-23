<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pelamar;
use App\Models\HargaKoin;
use App\Models\CatatanCash;
use App\Models\CatatanKoin;
use App\Helpers\BrowserPath;
use Illuminate\Http\Request;
use App\Models\HargaPembayaran;
use App\Models\PembeliKandidat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Spatie\Browsershot\Browsershot;

class FinanceController extends Controller
{
    public function index()
    {
        $cash   = CatatanCash::all();
        $koin   = CatatanKoin::all();

        $totalOmset = 0;
        foreach ($cash->where('status', 'diterima') as $trx) {
            $harga = HargaPembayaran::where('nama', $trx->pesanan)->first();
            if ($harga) {
                $totalOmset += $harga->harga;
            }
        }

        return view('Dashboard-finance.dashboard', [
            "title"      => "Dashboard",
            "koin"       => $koin,
            "cash"       => $cash,
            "totalOmset" => $totalOmset
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



    public function omset(Request $request)
    {
        $filter = $request->get('filter', 'Bulan ini');
        $now = Carbon::now();

        switch ($filter) {
            case 'Bulan ini':
                $startDate = $now->copy()->startOfMonth();
                $endDate = $now->copy()->endOfMonth();
                break;

            case '1 Bulan Terakhir':
                $startDate = $now->copy()->subMonth()->startOfMonth();
                $endDate = $now->copy()->subMonth()->endOfMonth();
                break;

            case '3 Bulan Terakhir':
                $startDate = $now->copy()->subMonths(2)->startOfMonth();
                $endDate = $now->copy()->endOfMonth();
                break;

            case '6 Bulan Terakhir':
                $startDate = $now->copy()->subMonths(5)->startOfMonth();
                $endDate = $now->copy()->endOfMonth();
                break; 

            case '1 Tahun Terakhir':
                $startDate = $now->copy()->subYear()->startOfMonth();
                $endDate = $now->copy()->endOfMonth();
                break;

            case '2 Tahun Terakhir':
                $startDate = $now->copy()->subYears(2)->startOfMonth();
                $endDate = $now->copy()->endOfMonth();
                break;

            default:
                $startDate = $now->copy()->startOfMonth();
                $endDate = $now->copy()->endOfMonth();
                break;
        }

        $data = DB::table('catatan_cashes')
            ->leftJoin('harga_pembayarans', 'catatan_cashes.pesanan', '=', 'harga_pembayarans.nama')
            ->where('catatan_cashes.status', 'diterima')
            ->whereBetween('catatan_cashes.created_at', [$startDate, $endDate])
            ->selectRaw('
            YEAR(catatan_cashes.created_at) AS tahun,
            MONTH(catatan_cashes.created_at) AS bulan,
            SUM(harga_pembayarans.harga) AS total
        ')
            ->groupByRaw('YEAR(catatan_cashes.created_at), MONTH(catatan_cashes.created_at)')
            ->orderByRaw('YEAR(catatan_cashes.created_at) DESC, MONTH(catatan_cashes.created_at) DESC')
            ->get();

        $listOmset = $data->map(function ($item) {
            $namaBulan = Carbon::create()->month($item->bulan)->translatedFormat('F');
            return [
                'periode' => $namaBulan . ' ' . $item->tahun,
                'total' => $item->total ?? 0,
            ];
        });

        $totalOmset = $data->sum('total');
        $rataRata = $data->count() > 0 ? $totalOmset / $data->count() : 0;

        $tidakAdaData = $data->isEmpty();

        return view('Dashboard-finance.omset-finance', [
            "title"   => "Omset Perusahaan",
            'listOmset' => $listOmset,
            'totalOmset' => $totalOmset,
            'rataRata' => $rataRata,
            'filter' => $filter,
            'tidakAdaData' => $tidakAdaData,
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
            "data"    =>     CatatanCash::all(),
            "data_pembayaran_kandidat"   =>   PembeliKandidat::all()
        ]);
    }

    public function updateStatus(Request $request)
    {
        $p = Pelamar::where('nama_pelamar', $request->model)->get()->first();
        // dd($request->model, $p);
        $status = $request->status;

        $data = CatatanCash::find($request->id);
        if (!$data) {
            return back()->with('error', 'Data tidak ditemukan!');
        }

        $data->status = $status;
        $data->save();

        if ($data->jumlah_koin == 0 && $status === 'diterima') {
            if ($p) {
                $p->kategori = "calon kandidat";
                $p->save();
            }
        }


        return back()->with('success', 'Status berhasil diperbarui!');
    }


    public function catatan_transaksi_koin_detail()
    {
        return view('Dashboard-finance.riwayat-transaksi_koin', [
            "title"   =>     "Catatan Transaksi",
            "data"    =>     CatatanKoin::all()
        ]);
    }

    public function catatan_laporan_transaksi(Request $request)
    {
        $bulan = $request->input('bulan');
        $bulanList = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

        $cash = DB::table('catatan_cashes')
            ->leftJoin('harga_pembayarans', 'catatan_cashes.pesanan', '=', 'harga_pembayarans.nama')
            ->select(
                DB::raw('DATE(catatan_cashes.created_at) as tanggal'),
                DB::raw('"Top Up" as jenis_transaksi'),
                DB::raw('COALESCE(SUM(harga_pembayarans.harga), 0) as total_penghasilan'),
                DB::raw('"-" as total_koin'),
                DB::raw('COUNT(catatan_cashes.id) as total_transaksi')
            )
            ->where('catatan_cashes.status', 'diterima')
            ->when($bulan, fn($q) => $q->whereMonth('catatan_cashes.created_at', $bulan))
            ->groupBy(DB::raw('DATE(catatan_cashes.created_at)'));


        $koin = DB::table('catatan_koins')
            ->leftJoin('harga_koins', 'catatan_koins.pesanan', '=', 'harga_koins.nama')
            ->select(
                DB::raw('DATE(catatan_koins.created_at) as tanggal'),
                DB::raw('"Pembelian Koin" as jenis_transaksi'),
                DB::raw('COALESCE(SUM(harga_koins.harga) , 0) as total_penghasilan'),
                DB::raw('COALESCE(SUM(harga_koins.harga), 0) as total_koin'),
                DB::raw('COUNT(catatan_koins.id) as total_transaksi')
            )
            ->when($bulan, fn($q) => $q->whereMonth('catatan_koins.created_at', $bulan))
            ->groupBy(DB::raw('DATE(catatan_koins.created_at)'));


        $transaksi = $cash
            ->unionAll($koin)
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('Dashboard-finance.laporan-transaksi', [
            'title' => 'Catatan Transaksi',
            'transaksi' => $transaksi,
            'bulan' => $bulan,
            'bulanList' => $bulanList
        ]);
    }



    public function catatan_laporan_transaksi_penghasilan($tanggal)
    {
        $cashDetail = DB::table('catatan_cashes')
            ->leftJoin('harga_pembayarans', 'catatan_cashes.pesanan', '=', 'harga_pembayarans.nama')
            ->leftJoin('users', 'catatan_cashes.user_id', '=', 'users.id')
            ->select(
                'catatan_cashes.id',
                'users.username as perusahaan',
                'catatan_cashes.pesanan',
                'harga_pembayarans.harga',
                DB::raw('"Top Up" as jenis_transaksi'),
                'catatan_cashes.sumber_dana',
                DB::raw('NULL as koin'),
                'catatan_cashes.created_at'
            )
            ->whereDate('catatan_cashes.created_at', $tanggal)
            ->where('catatan_cashes.status', 'diterima')
            ->get();


        $koinDetail = DB::table('catatan_koins')
            ->leftJoin('harga_koins', 'catatan_koins.pesanan', '=', 'harga_koins.nama')
            ->leftJoin('users', 'catatan_koins.user_id', '=', 'users.id')
            ->select(
                'catatan_koins.id',
                'users.username as perusahaan',
                'catatan_koins.pesanan',
                DB::raw('NULL as harga'),
                DB::raw('"Pembelian Koin" as jenis_transaksi'),
                DB::raw('"Koin" as sumber_dana'),
            )
            ->whereDate('catatan_koins.created_at', $tanggal)
            ->get();

        $detail = $cashDetail->merge($koinDetail)->sortByDesc('created_at');

        $totalTunai = $cashDetail->sum('harga');
        $totalKoin = $koinDetail->sum('koin');

        return view('Dashboard-finance.details-laporan_transaksi_penghasilan', [
            'title' => 'Catatan Transaksi',
            'tanggal' => $tanggal,
            'detail' => $detail,
            'totalTunai' => $totalTunai,
            'totalKoin' => $totalKoin
        ]);
    }

    public function laporanBrowsershot($tanggal)
    {
        $cashDetail = DB::table('catatan_cashes')
            ->leftJoin('harga_pembayarans', 'catatan_cashes.pesanan', '=', 'harga_pembayarans.nama')
            ->leftJoin('users', 'catatan_cashes.user_id', '=', 'users.id')
            ->select(
                'catatan_cashes.id',
                'users.username as perusahaan',
                'catatan_cashes.pesanan',
                'harga_pembayarans.harga',
                DB::raw('"Top Up" as jenis_transaksi'),
                'catatan_cashes.sumber_dana',
                DB::raw('NULL as koin'),
                'catatan_cashes.created_at'
            )
            ->whereDate('catatan_cashes.created_at', $tanggal)
            ->where('catatan_cashes.status', 'diterima')
            ->get();


        $koinDetail = DB::table('catatan_koins')
            ->leftJoin('harga_koins', 'catatan_koins.pesanan', '=', 'harga_koins.nama')
            ->leftJoin('users', 'catatan_koins.user_id', '=', 'users.id')
            ->select(
                'catatan_koins.id',
                'users.username as perusahaan',
                'catatan_koins.pesanan',
                DB::raw('NULL as harga'),
                DB::raw('"Pembelian Koin" as jenis_transaksi'),
                DB::raw('"Koin" as sumber_dana'),
            )
            ->whereDate('catatan_koins.created_at', $tanggal)
            ->get();

        $detail = $cashDetail->merge($koinDetail)->sortByDesc('created_at');

        $totalTunai = $cashDetail->sum('harga');
        $totalKoin = $koinDetail->sum('koin');

        $html = View::make('Dashboard-finance.Laporan.preview-laporan', [
            'tanggal' => $tanggal,
            'detail' => $detail,
            'totalTunai' => $totalTunai,
            'totalKoin' => $totalKoin
        ]);

        $css = file_get_contents(public_path('build/assets/app-B4zNTkcG.css'));

        $htmlWithCss = '
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <title>CV Pelamar</title>
                        <style>' . $css . '</style>
                          <link rel="stylesheet" type="text/css"
                            href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css" />
                        <link rel="stylesheet" type="text/css"
                            href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css" />
                        <script src="https://cdn.tailwindcss.com"></script>
                    </head>
                    <body>
                        ' . $html . '
                    </body>
                    </html>
                    ';

        $browserPath = BrowserPath::detect();
        if (!$browserPath) {
            return response()->json([
                "error" => "Error"
            ], 500);
        }

        $pdf = Browsershot::html($htmlWithCss)
            ->setOption('executablePath', $browserPath)
            ->format('A3')
            ->margins(10, 10, 10, 10)
            ->waitUntilNetworkIdle()
            ->pdf();

        return response($pdf)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="laporan-' . $tanggal . '.pdf"');
    }
}
