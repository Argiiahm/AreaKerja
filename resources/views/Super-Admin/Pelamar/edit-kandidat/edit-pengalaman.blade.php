@extends('Super-Admin.layouts.index')
@section('super_admin-content')
    <div class=" mx-auto bg-white p-6">
        <h2 class="text-xl font-semibold text-gray-800 border-b-2 border-orange-500 pb-1 mb-6">
            Edit Pengalaman Kerja
        </h2>
        <form class="space-y-4" action="/update/superadmin/kandidat/pengalaman/{{ $data->id }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="pelamar_id" value="{{ $data->pelamar_id ?? '' }}">
            <div>
                <label for="posisi_kerja" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Posisi
                    Kerja</label>
                <input type="text" name="posisi_kerja" id="posisi_kerja"
                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                    placeholder="posisi_kerja" value="{{ $data->posisi_kerja }}" />
            </div>
            <div>
                <label for="jabatan_kerja"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">jabatan_kerja
                    Kerja</label>
                <input type="text" name="jabatan_kerja" id="jabatan_kerja"
                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                    placeholder="jabatan_kerja" value="{{ $data->jabatan_kerja }}" />
            </div>
            <div>
                <label for="nama_perusahaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Nama
                    Perusahaan</label>
                <input type="text" name="nama_perusahaan" id="nama_perusahaan"
                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                    placeholder="nama_perusahaan" value="{{ $data->nama_perusahaan }}" />
            </div>
            <div>
                <label for="tahun_awal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Tahun
                    Awal</label>
                <input type="text" name="tahun_awal" id="tahun_awal"
                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5" placeholder="tahun_awal"
                    value="{{ $data->tahun_awal }}" />
            </div>
            <div>
                <label for="tahun_akhir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Tahun
                    Akhir</label>
                <input type="text" name="tahun_akhir" id="tahun_akhir"
                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                    placeholder="tahun_akhir" value="{{ $data->tahun_akhir }}" />
            </div>
            <div>
                <label for="deskripsi"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Deskripsi</label>
                <input type="text" name="deskripsi" id="deskripsi"
                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5" placeholder="deskripsi"
                    value="{{ $data->deskripsi }}"></input>
            </div>
            <button type="submit"
                class="w-full text-white bg-orange-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan</button>
        </form>
    </div>
@endsection
