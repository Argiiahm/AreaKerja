@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="p-6">
        <div class="mb-5">
            <select id="kategori_select_finance" class="bg-orange-500 text-white px-10 py-2 rounded-md" name=""
                id="">
                <option id="" value="paket_harga">Paket Harga</option>
                <option id="" value="riwayat">Riwayat</option>
                <option id="" value="laporan">Laporan</option>
            </select>
        </div>

        <div id="paket_harga_table" class="">
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

        <div id="riwayat_table" class="hidden">
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
                                $i = 1
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

        <div id="laporan_table" class="hidden">
            <div class="overflow-x-auto">
                <h1 class="text-2xl font-bold mb-2">Catatan Transaksi Penghasilan</h1>

                <p class="mb-6">
                    Hanya catatan transaksi dalam 12 bulan terakhir dapat ditampilkan. Silahkan download seluruh PDF
                    anda.
                </p>

                <div class="bg-orange-500 rounded-lg p-4">
                    <h2 class="text-lg font-semibold mb-4 text-white">Riwayat Koin</h2>

                    <div class="flex gap-4 mb-4">
                        <div class="relative">
                            <select class="bg-white text-gray-700 px-4 py-2 pr-8 rounded border appearance-none">
                                <option>Bulan</option>
                                <option>Januari</option>
                                <option>Februari</option>
                                <option>Maret</option>
                                <option>April</option>
                                <option>Mei</option>
                                <option>Juni</option>
                                <option>Juli</option>
                                <option>Agustus</option>
                                <option>September</option>
                                <option>Oktober</option>
                                <option>November</option>
                                <option>Desember</option>
                            </select>
                            <i class="fas fa-chevron-down absolute right-2 top-3 text-gray-500"></i>
                        </div>

                        <div class="relative">
                            <select class="bg-white text-gray-700 px-4 py-2 pr-8 rounded border appearance-none">
                                <option>Tahun</option>
                                <option>2024</option>
                                <option>2023</option>
                                <option>2022</option>
                            </select>
                            <i class="fas fa-chevron-down absolute right-2 top-3 text-gray-500"></i>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-orange-500 uppercase tracking-wider">
                                            Catatan Transaksi</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-orange-500 uppercase tracking-wider">
                                            Pendapatan</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-orange-500 uppercase tracking-wider">
                                            Kom</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-orange-500 uppercase tracking-wider">
                                            Tanggal</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-orange-500 uppercase tracking-wider">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            Catatan_Transaksi_November</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">100.000.000</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">100.000</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">25 Januari 2024
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <button class="text-orange-500 hover:text-orange-700">
                                                <i class="fas fa-download text-lg"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            Catatan_Transaksi_November</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">100.000.000</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">100.000</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">25 Januari 2024
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <button class="text-orange-500 hover:text-orange-700">
                                                {{-- <i class="fa fa-download text-lg"></i> --}}
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
