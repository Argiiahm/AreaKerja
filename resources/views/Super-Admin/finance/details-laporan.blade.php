@extends('Super-Admin.layouts.index')

@section('super_admin-content')
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
                    <a href="{{ route('laporan.browsershot', $tanggal) }}">
                        <i class="ph ph-arrow-line-down text-2xl cursor-pointer"></i>
                    </a>
                </div>
                <p><span class="font-medium">Username</span> : {{ Auth::user()->username }}</p>
                <p><span class="font-medium">Email</span> : {{ Auth::user()->email }}</p>
                {{-- <p><span class="font-medium">No.Telp</span> : 0816342825322</p> --}}
            </div>
        </div>


        <div class="rounded-2xl border border-gray-300 overflow-hidden shadow-sm">
            <h2 class="text-base font-semibold m-3">
                Laporan Transaksi Penghasilan — {{ \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }}
            </h2>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-gray-700 border-collapse min-w-[600px]">
                    <thead class="bg-orange-500 text-white font-semibold text-center">
                        <tr>
                            <th class="px-3 py-2">Transaksi</th>
                            <th class="px-3 py-2">Perusahaan</th>
                            <th class="px-3 py-2">Jenis Transaksi</th>
                            <th class="px-3 py-2">Sumber Dana</th>
                            <th class="px-3 py-2">Nominal IDR</th>
                            <th class="px-3 py-2">Transaksi Koin</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
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
                            <tr class="border-b">
                                <td class="px-3 py-2">{{ $item->id }}</td>
                                <td class="px-3 py-2">{{ $item->perusahaan ?? '-' }}</td>
                                <td class="px-3 py-2">{{ $item->pesanan }}</td>
                                <td class="px-3 py-2">{{ $item->sumber_dana }}</td>
                                <td class="px-3 py-2">
                                    {{ $item->harga ? 'Rp ' . number_format($item->harga, 0, ',', '.') : '-' }}
                                </td>
                                <td class="px-3 py-2">{{ $koin->harga ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-4 text-gray-500">Tidak ada transaksi pada tanggal ini.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="m-4 text-sm font-medium space-y-1">
                <p class="flex justify-between max-w-xs">
                    <span>Total Tunai</span>
                    <span>: Rp {{ number_format($totalTunai, 0, ',', '.') }}</span>
                </p>
                <p class="flex justify-between max-w-xs">
                    <span>Total Koin</span>
                    <span>: {{ number_format($totalKoin, 0, ',', '.') }} Koin</span>
                </p>
            </div>
        </div>

    </div>
@endsection
