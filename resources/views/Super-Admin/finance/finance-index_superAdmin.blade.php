@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="p-6" x-data="financeTabs()">
        <div class="mb-5">
            <select x-model="selected" @change="saveState" class="bg-orange-500 text-white px-10 py-2 rounded-md">
                <option value="paket_harga">Paket Harga</option>
                <option value="riwayat">Riwayat</option>
                <option value="laporan">Laporan</option>
            </select>
        </div>

        {{-- PAKET HARGA --}}
        <div id="paket_harga_table" x-show="selected === 'paket_harga'" x-cloak>
            <div class="mb-10">
                <div class="flex justify-between items-center mx-2 my-2">
                    <h2 class="text-lg font-semibold mb-3">Paket Harga Koin</h2>
                    <a class="bg-orange-500 px-8 py-1 text-white rounded-lg"
                        href="/dashboard/superadmin/finance/edit/paketkoin">Edit</a>
                </div>
                <div class="overflow-x-auto bg-white rounded-xl shadow-md">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-orange-500 text-white">
                                <th class="py-3 px-4 text-left">Nama</th>
                                <th class="py-3 text-left">Harga</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @foreach ($koin as $k)
                                <tr>
                                    <td class="py-3 px-4">{{ $k->nama }}</td>
                                    <td class="py-3">{{ $k->harga }} Koin</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mb-10">
                <div class="flex justify-between items-center mx-2 my-2">
                    <h2 class="text-lg font-semibold mb-3">Paket Harga Pembayaran</h2>
                    <a class="bg-orange-500 px-8 py-1 text-white rounded-lg"
                        href="/dashboard/superadmin/finance/edit/paketpembayaran">Edit</a>
                </div>
                <div class="overflow-x-auto bg-white rounded-xl shadow-md">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-orange-500 text-white">
                                <th class="py-3 px-4 text-left">Nama</th>
                                <th class="py-3 text-left">Harga</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @foreach ($tunai as $t)
                                <tr>
                                    <td class="py-3 px-4">{{ $t->nama }}</td>
                                    <td class="py-3">Rp. {{ number_format($t->harga, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- RIWAYAT --}}
        <div id="riwayat_table" x-show="selected === 'riwayat'" x-cloak>
            <div class="mb-10">
                <h2 class="text-lg font-semibold mb-3">Riwayat Transaksi Tunai Terbaru</h2>
                <div class="overflow-x-auto bg-white rounded-xl shadow-md">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-orange-500 text-white">
                                <th class="py-3 px-4 text-center">No</th>
                                <th class="py-3 text-center">No.Refrensi</th>
                                <th class="py-3 text-center">Jenis</th>
                                <th class="py-3 text-center">Dari</th>
                                <th class="py-3 text-center">Sumber Dana</th>
                                <th class="py-3 text-center">Total Harga</th>
                                <th class="py-3 text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
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
                                    <tr>
                                        <td class="py-3 text-center">{{ $i++ }}</td>
                                        <td class="py-3 text-center">{{ $c->no_referensi }}</td>
                                        <td class="py-3 text-center">{{ $c->pesanan }}</td>
                                        <td class="py-3 text-center">{{ $c->dari }}</td>
                                        <td class="py-3 text-center">{{ $c->sumber_dana }}</td>
                                        <td class="py-3 text-center">Rp. {{ number_format($total ?? 0, 0, ',', '.') }}</td>
                                        @if ($c->status === 'diterima')
                                            <td class="py-3 text-center text-green-500">{{ $c->status }}</td>
                                        @elseif ($c->status === 'ditolak')
                                            <td class="py-3 text-center text-red-500">{{ $c->status }}</td>
                                        @else
                                            <td class="py-3 text-center">{{ $c->status }}</td>
                                        @endif
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mb-10">
                <h2 class="text-lg font-semibold mb-3">Riwayat Transaksi Koin Terbaru</h2>
                <div class="overflow-x-auto bg-white rounded-xl shadow-md">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-orange-500 text-white">
                                <th class="py-3 px-4 text-center">No</th>
                                <th class="py-3 text-center">No.Refrensi</th>
                                <th class="py-3 text-center">Jenis</th>
                                <th class="py-3 text-center">Dari</th>
                                <th class="py-3 text-center">Sumber Dana</th>
                                <th class="py-3 text-center">Total Koin</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @foreach ($koins as $k)
                                @if ($k->created_at->isToday())
                                    <tr>
                                        <td class="py-3 text-center">{{ $i++ }}</td>
                                        <td class="py-3 text-center">{{ $k->no_referensi }}</td>
                                        <td class="py-3 text-center">{{ $k->pesanan }}</td>
                                        <td class="py-3 text-center">{{ $k->dari }}</td>
                                        <td class="py-3 text-center">{{ $k->sumber_dana }}</td>
                                        <td class="py-3 text-center">{{ $k->total }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- LAPORAN --}}
        <div id="laporan_table" x-show="selected === 'laporan'" x-cloak x-data="laporanData({{ $transaksi }})">
            <div class="overflow-x-auto">
                <h1 class="text-2xl font-bold mb-2">Catatan Transaksi Penghasilan</h1>
                <p class="mb-6">
                    Hanya catatan transaksi dalam 12 bulan terakhir dapat ditampilkan.
                </p>

                <div class="bg-orange-500 rounded-lg p-4">
                    <h2 class="text-lg font-semibold mb-4 text-white">Riwayat Transaksi</h2>

                    <div class="flex gap-4 mb-4">
                        <div class="relative">
                            <select x-model="tahun" @change="filterData"
                                class="border border-orange-500 rounded-md px-10 py-1 text-sm focus:ring-2 focus:ring-orange-400 text-orange-500 font-bold">
                                <option value="">Tahun</option>
                                <template x-for="t in tahunList" :key="t">
                                    <option :value="t" x-text="t"></option>
                                </template>
                            </select>
                        </div>

                        <div class="relative">
                            <select x-model="bulan" @change="filterData"
                                class="border border-orange-500 rounded-md px-10 py-1 text-sm focus:ring-2 focus:ring-orange-400 text-orange-500 font-bold">
                                <option value="">Bulan</option>
                                <template x-for="(nama, key) in bulanList" :key="key">
                                    <option :value="key" x-text="nama"></option>
                                </template>
                            </select>
                        </div>

                    </div>

                    <div class="bg-white rounded-lg overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-orange-500 uppercase">
                                            Catatan</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-orange-500 uppercase">
                                            Pendapatan</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-orange-500 uppercase">Koin
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-orange-500 uppercase">
                                            Tanggal</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-orange-500 uppercase">
                                            Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <template x-if="filtered.length === 0">
                                        <tr>
                                            <td colspan="4" class="text-center py-4 text-gray-500">
                                                Tidak ada transaksi
                                            </td>
                                        </tr>
                                    </template>

                                    <template x-for="(row, i) in filtered" :key="i">
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-3 uppercase"
                                                x-text="`TRANSAKSI_${row.jenis_transaksi}_${row.tanggal}`"></td>
                                            <td class="px-6 py-3"
                                                x-text="row.jenis_transaksi === 'Pembelian Koin' ? '-' : formatRupiah(row.total_penghasilan)">
                                            </td>
                                            <td class="px-6 py-3" x-text="row.total_koin ?? '-'"></td>
                                            <td class="px-6 py-3"
                                                x-text="new Date(row.tanggal).toLocaleDateString('id-ID', {day:'2-digit', month:'long', year:'numeric'})">
                                            </td>
                                            <td class="px-6 py-3">
                                                <a :href="`/dashboard/superadmin/finance/detail/laporan/penghasilan/${row.tanggal}`"
                                                    class="inline-block hover:scale-105 transition">
                                                    <img src='{{ asset('Icon/icon-detail.png') }}' alt="Detail"
                                                        class="w-5 h-5 mx-auto">
                                                </a>
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function financeTabs() {
            return {
                selected: localStorage.getItem('finance_tab') || 'paket_harga',
                saveState() {
                    localStorage.setItem('finance_tab', this.selected);
                }
            }
        }

        function laporanData(initialData) {
            return {
                bulan: '',
                tahun: '',
                data: initialData,
                filtered: initialData,
                bulanList: {
                    1: 'Januari',
                    2: 'Februari',
                    3: 'Maret',
                    4: 'April',
                    5: 'Mei',
                    6: 'Juni',
                    7: 'Juli',
                    8: 'Agustus',
                    9: 'September',
                    10: 'Oktober',
                    11: 'November',
                    12: 'Desember'
                },
                tahunList: [2025, 2024, 2023, 2022],

                filterData() {
                    this.filtered = this.data.filter(item => {
                        const tgl = new Date(item.tanggal);
                        const matchBulan = this.bulan ? (tgl.getMonth() + 1) == this.bulan : true;
                        const matchTahun = this.tahun ? tgl.getFullYear() == this.tahun : true;
                        return matchBulan && matchTahun;
                    });
                },

                formatRupiah(v) {
                    return new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR'
                    }).format(v);
                }
            }
        }
    </script>
@endsection
