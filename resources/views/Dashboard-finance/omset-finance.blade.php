@extends('Dashboard-finance.layouts.index')

@section('finance-content')
    <div class="p-6">
        <div class="flex justify-between items-center">
            <h2 class="text-base font-semibold mb-4">Tampilkan Omset Perusahaan</h2>
            <div class="flex items-center gap-2 mb-3">
                <select class="border border-orange-500 rounded-md px-3 py-1 text-sm focus:ring-2 focus:ring-orange-400">
                    <option>Bulan</option>
                    <option>Januari</option>
                    <option>Februari</option>
                    <option>Maret</option>
                </select>
                <button class="bg-orange-500 text-white px-8 py-1 rounded-lg hover:bg-orange-600 transition">
                    Cari
                </button>
            </div>
        </div>

        <div class="rounded-2xl border border-gray-300 overflow-hidden">
            <div class="bg-orange-500 text-white text-center font-semibold py-2 rounded-t-2xl">
                Daftar Omset Perusahaan
            </div>

            <table class="w-full text-sm text-black border-collapse">
                <tbody>
                    <tr class="border-b">
                        <td class="px-4 py-3 border-r border-gray-300 w-1/2 font-medium">
                            Januari 2023
                        </td>
                        <td class="px-4 py-3 text-right font-semibold w-1/2">
                            Rp. 3.000.000
                        </td>
                    </tr>
                    <tr>
                        <td class="px-4 py-8 border-r border-gray-300"></td>
                        <td class="px-4 py-8">&nbsp;</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-6 text-sm font-medium">
            <p class="flex justify-between max-w-md">
                <span>Total Omset</span>
                <span>: Rp 3.000.000,00</span>
            </p>
            <p class="flex justify-between max-w-md mt-1">
                <span>Rata-rata</span>
                <span>: Rp 3.000.000,00</span>
            </p>
        </div>

        <div class="border-t border-orange-400 mt-4"></div>

        <div class="mt-4">
            <button class="bg-orange-500 text-white px-6 py-1 rounded-full text-sm hover:bg-orange-600 transition">
                Unduh
            </button>
        </div>
    </div>
@endsection
