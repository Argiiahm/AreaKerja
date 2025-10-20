@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="mx-auto mt-10">
        <div class="bg-white border rounded-lg shadow p-8">
            <h2 class="text-lg font-semibold mb-6">Tambah Data Lowongan</h2>

            <form action="/dashboard/superadmin/perusahaan/lowongan/create" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <input type="text" hidden name="perusahaan_id" value="{{ $Data->id }}">
                    <div>
                        <label class="block text-sm font-medium">Judul <span class="text-red-500">*</span></label>
                        <input type="text" name="nama"
                            class="w-full border rounded-md px-3 py-2 focus:ring-orange-500 focus:border-orange-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Alamat <span class="text-red-500">*</span></label>
                        <input type="text" name="alamat"
                            class="w-full border rounded-md px-3 py-2 focus:ring-orange-500 focus:border-orange-500">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium">Jenis Lowongan <span class="text-red-500">*</span></label>
                        <select name="jenis"
                            class="w-full border rounded-md px-3 py-2 focus:ring-orange-500 focus:border-orange-500">
                            <option value="fulltime">Full Time
                            </option>
                            <option value="middle">Middle
                            </option>
                            <option value="internship">Internship
                            </option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Gaji <span class="text-red-500">*</span></label>
                        <div class="flex items-center gap-2">
                            <input name="gaji_awal" type="number"
                                class="w-1/3 border rounded-md px-3 py-2 focus:ring-orange-500 focus:border-orange-500">
                            <span>-</span>
                            <input name="gaji_akhir" type="number"
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
                    <textarea name="deskripsi" rows="4"
                        class="w-full border rounded-md px-3 py-2 focus:ring-orange-500 focus:border-orange-500"></textarea>
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
                                <h3 class="font-semibold mb-3">Syarat Pekerjaan</h3>
                                <div class="mb-4 flex gap-5">
                                    <div>
                                        <label class="block text-sm font-medium">Pendidikan <span
                                                class="text-red-500">*</span></label>
                                    </div>
                                    <div>
                                        <div class="flex flex-wrap gap-4 mt-2">
                                            @foreach (['SD', 'SMP', 'SMA', 'SMK', 'S1', 'S2', 'S3'] as $edu)
                                                <label class="flex items-center gap-2">
                                                    <input type="radio" name="syarat_pekerjaan" value="{{ $edu }}"
                                                        class="appearance-none w-4 h-4 border-2 border-orange-500 rounded-full checked:bg-orange-500 checked:border-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-300">
                                                    {{ $edu }}
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Batas Lamaran <span class="text-red-500">*</span></label>
                        <input type="date" name="batas_lamaran" required
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
