<?php

namespace App\Http\Controllers;

use App\Models\User;
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
    public function masuk(Request $request)
    {
        $v = $request->validate([
            "username" => "required",
            "password" => "required"
        ]);

        if (Auth::attempt($v)) {
            $user = Auth::user();

            if ($user->status === 0) {
                if ($user->role == 'superadmin') {
                    return redirect('/dashboard/superadmin');
                } elseif ($user->role == 'admin') {
                    return redirect('/dashboard/admin');
                } elseif ($user->role == 'pelamar') {
                    return redirect('/');
                } elseif ($user->role == 'perusahaan') {
                    return redirect('/dashboard/perusahaan');
                } elseif ($user->role == 'finance') {
                    return redirect('/dashboard/finance');
                }
            } else {
                Auth::logout();
                return back()->with('error', 'Akun dibekukan');
            }
        } else {
            return back()->with('error', 'Username atau password salah');
        }
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
            "email"    => "required|email",
            "password" => "required",
            "role"     => "required"
        ]);

        $validasi_data['password'] = Hash::make($request->password);
        $user = User::create($validasi_data);

        $validasi_dataPelamar = $request->validate([
            "telepon_pelamar" => "required",
        ]);

        $user->pelamars()->create($validasi_dataPelamar);

        return back()->with('success', 'Akun Berhasil Dibuat');
    }


    public function logout(Request $request)
    {
        $request->session()->regenerateToken();
        $request->session()->invalidate();

        return redirect('/');
    }


    // Perusahaan Register
    public function buat_perusahaan(Request $request)
    {
        $v = $request->validate([
            "username" => "required",
            "email"    => "required|email",
            "password" => "required",
            "role"     => "required"
        ]);

        $v['password'] = Hash::make($request->password);
        $user = User::create($v);

        $v2 = $request->validate([
            "telepon_perusahaan" => "required",
            "nama_perusahaan"    => "nullable"
        ]);

        $v2['nama_perusahaan']  = $request->username;

        $user->perusahaan()->create($v2);
        return back()->with('success', 'Akun Berhasil Dibuat');
    }

    public function verifikasi()
    {
        return view('Auth.verifikasi');
    }

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



    public function change_password()
    {

        if (!session('email_otp')) {
            return redirect('/verifikasi')->with('error', 'Harus verifikasi OTP dulu!');
        }

        return view('Auth.change-password');
    }



    //Auth finance
    public function login_finance()
    {
        return view('Auth.login-finance');
    }

    public function masuk_finance(Request $request)
    {
        $validasi_data = $request->validate([
            "username"     =>     "required",
            "password"     =>     "required"
        ]);

        Auth::attempt($validasi_data);
        return redirect('/dashboard/finance');
    }

    public function logout_finance(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login/finance');
    }



    public function register_finance()
    {
        return view('Auth.Register-finance');
    }

    public function buat_finance(Request $request)
    {
        $v = $request->validate([
            "username"      =>      "required",
            "email"         =>      "required|email",
            "role"          =>      "required",
            "password"      =>      "required"
        ]);

        $v['password']      =    Hash::make($request->password);
        $u = User::create($v);

        $v2 = $request->validate([
            "nama_lengkap"      =>      "nullable",
        ]);

        $u->finance()->create($v2);

        return redirect('/login/finance');
    }


    public function verifikasi_finance()
    {
        return view('Auth.verifikasi-finance');
    }

    public function verifikasi_finance_otp()
    {
        return view('Auth.verifikasi-finance-otp');
    }

    public function change_password_finance()
    {
        return view('Auth.change-password-finance');
    }



    //Auth Admin
    public function login_admin()
    {
        return view('Auth.login-admin');
    }


    public function masuk_admin(Request $request)
    {
        $v = $request->validate([
            "username"  =>   'required',
            "password"  =>   'required'
        ]);
        Auth::attempt($v);
        return redirect('/dashboard/admin');
    }


    public function register_admin()
    {
        return view('Auth.Register-admin');
    }


    public function buat_admin(Request $request)
    {
        $v = $request->validate([
            "username"  =>   'required',
            "email"    =>    'required|email',
            "role"    =>    'required',
            "password"  =>   'required',
        ]);

        $v['password']   =  Hash::make($request->password);
        $user = User::create($v);

        $v2  = $request->validate([
            "nama_lengkap"  =>      "nullable"
        ]);

        $user->admin()->create($v2);
        return redirect('/login/admin');
    }


    public function verifikasi_admin()
    {
        return view('Auth.verifikasi-admin');
    }

    public function verifikasi_admin_otp()
    {
        return view('Auth.verifikasi-otp-admin');
    }

    public function change_password_admin()
    {
        return view('Auth.change-password-admin');
    }




    //Auth Super Admin
    public function login_super_admin()
    {
        return view('Auth.login-super-admin');
    }

    public function masuk_super_admin(Request $request)
    {
        $validasi_data = $request->validate([
            "username"     =>     "required",
            "password"     =>     "required"
        ]);

        if (Auth::attempt($validasi_data)) {
            if (Auth::user()->role == "superadmin") {
                return redirect('/dashboard/superadmin');
            }
        } else {
            return back();
        }
    }

    public function logout_super_admin(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


    public function register_super_admin()
    {
        return view('Auth.Register-super-admin');
    }

    public function buat_super_admin(Request $request)
    {
        $v = $request->validate([
            "username"      =>      "required",
            "email"         =>      "required|email",
            "role"          =>      "required",
            "password"      =>      "required"
        ]);


        $v['password']      =    Hash::make($request->password);
        $u =  User::create($v);

        $v2 = $request->validate(["nama_lengkap"  =>      "nullable"]);

        $u->superadmins()->create($v2);
        return redirect('/login/super/admin');
    }


    public function verifikasi_super_admin()
    {
        return view('Auth.verifikasi-super-admin');
    }

    public function verifikasi_super_admin_otp()
    {
        return view('Auth.verifikasi-otp-super-admin');
    }

    public function change_password_super_admin()
    {
        return view('Auth.change-password-super-admin');
    }
}
