@extends('layouts.index')

@section('content')
    <section class="pt-40 mx-10">
        <h1 class="font-semibold">Profile Akun</h1>
        <div class="mt-10 border-2 border-orange-500 p-6 sm:p-10 rounded-lg">
            <div class="flex flex-col lg:flex-row lg:items-center gap-6 lg:gap-10">
                <div class="flex flex-col items-center">
                    <img class="w-32 sm:w-40 rounded-full mb-3"
                        src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                        alt="">
                    <div>
                        <select class="border-2 border-orange-500 w-32 sm:w-40 p-2 rounded-md text-orange-500 font-semibold">
                            <option value="">Pelamar Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="flex flex-col lg:flex-row items-center w-full justify-between gap-6">
                    <div class="flex flex-col sm:flex-row gap-4 items-center w-full sm:w-auto">
                        <button
                            class="flex items-center gap-2 border-2 border-orange-500 px-6 py-2 rounded-lg w-full sm:w-auto justify-center">
                            <i class="ph ph-upload-simple text-2xl text-orange-500"></i>
                            <span class="text-orange-500">Upload</span>
                        </button>
                        <button class="flex items-center gap-2 border px-6 py-2 rounded-lg w-full sm:w-auto justify-center">
                            <i class="ph ph-trash text-2xl"></i>
                            <span>Remove</span>
                        </button>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
                        <div class="bg-orange-500 px-6 py-2 rounded-lg text-center w-full sm:w-auto">
                            <span class="text-white font-semibold">Simpan</span>
                        </div>
                        <div class="bg-green-500 px-6 py-2 rounded-lg text-center w-full sm:w-auto">
                            <span class="text-white font-semibold">Unduh CV</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="my-10">
            <h2 class="text-lg font-bold text-gray-800 border-b-2 border-orange-500 pb-2 mb-4">Alamat</h2>
            <div class="block lg:flex md:flex justify-between">
                <div class="grid grid-cols-1 gap-4">
                    @foreach (Auth::user()->pelamars->alamat_pelamars as $almt)
                        <div class="w-full p-5 bg-orange-500 text-white rounded-lg mb-5">
                            <h1 class="text-2xl">{{ $almt->label }}</h1>
                            <p class="my-4">{{ $almt->desa }} {{ $almt->kecamatan }}   {{ $almt->kota }} {{ $almt->provinsi }}  
                                {{ $almt->kode_pos }}</p>
                            <p class="mb-10">{{ $almt->detail }}</p>
                            <a class="w-fit px-6 py-2 bg-white rounded-lg text-orange-500 font-semibold" href="/alamat/pelamar/edit/{{ $almt->id }}">Edit
                                Alamat</a>
                        </div>
                    @endforeach
                </div>
                <a href="/data/alamat">
                    <span class="w-14 h-14 flex justify-center items-center rounded-lg bg-orange-500 text-white text-5xl"><i
                            class="ph ph-plus"></i></span>
                </a>
            </div>
        </div>

    </section>
@endsection
