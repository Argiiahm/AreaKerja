@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="p-8 bg-[#F9FAFB] min-h-screen">
        {{-- Header Section --}}
        <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Manajemen Pengguna</h1>
                <p class="text-sm text-gray-500 mt-1">Kelola status aktif/freeze untuk semua pengguna terdaftar.</p>
            </div>
        </div>

        {{-- Filter & Search --}}
        <div class="bg-white border border-gray-200 rounded-2xl p-4 mb-6 shadow-sm flex items-center gap-3">
            <div class="relative flex-1 group">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="ph ph-magnifying-glass text-gray-400 group-focus-within:text-gray-900 transition-colors"></i>
                </div>
                <input type="text" id="searchInput" placeholder="Cari berdasarkan nama pengguna, email, atau role..."
                    class="block w-full pl-10 pr-3 py-2.5 border border-gray-200 rounded-xl focus:ring-1 focus:ring-gray-900 focus:border-gray-900 outline-none transition-all text-sm">
            </div>
        </div>

        {{-- Table --}}
        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">
            <div class="overflow-x-auto no-scrollbar">
                <table id="myTable" class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50/50 border-b border-gray-100">
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">No</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Username</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Email</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Role</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Telepon</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Alamat</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest text-center">
                                Status</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest text-center">Aksi
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">
                        @foreach ($Data as $d)
                            @php
                                $pelamar = $d->pelamars
                                    ? (is_iterable($d->pelamars)
                                        ? $d->pelamars->last()
                                        : $d->pelamars)
                                    : null;

                                $alamatPelamar =
                                    $pelamar && $pelamar->alamat_pelamars
                                        ? (is_iterable($pelamar->alamat_pelamars)
                                            ? $pelamar->alamat_pelamars->last()
                                            : $pelamar->alamat_pelamars)
                                        : null;

                                $perusahaan = $d->perusahaan;

                                $alamatPerusahaan =
                                    $perusahaan && $perusahaan->alamatperusahaan
                                        ? (is_iterable($perusahaan->alamatperusahaan)
                                            ? $perusahaan->alamatperusahaan->last()
                                            : $perusahaan->alamatperusahaan)
                                        : null;
                            @endphp

                            <tr class="freeze-row hover:bg-gray-50/50 transition-colors group">
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $loop->iteration }}</td>

                                <td class="px-6 py-4">
                                    <span class="text-sm font-semibold text-gray-900">{{ $d->username }}</span>
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-500">{{ $d->email }}</td>

                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider
                                    @if ($d->role === 'superadmin') bg-purple-50 text-purple-600 border border-purple-100
                                    @elseif ($d->role === 'admin') bg-green-50 text-green-600 border border-green-100
                                    @elseif ($d->role === 'perusahaan') bg-blue-50 text-blue-600 border border-blue-100
                                    @elseif ($d->role === 'pelamar') bg-yellow-50 text-yellow-600 border border-yellow-100
                                    @else bg-gray-50 text-gray-600 border border-gray-100 @endif">
                                        {{ $d->role }}
                                    </span>
                                </td>

                                {{-- Telepon --}}
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    @if ($d->role == 'pelamar')
                                        {{ $pelamar->telepon_pelamar ?? '-' }}
                                    @elseif ($d->role == 'perusahaan')
                                        {{ $perusahaan->telepon_perusahaan ?? '-' }}
                                    @else
                                        -
                                    @endif
                                </td>

                                {{-- Alamat --}}
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    @if ($d->role == 'pelamar')
                                        {{ $alamatPelamar->provinsi ?? '-' }}
                                    @elseif ($d->role == 'perusahaan')
                                        {{ $alamatPerusahaan->provinsi ?? '-' }}
                                    @elseif ($d->role == 'finance')
                                        {{ $d->finance->provinsi ?? '-' }}
                                    @elseif ($d->role == 'admin')
                                        {{ $d->admin->provinsi ?? '-' }}
                                    @elseif ($d->role == 'superadmin')
                                        {{ $d->superadmins->provinsi ?? '-' }}
                                    @endif
                                </td>

                                {{-- Status --}}
                                <td class="px-6 py-4 text-center">
                                    @if ($d->status === 0)
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-green-50 text-green-600 border border-green-100 uppercase">
                                            Aktif
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-red-50 text-red-600 border border-red-100 uppercase">
                                            Banned
                                        </span>
                                    @endif
                                </td>

                                {{-- Aksi --}}
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center items-center gap-2">
                                        <a href="/dashboard/superadmin/freeze/detail/{{ $d->id }}"
                                            class="p-2 text-gray-400 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-all">
                                            <i class="ph ph-prohibit text-lg"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Search --}}
    <script>
        document.getElementById("searchInput").addEventListener("keyup", function() {
            let input = this.value.toLowerCase();
            let rows = document.querySelectorAll(".freeze-row");

            rows.forEach(row => {
                let rowText = row.innerText.toLowerCase();
                row.style.display = rowText.includes(input) ? "" : "none";
            });
        });
    </script>
@endsection
