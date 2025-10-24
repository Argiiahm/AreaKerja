<?php

namespace App\Providers;

use App\Models\CatatanCash;
use App\Models\PelamarLowongan;
use App\Models\PembeliKandidat;
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
    }
}
