<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function profile_edit()
    {
        return view('Admin.Dashboard-admin.edit-profile_admin_dashboard', [
            "title"    =>     "Profile"
        ]);
    }
    public function pelamar()
    {
        return view('Admin.Dashboard-admin.pelamar-dashboard_admin', [
            "title"    =>      "Data Kandidat"
        ]);
    }

    public function kandidat_view_cv()
    {
        return view('Admin.Dashboard-admin.kandidat-view_cv_admin_dashboard', [
            "title"   =>   ""
        ]);
    }
    public function non_kandidat_view_cv()
    {
        return view('Admin.Dashboard-admin.nonkandidat-view_cv_admin_dashboard', [
            "title"   =>   ""
        ]);
    }

    public function calon_kandidat_view()
    {
        return view('Admin.Dashboard-admin.calon_kandidat-view_admin_dashboard', [
            "title"   =>   "Data Kandidat"
        ]);
    }
}
