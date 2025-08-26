@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="mx-auto mt-10">
        <div class="p-8">
            <h2 class="text-lg font-semibold mb-6">Tambah Perusahaan</h2>
            <div class="flex items-center gap-2 mb-5">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/005/544/718/small_2x/profile-icon-design-free-vector.jpg"
                    class="w-24 h-24 rounded-full object-cover mb-2">
                <div class="flex gap-2">
                    <div
                        class="flex items-center gap-2 border-2 bg-orange-500 px-6 py-2 rounded-lg w-full sm:w-auto justify-center">
                        <i class="ph ph-upload-simple text-2xl text-white"></i>
                        <span class="text-white">Upload</span>
                    </div>
                    <div
                        class="flex items-center gap-2 border border-orange-500 px-6 py-2 rounded-lg w-full sm:w-auto justify-center">
                        <i class="ph ph-trash text-2xl text-orange-500"></i>
                        <span class="text-orange-500">Remove</span>
                    </div>
                </div>
            </div>

            <form action="" method="POST" class="space-y-6">
                <div>
                    <h3 class="font-semibold mb-2">Informasi Perusahaan</h3>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm mb-1">User ID *</label>
                            <input type="text" class="w-full border rounded-md px-3 py-2 text-sm" placeholder="User ID">
                        </div>
                        <div>
                            <label class="block text-sm mb-1">Email *</label>
                            <input type="email" class="w-full border rounded-md px-3 py-2 text-sm" placeholder="Email">
                        </div>
                        <div>
                            <label class="block text-sm mb-1">Username *</label>
                            <input type="text" class="w-full border rounded-md px-3 py-2 text-sm" placeholder="Username">
                        </div>
                        <div>
                            <label class="block text-sm mb-1">Kata Sandi</label>
                            <input type="password" class="w-full border rounded-md px-3 py-2 text-sm"
                                placeholder="Kata Sandi">
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="font-semibold mb-2">Data Perusahaan</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm mb-1">Nama Perusahaan *</label>
                            <input type="text" class="w-full border rounded-md px-3 py-2 text-sm"
                                placeholder="Nama Perusahaan">
                        </div>
                        <div>
                            <label class="block text-sm mb-1">Legalitas *</label>
                            <input type="text" class="w-full border rounded-md px-3 py-2 text-sm"
                                placeholder="Legalitas">
                        </div>
                        <div>
                            <label class="block text-sm mb-1">Deskripsi Perusahaan *</label>
                            <textarea rows="3" class="w-full border rounded-md px-3 py-2 text-sm" placeholder="Deskripsi Perusahaan"></textarea>
                        </div>
                        <div>
                            <label class="block text-sm mb-1">Visi *</label>
                            <textarea rows="2" class="w-full border rounded-md px-3 py-2 text-sm" placeholder="Visi"></textarea>
                        </div>
                        <div>
                            <label class="block text-sm mb-1">Misi *</label>
                            <textarea rows="2" class="w-full border rounded-md px-3 py-2 text-sm" placeholder="Misi"></textarea>
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="font-semibold mb-2">Nomor Telepon</h3>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm mb-1">No. Perusahaan</label>
                            <input type="text" class="w-full border rounded-md px-3 py-2 text-sm"
                                placeholder="No. Perusahaan">
                        </div>
                        <div>
                            <label class="block text-sm mb-1">No. Whatsapp</label>
                            <input type="text" class="w-full border rounded-md px-3 py-2 text-sm"
                                placeholder="No. Whatsapp">
                        </div>
                    </div>
                </div>

                <div class="flex justify-center gap-4 pt-4">
                    <button type="submit" class="px-6 py-2 bg-orange-500 text-white rounded-md">Simpan</button>
                    <button type="button" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-md">Batal</button>
                </div>
            </form>
        </div>
    </div>
@endsection
