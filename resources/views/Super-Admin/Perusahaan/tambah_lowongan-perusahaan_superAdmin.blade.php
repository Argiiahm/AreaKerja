@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="mx-auto mt-10">
        <div class="bg-white border rounded-lg shadow p-8">
            <h2 class="text-lg font-semibold mb-6">Tambah Data Lowongan</h2>

            <form action="#" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium">Judul <span class="text-red-500">*</span></label>
                        <input type="text"
                            class="w-full border rounded-md px-3 py-2 focus:ring-orange-500 focus:border-orange-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Alamat <span class="text-red-500">*</span></label>
                        <input type="text"
                            class="w-full border rounded-md px-3 py-2 focus:ring-orange-500 focus:border-orange-500">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium">Jenis Lowongan <span class="text-red-500">*</span></label>
                        <select class="w-full border rounded-md px-3 py-2 focus:ring-orange-500 focus:border-orange-500">
                            <option>Full Time</option>
                            <option>Part Time</option>
                            <option>Internship</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Gaji <span class="text-red-500">*</span></label>
                        <div class="flex items-center gap-2">
                            <input type="number"
                                class="w-1/3 border rounded-md px-3 py-2 focus:ring-orange-500 focus:border-orange-500">
                            <span>-</span>
                            <input type="number"
                                class="w-1/3 border rounded-md px-3 py-2 focus:ring-orange-500 focus:border-orange-500">
                            <select class="w-1/3 border rounded-md px-3 py-2 focus:ring-orange-500 focus:border-orange-500">
                                <option>Bulan</option>
                                <option>Minggu</option>
                                <option>Hari</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium">Deskripsi <span class="text-red-500">*</span></label>
                    <textarea rows="4" class="w-full border rounded-md px-3 py-2 focus:ring-orange-500 focus:border-orange-500"></textarea>
                </div>

                <div class="">
                    <div class="">
                        <h3 class="font-semibold mb-3">Syarat Pekerjaan</h3>
                        <div class="mb-4 flex gap-5">
                            <div>
                                <label class="block text-sm font-medium">Pendidikan <span
                                        class="text-red-500">*</span></label>
                            </div>
                            <div>
                                <div class="flex flex-wrap gap-4 mt-2">
                                    <label class="flex items-center gap-2">
                                        <input type="radio" name="pendidikan" value="SD"
                                            class="appearance-none w-4 h-4 border-2 border-orange-500 rounded-full checked:bg-orange-500 checked:border-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-300">
                                        SD
                                    </label>
                                    <label class="flex items-center gap-2">
                                        <input type="radio" name="pendidikan" value="SMP"
                                            class="appearance-none w-4 h-4 border-2 border-orange-500 rounded-full checked:bg-orange-500 checked:border-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-300">
                                        SMP
                                    </label>
                                    <label class="flex items-center gap-2">
                                        <input type="radio" name="pendidikan" value="SMA"
                                            class="appearance-none w-4 h-4 border-2 border-orange-500 rounded-full checked:bg-orange-500 checked:border-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-300">
                                        SMA
                                    </label>
                                    <label class="flex items-center gap-2">
                                        <input type="radio" name="pendidikan" value="SMK"
                                            class="appearance-none w-4 h-4 border-2 border-orange-500 rounded-full checked:bg-orange-500 checked:border-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-300">
                                        SMK
                                    </label>
                                </div>

                                <div class="flex flex-wrap gap-4 mt-2">
                                    <label class="flex items-center gap-2">
                                        <input type="radio" name="pendidikan" value="S1"
                                            class="appearance-none w-4 h-4 border-2 border-orange-500 rounded-full checked:bg-orange-500 checked:border-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-300">
                                        S1
                                    </label>
                                    <label class="flex items-center gap-2">
                                        <input type="radio" name="pendidikan" value="S2"
                                            class="appearance-none w-4 h-4 border-2 border-orange-500 rounded-full checked:bg-orange-500 checked:border-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-300">
                                        S2
                                    </label>
                                    <label class="flex items-center gap-2">
                                        <input type="radio" name="pendidikan" value="S3"
                                            class="appearance-none w-4 h-4 border-2 border-orange-500 rounded-full checked:bg-orange-500 checked:border-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-300">
                                        S3
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium">Jurusan</label>
                        <input type="text"
                            class="w-full border rounded-md px-3 py-2 focus:ring-orange-500 focus:border-orange-500">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium">Gender <span class="text-red-500">*</span></label>
                        <div class="flex gap-6 mt-2">
                            <label class="flex items-center gap-2"><input type="radio" name="gender" value="Laki-Laki"
                                    class="text-orange-500 focus:ring-orange-500"> Laki-Laki</label>
                            <label class="flex items-center gap-2"><input type="radio" name="gender" value="Perempuan"
                                    class="text-orange-500 focus:ring-orange-500"> Perempuan</label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium">Umur <span class="text-red-500">*</span></label>
                        <div class="flex items-center gap-2">
                            <input type="number"
                                class="w-20 border rounded-md px-3 py-2 focus:ring-orange-500 focus:border-orange-500">
                            <span>-</span>
                            <input type="number"
                                class="w-20 border rounded-md px-3 py-2 focus:ring-orange-500 focus:border-orange-500">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Batas Waktu <span class="text-red-500">*</span></label>
                        <input type="date"
                            class="w-1/3 border rounded-md px-3 py-2 focus:ring-orange-500 focus:border-orange-500">
                    </div>
                </div>

                <div class="flex justify-center gap-4 mt-6">
                    <button type="submit" class="bg-orange-500 text-white px-8 py-2 rounded-md">Simpan</button>
                    <button type="button"
                        class="border border-orange-500 text-orange-500 px-8 py-2 rounded-md">Batal</button>
                </div>
            </form>
        </div>
    </div>
@endsection
