@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="p-8">
        <form id="kandidatForm" action="/dashboard/superadmin/pelamar/create/kandidat" method="POST"
            enctype="multipart/form-data">
            @csrf

            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-300 rounded-lg">
                    <div class="flex items-center gap-2 mb-2">
                        <i class="ph ph-warning-octagon text-red-500 text-2xl"></i>
                        <h3 class="font-semibold text-red-700 text-lg">Terdapat kesalahan:</h3>
                    </div>
                    <ul class="list-disc list-inside text-sm text-red-600 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Kategori --}}
            <input type="text" name="kategori" value="kandidat aktif" hidden>

            <!-- Profile Image Section -->
            <div
                class="flex flex-col sm:flex-row items-center sm:items-start gap-6 mb-8 p-6 bg-gray-50 rounded-lg border border-gray-200">
                <div class="relative">
                    <img id="previewImage"
                        src="{{ asset('https://static.vecteezy.com/system/resources/thumbnails/005/544/718/small_2x/profile-icon-design-free-vector.jpg') }}"
                        class="w-32 h-32 rounded-full object-cover border-4 border-gray-200">
                </div>

                <div class="flex flex-col sm:flex-row gap-4 mt-4 sm:mt-0">
                    <label
                        class="flex items-center gap-2 px-6 py-3 bg-orange-500 text-white font-semibold rounded-lg shadow-md hover:bg-orange-600 cursor-pointer transition duration-300">
                        <i class="ph ph-upload-simple text-xl"></i>
                        <span class="text-sm">Upload Foto</span>
                        <input type="file" name="img_profile" id="foto" class="hidden" accept="image/*">
                    </label>
                    <button type="button" onclick="removeImage()"
                        class="flex items-center gap-2 px-6 py-3 border border-orange-500 text-orange-600 font-semibold rounded-lg shadow-md hover:bg-orange-50 hover:border-orange-600 transition duration-300">
                        <i class="ph ph-trash text-xl"></i>
                        <span class="text-sm">Hapus Foto</span>
                    </button>
                </div>
            </div>

            <!-- Account Information Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="md:col-span-2">
                    <h2 class="text-xl font-semibold text-gray-700 mb-4 border-b border-gray-200 pb-2">Informasi Akun</h2>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email <span
                            class="text-red-500">*</span></label>
                    <input type="email" name="email" id="email"
                        class="w-full border-gray-300 rounded-md shadow-sm px-4 py-2 @error('email') border-red-500 @enderror  focus:ring-orange-500 focus:border-orange-500"
                        value="{{ old('email') }}" placeholder="Masukan Email">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="username" id="username"
                        class="w-full border-gray-300 rounded-md shadow-sm px-4 py-2 @error('username') border-red-500 @enderror  focus:ring-orange-500 focus:border-orange-500"
                        value="{{ old('username') }}" placeholder="Masukan Username">
                    @error('username')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Kata Sandi <span
                            class="text-red-500">*</span></label>
                    <input type="password" name="password" id="password"
                        class="w-full border-gray-300 rounded-md shadow-sm px-4 py-2 @error('password') border-red-500 @enderror focus:ring-orange-500 focus:border-orange-500"
                        value="{{ old('password') }}" placeholder="Masukan Password">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Personal Information Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="md:col-span-2">
                    <h2 class="text-xl font-semibold text-gray-700 mb-4 border-b border-gray-200 pb-2">Informasi Pribadi
                    </h2>
                </div>
                <div>
                    <label for="nama_pelamar" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="nama_pelamar" id="nama_pelamar"
                        class="w-full border-gray-300 rounded-md shadow-sm px-4 py-2 @error('nama_pelamar') border-red-500 @enderror @if (isset($pelamar)) bg-gray-100 @endif focus:ring-orange-500 focus:border-orange-500"
                        value="{{ old('nama_pelamar') }}" placeholder="Masukan Nama Lengkap">
                    @error('nama_pelamar')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin <span
                            class="text-red-500">*</span></label>
                    <div class="flex gap-6 mt-2">
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="radio" name="gender" value="laki-laki"
                                class="form-radio h-4 w-4 text-orange-600 focus:ring-orange-500"
                                {{ old('gender') == 'laki-laki' ? 'checked' : '' }}>
                            <span class="ml-2 text-gray-700">Laki-Laki</span>
                        </label>
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="radio" name="gender" value="perempuan"
                                class="form-radio h-4 w-4 text-orange-600 focus:ring-orange-500"
                                {{ old('gender') == 'perempuan' ? 'checked' : '' }}>
                            <span class="ml-2 text-gray-700">Perempuan</span>
                        </label>
                    </div>
                    @error('gender')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="telepon_pelamar" class="block text-sm font-medium text-gray-700 mb-1">No Telepon <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="telepon_pelamar" id="telepon_pelamar"
                        class="w-full border-gray-300 rounded-md shadow-sm px-4 py-2 @error('telepon_pelamar') border-red-500 @enderror focus:ring-orange-500 focus:border-orange-500"
                        value="{{ old('telepon_pelamar') }}" placeholder="Masukan No.telp">
                    @error('telepon_pelamar')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <button type="submit"
                class="bg-orange-400 px-6 text-white rounded-md py-2 float-end cursor-pointer">Simpan</button>
        </form>

        <script>
            const fileInput = document.getElementById('foto');
            const previewImage = document.getElementById('previewImage');
            const removeImageFlag = document.getElementById('removeImageFlag');
            const defaultImageUrl =
                'https://static.vecteezy.com/system/resources/thumbnails/005/544/718/small_2x/profile-icon-design-free-vector.jpg';

            fileInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    previewImage.src = URL.createObjectURL(file);
                    removeImageFlag.value = "0"; // Reset flag if new image is uploaded
                }
            });

            function removeImage() {
                fileInput.value = ''; // Clear the file input
                previewImage.src = defaultImageUrl;
                removeImageFlag.value = "1"; // Set flag to indicate image removal
            }
        </script>
    @endsection
