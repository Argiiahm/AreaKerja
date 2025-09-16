@extends('Admin.Dashboard-admin.layouts.index')

@section('admin-content')
    <div class="mx-aut p-6 mt-8 border-2 rounded-lg px-5 lg:px-20 md:px-5">
        <h2 class="text-lg font-semibold mb-6">Edit Profile</h2>

        <div class="flex items-center gap-4 mb-6">
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

        <form action="" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Email</label>
                    <input type="email" name="email" value="{{ Auth::user()->email }}"
                        class="w-full border-2 border-gray rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-black disabled:bg-gray-100"
                        disabled>
                </div>


                <div>
                    <label class="block text-sm font-medium mb-1">Username</label>
                    <input type="text" name="username" value="{{ Auth::user()->username }}"
                        class="w-full border-2 border-gray rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-black disabled:bg-gray-100"
                        disabled>
                </div>

            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" value="{{ Auth()->user()->admin->nama_lengkap }}"
                    class="w-full border-2 border-gray rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-black disabled:bg-gray-100"
                    disabled>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Provinsi</label>
                    <select name="provinsi" class="w-full border rounded-md p-2">
                        @if (Auth::user()->admin->provinsi)
                            <option selected>{{ Auth::user()->admin->provinsi }}</option>
                        @else
                            <option selected>Data Belum Dilengkapi</option>
                        @endif
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Kota/Kabupaten</label>
                    <select name="kota" class="w-full border rounded-md p-2">
                        @if (Auth::user()->admin->kota)
                            <option selected>{{ Auth::user()->admin->kota }}</option>
                        @else
                            <option selected>Data Belum Dilengkapi</option>
                        @endif
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Kecamatan</label>
                    <select name="kecamatan" class="w-full border rounded-md p-2">
                        @if (Auth::user()->admin->kecamatan)
                            <option selected>{{ Auth::user()->admin->kecamatan }}</option>
                        @else
                            <option selected>Data Belum Dilengkapi</option>
                        @endif
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Desa</label>
                    <input type="text" name="desa" value="{{ Auth::user()->admin->desa }}"
                        class="w-full border-2 border-gray rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-black disabled:bg-gray-100"
                        disabled>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Kode Pos</label>
                    <input type="text" name="kode_pos" value="{{ Auth::user()->admin->kode_pos }}"
                        class="w-full border-2 border-gray rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-black disabled:bg-gray-100"
                        disabled>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Detail Lainnya</label>
                <input type="text" name="detail_lainnya" value="{{ Auth::user()->admin->detail_alamat }}"
                    class="w-full border-2 border-gray rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-black disabled:bg-gray-100"
                    disabled>
            </div>

            <div class="flex justify-center pt-2">
                <a href="/dashboard/admin/profile/edit/{{ Auth::user()->admin->id }}"
                    class="bg-gray-600 hover:bg-gray-700 text-white px-8 py-2 rounded-md">
                    Edit
                </a>
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
