@extends('layouts.index')

@section('content')
    <div class="max-w-5xl mx-auto px-4 sm:px-6 py-10 mt-24">
        <h2 class="text-lg font-bold mb-6">Profil Akun</h2>

        <form action="#" method="POST" class="space-y-6">
            @csrf

            <div class="flex flex-col sm:flex-row sm:items-start gap-6">
                <label class="w-40 font-medium">Logo Perusahaan <span class="text-red-500">*</span></label>
                <div class="flex flex-col sm:flex-row sm:items-center gap-4 w-full sm:w-7/12">
                    <div class="border rounded-md px-10 py-3 flex items-center justify-center ">
                        <img src="{{ asset('Icon/seveninc.png') }}" alt="Logo" class="object-contain w-full">
                    </div>
                    <div class="flex flex-col gap-3">
                        <button type="button"
                            class="flex items-center gap-2 border border-orange-500 text-orange-500 px-4 py-2 rounded-md hover:bg-orange-50">
                            <i class="w-5 h-5 text-[22px] ph ph-upload-simple"></i>
                            Upload
                        </button>
                        <button type="button"
                            class="flex items-center gap-2 border border-gray-400 text-gray-600 px-4 py-2 rounded-md hover:bg-gray-50">
                            <i class="w-5 h-5 text-[22px] ph ph-trash"></i>
                            Remove
                        </button>
                    </div>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                <label class="w-40 font-medium">Nama Perusahaan <span class="text-red-500">*</span></label>
                <input type="text"
                    class="flex-1 border border-orange-400 rounded-md p-2 focus:ring-2 focus:ring-orange-400">
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                <label class="w-40 font-medium">Alamat Perusahaan <span class="text-red-500">*</span></label>
                <a href="/dashboard/perusahaan/tambah/alamat" class="px-4 py-2 bg-orange-500 text-white rounded-md">Alamat</a>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                <label class="w-40 font-medium">Bidang Usaha <span class="text-red-500">*</span></label>
                <input type="text"
                    class="flex-1 border border-orange-400 rounded-md p-2 focus:ring-2 focus:ring-orange-400">
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                <label class="w-40 font-medium">Nama Perusahaan <span class="text-red-500">*</span></label>
                <input type="text"
                    class="flex-1 border border-orange-400 rounded-md p-2 focus:ring-2 focus:ring-orange-400">
            </div>

            <div class="flex flex-col sm:flex-row sm:items-start gap-4">
                <label class="w-40 font-medium">Deskripsi <span class="text-red-500">*</span></label>
                <textarea rows="2" class="flex-1 border border-orange-400 rounded-md p-2 focus:ring-2 focus:ring-orange-400"></textarea>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                <label class="w-40 font-medium">Visi <span class="text-red-500">*</span></label>
                <input type="text"
                    class="flex-1 border border-orange-400 rounded-md p-2 focus:ring-2 focus:ring-orange-400">
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                <label class="w-40 font-medium">Misi <span class="text-red-500">*</span></label>
                <input type="text"
                    class="flex-1 border border-orange-400 rounded-md p-2 focus:ring-2 focus:ring-orange-400">
            </div>

            <hr class="my-6">

            <h3 class="text-md font-bold mb-4">Kontak</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                    <label class="w-28 font-medium">Website</label>
                    <input type="text" class="flex-1 border border-orange-400 rounded-md p-2">
                </div>
                <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                    <label class="w-28 font-medium">Telepon</label>
                    <input type="text" class="flex-1 border border-orange-400 rounded-md p-2">
                </div>
                <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                    <label class="w-28 font-medium">Whatsapp</label>
                    <input type="text" class="flex-1 border border-orange-400 rounded-md p-2">
                </div>
                <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                    <label class="w-28 font-medium">Email</label>
                    <input type="text" class="flex-1 border border-orange-400 rounded-md p-2">
                </div>
            </div>

            <div class="flex justify-end gap-4 mt-8">
                <button type="button" class="px-6 py-2 border border-gray-400 rounded-md">Batal</button>
                <button type="submit" class="px-6 py-2 bg-orange-500 text-white rounded-md">Simpan</button>
            </div>
        </form>
    </div>
@endsection
