@extends('Super-Admin.layouts.index')
@section('super_admin-content')
    <div class="flex justify-center">
        <div class="w-full max-w-7xl p-6 space-y-6">

            <div class="flex flex-col lg:flex-row justify-between items-center gap-4">
                <div class="flex items-center gap-3">
                    <div id="addBtnWrapper" style="display: none;">
                        <a href="/dashboard/superadmin/perusahaan/add/perusahaan"
                            class="bg-orange-500 text-white hover:bg-orange-600 flex items-center gap-2 px-4 py-2 rounded-lg shadow-md transition-all">
                            <i class="ph ph-plus text-2xl"></i>
                            <span class="hidden sm:inline">Tambah</span>
                        </a>
                    </div>

                    <select id="tabSelect"
                        class="bg-gray-100 border border-gray-300 text-gray-800 px-4 py-2 rounded-lg focus:ring-2 focus:ring-orange-400 transition-all">
                        <option value="perusahaan">Perusahaan</option>
                        <option value="recruitment">Recruitment</option>
                        <option value="talent_hunter">Talent Hunter</option>
                        <option value="panggilan">Panggilan</option>
                    </select>
                </div>

                <div class="flex items-center gap-2">
                    <input type="text" id="searchInput" placeholder="Cari Nama Perusahaan..."
                        class="border border-gray-300 rounded-lg px-4 py-2 w-72 focus:ring-2 focus:ring-orange-400 outline-none transition-all">
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">
                <div class="bg-gray-100 px-6 py-4 flex items-center justify-between">
                    <h2 id="table_title" class="text-lg font-semibold text-gray-700">
                        Daftar Perusahaan
                    </h2>
                </div>

                <div class="overflow-x-auto">
                    <table data-table="perusahaan" class="data-table min-w-full divide-y divide-gray-200 text-sm text-gray-700" style="display:none;">
                        <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                            <tr>
                                <th class="px-6 py-3 text-left">ID</th>
                                <th class="px-6 py-3 text-left">Nama</th>
                                <th class="px-6 py-3 text-left">Email</th>
                                <th class="px-6 py-3 text-left">Telepon</th>
                                <th class="px-6 py-3 text-left">Alamat</th>
                                <th class="px-6 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach ($Data as $d)
                                <tr class="data-row hover:bg-gray-50 transition-all"
                                    data-search="{{ strtolower(($d->nama_perusahaan ?? '') . ' ' . ($d->users->email ?? '') . ' ' . ($d->telepon_perusahaan ?? '') . ' ' . ($d->alamatperusahaan()->latest()->first()->detail ?? '')) }}">
                                    <td class="px-6 py-4 font-medium">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4">{{ $d->nama_perusahaan }}</td>
                                    <td class="px-6 py-4">{{ $d->users->email }}</td>
                                    <td class="px-6 py-4">{{ $d->telepon_perusahaan }}</td>
                                    <td class="px-6 py-4">
                                        {{ $d->alamatperusahaan()->latest()->first()->detail ?? 'belum ada data' }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <a href="/dashboard/superadmin/perusahaan/detail/{{ $d->id }}"
                                            class="bg-orange-500 hover:bg-orange-600 text-white px-3 py-1.5 rounded-md text-sm transition-all">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <table data-table="recruitment" class="data-table min-w-full divide-y divide-gray-200 text-sm text-gray-700" style="display:none;">
                        <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                            <tr>
                                <th class="px-6 py-3 text-left">ID</th>
                                <th class="px-6 py-3 text-left">Nama</th>
                                <th class="px-6 py-3 text-left">Email</th>
                                <th class="px-6 py-3 text-left">Telepon</th>
                                <th class="px-6 py-3 text-left">Alamat</th>
                                <th class="px-6 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach ($Recruitments as $recruitment)
                                @if ($recruitment->status === 'diterima')
                                    <tr data-search="{{ strtolower(($recruitment->lowongan_perusahaan->perusahaan->nama_perusahaan ?? '') . ' ' . ($recruitment->lowongan_perusahaan->perusahaan->users->email ?? '') . ' ' . ($recruitment->lowongan_perusahaan->perusahaan->telepon_perusahaan ?? '') . ' ' . ($recruitment->lowongan_perusahaan->perusahaan->alamatperusahaan()->latest()->first()->detail ?? '')) }}"
                                        class="data-row hover:bg-gray-50 transition-all">
                                        <td class="px-6 py-4 font-medium">{{ $loop->iteration }}</td>
                                        <td class="px-6 py-4">
                                            {{ $recruitment->lowongan_perusahaan->perusahaan->nama_perusahaan }}</td>
                                        <td class="px-6 py-4">
                                            {{ $recruitment->lowongan_perusahaan->perusahaan->users->email }}</td>
                                        <td class="px-6 py-4">
                                            {{ $recruitment->lowongan_perusahaan->perusahaan->telepon_perusahaan }}</td>
                                        <td class="px-6 py-4">
                                            {{ $recruitment->lowongan_perusahaan->perusahaan->alamatperusahaan()->latest()->first()->detail ?? 'belum ada data' }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <a href="/dashboard/superadmin/recrutiment/{{ $recruitment->pelamar->id }}"
                                                class="bg-orange-500 hover:bg-orange-600 text-white px-3 py-1.5 rounded-md text-sm transition-all">View</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>

                    <table data-table="talent_hunter" class="data-table min-w-full divide-y divide-gray-200 text-sm text-gray-700" style="display:none;">
                        <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                            <tr>
                                <th class="px-6 py-3 text-left">ID</th>
                                <th class="px-6 py-3 text-left">Nama</th>
                                <th class="px-6 py-3 text-left">Email</th>
                                <th class="px-6 py-3 text-left">Telepon</th>
                                <th class="px-6 py-3 text-left">Alamat</th>
                                <th class="px-6 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach ($Talent_hunter as $th)
                                <tr data-search="{{ strtolower(($th->perusahaan->nama_perusahaan ?? '') . ' ' . ($th->perusahaan->users->email ?? '') . ' ' . ($th->perusahaan->telepon_perusahaan ?? '') . ' ' . ($th->alamat ?? '')) }}"
                                    class="data-row hover:bg-gray-50 transition-all">
                                    <td class="px-6 py-4 font-medium">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4">{{ $th->perusahaan->nama_perusahaan }}</td>
                                    <td class="px-6 py-4">{{ $th->perusahaan->users->email }}</td>
                                    <td class="px-6 py-4">{{ $th->perusahaan->telepon_perusahaan }}</td>
                                    <td class="px-6 py-4">{{ $th->alamat }}</td>
                                    <td class="px-6 py-4 text-center">
                                        <a href="/dashboard/superadmin/talenthunter/{{ $th->id }}"
                                            class="bg-orange-500 hover:bg-orange-600 text-white px-3 py-1.5 rounded-md text-sm transition-all">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <table data-table="panggilan" class="data-table min-w-full divide-y divide-gray-200 text-sm text-gray-700" style="display:none;">
                        <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                            <tr>
                                <th class="px-6 py-3 text-left">ID</th>
                                <th class="px-6 py-3 text-left">Nama</th>
                                <th class="px-6 py-3 text-left">Email</th>
                                <th class="px-6 py-3 text-left">Telepon</th>
                                <th class="px-6 py-3 text-left">Kepentingan</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach ($Panggilan as $p)
                                @php
                                    $pelamar_Data = \App\Models\Pelamar::where('id', $p->pelamar_id)->get()->first();
                                @endphp
                                @if ($p->status === 'diterima')
                                    <tr data-search="{{ strtolower(($pelamar_Data->nama_pelamar ?? '') . ' ' . ($pelamar_Data->users->email ?? '') . ' ' . ($pelamar_Data->telepon_pelamar ?? '') . ' wawancara kerja') }}"
                                        class="data-row hover:bg-gray-50 transition-all">
                                        <td class="px-6 py-4 font-medium">{{ $loop->iteration }}</td>
                                        <td class="px-6 py-4">{{ $pelamar_Data->nama_pelamar ?? 'Tidak Ada Data' }}</td>
                                        <td class="px-6 py-4">{{ $pelamar_Data->users->email ?? 'Tidak Ada Data' }}</td>
                                        <td class="px-6 py-4">{{ $pelamar_Data->telepon_pelamar ?? 'Tidak Ada Data' }}
                                        </td>
                                        <td class="px-6 py-4">Wawancara Kerja</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function() {
            let selectedTab = localStorage.getItem('perusahaan_tab') || 'perusahaan';

            const mapTitle = {
                perusahaan: 'Daftar Perusahaan',
                recruitment: 'Daftar Recruitment',
                talent_hunter: 'Daftar Talent Hunter',
                panggilan: 'Daftar Panggilan'
            };

            function updateUI() {
                $('#tabSelect').val(selectedTab);
                $('#table_title').text(mapTitle[selectedTab] || 'Daftar Perusahaan');
                
                if (selectedTab === 'perusahaan') {
                    $('#addBtnWrapper').show();
                } else {
                    $('#addBtnWrapper').hide();
                }

                $('.data-table').hide();
                $('.data-table[data-table="'+ selectedTab +'"]').show();

                filterTable();
            }

            function filterTable() {
                let keyword = $('#searchInput').val().toLowerCase().trim();
                let activeTable = $('.data-table[data-table="'+ selectedTab +'"]');
                
                activeTable.find('.data-row').each(function() {
                    let searchData = String($(this).data('search')).toLowerCase();
                    if (keyword === '' || searchData.includes(keyword)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }

            $('#tabSelect').on('change', function() {
                selectedTab = $(this).val();
                localStorage.setItem('perusahaan_tab', selectedTab);
                updateUI();
            });

            $('#searchInput').on('input', function() {
                filterTable();
            });

            updateUI();
        });
    </script>
@endsection
