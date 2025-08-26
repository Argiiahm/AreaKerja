@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="container max-w-screen-lg mx-auto mt-30">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="bg-orange-500 rounded-lg shadow-md p-10">
                <div class="flex items-center gap-4">
                    <div class="w-24 h-24 rounded-full bg-white flex items-center justify-center overflow-hidden">
                        <label for="foto" class="cursor-pointer">
                            <img id="preview" src="https://cdn-icons-png.flaticon.com/512/847/847969.png" alt="Profile"
                                class="w-20 h-20 object-cover">
                        </label>
                        <input type="file" name="foto" id="foto" accept="image/*" class="hidden"
                            onchange="previewImage(event)">
                    </div>

                    <input type="text" name="nama" placeholder="Masukkan Nama"
                        class="flex-1 px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-300">
                </div>

                <div class="grid grid-cols-3 gap-6 mt-6">
                    <div class="flex flex-col">
                        <label class="text-white text-sm mb-1">Divisi</label>
                        <select name="divisi"
                            class="px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-300">
                            <option value="">Pilih Divisi</option>
                            <option value="programmer">Programmer</option>
                            <option value="designer">Designer</option>
                            <option value="marketing">Marketing</option>
                        </select>
                    </div>

                    <div class="flex flex-col">
                        <label class="text-white text-sm mb-1">Mulai Pelatihan</label>
                        <input type="date" name="mulai"
                            class="px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-300">
                    </div>

                    <div class="flex flex-col">
                        <label class="text-white text-sm mb-1">Selesai Pelatihan</label>
                        <input type="date" name="selesai"
                            class="px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-300">
                    </div>
                </div>
            </div>

            <div class="flex flex-col items-center gap-3 mt-6">
                <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 rounded-md w-60 shadow">
                    Simpan
                </button>
                <a href="{{ url()->previous() }}"
                    class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 rounded-md w-60 shadow text-center">
                    Kembali
                </a>
            </div>
        </form>
    </div>
@endsection
