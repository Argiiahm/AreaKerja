@extends('layouts.index')

@section('content')
    <div class="max-w-5xl mx-auto px-6 py-10 mt-32 space-y-10">

        <div class="flex items-center gap-6">
            <div class="relative">
                <div id="imgModal" class="hidden fixed inset-0 bg-black/70 flex items-center justify-center z-50">
                    <img id="modalImg" alt="Zoomed" class="w-80 h-80 rounded-full shadow-lg bg-white object-cover">
                </div>

                @if (Auth::user()->perusahaan->img_profile)
                    <img id="previewImagePerusahaan"
                        class="w-24 h-24 rounded-full object-cover cursor-pointer border border-orange-400 shadow-md"
                        src="{{ asset('storage/' . Auth::user()->perusahaan->img_profile) }}" alt="Profile">
                @else
                    <img id="previewImagePerusahaan"
                        class="w-24 h-24 rounded-full object-cover cursor-pointer border border-orange-400 shadow-md"
                        src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                        alt="Profile">
                @endif
            </div>

            <div>
                <h2 class="font-bold text-xl">{{ Auth::user()->perusahaan->nama_perusahaan }}</h2>
                <p class="text-gray-600 text-sm mb-3">{{ Auth::user()->perusahaan->jenis_perusahaan }}</p>
                <a href="/dashboard/perusahaan/edit/profile"
                    class="px-4 py-1 text-sm border border-orange-500 text-orange-500 rounded-md hover:bg-orange-500 hover:text-white transition">
                    Edit Profile
                </a>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row gap-4">
            <label class="w-40 font-medium shrink-0">Deskripsi <span class="text-red-500">*</span></label>
            @if (Auth::user()->perusahaan->deskripsi)
                <input value="{{ Auth::user()->perusahaan->deskripsi }}"
                    class="flex-1 border border-orange-400 rounded-md p-2 focus:ring-2 focus:ring-orange-400 bg-gray-50"
                    readonly>
            @else
                <textarea rows="2"
                    class="flex-1 border border-orange-400 rounded-md p-2 focus:ring-2 focus:ring-orange-400 bg-gray-50" readonly></textarea>
            @endif
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-2 space-y-5">
                <div class="flex flex-col sm:flex-row items-start gap-4">
                    <label class="w-40 font-medium">Badan Usaha</label>
                    <select
                        class="flex-1 border border-orange-400 rounded-md p-2 focus:ring-2 focus:ring-orange-400 bg-gray-50">
                        @if (Auth::user()->perusahaan->jenis_perusahaan)
                            <option value="{{ Auth::user()->perusahaan->jenis_perusahaan }}">
                                {{ Auth::user()->perusahaan->jenis_perusahaan }}</option>
                        @else
                            <option>Pilih badan usaha</option>
                        @endif
                    </select>
                </div>

                <div class="flex flex-col sm:flex-row items-start gap-4">
                    <label class="w-40 font-medium">Visi</label>
                    <input type="text" value="{{ Auth::user()->perusahaan->visi }}" readonly
                        class="flex-1 border border-orange-400 rounded-md p-2 focus:ring-2 focus:ring-orange-400 bg-gray-50">
                </div>

                <div class="flex flex-col sm:flex-row items-start gap-4">
                    <label class="w-40 font-medium">Misi</label>
                    <input type="text" value="{{ Auth::user()->perusahaan->misi }}" readonly
                        class="flex-1 border border-orange-400 rounded-md p-2 focus:ring-2 focus:ring-orange-400 bg-gray-50">
                </div>
            </div>

            <div class="border border-orange-400 rounded-md p-5 bg-gray-50">
                <h3 class="font-bold text-lg mb-3">Kontak</h3>
                <ul class="text-sm space-y-2">
                    <li><span class="font-semibold">Website :</span>
                        <a href="{{ Auth::user()->perusahaan->website_perusahaan }}" class="text-blue-600 hover:underline">
                            {{ Auth::user()->perusahaan->website_perusahaan }}
                        </a>
                    </li>
                    <li><span class="font-semibold">Telepon :</span> {{ Auth::user()->perusahaan->telepon_perusahaan }}
                    </li>
                    <li><span class="font-semibold">Whatsapp :</span> {{ Auth::user()->perusahaan->whatsapp }}</li>
                    <li><span class="font-semibold">Email :</span> {{ Auth::user()->email }}</li>
                </ul>
            </div>
        </div>

        <div class="flex justify-center">
            <button onclick="window.location='/dashboard/perusahaan/lowongan'"
                class="flex flex-col items-center border border-orange-400 rounded-xl p-6 hover:bg-orange-50 transition shadow-sm">
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
            imgModalp.classList.remove("hidden");
            modalImgp.src = profileImg.src;
        };

        imgModalp.onclick = () => {
            imgModalp.classList.add("hidden");
        };
    </script>
@endsection
