@extends('layouts.index')
@section('content')
    <div class="max-w-4xl mx-auto px-6 py-10 mt-20 bg-white shadow rounded-lg">

        <div class="flex items-center justify-between p-4 mb-6">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('Icon/seveninc.png') }}" alt="Logo" class="w-40">
                <div>
                    <h2 class="font-bold text-xl">Seven_Inc</h2>
                    <p class="text-gray-600 text-sm">Jasa TI dan Konsultan TI</p>
                    <p class="text-gray-400 text-xs mt-1">Alamat default</p>
                </div>
            </div>

            <!-- <button class="px-4 py-2 bg-orange-500 text-white rounded-md hover:bg-orange-600 flex items-center shadow">
                                                <span class="text-lg font-bold mr-2">+</span> Tambah
                                            </button> -->
        </div>

        <h2 class="text-2xl font-bold mb-6 border-b-2 border-orange-400 pb-2">Edit Lowongan</h2>

        <form action="/dashboard/perusahaan/update/lowongan/{{ $data->slug }}" method="POST" class="space-y-8">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label class="block font-medium mb-1">Judul</label>
                    <input type="text" name="nama" value="{{ $data->nama }}"
                        class="w-full border-2 rounded-md px-3 py-2 focus:ring-orange-400 focus:border-orange-400">
                </div>
                <div>
                    <label class="block font-medium mb-1">Alamat</label>
                    <input name="alamat" value="{{ $data->alamat }}"
                        class="w-full border-2 rounded-md px-3 py-2 focus:ring-orange-400 focus:border-orange-400">
                </div>
            </div>

            <div class="grid grid-cols-4 gap-6 items-end">
                <div>
                    <label class="block font-medium mb-1">Jenis Lowongan</label>
                    <select name="jenis"
                        class="w-full border-2 rounded-md px-3 py-2 focus:ring-orange-400 focus:border-orange-400">
                        <option value="" disabled {{ old('jenis', $data->jenis) == '' ? 'selected' : '' }}>
                            Pilih Jenis Lowongan
                        </option>
                        <option value="fulltime" {{ old('jenis', $data->jenis) == 'fulltime' ? 'selected' : '' }}>
                            Full Time
                        </option>
                        <option value="middle" {{ old('jenis', $data->jenis) == 'middle' ? 'selected' : '' }}>
                            Middle
                        </option>
                    </select>
                </div>

                <div>
                    <label class="block font-medium mb-1">Kategori</label>
                    <input type="text" name="kategori" value="{{ $data->kategori }}"
                        class="w-full border-2 rounded-md px-3 py-2 focus:ring-orange-400 focus:border-orange-400">
                </div>

                <div class="col-span-2">
                    <label class="block font-medium mb-1">Gaji</label>
                    <div class="flex items-center space-x-2">
                        <input type="text" name="gaji_awal" value="{{ $data->gaji_awal }}"
                            class="w-full border-2 rounded-md px-3 py-2 focus:ring-orange-400 focus:border-orange-400">
                        <span class="text-gray-500">–</span>
                        <input type="text" name="gaji_akhir" value="{{ $data->gaji_akhir }}"
                            class="w-full border-2 rounded-md px-3 py-2 focus:ring-orange-400 focus:border-orange-400">
                    </div>
                </div>
                {{-- <div>
                    <label class="block font-medium mb-1">Periode</label>
                    <select name="batas_lamaran" class="w-full border-2 rounded-md px-3 py-2 focus:ring-orange-400 focus:border-orange-400">
                        <option>Bulan</option>
                    </select>
                </div> --}}
            </div>

            <textarea class="w-full border-2 rounded-md px-3 py-2 focus:ring-orange-400 focus:border-orange-400" name="deskripsi"
                cols="30" rows="10">{!! old('deskripsi', $data->deskripsi ?? '') !!}</textarea>
            <div class="space-y-6 border-t-2 pt-6">
                <h3 class="text-lg font-semibold text-orange-500">Syarat Pekerjaan</h3>
                <div>
                    <label class="block font-medium mb-1">Pendidikan</label>
                    <div class="grid grid-cols-3 gap-2 mt-1">
                        @foreach (['SD', 'SMP', 'SMA', 'SMK', 'S1', 'S2', 'S3'] as $edu)
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="syarat_pekerjaan" value="{{ $edu }}"
                                    class="w-5 h-5 border-2 border-orange-500 accent-orange-500"
                                    {{ old('syarat_pekerjaan', $data->syarat_pekerjaan) == $edu ? 'checked' : '' }}>
                                <span>{{ $edu }}</span>
                            </label>
                        @endforeach

                    </div>
                </div>

                <div>
                    <label class="block font-medium mb-1">Batas Waktu</label>
                    <input type="date" name="batas_lamaran" value="{{ $data->batas_lamaran }}"
                        class="w-60 border-2 rounded-md px-3 py-2 focus:ring-orange-400 focus:border-orange-400">
                </div>

            </div>

            <div class="flex justify-center space-x-4 pt-6">
                <button type="submit" class="px-6 py-2 bg-orange-500 text-white rounded-md hover:bg-orange-600">
                    Simpan
                </button>
            </div>`
        </form>
    </div>
@endsection
