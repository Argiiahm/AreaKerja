@extends('layouts.index')

@section('content')
   
    <section class="relative w-full h-[90vh] pt-24 flex items-center justify-start">
        <img src="https://png.pngtree.com/background/20240507/original/pngtree-digital-marketing-website-displayed-on-rendered-office-desktop-picture-image_8837781.jpg"
            alt="Background"
            class="absolute inset-0 w-full h-full object-cover brightness-50">
        
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>

        <div class="relative z-10 flex items-center justify-start h-full px-10 lg:px-20 md:px-20">
            <div class="max-w-lg">
                <h1 class="text-4xl lg:text-5xl font-extrabold text-white mb-4 drop-shadow-md">
                    Lowongan Tersimpan
                </h1>
                <p class="text-gray-100 text-lg leading-relaxed">
                    Lowongan anda yang sudah tersimpan<br>
                    di sistem areakerja.com
                </p>
            </div>
        </div>
    </section>

    
    <section class="mx-10 mt-16 mb-20">
        @if ($rekrut->isEmpty())
            <div class="text-center py-16 bg-gray-50 rounded-2xl shadow-sm">
                <img src="{{ asset('image/empty-state.png') }}" alt="Empty" class="mx-auto w-48 opacity-70 mb-6">
                <p class="text-gray-500 text-lg">Belum ada lowongan yang tersimpan.</p>
            </div>
        @else
            <div class="grid grid-cols-1 gap-6">
                @foreach ($rekrut as $item)
                    <a href="/kandidat/rekrut/detail/{{ $item->id }}"
                        class="block bg-white border border-gray-100 rounded-2xl shadow-sm hover:shadow-lg hover:border-[#fa6601] transition-all duration-300 overflow-hidden">
                        <div class="flex flex-col lg:flex-row items-start lg:items-center gap-6 p-6">
                            <div class="flex-shrink-0">
                                <img src="{{ asset('Icon/seveninc.png') }}" alt="Logo"
                                    class="w-16 h-16 object-cover rounded-xl border border-gray-200 shadow-sm">
                            </div>

                            <div class="flex-1 min-w-0">
                                <p class="text-sm text-[#fa6601] font-semibold mb-1">
                                    {{ $item->lowongan_perusahaan->perusahaan->nama_perusahaan }}
                                </p>
                                <h1 class="text-lg font-bold text-gray-800 leading-tight mb-1">
                                    {{ $item->lowongan_perusahaan->nama }}
                                    <span class="text-gray-500 font-medium">- {{ $item->lowongan_perusahaan->jenis }}</span>
                                </h1>
                                <p class="text-sm text-gray-500 mb-4">{{ $item->lowongan_perusahaan->alamat }}</p>

                                <div class="flex flex-wrap justify-between items-center gap-y-3">
                                    <span
                                        class="bg-gray-100 text-gray-700 px-4 py-2 rounded-md font-medium text-sm shadow-sm">
                                        Rp.{{ number_format($item->lowongan_perusahaan->gaji_awal, 0, ',', '.') }}
                                        - Rp.{{ number_format($item->lowongan_perusahaan->gaji_akhir, 0, ',', '.') }}
                                        <span class="text-gray-500 font-normal">/ bulan</span>
                                    </span>

                                    <span class="text-sm text-gray-400 italic">
                                        Aktif 2 jam lalu
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </section>
@endsection
