<?php

namespace App\Http\Controllers;

use App\Models\Tipskerja;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TipskerjaController extends Controller
{
    public function index()
    {
        return view('tips-kerja',[
            "Data"   =>    Tipskerja::all()
        ]);
    }

    public function details(Tipskerja $tipskerja)
    {
        return view('details-tips_kerja',[
            "Data"  =>    $tipskerja
        ]);
    }
}
