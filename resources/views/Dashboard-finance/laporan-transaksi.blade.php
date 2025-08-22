@extends('Dashboard-finance.layouts.index')

@section('finance-content')
    <div class="p-6">
        <div class="mb-10">
            <div class="mb-3">
                <h2 class="text-lg font-semibold">Laporan Transaksi Penghasilan</h2>
                <p class="text-zinc-400">Hanya catatan transaksi dalam 12 bulan terakhir akan dipertahankan. Silahkan
                    download salinan PDF anda.</p>
            </div>
                <div class="flex items-center gap-2 mb-3 justify-end">
                <select class="border border-orange-500 rounded-md px-10  py-1 text-sm focus:ring-2 focus:ring-orange-400 text-orange-500 font-bold">
                    <option selected disabled>Periode</option>
                    <div class="text-black font-bold">
                        <option>Januari</option>
                        <option>Februari</option>
                        <option>Maret</option> 
                    </div>
                </select>
            </div>
            <div class="overflow-x-auto bg-white rounded-xl shadow-md">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-orange-500 text-white">
                            <th class="py-3 px-4 text-left">Tanggal</th>
                            <th class="py-3 px-4 text-left">Jenis Transaksi</th>
                            <th class="py-3 px-4 text-left">Penghasilan</th>
                            <th class="py-3 px-4 text-left">Koin</th>
                            <th class="py-3 px-4 text-left">Detail</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        <tr>
                            <td class="py-3 px-4">17 Juni 2024</td>
                            <td class="py-3 px-4">Top up</td>
                            <td class="py-3 px-4">Rp.1.000.000</td>
                            <td class="py-3 px-4">10</td>
                            <td class="py-3 px-4">
                                <a href="/dashboard/finance/laporan/penghasilan">
                                    <img src="{{ asset('Icon/icon-detail.png') }}" alt="">
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
