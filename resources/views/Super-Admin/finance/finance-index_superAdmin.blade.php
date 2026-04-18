@extends('Super-Admin.layouts.index')

@section('super_admin-content')
<div class="p-8 bg-[#F9FAFB] min-h-screen">
    {{-- Header Section --}}
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Manajemen Keuangan</h1>
        <p class="text-sm text-gray-500 mt-1">Kelola paket layanan, riwayat transaksi, dan laporan pendapatan.</p>
    </div>

    {{-- Custom Tabs Design --}}
    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm mb-6 flex overflow-x-auto no-scrollbar">
        <button class="finance-tab flex-1 md:flex-none px-6 py-4 text-sm font-semibold text-gray-500 border-b-2 border-transparent hover:text-gray-700 transition-colors focus:outline-none" data-tab="paket_harga">
            Paket Harga
        </button>
        <button class="finance-tab flex-1 md:flex-none px-6 py-4 text-sm font-semibold text-gray-500 border-b-2 border-transparent hover:text-gray-700 transition-colors focus:outline-none" data-tab="riwayat">
            Riwayat
        </button>
        <button class="finance-tab flex-1 md:flex-none px-6 py-4 text-sm font-semibold text-gray-500 border-b-2 border-transparent hover:text-gray-700 transition-colors focus:outline-none" data-tab="laporan">
            Laporan
        </button>
    </div>

    {{-- TAB CONTENT: PAKET HARGA --}}
    <div id="paket_harga_table" class="tab-content hidden space-y-6">
        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
                <h2 class="text-sm font-bold text-gray-900 uppercase tracking-widest">Harga Koin</h2>
                <a href="/dashboard/superadmin/finance/edit/paketkoin" class="text-xs font-semibold text-blue-600 hover:text-blue-800 bg-blue-50 px-3 py-1.5 rounded-lg transition-colors">
                    <i class="ph ph-pencil-simple align-middle mr-1"></i> Edit
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-white">
                        <tr>
                            <th class="px-6 py-4 border-b border-gray-100 text-xs font-bold text-gray-400 uppercase tracking-widest">Nama Paket</th>
                            <th class="px-6 py-4 border-b border-gray-100 text-xs font-bold text-gray-400 uppercase tracking-widest">Harga / Koin</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach ($koin as $k)
                            <tr class="hover:bg-gray-50/50 transition-colors group">
                                <td class="px-6 py-4">
                                    <span class="text-sm font-semibold text-gray-900">{{ $k->nama }}</span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600 font-mono">
                                    {{ $k->harga }} Koin
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
                <h2 class="text-sm font-bold text-gray-900 uppercase tracking-widest">Paket Pembayaran (Tunai)</h2>
                <a href="/dashboard/superadmin/finance/edit/paketpembayaran" class="text-xs font-semibold text-blue-600 hover:text-blue-800 bg-blue-50 px-3 py-1.5 rounded-lg transition-colors">
                    <i class="ph ph-pencil-simple align-middle mr-1"></i> Edit
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-white">
                        <tr>
                            <th class="px-6 py-4 border-b border-gray-100 text-xs font-bold text-gray-400 uppercase tracking-widest">Nama Paket</th>
                            <th class="px-6 py-4 border-b border-gray-100 text-xs font-bold text-gray-400 uppercase tracking-widest">Harga Tunai</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach ($tunai as $t)
                            <tr class="hover:bg-gray-50/50 transition-colors group">
                                <td class="px-6 py-4">
                                    <span class="text-sm font-semibold text-gray-900">{{ $t->nama }}</span>
                                </td>
                                <td class="px-6 py-4 text-sm text-green-600 font-mono font-medium">
                                    Rp. {{ number_format($t->harga, 0, ',', '.') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- TAB CONTENT: RIWAYAT --}}
    <div id="riwayat_table" class="tab-content hidden space-y-6">
        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
                <h2 class="text-sm font-bold text-gray-900 uppercase tracking-widest">Transaksi Tunai Hari Ini</h2>
            </div>
            <div class="overflow-x-auto no-scrollbar">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-white border-b border-gray-100">
                        <tr>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">No</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest text-center">Refrensi</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Jenis</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Dari</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Sumber</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest text-right">Total</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @php
                            use App\Models\HargaPembayaran;
                            $i = 1;
                        @endphp
                        @foreach ($cash->sortByDesc('updated_at') as $c)
                            @if ($c->created_at->isToday() && $c->status !== 'pending')
                                @php
                                    $pembayaran = HargaPembayaran::where('nama', $c->pesanan)->first();
                                    $total = $pembayaran->harga ?? 0;
                                @endphp
                                <tr class="hover:bg-gray-50/50 transition-colors group">
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $i++ }}</td>
                                    <td class="px-6 py-4 text-xs font-mono text-gray-500 text-center uppercase">{{ $c->no_referensi }}</td>
                                    <td class="px-6 py-4 text-sm font-semibold text-gray-900">{{ $c->pesanan }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $c->dari }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $c->sumber_dana }}</td>
                                    <td class="px-6 py-4 text-sm font-mono font-medium text-green-600 text-right">
                                        Rp {{ number_format($total ?? 0, 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        @if (strtolower($c->status) === 'diterima' || strtolower($c->status) === 'success')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-green-50 text-green-600 border border-green-100 uppercase">Sukses</span>
                                        @elseif (strtolower($c->status) === 'ditolak' || strtolower($c->status) === 'failed' || strtolower($c->status) === 'batal')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-red-50 text-red-600 border border-red-100 uppercase">Gagal</span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-gray-100 text-gray-500 border border-gray-200 uppercase">{{ $c->status }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
                <h2 class="text-sm font-bold text-gray-900 uppercase tracking-widest">Transaksi Koin Hari Ini</h2>
            </div>
            <div class="overflow-x-auto no-scrollbar">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-white border-b border-gray-100">
                        <tr>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">No</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest text-center">Refrensi</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Jenis</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Dari</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Sumber</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest text-right">Total Koin</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach ($koins as $k)
                            @if ($k->created_at->isToday())
                                <tr class="hover:bg-gray-50/50 transition-colors group">
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $i++ }}</td>
                                    <td class="px-6 py-4 text-xs font-mono text-gray-500 text-center uppercase">{{ $k->no_referensi }}</td>
                                    <td class="px-6 py-4 text-sm font-semibold text-gray-900">{{ $k->pesanan }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $k->dari }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $k->sumber_dana }}</td>
                                    <td class="px-6 py-4 text-sm font-mono font-semibold text-yellow-600 text-right">{{ $k->total }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- TAB CONTENT: LAPORAN --}}
    <div id="laporan_table" class="tab-content hidden space-y-6">
        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-2">Laporan Penghasilan</h2>
            <p class="text-sm text-gray-500 mb-6">Riwayat dicatat berdasarkan 12 bulan terakhir atau sesuai filter. Pilih filter di bawah ini untuk spesifikasi data.</p>
            
            <div class="flex flex-wrap gap-3 mb-6 bg-gray-50/50 p-4 rounded-xl border border-gray-100">
                <select id="laporanTahun" class="border border-gray-200 rounded-xl px-4 py-2.5 text-sm font-medium text-gray-700 focus:ring-1 focus:ring-gray-900 outline-none w-full md:w-40 bg-white">
                    <option value="">Semua Tahun</option>
                    <option value="2025">2025</option>
                    <option value="2024">2024</option>
                    <option value="2023">2023</option>
                    <option value="2022">2022</option>
                </select>

                <select id="laporanBulan" class="border border-gray-200 rounded-xl px-4 py-2.5 text-sm font-medium text-gray-700 focus:ring-1 focus:ring-gray-900 outline-none w-full md:w-48 bg-white">
                    <option value="">Semua Bulan</option>
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
            </div>

            <div class="border border-gray-100 rounded-xl overflow-hidden overflow-x-auto no-scrollbar">
                <table class="w-full text-left">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest border-b border-gray-100">Kode Catatan</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest border-b border-gray-100">Pendapatan</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest border-b border-gray-100">Koin</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest border-b border-gray-100">Tanggal</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest border-b border-gray-100 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="laporan_tbody" class="divide-y divide-gray-50">
                        {{-- Data is injected via JS --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Tab Implementation
        const tabs = document.querySelectorAll('.finance-tab');
        const contents = document.querySelectorAll('.tab-content');
        
        let selectedTab = localStorage.getItem('finance_tab') || 'paket_harga';

        function updateTabs() {
            tabs.forEach(tab => {
                tab.classList.remove('border-gray-900', 'text-gray-900');
                tab.classList.add('border-transparent', 'text-gray-500');
                if (tab.dataset.tab === selectedTab) {
                    tab.classList.remove('border-transparent', 'text-gray-500');
                    tab.classList.add('border-gray-900', 'text-gray-900');
                }
            });

            contents.forEach(content => {
                content.classList.add('hidden');
                if (content.id === selectedTab + '_table') {
                    content.classList.remove('hidden');
                }
            });
        }

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                selectedTab = tab.dataset.tab;
                localStorage.setItem('finance_tab', selectedTab);
                updateTabs();
            });
        });

        updateTabs();

        // Laporan Filtering Logic
        let initialData = {!! json_encode($transaksi) !!};
        let bulanSelect = document.getElementById('laporanBulan');
        let tahunSelect = document.getElementById('laporanTahun');

        function filterLaporan() {
            let bulan = bulanSelect.value;
            let tahun = tahunSelect.value;

            let filtered = initialData.filter(function (item) {
                let tgl = new Date(item.tanggal);
                let matchBulan = bulan ? (tgl.getMonth() + 1) == bulan : true;
                let matchTahun = tahun ? tgl.getFullYear() == tahun : true;
                return matchBulan && matchTahun;
            });
            renderLaporan(filtered);
        }

        function formatRupiah(v) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(v);
        }

        function renderLaporan(data) {
            let tbody = document.getElementById('laporan_tbody');
            tbody.innerHTML = '';

            if (data.length === 0) {
                tbody.innerHTML = '<tr><td colspan="5" class="text-center py-8 text-sm text-gray-400 bg-gray-50/50">Tidak ada data transaksi.</td></tr>';
                return;
            }

            data.forEach(function (row) {
                let formattedDate = new Date(row.tanggal).toLocaleDateString('id-ID', { day: '2-digit', month: 'long', year: 'numeric' });
                let pendapatan = row.jenis_transaksi === 'Pembelian Koin' ? '<span class="text-gray-400">-</span>' : '<span class="text-green-600 font-mono font-medium">' + formatRupiah(row.total_penghasilan) + '</span>';
                let koin = row.total_koin ? '<span class="text-yellow-600 font-mono font-medium">' + row.total_koin + '</span>' : '<span class="text-gray-400">-</span>';

                let tr = document.createElement('tr');
                tr.className = 'hover:bg-gray-50/50 transition-colors group';
                tr.innerHTML = `
                    <td class="px-6 py-4 text-xs font-mono text-gray-600"><span class="bg-gray-100 px-2 py-1 rounded">TRX_${row.jenis_transaksi.substring(0,3).toUpperCase()}_${row.tanggal.replace(/-/g, '')}</span></td>
                    <td class="px-6 py-4 text-sm">${pendapatan}</td>
                    <td class="px-6 py-4 text-sm">${koin}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">${formattedDate}</td>
                    <td class="px-6 py-4 text-center">
                        <a href="/dashboard/superadmin/finance/detail/laporan/penghasilan/${row.tanggal}" class="p-2 text-gray-400 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-all inline-block">
                            <i class="ph ph-list-magnifying-glass text-lg"></i>
                        </a>
                    </td>
                `;
                tbody.appendChild(tr);
            });
        }

        tahunSelect.addEventListener('change', filterLaporan);
        bulanSelect.addEventListener('change', filterLaporan);

        // Initial render
        filterLaporan();
    });
</script>
@endsection