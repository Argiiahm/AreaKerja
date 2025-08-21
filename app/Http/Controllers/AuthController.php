<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //Auth Pelamar & Perusahaan
    public function login()
    {
        return view('Auth.login');
    }

    public function register()
    {
        return view('Auth.Register');
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

    public function register_finance()
    {
        return view('Auth.Register-finance');
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

    public function register_super_admin()
    {
        return view('Auth.Register-super-admin');
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
