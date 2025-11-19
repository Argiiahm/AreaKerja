<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Bank;
use App\Models\User;
use App\Models\Admin;
use App\Models\Daerah;
use App\Models\Divisi;
use App\Models\Finance;
use App\Models\Pelamar;
use App\Models\Provinsi;
use App\Models\HargaKoin;
use App\Models\Kabupaten;
use App\Models\Perusahaan;
use App\Models\SuperAdmin;
use App\Models\PaketLowongan;
use App\Models\HargaPembayaran;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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

        Divisi::create([
            "divisi"  =>     "Programmer"
        ]);
        Divisi::create([
            "divisi"  =>     "Desainer"
        ]);
        Divisi::create([
            "divisi"  =>     "UI UX Design"
        ]);
        Divisi::create([
            "divisi"  =>     "Video Editor"
        ]);
        Divisi::create([
            "divisi"  =>     "UX Research"
        ]);

        SuperAdmin::create([
            "user_id"            =>     1,
            "nama_lengkap"       =>     "Argi Ahmes Halepiyandra",
            "provinsi"           =>     "Jawa Tengah"
        ]);


        User::create([
            "username"           =>    "Seno Roblox",
            "email"              =>    "seno@gmail.com",
            "password"           =>     Hash::make('123'),
            "role"               =>     "admin",
            "verified"           =>     1,
            "alasan_freeze_akun" =>     null
        ]);

        Admin::create([
            "user_id"            =>     2,
            "nama_lengkap"       =>    "Seno Adi Wijaya",
            "provinsi"           =>    "Jawa Barat"
        ]);

        User::create([
            "username"           =>    "Rehan",
            "email"              =>    "rehan@gmail.com",
            "password"           =>     Hash::make('123'),
            "role"               =>     "finance",
            "verified"           =>     1,
            "alasan_freeze_akun" =>     null
        ]);

        Finance::create([
            "user_id"            =>   3,
            "nama_lengkap"       =>  'Rayhan Nazril',
            "provinsi"           =>  'Jawa Barat'
        ]);

        User::create([
            "username"           =>    "Seven Inc",
            "email"              =>    "seveninc@gmail.com",
            "password"           =>     Hash::make('123'),
            "role"               =>     "perusahaan",
            "verified"           =>     1,
            "alasan_freeze_akun" =>     null
        ]);

        Perusahaan::create([
            "user_id"    =>    4,
            "nama_perusahaan" =>  "Seven Inc",
            "telepon_perusahaan" =>  "0821212121"
        ]);

        PaketLowongan::create([
            "nama"    =>      "Bronze",
            "publikasi"  =>    1,
            "batas_listing"  => 1
        ]);
        PaketLowongan::create([
            "nama"    =>      "Silver",
            "publikasi"  =>    3,
            "batas_listing"  => 3
        ]);
        PaketLowongan::create([
            "nama"    =>      "Gold",
            "publikasi"  =>    5,
            "batas_listing"  => 5
        ]);

        HargaKoin::create([
            "nama"     =>      "Pasang Lowongan Bronze",
            "harga"    =>      100
        ]);

        HargaKoin::create([
            "nama"     =>      "Pasang Lowongan Silver",
            "harga"    =>      150
        ]);
        HargaKoin::create([
            "nama"     =>      "Pasang Lowongan Gold",
            "harga"    =>      200
        ]);
        HargaKoin::create([
            "nama"     =>      "Open Talent Hunter",
            "harga"    =>      150
        ]);
        HargaKoin::create([
            "nama"     =>      "Open CV",
            "harga"    =>      200
        ]);
        HargaKoin::create([
            "nama"     =>      "Berlangganan",
            "harga"    =>      100
        ]);
        HargaKoin::create([
            "nama"     =>      "Beli Kandidat",
            "harga"    =>      100
        ]);

        HargaPembayaran::create([
            "nama"     =>    "Pendaftaran Kandidat",
            "jumlah_koin" =>  0,
            "harga"       => 200000
        ]);

        HargaPembayaran::create([
            "nama"     =>    "Top Up 10 Koin Area Kerja",
            "jumlah_koin" =>  10,
            "harga"       => 10000,
            "icon"        => "topup_icon/1.png"
        ]);
        HargaPembayaran::create([
            "nama"     =>    "Top Up 100 Koin Area Kerja",
            "jumlah_koin" =>  100,
            "harga"       => 100000,
            "icon"        => "topup_icon/2.png"

        ]);
        HargaPembayaran::create([
            "nama"     =>    "Top Up 1000 Koin Area Kerja",
            "jumlah_koin" =>  1000,
            "harga"       => 500000,
            "icon"        => "topup_icon/3.png"
        ]);
        HargaPembayaran::create([
            "nama"     =>    "Top Up 10000 Koin Area Kerja",
            "jumlah_koin" =>  10000,
            "harga"       => 1000000,
            "icon"        => "topup_icon/4.png"

        ]);
        HargaPembayaran::create([
            "nama"     =>    "Top Up 100000 Koin Area Kerja",
            "jumlah_koin" =>  100000,
            "harga"       => 1500000,
            "icon"        => "topup_icon/5.png"
        ]);
        HargaPembayaran::create([
            "nama"     =>    "Top Up 1000000 Koin Area Kerja",
            "jumlah_koin" =>  1000000,
            "harga"       => 2000000,
            "icon"        => "topup_icon/6.png"
        ]);

        Bank::create([
            "nama_bank"  =>    "BCA",
            "owner"      =>     "Areakerja",
            "no_rek"     =>     "009912212",
            "logo_img"   =>     "topup_icon/Bca.png"
        ]);
        Bank::create([
            "nama_bank"  =>    "BRI",
            "owner"      =>     "Areakerja",
            "no_rek"     =>     "0021222112",
            "logo_img"   =>     "topup_icon/Bri.png"
        ]);
        Bank::create([
            "nama_bank"  =>    "QRIS",
            "owner"      =>     "Areakerja",
            "no_rek"     =>     "ID11021221",
            "logo_img"   =>     "topup_icon/qris.png"
        ]);

        $provinsi = json_decode(file_get_contents(database_path('seeders/json/provinces.json')), true);
        foreach ($provinsi as $p) {
            DB::table('provinsi')->insert([
                'id'   => $p['id'],
                'name' => $p['name'],
            ]);
        }

        $kabupaten = json_decode(file_get_contents(database_path('seeders/json/regencies.json')), true);
        foreach ($kabupaten as $k) {
            DB::table('kabupaten')->insert([
                'id'          => $k['id'],
                'provinsi_id' => $k['provinsi_id'],
                'name'        => $k['name'],
            ]);
        }

        $kecamatan = json_decode(file_get_contents(database_path('seeders/json/districts.json')), true);
        foreach ($kecamatan as $kc) {
            DB::table('daerah')->insert([
                'id'           => $kc['id'],
                'kabupaten_id' => $kc['kabupaten_id'],
                'name'         => $kc['name'],
            ]);
        }
    }
}
