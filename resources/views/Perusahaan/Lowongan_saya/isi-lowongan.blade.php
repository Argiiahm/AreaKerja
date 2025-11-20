@extends('layouts.index')
@section('content')
    <div class="max-w-4xl mx-auto px-6 py-10 mt-20 bg-white shadow rounded-lg">

        <div class="flex items-center justify-between p-4 mb-6">
            <div class="flex items-center space-x-4">
                @if (Auth::user()->perusahaan->img_profile)
                    <div class="w-32 h-32  flex items-center justify-center">
                        <img class="object-contain w-full"
                            src="{{ asset('storage/' . Auth::user()->perusahaan->img_profile) }}" alt="">
                    </div>
                @else
                    <div class="w-32 h-32  flex items-center justify-center">
                        <img class="w-20 h-20 rounded-full"
                            src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                            alt="">
                    </div>
                @endif
                <div>
                    <h2 class="font-bold text-xl">{{ Auth::user()->perusahaan->nama_perusahaan }}</h2>
                    <p class="text-gray-600 text-sm">{{ Auth::user()->perusahaan->deskripsi }}</p>
                    <p class="text-gray-400 text-xs mt-1">
                        {{ optional(Auth::user()->perusahaan->alamatperusahaan()->latest()->first())->detail ?? '-' }}
                </div>
            </div>


        </div>

        <h2 class="text-2xl font-bold mb-6 border-b-2 border-orange-400 pb-2">Tambah Lowongan</h2>

        <form action="/dashboard/perusahaan/create/lowongan" method="POST" class="space-y-8">
            @csrf
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label class="block font-medium mb-1">Judul</label>
                    <input type="text" name="nama"
                        class="w-full border-2 rounded-md px-3 py-2 focus:ring-orange-400 focus:border-orange-400">
                </div>
                <div>
                    <label class="block font-medium mb-1">Alamat</label>
                    <input type="text" name="alamat"
                        class="w-full border-2 rounded-md px-3 py-2 focus:ring-orange-400 focus:border-orange-400">
                </div>
            </div>

            <div class="grid grid-cols-4 gap-6 items-end">
                <div>
                    <label class="block font-medium mb-1">Jenis Lowongan</label>
                    <select name="jenis"
                        class="w-full border-2 rounded-md px-3 py-2 focus:ring-orange-400 focus:border-orange-400">
                        <option value="" selected disabled>Pilih Jenis Lowongan</option>
                        <option value="fulltime">Fulltime</option>
                        <option value="middle">Middle</option>
                        <option value="part-time">Part-time</option>
                        <option value="freelance">Freelance</option>
                    </select>
                </div>

                <div>
                    <label class="block font-medium mb-1">Kategori</label>
                    <select name="kategori"
                        class="w-full border-2 rounded-md px-3 py-2 focus:ring-orange-400 focus:border-orange-400">
                        <option value="" selected disabled>Pilih Kategori</option>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->nama }}">{{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-span-2">
                    <label class="block font-medium mb-1">Gaji</label>
                    <div class="flex items-center space-x-2">
                        <input type="text" name="gaji_awal"
                            class="w-full border-2 rounded-md px-3 py-2 focus:ring-orange-400 focus:border-orange-400">
                        <span class="text-gray-500">–</span>
                        <input type="text" name="gaji_akhir"
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

            <div>
                <label class="block font-medium mb-1">Deskripsi</label>
                <textarea name="deskripsi" rows="4"
                    class="w-full border-2 rounded-md px-3 py-2 focus:ring-orange-400 focus:border-orange-400"></textarea>
            </div>

            <div class="space-y-6 border-t-2 pt-6">
                <h3 class="text-lg font-semibold text-orange-500">Syarat Pekerjaan</h3>
                <div>
                    <label class="block font-medium mb-1">Pendidikan</label>
                    <div class="grid grid-cols-3 gap-2 mt-1">
                        @foreach (['SD', 'SMP', 'SMA', 'SMK', 'S1', 'S2', 'S3'] as $edu)
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="syarat_pekerjaan" value="{{ $edu }}"
                                    class="w-5 h-5 border-2 border-orange-500 accent-orange-500">
                                <span>{{ $edu }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div>
                    <label class="block font-medium mb-1">Batas Waktu</label>
                    <input type="date" name="batas_lamaran"
                        class="w-60 border-2 rounded-md px-3 py-2 focus:ring-orange-400 focus:border-orange-400">
                </div>

            </div>

            <div class="flex justify-center space-x-4 pt-6">
                <button type="button"
                    class="px-6 py-2 border-2 border-orange-500 rounded-md text-orange-500 hover:bg-orange-50">
                    Batal
                </button>
                <button type="submit" class="px-6 py-2 bg-orange-500 text-white rounded-md hover:bg-orange-600">
                    Simpan
                </button>
            </div>`
        </form>
    </div>
@endsection
