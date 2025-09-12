@extends('layouts.index')

@section('content')
    <section class="mx-auto pt-40">
        <div class="flex w-full gap-5 mb-10">
            <div class="w-3/12 h-32  flex items-center justify-center">
                <img src="{{ asset('Icon/seveninc.png') }}" alt="Logo" class="object-contain w-full">

            </div>
            <div>
                <h1 class="text-3xl font-bold">Seven_Inc</h1>
                <p class="text-sm text-gray-600">Jasa TI dan Konsultan TI</p>
                <p class="text-sm text-gray-500">Jakarta Timur, DKI Jakarta, Indonesia</p>
            </div>
        </div>
        <div class="block lg:flex md:block">
            <div class="bg-white">
                <div class="flex justify-between items-start p-6">
                    <div>
                        <div class="flex">
                            <div>
                                <img src="{{ asset('Icon/seveninc.png') }}" alt="">
                            </div>
                            <div>
                                <h1 class="font-bold text-xl">{{ $data->nama }}</h1>
                                <p class="text-gray-500">{{ $data->perusahaan->nama_perusahaan }}</p>
                                <p class="text-gray-500">{{ $data->alamat }}</p>
                                <p class="bg-gray-200 w-fit my-3 px-3 py-1 text-gray-700 font-semibold rounded-md">
                                    Rp. {{ $data->gaji_awal }} – Rp. {{ $data->gaji_akhir }} perbulan
                                </p>
                                <div class="flex gap-6 mt-4">
                                    <form action="" method="POST" class="flex items-center gap-2">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                            class="flex items-center gap-1 text-orange-600 hover:text-orange-700">
                                            <i class="ph ph-trash text-lg"></i>
                                            <span class="text-sm font-medium">Tutup lowongan</span>
                                        </button>
                                    </form>

                                    <form action="" method="GET" class="flex items-center gap-2">
                                        @csrf
                                        <button type="submit"
                                            class="flex items-center gap-1 text-orange-600 hover:text-orange-700">
                                            <i class="ph ph-pencil-simple-line text-lg"></i>
                                            <span class="text-sm font-medium">Edit lowongan</span>
                                        </button>
                                    </form>
                                </div>

                                <div class="pb-6">
                                    <div class=" mb-3 border-t-2 my-8 py-4">
                                        <h2 class="font-semibold text-lg">Detail Lowongan</h2>
                                        <p>{{ $data->deskripsi }}</p>
                                    </div>
                                    <div class="flex gap-3 mb-3 border-b-2 pb-5">
                                        <div>
                                            <img src="{{ asset('Icon/detail-lowongan.png') }}" alt="">
                                        </div>
                                        <div>
                                            <p class="mb-3 font-semibold">Jenis Lowongan</p>
                                            <span class="bg-gray-200 px-4 py-2 rounded-md text-sm font-semibold">{{ $data->jenis }}</span>
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-3 mb-5 border-b-2 pb-5">
                                        <i class="ph ph-map-pin text-gray-500 text-lg"></i>
                                        <span>{{ $data->alamat}}</span>
                                    </div>

                                    <div class="mb-6 border-b-2 pb-5">
                                        <h3 class="font-semibold text-lg mb-2">Deskripsi Lowongan</h3>
                                        <p class="font-bold">Requirements</p>
                                        <ul class="list-disc list-inside space-y-1 text-gray-600">
                                            <li>{{ $data->syarat_pekerjaan }}</li>
                                        </ul>
                                    </div>

                                    <div class="">
                                        <h3 class="font-semibold text-lg mb-2">Responsibilities</h3>
                                        <ul class="list-disc list-inside space-y-1 text-gray-600">
                                            <li>{{ $data->tanggung_jawab }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mx-3">
                @if ($Data->count() > 1 && $Data->sum('id') != $data->id)
                    
                <div class="flex justify-between items-center">
                    <h2 class="font-semibold text-2xl">Lowongan Seven inc Lainya</h2>
                    <p class="text-orange-500 font-semibold hidden lg:flex md:flex">Lihat Semua</p>
                </div>
                <div class="grid grid-cols-1 gap-5 mt-4">
                    @foreach ($Data as $d)
                        @if ($d->id != $data->id)
                        <a href="/dashboard/perusahaan/lowongan/detail/{{ $d->id }}">
                            <div class="flex shadow-md p-4">
                            <div>
                                <img src="{{ asset('Icon/seveninc.png') }}" alt="">
                            </div>
                            <div class="w-full">
                                <p>{{ $d->perusahaan->nama_perusahaan }}</p>
                                <h1 class="font-semibold">{{ $d->nama }} - {{ $d->jenis }}</h1>
                                <span>{{ $d->alamat }}</span>
                                <div class="mt-5 block lg:flex md:flex justify-between items-center w-full">
                                    <span class="px-3 bg-[#d7d6d6] text-[#565656] py-2 rounded-md">Rp.{{ $d->gaji_awal }} - Rp.{{ $d->gaji_akhir }} per
                                        bulan</span>
                                    <span class="block mt-3 text-[#565656] pl-0 lg:pl-10 md:pl-10">Aktif 2jam lalu</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endif
                @endforeach
                @endif
                </div>
            </div>
        </div>
    </section>
@endsection
