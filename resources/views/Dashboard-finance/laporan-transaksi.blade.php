@extends('Dashboard-finance.layouts.index')

@section('finance-content')
    <div class="p-6">
        <div class="mb-10">
            <div class="mb-3">
                <h2 class="text-lg font-semibold">Laporan Transaksi Penghasilan</h2>
                <p class="text-zinc-400">
                    Hanya catatan transaksi dalam 12 bulan terakhir akan dipertahankan.
                    Silakan download salinan PDF Anda.
                </p>
            </div>

            <div class="flex items-center gap-2 mb-3 justify-end">
                <form action="" method="GET">
                    <select name="bulan" onchange="this.form.submit()"
                        class="border border-orange-500 rounded-md px-10 py-1 text-sm focus:ring-2 focus:ring-orange-400 text-orange-500 font-bold">
                        <option disabled {{ !$bulan ? 'selected' : '' }}>Periode</option>
                        @foreach ($bulanList as $key => $namaBulan)
                            <option value="{{ $key }}" {{ $bulan == $key ? 'selected' : '' }}>
                                {{ $namaBulan }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>

            <div class="overflow-x-auto bg-white rounded-xl shadow-md">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-orange-500 text-white">
                            <th class="py-3 px-4 text-left">Tanggal</th>
                            <th class="py-3 px-4 text-left">Jenis Transaksi</th>
                            <th class="py-3 px-4 text-left">Total Penghasilan</th>
                            <th class="py-3 px-4 text-left">Total Koin</th>
                            <th class="py-3 px-4 text-left">Total Transaksi</th>
                            <th class="py-3 px-4 text-left">Detail</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @forelse ($transaksi as $row)
                            <tr>
                                <td class="py-3 px-4">
                                    {{ \Carbon\Carbon::parse($row->tanggal)->translatedFormat('d F Y') }}
                                </td>

                                <td class="py-3 px-4">
                                    {{ $row->jenis_transaksi }}
                                </td>

                                <td class="py-3 px-4">
                                    @if ($row->jenis_transaksi === 'Pembelian Koin')
                                        -
                                    @else
                                        {{ 'Rp ' . number_format($row->total_penghasilan, 0, ',', '.') }}
                                    @endif
                                </td>

                                <td class="py-3 px-4">
                                    {{ $row->total_koin ?? 0 }}
                                </td>

                                <td class="py-3 px-4">
                                    {{ $row->total_transaksi }}
                                </td>

                                <td class="py-3 px-4">
                                    <a href="{{ url('/dashboard/finance/laporan/penghasilan/' . $row->tanggal) }}">
                                        <img src="{{ asset('Icon/icon-detail.png') }}" alt="Detail">
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-3 px-4 text-center text-gray-500">
                                    Tidak ada transaksi
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
