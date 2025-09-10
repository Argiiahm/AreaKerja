@extends('Dashboard-finance.layouts.index')

@section('finance-content')
    <div class="p-6">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="bg-orange-500 text-white rounded-xl p-6 flex justify-between items-center shadow-md">
                <div>
                    <p class="text-base font-semibold">Total Omset</p>
                    Rp. {{ number_format($totalOmset, 0, ',', '.') }}
                </div>
                <div class="">
                    <div class="p-2">
                        <img src="{{ asset('Icon/dolar.png') }}" alt="">
                    </div>
                </div>
            </div>
            @php $no = 1; @endphp

            <div class="bg-orange-500 text-white rounded-xl p-6 flex justify-between items-center shadow-md">
                <div>
                    <p class="text-base font-semibold">Total Transaksi Koin</p>
                    <p class="text-lg font-bold">{{ $koin->sum('total') }}</p>
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
                            <th class="py-3 px-4 text-center">No</th>
                            <th class="py-3 text-center">No.Refrensi</th>
                            <th class="py-3 text-center">Jenis</th>
                            <th class="py-3 text-center">Dari</th>
                            <th class="py-3 text-center">Sumber Dana</th>
                            <th class="py-3 text-center">Total Koin</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @foreach ($koin as $k)
                            @if ($k->created_at->isToday())
                                <tr>
                                    <td class="py-3 text-center">{{ $no  }}</td>
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
                            <th class="py-3 text-center">Total Koin</th>
                            <th class="py-3 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @foreach ($cash as $c)
                            @if ($c->created_at->isToday() && $c->status !== 'pending')
                                <tr>
                                    <td class="py-3 text-center">{{ $no++ }}</td>
                                    <td class="py-3 text-center">{{ $c->no_referensi }}</td>
                                    <td class="py-3 text-center">{{ $c->pesanan }}</td>
                                    <td class="py-3 text-center">{{ $c->dari }}</td>
                                    <td class="py-3 text-center">{{ $c->sumber_dana }}</td>
                                    <td class="py-3 text-center">{{ $c->total }}</td>
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

    </div>
@endsection
