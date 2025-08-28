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
Route::post('/login/super/admin/masuk', [AuthController::class, 'masuk_super_admin']);
Route::delete('/logout/super/admin', [AuthController::class, 'logout_super_admin']);


Route::get('/register/super/admin', [AuthController::class, 'register_super_admin']);
Route::get('/verifikasi/super/admin', [AuthController::class, 'verifikasi_super_admin']);
Route::get('/verifikasi/super/admin/otp', [AuthController::class, 'verifikasi_super_admin_otp']);
Route::get('/change/password/super/admin', [AuthController::class, 'change_password_super_admin']);

// Dashboard Finance
Route::get('/dashboard/finance', [FinanceController::class, 'index']);
Route::get('/dashboard/finance/paketharga', [FinanceController::class, 'paket_harga']);
Route::get('/dashboard/finance/omset', [FinanceController::class, 'omset']);
Route::get('/dashboard/finance/catatantransaksi', [FinanceController::class, 'catatan_transaksi']);
Route::get('/dashboard/finance/catatantransaksi/tunai', [FinanceController::class, 'catatan_transaksi_tunai_detail']);
Route::get('/dashboard/finance/catatantransaksi/koin', [FinanceController::class, 'catatan_transaksi_koin_detail']);
Route::get('/dashboard/finance/laporan', [FinanceController::class, 'catatan_laporan_transaksi']);
Route::get('/dashboard/finance/laporan/penghasilan', [FinanceController::class, 'catatan_laporan_transaksi_penghasilan']);


// Dashboard SuperAdmin
Route::get('/dashboard/superadmin', [SuperAdminController::class, 'index'])->middleware('superadmin');

// Profile & Edit Profile Super Admin
Route::get('/dashboard/superadmin/profile', [SuperAdminController::class, 'profile'])->middleware('superadmin');
Route::get('/dashboard/superadmin/profile/edit', [SuperAdminController::class, 'profile_edit'])->middleware('superadmin');
Route::put('/dashboard/superadmin/profile/update', [SuperAdminController::class, 'profile_update'])->middleware('superadmin');

// Pelamar SuperAdmin
Route::get('/dashboard/superadmin/pelamar', [SuperAdminController::class, 'pelamar'])->middleware('superadmin');

//View, Add Dan Edit Kandidat - SuperAdmin
Route::get('/dashboard/superadmin/kandidat_view', [SuperAdminController::class, 'kandidat_view'])->middleware('superadmin');
Route::get('/dashboard/superadmin/pelamar/add/kandidat', [SuperAdminController::class, 'add_kandidat'])->middleware('superadmin');
Route::get('/dashboard/superadmin/pelamar/edit/kandidat', [SuperAdminController::class, 'edit_kandidat'])->middleware('superadmin');

//View, Add Dan Edit Non Kandidat - SuperAdmin
Route::get('/dashboard/superadmin/nonkandidat_view', [SuperAdminController::class, 'non_kandidat_view'])->middleware('superadmin');
Route::get('/dashboard/superadmin/pelamar/add/non_kandidat', [SuperAdminController::class, 'add_non_kandidat'])->middleware('superadmin');
Route::get('/dashboard/superadmin/pelamar/edit/non_kandidat', [SuperAdminController::class, 'edit_non_kandidat'])->middleware('superadmin');

// View, Add Calon Kandidat  -SuperAdmin
Route::get('/dashboard/superadmin/pelamar/add/calon_kandidat', [SuperAdminController::class, 'add_calon_kandidat'])->middleware('superadmin');
Route::get('/dashboard/superadmin/pelamar/view/calon_kandidat', [SuperAdminController::class, 'view_calon_kandidat'])->middleware('superadmin');

// Data Perusahaan -SuperAdmin
Route::get('/dashboard/superadmin/perusahaan', [SuperAdminController::class, 'perusahaan'])->middleware('superadmin');
Route::get('/dashboard/superadmin/perusahaan/add/perusahaan', [SuperAdminController::class, 'perusahaan_add'])->middleware('superadmin');
Route::get('/dashboard/superadmin/perusahaan/detail', [SuperAdminController::class, 'perusahaan_detail'])->middleware('superadmin');
Route::get('/dashboard/superadmin/perusahaan/lowongan/detail', [SuperAdminController::class, 'lowongan_detail'])->middleware('superadmin');
Route::get('/dashboard/superadmin/perusahaan/lowongan/add', [SuperAdminController::class, 'lowongan_add'])->middleware('superadmin');
Route::get('/dashboard/superadmin/perusahaan/lowongan/edit', [SuperAdminController::class, 'lowongan_edit'])->middleware('superadmin');

// Data Recrutiment -Super Admin
Route::get('/dashboard/superadmin/recrutiment', [SuperAdminController::class, 'recrutiment_detail'])->middleware('superadmin');
Route::get('/dashboard/superadmin/recrutiment/edit', [SuperAdminController::class, 'recrutiment_edit'])->middleware('superadmin');

//Data Talent Hunter -SuperAdmin
Route::get('/dashboard/superadmin/talenthunter', [SuperAdminController::class, 'talent_hunter_detail'])->middleware('superadmin');
Route::get('/dashboard/superadmin/perusahaan/add/talent_hunter', [SuperAdminController::class, 'talent_hunter_add'])->middleware('superadmin');
Route::get('/dashboard/superadmin/talenthunter/edit', [SuperAdminController::class, 'talent_hunter_edit'])->middleware('superadmin');

// FInance - Super Admin
Route::get('/dashboard/superadmin/finance', [SuperAdminController::class, 'finance'])->middleware('superadmin');
Route::get('/dashboard/superadmin/finance/edit/paketkoin', [SuperAdminController::class, 'finance_edit_paket_koin'])->middleware('superadmin');
Route::get('/dashboard/superadmin/finance/edit/paketpembayaran', [SuperAdminController::class, 'finance_edit_paket_pembayaran'])->middleware('superadmin');
Route::get('/dashboard/superadmin/finance/edit/laporan', [SuperAdminController::class, 'finance_laporan'])->middleware('superadmin');

// Freeze Akun - Super Admin
Route::get('/dashboard/superadmin/freeze', [SuperAdminController::class, 'freeze'])->middleware('superadmin');
Route::get('/dashboard/superadmin/freeze/detail', [SuperAdminController::class, 'freeze_detail'])->middleware('superadmin');

// Tips Kerja - Super Admin
Route::get('/dashboard/superadmin/tipskerja', [SuperAdminController::class, 'tipskerja'])->middleware('superadmin');
Route::get('/dashboard/superadmin/tipskerja/add', [SuperAdminController::class, 'tipskerja_add'])->middleware('superadmin');


// Event -Super Admin
Route::get('/dashboard/superadmin/event', [SuperAdminController::class, 'event'])->middleware('superadmin');
Route::get('/dashboard/superadmin/event/detail', [SuperAdminController::class, 'event_detail'])->middleware('superadmin');
Route::get('/dashboard/superadmin/event/add', [SuperAdminController::class, 'event_add'])->middleware('superadmin');
Route::get('/dashboard/superadmin/event/edit', [SuperAdminController::class, 'event_edit'])->middleware('superadmin');

// Akun -Super Admin
Route::get('/dashboard/superadmin/akun', [SuperAdminController::class, 'akun'])->middleware('superadmin');
Route::get('/dashboard/superadmin/akun/view', [SuperAdminController::class, 'akun_view'])->middleware('superadmin');
Route::get('/dashboard/superadmin/akun/add', [SuperAdminController::class, 'akun_add'])->middleware('superadmin');
Route::get('/dashboard/superadmin/akun/edit', [SuperAdminController::class, 'akun_edit'])->middleware('superadmin');


// Link & Header - Super Admin
Route::get('/dashboard/superadmin/pengaturan_page', [SuperAdminController::class, 'pengaturan_page'])->middleware('superadmin');
Route::get('/dashboard/superadmin/pengaturan', [SuperAdminController::class, 'pengaturan'])->middleware('superadmin');


// Dashboard Admin
Route::get('/dashboard/admin', [AdminController::class, 'index']);

Route::get('/dashboard/admin/profile', [AdminController::class, 'profile']);
Route::get('/dashboard/admin/profile/edit', [AdminController::class, 'profile_edit']);

Route::get('/dashboard/admin/pelamar', [AdminController::class, 'pelamar']);
Route::get('/dashboard/admin/kandidat/view', [AdminController::class, 'kandidat_view_cv']);
Route::get('/dashboard/admin/nonkandidat/view', [AdminController::class, 'non_kandidat_view_cv']);
Route::get('/dashboard/admin/calonkandidat/view', [AdminController::class, 'calon_kandidat_view']);

Route::get('/dashboard/admin/perusahaan', [AdminController::class, 'perusahaan']);
Route::get('/dashboard/admin/perusahaan/view', [AdminController::class, 'perusahaan_view']);
Route::get('/dashboard/admin/perusahaan/view/lowongan', [AdminController::class, 'perusahaan_view_lowongan']);
Route::get('/dashboard/admin/perusahaan/view/cv', [AdminController::class, 'perusahaan_view_cv']);
Route::get('/dashboard/admin/perusahaan/view/talenthunter', [AdminController::class, 'perusahaan_view_talenthunter']);

Route::get('/dashboard/admin/finance', [AdminController::class, 'finance']);

Route::get('/dashboard/admin/tipskerja', [AdminController::class, 'tips_kerja']);
Route::get('/dashboard/admin/tipskerja/addpost', [AdminController::class, 'tips_kerja_add_post']);


Route::get('/dashboard/admin/event', [AdminController::class, 'event']);
Route::get('/dashboard/admin/event/detail', [AdminController::class, 'event_detail']);
Route::get('/dashboard/admin/event/add', [AdminController::class, 'event_add']);
Route::get('/dashboard/admin/event/edit', [AdminController::class, 'event_edit']);


//Perusahaan
Route::get('/dashboard/perusahaan', [PerusahaanController::class, 'index']);
Route::get('/dashboard/perusahaan/profile', [PerusahaanController::class, 'profile']);
Route::get('/dashboard/perusahaan/edit/profile', [PerusahaanController::class, 'edit_profile']);
Route::get('/dashboard/perusahaan/tambah/alamat', [PerusahaanController::class, 'tambah_alamat']);
Route::get('/dashboard/perusahaan/isi/alamat', [PerusahaanController::class, 'isi_alamat']);
Route::get('/dashboard/perusahaan/alamat/jadi', [PerusahaanController::class, 'alamat_jadi']);

Route::get('/dashboard/perusahaan/lowongan', [PerusahaanController::class, 'lowongan']);
Route::get('/dashboard/perusahaan/isi/lowongan', [PerusahaanController::class, 'isi_lowongan']);
Route::get('/dashboard/perusahaan/edit/lowongan', [PerusahaanController::class, 'edit_lowongan']);
Route::get('/dashboard/perusahaan/lowongan/detail', [PerusahaanController::class, 'detail_lowongan']);
Route::get('/dashboard/perusahaan/kandidat', [PerusahaanController::class, 'kandidat']);
Route::get('/dashboard/perusahaan/kandidatak', [PerusahaanController::class, 'kandidat_ak']);
Route::get('/dashboard/perusahaan/kandidatak/cv', [PerusahaanController::class, 'cv_kandidat']);
Route::get('/dashboard/perusahaan/pengaturan', [PerusahaanController::class, 'pengaturan']);
Route::get('/dashboard/perusahaan/pengaturan/password', [PerusahaanController::class, 'password']);

Route::get('/dashboard/perusahaan/pelamar', [PerusahaanController::class, 'pelamar']);
Route::get('/dashboard/perusahaan/konfirmasi/terima/lamaran', [PerusahaanController::class, 'konfirmasi_terima_lamaran']);
Route::get('/dashboard/perusahaan/konfirmasi/lamaran/terkirim', [PerusahaanController::class, 'konfirmasi_lamaran_terkirim']);

Route::get('/dashboard/perusahaan/berlangganan', [PerusahaanController::class, 'berlangganan']);
Route::get('/dashboard/perusahaan/berlangganan/kandidat', [PerusahaanController::class, 'berlangganan_kandidat']);
Route::get('/dashboard/perusahaan/berlangganan/kandidat/info', [PerusahaanController::class, 'kandidat_info']);
Route::get('/dashboard/perusahaan/berlangganan/kandidat/info/bermasalah', [PerusahaanController::class, 'kandidat_bermasalah']);
Route::get('/dashboard/perusahaan/berlangganan/kandidat/info/nama', [PerusahaanController::class, 'kandidat_nama']);
Route::get('/dashboard/perusahaan/berlangganan/kandidat/info/laporan', [PerusahaanController::class, 'kandidat_laporan']);
Route::get('/dashboard/perusahaan/berlangganan/kandidat/info/lapor/pekerja', [PerusahaanController::class, 'lapor_pekerja']);

Route::get('/dashboard/perusahaan/event', [PerusahaanController::class, 'halaman_event']);
Route::get('/dashboard/perusahaan/gabung/event', [PerusahaanController::class, 'gabung_event']);
Route::get('/dashboard/perusahaan/detail/event/kosong', [PerusahaanController::class, 'detail_event_kosong']);