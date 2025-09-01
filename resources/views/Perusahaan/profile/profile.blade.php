@extends('layouts.index')

@section('content')
    <div class="max-w-5xl mx-auto px-6 py-10 mt-32">
        <div class="flex items-center gap-4 mb-8">
            <div class="modal" id="imgModal">
                <img id="modalImg" alt="Zoomed" class="aspect-square w-80 h-80 bg-white  rounded-full">
            </div>
            @if (Auth::user()->perusahaan->img_profile)
                <img id="previewImagePerusahaan" class="w-20 h-20 object-cover profile-img"
                    src="{{ asset('storage/' . Auth::user()->perusahaan->img_profile) }}" alt="" alt="Profile">
            @else
                <img id="previewImagePerusahaan" class="w-20 h-20 object-cover profile-img"
                    src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                    alt="">
            @endif
            <div>
                <h2 class="font-bold text-xl">{{ Auth::user()->perusahaan->nama_perusahaan }}</h2>
                <p class="text-gray-600 text-sm mb-2">{{ Auth::user()->perusahaan->jenis_perusahaan }}</p>
                <a href="/dashboard/perusahaan/edit/profile"
                    class="mt-4 px-4 py-1 text-sm border border-orange-500 text-orange-500 rounded-md hover:bg-orange-500 hover:text-white transition">
                    Edit Profile
                </a>
            </div>
        </div>
        @if (Auth::user()->perusahaan->deskripsi)
            <div class="flex flex-col sm:flex-row sm:items-start gap-4">
                <label class="w-40 font-medium">Deskripsi <span class="text-red-500">*</span></label>
                <input value="{{ Auth::user()->perusahaan->deskripsi }}"
                    class="flex-1 border border-orange-400 rounded-md p-2 focus:ring-2 focus:ring-orange-400"
                    name="deskripsi" type="text" id="" readonly>
            </div>
        @else
            <div class="flex flex-col sm:flex-row sm:items-start gap-4">
                <label class="w-40 font-medium">Deskripsi <span class="text-red-500">*</span></label>
                <textarea rows="2" class="flex-1 border border-orange-400 rounded-md p-2 focus:ring-2 focus:ring-orange-400"
                    name="deskripsi" readonly></textarea>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-2 flex flex-col gap-4">

                <div class="flex items-center justify-center gap-24 mt-7">
                    <label class="block font-semibold mb-1 w-40">Badan Usaha</label>
                    <select
                        class="w-full border border-orange-400 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-orange-400">
                        <option>Pilih badan usaha</option>
                    </select>
                </div>

                <div class="flex items-center justify-center gap-44">
                    <label class="block font-semibold mb-1">Visi</label>
                    <input type="text" value="{{ Auth::user()->perusahaan->visi }}" readonly
                        class="w-full border border-orange-400 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-orange-400">
                </div>

                <div class="flex items-center justify-center gap-44">
                    <label class="block font-semibold mb-1">Misi</label>
                    <input type="text" value="{{ Auth::user()->perusahaan->misi }}" readonly
                        class="w-full border border-orange-400 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-orange-400">
                </div>
            </div>

            <div class="border border-orange-400 rounded-md p-4 mt-7">
                <h3 class="font-bold text-lg mb-3">Kontak</h3>
                <ul class="text-sm space-y-2 list-disc px-5">
                    <li><span class="font-semibold">Website :</span> <a  href="{{ Auth::user()->perusahaan->website_perusahaan }}"
                            class="text-blue-600 hover:underline">{{ Auth::user()->perusahaan->website_perusahaan }}</a></li>
                    <li><span class="font-semibold">Telepon :</span>{{ Auth::user()->perusahaan->telepon_perusahaan }}</li>
                    <li><span class="font-semibold">Whatsapp :</span>{{ Auth::user()->perusahaan->whatsapp }}</li>
                    <li><span class="font-semibold">Email :</span>{{ Auth::user()->email }}</li>
                </ul>
            </div>
        </div>

        <div class="mt-12 flex justify-center">
            <button
                class="flex flex-col items-center border border-orange-400 rounded-md p-6 hover:bg-orange-50 transition">
                <span class="text-orange-500 text-4xl font-bold">+</span>
                <span class="mt-2 bg-orange-500 text-white px-6 py-2 rounded-md">Lowongan</span>
            </button>
        </div>
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
