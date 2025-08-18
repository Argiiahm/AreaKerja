@extends('layouts.index')

@section('content')
    <section class="relative w-full h-screen pt-24">
        <div class="absolute inset-0">
            <img src="https://png.pngtree.com/background/20240507/original/pngtree-digital-marketing-website-displayed-on-rendered-office-desktop-picture-image_8837781.jpg"
                alt="Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-60"></div>
        </div>
        <div class="relative z-10 flex items-center justify-start h-full px-10 lg:px-20 md:px-20">
            <div class="max-w-lg">
                <h1 class="text-6xl font-bold text-white mb-4">Daftar Kandidat</h1>
                <p class="text-white text-lg mb-6">
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
    <section class="bg-orange-500 text-white">
        <div class="max-w-6xl mx-auto px-6 py-16 flex flex-col md:flex-row items-center gap-8">
            <div class="md:w-1/2">
                <h2 class="text-3xl font-bold mb-6">
                    Benefit Menjadi Kandidat <br> Areakerja.com
                </h2>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <span class="text-xl mr-2"><i class="ph ph-check"></i></span>
                        Menjadi prioritas pilihan dari perusahaan mitra Areakerja
                    </li>
                    <li class="flex items-start">
                        <span class="text-xl mr-2"><i class="ph ph-check"></i></span>
                        Areakerja memiliki banyak mitra perusahaan yang sedang membuka lowongan
                    </li>
                    <li class="flex items-start">
                        <span class="text-xl mr-2"><i class="ph ph-check"></i></span>
                        Areakerja merupakan perusahaan terpercaya berbadan hukum
                    </li>
                    <li class="flex items-start">
                        <span class="text-xl mr-2"><i class="ph ph-check"></i></span>
                        Server Terbaik
                    </li>
                </ul>
            </div>
            <div class="md:w-1/2 flex justify-center">
                <img src="{{ asset('image/1.png') }}" alt="Kandidat" class="">
            </div>
        </div>
    </section>

    <div class="max-w-4xl mx-auto bg-white p-6 mt-10">
        <h2 class="text-2xl font-bold text-center mb-8">Cara Daftar Kandidat</h2>

        <div class="flex items-center border-t py-4 relative">
            <div class="w-32 bg-orange-500 h-32 rounded-lg overflow-hidden mr-6">
                <img src="{{ asset('image/1.png') }}" alt="" class="object-cover w-full h-full">
            </div>
            <div
                class="absolute left-23 lg:left-28 md:left-28 top-12 w-8 h-8 bg-orange-500 text-white flex items-center justify-center rounded-full font-bold">
                →
            </div>
            <div class="border-b py-4">
                <p class="text-gray-700 text-base">Klik Daftar untuk registrasi kandidat</p>
            </div>
        </div>
        <div class="">
            <div class="border-b py-4">
                <p class="text-gray-700 text-base">Lengkapi data yang diperlukan pada proses registrasi</p>
            </div>

            <div class="border-b py-4">
                <p class="text-gray-700 text-base">Tunggu pemberitahuan setelah melakukan registrasi</p>
            </div>

            <div class="border-b py-4">
                <p class="text-gray-700 text-base">Ikuti pelatihan sesuai prosedur Areakerja.com</p>
            </div>
        </div>
    </div>
@endsection
