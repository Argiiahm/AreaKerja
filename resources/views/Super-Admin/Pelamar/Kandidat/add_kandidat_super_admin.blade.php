@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="mx-auto border rounded-xl p-6">
        <h2 class="text-lg font-semibold mb-4">Edit Kandidat</h2>

        <div class="flex items-center gap-2">
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

        <form action="#" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm mb-1">User ID *</label>
                <input type="text" name="user_id" class="w-full border rounded-md px-3 py-2">
            </div>

            <div>
                <label class="block text-sm mb-1">Email *</label>
                <input type="email" name="email" class="w-full border rounded-md px-3 py-2">
            </div>

            <div>
                <label class="block text-sm mb-1">Username *</label>
                <input type="text" name="username" class="w-full border rounded-md px-3 py-2">
            </div>

            <div>
                <label class="block text-sm mb-1">Nama Lengkap *</label>
                <input type="text" name="nama_lengkap" class="w-full border rounded-md px-3 py-2">
            </div>

            <div>
                <label class="block text-sm mb-1">Kata Sandi *</label>
                <input type="password" name="password" class="w-full border rounded-md px-3 py-2">
            </div>

            <div>
                <label class="block text-sm mb-1">Gender *</label>
                <div class="flex gap-4">
                    <label class="flex items-center gap-2">
                        <input type="radio" name="gender" value="laki-laki" class="accent-orange-500">
                        <span>Laki-Laki</span>
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="radio" name="gender" value="perempuan" class="accent-orange-500">
                        <span>Perempuan</span>
                    </label>
                </div>
            </div>

            <div>
                <label class="block text-sm mb-1">Alamat *</label>
                <input type="text" name="alamat" class="w-full border rounded-md px-3 py-2">
            </div>

            <div>
                <label class="block text-sm mb-1">No. Telepon *</label>
                <input type="text" name="telepon" class="w-full border rounded-md px-3 py-2">
            </div>

            <div class="space-y-3">
                  <label class="block text-sm mb-1">Pendidikan *</label>
                <button type="button"
                    class="w-full flex justify-between items-center bg-orange-500 text-white px-4 py-2 rounded-md">
                    <span>Tambahkan Pendidikan</span>
                    <span class="text-xl">+</span>
                </button>

                  <label class="block text-sm mb-1">Organisasi *</label>
                <button type="button"
                    class="w-full flex justify-between items-center bg-orange-500 text-white px-4 py-2 rounded-md">
                    <span>Tambahkan Organisasi</span>
                    <span class="text-xl">+</span>
                </button>

                  <label class="block text-sm mb-1">Pengalaman *</label>
                <button type="button"
                    class="w-full flex justify-between items-center bg-orange-500 text-white px-4 py-2 rounded-md">
                    <span>Tambahkan Pengalaman Kerja</span>
                    <span class="text-xl">+</span>
                </button>

                  <label class="block text-sm mb-1">Skill *</label>
                <button type="button"
                    class="w-full flex justify-between items-center bg-orange-500 text-white px-4 py-2 rounded-md">
                    <span>Tambahkan Skill</span>
                    <span class="text-xl">+</span>
                </button>
            </div>

            <h2 class="text-lg font-semibold mb-4">Social Media</h2>
            <div>
                <label class="block text-sm mb-1">Instagram</label>
                <input type="text" name="instagram" class="w-full border rounded-md px-3 py-2">
            </div>

            <div>
                <label class="block text-sm mb-1">LinkedIn</label>
                <input type="text" name="linkedin" class="w-full border rounded-md px-3 py-2">
            </div>

            <div>
                <label class="block text-sm mb-1">Website</label>
                <input type="text" name="website" class="w-full border rounded-md px-3 py-2">
            </div>

            <div>
                <label class="block text-sm mb-1">Twitter</label>
                <input type="text" name="twitter" class="w-full border rounded-md px-3 py-2">
            </div>

            <div class="flex justify-center gap-4 pt-4">
                <button type="submit" class="px-6 py-2 bg-orange-500 text-white rounded-md">Upload</button>
                <button type="reset" class="px-6 py-2 border border-gray-300 rounded-md">Batal</button>
            </div>
        </form>
    </div>
@endsection
