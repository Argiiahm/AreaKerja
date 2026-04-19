@extends('layouts.index')

@section('content')
    <div class="min-h-screen mt-32">
        <div class="max-w-7xl mx-auto px-6 py-10">

            {{-- Header Section --}}
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 mb-8">
                <div class="flex flex-col md:flex-row items-center gap-6">
                    <div
                        class="w-24 h-24 rounded-xl bg-slate-100 flex items-center justify-center p-2 shrink-0 border border-slate-50">
                        @if (Auth::user()->perusahaan->img_profile)
                            <img class="object-contain w-full h-full"
                                src="{{ asset('storage/' . Auth::user()->perusahaan->img_profile) }}" alt="Company Logo">
                        @else
                            <img class="w-full h-full object-cover p-2"
                                src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->perusahaan->nama_perusahaan) }}&background=random&color=fff&size=128"
                                alt="Placeholder Avatar">
                        @endif
                    </div>

                    <div class="flex-1 text-center md:text-left">
                        <h2 class="font-bold text-2xl text-slate-800">
                            {{ Auth::user()->perusahaan->nama_perusahaan ?? 'Seven_Inc' }}</h2>
                        <p class="text-slate-500 text-sm mt-1 leading-relaxed max-w-2xl">
                            {{ Auth::user()->perusahaan->deskripsi ?? 'Jasa TI dan Konsultan TI' }}
                        </p>
                        @if (Auth::user()->perusahaan->alamatperusahaan->count())
                            <div
                                class="flex items-center justify-center md:justify-start gap-2 mt-2 text-orange-500 font-medium text-xs uppercase tracking-wider">
                                <i class="ph ph-map-pin"></i>
                                <span>{{ Auth::user()->perusahaan->alamatperusahaan->count() }} Alamat Terdaftar</span>
                            </div>
                        @endif
                    </div>

                    <div class="shrink-0">
                        <a href="/dashboard/perusahaan/isi/alamat"
                            class="inline-flex items-center gap-2 bg-orange-400 hover:bg-orange-500 text-white px-5 py-2.5 rounded-xl transition-all shadow-md shadow-orange-100 font-semibold text-sm">
                            <i class="ph ph-plus-circle text-lg"></i>
                            Tambah Alamat Baru
                        </a>
                    </div>
                </div>
            </div>

            {{-- Section Title --}}
            <div class="flex items-center gap-4 mb-6">
                <h3 class="text-lg font-bold text-slate-800 shrink-0">Daftar Alamat</h3>
                <div class="h-[2px] w-full bg-slate-200 rounded-full">
                    <div class="h-full w-24 bg-orange-400 rounded-full"></div>
                </div>
            </div>

            @if (Auth::user()->perusahaan->alamatperusahaan->count())
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach (Auth::user()->perusahaan->alamatperusahaan as $almt)
                        <div
                            class="bg-white border border-slate-200 rounded-2xl p-6 hover:border-orange-300 hover:shadow-md transition-all group">
                            <div class="flex justify-between items-start mb-4">
                                <div
                                    class="bg-orange-50 text-orange-600 px-3 py-1 rounded-lg text-xs font-bold uppercase tracking-wide">
                                    {{ $almt->label ?? 'Kantor' }}
                                </div>
                                <i
                                    class="ph ph-buildings text-2xl text-slate-300 group-hover:text-orange-400 transition-colors"></i>
                            </div>

                            <div class="space-y-2">
                                <p class="text-slate-800 font-semibold leading-relaxed">
                                    {{ $almt->detail }}
                                </p>
                                <p class="text-slate-500 text-sm">
                                    {{ $almt->desa }}, {{ $almt->kecamatan }}, {{ $almt->kota }}<br>
                                    {{ $almt->provinsi }}, {{ $almt->kode_pos }}
                                </p>
                            </div>

                            <div class="mt-6 pt-5 border-t border-slate-50 flex justify-end">
                                <a href="/dashboard/perusahaan/edit/alamat/{{ $almt->id }}"
                                    class="inline-flex items-center gap-2 text-sm font-bold text-orange-500 hover:text-orange-600 transition-colors">
                                    <span>Edit Alamat</span>
                                    <i class="ph ph-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                {{-- Empty State --}}
                <div
                    class="bg-white border-2 border-dashed border-slate-200 rounded-3xl p-20 flex flex-col items-center text-center">
                    <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mb-4">
                        <i class="ph ph-map-trifold text-4xl text-slate-300"></i>
                    </div>
                    <h4 class="text-lg font-bold text-slate-800">Belum ada alamat</h4>
                    <p class="text-slate-500 text-sm max-w-xs mt-2 mb-8">
                        Anda belum menambahkan alamat kantor. Tambahkan alamat untuk memudahkan operasional bisnis Anda.
                    </p>
                    <a href="/dashboard/perusahaan/isi/alamat"
                        class="bg-slate-800 hover:bg-slate-900 text-white px-8 py-3 rounded-xl font-bold transition-all shadow-lg">
                        Buat Alamat Pertama
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
