@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="mx-auto mt-10">
        <div class="p-6">
            <div class="flex items-center justify-between border-b pb-4 mb-6 relative">
                <div class="w-24 h-24 flex items-center justify-center rounded-md overflow-hidden">
                    <img src="{{ asset('Icon/seveninc.png') }}" alt="Logo" class="object-contain">
                </div>
                <h2 class="text-lg font-semibold absolute left-1/2 transform -translate-x-1/2">
                    Front-End Developer
                </h2>
            </div>


            <div class="space-y-5 text-sm text-gray-800 leading-relaxed">
                <div class="flex justify-between items-center">
                    <h3 class="font-semibold">Detail Lowongan</h3>
                    <div class="flex items-center gap-8">
                        <button class="text-red-500 flex items-center gap-1">
                            <i class="ph ph-trash"></i> Report Lowongan
                        </button>
                        <button class="text-orange-500 flex items-center gap-1">
                            <i class="ph ph-pencil"></i> Edit Lowongan
                        </button>
                    </div>
                </div>

                <div>
                    <h4 class="font-semibold">Gaji</h4>
                    <p>Rp.2.500.000 – Rp.4.500.000 per bulan</p>
                </div>

                <div>
                    <h4 class="font-semibold">Jenis Lowongan</h4>
                    <p>Full Time</p>
                </div>

                <div>
                    <h4 class="font-semibold">Deskripsi Pekerjaan</h4>
                    <ul class="list-disc list-inside">
                        <li>Good personality, good attitude</li>
                        <li>Memiliki pengalaman web Programming</li>
                        <li>Mampu mendesain dfd dan erd</li>
                        <li>Mampu mengimplementasikan design ui/ux</li>
                        <li>Menguasai HTML5, CSS3 dan JSX</li>
                        <li>Memahami GIT</li>
                        <li>Work From Office, Yogyakarta</li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-semibold">Syarat Pekerjaan</h4>
                    <ul class="list-disc list-inside">
                        <li>Minimal pendidikan SMA/SMK</li>
                        <li>Laki-laki/Perempuan</li>
                        <li>Umur 18-30</li>
                        <li>Batas lamaran hingga dd/mm/yyyy</li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-semibold">Aktivitas Lowongan</h4>
                    <p>Lowongan dipasang 2 hari yang lalu</p>
                </div>
            </div>

            <div class="flex flex-col items-center gap-3 mt-8">
                <button class="bg-orange-500 text-white py-2 px-10 rounded-md w-fit">Jadikan Rekomendasi</button>
                <button class="bg-orange-500 text-white py-2 px-28 rounded-md">Kembali</button>
            </div>
        </div>
    </div>
@endsection
