@extends('layouts.index')

@section('content')
    <section class="container max-w-screen-lg mx-auto pt-40">
        <div class="flex items-center mx-5 lg:w-full lg:mx-auto md:w-auto  p-2 border border-gray-300 rounded-lg shadow-sm">
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

 
        <div class="flex justify-center my-10">
            <p class="text-[#fa6601] font-semibold text-center lg:text-left md:text-left">Lamar Pekerjaan Kamu ~ <span
                    class="font-normal block lg:inline md:inline text-zinc-600">Dengan Waktu
                    Dan Langkah Yang Tepat</span></p>
        </div>

        <div>
            <p class="font-semibold text-zinc-700 px-2 lg:px-0">KATEGORI PEKERJAAN POPULER</p>
            <div class="flex gap-3">

                <div class="px-2 lg:px-0 md:ml-5 grid grid-cols-2 lg:grid-cols-4 md:grid-cols-4 gap-2 mt-5 flex-1">
                    <div class="border border-gray-300 py-2 shadow-sm">
                        <p class="text-center text-zinc-700 font-bold">Teknologi</p>
                    </div>
                    <div class="border border-gray-300 py-2 shadow-sm">
                        <p class="text-center text-zinc-700 font-bold">Pelayanan</p>
                    </div>
                    <div class="border border-gray-300 py-2 shadow-sm">
                        <p class="text-center text-zinc-700 font-bold">Administrasi</p>
                    </div>
                    <div class="border border-gray-300 py-2 shadow-sm">
                        <p class="text-center text-zinc-700 font-bold">Pemasaran</p>
                    </div>
                    <div class="border border-gray-300 py-2 shadow-sm">
                        <p class="text-center text-zinc-700 font-bold">Pendidik</p>
                    </div>
                    <div class="border border-gray-300 py-2 shadow-sm">
                        <p class="text-center text-zinc-700 font-bold">Customer Service</p>
                    </div>
                    <div class="border border-gray-300 py-2 shadow-sm">
                        <p class="text-center text-zinc-700 font-bold">Keuangan</p>
                    </div>
                    <div class="border border-gray-300 py-2 shadow-sm">
                        <p class="text-center text-zinc-700 font-bold">Kasir</p>
                    </div>
                    <div class="border border-gray-300 py-2 shadow-sm">
                        <p class="text-center text-zinc-700 font-bold">Admin</p>
                    </div>
                    <div class="border border-gray-300 py-2 shadow-sm">
                        <p class="text-center text-zinc-700 font-bold">Programmer</p>
                    </div>
                    <div class="border border-gray-300 py-2 shadow-sm">
                        <p class="text-center text-zinc-700 font-bold">Marketing</p>
                    </div>
                    <div class="border border-gray-300 py-2 shadow-sm">
                        <p class="text-center text-zinc-700 font-bold">Multimedia</p>
                    </div>              
                </div>
                <div class="mt-5 flex flex-col pr-2 lg:pr-0 md:mr-5 gap-2 w-32">
                    <div
                        class="border border-gray-300 border-l-4 border-l-red-600 py-2 flex items-center justify-center gap-1 shadow-sm text-red-600 font-semibold">
                        <i class="ph ph-fire text-lg"></i>
                        Full Time
                    </div>
                    <div
                        class="border border-gray-300 border-l-4 border-l-sky-500 py-2 flex items-center justify-center gap-1 shadow-sm text-sky-500 font-semibold">
                        <i class="ph ph-globe text-lg"></i>
                        WFO/WFH
                    </div>
                    <div
                        class="border border-gray-300 border-l-4 border-l-orange-600 py-2 flex items-center justify-center gap-1 shadow-sm text-orange-600 font-semibold">
                        <i class="ph ph-graduation-cap text-lg"></i>
                        Graduate
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="mt-10 flex justify-center gap-10  items-center font-semibold border-b">
        <button class="border-b-2 border-[#fa6601] text-[13px] lg:text-[16px] md:text-[16px] cursor-pointer">UMPAN
            LOWONGAN</button>
        <button class="cursor-pointer text-[13px] lg:text-[16px] md:text-[16px]">PENCAPAIAN BARU BARU INI</button>
    </div>

    <section class="mx-2 lg:mx-0 md:mx-0 px-0 lg:px-20 md:px-20">
        <p class="my-10 font-semibold text-gray-500 text-center lg:text-left md:text-left">
            Lowongan berdasarkan pada aktivitas anda di areakerja
        </p>

        <div class="border rounded-lg shadow bg-white">
            <div class="flex justify-between items-start p-6">
                <div>
                    <h1 class="font-bold text-xl">{{ $Data->nama }}</h1>
                    <p class="text-gray-500">{{ $Data->perusahaan->nama_perusahaan }} | {{ $Data->alamat }}</p>
                    <p class="bg-gray-200 w-fit my-3 px-3 py-1 text-gray-700 font-semibold rounded-md">
                        Rp. {{ $Data->gaji_awal }} – Rp. {{ $Data->gaji_akhir }} perbulan
                    </p>
                    <div class="flex items-center gap-10">
                        <button class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-md font-semibold">
                            Lamar Cepat
                        </button>
                        <i class="ph ph-bookmark-simple text-4xl text-gray-800"></i>
                    </div>
                </div>

                {{-- <div class="relative text-3xl cursor-pointer">
                    <i class="ph ph-dots-three-vertical">pp</i>
                    <div class="absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg hidden group-hover:block">
                        <a href="#" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100"><i
                                class="ph ph-linkedin-logo"></i> Linkedin</a>
                        <a href="#" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100"><i
                                class="ph ph-envelope"></i> Gmail</a>
                        <a href="#" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100"><i
                                class="ph ph-globe"></i> Website</a>
                        <a href="#" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100"><i
                                class="ph ph-whatsapp-logo"></i> Whatsapp</a>
                    </div>
                </div> --}}

            </div>

            <div class="px-6 pb-6">
                <h2 class="font-semibold text-lg mb-3">Detail Lowongan</h2>

                <div class="flex items-center gap-3 mb-3 border-b pb-5">
                    <i class="ph ph-briefcase text-gray-500 text-lg"></i>
                    <span class="bg-gray-200 px-3 py-1 rounded-md text-sm font-semibold">{{ $Data->jenis }}</span>
                </div>

                <div class="flex items-center gap-3 mb-5 border-b pb-5">
                    <i class="ph ph-map-pin text-gray-500 text-lg"></i>
                    <span>{{ $Data->alamat }}</span>
                </div>

                <div class="mb-6 border-b pb-5">
                    <h3 class="font-semibold text-lg mb-2">Deskripsi Lowongan</h3>
                    <p class="font-bold">Requirements</p>
                    <ul class="list-disc list-inside space-y-1 text-gray-600">
                        <li>{{ $Data->syarat_pekerjaan }}</li>
                    </ul>
                </div>

                <div class="">
                    <h3 class="font-semibold text-lg mb-2">Responsibilities</h3>
                    <ul class="list-disc list-inside space-y-1 text-gray-600">
                        <li>{{ $Data->tanggung_jawab }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
