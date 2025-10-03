<?php

namespace App\Http\Controllers;

use App\Models\Tipskerja;

class TipskerjaController extends Controller
{
    public function index()
    {
        return view('tips-kerja',[
            "Data"   =>    Tipskerja::latest()->get()
        ]);
    }

    public function details(Tipskerja $tipskerja)
    {
        return view('details-tips_kerja',[
            "Data"  =>    $tipskerja
        ]);
    }
}
