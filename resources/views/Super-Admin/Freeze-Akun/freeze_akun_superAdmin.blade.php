@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="p-6 bg-gray-50 min-h-screen">
        {{-- Header --}}
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">Manajemen Pengguna</h1>
            <div class="flex items-center space-x-2">
                <input type="text" placeholder="Cari nama / username..." id="searchInput"
                    class="border border-gray-300 bg-white rounded-lg px-4 py-2 w-64 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
                <button type="button" onclick="searchTable()"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg text-sm font-medium shadow transition">
                    Cari
                </button>
            </div>
        </div>

        {{-- Table Container --}}
        <div class="bg-white border border-gray-200 rounded-xl shadow-md overflow-x-auto">
            <table id="myTable" class="w-full text-sm text-left border-collapse">
                <thead class="bg-gray-800 text-white text-sm uppercase tracking-wide">
                    <tr>
                        <th class="px-6 py-3">No</th>
                        <th class="px-6 py-3">Username</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Role</th>
                        <th class="px-6 py-3">Telepon</th>
                        <th class="px-6 py-3">Alamat</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($Data as $d)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-3 text-gray-700">{{ $loop->iteration }}</td>
                            <td class="px-6 py-3 text-gray-800 font-medium">{{ $d->username }}</td>
                            <td class="px-6 py-3 text-gray-700">{{ $d->email }}</td>
                            <td class="px-6 py-3 capitalize">
                                <span
                                    class="px-2 py-1 text-xs rounded-full 
                                    @if ($d->role === 'superadmin') bg-purple-100 text-purple-700
                                    @elseif ($d->role === 'admin') bg-green-100 text-green-700
                                    @elseif ($d->role === 'perusahaan') bg-blue-100 text-blue-700
                                    @elseif ($d->role === 'pelamar') bg-yellow-100 text-yellow-700
                                    @else bg-red-100 text-red-600 @endif">
                                    {{ $d->role }}
                                </span>
                            </td>

                            {{-- Telepon --}}
                            <td class="px-6 py-3 text-gray-700">
                                @if ($d->role == 'pelamar')
                                    {{ $d->pelamars->telepon_pelamar ?? '-' }}
                                @elseif ($d->role == 'perusahaan')
                                    {{ $d->perusahaan->telepon_perusahaan ?? '-' }}
                                @else
                                    -
                                @endif
                            </td>

                            {{-- Alamat --}}
                            <td class="px-6 py-3 text-gray-700">
                                @if ($d->role == 'pelamar')
                                    {{ $d->pelamars()->latest()->first()->alamat_pelamars()->latest()->first()->provinsi ?? '-' }}
                                @elseif ($d->role == 'perusahaan')
                                    {{ $d->perusahaan()->latest()->first()->alamatperusahaan()->latest()->first()->provinsi ?? '-' }}
                                @elseif ($d->role == 'finance')
                                    {{ $d->finance->provinsi ?? '-' }}
                                @elseif ($d->role == 'admin')
                                    {{ $d->admin->provinsi ?? '-' }}
                                @elseif ($d->role == 'superadmin')
                                    {{ $d->superadmins->provinsi ?? '-' }}
                                @endif
                            </td>

                            {{-- Status --}}
                            <td class="px-6 py-3">
                                @if ($d->status === 0)
                                    <span class="bg-green-100 text-green-700 text-xs font-semibold px-3 py-1 rounded-full">
                                        Aktif
                                    </span>
                                @elseif ($d->status === 1)
                                    <span class="bg-red-100 text-red-700 text-xs font-semibold px-3 py-1 rounded-full">
                                        Banned
                                    </span>
                                @endif
                            </td>

                            {{-- Aksi --}}
                            <td class="px-6 py-4 text-center">
                                <a href="/dashboard/superadmin/freeze/detail/{{ $d->id }}"
                                    class="inline-flex items-center justify-center p-2 bg-gray-100 hover:bg-gray-200 rounded-full transition">
                                    <img src="{{ asset('Icon/fzd.png') }}" alt="Freeze" class="w-5 h-5">
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Script Search --}}
    <script>
        document.getElementById("searchInput").addEventListener("keyup", function() {
            let input = this.value.toLowerCase();
            let rows = document.querySelectorAll("#myTable tbody tr");

            rows.forEach(row => {
                let rowText = row.innerText.toLowerCase();
                row.style.display = rowText.includes(input) ? "" : "none";
            });
        });
    </script>
@endsection
