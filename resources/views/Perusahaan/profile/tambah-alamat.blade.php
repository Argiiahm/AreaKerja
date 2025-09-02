@extends('layouts.index')
@section('content')

    @if (Auth::user()->perusahaan->alamatperusahaan->count())
        <div class="max-w-5xl mx-auto px-4 sm:px-6 py-10 mt-24">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('Icon/seveninc.png') }}" alt="Logo" class="w-40">

                <div>
                    <h2 class="font-bold text-xl">Seven_Inc</h2>
                    <p class="text-gray-600 text-sm">Jasa TI dan Konsultan TI</p>
                    <p class="text-gray-400 text-xs mt-1">Alamat default</p>
                </div>
            </div>


            <h2 class="text-lg font-semibold text-gray-800">Alamat</h2>
            <hr class="border-t-2 border-orange-400 mt-1 mb-4">

            @foreach (Auth::user()->perusahaan->alamatperusahaan as $almt)
                <div class="space-y-4">
                    <div class="border border-orange-400 rounded-md p-4">
                        <h3 class="font-semibold text-gray-800">{{ $almt->label }}</h3>
                        <p class="text-orange-600 text-sm mt-1">
                            {{ $almt->desa }}, {{ $almt->kecamatan }}, {{ $almt->kota }},
                            {{ $almt->provinsi }}, {{ $almt->kode_pos }}
                        </p>
                        <p class="text-gray-600 text-sm mt-1 mb-5">
                            {{ $almt->detail }}
                        </p>
                        <a href="/dashboard/perusahaan/edit/alamat/{{ $almt->id }}"
                            class="mt-3 bg-orange-500 hover:bg-orange-600 text-white text-sm px-4 py-2 rounded">
                            Edit alamat
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="max-w-5xl mx-auto px-4 sm:px-6 py-10 mt-24">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('Icon/seveninc.png') }}" alt="Logo" class="w-40 ">
                <div>
                    <h2 class="font-bold text-xl">Seven_Inc</h2>
                    <p class="text-gray-600 text-sm">Jasa TI dan Konsultan TI</p>
                    <p class="text-gray-400 text-xs mt-1">Alamat default</p>
                </div>
            </div>
            <div class="mt-8">
                <h3 class="font-semibold text-lg">Alamat</h3>
                <hr class="border-orange-500 mt-1">
                <div class="mt-6 border border-orange-400 rounded-md p-6 w-[400px]">
                    <div class="flex items-center justify-start text-gray-500 gap-3">
                        <p class="text-base font-bold">Alamat Kosong</p>
                        <i class="ph ph-file text-2xl w-6 h-6 text-gray-400"></i>
                    </div>
                    <div class="flex justify-end mt-6">
                        <a href="/dashboard/perusahaan/isi/alamat"
                            class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded text-sm">
                            Tambah Alamat
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
