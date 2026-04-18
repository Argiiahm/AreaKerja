@extends('Super-Admin.layouts.index')
@section('super_admin-content')
    {{ session()->forget('pelamar_id') }}
    <div class="p-6">

        <!-- TOP CONTROL -->
        <div class="flex flex-col lg:flex-row justify-between gap-4 mb-6">

            <!-- TABS & ADD BTN -->
            <div class="flex items-center gap-3">
                <a id="addPelamarUrl" href="/dashboard/superadmin/pelamar/add/kandidat"
                    class="bg-orange-500 hover:bg-orange-600 transition text-white flex justify-center items-center h-[42px] w-[42px] min-w-[42px] rounded-xl shadow">
                    <i class="ph ph-plus text-lg"></i>
                </a>

                <div class="flex bg-gray-100 p-1 rounded-2xl w-fit shadow-inner">
                    <button class="tab-btn px-5 py-2 rounded-xl text-sm font-medium transition whitespace-nowrap"
                        data-tab="kandidat">
                        Kandidat
                    </button>

                    <button class="tab-btn px-5 py-2 rounded-xl text-sm font-medium transition whitespace-nowrap"
                        data-tab="non_kandidat">
                        Non Kandidat
                    </button>

                    <button class="tab-btn px-5 py-2 rounded-xl text-sm font-medium transition whitespace-nowrap"
                        data-tab="calon_kandidat">
                        Calon Kandidat
                    </button>
                </div>
            </div>

            <!-- SEARCH -->
            <div class="relative w-full lg:w-80">
                <i class="ph ph-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="text" id="searchInput" placeholder="Cari kandidat..." class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-gray-200
                                               focus:ring-2 focus:ring-orange-400 focus:border-orange-400
                                               shadow-sm text-sm transition">
            </div>

        </div>

        <!-- TABLE -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 flex justify-between">
                <h2 class="font-semibold text-gray-800 text-sm capitalize">
                    <span id="tabTitle">Kandidat</span>
                </h2>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-center">
                    <thead class="bg-gray-50 text-gray-600 uppercase text-xs border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-3 border-r border-gray-200">ID</th>
                            <th class="px-6 py-3 border-r border-gray-200">Nama</th>
                            <th class="px-6 py-3 border-r border-gray-200">Skill</th>
                            <th class="px-6 py-3 border-r border-gray-200">Pendidikan</th>
                            <th class="px-6 py-3 border-r border-gray-200">Alamat</th>
                            <th class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($pelamar as $p)
                            @php
                                $kat = 'non_kandidat';
                                if ($p->kategori === 'kandidat aktif')
                                    $kat = 'kandidat';
                                else if ($p->kategori === 'calon kandidat')
                                    $kat = 'calon_kandidat';

                                $searchStr = strtolower(($p->nama_pelamar ?? '') . ' ' . ($p->skill->pluck('skill')->implode(' ') ?? '') . ' ' . ($p->riwayat_pendidikan->pluck('pendidikan')->implode(' ') ?? '') . ' ' . ($p->alamat_pelamars->pluck('detail')->implode(' ') ?? ''));
                            @endphp
                            <tr class="pelamar-row hover:bg-gray-50 transition hidden" data-kategori="{{ $kat }}"
                                data-search="{{ $searchStr }}">

                                <td class="px-6 py-3 border-r border-gray-200 text-gray-500">
                                    {{ $p->id }}
                                </td>

                                <td class="px-6 py-3 border-r border-gray-200 font-medium text-gray-800">
                                    {{ $p->nama_pelamar ?: 'N/A' }}
                                </td>

                                <td class="px-6 py-3 border-r border-gray-200 text-gray-600">
                                    {{ $p->skill->pluck('skill')->implode(', ') ?: 'N/A' }}
                                </td>

                                <td class="px-6 py-3 border-r border-gray-200 text-gray-600">
                                    {{ $p->riwayat_pendidikan->pluck('pendidikan')->implode(', ') ?: 'N/A' }}
                                </td>

                                <td class="px-6 py-3 border-r border-gray-200 text-gray-600">
                                    {{ $p->alamat_pelamars->pluck('detail')->implode(', ') ?: 'N/A' }}
                                </td>

                                <td class="px-6 py-3">
                                    <div class="flex justify-center gap-2">
                                        <a href="/dashboard/superadmin/{{ $p->kategori === 'kandidat aktif' ? 'kandidat_view' : 'nonkandidat_view' }}/{{ $p->id }}"
                                            class="p-2 rounded-lg bg-gray-100 hover:bg-blue-500 hover:text-white transition">
                                            <i class="ph ph-eye"></i>
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

    <script>
        $(document).ready(function () {
            let selectedTab = localStorage.getItem('pelamar_tab') || 'kandidat';

            function updateUI() {
                // Style Tabs
                $('.tab-btn').each(function () {
                    if ($(this).data('tab') === selectedTab) {
                        $(this).removeClass('text-gray-500 hover:text-gray-700').addClass('bg-white shadow text-gray-900');
                    } else {
                        $(this).removeClass('bg-white shadow text-gray-900').addClass('text-gray-500 hover:text-gray-700');
                    }
                });

                // Update Table Title
                $('#tabTitle').text(selectedTab.replace('_', ' '));

                // Update Add Candidate URL
                $('#addPelamarUrl').attr('href', '/dashboard/superadmin/pelamar/add/' + selectedTab);

                filterTable();
            }

            function filterTable() {
                let keyword = $('#searchInput').val().toLowerCase().trim();

                $('.pelamar-row').each(function () {
                    let rowKat = $(this).data('kategori');
                    let rowSearch = String($(this).data('search')).toLowerCase();

                    let matchesTab = (rowKat === selectedTab);
                    let matchesKey = (keyword === '' || rowSearch.includes(keyword));

                    if (matchesTab && matchesKey) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }

            // Tab click listener
            $('.tab-btn').click(function () {
                selectedTab = $(this).data('tab');
                localStorage.setItem('pelamar_tab', selectedTab);
                updateUI();
            });

            // Search input listener
            $('#searchInput').on('input', function () {
                filterTable();
            });

            // Run initial render
            updateUI();
        });
    </script>
@endsection