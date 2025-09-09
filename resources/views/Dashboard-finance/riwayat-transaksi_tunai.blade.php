@extends('Dashboard-finance.layouts.index')

@section('finance-content')
    <div class="p-6">
        <div class="mb-10">
            <div class="flex justify-between items-center mx-2 my-2">
                <h2 class="text-lg font-semibold mb-3">Riwayat Tunai</h2>
            </div>
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
                            <th class="py-3 text-center">Detail</th>
                            <th class="py-3 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @foreach ($data as $d)
                        <tr>
                            <td class="py-3 text-center">{{$d->id}}</td>
                            <td class="py-3 text-center">{{$d->no_referensi}}</td>
                            <td class="py-3 text-center">{{$d->pesanan}}</td>
                            <td class="py-3 text-center">{{$d->dari}}</td>
                            <td class="py-3 text-center">{{$d->sumber_dana}}</td>
                            <td class="py-3 text-center">{{$d->total}}</td>
                            <td class="py-3 text-center">{{$d->status}}</td>
                            <td class="px-6 py-4">
                                <a href="/dashboard/superadmin/freeze/detail/{{ $d->id }}" class="">
                                    <img src="{{ asset('Icon/fzd.png') }}" alt="">
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
