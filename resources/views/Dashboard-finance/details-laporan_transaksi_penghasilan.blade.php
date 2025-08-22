@extends('Dashboard-finance.layouts.index')

@section('finance-content')
    <div class="p-6 shadow-lg rounded-md">
        <div class="flex flex-col md:flex-row justify-between gap-4 mb-6">
            <div>
                <div class="flex items-center mb-2">
                    <img src="{{ asset('image/logo-areakerja.png') }}" alt="Logo" class="h-8 mr-2">
                    <span class="text-xl font-bold text-orange-600">areakerja.com</span>
                </div>
                <p class="text-xs text-gray-700 leading-snug max-w-md">
                    Jl. Laksda Adisucipto No.80, Ambarukmo, Caturtunggal, Kec.<br>
                    Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281
                </p>
            </div>
            <div class="text-sm">
                <div class="flex items-center gap-6 justify-end text-orange-500 mb-2">
                    <i class="ph ph-printer text-2xl cursor-pointer"></i>
                    <i class="ph ph-arrow-line-down text-2xl cursor-pointer"></i>
                </div>
                <p><span class="font-medium">Username</span> : Finance</p>
                <p><span class="font-medium">Email</span> : finance.group@gmail.com</p>
                <p><span class="font-medium">No.Telp</span> : 0816342825322</p>
            </div>
        </div>

        <h2 class="text-base font-semibold mb-3">Laporan Transaksi Penghasilan</h2>

        <div class="rounded-2xl border border-gray-300 overflow-hidden shadow-sm">
            <div class="bg-orange-500 text-white text-sm font-semibold grid grid-cols-6 text-center py-2 min-w-[600px]">
                <div>Transaksi</div>
                <div>Perusahaan</div>
                <div>Jenis Transaksi</div>
                <div>Sumber Dana</div>
                <div>Nominal IDR</div>
                <div>Transaksi Koin</div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-gray-700 border-collapse min-w-[600px]">
                    <tbody>
                        <tr class="border-b">
                            <td class="px-3 py-2 text-center">691174849221</td>
                            <td class="px-3 py-2 text-center">Applecorp.</td>
                            <td class="px-3 py-2 text-center">Pasang Lowongan</td>
                            <td class="px-3 py-2 text-center">BCA</td>
                            <td class="px-3 py-2 text-center">Rp. 1.000.000</td>
                            <td class="px-3 py-2 text-center">-</td>
                        </tr>
                        <tr class="border-b">
                            <td class="px-3 py-2 text-center">691174849221</td>
                            <td class="px-3 py-2 text-center">Applecorp.</td>
                            <td class="px-3 py-2 text-center">Pasang Lowongan</td>
                            <td class="px-3 py-2 text-center">Koin</td>
                            <td class="px-3 py-2 text-center">-</td>
                            <td class="px-3 py-2 text-center">30</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-4 text-sm font-medium space-y-1">
            <p class="flex justify-between max-w-xs">
                <span>Total Tunai</span>
                <span>: Rp 4.000.000,00</span>
            </p>
            <p class="flex justify-between max-w-xs">
                <span>Total Koin</span>
                <span>: 150 Koin</span>
            </p>
        </div>
    </div>
@endsection
