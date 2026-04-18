@extends('Super-Admin.layouts.index')

@section('super_admin-content')
<div class="p-8 bg-[#F9FAFB] min-h-screen">
    <div class="max-w-5xl mx-auto">
        {{-- Header & Action Buttons --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div class="flex items-center gap-4">
                <a href="/dashboard/superadmin/finance" class="p-2 bg-white border border-gray-200 rounded-xl text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                    <i class="ph ph-arrow-left text-xl"></i>
                </a>
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Detail Laporan</h1>
                    <p class="text-sm text-gray-500 mt-1">Rincian transaksi pada {{ \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }}.</p>
                </div>
            </div>
            
            <div class="flex items-center gap-3">
                <button onclick="window.print()" type="button" class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 rounded-xl transition-colors shadow-sm hidden md:inline-flex items-center">
                    <i class="ph ph-printer mr-2 text-lg"></i> Cetak
                </button>
                <a href="{{ route('laporan.browsershot', $tanggal) }}" class="px-5 py-2.5 text-sm font-semibold text-white bg-gray-900 hover:bg-black rounded-xl transition-colors shadow-sm inline-flex items-center">
                    <i class="ph ph-download-simple mr-2 text-lg"></i> Unduh PDF
                </a>
            </div>
        </div>

        {{-- Laporan Card --}}
        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden" id="printable-area">
            {{-- Kop Surat / Header Laporan --}}
            <div class="p-8 border-b border-gray-100 flex flex-col md:flex-row justify-between items-start md:items-center gap-6 bg-gray-50/30">
                <div>
                    <div class="flex items-center mb-3">
                        <img src="{{ asset('image/logo-areakerja.png') }}" alt="Logo AreaKerja" class="h-10 mr-3">
                        <div>
                            <span class="text-xl font-bold text-orange-600 block leading-none">AreaKerja.com</span>
                            <span class="text-[10px] text-gray-400 font-medium tracking-widest uppercase">Portal Lowongan Kerja</span>
                        </div>
                    </div>
                    <p class="text-xs text-gray-500 leading-relaxed max-w-sm">
                        Jl. Laksda Adisucipto No.80, Ambarukmo, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281
                    </p>
                </div>
                
                <div class="text-right w-full md:w-auto p-4 bg-white border border-gray-100 rounded-xl shadow-sm">
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-2">Informasi Akun</p>
                    <p class="text-sm font-semibold text-gray-900 mb-1">{{ Auth::user()->username }}</p>
                    <p class="text-xs text-gray-500 flex items-center justify-end gap-1"><i class="ph ph-envelope-simple"></i> {{ Auth::user()->email }}</p>
                </div>
            </div>

            {{-- Title --}}
            <div class="py-6 px-8 text-center border-b border-gray-100">
                <h2 class="text-lg font-bold text-gray-900 uppercase tracking-widest">Laporan Transaksi Penghasilan</h2>
                <p class="text-sm text-gray-500 font-medium mt-1">{{ \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }}</p>
            </div>

            {{-- Table Data --}}
            <div class="overflow-x-auto no-scrollbar">
                <table class="w-full text-left border-collapse min-w-[800px]">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest border-b border-gray-100">ID</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest border-b border-gray-100">Perusahaan</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest border-b border-gray-100">Jenis Transaksi</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest border-b border-gray-100">Sumber</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest border-b border-gray-100 text-right">Nominal (Rp)</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest border-b border-gray-100 text-right">Koin</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @php
                            use App\Models\HargaKoin;
                            $totalKoin = 0;
                        @endphp
                        @forelse ($detail as $item)
                            @php
                                $koin = HargaKoin::where('nama', $item->pesanan)->first();
                                if ($koin && isset($koin->harga)) {
                                    $totalKoin += $koin->harga;
                                }
                            @endphp
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="px-6 py-4 text-xs font-mono text-gray-500">#{{ $item->id }}</td>
                                <td class="px-6 py-4 text-sm font-semibold text-gray-900">{{ $item->perusahaan ?? '-' }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $item->pesanan }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $item->sumber_dana }}</td>
                                <td class="px-6 py-4 text-sm font-mono font-medium text-green-600 text-right">
                                    {{ $item->harga ? number_format($item->harga, 0, ',', '.') : '-' }}
                                </td>
                                <td class="px-6 py-4 text-sm font-mono font-medium text-yellow-600 text-right">
                                    {{ $koin->harga ?? '-' }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-8 text-center text-gray-400 text-sm bg-gray-50/50">Tidak ada transaksi pada tanggal ini.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Summary Footer --}}
            <div class="bg-gray-50/80 p-8 border-t border-gray-100 flex flex-col md:flex-row justify-end items-end gap-6">
                <div class="w-full md:w-80 space-y-3">
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-gray-500 font-medium">Total Koin Dikeluarkan</span>
                        <span class="font-mono font-bold text-yellow-600">{{ number_format($totalKoin, 0, ',', '.') }} Koin</span>
                    </div>
                    <div class="h-px bg-gray-200 w-full"></div>
                    <div class="flex justify-between items-center text-base">
                        <span class="text-gray-900 font-bold uppercase tracking-wider text-xs">Total Pendapatan Tunai</span>
                        <span class="font-mono font-bold text-green-600 text-lg">Rp {{ number_format($totalTunai, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @media print {
        body * {
            visibility: hidden;
        }
        #printable-area, #printable-area * {
            visibility: visible;
        }
        #printable-area {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            border: none !important;
            box-shadow: none !important;
        }
    }
</style>
@endsection