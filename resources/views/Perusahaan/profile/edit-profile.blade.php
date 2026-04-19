@extends('layouts.index')

@section('content')
    <div class="min-h-screen pb-20 mt-32">
        <div class="max-w-7xl mx-auto px-6 py-10">

            {{-- Breadcrumb & Title --}}
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-slate-800">Edit Profil Perusahaan</h2>
                <p class="text-slate-500 text-sm mt-1">Perbarui informasi detail perusahaan Anda untuk meningkatkan
                    kredibilitas.</p>
            </div>

            <div class="overflow-hidden">
                <form action="/dashboard/perusahaan/update/profile/{{ Auth::user()->perusahaan->id }}" method="POST"
                    enctype="multipart/form-data" class="divide-y divide-slate-100">
                    @csrf
                    @method('PUT')

                    {{-- Branding Section (Logo) --}}
                    <div class="p-8">
                        <div class="flex flex-col md:flex-row gap-8 items-start">
                            <div class="w-full md:w-40 shrink-0">
                                <span class="block text-sm font-bold text-slate-700 uppercase tracking-wider mb-1">Logo
                                    Perusahaan</span>
                                <span class="text-xs text-slate-400 font-normal">Disarankan 1:1 (Square)</span>
                            </div>

                            <div class="flex flex-col sm:flex-row items-center gap-6 w-full">
                                <div class="relative group cursor-pointer" id="imageTrigger">
                                    <div
                                        class="w-32 h-32 rounded-2xl overflow-hidden border-2 border-slate-100 shadow-inner bg-slate-50">
                                        @php
                                            $profileSrc = Auth::user()->perusahaan->img_profile
                                                ? asset('storage/' . Auth::user()->perusahaan->img_profile)
                                                : 'https://ui-avatars.com/api/?name=' .
                                                    urlencode(Auth::user()->username) .
                                                    '&background=fb923c&color=fff&size=128';
                                        @endphp
                                        <img id="previewImagePerusahaan"
                                            class="w-full h-full object-cover transition-opacity group-hover:opacity-80"
                                            src="{{ $profileSrc }}" alt="Profile Preview">
                                    </div>
                                    <div
                                        class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                        <i class="ph ph-magnifying-glass-plus text-white text-2xl"></i>
                                    </div>
                                </div>

                                <div class="flex flex-col gap-3 w-full sm:w-auto">
                                    <label
                                        class="border border-slate-200 hover:bg-red-50 hover:text-orange-400 hover:border-red-100 text-slate-600 px-5 py-2.5 rounded-xl transition-all">
                                        <i class="ph ph-upload-simple font-bold"></i>
                                        <span class="text-sm font-semibold">Ganti Logo</span>
                                        <input type="file" id="fileInputPerusahaan" name="img_profile" accept="image/*"
                                            class="hidden">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Basic Information Section --}}
                    <div class="p-8 space-y-6">
                        {{-- Nama --}}
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center">
                            <label class="text-sm font-semibold text-slate-700">Nama Perusahaan <span
                                    class="text-orange-500">*</span></label>
                            <div class="md:col-span-2">
                                <input type="text" value="{{ Auth::user()->perusahaan->nama_perusahaan }}"
                                    name="nama_perusahaan" required
                                    class="w-full border border-slate-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-orange-400/20 focus:border-orange-400 transition-all">
                            </div>
                        </div>

                        {{-- Bidang Usaha --}}
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center">
                            <label class="text-sm font-semibold text-slate-700">Bidang Usaha <span
                                    class="text-orange-500">*</span></label>
                            <div class="md:col-span-2">
                                <input type="text" value="{{ Auth::user()->perusahaan->jenis_perusahaan }}"
                                    name="jenis_perusahaan" required placeholder="Contoh: Teknologi, Konstruksi, dll"
                                    class="w-full border border-slate-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-orange-400/20 focus:border-orange-400 transition-all">
                            </div>
                        </div>

                        {{-- Alamat (Link) --}}
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center">
                            <label class="text-sm font-semibold text-slate-700">Lokasi Kantor</label>
                            <div class="md:col-span-2">
                                <a href="/dashboard/perusahaan/tambah/alamat"
                                    class="inline-flex items-center gap-2 text-sm font-semibold text-orange-500 bg-orange-50 px-4 py-2 rounded-lg hover:bg-orange-100 transition-colors">
                                    <i class="ph ph-map-pin"></i>
                                    Atur Alamat Detail Perusahaan
                                </a>
                            </div>
                        </div>

                        {{-- Deskripsi --}}
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start pt-2">
                            <label class="text-sm font-semibold text-slate-700">Deskripsi Perusahaan</label>
                            <div class="md:col-span-2">
                                <textarea name="deskripsi" rows="4"
                                    class="w-full border border-slate-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-orange-400/20 focus:border-orange-400 transition-all"
                                    placeholder="Ceritakan tentang perusahaan Anda...">{{ Auth::user()->perusahaan->deskripsi }}</textarea>
                            </div>
                        </div>

                        {{-- Visi & Misi --}}
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
                            <label class="text-sm font-semibold text-slate-700">Visi & Misi</label>
                            <div class="md:col-span-2 space-y-4">
                                <input type="text" value="{{ Auth::user()->perusahaan->visi }}" name="visi"
                                    placeholder="Visi"
                                    class="w-full border border-slate-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-orange-400/20 focus:border-orange-400 transition-all">
                                <textarea name="misi" rows="3" placeholder="Misi"
                                    class="w-full border border-slate-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-orange-400/20 focus:border-orange-400 transition-all">{{ Auth::user()->perusahaan->misi }}</textarea>
                            </div>
                        </div>
                    </div>

                    {{-- Contact Section --}}
                    <div class="p-8 bg-slate-50/50">
                        <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest mb-6">Informasi Kontak</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-1.5">
                                <label class="text-xs font-bold text-slate-500 ml-1">Website</label>
                                <input value="{{ Auth::user()->perusahaan->website_perusahaan }}" type="text"
                                    name="website_perusahaan" placeholder="https://..."
                                    class="w-full border border-slate-200 rounded-xl p-3 focus:outline-none focus:border-orange-400 transition-all">
                            </div>
                            <div class="space-y-1.5">
                                <label class="text-xs font-bold text-slate-500 ml-1">Telepon Kantor</label>
                                <input value="{{ Auth::user()->perusahaan->telepon_perusahaan }}" type="text"
                                    name="telepon_perusahaan"
                                    class="w-full border border-slate-200 rounded-xl p-3 focus:outline-none focus:border-orange-400 transition-all">
                            </div>
                            <div class="space-y-1.5">
                                <label class="text-xs font-bold text-slate-500 ml-1">WhatsApp Business</label>
                                <input value="{{ Auth::user()->perusahaan->whatsapp }}" type="text" name="whatsapp"
                                    class="w-full border border-slate-200 rounded-xl p-3 focus:outline-none focus:border-orange-400 transition-all">
                            </div>
                            <div class="space-y-1.5">
                                <label class="text-xs font-bold text-slate-500 ml-1">Email (Read-only)</label>
                                <input type="text" value="{{ Auth::user()->email }}" readonly
                                    class="w-full border border-slate-100 bg-slate-100 text-slate-500 rounded-xl p-3 cursor-not-allowed">
                            </div>
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="p-8 flex justify-end gap-3 bg-white">
                        <a href="/dashboard/perusahaan/profile"
                            class="px-8 py-3 border border-slate-200 text-slate-600 font-semibold rounded-xl hover:bg-slate-50 transition-all">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-8 py-3 bg-orange-400 hover:bg-orange-500 text-white font-bold rounded-xl shadow-lg shadow-orange-100 transition-all transform active:scale-95">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Hidden form untuk hapus profile --}}
    <form id="hapus-profile" action="/dashboard/perusahaan/delete/profile/{{ Auth::user()->perusahaan->id }}"
        method="POST" class="hidden">
        @csrf
        @method('DELETE')
    </form>

    {{-- Modern Zoom Modal --}}
    <div id="imgModal"
        class="hidden fixed inset-0 z-[100] flex items-center justify-center p-6 transition-all duration-300">
        <div class="absolute inset-0 bg-slate-900/80 backdrop-blur-sm"></div>
        <div class="relative max-w-2xl w-full flex flex-col items-center">
            <button id="closeModal" class="absolute -top-12 right-0 text-white/70 hover:text-white transition-colors">
                <i class="ph ph-x text-3xl font-bold"></i>
            </button>
            <img id="modalImg"
                class="max-w-full max-h-[80vh] rounded-2xl shadow-2xl object-contain border-4 border-white/20">
        </div>
    </div>

    <script>
        // Preview & Zoom Logic
        const imageTrigger = document.getElementById("imageTrigger");
        const modal = document.getElementById("imgModal");
        const modalImg = document.getElementById("modalImg");
        const previewImg = document.getElementById("previewImagePerusahaan");
        const closeBtn = document.getElementById("closeModal");

        imageTrigger.onclick = () => {
            modal.classList.remove("hidden");
            modalImg.src = previewImg.src;
            document.body.style.overflow = 'hidden';
        };

        modal.onclick = (e) => {
            if (e.target === modal || e.target.closest('#closeModal') || e.target.classList.contains('absolute')) {
                modal.classList.add("hidden");
                document.body.style.overflow = 'auto';
            }
        };

        // File Input Logic
        document.getElementById("fileInputPerusahaan").addEventListener("change", function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
