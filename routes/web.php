<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KandidatController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdminController;
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


// Authorization
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/masuk', [AuthController::class, 'masuk'])->middleware('guest');
Route::delete('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('/register', [AuthController::class, 'register']);
Route::post('/buat', [AuthController::class, 'buat']);
Route::post('/buat/perusahaan', [AuthController::class, 'buat_perusahaan']);
Route::get('/verifikasi', [AuthController::class, 'verifikasi']);
Route::get('/verifikasi/otp', [AuthController::class, 'verifikasi_otp']);
Route::get('/change/password', [AuthController::class, 'change_password']);

Route::post('/verifikasi/kode', [AuthController::class, 'sendOtp']);
Route::post('/verifikasi/kodeotp', [AuthController::class, 'verifikasi_kodeotp']);
Route::put('/update/password', [AuthController::class, 'update_password']);


Route::middleware(['status'])->group(function () {
    // Route Landing Page
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/detail/job/{job:slug}', [HomeController::class, 'viewjob']);
    Route::get('/talenthunter', [TalentHunterController::class, 'index']);
    Route::get('/tipskerja', [TipskerjaController::class, 'index']);
    Route::get('/tipskerja/details/{tipskerja:id}', [TipskerjaController::class, 'details']);
    Route::get('/daftarkandidat', [KandidatController::class, 'index'])->middleware('auth');
    // Transaksi Daftar Kandidat
    Route::post('/daftarkandidat/transaksi', [KandidatController::class, 'transaksi'])->middleware('auth');
    Route::get('/detail/pembayaran/kandidat/{p:id}', [KandidatController::class, 'transaksi_detail'])->middleware('auth');
    Route::put('/transaksi/kandidat/update/{p:id}', [KandidatController::class, 'transaksi_update'])->middleware('auth');
    Route::put('/diterima/kandidat/{p:id}', [KandidatController::class, 'diterima_kandidat'])->middleware('auth');
    Route::put('/ditolak/kandidat/{p:id}', [KandidatController::class, 'ditolak_kandidat'])->middleware('auth');
    // End Route Landing Page
    
    // CV
    Route::get('/cv/{pelamar:id}/unduh', [SuperAdminController::class, 'unduhCv'])->name('cv.unduh');
    Route::get('/cv/{pelamar:id}/preview', [SuperAdminController::class, 'cvPreview'])->name('cv.preview');

    // Pasang Lowongan
    Route::get('/pasanglowongan', [LowonganController::class, 'index']);
    Route::get('/lowongan/tersimpan', [LowonganController::class, 'lowongan_tersimpan']);
    Route::post('/simpanlowongan/{lowongan:slug}', [LowonganController::class, 'simpan_lowongan']);
    Route::get('/lowongan/tersimpan/detail/{lowongan:slug}', [LowonganController::class, 'lowongan_tersimpan_detail']);
    // End Pasang Lowongan

    // Profile
    Route::get('/profile', [ProfileController::class, 'profile'])->middleware('auth');
    Route::put('/hapus/profile/{pelamar:id}', [ProfileController::class, 'hapus_profile'])->middleware('auth');
    Route::put('/lengkapi/profile/{pelamar:id}', [ProfileController::class, 'tambah_profile'])->middleware('auth');

    Route::get('/alamat', [ProfileController::class, 'alamat'])->middleware('auth');
    Route::get('/data/alamat', [ProfileController::class, 'form_data_alamat'])->middleware('auth');
    Route::post('/alamat/pelamar/create', [ProfileController::class, 'create_data_alamat'])->middleware('auth');
    Route::get('/alamat/pelamar/edit/{alamatpelamar:id}', [ProfileController::class, 'edit_data_alamat'])->middleware('auth');
    Route::put('/alamat/pelamar/update/{alamatpelamar:id}', [ProfileController::class, 'update_data_alamat'])->middleware('auth');

    Route::post('/tambah/pendidikan', [ProfileController::class, 'add_pendidikan'])->middleware('auth');
    Route::get('/edit/pendidikan/{pendidikan:id}', [ProfileController::class, 'edit_pendidikan'])->middleware('auth');
    Route::put('/update/pendidikan/{pendidikan:id}', [ProfileController::class, 'update_pendidikan'])->middleware('auth');

    Route::post('/tambah/organisasi', [ProfileController::class, 'add_organisasi'])->middleware('auth');
    Route::get('/edit/organisasi/{organisasi:id}', [ProfileController::class, 'edit_organisasi'])->middleware('auth');
    Route::put('/update/organisasi/{organisasi:id}', [ProfileController::class, 'update_organisasi'])->middleware('auth');

    Route::post('/tambah/pengalaman/kerja', [ProfileController::class, 'tambah_pengalaman'])->middleware('auth');
    Route::get('/edit/pengalaman/kerja/{pengalamankerja:id}', [ProfileController::class, 'edit_pengalaman'])->middleware('auth');
    Route::put('/update/pengalaman/kerja/{pengalamankerja:id}', [ProfileController::class, 'update_pengalaman'])->middleware('auth');

    Route::post('/tambah/skill', [ProfileController::class, 'tambah_skill'])->middleware('auth');
    Route::get('/edit/skill/{skill:id}', [ProfileController::class, 'edit_skill'])->middleware('auth');
    Route::put('/update/skill/{skill:id}', [ProfileController::class, 'update_skill'])->middleware('auth');
    // End Profile

    // FAQ
    Route::get('/bantuan', [FaqController::class, 'index']);
    // END FAQ

    // Kandidat
    Route::get('/kandidat/kosong', [KandidatController::class, 'kandidat_kosong'])->middleware('kandidat');
    Route::get('/kandidat/lengkap', [KandidatController::class, 'kandidat_lengkap'])->middleware('kandidat');
    Route::get('/kandidat/rekrut', [KandidatController::class, 'rekrut'])->middleware('kandidat');
    Route::get('/kandidat/rekrut/detail/{pembeli:id}', [KandidatController::class, 'rekrut_detail'])->middleware('kandidat');
    Route::get('/kandidat/status', [KandidatController::class, 'status']);

    // Dashboard Finance
    Route::get('/dashboard/finance', [FinanceController::class, 'index'])->middleware('finance');
    Route::get('/dashboard/finance/paketharga', [FinanceController::class, 'paket_harga'])->middleware('finance');
    Route::get('/dashboard/finance/paketharga/edit/koin', [FinanceController::class, 'edit_koin'])->middleware('finance');
    Route::get('/dashboard/finance/paketharga/edit/harga', [FinanceController::class, 'edit_harga'])->middleware('finance');
    Route::put('/update/harga/koin', [FinanceController::class, 'update_koin'])->middleware('finance');
    Route::put('/update/harga/harga', [FinanceController::class, 'update_harga'])->middleware('finance');

    Route::get('/dashboard/finance/omset', [FinanceController::class, 'omset'])->middleware('finance')->middleware('finance');
    Route::get('/dashboard/finance/catatantransaksi', [FinanceController::class, 'catatan_transaksi'])->middleware('finance');
    Route::get('/dashboard/finance/catatantransaksi/tunai', [FinanceController::class, 'catatan_transaksi_tunai_detail'])->middleware('finance');
    Route::get('/dashboard/finance/catatantransaksi/koin', [FinanceController::class, 'catatan_transaksi_koin_detail'])->middleware('finance');
    Route::get('/dashboard/finance/laporan', [FinanceController::class, 'catatan_laporan_transaksi'])->middleware('finance');
    Route::get('/dashboard/finance/laporan/penghasilan', [FinanceController::class, 'catatan_laporan_transaksi_penghasilan'])->middleware('finance');

    // Dashboard SuperAdmin
    Route::get('/dashboard/superadmin', [SuperAdminController::class, 'index'])->middleware('superadmin')->name('superadmin');

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
    Route::get('/dashboard/superadmin/nonkandidat_view/{pelamar:id}', [SuperAdminController::class, 'non_kandidat_view'])->middleware('superadmin');
    Route::get('/dashboard/superadmin/pelamar/add/non_kandidat', [SuperAdminController::class, 'add_non_kandidat'])->middleware('superadmin');
    Route::get('/dashboard/superadmin/pelamar/edit/non_kandidat', [SuperAdminController::class, 'edit_non_kandidat'])->middleware('superadmin');

    // View, Add Calon Kandidat  -SuperAdmin
    Route::get('/dashboard/superadmin/pelamar/add/calon_kandidat', [SuperAdminController::class, 'add_calon_kandidat'])->middleware('superadmin');
    Route::get('/dashboard/superadmin/pelamar/view/calon_kandidat', [SuperAdminController::class, 'view_calon_kandidat'])->middleware('superadmin');

    // Data Perusahaan -SuperAdmin
    Route::get('/dashboard/superadmin/perusahaan', [SuperAdminController::class, 'perusahaan'])->middleware('superadmin');
    Route::get('/dashboard/superadmin/perusahaan/add/perusahaan', [SuperAdminController::class, 'perusahaan_add'])->middleware('superadmin');
    Route::get('/dashboard/superadmin/perusahaan/detail', [SuperAdminController::class, 'perusahaan_detail'])->middleware('superadmin');
    Route::get('/dashboard/superadmin/perusahaan/detail', [SuperAdminController::class, 'lowongan_detail'])->middleware('superadmin');
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
    Route::get('/dashboard/superadmin/freeze/detail/{user:id}', [SuperAdminController::class, 'freeze_detail'])->middleware('superadmin');

    Route::put('/dashboard/superadmin/unbanned/{user:id}', [SuperAdminController::class, 'unbanned'])->middleware('superadmin');
    Route::put('/dashboard/superadmin/banned/{user:id}', [SuperAdminController::class, 'banned'])->middleware('superadmin');
    Route::delete('/dashboard/superadmin/hapus/{user:id}', [SuperAdminController::class, 'delete_akun'])->middleware('superadmin');

    // Tips Kerja - Super Admin
    Route::get('/dashboard/superadmin/tipskerja', [SuperAdminController::class, 'tipskerja'])->middleware('superadmin');
    Route::get('/dashboard/superadmin/tipskerja/add', [SuperAdminController::class, 'tipskerja_add'])->middleware('superadmin');
    Route::post('/dashboard/superadmin/tipskerja/create/post', [SuperAdminController::class, 'tipskerja_create'])->middleware('superadmin');
    Route::put('/ubah/status/tipskerja', [SuperAdminController::class, 'ubah_status'])->middleware('superadmin');
    Route::delete('/delete/tipskerja', [SuperAdminController::class, 'delete'])->middleware('superadmin');

    // Event -Super Admin
    Route::get('/dashboard/superadmin/event', [SuperAdminController::class, 'event'])->middleware('superadmin');
    Route::get('/dashboard/superadmin/event/detail/{event:id}', [SuperAdminController::class, 'event_detail'])->middleware('superadmin');
    Route::get('/dashboard/superadmin/event/add', [SuperAdminController::class, 'event_add'])->middleware('superadmin');
    Route::post('/dashboard/superadmin/event/store', [SuperAdminController::class, 'event_store'])->middleware('superadmin');
    Route::get('/dashboard/superadmin/event/edit/{event:id}', [SuperAdminController::class, 'event_edit'])->middleware('superadmin');
    Route::put('/dashboard/superadmin/event/update/{event:id}', [SuperAdminController::class, 'event_update'])->middleware('superadmin');
    Route::delete('/dashboard/superadmin/event/hapus/{event:id}', [SuperAdminController::class, 'event_delete'])->middleware('superadmin');

    // Akun -Super Admin
    Route::get('/dashboard/superadmin/akun', [SuperAdminController::class, 'akun'])->middleware('superadmin');
    Route::get('/dashboard/superadmin/{user:id}/view', [SuperAdminController::class, 'akun_view'])->middleware('superadmin');
    Route::get('/dashboard/superadmin/akun/add', [SuperAdminController::class, 'akun_add'])->middleware('superadmin');
    Route::get('/dashboard/superadmin/{user:id}/edit', [SuperAdminController::class, 'akun_edit'])->middleware('superadmin');

    // Link & Header - Super Admin
    Route::get('/dashboard/superadmin/pengaturan_page', [SuperAdminController::class, 'pengaturan_page'])->middleware('superadmin');
    Route::get('/dashboard/superadmin/pengaturan', [SuperAdminController::class, 'pengaturan'])->middleware('superadmin');

    // Dashboard Admin
    Route::get('/dashboard/admin', [AdminController::class, 'index'])->middleware('admin');

    Route::get('/dashboard/admin/profile', [AdminController::class, 'profile'])->middleware('admin');
    Route::get('/dashboard/admin/profile/edit/{admin:id}', [AdminController::class, 'profile_edit'])->middleware('admin');
    Route::put('/dashboard/admin/profile/update/{admin:id}', [AdminController::class, 'profile_update'])->middleware('admin');

    Route::get('/dashboard/admin/pelamar', [AdminController::class, 'pelamar'])->middleware('admin');
    Route::get('/dashboard/admin/kandidat/view/{pelamar:id}', [AdminController::class, 'kandidat_view_cv'])->middleware('admin');
    Route::get('/dashboard/admin/nonkandidat/view/{pelamar:id}', [AdminController::class, 'non_kandidat_view_cv'])->middleware('admin');
    Route::get('/dashboard/admin/calonkandidat/view/{pelamar:id}', [AdminController::class, 'calon_kandidat_view'])->middleware('admin');
    Route::put('dashboard/admin/status/calonkandidat/{pelamar:id}', [AdminController::class, 'calon_kandidat_status'])->middleware('admin');

    Route::get('/dashboard/admin/perusahaan', [AdminController::class, 'perusahaan'])->middleware('admin');
    Route::get('/dashboard/admin/perusahaan/view/{perusahaan:id}', [AdminController::class, 'perusahaan_view'])->middleware('admin');
    Route::put('/dashboard/admin/unbanned/{user:id}', [AdminController::class, 'unfreeze_perusahaan'])->middleware('admin');
    Route::put('/dashboard/admin/banned/{user:id}', [AdminController::class, 'freeze_perusahaan'])->middleware('admin');
    Route::get('/dashboard/admin/perusahaan/view/lowongan', [AdminController::class, 'perusahaan_view_lowongan'])->middleware('admin');
    Route::get('/dashboard/admin/perusahaan/view/cv', [AdminController::class, 'perusahaan_view_cv'])->middleware('admin');
    Route::get('/dashboard/admin/perusahaan/view/talenthunter', [AdminController::class, 'perusahaan_view_talenthunter'])->middleware('admin');

    Route::get('/dashboard/admin/finance', [AdminController::class, 'finance'])->middleware('admin');
    Route::get('/dashboard/admin/cari/finance/admin', [AdminController::class, 'finance_cari'])->middleware('admin');

    Route::get('/dashboard/admin/tipskerja', [AdminController::class, 'tips_kerja'])->middleware('admin');
    Route::get('/dashboard/admin/tipskerja/addpost', [AdminController::class, 'tips_kerja_add_post'])->middleware('admin');
    Route::put('/ubah/status', [AdminController::class, 'ubah_status'])->middleware('admin');
    Route::delete('/delete', [AdminController::class, 'hapus'])->middleware('admin');
    Route::post('/dashboard/admin/tipskerja/create/post', [AdminController::class, 'tips_kerja_create_post'])->middleware('admin')->name('tipskerja.store');

    Route::get('/dashboard/admin/event', [AdminController::class, 'event'])->middleware('admin');
    Route::get('/dashboard/admin/event/detail/{event:id}', [AdminController::class, 'event_detail'])->middleware('admin');
    Route::get('/dashboard/admin/event/add', [AdminController::class, 'event_add'])->middleware('admin');
    Route::post('/dashboard/admin/event/tambah', [AdminController::class, 'tambah_event'])->middleware('admin');
    Route::delete('/dashboard/admin/event/hapus/{event:id}', [AdminController::class, 'hapus_event'])->middleware('admin');
    Route::get('/dashboard/admin/event/edit/{event:id}', [AdminController::class, 'event_edit'])->middleware('admin');
    Route::put('/dashboard/admin/event/update/{event:id}', [AdminController::class, 'event_update'])->middleware('admin');

    //Perusahaan
    Route::get('/dashboard/perusahaan', [PerusahaanController::class, 'index'])->middleware(middleware: 'perusahaan');
    Route::get('/dashboard/perusahaan/profile', [PerusahaanController::class, 'profile'])->middleware(middleware: 'perusahaan');
    Route::get('/dashboard/perusahaan/edit/profile', [PerusahaanController::class, 'edit_profile'])->middleware('perusahaan');
    Route::put('/dashboard/perusahaan/update/profile/{perusahaan:id}', [PerusahaanController::class, 'update_profile'])->middleware('perusahaan');
    Route::get('/dashboard/perusahaan/tambah/alamat', [PerusahaanController::class, 'tambah_alamat'])->middleware('perusahaan');
    Route::get('/dashboard/perusahaan/isi/alamat', [PerusahaanController::class, 'isi_alamat'])->middleware('perusahaan');
    Route::post('/dashboard/perusahaan/create/alamat', [PerusahaanController::class, 'create_alamat'])->middleware('perusahaan');
    Route::get('/dashboard/perusahaan/edit/alamat/{alamatperusahaan:id}', [PerusahaanController::class, 'edit_alamat'])->middleware('perusahaan');
    Route::put('/dashboard/perusahaan/update/alamat/{alamatperusahaan:id}', [PerusahaanController::class, 'update_alamat'])->middleware('perusahaan');
    Route::get('/dashboard/perusahaan/alamat/jadi', [PerusahaanController::class, 'alamat_jadi'])->middleware('perusahaan');
    Route::get('/dashboard/perusahaan/lowongan', [PerusahaanController::class, 'lowongan'])->middleware('perusahaan');
    Route::get('/dashboard/perusahaan/isi/lowongan', [PerusahaanController::class, 'isi_lowongan'])->middleware('perusahaan');
    Route::post('/dashboard/perusahaan/create/lowongan', [PerusahaanController::class, 'create_lowongan'])->middleware('perusahaan');
    Route::post('/dashboard/perusahaan/edit/lowongan/{lowongan:slug}', [PerusahaanController::class, 'edit_lowongan'])->middleware('perusahaan');
    Route::put('/dashboard/perusahaan/update/lowongan/{lowongan:slug}', [PerusahaanController::class, 'update_lowongan'])->middleware('perusahaan');
    Route::delete('/dashboard/perusahaan/hapus/lowongan/{lowongan:slug}', [PerusahaanController::class, 'hapus_lowongan'])->middleware('perusahaan');
    Route::get('/dashboard/perusahaan/lowongan/detail/{lowongan:slug}', [PerusahaanController::class, 'detail_lowongan'])->middleware('perusahaan');
    Route::get('/dashboard/perusahaan/kandidat', [PerusahaanController::class, 'kandidat'])->middleware('perusahaan');
    Route::get('/dashboard/perusahaan/kandidatak', [PerusahaanController::class, 'kandidat_ak'])->middleware('perusahaan');
    Route::get('/dashboard/perusahaan/kandidatak/cv', [PerusahaanController::class, 'cv_kandidat'])->middleware('perusahaan');
    Route::post('/beli/kandidatak/{harga:id}', [PerusahaanController::class, 'beli_kandidat'])->middleware('perusahaan');
    Route::get('/dashboard/perusahaan/pengaturan', [PerusahaanController::class, 'pengaturan'])->middleware('perusahaan');
    Route::get('/dashboard/perusahaan/pengaturan/password', [PerusahaanController::class, 'password'])->middleware('perusahaan');
    Route::put('/dashboard/perusahaan/pengaturan/password/change/{user}', [PerusahaanController::class, 'password_change'])->middleware('perusahaan');

    //Berlangganan
    Route::get('/dashboard/perusahaan/berlangganan', [PerusahaanController::class, 'berlangganan'])->middleware('perusahaan');
    Route::get('/dashboard/perusahaan/berlangganan/kandidat', [PerusahaanController::class, 'berlangganan_kandidat'])->middleware('perusahaan','berlangganan');
    Route::get('/dashboard/perusahaan/berlangganan/kandidat/info', [PerusahaanController::class, 'kandidat_info'])->middleware('perusahaan','berlangganan');
    Route::get('/dashboard/perusahaan/berlangganan/kandidat/info/bermasalah', [PerusahaanController::class, 'kandidat_bermasalah'])->middleware('perusahaan','berlangganan');
    Route::get('/dashboard/perusahaan/berlangganan/kandidat/info/nama', [PerusahaanController::class, 'kandidat_nama'])->middleware('perusahaan','berlangganan');
    Route::get('/dashboard/perusahaan/berlangganan/kandidat/info/laporan', [PerusahaanController::class, 'kandidat_laporan'])->middleware('perusahaan','berlangganan');
    Route::get('/dashboard/perusahaan/berlangganan/kandidat/info/lapor/pekerja', [PerusahaanController::class, 'lapor_pekerja'])->middleware('perusahaan','berlangganan');

    //Event  Perusahaan
    Route::get('/dashboard/perusahaan/event', [PerusahaanController::class, 'halaman_event'])->middleware('perusahaan');
    Route::get('/dashboard/perusahaan/gabung/event/{event:id}', [PerusahaanController::class, 'gabung_event'])->middleware('perusahaan');
    Route::get('/dashboard/perusahaan/detail/event/kosong', [PerusahaanController::class, 'detail_event_kosong'])->middleware('perusahaan');

    // Transaksi Top Up  
    Route::post('/dashboard/perusahaan/topup', [PerusahaanController::class, 'topup'])->middleware('perusahaan');
    Route::get('/detail/pembayaran/{trx:id}', [PerusahaanController::class, 'detail_pembayaran'])->middleware('perusahaan');
    Route::put('/upload/bukti/pembayaran/{bukti:id}', [PerusahaanController::class, 'uploadBukti'])->middleware('perusahaan');
    Route::put('/update/status', [FinanceController::class, 'updateStatus'])->name('update.status');
    Route::post('/topup/lowongan', [LowonganController::class, 'topup'])->middleware('perusahaan');

    //Lamar Cepat
    Route::post('/lamar/cepat', [PelamarController::class, 'lamar_cepat']);
    Route::get('/dashboard/perusahaan/pelamar/{lowongan:slug}', [PerusahaanController::class, 'pelamar'])->middleware('perusahaan')->middleware('perusahaan');
    Route::get('/dashboard/perusahaan/form/terima/lamaran/{lowongan:id}', [PerusahaanController::class, 'formKonfirmasiLamaran'])->middleware('perusahaan');
    Route::get('/dashboard/perusahaan/form/tolak/lamaran/{lowongan:id}', [PerusahaanController::class, 'formTolakLamaran'])->middleware('perusahaan');
    Route::get('/dashboard/perusahaan/konfirmasi/lamaran/terkirim', [PerusahaanController::class, 'konfirmasi_lamaran_terkirim'])->middleware('perusahaan');

    Route::put('/dashboard/perusahaan/tolak/lamaran/{lowongan:id}', [PerusahaanController::class, 'konfirmasi_tolak_lamaran'])->middleware('perusahaan');
    Route::put('/dashboard/perusahaan/terima/lamaran/{lowongan:id}', [PerusahaanController::class, 'konfirmasi_lamaran'])->middleware('perusahaan');
    Route::get('/dashboard/perusahaan/konfirmasi/lamaran/terkirim/{lowongan}', [PerusahaanController::class, 'konfirmasi_lamaran_terkirim'])->name(name: 'konfirmasi.lamaran.terkirim');
    Route::get('/dashboard/perusahaan/konfirmasi/lamaran/tolak/terkirim/{lowongan}', [PerusahaanController::class, 'konfirmasi_tolak_lamaran_terkirim'])->name(name: 'konfirmasi.lamaran.terkirim.tolak');
    Route::put('/dashboard/perusahaan/konfirmasi/{lowongan:id}', [PerusahaanController::class, 'konfirmasi_status'])->middleware('perusahaan');
    Route::put('/dashboard/perusahaan/konfirmasi/tolak/{lowongan:id}', [PerusahaanController::class, 'konfirmasi_tolak_status'])->middleware('perusahaan');
    
    Route::put('/detail/notif/read/{lowongan:id}', [HomeController::class, 'read_detail_notif']);
    Route::put('/detail/notif/read/perusahaan/{pembeli:id}', [PerusahaanController::class, 'read_detail_notif_perusahaan']);

    Route::post('/berlangganan/bayar', [PerusahaanController::class, 'berlangganan_bayar'])->middleware('perusahaan');
    Route::get('/dashboard/perusahaan/berlangganan/kirim/email', [PerusahaanController::class, 'berlangganan_send_email'])->middleware('perusahaan');
    
});
