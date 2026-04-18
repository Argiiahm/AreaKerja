<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Pelamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //Auth Pelamar & Perusahaan
    public function login()
    {
        return view('Auth.login');
    }

    // Login
    public function masuk(Request $request)
    {
        $v = $request->validate([
            "username" => "required",
            "password" => "required"
        ], [
            "username.required" => "Username wajib diisi.",
            "password.required" => "Password wajib diisi.",
        ]);

        $user = User::where('username', $v['username'])->first();

        // cek user
        if (!$user) {
            return back()->with('error', 'Akun tidak ditemukan')->withInput();
        }

        // cek password
        if (!Hash::check($v['password'], $user->password)) {
            return back()->with('error', 'Password salah')->withInput();
        }

        // cek status sebelum login
        if ($user->status !== 0) {
            return back()->with('error', 'Akun dibekukan');
        }

        Auth::login($user);

        $latestEvent = Event::latest()->first();

        return match ($user->role) {
            'superadmin' => redirect('/dashboard/superadmin'),
            'admin' => redirect('/dashboard/admin'),
            'pelamar' => redirect('/')
                ->with('show_event_modal', true)
                ->with('latest_event', $latestEvent),
            'perusahaan' => redirect('/dashboard/perusahaan')
                ->with('show_event_modal', true)
                ->with('latest_event', $latestEvent),
            'finance' => redirect('/dashboard/finance'),
            default => back()->with('error', 'Role tidak dikenali'),
        };
    }



    public function register()
    {
        return view('Auth.Register');
    }


    //Pelamar
    public function buat(Request $request)
    {
        $validasi_data = $request->validate([
            "username" => "required",
            "email"    => "required|email|unique:users,email",
            "password" => "required",
            "role"     => "required",
            "telepon_pelamar" => "required"
        ], [
            "username.required" => "Username wajib diisi.",
            "email.required"    => "Email wajib diisi.",
            "email.email"       => "Format email tidak valid.",
            "email.unique"      => "Email sudah digunakan, coba yang lain.",
            "password.required" => "Password wajib diisi.",
            "role.required"     => "Role wajib diisi.",
            "telepon_pelamar.required" => "No. telepon wajib diisi.",
        ]);

        DB::transaction(function () use ($validasi_data) {

            $validasi_data['password'] = Hash::make($validasi_data['password']);

            $user = User::create($validasi_data);

            $user->pelamars()->create([
                "telepon_pelamar" => $validasi_data['telepon_pelamar']
            ]);
        });

        return back()->with('success', 'Akun Berhasil Dibuat');
    }

    // Perusahaan Register
    public function buat_perusahaan(Request $request)
    {
        $v = $request->validate([
            "username" => "required",
            "email"    => "required|email|unique:users,email",
            "password" => "required",
            "role"     => "required"
        ], [
            "username.required" => "Username wajib diisi.",
            "email.required"    => "Email wajib diisi.",
            "email.email"       => "Format email tidak valid.",
            "email.unique"      => "Email sudah digunakan, coba yang lain.",
            "password.required" => "Password wajib diisi.",
            "password.min"      => "Password minimal 6 karakter.",
            "role.required"     => "Role wajib diisi.",
            "telepon_pelamar.required" => "No. telepon wajib diisi.",
        ]);

        DB::beginTransaction();
        $v['password'] = Hash::make($request->password);
        $user = User::create($v);

        $v2 = $request->validate([
            "telepon_perusahaan" => "required",
            "nama_perusahaan"    => "nullable"
        ]);

        $v2['nama_perusahaan']  = $request->username;

        $user->perusahaan()->create($v2);
        DB::commit();
        return back()->with('success', 'Akun Berhasil Dibuat');
    }

    public function verifikasi()
    {
        return view('Auth.verifikasi');
    }

    // Kirim OTP
    public function sendOtp(Request $request)
    {
        $request->validate([
            "email"   =>    "required|email"
        ]);

        $cek = User::where('email', $request->input('email'))->first();

        if (!$cek) {
            return back()->with('error', 'Akun Tidak Tersedia!');
        }

        $otp =  rand(100000, 999999);

        DB::table('password_reset_tokens')->updateOrInsert(
            ['email'  =>    $request->email],
            [
                'token'  =>   $otp,
                'created_at'  =>  now()
            ]
        );

        Mail::raw("Kode OTP Anda Adalah: $otp", function ($message) use ($request) {
            $message->to($request->input('email'))->subject('Kode OTP Reset Password');
        });

        session()->put('email_otp', $request->email);

        return redirect('/verifikasi/otp');
    }


    public function verifikasi_otp()
    {

        if (!session('email_otp')) {
            return redirect('/verifikasi')->with('error', 'isi email terlebih dahulu!');
        }

        $data = DB::table('password_reset_tokens')
            ->latest('created_at')
            ->first();

        return view('Auth.verifikasi-otp', [
            'email_otp' => $data->email
        ]);
    }

    // Update Password
    public function update_password(Request $request)
    {
        $request->validate([
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[A-Z]/',
                'regex:/[a-z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/',
                'confirmed',
            ],
        ], [
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.regex' => 'Password harus mengandung huruf besar, huruf kecil, angka, dan simbol.',
            'password.confirmed' => 'Konfirmasi password tidak sama.',
        ]);

        $email = session('reset_email');
        if (!$email) {
            return redirect('/forgot')->with('error', 'Sesi reset password tidak valid.');
        }

        $user = User::where('email', $email)->first();
        if (!$user) {
            return redirect('/forgot')->with('error', 'Akun tidak ditemukan.');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        session()->forget(['reset_email', 'email_otp']);

        return redirect('/login')->with('success', 'Password berhasil diganti, silakan login.');
    }


    // Verifikasi OTP
    public function verifikasi_kodeotp(Request $request)
    {
        $otp_input = implode('', $request->otp);

        $email = session('email_otp');
        if (!$email) {
            return redirect('/verifikasi')->with('error', 'Sesi OTP tidak ditemukan, silakan coba lagi.');
        }

        $data = DB::table('password_reset_tokens')
            ->where('email', $email)
            ->latest('created_at')
            ->first();

        if (!$data) {
            return back()->with('error', 'Kode OTP tidak ditemukan.');
        }

        if ($data->token != $otp_input) {
            return back()->with('error', 'Kode OTP salah.');
        }

        if (now()->diffInMinutes($data->created_at) > 10) {
            return back()->with('error', 'Kode OTP sudah kadaluarsa.');
        }

        session()->put('reset_email', $email);

        return redirect('/change/password')->with('success', 'OTP valid, silakan ganti password.');
    }


    // Ubah password
    public function change_password()
    {

        if (!session('email_otp')) {
            return redirect('/verifikasi')->with('error', 'Harus verifikasi OTP dulu!');
        }

        return view('Auth.change-password');
    }

    // Logout
    public function logout(Request $request)
    {
        $request->session()->regenerateToken();
        $request->session()->invalidate();

        return redirect('/');
    }
}
