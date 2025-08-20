<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile() {
        return view('Data-profile.profile');
    }

    public function alamat() {
        return view('Data-profile.alamat');
    }

    public function form_data_alamat() {
        return view('Data-profile.form_data-alamat');
    }
}
