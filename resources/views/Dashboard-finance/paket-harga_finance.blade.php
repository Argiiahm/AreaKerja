@extends('Dashboard-finance.layouts.index')

@section('finance-content')
    <div class="p-6">
        <div class="mb-10">
            <div class="flex justify-between items-center mx-2 my-2">
                <h2 class="text-lg font-semibold mb-3">Paket Harga Koin</h2>
                <a class="bg-orange-500 px-8 py-1 text-white rounded-lg"
                    href="/dashboard/finance/paketharga/edit/koin">Edit</a>
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
                <a class="bg-orange-500 px-8 py-1 text-white rounded-lg" href="/dashboard/finance/paketharga/edit/harga">Edit</a>
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
                                <td class="py-3">Rp. {{ $t->harga }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
