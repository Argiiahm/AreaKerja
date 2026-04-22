@extends('layouts.index')

@section('content')
    <div class="min-h-screen  mt-36 pb-20">
        <div class="max-w-7xl mx-auto px-6">
            {{-- Header Page --}}
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
                <div>
                    <h1 class="text-2xl font-bold text-slate-900">Profile Perusahaan</h1>
                    <p class="text-slate-500 text-sm">Kelola informasi publik dan identitas bisnis Anda.</p>
                </div>
                <a href="/dashboard/perusahaan/edit/profile"
                    class="inline-flex items-center justify-center px-5 py-2.5 bg-orange-400 text-white text-sm font-semibold rounded-lg">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                    Perbarui Profile
                </a>
            </div>

            {{-- Progress Bar --}}
            @php
                $perusahaanCompletion = Auth::user()->perusahaan->profile_completion_percentage;
            @endphp
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6 mb-8">
                <div class="flex justify-between items-center mb-2">
                    <h3 class="text-sm font-bold text-slate-900">Kelengkapan Profile</h3>
                    <span class="text-sm font-bold {{ $perusahaanCompletion == 100 ? 'text-emerald-500' : 'text-orange-500' }}">{{ $perusahaanCompletion }}%</span>
                </div>
                <div class="w-full bg-slate-100 rounded-full h-2.5">
                    <div class="h-2.5 rounded-full {{ $perusahaanCompletion == 100 ? 'bg-emerald-500' : 'bg-orange-500' }} transition-all" style="width: {{ $perusahaanCompletion }}%"></div>
                </div>
                @if($perusahaanCompletion < 100)
                    <p class="text-xs text-slate-500 mt-2">Lengkapi profile Anda untuk dapat mengakses halaman dashboard utama.</p>
                @endif
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <div class="lg:col-span-4 space-y-6">
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                        <div class="px-6 pb-6">
                            <div class="relative mt-10 mb-4">
                                @php
                                    $profileSrc = Auth::user()->perusahaan->img_profile
                                        ? asset('storage/' . Auth::user()->perusahaan->img_profile)
                                        : 'https://ui-avatars.com/api/?name=' .
                                            urlencode(Auth::user()->username) .
                                            '&background=4f46e5&color=fff&size=128';
                                @endphp
                                <img id="previewImagePerusahaan" src="{{ $profileSrc }}"
                                    class="w-24 h-24 rounded-xl object-cover border-4 border-white"
                                    alt="Avatar">
                            </div>
                            <h2 class="text-xl font-bold text-slate-900">{{ Auth::user()->perusahaan->nama_perusahaan }}
                            </h2>
                            <p class="text-sm text-orange-400 font-medium mb-4">
                                {{ Auth::user()->perusahaan->jenis_perusahaan ?? 'Belum diatur' }}</p>
                            <p class="text-sm text-slate-600 leading-relaxed border-t border-slate-100 pt-4">
                                {{ Auth::user()->perusahaan->deskripsi ?? 'Perusahaan ini belum menyertakan deskripsi singkat.' }}
                            </p>
                        </div>
                    </div>

                    {{-- Contact Card --}}
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
                        <h3 class="text-sm font-bold text-slate-900 uppercase tracking-wider mb-4">Detail Kontak</h3>
                        <div class="space-y-4">
                            <div class="flex items-center text-slate-600 group">
                                <div
                                    class="w-8 h-8 rounded-lg bg-slate-50 flex items-center justify-center mr-3 group-hover:bg-indigo-50 transition-colors">
                                    <svg class="w-4 h-4 text-slate-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                    </svg>
                                </div>
                                @php
                                    $url = Auth::user()->perusahaan->website_perusahaan;
                                    if ($url && !preg_match('~^https?://~', $url)) {
                                        $url = 'https://' . $url;
                                    }
                                @endphp
                                <a href="{{ $url }}" target="_blank"
                                    class="text-sm truncate">{{ Auth::user()->perusahaan->website_perusahaan ?? '-' }}</a>
                            </div>
                            <div class="flex items-center text-slate-600 group">
                                <div
                                    class="w-8 h-8 rounded-lg bg-slate-50 flex items-center justify-center mr-3 group-hover:bg-indigo-50 transition-colors">
                                    <svg class="w-4 h-4 text-slate-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <span class="text-sm truncate">{{ Auth::user()->email }}</span>
                            </div>
                            <div class="flex items-center text-slate-600 group">
                                <div
                                    class="w-8 h-8 rounded-lg bg-slate-50 flex items-center justify-center mr-3 group-hover:bg-indigo-50 transition-colors">
                                    <svg class="w-4 h-4 text-slate-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <span
                                    class="text-sm">{{ Auth::user()->perusahaan->whatsapp ?? (Auth::user()->perusahaan->telepon_perusahaan ?? '-') }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-8 space-y-6">
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <div>
                                <h3 class="text-xs font-bold text-slate-400 uppercase tracking-[0.15em] mb-4">Visi Utama
                                </h3>
                                <p class="text-slate-700 leading-relaxed font-medium">
                                    {{ Auth::user()->perusahaan->visi ?? 'Belum ada visi yang ditetapkan.' }}
                                </p>
                            </div>
                            <div>
                                <h3 class="text-xs font-bold text-slate-400 uppercase tracking-[0.15em] mb-4">Misi
                                    Perusahaan</h3>
                                <p class="text-slate-700 leading-relaxed">
                                    {{ Auth::user()->perusahaan->misi ?? 'Belum ada misi yang ditetapkan.' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm">
                            <p class="text-slate-500 text-xs font-medium uppercase">Terdaftar Sejak</p>
                            <p class="text-lg font-bold text-slate-800 mt-1">{{ Auth::user()->created_at->format('M Y') }}
                            </p>
                        </div>
                        <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm">
                            <p class="text-slate-500 text-xs font-medium uppercase">Badan Usaha</p>
                            <p class="text-lg font-bold text-orange-400 mt-1">
                                {{ Auth::user()->perusahaan->jenis_perusahaan ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="imgModal" class="hidden fixed inset-0 z-[100] transition-all duration-300">
        <div class="absolute inset-0 bg-slate-900/90 backdrop-blur-md"></div>
        <div class="relative h-full flex items-center justify-center p-6">
            <button id="closeModal" class="absolute top-6 right-6 text-white/50 hover:text-white transition-colors">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <img id="modalImg"
                class="max-w-full max-h-[85vh] rounded-2xl shadow-2xl object-contain transform transition-transform duration-300">
        </div>
    </div>

    <script>
        const profileImg = document.getElementById("previewImagePerusahaan");
        const modal = document.getElementById("imgModal");
        const modalImg = document.getElementById("modalImg");

        profileImg.onclick = () => {
            modal.classList.remove("hidden");
            modalImg.src = profileImg.src;
            document.body.style.overflow = 'hidden';
        };

        modal.onclick = (e) => {
            if (e.target.closest('#closeModal') || e.target === modal.firstElementChild || e.target === modal) {
                modal.classList.add("hidden");
                document.body.style.overflow = 'auto';
            }
        };
    </script>
@endsection
