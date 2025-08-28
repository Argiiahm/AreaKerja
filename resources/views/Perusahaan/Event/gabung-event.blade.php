@extends('layouts.index')

@section('content')
   <div class="p-6 max-w-5xl mx-auto mt-28">

    <!-- Tanggal -->
    <p class="text-sm text-gray-600 mb-3">25 Juni 2024</p>

    <!-- Gambar Banner -->
    <div class="mb-6">
        <img src="https://picsum.photos/1200/400" alt="event" 
             class="w-full h-[350px] object-cover rounded-xl shadow-md">
    </div>

    <!-- Judul & Deskripsi -->
    <div class="mb-8">
        <h2 class="font-semibold text-2xl mb-4">Seminar Pekerja</h2>
        <p class="text-gray-700 text-base leading-relaxed mb-3">
            Seminar kerja memberikan sejumlah manfaat yang signifikan. Salah satu keuntungannya adalah akses langsung ke talenta potensial, 
            di mana perusahaan dapat mengidentifikasi mahasiswa berbakat yang mungkin cocok untuk direkrut. Selain itu, dengan berpartisipasi 
            sebagai sponsor atau pembicara, perusahaan dapat meningkatkan brand awareness dan membangun reputasi positif di kalangan mahasiswa 
            sebagai tempat kerja yang menarik.
        </p>
    </div>

    <!-- Detail Acara -->
    <div class="mb-10">
        <h3 class="text-orange-600 font-semibold mb-4">Detail acara</h3>
        <div class="flex items-center gap-2 mb-2 text-sm text-gray-700">
            <span class="text-lg">🕒</span>
            <p>Waktu: 20 Agustus 2023 (09.00 – 15.00) WIB</p>
        </div>
        <div class="flex items-center gap-2 text-sm text-gray-700">
            <span class="text-lg">📍</span>
            <p>Lokasi: Kantor I Seven INC, Bantul, Yogyakarta</p>
        </div>
    </div>

    <!-- Daftar Kegiatan -->
    <div class="mb-10">
        <h3 class="font-semibold mb-3">Daftar kegiatan:</h3>
        <div class="overflow-hidden rounded-lg border border-orange-500 shadow-sm">
            <table class="w-full text-sm border-collapse">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="w-40 border border-orange-500 px-4 py-2 text-left font-semibold text-gray-700">Waktu</th>
                        <th class="border border-orange-500 px-4 py-2 text-left font-semibold text-gray-700">Acara</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-orange-500 px-4 py-2">09.00–09.15</td>
                        <td class="border border-orange-500 px-4 py-2">Pembukaan</td>
                    </tr>
                    <tr>
                        <td class="border border-orange-500 px-4 py-2">09.15–09.30</td>
                        <td class="border border-orange-500 px-4 py-2">Sambutan</td>
                    </tr>
                    <tr>
                        <td class="border border-orange-500 px-4 py-2">09.30–11.00</td>
                        <td class="border border-orange-500 px-4 py-2">Materi 1</td>
                    </tr>
                    <tr>
                        <td class="border border-orange-500 px-4 py-2">11.00–12.00</td>
                        <td class="border border-orange-500 px-4 py-2">Materi 2</td>
                    </tr>
                    <tr>
                        <td class="border border-orange-500 px-4 py-2">12.00–13.30</td>
                        <td class="border border-orange-500 px-4 py-2">Istirahat Makan Siang</td>
                    </tr>
                    <tr>
                        <td class="border border-orange-500 px-4 py-2">13.30–14.00</td>
                        <td class="border border-orange-500 px-4 py-2">Materi 3</td>
                    </tr>
                    <tr>
                        <td class="border border-orange-500 px-4 py-2">14.00–14.30</td>
                        <td class="border border-orange-500 px-4 py-2">Doorprize</td>
                    </tr>
                    <tr>
                        <td class="border border-orange-500 px-4 py-2">14.30–15.00</td>
                        <td class="border border-orange-500 px-4 py-2">Penutupan</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tombol -->
    <div class="flex justify-center">
        <button class="bg-orange-500 hover:bg-orange-600 text-white px-10 py-3 rounded-full font-medium transition">
            Mendaftar
        </button>
    </div>

</div>
@endsection
