@extends('Dashboard-finance.layouts.index')

@section('finance-content')
    <div class="p-6">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="bg-orange-500 text-white rounded-xl p-6 flex justify-between items-center shadow-md">
                <div>
                    <p class="text-base font-semibold">Total Omset</p>
                    <p class="text-lg font-bold">Rp. 2.000.000</p>
                </div>
                <div class="">
                    <div class="p-2">
                        <img src="{{ asset('Icon/dolar.png') }}" alt="">
                    </div>
                </div>
            </div>

            <div class="bg-orange-500 text-white rounded-xl p-6 flex justify-between items-center shadow-md">
                <div>
                    <p class="text-base font-semibold">Total Transaksi Koin</p>
                    <p class="text-lg font-bold">40.000</p>
                </div>
                <div class="rounded-full">
                    <div class="p-2">
                        <img src="{{ asset('Icon/coin.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-10">
            <h2 class="text-lg font-semibold mb-3">Riwayat Transaksi Koin Terbaru</h2>
            <div class="overflow-x-auto bg-white rounded-xl shadow-md">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-orange-500 text-white">
                            <th class="py-3 px-4 text-left">No</th>
                            <th class="py-3 px-4 text-left">No. Referensi</th>
                            <th class="py-3 px-4 text-left">Pesanan</th>
                            <th class="py-3 px-4 text-left">Dari</th>
                            <th class="py-3 px-4 text-left">Sumber Dana</th>
                            <th class="py-3 px-4 text-left">Tanggal</th>
                            <th class="py-3 px-4 text-left">Koin</th>
                            <th class="py-3 px-4 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        <tr>
                            <td class="py-3 px-4">1</td>
                            <td class="py-3 px-4">991773493631</td>
                            <td class="py-3 px-4">Open CV</td>
                            <td class="py-3 px-4">AppleCorp.</td>
                            <td class="py-3 px-4">Koin AreaKerja</td>
                            <td class="py-3 px-4">17 Juni 2024</td>
                            <td class="py-3 px-4">10 Koin</td>
                            <td class="py-3 px-4 font-semibold text-red-500">Gagal</td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4">2</td>
                            <td class="py-3 px-4">991773493632</td>
                            <td class="py-3 px-4">Open CV</td>
                            <td class="py-3 px-4">AppleCorp.</td>
                            <td class="py-3 px-4">Koin AreaKerja</td>
                            <td class="py-3 px-4">17 Juni 2024</td>
                            <td class="py-3 px-4">10 Koin</td>
                            <td class="py-3 px-4 font-semibold text-green-600">Sukses</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
