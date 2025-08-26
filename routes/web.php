<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KandidatController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdminController;
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

// Route Landing Page
Route::get('/', [HomeController::class, 'index']);
Route::get('/detail/job', [HomeController::class, 'viewjob']);

Route::get('/talenthunter', [TalentHunterController::class, 'index']);

Route::get('/tipskerja', [TipskerjaController::class, 'index']);
Route::get('/tipskerja/details', [TipskerjaController::class, 'details']);

Route::get('/daftarkandidat', [KandidatController::class, 'index']);

// End Route Landing Page


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


// Kandidat
Route::get('/kandidat/kosong', [KandidatController::class, 'kandidat_kosong']);
Route::get('/kandidat/lengkap', [KandidatController::class, 'kandidat_lengkap']);
Route::get('/kandidat/rekrut', [KandidatController::class, 'rekrut']);
Route::get('/kandidat/rekrut/detail', [KandidatController::class, 'rekrut_detail']);
Route::get('/kandidat/status', [KandidatController::class, 'status']);


//Auth super Admin
Route::get('/login/super/admin', [AuthController::class, 'login_super_admin']);
Route::get('/register/super/admin', [AuthController::class, 'register_super_admin']);
Route::get('/verifikasi/super/admin', [AuthController::class, 'verifikasi_super_admin']);
Route::get('/verifikasi/super/admin/otp', [AuthController::class, 'verifikasi_super_admin_otp']);
Route::get('/change/password/super/admin', [AuthController::class, 'change_password_super_admin']);

// Dashboard Finance
Route::get('/dashboard/finance',[FinanceController::class, 'index']);
Route::get('/dashboard/finance/paketharga',[FinanceController::class, 'paket_harga']);
Route::get('/dashboard/finance/omset',[FinanceController::class, 'omset']);
Route::get('/dashboard/finance/catatantransaksi',[FinanceController::class, 'catatan_transaksi']);
Route::get('/dashboard/finance/catatantransaksi/tunai',[FinanceController::class, 'catatan_transaksi_tunai_detail']);
Route::get('/dashboard/finance/catatantransaksi/koin',[FinanceController::class, 'catatan_transaksi_koin_detail']);
Route::get('/dashboard/finance/laporan',[FinanceController::class, 'catatan_laporan_transaksi']);
Route::get('/dashboard/finance/laporan/penghasilan',[FinanceController::class, 'catatan_laporan_transaksi_penghasilan']);


// Dashboard SuperAdmin
Route::get('/dashboard/superadmin',[SuperAdminController::class, 'index']);

// Profile & Edit Profile Super Admin
Route::get('/dashboard/superadmin/profile',[SuperAdminController::class, 'profile']);
Route::get('/dashboard/superadmin/profile/edit',[SuperAdminController::class, 'profile_edit']);


// Pelamar SuperAdmin
Route::get('/dashboard/superadmin/pelamar',[SuperAdminController::class, 'pelamar']);

//View, Add Dan Edit Kandidat - SuperAdmin
Route::get('/dashboard/superadmin/kandidat_view',[SuperAdminController::class, 'kandidat_view']);
Route::get('/dashboard/superadmin/pelamar/add/kandidat',[SuperAdminController::class, 'add_kandidat']);
Route::get('/dashboard/superadmin/pelamar/edit/kandidat',[SuperAdminController::class, 'edit_kandidat']);

//View, Add Dan Edit Non Kandidat - SuperAdmin
Route::get('/dashboard/superadmin/nonkandidat_view',[SuperAdminController::class, 'non_kandidat_view']);
Route::get('/dashboard/superadmin/pelamar/add/non_kandidat',[SuperAdminController::class, 'add_non_kandidat']);
Route::get('/dashboard/superadmin/pelamar/edit/non_kandidat',[SuperAdminController::class, 'edit_non_kandidat']);

// View, Add Calon Kandidat  -SuperAdmin
Route::get('/dashboard/superadmin/pelamar/add/calon_kandidat',[SuperAdminController::class, 'add_calon_kandidat']);
Route::get('/dashboard/superadmin/pelamar/view/calon_kandidat',[SuperAdminController::class, 'view_calon_kandidat']);

// Data Perusahaan -SuperAdmin
Route::get('/dashboard/superadmin/perusahaan',[SuperAdminController::class, 'perusahaan']);
Route::get('/dashboard/superadmin/perusahaan/add/perusahaan',[SuperAdminController::class, 'perusahaan_add']);
Route::get('/dashboard/superadmin/perusahaan/detail',[SuperAdminController::class, 'perusahaan_detail']);
Route::get('/dashboard/superadmin/perusahaan/lowongan/detail',[SuperAdminController::class, 'lowongan_detail']);
Route::get('/dashboard/superadmin/perusahaan/lowongan/add',[SuperAdminController::class, 'lowongan_add']);
Route::get('/dashboard/superadmin/perusahaan/lowongan/edit',[SuperAdminController::class, 'lowongan_edit']);
 


// Dashboard Admin
Route::get('/dashboard/admin',[AdminController::class, 'index']);

Route::get('/dashboard/admin/profile',[AdminController::class, 'profile']);
Route::get('/dashboard/admin/profile/edit',[AdminController::class, 'profile_edit']);

Route::get('/dashboard/admin/pelamar',[AdminController::class, 'pelamar']);
Route::get('/dashboard/admin/kandidat/view',[AdminController::class, 'kandidat_view_cv']);
Route::get('/dashboard/admin/nonkandidat/view',[AdminController::class, 'non_kandidat_view_cv']);
Route::get('/dashboard/admin/calonkandidat/view',[AdminController::class, 'calon_kandidat_view']);

Route::get('/dashboard/admin/perusahaan',[AdminController::class, 'perusahaan']);
Route::get('/dashboard/admin/perusahaan/view',[AdminController::class, 'perusahaan_view']);
Route::get('/dashboard/admin/perusahaan/view/lowongan',[AdminController::class, 'perusahaan_view_lowongan']);
Route::get('/dashboard/admin/perusahaan/view/cv',[AdminController::class, 'perusahaan_view_cv']);
Route::get('/dashboard/admin/perusahaan/view/talenthunter',[AdminController::class, 'perusahaan_view_talenthunter']);

Route::get('/dashboard/admin/finance',[AdminController::class, 'finance']);

Route::get('/dashboard/admin/tipskerja',[AdminController::class, 'tips_kerja']);
Route::get('/dashboard/admin/tipskerja/addpost',[AdminController::class, 'tips_kerja_add_post']);


Route::get('/dashboard/admin/event',[AdminController::class, 'event']);
Route::get('/dashboard/admin/event/detail',[AdminController::class, 'event_detail']);
Route::get('/dashboard/admin/event/add',[AdminController::class, 'event_add']);
Route::get('/dashboard/admin/event/edit',[AdminController::class, 'event_edit']);


//Perusahaan
Route::get('/dashboard/perusahaan', [PerusahaanController::class, 'index']);
Route::get('/dashboard/perusahaan/profile', [PerusahaanController::class, 'profile']);
Route::get('/dashboard/perusahaan/edit/profile', [PerusahaanController::class, 'edit_profile']);
Route::get('/dashboard/perusahaan/tambah/alamat', [PerusahaanController::class, 'tambah_alamat']);
Route::get('/dashboard/perusahaan/isi/alamat', [PerusahaanController::class, 'isi_alamat']);
Route::get('/dashboard/perusahaan/alamat/jadi', [PerusahaanController::class, 'alamat_jadi']);


Route::get('/dashboard/perusahaan/lowongan', [PerusahaanController::class, 'lowongan']);
Route::get('/dashboard/perusahaan/isi/lowongan', [PerusahaanController::class, 'isi_lowongan']);

