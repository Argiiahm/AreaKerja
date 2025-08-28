<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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

    }
}
