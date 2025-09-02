<?php

namespace App\Http\Controllers;

use App\Models\Pelamar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            "username"   =>    "required",
            "password"   =>    "required"
        ]);
        if (Auth::attempt($v)) {
            if (Auth::user()->role == 'superadmin') {
                return redirect('/dashboard/superadmin');
            } elseif (Auth::user()->role == 'admin') {
                return redirect('/dashboard/admin');
            } elseif (Auth::user()->role == 'pelamar') {
                return redirect('/');
            } elseif (Auth::user()->role == 'perusahaan') {
                return redirect('/dashboard/perusahaan');
            } elseif (Auth::user()->role == 'finance') {
                return redirect('/dashboard/finance');
            }
        } else {
            return back();
        }
        return back();
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

        return redirect('/login');
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
        return redirect('/login');
    }






    public function verifikasi()
    {
        return view('Auth.verifikasi');
    }

    public function verifikasi_otp()
    {
        return view('Auth.verifikasi-otp');
    }

    public function change_password()
    {
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

    public function register_admin()
    {
        return view('Auth.Register-admin');
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
