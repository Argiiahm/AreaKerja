<?php

namespace App\Http\Controllers;

use App\Models\Alamatpelamar;
use App\Models\Organisasi;
use App\Models\Pelamar;
use App\Models\Pengalamankerja;
use App\Models\RiwayatPendidikan;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('Data-profile.profile');
    }

    public function tambah_profile(Request $request, Pelamar $pelamar)
    {


        // if ($pelamar->img_profile && Storage::exists('public/' . $pelamar->img_profile)) {
        //     Storage::delete('public/' . $pelamar->img_profile);
        // }

        $vdata = $request->validate([
            "nama_pelamar"    =>      "nullable",
            "img_profile"     =>      'nullable|file|image|mimes:png,jpg,jpeg',
            "gender"          =>      "nullable",
            "tanggal_lahir"   =>      "nullable",
            "deskripsi_diri"  =>     "nullable",
            "gaji_minimal"    =>     "nullable",
            "gaji_maksimal"    =>     "nullable"
        ]);

        if ($request->hasFile('img_profile')) {
            if ($pelamar->img_profile && Storage::exists('public/' . $pelamar->img_profile)) {
                Storage::delete('public/' . $pelamar->img_profile);
            }
            $vdata['img_profile'] = $request->file('img_profile')->store('images', 'public');
        }


        $vdata['user_id'] = Auth::user()->id;
        $pelamar->update($vdata);

        $sosmed = $request->validate([
            "instagram" => 'nullable',
            "linkedin" => 'nullable',
            "website" => 'nullable',
            "twitter" => 'nullable'
        ]);

        $pelamar->sosmed()->create($sosmed);
        return redirect('/profile');

        return view('Data-profile.profile');
    }

    public function hapus_profile(Pelamar $pelamar)
    {

        if ($pelamar->img_profile && Storage::exists('public/' . $pelamar->img_profile)) {
            Storage::delete('public/' . $pelamar->img_profile);
        }

        $pelamar->img_profile = null;
        $pelamar->save();
        return redirect('/profile');
    }


    //alamat
    public function alamat()
    {
        return view('Data-profile.alamat');
    }
    public function form_data_alamat()
    {
        return view('Data-profile.form_data-alamat');
    }

    public function create_data_alamat(Request $request)
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

        $vData['pelamar_id'] = Auth::user()->pelamars->id;
        Alamatpelamar::create($vData);
        return redirect('/alamat');
    }
    public function edit_data_alamat(Alamatpelamar $alamatpelamar)
    {
        return view('Data-profile.edit-alamat', [
            "data"  => $alamatpelamar
        ]);
    }
    public function update_data_alamat(Request $request, Alamatpelamar $alamatpelamar)
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

        $vData['pelamar_id'] = Auth::user()->pelamars->id;
        $alamatpelamar->update($vData);
        return redirect('/alamat');
    }


    //organisasi
    public function add_organisasi(Request $request)
    {
        $v = $request->validate([
            'nama_organisasi'     =>  "nullable",
            'jabatan'     =>     "nullable",
            'tahun_awal'     =>     "nullable",
            'tahun_akhir'     =>     "nullable",
            'deskripsi'     =>     "nullable",
        ]);

        $v['pelamar_id']  =   Auth::user()->pelamars->id;

        Organisasi::create($v);
        return redirect('/profile');
        return back();
    }

    public function edit_organisasi(Organisasi $organisasi)
    {
        return view('Data-profile.edit-organisasi', [
            "Data"    =>    $organisasi
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

        $v['pelamar_id']  =   Auth::user()->pelamars->id;

        $organisasi->update($v);
        return redirect('/profile');
        return back();
    }

    // RIwayat Pendiidkan

    public function add_pendidikan(Request $request)
    {
        $v = $request->validate([
            "pendidikan"          =>      "nullable",
            "jurusan"             =>      "nullable",
            "asal_pendidikan"     =>      "nullable",
            "tahun_awal"          =>      "nullable",
            "tahun_akhir"         =>      "nullable",
        ]);

        $v['pelamar_id']  =  Auth::user()->pelamars->id;
        RiwayatPendidikan::create($v);

        return redirect('/profile');

    }

    public function edit_pendidikan(RiwayatPendidikan $pendidikan) {
        return view('Data-profile.edit_pendidikan',[
            "Data"   =>    $pendidikan
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

        $v['pelamar_id']  =  Auth::user()->pelamars->id;
        $pendidikan->update($v);

        return redirect('/profile');

    }

    //Pengalaman Kerja
    public function tambah_pengalaman(Request $request)
    {
        $vdata = $request->validate([
            'posisi_kerja'  =>    "nullable",
            'jabatan_kerja'  =>    "nullable",
            'nama_perusahaan'  =>    "nullable",
            'tahun_awal'  =>    "nullable",
            'tahun_akhir'  =>    "nullable",
            'deskripsi'  =>    "nullable",
        ]);
        $vdata['pelamar_id'] = Auth::user()->pelamars->id;
        Pengalamankerja::create($vdata);
        return redirect('/profile');
    }

    public function edit_pengalaman(Pengalamankerja $pengalamankerja)
    {
        return view('Data-profile.edit-pengalaman_kerja', [
            "data" => $pengalamankerja
        ]);
    }

    public function update_pengalaman(Request $request, Pengalamankerja $pengalamankerja)
    {
        $vdata = $request->validate([
            'posisi_kerja'  =>    "nullable",
            'jabatan_kerja'  =>    "nullable",
            'nama_perusahaan'  =>    "nullable",
            'tahun_awal'  =>    "nullable",
            'tahun_akhir'  =>    "nullable",
            'deskripsi'  =>    "nullable",
        ]);
        $vdata['pelamar_id'] = Auth::user()->pelamars->id;
        $pengalamankerja->update($vdata);
        return redirect('/profile');
        return back();
    }

    //skill

    public function tambah_skill(Request $request)
    {
        $vData = $request->validate([
            "skill"   => 'nullable',
            "experience_level"  => 'nullable'
        ]);
        $vData['pelamar_id'] = Auth::user()->pelamars->id;
        Skill::create($vData);
        return redirect('/profile');
    }

    public function edit_skill(Skill $skill)
    {
        return view('Data-profile.edit-skill', [
            "data" => $skill
        ]);
    }

    public function update_skill(Request $request, Skill $skill)
    {
        $vData = $request->validate([
            "skill"   => 'nullable',
            "experience_level"  => 'nullable'
        ]);
        $vData['pelamar_id'] = Auth::user()->pelamars->id;
        $skill->update($vData);
        return redirect('/profile');
    }
}
