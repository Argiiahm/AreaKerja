<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\HargaKoin;
use App\Models\HargaPembayaran;
use App\Models\Pelamar;
use App\Models\SuperAdmin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
           "username"           =>    "Argii",
           "email"              =>    "argi@gmail.com",
           "password"           =>     Hash::make('123'),
           "role"               =>     "superadmin",
           "verified"           =>     1,
           "alasan_freeze_akun" =>     null
        ]);

        SuperAdmin::create([
           "user_id"            =>     1,
           "nama_lengkap"       =>     "Argi Ahmes Halepiyandra",
        ]);

        User::create([
           "username"           =>    "Seno Roblox",
           "email"              =>    "seno@gmail.com",
           "password"           =>     Hash::make('123'),
           "role"               =>     "pelamar",
           "verified"           =>     1,
           "alasan_freeze_akun" =>     null
        ]);

        Pelamar::create([
           "user_id"            =>     2,
           "telepon_pelamar"    =>     "082121212"
        ]);

        HargaKoin::create([
            "nama"     =>      "Pasang Lowongan Bronze",
            "harga"    =>      150
        ]);

        HargaPembayaran::create([
            "nama"     =>    "Pendaftaran Kandidat",
            "harga"       => 200000
        ]);

        HargaPembayaran::create([
            "nama"     =>    "Top Up 10 Koin Area Kerja",
            "jumlah_koin" =>  10,
            "harga"       => 10000
        ]);

    }
}
