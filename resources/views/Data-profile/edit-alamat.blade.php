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
                        <button form="form_update" type="submit"
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
        <div class=" mx-auto bg-white p-6">
            <h2 class="text-xl font-semibold text-gray-800 border-b-2 border-orange-500 pb-1 mb-6">
                Alamat
            </h2>

            <form id="form_update" action="/alamat/pelamar/update/{{ $data->id }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Label Alamat</label>
                    <input type="text" name="label" value="{{ old('label', $data->label) }}"
                        class="w-full border border-gray-300 rounded-md p-3 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                        placeholder="Label Alamat">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Alamat Lengkap</label>
                    <input type="text" name="desa" value="{{ old('desa', $data->desa) }}"
                        class="w-full border border-gray-300 rounded-md p-3 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                        placeholder="Alamat Lengkap">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Kecamatan</label>
                    <input type="text" name="kecamatan" value="{{ old('kecamatan', $data->kecamatan) }}"
                        class="w-full border border-gray-300 rounded-md p-3 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                        placeholder="Kecamatan">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Kota</label>
                    <input type="text" name="kota" value="{{ old('kota', $data->kota) }}"
                        class="w-full border border-gray-300 rounded-md p-3 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                        placeholder="Kota">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Provinsi</label>
                    <input type="text" name="provinsi" value="{{ old('provinsi', $data->provinsi) }}"
                        class="w-full border border-gray-300 rounded-md p-3 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                        placeholder="Provinsi">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Detail Alamat</label>
                    <input type="text" name="detail" value="{{ old('detail', $data->detail) }}"
                        class="w-full border border-gray-300 rounded-md p-3 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                        placeholder="Detail lainnya (Cth: Blok/Unit)">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Kode Pos</label>
                    <input type="text" name="kode_pos" value="{{ old('kode_pos', $data->kode_pos) }}"
                        class="w-full border border-gray-300 rounded-md p-3 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                        placeholder="Kode Pos">
                </div>

            </form>
        </div>

    </section>
@endsection
