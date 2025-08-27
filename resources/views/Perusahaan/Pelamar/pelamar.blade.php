@extends('layouts.index')
@section('content')
    <div class="w-full">
        <section class="relative w-full h-screen pt-24">
            <div class="absolute inset-0">
                <img src="https://asset-2.tribunnews.com/palu/foto/bank/images/ilustrasi-berjabat-tangan45.jpg"
                    alt="Background" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-60"></div>
            </div>
            <div class="relative z-10 flex items-center justify-start h-full px-10 lg:px-20 md:px-20">
                <div class="max-w-lg">
                    <h1 class="text-6xl font-bold text-white mb-4">Pelamar</h1>
                    <p class="text-white text-lg mb-6">
                        Lihat riwayat lamar yang masuk<br>
                        Ke lowongan anda
                    </p>
                </div>
            </div>
        </section>

        <div class="px-6 md:px-16 mt-10">
            <div
                class="bg-white rounded-xl shadow-md p-6 flex flex-col md:flex-row items-start md:items-center justify-between">
                <div class="flex items-start md:items-center gap-4">
                    <img src="{{ asset('Icon/seveninc.png') }}" alt="Logo" class="w-30">

                    <div>
                        <p class="text-gray-500 text-sm">Seven Inc</p>
                        <h2 class="text-lg font-semibold text-gray-900">UI UX Designer - WFO</h2>
                        <p class="text-gray-500 text-sm">Yogyakarta</p>
                        <span class="bg-gray-100 text-gray-700 text-sm px-2 py-1 rounded-md inline-block mt-1">
                            Rp. 4.500.000 - Rp. 7.000.000 per bulan
                        </span>
                    </div>
                </div>
                <p class="text-gray-500 text-sm mt-4 md:mt-0">Aktif 2 jam lalu</p>
            </div>
        </div>

        <div class="px-6 md:px-16 mt-10">
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="px-4 py-3 font-semibold text-gray-700">Tanggal</th>
                                <th class="px-4 py-3 font-semibold text-gray-700">Nama</th>
                                <th class="px-4 py-3 font-semibold text-gray-700">CV</th>
                                <th class="px-4 py-3 font-semibold text-gray-700">Status</th>
                                <th class="px-4 py-3 font-semibold text-gray-700">Waktu</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @for ($i = 0; $i < 8; $i++)
                                <tr>
                                    <td class="px-4 py-3 text-gray-700">25 Juni, 2024</td>
                                    <td class="px-4 py-3 text-gray-700">Bambang Kurnia</td>
                                    <td class="px-4 py-3">
                                        <a href="#" class="text-orange-500 hover:text-orange-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" 
                                                 class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                    d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4"/>
                                            </svg>
                                        </a>
                                    </td>
                                    <td class="px-4 py-3 flex gap-2">
                                        @if ($i == 0)
                                            <button class="bg-green-600 text-white px-4 py-1 rounded-md text-sm">Terima</button>
                                            <button class="bg-red-600 text-white px-4 py-1 rounded-md text-sm">Tolak</button>
                                        @else
                                            <button class="bg-gray-300 text-gray-700 px-4 py-1 rounded-md text-sm">Terima</button>
                                            <button class="bg-gray-300 text-gray-700 px-4 py-1 rounded-md text-sm">Tolak</button>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-gray-700">30 Hari</td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>

                <div class="flex items-start gap-2 mt-6 text-sm text-orange-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 mt-0.5" 
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L4.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                    <p>
                        Informasi pelamar akan hilang dalam waktu 30 hari setelah anda konfirmasi 
                        <span class="font-semibold">Terima.</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
