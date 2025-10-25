<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Skill;
use App\Models\Daerah;
use App\Models\Divisi;
use App\Models\Pelamar;
use App\Models\Provinsi;
use App\Models\HargaKoin;
use App\Models\Kabupaten;
use App\Models\Tipskerja;
use App\Models\Organisasi;
use App\Models\Perusahaan;
use App\Models\SuperAdmin;
use App\Models\CatatanCash;
use App\Models\CatatanKoin;
use Illuminate\Support\Str;
use App\Helpers\BrowserPath;
use Illuminate\Http\Request;
use App\Models\Alamatpelamar;
use App\Models\KegiatanEvent;
use App\Models\HargaPembayaran;
use App\Models\Pengalamankerja;
use App\Models\Alamatperusahaan;
use App\Models\RiwayatPendidikan;
use App\Models\LowonganPerusahaan;
use Illuminate\Support\Facades\DB;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;


class SuperAdminController extends Controller
{
    public function index()
    {
        return view('Super-Admin.dashboard-superAdmin.dashboard-super_admin', [
            "title" => "Dashboard",
            "Perusahaan" => Perusahaan::count(),
            "Lowongan" => LowonganPerusahaan::whereNotNull('paket_id')->count(),
            "Pelamar" => Pelamar::whereNull('kategori')->count() + Pelamar::where('kategori', 'pelamar')->count(),
            "Kandidat" => Pelamar::where('kategori', 'kandidat aktif')->count()
        ]);
    }
    public function profile()
    {
        return view('Super-Admin.Profile_Super_Admin.index', [
            "title" => "Profile"
        ]);
    }
    public function profile_edit()
    {
        return view('Super-Admin.Profile_Super_Admin.pelamar-edit_super_admin', [
            "title" => "Profile",
            "Provinsi" => Provinsi::all(),
            "Kabupaten" => Kabupaten::all(),
            "Daerah" => Daerah::all()
        ]);
    }
    public function profile_update(Request $request)
    {
        $vdataUser = $request->validate([
            "username" => 'nullable|string',
            "email" => 'nullable|email',
        ]);

        $vdata = $request->validate([
            "nama_lengkap" => 'nullable|string',
            "img_profile" => 'nullable|file|image|mimes:png,jpg,jpeg',
            "provinsi" => 'nullable|string',
            "kota" => 'nullable|string',
            "kecamatan" => 'nullable|string',
            "desa" => 'nullable|string',
            "kode_pos" => 'nullable',
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
            "title" => "Data Kandidat",
            "pelamar" => Pelamar::all()
        ]);
    }

    // Bagian Kandidat
    public function add_kandidat()
    {
        $pelamar = Pelamar::with('users')->find(session('pelamar_id'));
        return view('Super-Admin.Pelamar.Kandidat.add_kandidat_super_admin', [
            "title" => "Add Kandidat",
            "pelamar" => $pelamar
        ]);
    }

    public function edit_organisasi(Organisasi $organisasi)
    {
        return view('Super-Admin.Pelamar.edit-kandidat.edit-organisasi', [
            "title"  =>  "Edit Organisasi",
            "Data"  =>  $organisasi
        ]);
    }

    public function update_organisasi(Request $request, Organisasi $organisasi)
    {
        $v = $request->validate([
            'nama_organisasi'     =>  "nullable",
            'jabatan'     =>     "nullable",
            'tahun_awal'     =>     "nullable",
            'tahun_akhir'     =>     "nullable",
            'deskripsi'     =>     "nullable",
        ]);

        $v['pelamar_id']  =   $request->pelamar_id;

        $organisasi->update($v);
        return back();
    }

    public function edit_pendidikan(RiwayatPendidikan $pendidikan)
    {
        return view('Super-Admin.Pelamar.edit-kandidat.edit-pendidikan', [
            "title" =>  'edit pendidikan',
            "Data"  => $pendidikan
        ]);
    }

    public function update_pendidikan(Request $request, RiwayatPendidikan $pendidikan)
    {
        $v = $request->validate([
            "pendidikan"          =>      "nullable",
            "jurusan"             =>      "nullable",
            "asal_pendidikan"     =>      "nullable",
            "tahun_awal"          =>      "nullable",
            "tahun_akhir"         =>      "nullable",
        ]);

        $v['pelamar_id']  =  $request->pelamars_id;
        $pendidikan->update($v);

        return back();
    }

    public function edit_pengalaman(Pengalamankerja $pengalaman)
    {
        return view('Super-Admin.Pelamar.edit-kandidat.edit-pengalaman', [
            "title" => 'edit pengalaman',
            "data"  => $pengalaman
        ]);
    }

    public function update_pengalaman(Request $request, Pengalamankerja $pengalaman)
    {
        $vdata = $request->validate([
            'posisi_kerja'  =>    "nullable",
            'jabatan_kerja'  =>    "nullable",
            'nama_perusahaan'  =>    "nullable",
            'tahun_awal'  =>    "nullable",
            'tahun_akhir'  =>    "nullable",
            'deskripsi'  =>    "nullable",
        ]);
        $vdata['pelamar_id'] = $request->pelamar_id;
        $pengalaman->update($vdata);
        return back();
    }

    public function edit_skill(Skill $skill)
    {
        return view('Super-Admin.Pelamar.edit-kandidat.edit-skill', [
            "title" => 'edit Skill',
            "data" => $skill
        ]);
    }

    public function update_skill(Request $request, Skill $skill)
    {
        $vData = $request->validate([
            "skill"   => 'nullable',
            "experience_level"  => 'nullable'
        ]);
        $vData['pelamar_id'] = $skill->pelamar_id;
        $skill->update($vData);

        return back();
    }

    public function delete_user(User $user)
    {
        $user->delete();
        return back()->with('success', 'akun berhasil di hapus');
    }

    public function kandidat_create(Request $request)
    {
        $validasi_data = $request->validate([
            "username" => "required",
            "email" => "required|email",
            "password" => "required",
            "role" => "required"
        ]);
        $validasi_data['password'] = Hash::make($request->password);
        $user = User::create($validasi_data);

        $validasi_dataPelamar = $request->validate([
            "nama_pelamar" => "required",
            "telepon_pelamar" => "required",
            "gender" => "required",
            "kategori" => "required",
            "img_profile" => "nullable|image|mimes:jpg,jpeg,png"
        ]);

        $imgPath = null;
        if ($request->hasFile('img_profile')) {
            $imgPath = $request->file('img_profile')->store('images', 'public');
        }

        $validasi_dataPelamar['img_profile'] = $imgPath;

        // dd($validasi_dataPelamar);


        $pelamar = $user->pelamars()->create($validasi_dataPelamar);

        session(['pelamar_id' => $pelamar->id]);

        return redirect('/dashboard/superadmin/pelamar/add/kandidat');
    }


    public function edit_kandidat(Pelamar $pelamar)
    {
        return view('Super-Admin.Pelamar.Kandidat.edit_kandidat_super_admin', [
            "title" => "Edit Kandidat",
            "Data" => $pelamar
        ]);
    }

    public function kandidat_view(Pelamar $pelamar)
    {
        return view('Super-Admin.Pelamar.Kandidat.kandidat-view', [
            "title" => "Detail Kandidat",
            "Data"  => $pelamar
        ]);
    }
    public function update_kandidat(Request $request, Pelamar $pelamar)
    {

        $user = User::findOrFail($pelamar->users->id);

        $validasi_data = $request->validate([
            "username" => "required",
            "email" => "required|email",
            "password" => "nullable",
            "role" => "required"
        ]);

        if ($request->filled('password')) {
            $validasi_data['password'] = Hash::make($request->password);
        } else {
            unset($validasi_data['password']);
        }

        $user->update($validasi_data);

        $validasi_dataPelamar = $request->validate([
            "nama_pelamar" => "required",
            "telepon_pelamar" => "required",
            "gender" => "required",
            "img_profile"  =>   "nullable"
        ]);

        if ($request->hasFile('img_profile')) {
            if ($pelamar->img_profile && Storage::exists('public/' . $pelamar->img_profile)) {
                Storage::delete('public/' . $pelamar->img_profile);
            }

            $path = $request->file('img_profile')->store('images', 'public');

            $validasi_dataPelamar['img_profile'] = $path;
            // dd($validasi_dataPelamar);
        }

        $pelamar->update($validasi_dataPelamar);
        return back();
    }

    //Bagian NON KANDIDAT
    public function non_kandidat_view(Pelamar $pelamar)
    {
        return view('Super-Admin.Pelamar.Non_kandidat.non_kandidat-view', [
            "title" => "Detail Non Kandidat",
            "Data" => $pelamar
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
            ->header('Content-Disposition', 'attachment; filename="cv-' . $pelamar->id . '.pdf"');
    }



    public function add_non_kandidat()
    {
        $pelamar = Pelamar::with('users')->find(session('pelamar_id'));
        return view('Super-Admin.Pelamar.Non_kandidat.add_non_kandidat_super_admin', [
            "title" => "Add Non Kandidat",
            "pelamar"  =>   $pelamar
        ]);
    }

    public function create_non_kandidat(Request $request)
    {
        $validasi_data = $request->validate([
            "username" => "required",
            "email" => "required|email",
            "password" => "required",
            "role" => "required"
        ]);

        $validasi_data['password'] = Hash::make($request->password);
        $user = User::create($validasi_data);

        $validasi_dataPelamar = $request->validate([
            "nama_pelamar" => "required",
            "telepon_pelamar" => "required",
            "gender" => "required",
            "img_profile"  =>   "nullable"
        ]);

        $imgPath = null;
        if ($request->hasFile('img_profile')) {
            $imgPath = $request->file('img_profile')->store('images', 'public');
        }

        $validasi_dataPelamar['img_profile'] = $imgPath;

        $pelamar = $user->pelamars()->create($validasi_dataPelamar);
        // dd($pelamar->id);
        session(['pelamar_id' => $pelamar->id]);
        return redirect('/dashboard/superadmin/pelamar/add/non_kandidat');
    }



    public function edit_non_kandidat(Pelamar $pelamar)
    {
        return view('Super-Admin.Pelamar.Non_kandidat.edit_non_kandidat_super_admin', [
            "title" => "Edit Non Kandidat",
            "Data"  =>  $pelamar
        ]);
    }

    public function update_non_kandidat(Request $request, Pelamar $pelamar)
    {

        $user = User::findOrFail($pelamar->users->id);

        $validasi_data = $request->validate([
            "username" => "required",
            "email" => "required|email",
            "password" => "nullable",
            "role" => "required"
        ]);

        if ($request->filled('password')) {
            $validasi_data['password'] = Hash::make($request->password);
        } else {
            unset($validasi_data['password']);
        }

        $user->update($validasi_data);

        $validasi_dataPelamar = $request->validate([
            "nama_pelamar" => "required",
            "telepon_pelamar" => "required",
            "gender" => "required",
            "img_profile"  =>   "nullable"
        ]);

        if ($request->hasFile('img_profile')) {
            if ($pelamar->img_profile && Storage::exists('public/' . $pelamar->img_profile)) {
                Storage::delete('public/' . $pelamar->img_profile);
            }

            $path = $request->file('img_profile')->store('images', 'public');

            $validasi_dataPelamar['img_profile'] = $path;
            // dd($validasi_dataPelamar);
        }

        $pelamar->update($validasi_dataPelamar);
        return back();
    }


    public function create_alamat(Request $request)
    {
        $vData = $request->validate([
            'label'     => 'nullable',
            'desa'      => 'nullable',
            'kecamatan' => 'nullable',
            'kota'      => 'nullable',
            'provinsi'  => 'nullable',
            'kode_pos'  => 'nullable',
            'detail'    => 'nullable',
            'pelamar_id' => 'required|exists:pelamars,id',
        ]);

        Alamatpelamar::create($vData);
        return back();
    }

    public function create_pendidikan(Request $request)
    {
        $vData = $request->validate([
            'pelamar_id' => 'required|exists:pelamars,id',
            'pendidikan' => 'nullable',
            'jurusan' => 'nullable',
            'asal_pendidikan' => 'nullable',
            'tahun_awal' => 'nullable',
            'tahun_akhir' => 'nullable',
        ]);

        RiwayatPendidikan::create($vData);
        return back();
    }

    public function create_organisasi(Request $request)
    {
        $vData = $request->validate([
            'pelamar_id' => 'required|exists:pelamars,id',
            'nama_organisasi' => 'nullable',
            'jabatan' => 'nullable',
            'tahun_awal' => 'nullable',
            'tahun_akhir' => 'nullable',
            'deskripsi' => 'nullable',
        ]);

        Organisasi::create($vData);

        return back();
    }


    public function create_pengalaman(Request $request)
    {
        $vData = $request->validate([
            'pelamar_id' => 'required|exists:pelamars,id',
            'posisi_kerja' => 'nullable',
            'jabatan_kerja' => 'nullable',
            'nama_perusahaan' => 'nullable',
            'tahun_awal' => 'nullable',
            'tahun_akhir' => 'nullable',
            'deskripsi' => 'nullable',
        ]);

        Pengalamankerja::create($vData);

        return back();
    }

    public function create_skill(Request $request)
    {
        $vData = $request->validate([
            'pelamar_id' => 'required|exists:pelamars,id',
            'skill' => 'required',
            'experience_level' => 'required',
        ]);


        Skill::create($vData);

        return back();
    }




    //Bagian Calon Kandidat
    public function add_calon_kandidat()
    {
        return view('Super-Admin.Pelamar.Calon_kandidat.add_kandidat_super_admin', [
            "title" => "Edit Calon Kandidat",
            "pelamarList"   =>    Pelamar::all(),
            "Divisi"        =>  Divisi::all()
        ]);
    }

    public function update_calon_kandidat(Request $request, Pelamar $pelamar)
    {
        if ($request->filled('kategori')) {
            $pelamar->kategori = $request->kategori;
        }

        if ($request->filled('mulai_pelatihan')) {
            $pelamar->mulai_pelatihan = $request->mulai_pelatihan;
        }
        if ($request->filled('divisi')) {
            $pelamar->divisi = $request->divisi;
        }

        // if ($request->filled('selesai_pelatihan')) {
        //     $pelamar->selesai_pelatihan = $request->selesai_pelatihan;
        // }

        $pelamar->save();
        return back();
    }

    public function view_calon_kandidat()
    {
        return view('Super-Admin.Pelamar.Calon_kandidat.kandidat-view', [
            "title" => "Detail Calon Kandidat"
        ]);
    }

    // Data Perusahaan

    public function perusahaan()
    {
        return view('Super-Admin.Perusahaan.data-perusahaan_superAdmin', [
            "title" => "Data Perusahaan",
            "Data" => Perusahaan::all()
        ]);
    }
    public function perusahaan_add()
    {
        return view('Super-Admin.Perusahaan.add_data_perusahaan_super_admin', [
            "title" => "Tambah Perusahaan"
        ]);
    }
    public function perusahaan_edit(Perusahaan $perusahaan)
    {
        return view('Super-Admin.Perusahaan.edit_data_perusahaan_super_admin', [
            "title" => "Edit Perusahaan",
            "Data"  =>  $perusahaan
        ]);
    }
    public function perusahaan_update(Request $request, Perusahaan $perusahaan)
    {
        $user = User::findOrFail($perusahaan->users->id);

        $validasi_data = $request->validate([
            "username" => "required",
            "email" => "required|email",
            "password" => "nullable",
        ]);

        if ($request->filled('password')) {
            $validasi_data['password'] = Hash::make($request->password);
        } else {
            unset($validasi_data['password']);
        }

        $user->update($validasi_data);

        $validasi_dataPerusahaan = $request->validate([
            "nama_perusahaan" => "required",
            "img_profile"   =>   "nullable",
            "legalitas" => "required",
            "deskripsi" => "required",
            "visi" => "required",
            "misi" => "required",
            "telepon_perusahaan" => "required",
            "whatsapp" => "required",
        ]);
        if ($request->hasFile('img_profile')) {
            if ($perusahaan->img_profile && Storage::exists('public/' . $perusahaan->img_profile)) {
                Storage::delete('public/' . $perusahaan->img_profile);
            }

            $path = $request->file('img_profile')->store('images', 'public');
            $validasi_dataPerusahaan['img_profile'] = $path;
        }

        $perusahaan->update($validasi_dataPerusahaan);
        return back();
    }

    public function perusahaan_create(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'username' => 'required',
            'password' => 'required',
            'nama_perusahaan' => 'required',
            'legalitas' => 'nullable',
            'deskripsi' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'telepon_perusahaan' => 'nullable',
            'whatsapp' => 'nullable',
            'img_profile' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        $user = User::create([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => 'perusahaan',
        ]);

        $imgPath = null;

        if ($request->hasFile('img_profile')) {
            $imgPath = $request->file('img_profile')->store('images', 'public');
        }

        Perusahaan::create([
            'user_id' => $user->id,
            'nama_perusahaan' => $validated['nama_perusahaan'],
            'legalitas' => $request->legalitas,
            'deskripsi' => $validated['deskripsi'],
            'visi' => $validated['visi'],
            'misi' => $validated['misi'],
            'telepon_perusahaan' => $request->telepon_perusahaan,
            'whatsapp' => $request->whatsapp,
            'img_profile' => $imgPath,
        ]);
        return redirect('/dashboard/superadmin/perusahaan')->with('success', 'Perusahaan berhasil ditambahkan!');
    }

    public function perusahaan_delete(User $user)
    {
        $user->destroy($user->id);
        return redirect('/dashboard/superadmin/perusahaan');
    }

    public function perusahaan_detail(Perusahaan $perusahaan)
    {
        return view('Super-Admin.Perusahaan.details_perusahaan_superAdmin', [
            "title" => "",
            "Data"  =>    $perusahaan
        ]);
    }
    public function lowongan_detail(LowonganPerusahaan $lowongan)
    {
        return view('Super-Admin.Perusahaan.detail-lowongan_perusahaan_superAdmin', [
            "title" => "",
            "Data"  => $lowongan
        ]);
    }

    public function jadikan_rekomendasi(LowonganPerusahaan $lowongan)
    {
        $lowongan->update([
            "rekomendasi"  => 1
        ]);

        return back();
    }

    public function lowongan_add(Perusahaan $perusahaan)
    {
        return view('Super-Admin.Perusahaan.tambah_lowongan-perusahaan_superAdmin', [
            "title" => "Tambah Lowongan",
            "Data"  =>  $perusahaan
        ]);
    }

    public function lowongan_create(Request $request)
    {
        // dd($request->all());
        $valdas = $request->validate([
            "nama"    =>     "required",
            "alamat"  =>     "required",
            "jenis"   =>     "required",
            "gaji_awal"  => "required",
            "gaji_akhir" => "required",
            "deskripsi"  => "required",
            "syarat_pekerjaan" => "required",
            "batas_lamaran"    => "required"
        ]);

        $valdas['perusahaan_id'] = $request->perusahaan_id;
        $valdas['slug']     =   Str::slug($request->nama);

        LowonganPerusahaan::create($valdas);
        return redirect('/dashboard/superadmin/perusahaan');
    }

    public function lowongan_edit(LowonganPerusahaan $lowongan)
    {
        return view('Super-Admin.Perusahaan.edit_lowongan-perusahaan_superAdmin', [
            "title" => "Edit Lowongan",
            "Data"  =>  $lowongan
        ]);
    }

    public function lowongan_update(Request $request, LowonganPerusahaan $lowongan)
    {
        $valdas = $request->validate([
            "nama"    =>     "required",
            "alamat"  =>     "required",
            "jenis"   =>     "required",
            "gaji_awal"  => "required",
            "gaji_akhir" => "required",
            "deskripsi"  => "required",
            "syarat_pekerjaan" => "required",
            "batas_lamaran"    => "required"
        ]);

        $lowongan->update($valdas);
        return back();
    }

    // Recrutiment
    public function recrutiment_detail()
    {
        return view('Super-Admin.Perusahaan.Recrutiment.detail_recrutiment_superAdmin', [
            "title" => "Detail Kandidat"
        ]);
    }
    public function recrutiment_edit()
    {
        return view('Super-Admin.Perusahaan.Recrutiment.edit_kandidat_recrutiment_superAdmin', [
            "title" => "Detail Pelamar"
        ]);
    }

    // Talent Hunter
    public function talent_hunter_detail()
    {
        return view('Super-Admin.Perusahaan.Talent-Hunter.detail-tulent_hunter_superAdmin', [
            "title" => "Data Talent Hunter"
        ]);
    }
    public function talent_hunter_add()
    {
        return view('Super-Admin.Perusahaan.Talent-Hunter.add-data_tulent-hunter_superAdmin', [
            "title" => "Tambah Tulent Hunter"
        ]);
    }
    public function talent_hunter_edit()
    {
        return view('Super-Admin.Perusahaan.Talent-Hunter.edit-data_tulent-hunter_superAdmin', [
            "title" => "Edit Tulent Hunter"
        ]);
    }


    // Finance
    public function finance()
    {
        return view('Super-Admin.finance.finance-index_superAdmin', [
            "title" => "Paket Harga",
            "koin" => HargaKoin::all(),
            "tunai" => HargaPembayaran::all(),
            "cash"  =>  CatatanCash::all(),
            "koins" =>  CatatanKoin::all()
        ]);
    }
    public function finance_edit_paket_koin()
    {
        return view('Super-Admin.finance.edit_paket_harga-koin_superAdmin', [
            "title" => "Paket Harga Koin",
            "koin" => HargaKoin::all(),
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

        return redirect('/dashboard/superadmin/finance/edit/paketkoin');
    }

    public function finance_edit_paket_pembayaran()
    {
        return view('Super-Admin.finance.edit_paket_harga-tunai_superAdmin', [
            "title" => "Paket Harga Pembayaran",
            "harga" => HargaPembayaran::all()
        ]);
    }

    public function update_tunai(Request $request)
    {
        foreach ($request->id as $i => $id) {
            $harga = HargaPembayaran::find($id);
            if ($harga) {
                $harga->harga = $request->harga[$i];
                $harga->save();
            }
        }

        return redirect('/dashboard/superadmin/finance/edit/paketpembayaran');
    }

    // Freeze Akun
    public function freeze()
    {
        return view('Super-Admin.Freeze-Akun.freeze_akun_superAdmin', [
            "title" => "Akun Freeze",
            "Data" => User::all()
        ]);
    }


    public function banned(Request $request, User $user)
    {
        // dd($request->all());
        $data = $request->validate([
            "status" => "required|boolean"
        ]);

        $user->update($data);
        return redirect('/dashboard/superadmin/freeze');
    }


    public function unbanned(Request $request, User $user)
    {
        // dd($request->all());
        $data = $request->validate([
            "status" => 'required|boolean'
        ]);

        $user->update($data);
        return redirect('/dashboard/superadmin/freeze');
    }

    public function delete_akun(User $user)
    {
        $user->delete();
        return redirect('/dashboard/superadmin/freeze');
    }



    public function freeze_detail(User $user)
    {
        return view('Super-Admin.Freeze-Akun.detail_freeze_akun_superAdmin', [
            "title" => "Akun Freeze",
            "data" => $user
        ]);
    }
    public function tipskerja()
    {
        return view('Super-Admin.Tipskerja-superadmin.tipskerja_index', [
            "title" => "Tips Kerja",
            "all" => Tipskerja::count(),
            "terbit" => Tipskerja::where('status', 'terbit')->count(),
            "noterbit" => Tipskerja::where('status', 'belum terbit')->count(),
            "sudah_terbit" => Tipskerja::where('status', 'terbit')->get(),
            "belum_terbit" => Tipskerja::where('status', 'belum terbit')->get(),
        ]);
    }
    public function tipskerja_add()
    {
        return view('Super-Admin.Tipskerja-superadmin.add-post_tipsKerja_superAdmin', [
            "title" => "Buat Post Baru"
        ]);
    }

    public function tipskerja_create(Request $request)
    {
        $data = $request->validate([
            'title' => 'nullable|string',
            'content' => 'nullable|string',
            'penulis' => 'nullable|string',
            'image' => 'nullable|file|image|mimes:png,jpg,jpeg',
            'status' => 'nullable',
            'intro' => 'nullable|string',
            'section' => 'nullable|json',
        ]);

        $data['penulis'] = Auth::user()->username;
        $data['status'] = 'belum terbit';

        $intro = $request->input('intro');
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
                        "isi" => $p,
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
            "title" => "Event",
            "Data" => Event::all()
        ]);
    }
    public function event_add()
    {
        return view('Super-Admin.Event.add-event', [
            "title" => "Buat Event Baru"
        ]);
    }

    public function event_store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'status' => "nullable",
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
            'waktu' => "nullable|array",
            'waktu.*' => "nullable|string",
            'kegiatan' => "nullable|array",
            'kegiatan.*' => "nullable|string"
        ]);


        foreach ($datas['waktu'] as $i => $waktu) {
            KegiatanEvent::create([
                'event_id' => $event->id,
                'waktu' => $waktu,
                'kegiatan' => $datas['kegiatan'][$i] ?? null,
            ]);
        }
        return redirect('/dashboard/superadmin/event')->with('success', 'Event berhasil ditambahkan!');
    }


    public function event_detail(Event $event)
    {
        return view('Super-Admin.Event.detail-event', [
            "title" => "Event",
            "Data" => $event
        ]);
    }
    public function event_edit(Event $event)
    {
        return view('Super-Admin.Event.edit-event', [
            "title" => "Edit Event",
            "Data" => $event
        ]);
    }

    public function event_update(Request $request, Event $event)
    {
        $data = $request->validate([
            'status' => "nullable",
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
            'waktu' => "nullable|array",
            'waktu.*' => "nullable|string",
            'kegiatan' => "nullable|array",
            'kegiatan.*' => "nullable|string"
        ]);

        if (!empty($datas['waktu'])) {
            foreach ($datas['waktu'] as $i => $waktu) {
                if (!empty($datas['id'][$i])) {
                    KegiatanEvent::where('id', $datas['id'][$i])
                        ->update([
                            'waktu' => $waktu,
                            'kegiatan' => $datas['kegiatan'][$i] ?? null,
                        ]);
                } else {
                    $event->kegiatan_events()->create([
                        'waktu' => $waktu,
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
            "title" => "Kelola Akun",
            "Data" => User::all()
        ]);
    }
    public function akun_view(User $user)
    {
        return view('Super-Admin.Akun.view_akun_super-Admin', [
            "title" => "Kelola Akun",
            "Data" => $user,
            "Provinsi"  =>   Provinsi::all(),
            "Kabupaten"  =>  Kabupaten::all(),
            "Kecamatan"  =>  Daerah::all(),
        ]);
    }
    public function akun_add()
    {
        return view('Super-Admin.Akun.add-akun_superAdmin', [
            "title" => "Kelola Akun",
            "Provinsi"  =>   Provinsi::all(),
            "Kabupaten"  =>  Kabupaten::all(),
            "Kecamatan"  =>  Daerah::all(),
        ]);
    }


    public function create_pengguna(Request $request)
    {
        $validasiData = $request->validate([
            "username"   =>    "required",
            "email"      =>    "required",
            "password"   =>    "required",
            "role"       =>     "required",
            "status"     =>     "required|boolean",
            "provinsi"   =>     "nullable",
            "kota"       =>      "nullable",
            "kecamatan"  =>      "nullable",
            "kode_pos"   =>      "nullable",
            "detail"     =>      "nullable"
        ]);


        $user = User::create([
            "username"   => $validasiData["username"],
            "email"      => $validasiData["email"],
            "password"   => $validasiData["password"] = Hash::make($request->password),
            "role"       => $validasiData["role"],
            "status"       => $validasiData["status"],
        ]);

        if ($user->role === "pelamar") {
            $pelamar = $user->pelamars()->create([
                "nama_pelamar"   =>    $validasiData['username']
            ]);

            $pelamar->alamat_pelamars()->create([
                "provinsi"   =>    $validasiData["provinsi"],
                "kota"       =>    $validasiData["kota"],
                "kecamatan"  =>    $validasiData["kecamatan"],
                "kode_pos"   =>    $validasiData["kode_pos"],
                "detail"     =>    $validasiData["detail"]
            ]);
        }
        if ($user->role === "perusahaan") {
            $perusahaan = $user->perusahaan()->create([
                "nama_perusahaan"   =>    $validasiData['username']
            ]);

            $perusahaan->Alamatperusahaan()->create([
                "provinsi"   =>    $validasiData["provinsi"],
                "kota"       =>    $validasiData["kota"],
                "kecamatan"  =>    $validasiData["kecamatan"],
                "kode_pos"   =>    $validasiData["kode_pos"],
                "detail"     =>    $validasiData["detail"]
            ]);
        }


        if ($user->role === "superadmin") {
            $user->superadmins()->create([
                "nama_lengkap"  =>    $validasiData["username"],
                "provinsi"   =>    $validasiData["provinsi"],
                "kota"       =>    $validasiData["kota"],
                "kecamatan"  =>    $validasiData["kecamatan"],
                "kode_pos"   =>    $validasiData["kode_pos"],
                "detail_alamat"     =>    $validasiData["detail"]
            ]);
        }

        if ($user->role === "admin") {
            $user->admin()->create([
                "nama_lengkap"  =>    $validasiData["username"],
                "provinsi"   =>    $validasiData["provinsi"],
                "kota"       =>    $validasiData["kota"],
                "kecamatan"  =>    $validasiData["kecamatan"],
                "kode_pos"   =>    $validasiData["kode_pos"],
                "detail_alamat"     =>    $validasiData["detail"]
            ]);
        }

        if ($user->role === "finance") {
            $user->finance()->create([
                "nama_lengkap"  =>    $validasiData["username"],
                "provinsi"   =>    $validasiData["provinsi"],
                "kota"       =>    $validasiData["kota"],
                "kecamatan"  =>    $validasiData["kecamatan"],
                "kode_pos"   =>    $validasiData["kode_pos"],
                "detail_alamat"     =>    $validasiData["detail"]
            ]);
        }

        return redirect('/dashboard/superadmin/akun')->with('success2', 'Data pengguna berhasil diperbarui');
    }
    public function update_pengguna(Request $request, User $user)
    {
        $roleLama = $user->role;

        $validasiData = $request->validate([
            "username"   => "required",
            "email"      => "required|email",
            "password"   => "nullable|min:6",
            "role"       => "required",
            "status"     => "required|boolean",
            "provinsi"   => "nullable",
            "kota"       => "nullable",
            "kecamatan"  => "nullable",
            "kode_pos"   => "nullable",
            "detail"     => "nullable"
        ]);

        if ($roleLama !== $request->role) {
            switch ($roleLama) {
                case 'pelamar':
                    if ($user->pelamars) {
                        $user->pelamars->alamat_pelamars()->delete();
                        $user->pelamars->delete();
                    }
                    break;
                case 'perusahaan':
                    if ($user->perusahaan) {
                        $user->perusahaan->alamatperusahaan()->delete();
                        $user->perusahaan->delete();
                    }
                    break;
                case 'admin':
                    if ($user->admin) $user->admin->delete();
                    break;
                case 'finance':
                    if ($user->finance) $user->finance->delete();
                    break;
                case 'superadmin':
                    if ($user->superadmins) $user->superadmins->delete();
                    break;
            }
        }

        $user->update([
            "username" => $validasiData["username"],
            "email"    => $validasiData["email"],
            "password" => $request->filled('password')
                ? Hash::make($request->password)
                : $user->password,
            "role"     => $validasiData["role"],
            "status"   => $validasiData["status"],
        ]);

        switch ($request->role) {
            case 'pelamar':
                $pelamar = $user->pelamars()->firstOrCreate(
                    ['user_id' => $user->id],
                    ['nama_pelamar' => $validasiData["username"]]
                );

                $pelamar->alamat_pelamars()->updateOrCreate(
                    ['pelamar_id' => $pelamar->id],
                    [
                        "provinsi"   => $validasiData["provinsi"],
                        "kota"       => $validasiData["kota"],
                        "kecamatan"  => $validasiData["kecamatan"],
                        "kode_pos"   => $validasiData["kode_pos"],
                        "detail"     => $validasiData["detail"],
                    ]
                );
                break;

            case 'perusahaan':
                $perusahaan = $user->perusahaan()->firstOrCreate(
                    ['user_id' => $user->id],
                    ['nama_perusahaan' => $validasiData["username"]]
                );

                $perusahaan->alamatperusahaan()->updateOrCreate(
                    ['perusahaan_id' => $perusahaan->id],
                    [
                        "provinsi"   => $validasiData["provinsi"],
                        "kota"       => $validasiData["kota"],
                        "kecamatan"  => $validasiData["kecamatan"],
                        "kode_pos"   => $validasiData["kode_pos"],
                        "detail"     => $validasiData["detail"],
                    ]
                );
                break;

            case 'admin':
                $user->admin()->updateOrCreate(
                    ['user_id' => $user->id],
                    [
                        "nama_lengkap"  => $validasiData["username"],
                        "provinsi"      => $validasiData["provinsi"],
                        "kota"          => $validasiData["kota"],
                        "kecamatan"     => $validasiData["kecamatan"],
                        "kode_pos"      => $validasiData["kode_pos"],
                        "detail_alamat" => $validasiData["detail"],
                    ]
                );
                break;

            case 'finance':
                $user->finance()->updateOrCreate(
                    ['user_id' => $user->id],
                    [
                        "nama_lengkap"  => $validasiData["username"],
                        "provinsi"      => $validasiData["provinsi"],
                        "kota"          => $validasiData["kota"],
                        "kecamatan"     => $validasiData["kecamatan"],
                        "kode_pos"      => $validasiData["kode_pos"],
                        "detail_alamat" => $validasiData["detail"],
                    ]
                );
                break;

            case 'superadmin':
                $user->superadmins()->updateOrCreate(
                    ['user_id' => $user->id],
                    [
                        "nama_lengkap"  => $validasiData["username"],
                        "provinsi"      => $validasiData["provinsi"],
                        "kota"          => $validasiData["kota"],
                        "kecamatan"     => $validasiData["kecamatan"],
                        "kode_pos"      => $validasiData["kode_pos"],
                        "detail_alamat" => $validasiData["detail"],
                    ]
                );
                break;
        }

        return redirect('/dashboard/superadmin/akun')->with('success3', 'Data pengguna berhasil diperbarui');
    }



    public function akun_edit(User $user)
    {
        return view('Super-Admin.Akun.edit-akun_superAdmin', [
            "title" => "Kelola Akun",
            "Data" => $user,
            "Provinsi"  =>   Provinsi::all(),
            "Kabupaten"  =>  Kabupaten::all(),
            "Kecamatan"  =>  Daerah::all(),
        ]);
    }
    public function akun_delete(User $user)
    {
        $user->delete();
        return redirect('/dashboard/superadmin/akun')->with('success', 'berhasil');
    }

    //Link & Header
    public function pengaturan_page()
    {
        return view('Super-Admin.Pengaturan.pengaturan_page_superAdmin', [
            "title" => "Image Header Social Media"
        ]);
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

        return redirect('/dashboard/superadmin/pengaturan')->with('success', 'berhasil di ubah');
    }

    public function pengaturan()
    {
        return view('Super-Admin.Pengaturan.pengaturan_superAdmin', [
            "title" => "Pengaturan"
        ]);
    }
}
