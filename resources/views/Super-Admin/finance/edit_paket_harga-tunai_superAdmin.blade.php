@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="p-6">
        <div class="mb-10">
            <div class="mx-2 my-2">
                <h2 class="text-lg font-semibold mb-3">Paket Harga Tunai</h2>
            </div>
            <form action="/dashboard/superadmin/update/harga/tunai" method="POST">
                @csrf
                @method('PUT')
                <div class="overflow-x-auto bg-white rounded-xl shadow-md">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-orange-500 text-white">
                                <th class="py-3 px-4 text-left">Nama</th>

                                <th class="py-3 text-center">Harga</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @foreach ($harga as $h)
                                <tr>
                                    <td class="py-3 px-4">{{ $h->nama }}</td>
                                    <td class="text-center">
                                        <div class="inline-flex items-center bg-gray-200 px-5 py-1 rounded">
                                            <input type="hidden" name="id[]" value="{{ $h->id }}">
                                            <span class="mr-1">Rp.</span>
                                            <input type="number" name="harga[]" type="text"
                                                class="bg-transparent w-20 text-center outline-none"
                                                value="{{ $h->harga }}">
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="my-5 flex justify-center">
                    <button class="bg-orange-500 px-10 py-2 rounded-lg text-white font-semibold">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
