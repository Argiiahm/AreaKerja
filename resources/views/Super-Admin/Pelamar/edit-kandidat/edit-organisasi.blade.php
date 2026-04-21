@extends('Super-Admin.layouts.index')
@section('super_admin-content')
    <section class="pt-10 mx-10">
        <div class="mx-auto p-6">
            <h2 class="text-xl font-semibold text-gray-800 border-b-2 border-orange-500 pb-1 mb-6">
                Edit Organisasi
            </h2>
            <form class="space-y-4" action="/update/superadmin/kandidat/organisasi/{{ $Data->id }}" method="POST">
                @csrf
                @method('PUT')
                <input type="text" hidden name="pelamar_id" value="{{ $Data->pelamar_id }}">
                <div>
                    <label for="nama_organisasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                        Organisasi</label>
                    <input type="text" name="nama_organisasi" id="nama_organisasi"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                        placeholder="nama_organisasi" value="{{ old('nama_organisasi', $Data->nama_organisasi) }}" />
                </div>
                <div>
                    <label for="jabatan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan</label>
                    <input type="text" name="jabatan" id="jabatan"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                        placeholder="jabatan" value="{{ old('jabatan', $Data->jabatan) }}" />
                </div>
                <div>
                    <label for="tahun_awal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun
                        Awal</label>
                    <input type="text" name="tahun_awal" id="tahun_awal"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                        placeholder="tahun_awal" value="{{ old('tahun_awal', $Data->tahun_awal) }}" />
                </div>
                <div>
                    <label for="tahun_akhir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun
                        Akhir</label>
                    <input type="text" name="tahun_akhir" id="tahun_akhir"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                        placeholder="tahun_akhir" value="{{ old('tahun_akhir', $Data->tahun_akhir) }}" />
                </div>
                <div>
                    <label for="deskripsi"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                    <input type="text" name="deskripsi" id="deskripsi"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                        placeholder="deskripsi" value="{{ old('deskripsi', $Data->deskripsi) }}"></input>
                </div>
                <button type="submit"
                    class="w-full text-white bg-orange-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Simpan</button>
            </form>
        </div>

    </section>
@endsection