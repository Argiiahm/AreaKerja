@extends('Dashboard-finance.layouts.index')

@section('finance-content')
    <div class="p-6">
        <div class="mb-10">
            <div class="flex justify-between items-center mx-2 my-2">
                <h2 class="text-lg font-semibold mb-3">Riwayat Koin</h2>
                <a class="bg-orange-500 px-8 py-1 text-white rounded-lg" href="">Edit</a>
            </div>
            <div class="overflow-x-auto bg-white rounded-xl shadow-md">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-orange-500 text-white">
                            <th class="py-3 px-4 text-left">No</th>
                            <th class="py-3 text-left">No.Refrensi</th>
                            <th class="py-3 text-left">Jenis</th>
                            <th class="py-3 text-left">Dari</th>
                            <th class="py-3 text-left">Sumber Dana</th>
                            <th class="py-3 text-left">Total Koin</th>
                            <th class="py-3 text-left">Detail</th>
                            <th class="py-3 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
