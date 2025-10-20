@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="mx-auto mt-10">
        <div class="p-8">
            <h2 class="text-lg font-semibold mb-6">EDIT Perusahaan</h2>
            <div class="flex items-center gap-2 mb-5">
                @if ($Data->img_profile)
                    <img id="previewImage"
                        src="{{ asset('storage/' . $Data->img_profile) }}"
                        class="w-24 h-24 rounded-full object-cover mb-2">
                @else
                    <img id="previewImage"
                        src="https://static.vecteezy.com/system/resources/thumbnails/005/544/718/small_2x/profile-icon-design-free-vector.jpg"
                        class="w-24 h-24 rounded-full object-cover mb-2">
                @endif
                <div class="flex gap-2">
                    <label
                        class="flex items-center gap-2 border-2 bg-orange-500 px-6 py-2 rounded-lg w-full sm:w-auto justify-center cursor-pointer">
                        <i class="ph ph-upload-simple text-2xl text-white"></i>
                        <span class="text-white">Upload</span>
                        <input type="file" name="img_profile" id="foto" class="hidden" accept="image/*"
                            form="perusahaanForm">
                    </label>
                    <button type="button" onclick="removeImage()"
                        class="flex items-center gap-2 border border-orange-500 px-6 py-2 rounded-lg w-full sm:w-auto justify-center">
                        <i class="ph ph-trash text-2xl text-orange-500"></i>
                        <span class="text-orange-500">Remove</span>
                    </button>
                </div>
            </div>

            <form id="perusahaanForm" action="/dashboard/superadmin/perusahaan/update/perusahaan/{{ $Data->id }}"
                method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                <div>
                    <h3 class="font-semibold mb-2">Informasi Perusahaan</h3>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm mb-1">User ID *</label>
                            <input type="text" class="w-full border rounded-md px-3 py-2 text-sm" disabled
                                placeholder="User ID" value="{{ $Data->id }}">
                        </div>
                        <div>
                            <label class="block text-sm mb-1">Email *</label>
                            <input type="email" name="email" class="w-full border rounded-md px-3 py-2 text-sm"
                                placeholder="Email" value="{{ $Data->users->email }}">
                        </div>
                        <div>
                            <label class="block text-sm mb-1">Username *</label>
                            <input type="text" name="username" class="w-full border rounded-md px-3 py-2 text-sm"
                                placeholder="Username" value="{{ $Data->users->username }}">
                        </div>
                        <div>
                            <label class="block text-sm mb-1">Kata Sandi</label>
                            <input type="password" name="password" class="w-full border rounded-md px-3 py-2 text-sm"
                                placeholder="Kosongkan Jika Tidak Ingin Ubah Password" value="">
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="font-semibold mb-2">Data Perusahaan</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm mb-1">Nama Perusahaan *</label>
                            <input name="nama_perusahaan" type="text" class="w-full border rounded-md px-3 py-2 text-sm"
                                placeholder="Nama Perusahaan" value="{{ $Data->nama_perusahaan }}">
                        </div>
                        <div>
                            <label class="block text-sm mb-1">Legalitas *</label>
                            <input name="legalitas" type="text" class="w-full border rounded-md px-3 py-2 text-sm"
                                placeholder="Legalitas" value="{{ $Data->legalitas }}">
                        </div>
                        <div>
                            <label class="block text-sm mb-1">Deskripsi Perusahaan *</label>
                            <textarea name="deskripsi" rows="3" class="w-full border rounded-md px-3 py-2 text-sm"
                                placeholder="Deskripsi Perusahaan">{{ $Data->deskripsi }}</textarea>
                        </div>
                        <div>
                            <label class="block text-sm mb-1">Visi *</label>
                            <textarea name="visi" rows="2" class="w-full border rounded-md px-3 py-2 text-sm" placeholder="Visi">{{ $Data->visi }}</textarea>
                        </div>
                        <div>
                            <label class="block text-sm mb-1">Misi *</label>
                            <textarea name="misi" rows="2" class="w-full border rounded-md px-3 py-2 text-sm" placeholder="Misi">{{ $Data->misi }}</textarea>
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="font-semibold mb-2">Nomor Telepon</h3>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm mb-1">No. Perusahaan</label>
                            <input name="telepon_perusahaan" type="text"
                                class="w-full border rounded-md px-3 py-2 text-sm" placeholder="No. Perusahaan"
                                value="{{ $Data->telepon_perusahaan }}">
                        </div>
                        <div>
                            <label class="block text-sm mb-1">No. Whatsapp</label>
                            <input name="whatsapp" type="text" class="w-full border rounded-md px-3 py-2 text-sm"
                                placeholder="No. Whatsapp" value="{{ $Data->whatsapp }}">
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

    <script>
        const fileInput = document.getElementById('foto');
        const previewImage = document.getElementById('previewImage');

        fileInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                previewImage.src = URL.createObjectURL(file);
            }
        });

        function removeImage() {
            fileInput.value = '';
            previewImage.src =
                'https://static.vecteezy.com/system/resources/thumbnails/005/544/718/small_2x/profile-icon-design-free-vector.jpg';
        }
    </script>
@endsection
