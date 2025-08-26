@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="mx-auto bg-white shadow-md rounded-xl p-6">
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
                <input type="text" name="user_id" value="Bambang" class="w-full border rounded-md px-3 py-2">
            </div>

            <div>
                <label class="block text-sm mb-1">Email *</label>
                <input type="email" name="email" value="bambang_kurnia@gmail.com"
                    class="w-full border rounded-md px-3 py-2">
            </div>

            <div>
                <label class="block text-sm mb-1">Username *</label>
                <input type="text" name="username" value="bambang_kurnia" class="w-full border rounded-md px-3 py-2">
            </div>

            <div>
                <label class="block text-sm mb-1">Nama Lengkap *</label>
                <input type="text" name="nama_lengkap" value="Bambang Kurnia" class="w-full border rounded-md px-3 py-2">
            </div>

            <div>
                <label class="block text-sm mb-1">Kata Sandi *</label>
                <input type="password" name="password" value="******" class="w-full border rounded-md px-3 py-2">
            </div>

            <div class="flex justify-center items-center gap-10">
                <label class="block text-sm mb-1">Gender *</label>
                <div class="flex gap-4">
                    <label class="flex items-center gap-2">
                        <input type="radio" name="gender" value="laki-laki" checked class="accent-orange-500">
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
                <input type="text" name="alamat" value="Jl. Adisucipto No 74 A YK, 1985"
                    class="w-full border rounded-md px-3 py-2">
            </div>

            <div>
                <label class="block text-sm mb-1">No. Telepon *</label>
                <input type="text" name="telepon" value="081234762015" class="w-full border rounded-md px-3 py-2">
            </div>

            <div>
                <label class="block text-sm mb-1">Pendidikan</label>
                <div class="space-y-2">
                    <div class="bg-gray-100 p-3 rounded-md">Universitas AMIKOM Yogyakarta (2021 – 2025)</div>
                    <div class="bg-gray-100 p-3 rounded-md">SMA Negeri 1 Yogyakarta (2018 – 2021)</div>
                    <div class="bg-gray-100 p-3 rounded-md">SMP Negeri 1 Yogyakarta (2015 – 2018)</div>
                </div>
            </div>

            <div>
                <label class="block text-sm mb-1">Organisasi</label>
                <div class="bg-gray-100 p-3 rounded-md">Departemen Olahraga – OSIS (2016 – 2017)</div>
            </div>

            <div>
                <label class="block text-sm mb-1">Pengalaman Kerja</label>
                <div class="bg-gray-100 p-3 rounded-md">
                    UI/UX Designer – Merona Creative (2022 – 2023) <br>
                    Bertanggung jawab dalam membuat desain antarmuka aplikasi mobile & organisasi untuk berbagai kebutuhan
                    branding.
                </div>
            </div>

            <div>
                <label class="block text-sm mb-1">Skill</label>
                <div class="space-y-2">
                    <div class="bg-gray-100 p-3 rounded-md">Photographer</div>
                    <div class="bg-gray-100 p-3 rounded-md">Lightingman</div>
                    <div class="bg-gray-100 p-3 rounded-md">UI/UX Designer</div>
                </div>
            </div>

            <div>
                <label class="block text-sm mb-1">Instagram</label>
                <input type="text" name="instagram" value="bambang_kurnia" class="w-full border rounded-md px-3 py-2">
            </div>

            <div>
                <label class="block text-sm mb-1">LinkedIn</label>
                <input type="text" name="linkedin" value="bambang_kurnia" class="w-full border rounded-md px-3 py-2">
            </div>

            <div>
                <label class="block text-sm mb-1">Website</label>
                <input type="text" name="website" value="www.bambangkurnia.com"
                    class="w-full border rounded-md px-3 py-2">
            </div>

            <div>
                <label class="block text-sm mb-1">Twitter</label>
                <input type="text" name="twitter" value="bambang_kurnia" class="w-full border rounded-md px-3 py-2">
            </div>

            <div class="flex justify-center gap-4 pt-4">
                <button type="submit" class="px-6 py-2 bg-orange-500 text-white rounded-md">Upload</button>
                <button type="reset" class="px-6 py-2 border border-gray-300 rounded-md">Reset</button>
            </div>
        </form>
    </div>
@endsection
