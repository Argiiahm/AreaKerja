@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="p-6">
        <div class="flex justify-between items-center mb-4">
            <p class="text-sm text-gray-700">25 Juni 2024</p>
            <div class="flex items-center gap-2">
                <span class="text-sm">Status</span>
                <span class="bg-green-500 text-white px-3 py-1 rounded text-xs">Open</span>
                <button class="bg-red-500 text-white px-4 py-1 rounded text-sm">Hapus</button>
            </div>
        </div>

        <div class="flex justify-end gap-3 mb-4">
            <a href="/dashboard/superadmin/event/edit" class="bg-blue-500 text-white px-5 py-2 rounded text-sm">Edit Event</a>
            <button class="bg-sky-500 text-white px-5 py-2 rounded text-sm">Lihat Partisipan</button>
        </div>

        <div class="mb-6">
            <img src="https://picsum.photos/900/300" alt="event" class="w-full rounded-xl shadow">
        </div>

        <div class="mb-6">
            <h2 class="font-semibold text-lg mb-2">Event</h2>
            <p class="text-gray-700 text-sm leading-relaxed">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
            </p>
            <p class="text-gray-700 text-sm leading-relaxed mt-2">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
            </p>
        </div>

        <div class="mb-6">
            <h3 class="text-orange-600 font-semibold mb-3">Detail acara</h3>
            <div class="flex items-center gap-2 mb-2 text-sm">
                <span class="text-gray-600">🕒</span>
                <p>Waktu: 20 Agustus 2023 (09.00 - 15.00) WIB</p>
            </div>
            <div class="flex items-center gap-2 text-sm">
                <span class="text-gray-600">📍</span>
                <p>Lokasi: Kantor I Seven INC, Bantul, Yogyakarta</p>
            </div>
        </div>

        <div class="mb-6">
            <h3 class="font-semibold mb-3">Daftar kegiatan:</h3>
            <div class="overflow-hidden rounded-lg border border-orange-500">
                <table class="w-full text-sm border-collapse border border-orange-500">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="w-32 border border-orange-500 px-3 py-2 text-left font-semibold text-gray-700">
                                Waktu
                            </th>
                            <th class="border border-orange-500 px-3 py-2 text-left font-semibold text-gray-700">
                                Acara
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="w-32 border border-orange-500 px-3 py-2">08.00</td>
                            <td class="border border-orange-500 px-3 py-2">Registrasi Peserta</td>
                        </tr>
                        <tr>
                            <td class="w-32 border border-orange-500 px-3 py-2">09.00</td>
                            <td class="border border-orange-500 px-3 py-2">Pembukaan</td>
                        </tr>
                        <tr>
                            <td class="w-32 border border-orange-500 px-3 py-2">10.00</td>
                            <td class="border border-orange-500 px-3 py-2">Sesi Materi 1</td>
                        </tr>
                        <tr>
                            <td class="w-32 border border-orange-500 px-3 py-2">12.00</td>
                            <td class="border border-orange-500 px-3 py-2">Istirahat & Makan Siang</td>
                        </tr>
                        <tr>
                            <td class="w-32 border border-orange-500 px-3 py-2">13.00</td>
                            <td class="border border-orange-500 px-3 py-2">Sesi Materi 2</td>
                        </tr>
                        <tr>
                            <td class="w-32 border border-orange-500 px-3 py-2">15.00</td>
                            <td class="border border-orange-500 px-3 py-2">Penutupan</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="flex justify-center items-center">
            <button class="bg-orange-500 text-white px-8 py-2 rounded-full font-medium">
                Mendaftar
            </button>
        </div>

    </div>

@endsection
