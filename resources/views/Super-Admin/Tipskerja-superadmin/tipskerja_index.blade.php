@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="p-6">
        <div class="flex flex-wrap items-center mb-3 space-x-2 text-sm">
            <span>Semua (6)</span>
            <span class="text-blue-500 cursor-pointer">| Telah Terbit (5)</span>
            <span class="text-blue-500 cursor-pointer">| Draf (1)</span>
        </div>

        <div class="flex flex-col md:flex-row justify-between md:items-center mb-4 gap-3">
            <div class="flex flex-wrap items-center gap-2">
                <div class="relative">
                    <select
                        class="appearance-none border border-gray-300 rounded-md px-3 h-9 pr-6 text-sm text-gray-700 focus:outline-none">
                        <option>Tanggal</option>
                        <option>Nama</option>
                    </select>
                </div>

                <button class="bg-gray-700 text-white px-4 h-9 rounded-md text-sm">
                    Terapkan
                </button>

                <button class="bg-red-500 text-white px-4 h-9 rounded-md text-sm">
                    Hapus
                </button>
            </div>

            <div class="flex flex-wrap items-center gap-2">
                <input type="text" placeholder="nama/tanggal..."
                    class="border border-gray-300 rounded-md px-3 h-9 text-sm focus:outline-none w-full md:w-48">
                <button class="bg-gray-700 text-white px-5 h-9 rounded-md text-sm">Cari</button>
                <a href="/dashboard/admin/tipskerja/addpost" class="bg-blue-500 text-white px-6 py-2 rounded-md text-sm text-center">
                    Buat Post
                </a>
            </div>
        </div>

        <div class="overflow-x-auto rounded-lg shadow">
            <table class="w-full text-sm text-left border-collapse">
                <thead class="bg-gray-700 text-white">
                    <tr>
                        <th class="px-4 py-3">
                            <input type="checkbox" class="w-4 h-4">
                        </th>
                        <th class="px-4 py-3">Judul</th>
                        <th class="px-4 py-3">Penulis</th>
                        <th class="px-4 py-3">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-gray-200">
                        <td class="px-4 py-3">
                            <input type="checkbox" class="w-4 h-4">
                        </td>
                        <td class="px-4 py-3 text-blue-600 font-medium cursor-pointer">
                            Tips Bekerja Yang Tidak Membuatmu Stress
                        </td>
                        <td class="px-4 py-3">Zharif</td>
                        <td class="px-4 py-3">4/6/2004</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
