<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function index() {
        return view('Super-Admin.dashboard-superAdmin.dashboard-super_admin',[
            "title"  =>    "Dashboard"
        ]);
    }
    public function pelamar() {
        return view('Super-Admin.Pelamar.index',[
            "title"  =>    "Profile"
        ]);
    }
    public function pelamar_edit() {
        return view('Super-Admin.Pelamar.pelamar-edit_super_admin',[
            "title"  =>    "Profile"
        ]);
    }
}
