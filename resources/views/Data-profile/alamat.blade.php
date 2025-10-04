@extends('layouts.index')

@section('content')
    <section class="pt-40 mx-10">
        <h1 class="font-semibold">Profile Akun</h1>
        <div class="mt-10 border-2 border-orange-500 p-6 sm:p-10 rounded-lg">
            <div class="flex flex-col lg:flex-row lg:items-center gap-6 lg:gap-10">
                <div class="flex flex-col items-center">
                    <div class="modal" id="imgModal">
                        <img id="modalImg" alt="Zoomed" class="w-40 h-40 sm:w-40 object-cover rounded-full">
                    </div>

                    @if (Auth::user()->pelamars->img_profile)
                        <img id="previewImage" class="w-40 h-40 sm:w-40 object-cover rounded-full mb-3 profile-img"
                            src="{{ asset('storage/' . Auth::user()->pelamars->img_profile) }}" alt=""
                            alt="Profile">
                    @else
                        <img id="previewImage" class="w-40 h-40 sm:w-40 object-cover rounded-full mb-3"
                            src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                            alt="">
                    @endif
                    <div>
                        <select
                            class="border-2 border-orange-500 w-32 sm:w-40 p-2 rounded-md text-orange-500 font-semibold">
                            @if (Auth::user()->pelamars->kategori === 'calon kandidat')
                                <option value="">Calon Kandidat</option>
                            @elseif (Auth::user()->pelamars->kategori === 'kandidat aktif')
                                <option value="">Kandidat Aktif</option>
                            @else
                                <option value="">Pelamar Aktif</option>
                            @endif
                        </select>
                    </div>
                </div>

                <div class="flex flex-col lg:flex-row items-center w-full justify-between gap-6">
                    <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
                        <button form="alamat_form" type="submit"
                            class="bg-orange-500 px-6 py-2 rounded-lg text-center w-full sm:w-auto">
                            <span class="text-white font-semibold">Simpan</span>
                        </button>

                        <div class="bg-green-500 px-6 py-2 rounded-lg text-center w-full sm:w-auto">
                            <a href="/cv/{{ Auth::user()->pelamars->id }}/unduh" class="text-white font-semibold">Unduh
                                CV</a>
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
