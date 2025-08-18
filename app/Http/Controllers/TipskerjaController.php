<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TipskerjaController extends Controller
{
    public function index() {
        return view('tips-kerja');
    }
    
    public function details() {
        return view('details-tips_kerja');
    }
}
