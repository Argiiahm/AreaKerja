@extends('layouts.index')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <!-- Header -->
    <div class="border border-orange-400 rounded-md p-4 flex items-center justify-between">
        <div class="flex items-center gap-4">
            <!-- Foto Profil -->
            <div class="relative">
                <img src="{{ asset('image/profile.png') }}" alt="Profile" class="w-20 h-20 rounded-full object-cover border" />
                <button class="absolute bottom-1 right-1 bg-orange-500 text-white text-xs p-1 rounded-full">✎</button>
            </div>
            <!-- Dropdown -->
            <select class="border border-orange-400 rounded-md text-sm px-2 py-1 text-gray-600">
                <option>Status</option>
            </select>
        </div>

        <div class="flex items-center gap-3">
            <button class="flex items-center gap-2 border border-orange-400 text-orange-500 px-4 py-1.5 rounded-md text-sm">
                ⬆ Upload
            </button>
            <button class="flex items-center gap-2 border border-gray-400 text-gray-500 px-4 py-1.5 rounded-md text-sm">
                ✖ Remove
            </button>
            <button class="bg-orange-500 text-white px-5 py-2 rounded-md text-sm font-semibold">Unduh CV</button>
            <button class="bg-green-500 text-white px-5 py-2 rounded-md text-sm font-semibold">Simpan</button>
        </div>
    </div>

    <!-- Grid Form -->
    <div class="grid grid-cols-2 gap-10 mt-8">
        <!-- Kiri -->
        <div>
            <h2 class="text-lg font-semibold mb-2">Data Diri</h2>
            <hr class="border-t-2 border-orange-400 mb-5">

            <!-- Nama -->
            <label class="block text-sm font-medium mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
            <input type="text" value="Jason Statham" class="w-full border rounded-md px-3 py-2 mb-4">

            <!-- Gender -->
            <label class="block text-sm font-medium mb-1">Gender <span class="text-red-500">*</span></label>
            <div class="flex gap-6 mb-4">
                <label class="flex items-center gap-2 text-sm"><input type="radio" name="gender" checked class="accent-orange-500"> Laki - Laki</label>
                <label class="flex items-center gap-2 text-sm"><input type="radio" name="gender" class="accent-orange-500"> Perempuan</label>
            </div>

            <!-- Tanggal Lahir -->
            <label class="block text-sm font-medium mb-1">Tanggal Lahir <span class="text-red-500">*</span></label>
            <input type="text" value="05/04/2001" class="w-full border rounded-md px-3 py-2 mb-4">

            <!-- No HP -->
            <label class="block text-sm font-medium mb-1">No.Tlp <span class="text-red-500">*</span></label>
            <input type="text" value="0856-9086-6740" class="w-full border rounded-md px-3 py-2 mb-4">

            <!-- Deskripsi -->
            <label class="block text-sm font-medium mb-1">Deskripsi Diri <span class="text-red-500">*</span></label>
            <textarea rows="4" class="w-full border rounded-md px-3 py-2 mb-4">Saya adalah fresh graduate dengan pengalaman magang di beberapa perusahaan menengah...</textarea>

            <!-- Alamat -->
            <label class="block text-sm font-medium mb-1">Alamat <span class="text-red-500">*</span></label>
            <button class="w-full bg-orange-500 text-white py-2 rounded-md">Alamat</button>
        </div>

        <!-- Kanan -->
        <div>
            <h2 class="text-lg font-semibold mb-2">Informasi Akun</h2>
            <hr class="border-t-2 border-orange-400 mb-5">

            <label class="block text-sm font-medium mb-1">ID Pengguna</label>
            <input type="text" value="7403675000" disabled class="w-full border rounded-md px-3 py-2 mb-4 bg-gray-100">

            <label class="block text-sm font-medium mb-1">Nama Pengguna <span class="text-red-500">*</span></label>
            <input type="text" value="Jason.statham" class="w-full border rounded-md px-3 py-2 mb-4">

            <label class="block text-sm font-medium mb-1">Email <span class="text-red-500">*</span></label>
            <div class="relative mb-4">
                <input type="email" value="jasonstatham@gmail.com" class="w-full border rounded-md px-3 py-2 pr-8">
                <span class="absolute right-2 top-2 text-orange-500 cursor-pointer">✎</span>
            </div>

            <label class="block text-sm font-medium mb-1">Kata Sandi <span class="text-red-500">*</span></label>
            <div class="relative mb-6">
                <input type="password" value="*******" class="w-full border rounded-md px-3 py-2 pr-8">
                <span class="absolute right-2 top-2 text-orange-500 cursor-pointer">✎</span>
            </div>

            <h2 class="text-lg font-semibold mb-2">Ekspektasi Gaji</h2>
            <hr class="border-t-2 border-orange-400 mb-5">

            <div class="flex items-center gap-3 mb-4">
                <input type="text" value="Rp. 2.000.000" class="w-1/3 border rounded-md px-3 py-2 text-center">
                <span>—</span>
                <input type="text" value="Rp. 7.500.000" class="w-1/3 border rounded-md px-3 py-2 text-center">
            </div>

            <!-- Slider -->
            <input type="range" min="2000000" max="7500000" value="2000000" class="w-full accent-orange-500 mb-6">

            <!-- Note -->
            <ul class="text-sm text-orange-600 space-y-3">
                <li class="flex items-start gap-2"><span class="text-orange-500 text-lg">✔</span> Setelah menjadi kandidat Areakerja, CV anda akan otomatis terunggah ke etalase perusahaan</li>
                <li class="flex items-start gap-2"><span class="text-orange-500 text-lg">✔</span> Range gaji akan tertampil pada profil anda di etalase perusahaan</li>
            </ul>
        </div>
    </div>

    <!-- Tambahan Bagian Abu-Abu -->
    <div class="mt-10 space-y-8">
        <!-- Pendidikan -->
        <div>
            <h2 class="text-lg font-semibold mb-2">Pendidikan <span class="text-red-500">*</span></h2>
            <div class="bg-gray-100 p-4 rounded-md relative">
                <textarea class="w-full bg-transparent outline-none resize-none text-sm">Universitas AMIKOM Yogyakarta (2021 – 2025)
Ilmu Komunikasi

SMA Negeri 1 Yogyakarta (2018 – 2021)
Ilmu Pengetahuan Alam (IPA)

SMP Negeri 6 Yogyakarta (2015 – 2018)</textarea>
                <button class="absolute top-2 right-2 text-orange-500">✎</button>
            </div>
        </div>

        <!-- Organisasi -->
        <div>
            <h2 class="text-lg font-semibold mb-2">Organisasi</h2>
            <div class="bg-gray-100 p-4 rounded-md relative">
                <textarea class="w-full bg-transparent outline-none resize-none text-sm">Departemen Olahraga – OSIS (2016 – 2017)
Lorem ipsum dolor sit amet consectetur...

Divisi Teknik – Radio (2016 – 2017)
Lorem ipsum dolor sit amet consectetur...</textarea>
                <button class="absolute top-2 right-2 text-orange-500">✎</button>
            </div>
        </div>

        <!-- Pengalaman Kerja -->
        <div>
            <h2 class="text-lg font-semibold mb-2">Pengalaman Kerja</h2>
            <div class="bg-gray-100 p-4 rounded-md relative">
                <textarea class="w-full bg-transparent outline-none resize-none text-sm">UI UX Designer – Mantra Creative (2022 – 2023)
Lorem ipsum dolor sit amet consectetur...

Lightingman – Parainsomnia Studio (2023 – 2024)
Lorem ipsum dolor sit amet consectetur...</textarea>
                <button class="absolute top-2 right-2 text-orange-500">✎</button>
            </div>
        </div>

        <!-- Skill -->
        <div>
            <h2 class="text-lg font-semibold mb-2">Skill <span class="text-red-500">*</span></h2>
            <div class="bg-gray-100 p-4 rounded-md relative">
                <textarea class="w-full bg-transparent outline-none resize-none text-sm">Photographer - Intermediate
Lightingman - Intermediate
UI UX Designer - Intermediate</textarea>
                <button class="absolute top-2 right-2 text-orange-500">✎</button>
            </div>
        </div>
    </div>
</div>
@endsection
