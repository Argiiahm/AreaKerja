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
            "nama"    =>      "Gold",
            "publikasi"  =>    5,
            "batas_listing"  => 5
        ]);
        PaketLowongan::create([
            "nama"    =>      "Silver",
            "publikasi"  =>    3,
            "batas_listing"  => 3
        ]);
        PaketLowongan::create([
            "nama"    =>      "Bronze",
            "publikasi"  =>    1,
            "batas_listing"  => 1
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
            "harga"    =>      300
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

        // Provinsi
        Provinsi::insert([
            ['name' => 'Aceh'],
            ['name' => 'Sumatera Utara'],
            ['name' => 'Sumatera Selatan'],
            ['name' => 'Sumatera Barat'],
            ['name' => 'Bengkulu'],
            ['name' => 'Riau'],
            ['name' => 'Kepulauan Riau'],
            ['name' => 'Jambi'],
            ['name' => 'Lampung'],
            ['name' => 'Bangka Belitung'],
            ['name' => 'Kalimantan Barat'],
            ['name' => 'Kalimantan Timur'],
            ['name' => 'Kalimantan Selatan'],
            ['name' => 'Kalimantan Tengah'],
            ['name' => 'Kalimantan Utara'],
            ['name' => 'Banten'],
            ['name' => 'DKI Jakarta'],
            ['name' => 'Jawa Barat'],
            ['name' => 'Jawa Tengah'],
            ['name' => 'Daerah Istimewa Yogyakarta'],
            ['name' => 'Jawa Timur'],
            ['name' => 'Bali'],
            ['name' => 'Nusa Tenggara Barat'],
            ['name' => 'Nusa Tenggara Timur'],
            ['name' => 'Gorontalo'],
            ['name' => 'Sulawesi Barat'],
            ['name' => 'Sulawesi Tengah'],
            ['name' => 'Sulawesi Utara'],
            ['name' => 'Sulawesi Tenggara'],
            ['name' => 'Sulawesi Selatan'],
            ['name' => 'Maluku Utara'],
            ['name' => 'Maluku'],
            ['name' => 'Papua Barat'],
            ['name' => 'Papua'],
            ['name' => 'Papua Tengah'],
            ['name' => 'Papua Pegunungan'],
            ['name' => 'Papua Selatan'],
            ['name' => 'Papua Barat Daya'],
        ]);

        // Kabupaten/Kota
        Kabupaten::insert([
            // Aceh (ID: 1)
            ['provinsi_id' => 1, 'name' => 'Aceh Besar'],
            ['provinsi_id' => 1, 'name' => 'Aceh Barat'],
            ['provinsi_id' => 1, 'name' => 'Aceh Selatan'],
            ['provinsi_id' => 1, 'name' => 'Aceh Timur'],
            ['provinsi_id' => 1, 'name' => 'Aceh Tengah'],
            ['provinsi_id' => 1, 'name' => 'Aceh Utara'],
            ['provinsi_id' => 1, 'name' => 'Banda Aceh'],
            ['provinsi_id' => 1, 'name' => 'Sabang'],
            ['provinsi_id' => 1, 'name' => 'Lhokseumawe'],
            ['provinsi_id' => 1, 'name' => 'Langsa'],

            // Sumatera Utara (ID: 2)
            ['provinsi_id' => 2, 'name' => 'Medan'],
            ['provinsi_id' => 2, 'name' => 'Binjai'],
            ['provinsi_id' => 2, 'name' => 'Pematang Siantar'],
            ['provinsi_id' => 2, 'name' => 'Tebing Tinggi'],
            ['provinsi_id' => 2, 'name' => 'Deli Serdang'],
            ['provinsi_id' => 2, 'name' => 'Serdang Bedagai'],
            ['provinsi_id' => 2, 'name' => 'Karo'],
            ['provinsi_id' => 2, 'name' => 'Asahan'],
            ['provinsi_id' => 2, 'name' => 'Labuhanbatu'],
            ['provinsi_id' => 2, 'name' => 'Tapanuli Utara'],

            // Sumatera Selatan (ID: 3)
            ['provinsi_id' => 3, 'name' => 'Palembang'],
            ['provinsi_id' => 3, 'name' => 'Prabumulih'],
            ['provinsi_id' => 3, 'name' => 'Lubuklinggau'],
            ['provinsi_id' => 3, 'name' => 'Musi Banyuasin'],
            ['provinsi_id' => 3, 'name' => 'Ogan Komering Ilir'],
            ['provinsi_id' => 3, 'name' => 'Ogan Ilir'],
            ['provinsi_id' => 3, 'name' => 'Muara Enim'],
            ['provinsi_id' => 3, 'name' => 'Lahat'],
            ['provinsi_id' => 3, 'name' => 'Banyuasin'],
            ['provinsi_id' => 3, 'name' => 'Empat Lawang'],

            // Sumatera Barat (ID: 4)
            ['provinsi_id' => 4, 'name' => 'Padang'],
            ['provinsi_id' => 4, 'name' => 'Bukittinggi'],
            ['provinsi_id' => 4, 'name' => 'Padang Panjang'],
            ['provinsi_id' => 4, 'name' => 'Payakumbuh'],
            ['provinsi_id' => 4, 'name' => 'Agam'],
            ['provinsi_id' => 4, 'name' => 'Tanah Datar'],
            ['provinsi_id' => 4, 'name' => 'Pasaman'],
            ['provinsi_id' => 4, 'name' => 'Lima Puluh Kota'],
            ['provinsi_id' => 4, 'name' => 'Pesisir Selatan'],
            ['provinsi_id' => 4, 'name' => 'Solok'],

            // Bengkulu (ID: 5)
            ['provinsi_id' => 5, 'name' => 'Bengkulu'],
            ['provinsi_id' => 5, 'name' => 'Bengkulu Utara'],
            ['provinsi_id' => 5, 'name' => 'Bengkulu Selatan'],
            ['provinsi_id' => 5, 'name' => 'Bengkulu Tengah'],
            ['provinsi_id' => 5, 'name' => 'Rejang Lebong'],
            ['provinsi_id' => 5, 'name' => 'Kaur'],
            ['provinsi_id' => 5, 'name' => 'Seluma'],
            ['provinsi_id' => 5, 'name' => 'Lebong'],
            ['provinsi_id' => 5, 'name' => 'Kepahiang'],
            ['provinsi_id' => 5, 'name' => 'Mukomuko'],

            // Riau (ID: 6)
            ['provinsi_id' => 6, 'name' => 'Pekanbaru'],
            ['provinsi_id' => 6, 'name' => 'Dumai'],
            ['provinsi_id' => 6, 'name' => 'Kampar'],
            ['provinsi_id' => 6, 'name' => 'Bengkalis'],
            ['provinsi_id' => 6, 'name' => 'Rokan Hilir'],
            ['provinsi_id' => 6, 'name' => 'Rokan Hulu'],
            ['provinsi_id' => 6, 'name' => 'Siak'],
            ['provinsi_id' => 6, 'name' => 'Indragiri Hilir'],
            ['provinsi_id' => 6, 'name' => 'Indragiri Hulu'],
            ['provinsi_id' => 6, 'name' => 'Pelalawan'],

            // Kepulauan Riau (ID: 7)
            ['provinsi_id' => 7, 'name' => 'Batam'],
            ['provinsi_id' => 7, 'name' => 'Tanjung Pinang'],
            ['provinsi_id' => 7, 'name' => 'Bintan'],
            ['provinsi_id' => 7, 'name' => 'Karimun'],
            ['provinsi_id' => 7, 'name' => 'Natuna'],
            ['provinsi_id' => 7, 'name' => 'Lingga'],
            ['provinsi_id' => 7, 'name' => 'Kepulauan Anambas'],

            // Jambi (ID: 8)
            ['provinsi_id' => 8, 'name' => 'Jambi'],
            ['provinsi_id' => 8, 'name' => 'Sungai Penuh'],
            ['provinsi_id' => 8, 'name' => 'Batang Hari'],
            ['provinsi_id' => 8, 'name' => 'Bungo'],
            ['provinsi_id' => 8, 'name' => 'Kerinci'],
            ['provinsi_id' => 8, 'name' => 'Merangin'],
            ['provinsi_id' => 8, 'name' => 'Muaro Jambi'],
            ['provinsi_id' => 8, 'name' => 'Sarolangun'],
            ['provinsi_id' => 8, 'name' => 'Tanjung Jabung Barat'],
            ['provinsi_id' => 8, 'name' => 'Tanjung Jabung Timur'],

            // Lampung (ID: 9)
            ['provinsi_id' => 9, 'name' => 'Bandar Lampung'],
            ['provinsi_id' => 9, 'name' => 'Metro'],
            ['provinsi_id' => 9, 'name' => 'Lampung Selatan'],
            ['provinsi_id' => 9, 'name' => 'Lampung Tengah'],
            ['provinsi_id' => 9, 'name' => 'Lampung Utara'],
            ['provinsi_id' => 9, 'name' => 'Lampung Timur'],
            ['provinsi_id' => 9, 'name' => 'Lampung Barat'],
            ['provinsi_id' => 9, 'name' => 'Tulang Bawang'],
            ['provinsi_id' => 9, 'name' => 'Way Kanan'],
            ['provinsi_id' => 9, 'name' => 'Pesawaran'],

            // Bangka Belitung (ID: 10)
            ['provinsi_id' => 10, 'name' => 'Pangkal Pinang'],
            ['provinsi_id' => 10, 'name' => 'Bangka'],
            ['provinsi_id' => 10, 'name' => 'Bangka Barat'],
            ['provinsi_id' => 10, 'name' => 'Bangka Tengah'],
            ['provinsi_id' => 10, 'name' => 'Bangka Selatan'],
            ['provinsi_id' => 10, 'name' => 'Belitung'],
            ['provinsi_id' => 10, 'name' => 'Belitung Timur'],

            // Kalimantan Barat (ID: 11)
            ['provinsi_id' => 11, 'name' => 'Pontianak'],
            ['provinsi_id' => 11, 'name' => 'Singkawang'],
            ['provinsi_id' => 11, 'name' => 'Ketapang'],
            ['provinsi_id' => 11, 'name' => 'Sintang'],
            ['provinsi_id' => 11, 'name' => 'Kapuas Hulu'],
            ['provinsi_id' => 11, 'name' => 'Sambas'],
            ['provinsi_id' => 11, 'name' => 'Sanggau'],
            ['provinsi_id' => 11, 'name' => 'Kubu Raya'],
            ['provinsi_id' => 11, 'name' => 'Landak'],
            ['provinsi_id' => 11, 'name' => 'Bengkayang'],

            // Kalimantan Timur (ID: 12)
            ['provinsi_id' => 12, 'name' => 'Samarinda'],
            ['provinsi_id' => 12, 'name' => 'Balikpapan'],
            ['provinsi_id' => 12, 'name' => 'Bontang'],
            ['provinsi_id' => 12, 'name' => 'Kutai Kartanegara'],
            ['provinsi_id' => 12, 'name' => 'Kutai Timur'],
            ['provinsi_id' => 12, 'name' => 'Kutai Barat'],
            ['provinsi_id' => 12, 'name' => 'Berau'],
            ['provinsi_id' => 12, 'name' => 'Paser'],
            ['provinsi_id' => 12, 'name' => 'Penajam Paser Utara'],
            ['provinsi_id' => 12, 'name' => 'Mahakam Ulu'],

            // Kalimantan Selatan (ID: 13)
            ['provinsi_id' => 13, 'name' => 'Banjarmasin'],
            ['provinsi_id' => 13, 'name' => 'Banjarbaru'],
            ['provinsi_id' => 13, 'name' => 'Banjar'],
            ['provinsi_id' => 13, 'name' => 'Barito Kuala'],
            ['provinsi_id' => 13, 'name' => 'Tapin'],
            ['provinsi_id' => 13, 'name' => 'Hulu Sungai Selatan'],
            ['provinsi_id' => 13, 'name' => 'Hulu Sungai Tengah'],
            ['provinsi_id' => 13, 'name' => 'Hulu Sungai Utara'],
            ['provinsi_id' => 13, 'name' => 'Tabalong'],
            ['provinsi_id' => 13, 'name' => 'Tanah Laut'],

            // Kalimantan Tengah (ID: 14)
            ['provinsi_id' => 14, 'name' => 'Palangka Raya'],
            ['provinsi_id' => 14, 'name' => 'Kotawaringin Barat'],
            ['provinsi_id' => 14, 'name' => 'Kotawaringin Timur'],
            ['provinsi_id' => 14, 'name' => 'Kapuas'],
            ['provinsi_id' => 14, 'name' => 'Barito Selatan'],
            ['provinsi_id' => 14, 'name' => 'Barito Utara'],
            ['provinsi_id' => 14, 'name' => 'Barito Timur'],
            ['provinsi_id' => 14, 'name' => 'Gunung Mas'],
            ['provinsi_id' => 14, 'name' => 'Lamandau'],
            ['provinsi_id' => 14, 'name' => 'Sukamara'],

            // Kalimantan Utara (ID: 15)
            ['provinsi_id' => 15, 'name' => 'Tarakan'],
            ['provinsi_id' => 15, 'name' => 'Bulungan'],
            ['provinsi_id' => 15, 'name' => 'Malinau'],
            ['provinsi_id' => 15, 'name' => 'Nunukan'],
            ['provinsi_id' => 15, 'name' => 'Tana Tidung'],

            // Banten (ID: 16)
            ['provinsi_id' => 16, 'name' => 'Serang'],
            ['provinsi_id' => 16, 'name' => 'Cilegon'],
            ['provinsi_id' => 16, 'name' => 'Tangerang'],
            ['provinsi_id' => 16, 'name' => 'Tangerang Selatan'],
            ['provinsi_id' => 16, 'name' => 'Pandeglang'],
            ['provinsi_id' => 16, 'name' => 'Lebak'],
            ['provinsi_id' => 16, 'name' => 'Tangerang (Kab)'],

            // DKI Jakarta (ID: 17)
            ['provinsi_id' => 17, 'name' => 'Jakarta Selatan'],
            ['provinsi_id' => 17, 'name' => 'Jakarta Pusat'],
            ['provinsi_id' => 17,
             'name' => 'Jakarta Barat'],
            ['provinsi_id' => 17, 'name' => 'Jakarta Utara'],
            ['provinsi_id' => 17, 'name' => 'Jakarta Timur'],
            ['provinsi_id' => 17, 'name' => 'Kepulauan Seribu'],

            // Jawa Barat (ID: 18)
            ['provinsi_id' => 18, 'name' => 'Bandung'],
            ['provinsi_id' => 18, 'name' => 'Bogor'],
            ['provinsi_id' => 18, 'name' => 'Ciamis'],
            ['provinsi_id' => 18, 'name' => 'Karawang'],
            ['provinsi_id' => 18, 'name' => 'Sukabumi'],
            ['provinsi_id' => 18, 'name' => 'Bekasi'],
            ['provinsi_id' => 18, 'name' => 'Cirebon'],
            ['provinsi_id' => 18, 'name' => 'Depok'],
            ['provinsi_id' => 18, 'name' => 'Garut'],
            ['provinsi_id' => 18, 'name' => 'Tasikmalaya'],
            ['provinsi_id' => 18, 'name' => 'Purwakarta'],
            ['provinsi_id' => 18, 'name' => 'Subang'],
            ['provinsi_id' => 18, 'name' => 'Indramayu'],
            ['provinsi_id' => 18, 'name' => 'Kuningan'],
            ['provinsi_id' => 18, 'name' => 'Majalengka'],
            ['provinsi_id' => 18, 'name' => 'Sumedang'],
            ['provinsi_id' => 18, 'name' => 'Cianjur'],
            ['provinsi_id' => 18, 'name' => 'Banjar'],
            ['provinsi_id' => 18, 'name' => 'Pangandaran'],

            // Jawa Tengah (ID: 19)
            ['provinsi_id' => 19, 'name' => 'Semarang'],
            ['provinsi_id' => 19, 'name' => 'Surakarta'],
            ['provinsi_id' => 19, 'name' => 'Magelang'],
            ['provinsi_id' => 19, 'name' => 'Salatiga'],
            ['provinsi_id' => 19, 'name' => 'Pekalongan'],
            ['provinsi_id' => 19, 'name' => 'Tegal'],
            ['provinsi_id' => 19, 'name' => 'Banyumas'],
            ['provinsi_id' => 19, 'name' => 'Cilacap'],
            ['provinsi_id' => 19, 'name' => 'Purbalingga'],
            ['provinsi_id' => 19, 'name' => 'Banjarnegara'],
            ['provinsi_id' => 19, 'name' => 'Kebumen'],
            ['provinsi_id' => 19, 'name' => 'Purworejo'],
            ['provinsi_id' => 19, 'name' => 'Wonosobo'],
            ['provinsi_id' => 19, 'name' => 'Temanggung'],
            ['provinsi_id' => 19, 'name' => 'Kendal'],
            ['provinsi_id' => 19, 'name' => 'Batang'],
            ['provinsi_id' => 19, 'name' => 'Pekalongan (Kab)'],
            ['provinsi_id' => 19, 'name' => 'Pemalang'],
            ['provinsi_id' => 19, 'name' => 'Tegal (Kab)'],
            ['provinsi_id' => 19, 'name' => 'Brebes'],

            // Daerah Istimewa Yogyakarta (ID: 20)
            ['provinsi_id' => 20, 'name' => 'Yogyakarta'],
            ['provinsi_id' => 20, 'name' => 'Bantul'],
            ['provinsi_id' => 20, 'name' => 'Sleman'],
            ['provinsi_id' => 20, 'name' => 'Gunungkidul'],
            ['provinsi_id' => 20, 'name' => 'Kulon Progo'],

            // Jawa Timur (ID: 21)
            ['provinsi_id' => 21, 'name' => 'Surabaya'],
            ['provinsi_id' => 21, 'name' => 'Malang'],
            ['provinsi_id' => 21, 'name' => 'Kediri'],
            ['provinsi_id' => 21, 'name' => 'Blitar'],
            ['provinsi_id' => 21, 'name' => 'Mojokerto'],
            ['provinsi_id' => 21, 'name' => 'Madiun'],
            ['provinsi_id' => 21, 'name' => 'Pasuruan'],
            ['provinsi_id' => 21, 'name' => 'Probolinggo'],
            ['provinsi_id' => 21, 'name' => 'Banyuwangi'],
            ['provinsi_id' => 21, 'name' => 'Jember'],
            ['provinsi_id' => 21, 'name' => 'Lumajang'],
            ['provinsi_id' => 21, 'name' => 'Bondowoso'],
            ['provinsi_id' => 21, 'name' => 'Situbondo'],
            ['provinsi_id' => 21, 'name' => 'Sidoarjo'],
            ['provinsi_id' => 21, 'name' => 'Gresik'],
            ['provinsi_id' => 21, 'name' => 'Lamongan'],
            ['provinsi_id' => 21, 'name' => 'Tuban'],
            ['provinsi_id' => 21, 'name' => 'Bojonegoro'],
            ['provinsi_id' => 21, 'name' => 'Nganjuk'],
            ['provinsi_id' => 21, 'name' => 'Jombang'],

            // Bali (ID: 22)
            ['provinsi_id' => 22, 'name' => 'Denpasar'],
            ['provinsi_id' => 22, 'name' => 'Badung'],
            ['provinsi_id' => 22, 'name' => 'Gianyar'],
            ['provinsi_id' => 22, 'name' => 'Tabanan'],
            ['provinsi_id' => 22, 'name' => 'Buleleng'],
            ['provinsi_id' => 22, 'name' => 'Jembrana'],
            ['provinsi_id' => 22, 'name' => 'Bangli'],
            ['provinsi_id' => 22, 'name' => 'Karangasem'],
            ['provinsi_id' => 22, 'name' => 'Klungkung'],

            // Nusa Tenggara Barat (ID: 23)
            ['provinsi_id' => 23, 'name' => 'Mataram'],
            ['provinsi_id' => 23, 'name' => 'Bima'],
            ['provinsi_id' => 23, 'name' => 'Lombok Barat'],
            ['provinsi_id' => 23, 'name' => 'Lombok Tengah'],
            ['provinsi_id' => 23, 'name' => 'Lombok Timur'],
            ['provinsi_id' => 23, 'name' => 'Lombok Utara'],
            ['provinsi_id' => 23, 'name' => 'Sumbawa'],
            ['provinsi_id' => 23, 'name' => 'Sumbawa Barat'],
            ['provinsi_id' => 23, 'name' => 'Dompu'],
            ['provinsi_id' => 23, 'name' => 'Bima (Kab)'],

            // Nusa Tenggara Timur (ID: 24)
            ['provinsi_id' => 24, 'name' => 'Kupang'],
            ['provinsi_id' => 24, 'name' => 'Ende'],
            ['provinsi_id' => 24, 'name' => 'Flores Timur'],
            ['provinsi_id' => 24, 'name' => 'Manggarai'],
            ['provinsi_id' => 24, 'name' => 'Sumba Barat'],
            ['provinsi_id' => 24, 'name' => 'Sumba Timur'],
            ['provinsi_id' => 24, 'name' => 'Timor Tengah Selatan'],
            ['provinsi_id' => 24, 'name' => 'Timor Tengah Utara'],
            ['provinsi_id' => 24, 'name' => 'Alor'],
            ['provinsi_id' => 24, 'name' => 'Lembata'],

            // Gorontalo (ID: 25)
            ['provinsi_id' => 25, 'name' => 'Gorontalo'],
            ['provinsi_id' => 25, 'name' => 'Gorontalo (Kab)'],
            ['provinsi_id' => 25, 'name' => 'Boalemo'],
            ['provinsi_id' => 25, 'name' => 'Bone Bolango'],
            ['provinsi_id' => 25, 'name' => 'Pohuwato'],
            ['provinsi_id' => 25, 'name' => 'Gorontalo Utara'],

            ['provinsi_id' => 26, 'name' => 'Mamuju'],
            ['provinsi_id' => 26, 'name' => 'Majene'],
            ['provinsi_id' => 26, 'name' => 'Polewali Mandar'],
            ['provinsi_id' => 26, 'name' => 'Mamasa'],
            ['provinsi_id' => 26, 'name' => 'Mamuju Utara'],
            ['provinsi_id' => 26, 'name' => 'Mamuju Tengah'],

            // Sulawesi Tengah (ID: 27)
            ['provinsi_id' => 27, 'name' => 'Palu'],
            ['provinsi_id' => 27, 'name' => 'Banggai'],
            ['provinsi_id' => 27, 'name' => 'Poso'],
            ['provinsi_id' => 27, 'name' => 'Donggala'],
            ['provinsi_id' => 27, 'name' => 'Toli-Toli'],
            ['provinsi_id' => 27, 'name' => 'Morowali'],
            ['provinsi_id' => 27, 'name' => 'Banggai Kepulauan'],
            ['provinsi_id' => 27, 'name' => 'Parigi Moutong'],
            ['provinsi_id' => 27, 'name' => 'Tojo Una-Una'],
            ['provinsi_id' => 27, 'name' => 'Sigi'],

            // Sulawesi Utara (ID: 28)
            ['provinsi_id' => 28, 'name' => 'Manado'],
            ['provinsi_id' => 28, 'name' => 'Bitung'],
            ['provinsi_id' => 28, 'name' => 'Tomohon'],
            ['provinsi_id' => 28, 'name' => 'Kotamobagu'],
            ['provinsi_id' => 28, 'name' => 'Minahasa'],
            ['provinsi_id' => 28, 'name' => 'Minahasa Utara'],
            ['provinsi_id' => 28, 'name' => 'Minahasa Selatan'],
            ['provinsi_id' => 28, 'name' => 'Bolaang Mongondow'],
            ['provinsi_id' => 28, 'name' => 'Kepulauan Sangihe'],
            ['provinsi_id' => 28, 'name' => 'Kepulauan Talaud'],


            // Sulawesi Tenggara (ID: 29)
            ['provinsi_id' => 29, 'name' => 'Kendari'],
            ['provinsi_id' => 29, 'name' => 'Baubau'],
            ['provinsi_id' => 29, 'name' => 'Konawe'],
            ['provinsi_id' => 29, 'name' => 'Kolaka'],
            ['provinsi_id' => 29, 'name' => 'Muna'],
            ['provinsi_id' => 29, 'name' => 'Buton'],
            ['provinsi_id' => 29, 'name' => 'Wakatobi'],
            ['provinsi_id' => 29, 'name' => 'Bombana'],
            ['provinsi_id' => 29, 'name' => 'Konawe Selatan'],
            ['provinsi_id' => 29, 'name' => 'Konawe Utara'],

            // Sulawesi Selatan (ID: 30)
            ['provinsi_id' => 30, 'name' => 'Makassar'],
            ['provinsi_id' => 30, 'name' => 'Parepare'],
            ['provinsi_id' => 30, 'name' => 'Palopo'],
            ['provinsi_id' => 30, 'name' => 'Gowa'],
            ['provinsi_id' => 30, 'name' => 'Bone'],
            ['provinsi_id' => 30, 'name' => 'Luwu'],
            ['provinsi_id' => 30, 'name' => 'Bulukumba'],
            ['provinsi_id' => 30, 'name' => 'Maros'],
            ['provinsi_id' => 30, 'name' => 'Sinjai'],
            ['provinsi_id' => 30, 'name' => 'Wajo'],
            ['provinsi_id' => 30, 'name' => 'Soppeng'],
            ['provinsi_id' => 30, 'name' => 'Barru'],
            ['provinsi_id' => 30, 'name' => 'Pangkajene dan Kepulauan'],
            ['provinsi_id' => 30, 'name' => 'Takalar'],
            ['provinsi_id' => 30, 'name' => 'Jeneponto'],

            // Maluku Utara (ID: 31)
            ['provinsi_id' => 31, 'name' => 'Ternate'],
            ['provinsi_id' => 31, 'name' => 'Tidore Kepulauan'],
            ['provinsi_id' => 31, 'name' => 'Halmahera Barat'],
            ['provinsi_id' => 31, 'name' => 'Halmahera Tengah'],
            ['provinsi_id' => 31, 'name' => 'Halmahera Utara'],
            ['provinsi_id' => 31, 'name' => 'Halmahera Selatan'],
            ['provinsi_id' => 31, 'name' => 'Halmahera Timur'],
            ['provinsi_id' => 31, 'name' => 'Kepulauan Sula'],
            ['provinsi_id' => 31, 'name' => 'Pulau Morotai'],
            ['provinsi_id' => 31, 'name' => 'Pulau Taliabu'],

            // Maluku (ID: 32)
            ['provinsi_id' => 32, 'name' => 'Ambon'],
            ['provinsi_id' => 32, 'name' => 'Tual'],
            ['provinsi_id' => 32, 'name' => 'Maluku Tengah'],
            ['provinsi_id' => 32, 'name' => 'Maluku Tenggara'],
            ['provinsi_id' => 32, 'name' => 'Maluku Tenggara Barat'],
            ['provinsi_id' => 32, 'name' => 'Buru'],
            ['provinsi_id' => 32, 'name' => 'Kepulauan Aru'],
            ['provinsi_id' => 32, 'name' => 'Seram Bagian Barat'],
            ['provinsi_id' => 32, 'name' => 'Seram Bagian Timur'],
            ['provinsi_id' => 32, 'name' => 'Buru Selatan'],

            // Papua Barat (ID: 33)
            ['provinsi_id' => 33, 'name' => 'Sorong'],
            ['provinsi_id' => 33, 'name' => 'Manokwari'],
            ['provinsi_id' => 33, 'name' => 'Fakfak'],
            ['provinsi_id' => 33, 'name' => 'Kaimana'],
            ['provinsi_id' => 33, 'name' => 'Raja Ampat'],
            ['provinsi_id' => 33, 'name' => 'Sorong Selatan'],
            ['provinsi_id' => 33, 'name' => 'Teluk Bintuni'],
            ['provinsi_id' => 33, 'name' => 'Teluk Wondama'],
            ['provinsi_id' => 33, 'name' => 'Manokwari Selatan'],
            ['provinsi_id' => 33, 'name' => 'Pegunungan Arfak'],

            // Papua (ID: 34)
            ['provinsi_id' => 34, 'name' => 'Jayapura'],
            ['provinsi_id' => 34, 'name' => 'Biak Numfor'],
            ['provinsi_id' => 34, 'name' => 'Jayapura (Kab)'],
            ['provinsi_id' => 34, 'name' => 'Kepulauan Yapen'],
            ['provinsi_id' => 34, 'name' => 'Keerom'],
            ['provinsi_id' => 34, 'name' => 'Sarmi'],
            ['provinsi_id' => 34, 'name' => 'Mamberamo Raya'],
            ['provinsi_id' => 34, 'name' => 'Supiori'],
            ['provinsi_id' => 34, 'name' => 'Waropen'],
            ['provinsi_id' => 34, 'name' => 'Mamberamo Tengah'],

            // Papua Tengah (ID: 35)
            ['provinsi_id' => 35, 'name' => 'Nabire'],
            ['provinsi_id' => 35, 'name' => 'Paniai'],
            ['provinsi_id' => 35, 'name' => 'Puncak Jaya'],
            ['provinsi_id' => 35, 'name' => 'Mimika'],
            ['provinsi_id' => 35, 'name' => 'Dogiyai'],
            ['provinsi_id' => 35, 'name' => 'Deiyai'],
            ['provinsi_id' => 35, 'name' => 'Intan Jaya'],

            // Papua Pegunungan (ID: 36)
            ['provinsi_id' => 36, 'name' => 'Jayawijaya'],
            ['provinsi_id' => 36, 'name' => 'Pegunungan Bintang'],
            ['provinsi_id' => 36, 'name' => 'Yahukimo'],
            ['provinsi_id' => 36, 'name' => 'Tolikara'],
            ['provinsi_id' => 36, 'name' => 'Lanny Jaya'],
            ['provinsi_id' => 36, 'name' => 'Mamberamo Tengah'],
            ['provinsi_id' => 36, 'name' => 'Yalimo'],
            ['provinsi_id' => 36, 'name' => 'Nduga'],

            // Papua Selatan (ID: 37)
            ['provinsi_id' => 37, 'name' => 'Merauke'],
            ['provinsi_id' => 37, 'name' => 'Boven Digoel'],
            ['provinsi_id' => 37, 'name' => 'Mappi'],
            ['provinsi_id' => 37, 'name' => 'Asmat'],

            // Papua Barat Daya (ID: 38)
            ['provinsi_id' => 38, 'name' => 'Sorong'],
            ['provinsi_id' => 38, 'name' => 'Maybrat'],
            ['provinsi_id' => 38, 'name' => 'Tambrauw'],
            ['provinsi_id' => 38, 'name' => 'Sorong Selatan'],
        ]);

        // Daerah/Kecamatan
        Daerah::insert([
            // Kabupaten Bandung (ID: 1)
            ['kabupaten_id' => 1, 'name' => 'Cibeunying Kidul'],
            ['kabupaten_id' => 1, 'name' => 'Bandung Wetan'],
            ['kabupaten_id' => 1, 'name' => 'Lengkong'],
            ['kabupaten_id' => 1, 'name' => 'Cibeunying Kaler'],
            ['kabupaten_id' => 1, 'name' => 'Cicendo'],
            ['kabupaten_id' => 1, 'name' => 'Sukajadi'],
            ['kabupaten_id' => 1, 'name' => 'Cidadap'],
            ['kabupaten_id' => 1, 'name' => 'Coblong'],

            // Kabupaten Bogor (ID: 2)
            ['kabupaten_id' => 2, 'name' => 'Bogor Selatan'],
            ['kabupaten_id' => 2, 'name' => 'Bogor Timur'],
            ['kabupaten_id' => 2, 'name' => 'Bogor Utara'],
            ['kabupaten_id' => 2, 'name' => 'Bogor Tengah'],
            ['kabupaten_id' => 2, 'name' => 'Bogor Barat'],
            ['kabupaten_id' => 2, 'name' => 'Tanah Sareal'],

            // Kabupaten Ciamis (ID: 3)
            ['kabupaten_id' => 3, 'name' => 'Ciamis'],
            ['kabupaten_id' => 3, 'name' => 'Banjar'],
            ['kabupaten_id' => 3, 'name' => 'Pangandaran'],
            ['kabupaten_id' => 3, 'name' => 'Cijulang'],
            ['kabupaten_id' => 3, 'name' => 'Banjarsari'],

            // Kabupaten Karawang (ID: 4)
            ['kabupaten_id' => 4, 'name' => 'Karawang Barat'],
            ['kabupaten_id' => 4, 'name' => 'Karawang Timur'],
            ['kabupaten_id' => 4, 'name' => 'Telukjambe Timur'],
            ['kabupaten_id' => 4, 'name' => 'Telukjambe Barat'],
            ['kabupaten_id' => 4, 'name' => 'Klari'],

            // Kabupaten Sukabumi (ID: 5)
            ['kabupaten_id' => 5, 'name' => 'Sukabumi'],
            ['kabupaten_id' => 5, 'name' => 'Cibadak'],
            ['kabupaten_id' => 5, 'name' => 'Palabuhanratu'],
            ['kabupaten_id' => 5, 'name' => 'Cisaat'],
            ['kabupaten_id' => 5, 'name' => 'Cicurug'],

            // Kabupaten Aceh Besar (ID: 6)
            ['kabupaten_id' => 6, 'name' => 'Darul Imarah'],
            ['kabupaten_id' => 6, 'name' => 'Kuta Cot Glie'],
            ['kabupaten_id' => 6, 'name' => 'Leupung'],
            ['kabupaten_id' => 6, 'name' => 'Lhoknga'],
            ['kabupaten_id' => 6, 'name' => 'Mesjid Raya'],
            ['kabupaten_id' => 6, 'name' => 'Peukan Bada'],

            // Kabupaten Aceh Barat (ID: 7)
            ['kabupaten_id' => 7, 'name' => 'Johan Pahlawan'],
            ['kabupaten_id' => 7, 'name' => 'Meureubo'],
            ['kabupaten_id' => 7, 'name' => 'Samatiga'],
            ['kabupaten_id' => 7, 'name' => 'Woyla'],
            ['kabupaten_id' => 7, 'name' => 'Kaway XVI'],

            // Kabupaten Aceh Selatan (ID: 8)
            ['kabupaten_id' => 8, 'name' => 'Tapaktuan'],
            ['kabupaten_id' => 8, 'name' => 'Kluet Utara'],
            ['kabupaten_id' => 8, 'name' => 'Kluet Selatan'],
            ['kabupaten_id' => 8, 'name' => 'Bakongan'],
            ['kabupaten_id' => 8, 'name' => 'Meukek'],

            // Kabupaten Aceh Timur (ID: 9)
            ['kabupaten_id' => 9, 'name' => 'Idi Rayeuk'],
            ['kabupaten_id' => 9, 'name' => 'Peureulak'],
            ['kabupaten_id' => 9, 'name' => 'Peudawa'],
            ['kabupaten_id' => 9, 'name' => 'Julok'],
            ['kabupaten_id' => 9, 'name' => 'Rantau Selamat'],

            // Jakarta Selatan (ID: 10)
            ['kabupaten_id' => 10, 'name' => 'Kebayoran Baru'],
            ['kabupaten_id' => 10, 'name' => 'Setiabudi'],
            ['kabupaten_id' => 10, 'name' => 'Mampang Prapatan'],
            ['kabupaten_id' => 10, 'name' => 'Tebet'],
            ['kabupaten_id' => 10, 'name' => 'Pasar Minggu'],
            ['kabupaten_id' => 10, 'name' => 'Kebayoran Lama'],
            ['kabupaten_id' => 10, 'name' => 'Cilandak'],
            ['kabupaten_id' => 10, 'name' => 'Jagakarsa'],
            ['kabupaten_id' => 10, 'name' => 'Pesanggrahan'],
            ['kabupaten_id' => 10, 'name' => 'Pancoran'],

            // Jakarta Pusat (ID: 11)
            ['kabupaten_id' => 11, 'name' => 'Menteng'],
            ['kabupaten_id' => 11, 'name' => 'Tanah Abang'],
            ['kabupaten_id' => 11, 'name' => 'Gambir'],
            ['kabupaten_id' => 11, 'name' => 'Cempaka Putih'],
            ['kabupaten_id' => 11, 'name' => 'Johar Baru'],
            ['kabupaten_id' => 11, 'name' => 'Kemayoran'],
            ['kabupaten_id' => 11, 'name' => 'Sawah Besar'],
            ['kabupaten_id' => 11, 'name' => 'Senen'],

            // Jakarta Barat (ID: 12)
            ['kabupaten_id' => 12, 'name' => 'Kebon Jeruk'],
            ['kabupaten_id' => 12, 'name' => 'Grogol Petamburan'],
            ['kabupaten_id' => 12, 'name' => 'Palmerah'],
            ['kabupaten_id' => 12, 'name' => 'Tambora'],
            ['kabupaten_id' => 12, 'name' => 'Taman Sari'],
            ['kabupaten_id' => 12, 'name' => 'Cengkareng'],
            ['kabupaten_id' => 12, 'name' => 'Kalideres'],
            ['kabupaten_id' => 12, 'name' => 'Kembangan'],

            // Jakarta Utara (ID: 13)
            ['kabupaten_id' => 13, 'name' => 'Penjaringan'],
            ['kabupaten_id' => 13, 'name' => 'Pademangan'],
            ['kabupaten_id' => 13, 'name' => 'Tanjung Priok'],
            ['kabupaten_id' => 13, 'name' => 'Koja'],
            ['kabupaten_id' => 13, 'name' => 'Kelapa Gading'],
            ['kabupaten_id' => 13, 'name' => 'Cilincing'],

            // Jakarta Timur (ID: 14)
            ['kabupaten_id' => 14, 'name' => 'Matraman'],
            ['kabupaten_id' => 14, 'name' => 'Pulo Gadung'],
            ['kabupaten_id' => 14, 'name' => 'Jatinegara'],
            ['kabupaten_id' => 14, 'name' => 'Kramat Jati'],
            ['kabupaten_id' => 14, 'name' => 'Pasar Rebo'],
            ['kabupaten_id' => 14, 'name' => 'Cakung'],
            ['kabupaten_id' => 14, 'name' => 'Duren Sawit'],
            ['kabupaten_id' => 14, 'name' => 'Makasar'],
            ['kabupaten_id' => 14, 'name' => 'Ciracas'],
            ['kabupaten_id' => 14, 'name' => 'Cipayung'],

            // Deli Serdang (ID: 15)
            ['kabupaten_id' => 15, 'name' => 'Lubuk Pakam'],
            ['kabupaten_id' => 15, 'name' => 'Pancur Batu'],
            ['kabupaten_id' => 15, 'name' => 'Sibolangit'],
            ['kabupaten_id' => 15, 'name' => 'STM Hilir'],
            ['kabupaten_id' => 15, 'name' => 'Sunggal'],
        ]);
    }
}
