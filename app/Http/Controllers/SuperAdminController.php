<?php

namespace App\Http\Controllers;

use App\Models\Daerah;
use App\Models\Kabupaten;
use App\Models\User;
use App\Models\Event;
use App\Models\Pelamar;
use App\Models\Tipskerja;
use App\Models\Perusahaan;
use App\Models\SuperAdmin;
use Illuminate\Support\Str;
use App\Helpers\BrowserPath;
use Illuminate\Http\Request;
use App\Models\KegiatanEvent;
use App\Models\LowonganPerusahaan;
use App\Models\Provinsi;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;

class SuperAdminController extends Controller
{
    public function index()
    {
        return view('Super-Admin.dashboard-superAdmin.dashboard-super_admin', [
            "title"  =>    "Dashboard",
            "Perusahaan" =>  Perusahaan::count(),
            "Lowongan" =>   LowonganPerusahaan::count(),
            "Pelamar"  =>   Pelamar::count(),
            "Kandidat"  =>  Pelamar::where('kategori', 'kandidat aktif')->count()
        ]);
    }
    public function profile()
    {
        return view('Super-Admin.Profile_Super_Admin.index', [
            "title"  =>    "Profile"
        ]);
    }
    public function profile_edit()
    {
        return view('Super-Admin.Profile_Super_Admin.pelamar-edit_super_admin', [
            "title"  =>    "Profile",
            "Provinsi"  =>   Provinsi::all(),
            "Kabupaten"  =>   Kabupaten::all(),
            "Daerah"   =>   Daerah::all()
        ]);
    }
    public function profile_update(Request $request)
    {
        $vdataUser = $request->validate([
            "username" => 'nullable|string',
            "email"    => 'nullable|email',
        ]);

        $vdata = $request->validate([
            "nama_lengkap"  => 'nullable|string',
            "img_profile"   => 'nullable|file|image|mimes:png,jpg,jpeg',
            "provinsi"      => 'nullable|string',
            "kota"          => 'nullable|string',
            "kecamatan"     => 'nullable|string',
            "desa"          => 'nullable|string',
            "kode_pos"      => 'nullable',
            "detail_alamat" => 'nullable|string'
        ]);

        $User = User::where('id', Auth::user()->id);

        if ($User) {
            $User->update($vdataUser);
        }

        $Superadmin = SuperAdmin::where('user_id', Auth::user()->id)->first();

        if ($request->hasFile('img_profile')) {
            if ($Superadmin->img_profile && Storage::exists('public/' . $Superadmin->img_profile)) {
                Storage::delete('public/' . $Superadmin->img_profile);
            }
            $vdata['img_profile'] = $request->file('img_profile')->store('images', 'public');
        }

        if ($Superadmin) {
            $Superadmin->update($vdata);
        }

        return redirect('/dashboard/superadmin/profile');
    }


    public function pelamar()
    {
        return view('Super-Admin.Pelamar.pelamar_super_admin', [
            "title"   =>  "Data Kandidat",
            "pelamar" =>  Pelamar::all()
        ]);
    }

    // Bagian Kandidat
    public function add_kandidat()
    {
        return view('Super-Admin.Pelamar.Kandidat.add_kandidat_super_admin', [
            "title"   =>  "Edit Kandidat"
        ]);
    }
    public function edit_kandidat()
    {
        return view('Super-Admin.Pelamar.Kandidat.edit_kandidat_super_admin', [
            "title"   =>  "Edit Kandidat"
        ]);
    }

    public function kandidat_view()
    {
        return view('Super-Admin.Pelamar.Kandidat.kandidat-view', [
            "title"   =>    "Detail Kandidat"
        ]);
    }

    //Bagian NON KANDIDAT
    public function non_kandidat_view(Pelamar $pelamar)
    {
        return view('Super-Admin.Pelamar.Non_kandidat.non_kandidat-view', [
            "title"   =>    "Detail Non Kandidat",
            "Data"    =>    $pelamar
        ]);
    }

    public function cvPreview(Pelamar $pelamar)
    {
        return view('CV_PELAMAR.cv_pelamar', [
            "Data" => $pelamar
        ]);
    }

    public function unduhCv(Pelamar $pelamar)
    {
        $html = View::make('CV_PELAMAR.cv_pelamar', [
            "Data" => $pelamar,
            "pdf" => true
        ])->render();

        $css = file_get_contents(public_path('build/assets/app-Dd7altkU.css'));

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
                "error"   =>    "Error"
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
            ->header('Content-Disposition', 'attachment; filename="cv-' . $pelamar->id . '.pdf"');
    }



    public function add_non_kandidat()
    {
        return view('Super-Admin.Pelamar.Non_kandidat.add_non_kandidat_super_admin', [
            "title"   =>  "Edit Non Kandidat"
        ]);
    }
    public function edit_non_kandidat()
    {
        return view('Super-Admin.Pelamar.Non_kandidat.edit_non_kandidat_super_admin', [
            "title"   =>  "Edit Non Kandidat"
        ]);
    }

    //Bagian Calon Kandidat
    public function add_calon_kandidat()
    {
        return view('Super-Admin.Pelamar.Calon_kandidat.add_kandidat_super_admin', [
            "title"   =>  "Edit Calon Kandidat"
        ]);
    }
    public function view_calon_kandidat()
    {
        return view('Super-Admin.Pelamar.Calon_kandidat.kandidat-view', [
            "title"   =>  "Detail Calon Kandidat"
        ]);
    }

    // Data Perusahaan

    public function perusahaan()
    {
        return view('Super-Admin.Perusahaan.data-perusahaan_superAdmin', [
            "title"   =>  "Data Perusahaan"
        ]);
    }
    public function perusahaan_add()
    {
        return view('Super-Admin.Perusahaan.add_data_perusahaan_super_admin', [
            "title"   =>  "Tambah Perusahaan"
        ]);
    }
    public function perusahaan_detail()
    {
        return view('Super-Admin.Perusahaan.details_perusahaan_superAdmin', [
            "title"   =>  ""
        ]);
    }
    public function lowongan_detail()
    {
        return view('Super-Admin.Perusahaan.detail-lowongan_perusahaan_superAdmin', [
            "title"   =>  ""
        ]);
    }
    public function lowongan_add()
    {
        return view('Super-Admin.Perusahaan.tambah_lowongan-perusahaan_superAdmin', [
            "title"   =>  "Tambah Lowongan"
        ]);
    }
    public function lowongan_edit()
    {
        return view('Super-Admin.Perusahaan.edit_lowongan-perusahaan_superAdmin', [
            "title"   =>  "Edit Lowongan"
        ]);
    }

    // Recrutiment
    public function recrutiment_detail()
    {
        return view('Super-Admin.Perusahaan.Recrutiment.detail_recrutiment_superAdmin', [
            "title"   =>  "Detail Kandidat"
        ]);
    }
    public function recrutiment_edit()
    {
        return view('Super-Admin.Perusahaan.Recrutiment.edit_kandidat_recrutiment_superAdmin', [
            "title"   =>  "Detail Pelamar"
        ]);
    }

    // Talent Hunter
    public function talent_hunter_detail()
    {
        return view('Super-Admin.Perusahaan.Talent-Hunter.detail-tulent_hunter_superAdmin', [
            "title"   =>  "Data Talent Hunter"
        ]);
    }
    public function talent_hunter_add()
    {
        return view('Super-Admin.Perusahaan.Talent-Hunter.add-data_tulent-hunter_superAdmin', [
            "title"   =>  "Tambah Tulent Hunter"
        ]);
    }
    public function talent_hunter_edit()
    {
        return view('Super-Admin.Perusahaan.Talent-Hunter.edit-data_tulent-hunter_superAdmin', [
            "title"   =>  "Edit Tulent Hunter"
        ]);
    }


    // Finance
    public function finance()
    {
        return view('Super-Admin.finance.finance-index_superAdmin', [
            "title"   =>  "Paket Harga"
        ]);
    }
    public function finance_edit_paket_koin()
    {
        return view('Super-Admin.finance.edit_paket_harga-koin_superAdmin', [
            "title"   =>  "Paket Harga Koin"
        ]);
    }
    public function finance_edit_paket_pembayaran()
    {
        return view('Super-Admin.finance.edit_paket_harga-tunai_superAdmin', [
            "title"   =>  "Paket Harga Pembayaran"
        ]);
    }

    // Freeze Akun
    public function freeze()
    {
        return view('Super-Admin.Freeze-Akun.freeze_akun_superAdmin', [
            "title"   =>  "Akun Freeze",
            "Data"    =>  User::all()
        ]);
    }


    public function banned(Request $request, User $user)
    {
        // dd($request->all());
        $data = $request->validate([
            "status"    =>    "required|boolean"
        ]);

        $user->update($data);
        return redirect('/dashboard/superadmin/freeze');
    }


    public function unbanned(Request $request, User $user)
    {
        // dd($request->all());
        $data = $request->validate([
            "status"  =>  'required|boolean'
        ]);

        $user->update($data);
        return redirect('/dashboard/superadmin/freeze');
    }

    public function delete_akun(User $user)
    {
        $user->delete($user->id);
        return redirect('/dashboard/superadmin/freeze');
    }



    public function freeze_detail(User $user)
    {
        return view('Super-Admin.Freeze-Akun.detail_freeze_akun_superAdmin', [
            "title"   =>  "Akun Freeze",
            "data"    =>   $user
        ]);
    }
    public function tipskerja()
    {
        return view('Super-Admin.Tipskerja-superadmin.tipskerja_index', [
            "title"     =>   "Tips Kerja",
            "all"       =>    Tipskerja::count(),
            "terbit"    =>    Tipskerja::where('status', 'terbit')->count(),
            "noterbit"  =>    Tipskerja::where('status', 'belum terbit')->count(),
            "sudah_terbit"  =>    Tipskerja::where('status', 'terbit')->get(),
            "belum_terbit"  =>    Tipskerja::where('status', 'belum terbit')->get(),
        ]);
    }
    public function tipskerja_add()
    {
        return view('Super-Admin.Tipskerja-superadmin.add-post_tipsKerja_superAdmin', [
            "title"   =>  "Buat Post Baru"
        ]);
    }

    public function tipskerja_create(Request $request)
    {
        $data = $request->validate([
            'title'   => 'nullable|string',
            'content' => 'nullable|string',
            'penulis' => 'nullable|string',
            'image'   => 'nullable|file|image|mimes:png,jpg,jpeg',
            'status'  => 'nullable',
            'intro'   => 'nullable|string',
            'section' => 'nullable|json',
        ]);

        $data['penulis'] = Auth::user()->username;
        $data['status']  = 'belum terbit';

        $intro   = $request->input('intro');
        $content = $request->input('content');
        $section = $request->input('section');

        if (empty($intro) && !empty($content)) {
            $data['intro'] = Str::limit(strip_tags($content), 150);
        } else {
            $data['intro'] = $intro;
        }


        if (empty($section) && !empty($content)) {
            $paragraphs = preg_split('/\r\n|\r|\n/', strip_tags($content));

            $sections = [];
            foreach ($paragraphs as $index => $p) {
                if (trim($p) !== '') {
                    $sections[] = [
                        "judul" => "Bagian " . ($index + 1),
                        "isi"   => $p,
                    ];
                }
            }

            $data['section'] = json_encode($sections);
        } else {
            $data['section'] = $section;
        }

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        Tipskerja::create($data);
        return redirect('/dashboard/superadmin/tipskerja');
    }

    public function ubah_status(Request $request)
    {
        $ids = $request->ids;

        if (!$ids) {
            return redirect()->back()->with('error', 'Tidak ada data yang dipilih!');
        }

        TipsKerja::whereIn('id', $ids)->update([
            'status' => $request->status
        ]);
        return redirect('/dashboard/superadmin/tipskerja');
    }

    public function delete(Request $request)
    {
        $ids = $request->ids;

        if (!$ids) {
            return redirect()->back()->with('error', 'Tidak ada data yang dipilih!');
        }

        TipsKerja::whereIn('id', $ids)->delete();

        return redirect('/dashboard/superadmin/tipskerja');
    }

    // Event
    public function event()
    {
        return view('Super-Admin.Event.index', [
            "title"   =>  "Event",
            "Data"    =>   Event::all()
        ]);
    }
    public function event_add()
    {
        return view('Super-Admin.Event.add-event', [
            "title"   =>  "Buat Event Baru"
        ]);
    }

    public function event_store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'status'  =>  "nullable",
            'title' => "nullable|string",
            'pendaftaran' => "nullable|string",
            'kuota' => "nullable|integer",
            'image' => "nullable|file|image|mimes:png,jpg,jpeg",
            'content' => "nullable|string",
            'tgl_mulai' => "nullable|date",
            'jam_mulai' => "nullable",
            'tgl_akhir' => "nullable|date",
            'jam_akhir' => "nullable",
            'lokasi' => "nullable|string",
            'link_form' => "nullable|string",
            'penutupan_pendaftaran' => "nullable|date"
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $event = Event::create($data);


        $datas = $request->validate([
            'waktu'    => "nullable|array",
            'waktu.*'  => "nullable|string",
            'kegiatan' => "nullable|array",
            'kegiatan.*' => "nullable|string"
        ]);


        foreach ($datas['waktu'] as $i => $waktu) {
            KegiatanEvent::create([
                'event_id' => $event->id,
                'waktu'    => $waktu,
                'kegiatan' => $datas['kegiatan'][$i] ?? null,
            ]);
        }
        return redirect('/dashboard/superadmin/event')->with('success', 'Event berhasil ditambahkan!');
    }


    public function event_detail(Event $event)
    {
        return view('Super-Admin.Event.detail-event', [
            "title"   =>  "Event",
            "Data"    =>  $event
        ]);
    }
    public function event_edit(Event $event)
    {
        return view('Super-Admin.Event.edit-event', [
            "title"   =>  "Edit Event",
            "Data"    =>  $event
        ]);
    }

    public function event_update(Request $request, Event $event)
    {
        $data = $request->validate([
            'status'  => "nullable",
            'title' => "nullable|string",
            'pendaftaran' => "nullable|string",
            'kuota' => "nullable|integer",
            'image' => "nullable|file|image|mimes:png,jpg,jpeg",
            'content' => "nullable|string",
            'tgl_mulai' => "nullable|date",
            'jam_mulai' => "nullable",
            'tgl_akhir' => "nullable|date",
            'jam_akhir' => "nullable",
            'lokasi' => "nullable|string",
            'link_form' => "nullable|string",
            'penutupan_pendaftaran' => "nullable|date"
        ]);

        if ($request->hasFile('image')) {
            if ($event->image && Storage::disk('public')->exists($event->image)) {
                Storage::disk('public')->delete($event->image);
            }
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $event->update($data);


        $datas = $request->validate([
            'id' => "nullable|array",
            'id.*' => "nullable|integer",
            'waktu'    => "nullable|array",
            'waktu.*'  => "nullable|string",
            'kegiatan' => "nullable|array",
            'kegiatan.*' => "nullable|string"
        ]);

        if (!empty($datas['waktu'])) {
            foreach ($datas['waktu'] as $i => $waktu) {
                if (!empty($datas['id'][$i])) {
                    KegiatanEvent::where('id', $datas['id'][$i])
                        ->update([
                            'waktu'    => $waktu,
                            'kegiatan' => $datas['kegiatan'][$i] ?? null,
                        ]);
                } else {
                    $event->kegiatan_events()->create([
                        'waktu'    => $waktu,
                        'kegiatan' => $datas['kegiatan'][$i] ?? null,
                    ]);
                }
            }
        }

        if ($request->filled('delete_id')) {
            $ids = explode(',', $request->delete_id);
            KegiatanEvent::whereIn('id', $ids)->delete();
        }

        return redirect('/dashboard/superadmin/event')->with('success', 'Event berhasil dipembaharui!');
    }

    public function event_delete(Event $event)
    {
        $event->destroy($event->id);
        return redirect('/dashboard/superadmin/event')->with('success', 'Event berhasil Di Hapus!');
    }

    // Akun
    public function akun()
    {
        return view('Super-Admin.Akun.akun_index-superAdmin', [
            "title"   =>  "Kelola Akun",
            "Data"    =>   User::all()
        ]);
    }
    public function akun_view(User $user)
    {
        return view('Super-Admin.Akun.view_akun_super-Admin', [
            "title"   =>  "Kelola Akun",
            "Data"    =>  $user
        ]);
    }
    public function akun_add()
    {
        return view('Super-Admin.Akun.add-akun_superAdmin', [
            "title"   =>  "Kelola Akun"
        ]);
    }
    public function akun_edit(User $user)
    {
        return view('Super-Admin.Akun.edit-akun_superAdmin', [
            "title"   =>  "Kelola Akun",
            "Data"    =>  $user
        ]);
    }

    //Link & Header
    public function pengaturan_page()
    {
        return view('Super-Admin.Pengaturan.pengaturan_page_superAdmin', [
            "title"   =>  "Image Header Social Media"
        ]);
    }
    public function pengaturan()
    {
        return view('Super-Admin.Pengaturan.pengaturan_superAdmin', [
            "title"   =>  "Pengaturan"
        ]);
    }
}
