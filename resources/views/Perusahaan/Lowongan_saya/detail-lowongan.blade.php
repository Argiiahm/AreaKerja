@extends('layouts.index')

@section('content')
<div class="bg-[#FAFAFA] min-h-screen pb-20">
    <section class="relative bg-white border-b border-slate-100 pt-32 pb-10">
        <div class="max-w-7xl mx-auto px-6 lg:px-12">
            <div class="flex flex-col md:flex-row items-center md:items-start gap-8">
                <div class="flex-shrink-0">
                    <div class="w-28 h-28 bg-white rounded-2xl border border-slate-200 shadow-sm flex items-center justify-center p-2">
                        @if (Auth::user()->perusahaan->img_profile)
                            <img class="object-contain w-full h-full" 
                                 src="{{ asset('storage/' . Auth::user()->perusahaan->img_profile) }}" alt="Logo">
                        @else
                            <img class="w-20 h-20 rounded-full" 
                                 src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128" alt="">
                        @endif
                    </div>
                </div>

                <div class="flex-1 text-center md:text-left">
                    <div class="flex flex-col md:flex-row md:items-center gap-3 mb-2">
                        <h1 class="text-3xl font-bold text-slate-900 tracking-tight">{{ $data->nama ?? 'N/A' }}</h1>
                        <span class="inline-flex px-3 py-1 text-[10px] font-bold bg-orange-50 text-orange-600 rounded-full uppercase tracking-widest border border-orange-100 mx-auto md:mx-0">
                            {{ $data->jenis }}
                        </span>
                    </div>
                    <p class="text-slate-600 font-medium">{{ Auth::user()->perusahaan->nama_perusahaan ?? 'N/A' }}</p>
                    <div class="flex flex-wrap justify-center md:justify-start items-center gap-5 mt-3 text-slate-400 text-sm">
                        <span class="flex items-center gap-1.5"><i class="ph ph-map-pin text-orange-500"></i> {{ $data->alamat ?? 'N/A' }}</span>
                        <span class="flex items-center gap-1.5"><i class="ph ph-clock"></i> {{ $data->created_at->diffForHumans() }}</span>
                    </div>
                </div>

                <div class="flex gap-3 w-full md:w-auto">
                    <form action="/dashboard/perusahaan/edit/lowongan/{{ $data->slug }}" method="POST" class="flex-1">
                        @csrf
                        <button type="submit" class="w-full flex items-center justify-center gap-2 px-5 py-2.5 bg-slate-900 text-white rounded-xl text-sm font-semibold hover:bg-slate-800 transition-all shadow-sm">
                            <i class="ph ph-pencil-simple-line"></i> Edit
                        </button>
                    </form>
                    <button type="button" id="openModalBtn" class="flex-1 flex items-center justify-center gap-2 px-5 py-2.5 bg-white text-rose-500 border border-rose-100 rounded-xl text-sm font-semibold hover:bg-rose-50 transition-all">
                        <i class="ph ph-trash"></i> Tutup
                    </button>
                </div>
            </div>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-6 lg:px-12 mt-10">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white border border-slate-200 rounded-2xl p-6 flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Penawaran Gaji</p>
                        <h3 class="text-xl font-bold text-slate-900">Rp {{ $data->gaji_awal }} – Rp {{ $data->gaji_akhir }}</h3>
                    </div>
                    <div class="hidden md:block p-3 bg-orange-50 rounded-xl">
                        <i class="ph ph-wallet text-orange-500 text-2xl"></i>
                    </div>
                </div>

                <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
                    <div class="p-8">
                        <h2 class="text-lg font-bold text-slate-900 mb-6 flex items-center gap-3">
                            <span class="w-1 h-5 bg-orange-500 rounded-full"></span> Detail Lowongan
                        </h2>
                        
                        <div class="space-y-8">
                            <div class="prose prose-slate max-w-none">
                                <ul class="space-y-3 p-0">
                                    @foreach (explode("\n", $data->deskripsi) as $baris)
                                        @if (trim($baris) != '')
                                            <li class="flex items-start gap-3 text-slate-600 list-none">
                                                <i class="ph ph-circle text-[8px] mt-2.5 text-orange-500"></i>
                                                <span class="leading-relaxed">{{ $baris }}</span>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 pt-8 border-t border-slate-50">
                                <div>
                                    <h4 class="text-xs font-bold text-slate-900 uppercase tracking-widest mb-4">Requirements</h4>
                                    <p class="text-sm text-slate-500 leading-relaxed whitespace-pre-line">{{ $data->syarat_pekerjaan }}</p>
                                </div>
                                <div>
                                    <h4 class="text-xs font-bold text-slate-900 uppercase tracking-widest mb-4">Responsibilities</h4>
                                    <p class="text-sm text-slate-500 leading-relaxed whitespace-pre-line">{{ $data->tanggung_jawab }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <aside class="space-y-6">
                <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
                    <h3 class="font-bold text-slate-900 mb-4">Tentang Perusahaan</h3>
                    <p class="text-sm text-slate-500 leading-relaxed mb-6">{{ Auth::user()->perusahaan->deskripsi ?? 'N/A' }}</p>
                    
                    <div class="space-y-4 pt-4 border-t border-slate-50">
                        <div class="flex items-start gap-3">
                            <i class="ph ph-map-pin text-slate-400 mt-0.5"></i>
                            <p class="text-xs text-slate-600">{{ Auth::user()->perusahaan->alamatperusahaan()->latest()->first()->detail ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>

                @if ($Data->count() > 1)
                    <div class="flex justify-between items-center px-1">
                        <h3 class="text-sm font-bold text-slate-900 uppercase tracking-tight">Lowongan Lainnya</h3>
                        <a href="/dashboard/perusahaan/lowongan" class="text-xs font-bold text-orange-500 hover:underline transition-all">Lihat Semua</a>
                    </div>
                    <div class="space-y-4">
                        @foreach (Auth::user()->perusahaan->pasanglowongan as $d)
                            @if ($d->id != $data->id)
                                <a href="/dashboard/perusahaan/lowongan/detail/{{ $d->slug }}" class="block p-4 bg-white border border-slate-200 rounded-xl hover:border-orange-200 hover:shadow-md transition-all group">
                                    <h4 class="font-bold text-slate-800 group-hover:text-orange-600 transition-colors truncate">{{ $d->nama }}</h4>
                                    <p class="text-[10px] text-slate-400 font-bold uppercase mt-1">{{ $d->jenis }}</p>
                                    <p class="text-xs text-slate-700 font-bold mt-3">Rp {{ $d->gaji_awal }} - {{ $d->gaji_akhir }}</p>
                                </a>
                            @endif
                        @endforeach
                    </div>
                @endif
            </aside>
        </div>
    </div>
</div>

<div id="confirmModal" class="hidden fixed inset-0 z-[100] flex items-center justify-center p-4">
    <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-[2px]"></div>
    <div class="bg-white rounded-3xl shadow-xl max-w-sm w-full relative z-10 p-8 text-center animate-in zoom-in duration-150">
        <div class="w-16 h-16 bg-rose-50 text-rose-500 rounded-full flex items-center justify-center mx-auto mb-5">
            <i class="ph ph-warning-circle text-3xl"></i>
        </div>
        <h2 class="text-xl font-bold text-slate-900 mb-2">Hapus Lowongan?</h2>
        <p class="text-sm text-slate-500 mb-8 leading-relaxed">Tindakan ini permanen. Lowongan ini tidak akan lagi terlihat oleh publik.</p>
        
        <div class="flex flex-col gap-2">
            <button id="confirmBtn" class="w-full py-3 bg-rose-500 text-white rounded-xl font-bold hover:bg-rose-600 transition-all shadow-lg shadow-rose-100">
                Ya, Hapus Sekarang
            </button>
            <button id="cancelBtn" class="w-full py-3 bg-slate-50 text-slate-500 rounded-xl font-bold hover:bg-slate-100 transition-all">
                Batal
            </button>
        </div>
    </div>
</div>

<form id="deleteForm" action="/dashboard/perusahaan/hapus/lowongan/{{ $data->slug }}" method="POST" class="hidden">
    @csrf
    @method('DELETE')
</form>

<script>
    const openModalBtn = document.getElementById('openModalBtn');
    const modal = document.getElementById('confirmModal');
    const cancelBtn = document.getElementById('cancelBtn');
    const confirmBtn = document.getElementById('confirmBtn');
    const deleteForm = document.getElementById('deleteForm');

    openModalBtn.addEventListener('click', () => {
        modal.classList.remove('hidden');
    });

    cancelBtn.addEventListener('click', () => {
        modal.classList.add('hidden');
    });

    confirmBtn.addEventListener('click', () => {
        deleteForm.submit();
    });
</script>
@endsection