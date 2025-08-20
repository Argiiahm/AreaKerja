<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KandidatController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TalentHunterController;
use App\Http\Controllers\TipskerjaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class, 'index']);
Route::get('/detail/job',[HomeController::class, 'viewjob']);

Route::get('/talenthunter',[TalentHunterController::class, 'index']);

Route::get('/tipskerja',[TipskerjaController::class, 'index']);
Route::get('/tipskerja/details',[TipskerjaController::class, 'details']);  

Route::get('/daftarkandidat',[KandidatController::class, 'index']);


Route::get('/pasanglowongan',[LowonganController::class, 'index']);
Route::get('/lowongan/tersimpan',[LowonganController::class, 'lowongan_tersimpan']);

Route::get('/profile', [ProfileController::class, 'profile']);
Route::get('/alamat', [ProfileController::class, 'alamat']);
Route::get('/data/alamat', [ProfileController::class, 'form_data_alamat']);


Route::get('/login', function(){
    return view('Auth.login');
}); 
Route::get('/register', function(){
    return view('Auth.Register');
}); 
Route::get('/verifikasi', function(){
    return view('Auth.verifikasi');
}); 
Route::get('/verifikasi/otp', function(){
    return view('Auth.verifikasi-otp');
}); 
Route::get('/login/finance', function(){
    return view('Auth.login-finance');
}); 
Route::get('/register/finance', function(){
    return view('Auth.Register-finance');
}); 
Route::get('/login/admin', function(){
    return view('Auth.login-admin');
}); 
Route::get('/register/admin', function(){
    return view('Auth.Register-admin');
});
Route::get('/verifikasi/admin', function () {
    return view('Auth.verifikasi-admin');
});

Route::get('/verifikasi/admin/otp', function () {
    return view('Auth.verifikasi-otp-admin');
});
