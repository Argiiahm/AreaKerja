@extends('layouts.index')

@section('content')
    <section class="w-full h-screen pt-24">
        <div class="absolute inset-0">
            <img src="https://png.pngtree.com/background/20240507/original/pngtree-digital-marketing-website-displayed-on-rendered-office-desktop-picture-image_8837781.jpg"
                alt="Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-60"></div>
        </div>
        <div class="relative z-10 flex items-center justify-start h-full px-10 lg:px-20 md:px-20">
            <div class="max-w-lg">
                <h1 class="text-4xl font-bold text-white mb-4">Lowongan Terimpan</h1>
                <p class="text-white text-lg mb-6">
                    Lowongan anda yang sudah tersimpan<br>
                    disistem areakerja.com
                </p>
            </div>
        </div>
    </section>
    <section class="container max-w-screen-lg mx-auto mt-10">
        <div class="grid grid-cols-1 gap-5">
            @foreach ($Data as $d)
                <a href="/lowongan/tersimpan/detail/{{ $d->slug }}">
                    <div class="flex gap-5 shadow-md p-4">
                        <div>
                            <img class="w-20" src="{{ asset('storage/' . $d->perusahaan->img_profile) }}" alt="">
                        </div>
                        <div class="w-full">
                            <p>{{ $d->perusahaan->nama_perusahaan }}</p>
                            <h1>{{ $d->nama }} - {{ $d->jenis }}</h1>
                            <span>{{ $d->alamat }}</span>
                            <div class="mt-5 block lg:flex md:flex justify-between items-center w-full">
                                <span class="px-3 bg-[#d7d6d6] text-[#565656] py-2 rounded-md">Rp.{{ $d->gaji_awal }} - Rp.{{ $d->gaji_akhir }} per
                                    bulan</span>
                                <span class="block mt-3 text-[#565656]">{{ $d->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection
