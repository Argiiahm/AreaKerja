@extends('layouts.index')

@section('content')
    <section class="pt-26 mx-10">
        <div class="my-10">
            <h2 class="text-lg font-bold text-gray-800 border-b-2 border-orange-500 pb-2 mb-4">Alamat</h2>
            <div class="block lg:flex md:flex justify-between">
                <div class="grid grid-cols-1 gap-4">
                    @foreach (Auth::user()->pelamars->alamat_pelamars as $almt)
                        <div class="w-full p-5 bg-orange-500 text-white rounded-lg mb-5">
                            <h1 class="text-2xl">{{ $almt->label }}</h1>
                            <p class="my-4">{{ $almt->desa }} {{ $almt->kecamatan }} {{ $almt->kota }}
                                {{ $almt->provinsi }}
                                {{ $almt->kode_pos }}</p>
                            <p class="mb-10">{{ $almt->detail }}</p>
                            <a class="w-fit px-6 py-2 bg-white rounded-lg text-orange-500 font-semibold"
                                href="/alamat/pelamar/edit/{{ $almt->id }}">Edit
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
