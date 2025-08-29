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
        <div class=" mx-auto bg-white p-6">
            <h2 class="text-xl font-semibold text-gray-800 border-b-2 border-orange-500 pb-1 mb-6">
                Edit Pengalaman Kerja
            </h2>
            <form class="space-y-4" action="/update/pengalaman/kerja/{{ $data->id }}" method="POST">
                @csrf
                @method('PUT')
                <div>
                    <label for="posisi_kerja" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Posisi
                        Kerja</label>
                    <input type="text" name="posisi_kerja" id="posisi_kerja"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                        placeholder="posisi_kerja" value="{{ $data->posisi_kerja }}" />
                </div>
                <div>
                    <label for="jabatan_kerja"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">jabatan_kerja
                        Kerja</label>
                    <input type="text" name="jabatan_kerja" id="jabatan_kerja"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                        placeholder="jabatan_kerja" value="{{ $data->jabatan_kerja }}" />
                </div>
                <div>
                    <label for="nama_perusahaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                        Perusahaan</label>
                    <input type="text" name="nama_perusahaan" id="nama_perusahaan"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                        placeholder="nama_perusahaan" value="{{ $data->nama_perusahaan }}" />
                </div>
                <div>
                    <label for="tahun_awal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun
                        Awal</label>
                    <input type="text" name="tahun_awal" id="tahun_awal"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                        placeholder="tahun_awal" value="{{ $data->tahun_awal }}" />
                </div>
                <div>
                    <label for="tahun_akhir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun
                        Akhir</label>
                    <input type="text" name="tahun_akhir" id="tahun_akhir"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                        placeholder="tahun_akhir" value="{{ $data->tahun_akhir }}" />
                </div>
                <div>
                    <label for="deskripsi"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                    <input type="text" name="deskripsi" id="deskripsi"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                        placeholder="deskripsi" value="{{ $data->deskripsi }}"></input>
                </div>
                <button type="submit"
                    class="w-full text-white bg-orange-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan</button>
            </form>
        </div>

    </section>
@endsection
