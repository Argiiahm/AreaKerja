<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\CatatanKoin;
use App\Models\Event;
use App\Models\HargaPembayaran;
use App\Models\KegiatanEvent;
use App\Models\LowonganPerusahaan;
use App\Models\Pelamar;
use App\Models\Perusahaan;
use App\Models\Tipskerja;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        return view('Admin.Dashboard-admin.dashboard', [
            "title"    =>     "Dashboard"
        ]);
    }
    public function profile()
    {
        return view('Admin.Dashboard-admin.profile-dashboard_admin', [
            "title"    =>     "Profile"
        ]);
    }
    public function profile_edit(Admin $admin)
    {
        return view('Admin.Dashboard-admin.edit-profile_admin_dashboard', [
            "title"    =>     "Profile",
            "Data"     =>      $admin
        ]);
    }

    public function profile_update(Request $request, Admin $admin)
    {
        $vdataUser = $request->validate([
            "username" => 'nullable|string',
            "email"    => 'nullable|email',
        ]);

        $u = User::where('id', $admin->user_id);
        $u->update($vdataUser);


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


        if ($request->hasFile('img_profile')) {
            if ($admin->img_profile && Storage::exists('public/' . $admin->img_profile)) {
                Storage::delete('public/' . $admin->img_profile);
            }
            $vdata['img_profile'] = $request->file('img_profile')->store('images', 'public');
        }

        $vdata['user_id'] = Auth::user()->id;
        $admin->update($vdata);

        return redirect('/dashboard/admin/profile');
    }

    public function pelamar()
    {
        return view('Admin.Dashboard-admin.pelamar-dashboard_admin', [
            "title"    =>      "Data Kandidat",
            "Data"     =>      Pelamar::all()
        ]);
    }

    public function kandidat_view_cv(Pelamar $pelamar)
    {
        return view('Admin.Dashboard-admin.kandidat-view_cv_admin_dashboard', [
            "title"   =>   "",
            "Data"    =>   $pelamar
        ]);
    }
    public function non_kandidat_view_cv(Pelamar $pelamar)
    {
        return view('Admin.Dashboard-admin.nonkandidat-view_cv_admin_dashboard', [
            "title"   =>   "",
            "Data"   =>  $pelamar
        ]);
    }

    public function calon_kandidat_view(Pelamar $pelamar)
    {
        return view('Admin.Dashboard-admin.calon_kandidat-view_admin_dashboard', [
            "title"   =>   "Data Kandidat",
            "Data"    =>   $pelamar

        ]);
    }

    public function calon_kandidat_status(Request $request, Pelamar $pelamar)
    {

        if ($request->filled('kategori')) {
            $pelamar->kategori = $request->kategori;
        }

        if ($request->filled('mulai_pelatihan')) {
            $pelamar->mulai_pelatihan = $request->mulai_pelatihan;
        }

        if ($request->filled('selesai_pelatihan')) {
            $pelamar->selesai_pelatihan = $request->selesai_pelatihan;
        }

        $pelamar->save();
        return back();
    }


    public function perusahaan()
    {
        return view('Admin.Dashboard-admin.perusahaan.data-perusahaan_admin_dashboard', [
            "title"   =>   "Data Perusahaan",
            "Data"    =>  Perusahaan::all()
        ]);
    }
    public function perusahaan_view(Perusahaan $perusahaan)
    {
        return view('Admin.Dashboard-admin.perusahaan.view-perusahaan_admin_dashboard', [
            "title"   =>   "",
            "data"    =>  $perusahaan,
            "lowongan" => LowonganPerusahaan::all()
        ]);
    }


    public function freeze_perusahaan(Request $request, User $user)
    {
        $data = $request->validate([
            "status"  =>   'required|boolean'
        ]);

        $user->update($data);
        return redirect('dashboard/admin/perusahaan');
    }
    public function unfreeze_perusahaan(Request $request, User $user)
    {
        $data = $request->validate([
            "status"  =>   'required|boolean'
        ]);

        $user->update($data);
        return redirect('dashboard/admin/perusahaan');
    }

    public function perusahaan_view_lowongan()
    {
        return view('Admin.Dashboard-admin.perusahaan.view-lowongan_perushaan_admin_dashboard', [
            "title"   =>   ""
        ]);
    }
    public function perusahaan_view_cv()
    {
        return view('Admin.Dashboard-admin.perusahaan.view-cv_perusahaan_admin_dashboard', [
            "title"   =>   ""
        ]);
    }
    public function perusahaan_view_talenthunter()
    {
        return view('Admin.Dashboard-admin.perusahaan.perusahaan_view_talenthunter_admin_dashboard', [
            "title"   =>   ""
        ]);
    }

    public function finance()
    {
        return view('Admin.Dashboard-admin.Finance.transaksi-koin_admin_dashboard', [
            "title"   =>   "Data Transaksi Koin",
            "koin"    =>   CatatanKoin::all()
        ]);
    }
    public function tips_kerja()
    {
        return view('Admin.Dashboard-admin.Tipskerja.index', [
            "title"     =>   "Tips Kerja",
            "all"       =>    Tipskerja::count(),
            "terbit"    =>    Tipskerja::where('status', 'terbit')->count(),
            "noterbit"  =>    Tipskerja::where('status', 'belum terbit')->count(),
            "sudah_terbit"  =>    Tipskerja::where('status', 'terbit')->get(),
            "belum_terbit"  =>    Tipskerja::where('status', 'belum terbit')->get(),
        ]);
    }
    public function tips_kerja_add_post()
    {
        return view('Admin.Dashboard-admin.Tipskerja.add-post', [
            "title"   =>   "Buat Post Baru"
        ]);
    }

    public function tips_kerja_create_post(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'title'   => 'nullable|string',
            'content' => 'nullable|string',
            'penulis' => 'nullable|string',
            'image'   => 'nullable|file|image|mimes:png,jpg,jpeg',
            'status'  => 'nullable',
            'intro'   => 'nullable|string',
            'section' => 'nullable|json',
        ]);

        $data['penulis']  = Auth::user()->username;
        $data['status'] = 'belum terbit';

        if (empty($request->intro) && !empty($request->content)) {
            $data['intro'] = Str::limit(strip_tags($request->content), 150);
        } else {
            $data['intro'] = $request->intro;
        }

        if (empty($request->section) && !empty($request->content)) {
            $paragraphs = preg_split('/\r\n|\r|\n/', strip_tags($request->content));

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
            $data['section'] = $request->section;
        }

        if ($request->hasFile('image')) {
            if ($request->image && Storage::exists('public/' . $request->image)) {
                Storage::delete('public/' . $request->image);
            }
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        Tipskerja::create($data);
        return redirect('/dashboard/admin/tipskerja');
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
        return redirect('/dashboard/admin/tipskerja');
    }

    public function hapus(Request $request)
    {
        $ids = $request->ids;

        if (!$ids) {
            return redirect()->back()->with('error', 'Tidak ada data yang dipilih!');
        }

        TipsKerja::whereIn('id', $ids)->delete();

        return redirect('/dashboard/admin/tipskerja');
    }

    public function event()
    {
        return view('Admin.Dashboard-admin.Event.index', [
            "title"   =>   "Kelola Event",
            "Data"    =>    Event::all()
        ]);
    }
    public function event_add()
    {
        return view('Admin.Dashboard-admin.Event.add-event', [
            "title"   =>   "Buat Event Baru"
        ]);
    }

    public function tambah_event(Request $request)
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
        return redirect('/dashboard/admin/event')->with('success', 'Event berhasil ditambahkan!');
    }



    public function event_edit(Event $event)
    {
        return view('Admin.Dashboard-admin.Event.edit-event', [
            "title"   =>   "Edit Event",
            "Data"    =>   $event
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

        return redirect('/dashboard/admin/event')->with('success', 'Event berhasil diperbarui!');
    }
    public function event_detail(Event $event)
    {
        return view('Admin.Dashboard-admin.Event.detail-event', [
            "title"   =>   "Event",
            "Data"    =>    $event
        ]);
    }

    public function hapus_event(Event $event)
    {
        $event->delete($event->id);

        return redirect('/dashboard/admin/event');
    }
}
