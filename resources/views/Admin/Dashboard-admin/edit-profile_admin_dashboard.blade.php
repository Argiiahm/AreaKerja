@extends('Admin.Dashboard-admin.layouts.index')

@section('admin-content')
    <div class="p-6 mt-8 px-5 lg:px-20 md:px-5 border-2">
        <h2 class="text-lg font-semibold mb-6">Edit Profile</h2>


        <form action="/dashboard/admin/profile/update/{{ Auth::user()->admin->id }}" method="POST" class="space-y-5" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex items-center gap-4 mb-6">
                <div class="flex items-center gap-4">
                    <div class="modal" id="imgModal">
                        <img id="modalImg" alt="Zoomed" class="w-40 h-40 sm:w-40 object-cover rounded-full">
                    </div>
                    @if (Auth::user()->admin->img_profile)
                        <img id="previewImageadmin" class="w-20 h-20 rounded-full object-cover border profile-img"
                            src="{{ asset('storage/' . Auth::user()->admin->img_profile) }}" alt="">
                    @else
                        <img id="previewImageadmin" class="w-20 h-20 rounded-full object-cover border profile-img"
                            src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                            alt="">
                    @endif
                    <div>
                        <h3 class="font-semibold text-lg">{{ Auth::user()->username }}</h3>
                        <p class="text-gray-500 text-sm">{{ Auth::user()->email }}</p>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label
                        class="flex items-center gap-2 bg-gray-500  px-6 py-2 rounded-lg w-full sm:w-auto justify-center cursor-pointer">
                        <i class="ph ph-upload-simple text-2xl text-white"></i>
                        <span class="text-white">Upload</span>
                        <input value="" type="file" id="fileInput" name="img_profile" accept="image/*"
                            class="hidden">
                    </label>

                    <button form="hapus-profile" type="submit"
                        class="flex items-center gap-2 border px-6 py-2 rounded-lg w-full sm:w-auto justify-center">
                        <i class="ph ph-trash text-2xl"></i>
                        <span>Remove</span>
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Email</label>
                    <input type="email" name="email" value="{{ Auth::user()->email }}"
                        class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Username</label>
                    <input type="text" name="username" value="{{ Auth::user()->username }}"
                        class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" value="{{ Auth::user()->admin->nama_lengkap }}"
                    class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Provinsi</label>
                    <select name="provinsi" class="w-full border rounded-md p-2">
                        @if (Auth::user()->admin->provinsi)
                            <option value="{{ Auth::user()->admin->provinsi }}" selected>{{ Auth::user()->admin->provinsi }}</option>
                        @else
                            <option selected disabled>Pilih Provinsi</option>
                            <option value="Yogyakarta">Yogyakarta</option>
                        @endif
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Kota/Kabupaten</label>
                    <select name="kota" class="w-full border rounded-md p-2">
                        @if (Auth::user()->admin->kota)
                            <option value="{{ Auth::user()->admin->kota }}" selected>{{ Auth::user()->admin->kota }}</option>
                        @else
                            <option selected disabled>Pilih Kota / kabupaten</option>
                            <option value="Sleman">Sleman</option>
                        @endif
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Kecamatan</label>
                    <select name="kecamatan" class="w-full border rounded-md p-2">
                        @if (Auth::user()->admin->kecamatan)
                            <option value="{{ Auth::user()->admin->kecamatan }}" selected>{{ Auth::user()->admin->kecamatan }}</option>
                        @else
                            <option selected disabled>Pilih Kecamatan</option>
                            <option value="Siduarjo">Siduarjo</option>
                        @endif
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Desa</label>
                    <input type="text" name="desa" value="{{ Auth::user()->admin->desa }}"
                        class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Kode Pos</label>
                    <input type="text" name="kode_pos" value="{{ Auth::user()->admin->kode_pos }}"
                        class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Detail Lainnya</label>
                <input type="text" name="detail_alamat" value="{{ Auth::user()->admin->detail__alamat }}"
                    class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300">
            </div>

            <div class="flex justify-center gap-4 pt-4">
                <button type="button" class="bg-red-600 hover:bg-red-700 text-white px-8 py-2 rounded-md">
                    Batal
                </button>
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-8 py-2 rounded-md">
                    Simpan
                </button>
            </div>
        </form>
    </div>
    <script>
        const profileImg = document.getElementById("previewImageadmin");
        const imgModal = document.getElementById("imgModal");
        const modalImg = document.getElementById("modalImg");

        profileImg.onclick = () => {
            imgModal.style.display = "flex";
            modalImg.src = profileImg.src;
        };

        imgModal.onclick = () => {
            imgModal.style.display = "none";
        };

        document
            .getElementById("fileInput")
            .addEventListener("change", function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById("previewImageadmin").src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
    </script>
@endsection
