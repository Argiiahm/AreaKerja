<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KandidatController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TalentHunterController;
use App\Http\Controllers\TipskerjaController;
use App\Http\Middleware\Authenticate;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/detail/job', [HomeController::class, 'viewjob']);

Route::get('/talenthunter', [TalentHunterController::class, 'index']);

Route::get('/tipskerja', [TipskerjaController::class, 'index']);
Route::get('/tipskerja/details', [TipskerjaController::class, 'details']);

Route::get('/daftarkandidat', [KandidatController::class, 'index']);


// Pasang Lowongan
Route::get('/pasanglowongan', [LowonganController::class, 'index']);
Route::get('/lowongan/tersimpan', [LowonganController::class, 'lowongan_tersimpan']);
Route::get('/lowongan/tersimpan/detail', [LowonganController::class, 'lowongan_tersimpan_detail']);
// End Pasang Lowongan


// Profile
Route::get('/profile', [ProfileController::class, 'profile']);
Route::get('/alamat', [ProfileController::class, 'alamat']);
Route::get('/data/alamat', [ProfileController::class, 'form_data_alamat']);
// End Profile

// FAQ
Route::get('/bantuan', [FaqController::class, 'index']);
// END FAQ

// Authorization
Route::get('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);
Route::get('/verifikasi', [AuthController::class, 'verifikasi']);
Route::get('/verifikasi/otp', [AuthController::class, 'verifikasi_otp']);
Route::get('/change/password', [AuthController::class, 'change_password']);

//Auth Finance
Route::get('/login/finance', [AuthController::class, 'login_finance']);
Route::get('/register/finance', [AuthController::class, 'register_finance']);
Route::get('/verifikasi/finance', [AuthController::class, 'verifikasi_finance']);
Route::get('/verifikasi/finance/otp', [AuthController::class, 'verifikasi_finance_otp']);
Route::get('/change/password/finance', [AuthController::class, 'change_password_finance']);

//Auth Admin
Route::get('/login/admin', [AuthController::class, 'login_admin']);
Route::get('/register/admin', [AuthController::class, 'register_admin']);
Route::get('/verifikasi/admin', [AuthController::class, 'verifikasi_admin']);
Route::get('/verifikasi/admin/otp', [AuthController::class, 'verifikasi_admin_otp']);
Route::get('/change/password/admin', [AuthController::class, 'change_password_admin']);

//Auth super Admin
Route::get('/login/super/admin', [AuthController::class, 'login_super_admin']);
Route::get('/register/super/admin', [AuthController::class, 'register_super_admin']);
Route::get('/verifikasi/super/admin', [AuthController::class, 'verifikasi_super_admin']);
Route::get('/verifikasi/super/admin/otp', [AuthController::class, 'verifikasi_super_admin_otp']);
Route::get('/change/password/super/admin', [AuthController::class, 'change_password_super_admin']);

// Dashboard Finance
Route::get('/dashboard/finance',[FinanceController::class, 'index']);
