@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="p-6">
        <div class="mb-10">
            <h2 class="text-lg font-semibold mb-3">Paket Harga Koin</h2>
            <div class="overflow-x-auto bg-white rounded-xl shadow-md">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-orange-500 text-white">
                            <th class="py-3 px-4 text-left">Nama</th>
                            <th class="py-3 text-left">Harga</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        <tr>
                            <td class="py-3 px-4">AppleCorp.</td>
                            <td class="py-3">150 Koin</td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4">AppleCorp.</td>
                            <td class="py-3">150 Koin</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="flex justify-center mt-5">
                <button class="bg-orange-500 px-10 py-2 rounded-full text-white">Simpan</button>
            </div>
        </div>
@endsection
