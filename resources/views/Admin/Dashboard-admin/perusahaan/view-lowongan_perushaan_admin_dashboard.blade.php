@extends('Admin.Dashboard-admin.layouts.index')

@section('admin-content')
    <div class="mx-auto p-6">

        <div class="bg-white border border-gray-300 rounded-xl shadow-sm overflow-hidden">

            <div class="flex items-center gap-3 py-6 border-b rounded-b-3xl shadow-md">
                <img src="{{ asset('Icon/seveninc.png') }}" alt="Logo" class="w-40 h-40 object-contain">
                <div class="w-full lg:w-[70%] text-left lg:text-center">
                    <h1 class="text-lg font-bold">Front-End Developer</h1>
                </div>
            </div>

            <div class="p-6 space-y-6 text-sm text-gray-700">

                <div>
                    <h2 class="font-bold text-black">Detail Lowongan</h2>
                </div>

                <div>
                    <h2 class="font-bold text-black">Gaji</h2>
                    <p>Rp.xxxx - Rp.xxxxx Perbulan</p>
                </div>

                <div>
                    <h2 class="font-bold text-black">Jenis Lowongan</h2>
                    <p>Fulltime</p>
                </div>

                <div>
                    <h2 class="font-bold text-black">Deskripsi Pekerjaan</h2>
                    <ul class="list-disc list-inside mt-2 space-y-1">
                        <li>Lorem ipsum dolor sit amet consectetur.</li>
                        <li>Lorem ipsum dolor sit amet consectetur.</li>
                        <li>Lorem ipsum dolor sit amet consectetur.</li>
                        <li>Lorem ipsum dolor sit amet consectetur.</li>
                    </ul>
                </div>

                <div>
                    <h2 class="font-bold text-black">Syarat Pekerjaan</h2>
                    <ul class="list-disc list-inside mt-2 space-y-1">
                        <li>Lorem ipsum dolor sit amet consectetur.</li>
                        <li>Lorem ipsum dolor sit amet consectetur.</li>
                        <li>Lorem ipsum dolor sit amet consectetur.</li>
                        <li>Lorem ipsum dolor sit amet consectetur.</li>
                    </ul>
                </div>
                <div>
                    <h2 class="font-bold text-black">Aktivitas Lowongan</h2>
                    <p>Lowogan Dipasang 2 Hari Lalu </p>
                </div>
            </div>

        </div>
        <div class="flex gap-3 items-center flex-col p-4 bg-gray-50">
            <button class="px-6 py-2 bg-gray-700 text-white text-sm rounded-md shadow hover:bg-gray-800">
                Jadikan Rekomendasi
            </button>
            <button class="px-16 py-2 bg-gray-300 text-black text-sm rounded-md shadow hover:bg-gray-400">
                Kembali
            </button>
        </div>
    </div>
@endsection
