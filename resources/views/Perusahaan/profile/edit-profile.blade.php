@extends('layouts.index')

@section('content')
    <div class="max-w-5xl mx-auto px-4 sm:px-6 py-10 mt-24">
        <h2 class="text-lg font-bold mb-6">Profil Akun</h2>

        <form action="/dashboard/perusahaan/update/profile/{{ Auth::user()->perusahaan->id }}" method="POST"
            enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="flex flex-col sm:flex-row sm:items-start gap-6">
                <label class="w-40 font-medium">Logo Perusahaan <span class="text-red-500">*</span></label>
                <div class="flex flex-col sm:flex-row sm:items-center gap-4 w-full sm:w-7/12">
                    <div class="modal" id="imgModal">
                        <img id="modalImg" alt="Zoomed" class="w-40 h-40 sm:w-40 object-cover rounded-full">
                    </div>
                    <div class="border rounded-lg px-24 py-5 flex items-center justify-center ">
                        @if (Auth::user()->perusahaan->img_profile)
                            <img id="previewImagePerusahaan" class="w-40 h-40 object-cover profile-img"
                                src="{{ asset('storage/' . Auth::user()->perusahaan->img_profile) }}" alt=""
                                alt="Profile">
                        @else
                            <img id="previewImagePerusahaan" class="w-40 h-40 object-cover"
                                src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                                alt="">
                        @endif
                    </div>
                    <div class="flex flex-col gap-3">
                        <label
                            class="flex items-center gap-2 border-2 border-orange-500 px-6 py-2 rounded-lg w-full sm:w-auto justify-center cursor-pointer">
                            <i class="ph ph-upload-simple text-2xl text-orange-500"></i>
                            <span class="text-orange-500">Upload</span>
                            <input type="file" id="fileInputPerusahaan" name="img_profile" accept="image/*"
                                class="hidden">
                        </label>

                        <button form="hapus-profile" type="submit"
                            class="flex items-center gap-2 border px-6 py-2 rounded-lg w-full sm:w-auto justify-center">
                            <i class="ph ph-trash text-2xl"></i>
                            <span>Remove</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                <label class="w-40 font-medium">Nama Perusahaan <span class="text-red-500">*</span></label>
                <input type="text" value="{{ Auth::user()->perusahaan->nama_perusahaan }}" name="nama_perusahaan"
                    class="flex-1 border border-orange-400 rounded-md p-2 focus:ring-2 focus:ring-orange-400">
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                <label class="w-40 font-medium">Alamat Perusahaan <span class="text-red-500">*</span></label>
                <a href="/dashboard/perusahaan/tambah/alamat"
                    class="px-4 py-2 bg-orange-500 text-white rounded-md">Alamat</a>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                <label class="w-40 font-medium">Bidang Usaha <span class="text-red-500">*</span></label>
                <input type="text" value="{{ Auth::user()->perusahaan->jenis_perusahaan }}"
                    class="flex-1 border border-orange-400 rounded-md p-2 focus:ring-2 focus:ring-orange-400"
                    name="jenis_perusahaan">
            </div>

            @if (Auth::user()->perusahaan->deskripsi)
            <div class="flex flex-col sm:flex-row sm:items-start gap-4">
                <label class="w-40 font-medium">Deskripsi <span class="text-red-500">*</span></label>
                <input value="{{ Auth::user()->perusahaan->deskripsi }}" class="flex-1 border border-orange-400 rounded-md p-2 focus:ring-2 focus:ring-orange-400"
                    name="deskripsi" type="text" id="">
            </div>
            
            @else
                <div class="flex flex-col sm:flex-row sm:items-start gap-4">
                    <label class="w-40 font-medium">Deskripsi <span class="text-red-500">*</span></label>
                    <textarea rows="2" class="flex-1 border border-orange-400 rounded-md p-2 focus:ring-2 focus:ring-orange-400"
                        name="deskripsi"></textarea>
                </div>
            @endif

            <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                <label class="w-40 font-medium">Visi <span class="text-red-500">*</span></label>
                <input type="text" value="{{ Auth::user()->perusahaan->visi }}"
                    class="flex-1 border border-orange-400 rounded-md p-2 focus:ring-2 focus:ring-orange-400"
                    name="visi">
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                <label class="w-40 font-medium">Misi <span class="text-red-500">*</span></label>
                <input type="text" value="{{ Auth::user()->perusahaan->misi }}"
                    class="flex-1 border border-orange-400 rounded-md p-2 focus:ring-2 focus:ring-orange-400"
                    name="misi">
            </div>

            <hr class="my-6">

            <h3 class="text-md font-bold mb-4">Kontak</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                    <label class="w-28 font-medium">Website</label>
                    <input value="{{ Auth::user()->perusahaan->website_perusahaan }}" type="text"
                        class="flex-1 border border-orange-400 rounded-md p-2" name="website_perusahaan">
                </div>
                <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                    <label class="w-28 font-medium">Telepon</label>
                    <input value="{{ Auth::user()->perusahaan->telepon_perusahaan }}" type="text"
                        class="flex-1 border border-orange-400 rounded-md p-2" name="telepon_perusahaan">
                </div>
                <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                    <label class="w-28 font-medium">Whatsapp</label>
                    <input value="{{ Auth::user()->perusahaan->whatsapp }}" type="text"
                        class="flex-1 border border-orange-400 rounded-md p-2" name="whatsapp">
                </div>
                <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                    <label class="w-28 font-medium">Email</label>
                    <input type="text" class="flex-1 border border-orange-400 rounded-md p-2"
                        value="{{ Auth::user()->email }}" readonly>
                </div>
            </div>

            <div class="flex justify-end gap-4 mt-8">
                <a href="/dashboard/perusahaan/profile" class="px-6 py-2 border border-gray-400 rounded-md">Batal</a>
                <button type="submit" class="px-6 py-2 bg-orange-500 text-white rounded-md">Simpan</button>
            </div>
        </form>
    </div>
    <script>
        const profileImg = document.getElementById("previewImagePerusahaan");
        const imgModalp = document.getElementById("imgModal");
        const modalImgp = document.getElementById("modalImg");

        profileImg.onclick = () => {
            imgModalp.style.display = "flex";
            modalImgp.src = profileImg.src;
        };

        imgModalp.onclick = () => {
            imgModalp.style.display = "none";
        };

        document
            .getElementById("fileInputPerusahaan")
            .addEventListener("change", function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById("previewImagePerusahaan").src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
    </script>
@endsection
