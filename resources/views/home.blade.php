@extends('layouts.index')

@section('content')
    {{-- Search landing page --}}
    <div
        class="flex items-center mx-5 lg:w-full lg:mx-auto md:w-full md:mx-auto p-2 border border-gray-300 rounded-lg shadow-sm">
        <div class="flex items-center flex-1 px-2">
            <i class="ph ph-magnifying-glass text-zinc-900 text-lg mr-2"></i>
            <input type="text" placeholder="Posisi lowongan, kata kunci, ..."
                class="w-full outline-none border-none placeholder-gray-500 text-gray-700" />
        </div>

        <span class="w-px h-6 bg-gray-300"></span>

        <div class="flex items-center flex-1 px-2">
            <i class="ph ph-map-pin text-zinc-900 text-lg mr-2"></i>
            <input type="text" placeholder="Kota, provinsi, kode pos..."
                class="w-full outline-none placeholder-gray-500 border-none text-gray-700" />
        </div>

        <button class="ml-2 bg-[#fa6601] cursor-pointer text-white font-medium px-4 py-2 rounded-lg">
            <div class="hidden lg:block md:block">
                Cari Lowongan Kerja
            </div>
            <div class="block lg:hidden md:hidden">
                Cari
            </div>
        </button>
    </div>

    {{-- End Searching --}}

    <div class="flex justify-center my-10">
        <p class="text-[#fa6601] font-semibold text-center lg:text-left md:text-left">Lamar Pekerjaan Kamu ~ <span
                class="font-normal block lg:inline md:inline text-zinc-600">Dengan Waktu
                Dan Langkah Yang Tepat</span></p>
    </div>

    {{-- Kategori --}}
    <div>
        <p class="font-semibold text-zinc-700 px-2 lg:px-0 md:px-0">KATEGORI PEKERJAAN POPULER</p>
        <div class="flex gap-3">

            <div class="px-2 lg:px-0 md:px-0 grid grid-cols-2 lg:grid-cols-4 md:grid-cols-4 gap-2 mt-5 flex-1">
                <div class="border border-gray-300 py-2 shadow-sm">
                    <p class="text-center text-zinc-700 font-semibold">Teknologi</p>
                </div>
                <div class="border border-gray-300 py-2 shadow-sm">
                    <p class="text-center text-zinc-700 font-semibold">Pelayanan</p>
                </div>
                <div class="border border-gray-300 py-2 shadow-sm">
                    <p class="text-center text-zinc-700 font-semibold">Administrasi</p>
                </div>
                <div class="border border-gray-300 py-2 shadow-sm">
                    <p class="text-center text-zinc-700 font-semibold">Pemasaran</p>
                </div>
                <div class="border border-gray-300 py-2 shadow-sm">
                    <p class="text-center text-zinc-700 font-semibold">Pendidik</p>
                </div>
                <div class="border border-gray-300 py-2 shadow-sm">
                    <p class="text-center text-zinc-700 font-semibold">Customer Service</p>
                </div>
                <div class="border border-gray-300 py-2 shadow-sm">
                    <p class="text-center text-zinc-700 font-semibold">Keuangan</p>
                </div>
                <div class="border border-gray-300 py-2 shadow-sm">
                    <p class="text-center text-zinc-700 font-semibold">Kasir</p>
                </div>
                <div class="border border-gray-300 py-2 shadow-sm">
                    <p class="text-center text-zinc-700 font-semibold">Admin</p>
                </div>
                <div class="border border-gray-300 py-2 shadow-sm">
                    <p class="text-center text-zinc-700 font-semibold">Programmer</p>
                </div>
                <div class="border border-gray-300 py-2 shadow-sm">
                    <p class="text-center text-zinc-700 font-semibold">Marketing</p>
                </div>
                <div class="border border-gray-300 py-2 shadow-sm">
                    <p class="text-center text-zinc-700 font-semibold">Multimedia</p>
                </div>
            </div>
            <div class="mt-5 flex flex-col pr-2 lg:pr-0 md:pr-0 gap-2 w-32">
                <div class="border border-gray-300 py-2 flex items-center justify-center gap-1 shadow-sm text-red-600 font-semibold">
                    <i class="ph ph-fire text-lg"></i>
                    Full Time
                </div>
                <div class="border border-gray-300 py-2 flex items-center justify-center gap-1 shadow-sm text-sky-500 font-semibold">
                    <i class="ph ph-globe text-lg"></i>
                    WFO/WFH
                </div>
                <div
                    class="border border-gray-300 py-2 flex items-center justify-center gap-1 shadow-sm text-orange-600 font-semibold">
                    <i class="ph ph-graduation-cap text-lg"></i>
                    Graduate
                </div>
            </div>
        </div>
    </div>
    {{-- End Kategori --}}

    </div>
@endsection
