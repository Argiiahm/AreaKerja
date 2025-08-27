@extends('layouts.index')

@section('content')
    <div class="hidden">
        <div class="max-w-6xl mx-auto px-6 py-6 mt-24">
            <p class="text-sm text-orange-600 font-medium">Dashboard</p>
            <h1 class="text-2xl font-bold leading-snug">
                Selamat Datang Di Area Kerja <br> Seven Inc
            </h1>
        </div>
        <div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 px-6 lg:px-40">
                <div class="col-span-2 bg-orange-500 rounded-xl p-6">
                    <h2 class="text-white font-semibold text-lg mb-4">Lowongan Saya</h2>

                    <div
                        class="bg-white flex flex-col md:flex-row justify-between items-center rounded-md px-4 py-3 mb-4 gap-3">
                        <span class="font-semibold text-black text-center md:text-left">Lowongan Belum Terpasang</span>
                        <button class="text-orange-500 border border-orange-500 px-4 py-2 rounded-md text-sm">
                            Tambah Lowongan
                        </button>
                    </div>

                    <div class="bg-white text-center rounded-md px-4 py-4 w-full md:w-fit mx-auto float-left">
                        <div class="flex items-center justify-center gap-3 ">
                            <span class="text-orange-500 font-bold text-4xl">0</span>
                            <img src="{{ asset('Icon/coin perusahaan.png') }}" alt="coin" class="w-10 h-8">
                        </div>
                        <button
                            class="text-green-600 text-sm flex w-full  text-center items-center justify-center gap-1 mt-2">
                            Top Up Koin <span class="bg-green-500 text-white rounded-full px-1 text-center">+</span>
                        </button>
                    </div>
                </div>

                <div class="bg-orange-500 rounded-xl p-6 ">
                    <h2 class="text-white font-semibold text-lg mb-4">Kandidat Saya</h2>
                    <button class="w-full border border-white text-white font-semibold py-2 rounded-md mb-3">
                        Lihat Kandidat
                    </button>
                    <button class="w-full bg-white text-black font-semibold py-2 rounded-md">
                        Cari Kandidat
                    </button>
                </div>
            </div>

            <div class="max-w-6xl mx-auto px-6 py-12">
                <h2 class="text-center text-2xl font-bold text-orange-600 mb-12">
                    Tentang Area Kerja
                </h2>

                <div class="block lg:grid md:grid-cols-2  items-start">
                    <img src="{{ asset('Icon/Illustration.png') }}" alt="Ilustrasi" class="w-[320px]">
                    <div class=" block md:flex lg:flex gap-3 items-center">
                        <div class="bg-orange-500 text-white p-5 rounded-xl shadow-md mb-6">
                            <div class="flex gap-2">
                                <div>
                                    <img src="{{ asset('image/logo_area_kerja_putih.png') }}" alt=""
                                        class="w-[80px]">
                                </div>
                                <div>
                                    <span class="text-2xl font-bold">01</span>
                                    <h3 class="font-bold text-base mb-2">Mencari Lowongan</h3>
                                </div>
                            </div>
                            <p class="text-sm leading-relaxed">
                                Area Kerja menyediakan platform bagi para pencari lowongan kerja sesuai keahlian.
                            </p>
                        </div>
                        <di v class="flex flex-col gap-6">
                            <div class="border border-orange-500 p-5 rounded-xl shadow-md flex flex-col justify-between">
                                <div class="flex gap-2">
                                    <div>
                                        <img src="{{ asset('image/logo-areakerja.png') }}" alt="" class="w-[80px]">
                                    </div>
                                    <div>
                                        <span class="text-2xl text-orange-600 font-bold">02</span>
                                        <h3 class="font-bold text-orange-600 text-base mb-2">Lowongan Terbaru</h3>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-600 leading-relaxed">
                                    Area Kerja dapat menerima lowongan lowongan terbaru untuk mencakup berbagai macam bidang
                                    keahlian </p>
                            </div>
                            <div class="border border-orange-500 p-5 rounded-xl shadow-md flex flex-col justify-between">
                                <div class="flex gap-2">
                                    <div>
                                        <img src="{{ asset('image/logo-areakerja.png') }}" alt="" class="w-[80px]">
                                    </div>
                                    <div>
                                        <span class="text-2xl text-orange-600 font-bold">03</span>
                                        <h3 class="font-bold text-orange-600 text-base mb-2">Pasti Cocok</h3>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-600 leading-relaxed">
                                    Pelamar merupakan orang yang sudah siap kerja secara mental dan keahlian berkat
                                    pelatihan
                                    sebelumnya. </p>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-6 py-6 mt-24">
        <p class="text-sm text-orange-600 font-medium">Dashboard</p>
        <h1 class="text-2xl font-bold leading-snug">
            Selamat Datang Di Area Kerja <br> Seven Inc
        </h1>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6 mx-4 lg:mx-32 items-start">
        <div class="col-span-2 bg-orange-500 rounded-xl p-6">
            <h2 class="text-white font-semibold text-lg mb-4">Lowongan Saya</h2>

            <div class="bg-white rounded-xl p-4 flex items-center justify-between mb-4">
                <div class="flex items-start space-x-4">
                    <img src="{{ asset('Icon/seveninc.png') }}" alt="Logo" class="">
                    <div>
                        <p class="text-gray-800 font-semibold">Seven Inc</p>
                        <p class="text-black font-bold">UI UX Designer – WFO</p>
                        <p class="text-sm text-gray-500">Yogyakarta</p>
                        <p class="text-sm bg-gray-100 inline-block mt-1 px-2 py-0.5 rounded">
                            Rp. 4.500.000 - Rp. 7.000.000 per bulan
                        </p>
                    </div>
                </div>
                <div class="flex items-center space-x-3">
                    <span class="px-3 py-1 border rounded-lg text-gray-700">Silver</span>
                    <button class="bg-orange-500 text-white px-4 py-1 rounded-lg hover:bg-orange-600 transition">
                        Lihat Pelamar
                    </button>
                </div>
            </div>

            <div class="flex justify-center mt-6">
                <button
                    class="bg-white text-orange-600 font-semibold px-6 py-2 rounded-lg shadow hover:bg-gray-100 transition">
                    Cari Kandidat
                </button>
            </div>
        </div>

        <div class="bg-orange-500 rounded-xl p-6 flex flex-col justify-center h-fit">
            <h2 class="text-white font-semibold text-lg mb-6">Kandidat Saya</h2>
            <button
                class="bg-orange-500 text-white border-2 border-white font-semibold px-6 py-2 rounded-lg mb-3 hover:bg-orange-600 transition">
                Lihat Kandidat
            </button>
            <button class="bg-white text-black font-semibold px-6 py-2 rounded-lg shadow hover:bg-gray-100 transition">
                Cari Kandidat
            </button>
        </div>
    </div>
@endsection
