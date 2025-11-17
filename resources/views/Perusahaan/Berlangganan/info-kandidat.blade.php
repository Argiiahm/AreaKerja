@extends('layouts.index')
@section('content')
    <div class="mt-24">
        <section class="relative bg-gray-900 text-white">
            <div class="absolute inset-0">
                <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4" alt="Background"
                    class="w-full h-full object-cover opacity-70">
            </div>

            <div class="relative max-w-5xl mx-auto px-6 py-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Request Data</h2>
                <p class="text-gray-200 max-w-2xl">
                    Halaman ini dibuat untuk membantu perusahaan dalam proses perekrutan dengan menyediakan akses ke daftar
                    track record pekerja yang pernah bermasalah.
                </p>
            </div>
        </section>

        <section class="bg-white py-12 px-6">
            <div class="max-w-5xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

                <div class="bg-orange-500 text-white rounded-lg p-6 flex flex-col items-center text-center shadow-md">
                    <div class="text-3xl mb-4"><img src="{{ asset('Icon/check.png') }}" alt=""></div>
                    <h3 class="font-semibold mb-2">List Pekerja Bermasalah</h3>
                    <a href="/dashboard/perusahaan/berlangganan/kandidat/info/laporan"
                        class="bg-white text-orange-500 px-4 py-2 rounded-md text-sm font-medium hover:bg-gray-100">
                        Lebih Detail
                    </a>
                </div>

                <div class="bg-orange-500 text-white rounded-lg p-6 flex flex-col items-center text-center shadow-md">
                    <div class="text-4xl mb-4"><img src="{{ asset('Icon/usersearch.png') }}" alt=""></div>
                    <h3 class="font-semibold mb-2">Cari Nama Pekerja</h3>
                    <a href="/dashboard/perusahaan/berlangganan/kandidat/info/nama"
                        class="bg-white text-orange-500 px-4 py-2 rounded-md text-sm font-medium hover:bg-gray-100">
                        Lebih Detail
                    </a>
                </div>

                <div class="bg-orange-500 text-white rounded-lg p-6 flex flex-col items-center text-center shadow-md">
                    <div class="text-4xl mb-4"><img src="{{ asset('Icon/userwarning.png') }}" alt=""></div>
                    <h3 class="font-semibold mb-2">Laporan Harian Pekerja</h3>
                    <a href="/dashboard/perusahaan/berlangganan/kandidat/info/bermasalah"
                        class="bg-white text-orange-500 px-4 py-2 rounded-md text-sm font-medium hover:bg-gray-100">
                        Lebih Detail
                    </a>
                </div>

            </div>
        </section>
    </div>
@endsection
