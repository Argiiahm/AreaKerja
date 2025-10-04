@extends('Admin.Dashboard-admin.layouts.index')

@section('admin-content')
    <div class="p-6">
        <div class="block lg:flex justify-between items-center mb-4">
            <div class="space-x-2 grid grid-cols-2 gap-2 lg:inline md:inline mb-5 lg:mb-0">
                <button id="btn_kandidat"
                    class="bg-gray-700 border text-gray-700 text-white px-4 py-2 rounded-md">Kandidat</button>
                <button id="btn_non_kandidat" class="border text-gray-700 px-4 py-2 rounded-md">Non Kandidat</button>
                <button id="btn_calon_kandidat" class="border text-gray-700 px-4 py-2 rounded-md">Calon Kandidat</button>
            </div>

            <div class="flex items-center space-x-2 mt-0 lg:mt-0 md:mt">
                <input type="text" placeholder=""
                    class="border border-gray-300 rounded-md px-3 py-2 w-64 focus:outline-none focus:ring-2 focus:ring-gray-400">
                <button class="bg-gray-700 text-white px-4 py-2 rounded-md">Cari</button>
            </div>
        </div>

        {{-- Table Kandidat --}}
        <div id="table_kandidat" class="bg-white border rounded-2xl shadow-sm overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 text-left">
                        <th class="px-6 py-3 font-semibold text-gray-700">ID</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Nama</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Skill</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Pendidikan</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Alamat</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Data as $d)
                        @if ($d->kategori === 'kandidat aktif')
                            <tr class="border-t">
                                <td class="px-6 py-3 text-gray-700">{{ $d->id }}</td>
                                <td class="px-6 py-3 text-gray-700">{{ $d->nama_pelamar }}</td>
                                <td class="px-6 py-3 text-gray-700">{{ $d->skill->pluck('skill')->implode(', ') }}</td>
                                <td class="px-6 py-3 text-gray-700">
                                    {{ $d->riwayat_pendidikan->pluck('asal_pendidikan')->implode(', ') }}</td>
                                <td class="px-6 py-3 text-gray-700">
                                    {{ $d->alamat_pelamars()->latest()->first()->provinsi ?? '' }}</td>
                                <td class="px-6 py-3 flex space-x-2">
                                <td class="px-6 py-4 flex gap-2">
                                    <a href="/dashboard/admin/kandidat/view/{{ $d->id }}"
                                        class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 12s3.75-6.75 9.75-6.75S21.75 12 21.75 12s-3.75 6.75-9.75 6.75S2.25 12 2.25 12z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </a>
                                    <button class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M18.364 5.636a9 9 0 11-12.728 12.728A9 9 0 0118.364 5.636z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 9l-6 6" />
                                        </svg>
                                    </button>
                                </td>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- End Table Kandidat --}}

        {{-- Table Non Kandidat --}}
        <div id="table_non_kandidat" class="hidden bg-white border rounded-2xl shadow-sm overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 text-left">
                        <th class="px-6 py-3 font-semibold text-gray-700">ID</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Nama</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Skill</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Pendidikan</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Alamat</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Data as $d)
                        @if ($d->kategori === null || $d->kategori === "pelamar")
                            <tr class="border-t">
                                <td class="px-6 py-3 text-gray-700">{{ $d->id }}</td>
                                <td class="px-6 py-3 text-gray-700">{{ $d->nama_pelamar }}</td>
                                <td class="px-6 py-3 text-gray-700">{{ $d->skill->pluck('skill')->implode(', ') }}</td>
                                <td class="px-6 py-3 text-gray-700">
                                    {{ $d->riwayat_pendidikan->pluck('asal_pendidikan')->implode(', ') }}</td>
                                <td class="px-6 py-3 text-gray-700">
                                    {{ $d->alamat_pelamars->pluck('provinsi')->implode(', ') }}</td>
                                <td class="px-6 py-3 flex space-x-2">
                                <td class="px-6 py-4 flex gap-2">
                                    <a href="/dashboard/admin/nonkandidat/view/{{ $d->id }}"
                                        class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 12s3.75-6.75 9.75-6.75S21.75 12 21.75 12s-3.75 6.75-9.75 6.75S2.25 12 2.25 12z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </a>
                                    <button class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M18.364 5.636a9 9 0 11-12.728 12.728A9 9 0 0118.364 5.636z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 9l-6 6" />
                                        </svg>
                                    </button>
                                </td>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- End Table Non Kandidat --}}

        {{-- Table Calon Kandidat --}}
        <div id="table_calon_kandidat" class="hidden bg-white border rounded-2xl shadow-sm overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 text-left">
                        <th class="px-6 py-3 font-semibold text-gray-700">ID</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Nama</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Skill</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Pendidikan</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Alamat</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Data as $d)
                        @if ($d->kategori === 'calon kandidat')
                            <tr class="border-t">
                                <td class="px-6 py-3 text-gray-700">{{ $d->id }}</td>
                                <td class="px-6 py-3 text-gray-700">{{ $d->nama_pelamar }}</td>
                                <td class="px-6 py-3 text-gray-700">{{ $d->skill->pluck('skill')->implode(', ') }}</td>
                                <td class="px-6 py-3 text-gray-700">
                                    {{ $d->riwayat_pendidikan->pluck('asal_pendidikan')->implode(', ') }}</td>
                                <td class="px-6 py-3 text-gray-700">
                                    {{ $d->alamat_pelamars->pluck('provinsi')->implode(', ') }}</td>
                                <td class="px-6 py-3 flex space-x-2">
                                <td class="px-6 py-4 flex gap-2">
                                    <a href="/dashboard/admin/calonkandidat/view/{{ $d->id }}"
                                        class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 12s3.75-6.75 9.75-6.75S21.75 12 21.75 12s-3.75 6.75-9.75 6.75S2.25 12 2.25 12z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </a>
                                    <button class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M18.364 5.636a9 9 0 11-12.728 12.728A9 9 0 0118.364 5.636z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 9l-6 6" />
                                        </svg>
                                    </button>
                                </td>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- End Table Calon Kandidat --}}
    </div>
@endsection
