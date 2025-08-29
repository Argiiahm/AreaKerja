<?php

namespace App\Http\Controllers;

use App\Models\Alamatpelamar;
use App\Models\Organisasi;
use App\Models\Pengalamankerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('Data-profile.profile');
    }

    public function alamat()
    {
        return view('Data-profile.alamat');
    }

    //alamat
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
}
