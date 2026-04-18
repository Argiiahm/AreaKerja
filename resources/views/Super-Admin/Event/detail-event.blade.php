@extends('Super-Admin.layouts.index')

@section('super_admin-content')
<div class="p-8 bg-[#F9FAFB] min-h-screen">
    <div class="max-w-5xl mx-auto">
        {{-- Header Section --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div class="flex items-center gap-4">
                <a href="/dashboard/superadmin/event" class="p-2 bg-white border border-gray-200 rounded-xl text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                    <i class="ph ph-arrow-left text-xl"></i>
                </a>
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Detail Event</h1>
                    <p class="text-sm text-gray-500 mt-1">Informasi lengkap mengenai event ini.</p>
                </div>
            </div>
            
            <div class="flex items-center gap-3">
                <form action="/dashboard/superadmin/event/hapus/{{ $Data->id }}" method="POST" class="m-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus acara ini?')" 
                        class="px-5 py-2.5 text-sm font-semibold text-red-600 bg-red-50 hover:bg-red-100 rounded-xl transition-colors">
                        <i class="ph ph-trash align-middle mr-1"></i> Hapus
                    </button>
                </form>
                <a href="/dashboard/superadmin/event/edit/{{ $Data->id }}" class="bg-gray-900 text-white px-6 py-2.5 rounded-xl text-sm font-bold hover:bg-black transition-all shadow-sm">
                    <i class="ph ph-pencil-simple align-middle mr-1"></i> Edit Event
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Bagian Kiri Utama --}}
            <div class="lg:col-span-2 space-y-6">
                {{-- Banner/Poster --}}
                <div class="bg-white border border-gray-200 rounded-3xl p-2 shadow-sm overflow-hidden">
                    <div class="aspect-video w-full rounded-2xl overflow-hidden bg-gray-100">
                        @if ($Data->image)
                            <img src="{{ asset('storage/' . $Data->image) }}" alt="Poster Event" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center text-gray-300">
                                <i class="ph ph-image text-5xl mb-2"></i>
                                <span class="text-sm font-medium">Tidak ada poster</span>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Deskripsi Event --}}
                <div class="bg-white border border-gray-200 rounded-2xl p-8 shadow-sm">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold text-gray-900">{{ $Data->title }}</h2>
                        @if(strtolower($Data->status) == 'open' || strtolower($Data->status) == 'aktif' || strtolower($Data->status) == 'active')
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-50 text-green-600 border border-green-100 uppercase">
                                {{ $Data->status }}
                            </span>
                        @else
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-gray-100 text-gray-500 border border-gray-200 uppercase">
                                {{ $Data->status }}
                            </span>
                        @endif
                    </div>
                    
                    <div class="prose max-w-none text-gray-600 text-sm leading-relaxed">
                        {!! $Data->content !!}
                    </div>
                </div>
            </div>

            {{-- Bagian Kanan Informasi --}}
            <div class="space-y-6">
                {{-- Info Ringkas --}}
                <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm flex flex-col gap-4">
                    <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Informasi Acara</h3>
                    
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600 shrink-0">
                            <i class="ph ph-calendar-blank text-xl"></i>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-gray-500 mb-0.5">Tanggal Pelaksanaan</p>
                            <p class="text-sm font-semibold text-gray-900">{{ $Data->tgl_mulai }}</p>
                            @if($Data->tgl_akhir)
                                <p class="text-[11px] text-gray-400 mt-0.5">s/d {{ $Data->tgl_akhir }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 rounded-xl bg-orange-50 flex items-center justify-center text-orange-600 shrink-0">
                            <i class="ph ph-clock text-xl"></i>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-gray-500 mb-0.5">Waktu</p>
                            <p class="text-sm font-semibold text-gray-900">{{ $Data->jam_mulai }} WIB</p>
                            @if($Data->jam_akhir)
                                <p class="text-[11px] text-gray-400 mt-0.5">s/d {{ $Data->jam_akhir }} WIB</p>
                            @endif
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 rounded-xl bg-green-50 flex items-center justify-center text-green-600 shrink-0">
                            <i class="ph ph-map-pin text-xl"></i>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-gray-500 mb-0.5">Lokasi</p>
                            <p class="text-sm font-semibold text-gray-900 line-clamp-3">{{ $Data->lokasi }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 rounded-xl bg-purple-50 flex items-center justify-center text-purple-600 shrink-0">
                            <i class="ph ph-users text-xl"></i>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-gray-500 mb-0.5">Kuota Tersedia</p>
                            <p class="text-sm font-semibold text-gray-900">{{ $Data->kuota }} Peserta</p>
                        </div>
                    </div>
                </div>

                {{-- Agenda --}}
                <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
                    <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-4">Agenda Kegiatan</h3>
                    
                    @if($Data->kegiatan_events && count($Data->kegiatan_events) > 0)
                        <div class="relative border-l border-gray-200 ml-3 space-y-6">
                            @foreach ($Data->kegiatan_events as $k)
                                <div class="relative pl-6">
                                    <span class="absolute -left-1.5 top-1.5 w-3 h-3 rounded-full bg-gray-200 ring-4 ring-white border border-gray-300"></span>
                                    <p class="text-xs font-bold text-gray-900 bg-gray-50 inline-block px-2 py-1 rounded mb-1 border border-gray-100">{{ $k->waktu }}</p>
                                    <p class="text-sm text-gray-600 font-medium">{{ $k->kegiatan }}</p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-6">
                            <i class="ph ph-clipboard-text text-3xl text-gray-300 mb-2"></i>
                            <p class="text-xs text-gray-400 font-medium">Belum ada agenda terdaftar</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
