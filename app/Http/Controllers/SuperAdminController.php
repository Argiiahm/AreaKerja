<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function index()
    {
        return view('Super-Admin.dashboard-superAdmin.dashboard-super_admin', [
            "title"  =>    "Dashboard"
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
            "title"  =>    "Profile"
        ]);
    }


    public function pelamar()
    {
        return view('Super-Admin.Pelamar.pelamar_super_admin', [
            "title"   =>  "Data Kandidat"
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
    public function non_kandidat_view()
    {
        return view('Super-Admin.Pelamar.Non_kandidat.non_kandidat-view', [
            "title"   =>    "Detail Non Kandidat"
        ]);
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

}
