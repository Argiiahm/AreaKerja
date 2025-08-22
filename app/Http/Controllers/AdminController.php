<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view('Admin.Dashboard-admin.dashboard',[
            "title"    =>     "Dashboard"
        ]);
    }
    public function profile() {
        return view('Admin.Dashboard-admin.profile-dashboard_admin',[
            "title"    =>     "Profile"
        ]);
    }
}
