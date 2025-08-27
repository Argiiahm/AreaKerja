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

        <form action="#" method="POST" class="space-y-8">

            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label class="block font-medium mb-1">Judul</label>
                    <input type="text" placeholder="UI UX Designer"
                        class="w-full border-2 rounded-md px-3 py-2 focus:ring-orange-400 focus:border-orange-400">
                </div>
                <div>
                    <label class="block font-medium mb-1">Alamat</label>
                    <select class="w-full border-2 rounded-md px-3 py-2 focus:ring-orange-400 focus:border-orange-400">
                        <option>Rumah</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-4 gap-6 items-end">
                <div>
                    <label class="block font-medium mb-1">Jenis Lowongan</label>
                    <select class="w-full border-2 rounded-md px-3 py-2 focus:ring-orange-400 focus:border-orange-400">
                        <option>Full Time</option>
                    </select>
                </div>
                <div class="col-span-2">
                    <label class="block font-medium mb-1">Gaji</label>
                    <div class="flex items-center space-x-2">
                        <input type="text" placeholder="Rp. 2.000.000"
                            class="w-full border-2 rounded-md px-3 py-2 focus:ring-orange-400 focus:border-orange-400">
                        <span class="text-gray-500">–</span>
                        <input type="text" placeholder="Rp. 7.500.000"
                            class="w-full border-2 rounded-md px-3 py-2 focus:ring-orange-400 focus:border-orange-400">
                    </div>
                </div>
                <div>
                    <label class="block font-medium mb-1">Periode</label>
                    <select class="w-full border-2 rounded-md px-3 py-2 focus:ring-orange-400 focus:border-orange-400">
                        <option>Bulan</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block font-medium mb-1">Deskripsi</label>
                <textarea rows="4" class="w-full border-2 rounded-md px-3 py-2 focus:ring-orange-400 focus:border-orange-400">SEVEN INC adalah perusahaan yang bergerak di bidang teknologi...</textarea>
            </div>

            <div class="space-y-6 border-t-2 pt-6">
                <h3 class="text-lg font-semibold text-orange-500">Syarat Pekerjaan</h3>
                <div>
                    <label class="block font-medium mb-1">Pendidikan</label>
                    <div class="grid grid-cols-3 gap-2 mt-1">
                        @foreach (['SD','SMP','SMA','SMK','S1','S2','S3'] as $edu)
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="pendidikan"
                                class="w-5 h-5 border-2 border-orange-500 accent-orange-500">
                            <span>{{ $edu }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>

                <div>
                    <label class="block font-medium mb-1">Jurusan</label>
                    <input type="text" placeholder="Contoh: Teknik Informatika"
                        class="w-90 border-2 rounded-md px-3 py-2 focus:ring-orange-400 focus:border-orange-400">
                </div>

                <div>
                    <label class="block font-medium mb-1">Gender</label>
                    <div class="flex gap-6 mt-1">
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="gender"
                                class="w-5 h-5 border-2 border-orange-500 accent-orange-500">
                            <span>Laki-laki</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="gender"
                                class="w-5 h-5 border-2 border-orange-500 accent-orange-500">
                            <span>Perempuan</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block font-medium mb-1">Umur</label>
                    <div class="flex items-center space-x-2">
                        <input type="text" placeholder="19"
                            class="w-20 border-2 rounded-md px-3 py-2 focus:ring-orange-400 focus:border-orange-400">
                        <span class="text-gray-500">–</span>
                        <input type="text" placeholder="25"
                            class="w-20 border-2 rounded-md px-3 py-2 focus:ring-orange-400 focus:border-orange-400">
                    </div>
                </div>

                <div>
    <label class="block font-medium mb-1">Batas Waktu</label>
    <input type="date"
        class="w-60 border-2 rounded-md px-3 py-2 focus:ring-orange-400 focus:border-orange-400">
</div>

            </div>
            <div class="flex justify-center space-x-4 pt-6">
                <!-- <button type="button"
                    class="px-6 py-2 border-2 border-orange-500 rounded-md text-orange-500 hover:bg-orange-50">
                    Batal
                </button> -->
                <button type="submit" class="px-6 py-2 bg-orange-500 text-white rounded-md hover:bg-orange-600">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
