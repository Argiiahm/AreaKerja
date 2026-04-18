@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="p-8 bg-[#F9FAFB] min-h-screen">
        <div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Manajemen Pengguna</h1>
                <p class="text-sm text-gray-500 mt-1">Kelola data seluruh akun (admin, superadmin, pelamar, perusahaan, dll)
                    di dalam sistem.</p>
            </div>

            <div class="flex flex-col sm:flex-row items-center gap-3">
                <div class="relative w-full sm:w-64">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="ph ph-magnifying-glass text-gray-400 text-lg"></i>
                    </div>
                    <input type="text" id="searchInput"
                        class="block w-full pl-10 pr-3 py-2.5 bg-white border border-gray-200 rounded-xl text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-all shadow-sm"
                        placeholder="Cari by email, username, role...">
                </div>

                <a href="/dashboard/superadmin/akun/add"
                    class="w-full sm:w-auto px-5 py-2.5 bg-gray-900 hover:bg-black text-white text-sm font-semibold rounded-xl transition-all shadow-sm flex items-center justify-center gap-2 whitespace-nowrap">
                    <i class="ph ph-plus-circle text-lg"></i>
                    <span>Tambah Pengguna</span>
                </a>
            </div>
        </div>

        @if (session('success') || session('success2') || session('success3'))
            <div id="modalSukses"
                class="fixed inset-0 bg-black/40 backdrop-blur-sm flex items-center justify-center z-50 transition-opacity">
                <div
                    class="bg-white rounded-2xl shadow-xl w-[350px] text-center relative p-8 transform scale-100 opacity-100 transition-all duration-300">
                    <button id="closeSukses" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors">
                        <i class="ph ph-x text-xl"></i>
                    </button>
                    <div class="flex flex-col items-center justify-center space-y-4">
                        <div class="w-16 h-16 rounded-full bg-green-100 flex items-center justify-center">
                            <i class="ph ph-check-circle text-3xl text-green-600"></i>
                        </div>
                        <p class="text-gray-900 font-bold text-lg">
                            @if(session('success')) Data Berhasil Dihapus
                            @elseif(session('success2')) Data Berhasil Ditambah
                            @elseif(session('success3')) Data Berhasil Diubah
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <script>
                setTimeout(() => {
                    const modal = document.getElementById('modalSukses');
                    if (modal) {
                        modal.classList.add('opacity-0');
                        setTimeout(() => modal.remove(), 300);
                    }
                }, 2500);

                document.getElementById('closeSukses')?.addEventListener('click', () => {
                    const modal = document.getElementById('modalSukses');
                    modal.classList.add('opacity-0');
                    setTimeout(() => modal.remove(), 300);
                });
            </script>
        @endif

        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden flex flex-col">
            <div class="overflow-x-auto no-scrollbar">
                <table class="w-full text-left border-collapse min-w-[800px]">
                    <thead class="bg-gray-50/80 border-b border-gray-100">
                        <tr>
                            <th
                                class="px-6 py-4 text-xs font-bold text-gray-400 border-none uppercase tracking-widest w-16">
                                ID</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 border-none uppercase tracking-widest">Akun
                                Info</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 border-none uppercase tracking-widest">Role
                            </th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 border-none uppercase tracking-widest">
                                Region</th>
                            <th
                                class="px-6 py-4 text-xs font-bold text-gray-400 border-none uppercase tracking-widest text-right w-32">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody" class="divide-y divide-gray-50">
                        @forelse ($Data as $d)
                            <tr class="hover:bg-gray-50/50 transition-colors group"
                                data-search="{{ strtolower($d->username . ' ' . $d->email . ' ' . $d->role) }}">
                                <td class="px-6 py-4">
                                    <span
                                        class="text-xs font-mono text-gray-500">#{{ str_pad($loop->iteration, 3, '0', STR_PAD_LEFT) }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-9 h-9 rounded-full bg-gray-100 flex items-center justify-center shrink-0 border border-gray-200">
                                            <i class="ph ph-user text-gray-500 text-lg"></i>
                                        </div>
                                        <div>
                                            <p class="text-sm font-semibold text-gray-900 leading-tight mb-0.5">
                                                {{ $d->username ?: 'No Username' }}
                                            </p>
                                            <p class="text-xs text-gray-500 flex items-center gap-1"><i
                                                    class="ph ph-envelope-simple"></i> {{ $d->email }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider
                                                    @if ($d->role === 'superadmin') bg-purple-50 text-purple-600 border border-purple-100
                                                    @elseif ($d->role === 'admin') bg-green-50 text-green-600 border border-green-100
                                                    @elseif ($d->role === 'perusahaan') bg-blue-50 text-blue-600 border border-blue-100
                                                    @elseif ($d->role === 'pelamar') bg-yellow-50 text-yellow-600 border border-yellow-100
                                                    @else bg-gray-50 text-gray-600 border border-gray-100 @endif
                                                ">
                                        {{ $d->role }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    @php
                                        $kota = null;
                                        if ($d->role === 'pelamar') {
                                            $kota = $d->pelamars?->alamat_pelamars()->latest()->first()?->kota;
                                        } elseif ($d->role === 'perusahaan') {
                                            $kota = $d->perusahaan?->alamatperusahaan()->latest()->first()?->kota;
                                        } elseif ($d->role === 'finance') {
                                            $kota = $d->finance?->kota;
                                        } elseif ($d->role === 'admin') {
                                            $kota = $d->admin?->kota;
                                        } elseif ($d->role === 'superadmin') {
                                            $kota = $d->superadmins?->kota;
                                        }
                                    @endphp
                                    @if (empty($kota))
                                        <span class="text-xs text-gray-400 flex items-center gap-1"><i
                                                class="ph ph-map-pin-line"></i> Belum diatur</span>
                                    @else
                                        <span class="text-sm text-gray-700 flex items-center gap-1"><i
                                                class="ph ph-map-pin text-gray-400"></i> {{ $kota }}</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2 relative z-10">
                                        <a href="/dashboard/superadmin/{{ $d->id }}/view"
                                            class="p-2 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all"
                                            title="Detail">
                                            <i class="ph ph-info text-lg"></i>
                                        </a>
                                        <a href="/dashboard/superadmin/{{ $d->id }}/edit"
                                            class="p-2 text-gray-400 hover:text-orange-500 hover:bg-orange-50 rounded-lg transition-all"
                                            title="Edit">
                                            <i class="ph ph-pencil-simple text-lg"></i>
                                        </a>
                                        <button data-id="{{ $d->id }}"
                                            class="btnHapus p-2 text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-all"
                                            title="Hapus">
                                            <i class="ph ph-trash text-lg"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal Hapus -->
                            <div id="modalKonfirmasi-{{ $d->id }}"
                                class="fixed inset-0 hidden bg-black/40 backdrop-blur-sm items-center justify-center z-50 transition-opacity">
                                <div
                                    class="bg-white rounded-2xl shadow-xl w-[90%] max-w-sm p-6 transform scale-100 opacity-100 transition-all duration-300">
                                    <div
                                        class="w-12 h-12 rounded-full bg-red-100 flex items-center justify-center mx-auto mb-4">
                                        <i class="ph ph-warning text-red-600 text-2xl"></i>
                                    </div>
                                    <h3 class="text-lg font-bold text-gray-900 text-center mb-2">Hapus Pengguna?</h3>
                                    <p class="text-sm text-gray-500 text-center mb-6 leading-relaxed">
                                        Tindakan ini tidak dapat dibatalkan. Data pengguna
                                        <b>{{ $d->username ?: $d->email }}</b> akan dihapus secara permanen.
                                    </p>
                                    <div class="flex gap-3 justify-center">
                                        <button data-id="{{ $d->id }}"
                                            class="batalHapus w-full px-4 py-2.5 text-sm font-semibold text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-xl transition-colors">Batal</button>
                                        <form action="/delete/akun/{{ $d->id }}" method="POST" class="w-full">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="w-full px-4 py-2.5 text-sm font-semibold text-white bg-red-600 hover:bg-red-700 rounded-xl transition-colors shadow-sm">Ya,
                                                Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr id="emptyStateRow">
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-50 mb-4">
                                        <i class="ph ph-users text-2xl text-gray-400"></i>
                                    </div>
                                    <h3 class="text-sm font-semibold text-gray-900 mb-1">Belum Ada Pengguna</h3>
                                    <p class="text-sm text-gray-500">Silakan tambahkan data pengguna baru pada sistem.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div id="noResultsRow" class="hidden border-t border-gray-100">
                <div class="px-6 py-12 text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-50 mb-4">
                        <i class="ph ph-magnifying-glass text-2xl text-gray-400"></i>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-900 mb-1">Pencarian Tidak Ditemukan</h3>
                    <p class="text-sm text-gray-500">Tidak menemukan daftar akun yang cocok dengan kata kunci '<span
                            id="searchKeyword" class="font-medium text-gray-900"></span>'.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function () {
            // Toggle Delete Modal
            $('.btnHapus').on('click', function () {
                const id = $(this).data('id');
                $(`#modalKonfirmasi-${id}`).removeClass('hidden').addClass('flex');
            });

            $('.batalHapus').on('click', function () {
                const id = $(this).data('id');
                $(`#modalKonfirmasi-${id}`).removeClass('flex').addClass('hidden');
            });

            // Real-time Search Logic
            $('#searchInput').on('keyup', function () {
                let searchTerm = $(this).val().toLowerCase();
                let hasResults = false;

                $('#tableBody tr:not(#emptyStateRow)').each(function () {
                    let searchableText = $(this).data('search');

                    if (searchableText && searchableText.includes(searchTerm)) {
                        $(this).show();
                        hasResults = true;
                    } else {
                        $(this).hide();
                    }
                });

                if (!hasResults && searchTerm !== '') {
                    $('#noResultsRow').removeClass('hidden');
                    $('#searchKeyword').text(searchTerm);
                    $('#emptyStateRow').hide();
                } else {
                    $('#noResultsRow').addClass('hidden');
                    if (!hasResults && searchTerm === '') {
                        $('#emptyStateRow').show();
                    }
                }
            });
        });
    </script>
@endsection