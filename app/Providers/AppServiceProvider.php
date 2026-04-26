<?php

namespace App\Providers;

use App\Models\Provinsi;
use App\Models\CatatanCash;
use App\Models\PelamarLowongan;
use App\Models\PembeliKandidat;
use App\Models\SosialLinks;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Auto-cleanup expired lowongan tanpa perlu Cron Job/Scheduler
        // Menggunakan DB facade agar lebih ringan dan aman saat booting aplikasi
        try {
            \Illuminate\Support\Facades\DB::table('lowongan_perusahaans')
                ->whereNotNull('expired_date')
                ->where('expired_date', '<=', now())
                ->update([
                    'paket_id' => null,
                    'expired_date' => null,
                ]);

            \Illuminate\Support\Facades\DB::table('pelamar_lowongans')
                ->whereNotNull('expired_date')
                ->where('expired_date', '<=', now())
                ->delete();
        } catch (\Exception $e) {
            // Abaikan jika database belum siap
        }

        Gate::define('perusahaan', function ($user) {
            return $user->role == 'perusahaan';
        });

        View::composer('*', function ($view) {
            $Pesan = collect();
            $unreadCount = 0;

            if (Auth::check() && Auth::user()->role === 'pelamar') {
                $pelamarId = optional(Auth::user()->pelamars)->id;
                if ($pelamarId) {
                    $Pesan = PelamarLowongan::with('lowongan.perusahaan')
                        ->where('pelamar_id', $pelamarId)
                        ->where('status', '!=', 'pending')
                        ->latest()
                        ->get();

                    $unreadCount = $Pesan->count();
                }
            }

            if (Auth::check() && (Auth::user()->role === 'admin' || Auth::user()->role === 'superadmin')) {
                $Pesan = PelamarLowongan::with('lowongan.perusahaan')
                    ->where('status', '!=', 'pending')
                    ->latest()
                    ->get();

                $unreadCount = $Pesan->count();
            }

            $view->with(compact('Pesan', 'unreadCount'));
        });

        View::composer('*', function ($view) {
            $PesanPerusahaan = PembeliKandidat::all();

            $view->with(compact('PesanPerusahaan'));
        });

        View::composer('*', function ($view) {
            $notifTfMasuk = CatatanCash::where('status', 'pending')->get();
            $view->with('NotifTfMasuk', $notifTfMasuk);
        });

        View::composer('*', function ($view) {
            if (Auth::check() && Auth::user()->role === 'admin') {
                $view->with('Provinsi', Provinsi::all());
            }
        });

        View::composer('*', function ($view) {
            $view->with('link_sosial', SosialLinks::all()->keyBy('nama'));
        });
    }
}
