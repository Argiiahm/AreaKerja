<?php

namespace App\Http\Controllers;

use App\Models\Pelamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelamarController extends Controller
{
    public function lamar_cepat(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'lowongan_id' => 'required',
        ]);

        $pelamar = Pelamar::where('user_id', Auth::id())->firstOrFail();
        // dd($pelamar->id, $request->lowongan_id);
        $pelamar->lowongan_perusahaan()->attach($request->lowongan_id, [
            'status' => 'pending',
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        return back()->with('success', 'Lamaran berhasil dikirim!');
    }
}
