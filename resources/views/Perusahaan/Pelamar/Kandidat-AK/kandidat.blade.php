@extends('layouts.index')

@section('content')
    <section class="relative w-full h-[70vh] lg:h-screen pt-24">
        <div class="absolute inset-0">
            <img src="https://png.pngtree.com/background/20240507/original/pngtree-digital-marketing-website-displayed-on-rendered-office-desktop-picture-image_8837781.jpg"
                alt="Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-60"></div>
        </div>
        <div class="relative z-10 flex items-center justify-start h-full px-6 lg:px-20">
            <div class="max-w-lg">
                <h1 class="text-4xl lg:text-6xl font-bold text-white mb-4">Daftar Kandidat</h1>
                <p class="text-white text-base lg:text-lg mb-6 leading-relaxed">
                    Ikuti pelatihan terakreditasi Areakerja.com<br>
                    dan dapatkan pekerjaan impian anda!
                </p>
                <a href="#"
                    class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-2 rounded-md shadow-md">
                    Daftar
                </a>
            </div>
        </div>
    </section>

    <div
        class="bg-white shadow-md transform -translate-y-3 rounded-lg flex flex-col lg:flex-row items-center justify-between gap-4 px-4 py-4 mx-4 lg:mx-52">

        <div class="flex flex-col lg:flex-row items-center gap-4 lg:gap-8 w-full lg:w-auto">
            <div class="flex items-center border-b lg:border-r lg:border-b-0 w-full lg:w-auto pb-2 lg:pb-0 lg:pr-4">
                <select class="focus:outline-none text-sm w-full lg:w-40">
                    <option>Skill</option>
                    <option>Beginner</option>
                    <option>Expert</option>
                </select>
            </div>

            <div class="flex items-center border-b lg:border-r lg:border-b-0 w-full lg:w-auto pb-2 lg:pb-0 lg:pr-4">
                <select class="focus:outline-none text-sm w-full lg:w-40">
                    <option>Umur</option>
                    <option>18-25</option>
                    <option>26-35</option>
                </select>
            </div>

            <div class="flex items-center w-full lg:w-auto">
                <select class="focus:outline-none text-sm w-full lg:w-40">
                    <option>Gender</option>
                    <option>Laki-laki</option>
                    <option>Perempuan</option>
                </select>
            </div>
        </div>

        <button class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg w-full lg:w-auto">
            Cari Kandidat
        </button>
    </div>

    <div class="flex justify-end">

        <div class="md:col-span-3 bg-white shadow rounded-lg p-6 flex flex-col items-center justify-center">
                <div class="flex items-center w-full ">
                    <p class="text-3xl font-bold text-orange-500">80</p>
                    <img src="{{ asset('Icon/coin perusahaan.png') }}" alt="" class="px-3 py-2"> 
                </div>
                <a href="#"
                    class="mt-3 inline-block bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg shadow">
                    Top Up Koin
                </a>
        </div>
    </div>
    <div class="flex flex-col lg:flex-row justify-center items-start gap-6 mt-8 px-4 lg:px-20">

        <div class="flex-1 bg-white shadow rounded-lg overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-orange-500 text-white">
                    <tr>
                        <th class="px-4 py-2 text-left">Nama</th>
                        <th class="px-4 py-2">Skill</th>
                        <th class="px-4 py-2">Umur</th>
                        <th class="px-4 py-2">Pengalaman</th>
                        <th class="px-4 py-2">Gender</th>
                        <th class="px-4 py-2">CV</th>
                        <th class="px-4 py-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="px-4 py-2">Asep</td>
                        <td class="px-4 py-2 text-center">Programmer</td>
                        <td class="px-4 py-2 text-center">30 Tahun</td>
                        <td class="px-4 py-2 text-center">20 Thn</td>
                        <td class="px-4 py-2 text-center">Laki-laki</td>
                        <td class="px-4 py-2 text-center">
                            <i class="ph ph-arrow-line-down text-2xl text-orange-500"></i>
                        </td>
                        <td class="px-4 py-2 text-center">
                            <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">Pilih</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
@endsection
