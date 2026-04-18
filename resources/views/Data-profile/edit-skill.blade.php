@extends('layouts.index')

@section('content')
    <section class="pt-40 pb-20 bg-gray-50/50">
        
        <h1 class="font-bold text-2xl mx-4 sm:mx-10 text-gray-800">Edit Skill & Keahlian</h1>

        <div class="mt-6 bg-white border border-gray-100 shadow-xl shadow-orange-100/50 p-8 sm:p-12 rounded-3xl mx-4 sm:mx-10 transition-all">
            <div class="flex flex-col lg:flex-row lg:items-center gap-8 lg:gap-14">
                
                <div class="flex flex-col items-center group">
                    <div class="relative">
                        <div class="w-44 h-44 rounded-full p-1 border-4 border-orange-100 group-hover:border-orange-500 transition-all duration-500 overflow-hidden shadow-inner bg-gray-50">
                            @if (Auth::user()->pelamars->img_profile)
                                <img id="previewImage" class="w-full h-full object-cover rounded-full profile-img shadow-md"
                                    src="{{ asset('storage/' . Auth::user()->pelamars->img_profile) }}" alt="Profile">
                            @else
                                <img id="previewImage" class="w-full h-full object-cover rounded-full shadow-md"
                                    src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=f97316&color=fff&size=256"
                                    alt="Avatar">
                            @endif
                            
                            <div class="absolute inset-0 flex items-center justify-center bg-black/40 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <i class="ph ph-lightning text-3xl text-white"></i>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <div class="bg-orange-50 border border-orange-200 text-orange-700 py-2 px-6 rounded-full text-sm font-bold">
                            {{ ucfirst(Auth::user()->pelamars->kategori ?? 'Pelamar') }}
                        </div>
                    </div>
                </div>

                <div class="flex flex-col w-full">
                    <div class="mb-6 text-center lg:text-left">
                        <h2 class="text-2xl font-bold text-gray-800">{{ Auth::user()->pelamars->nama_pelamar ?? Auth::user()->username }}</h2>
                        <p class="text-gray-500 text-sm">Tonjolkan keahlian terbaik Anda agar perusahaan lebih tertarik.</p>
                    </div>

                    <div class="flex flex-col lg:flex-row items-center w-full justify-between gap-6 bg-gray-50/50 p-6 rounded-2xl border border-dashed border-gray-200">
                        <div class="flex flex-col sm:flex-row gap-3 items-center w-full sm:w-auto">
                            <a href="/profile" class="flex items-center gap-2 bg-white border border-gray-200 hover:border-orange-500 hover:text-orange-500 px-6 py-2.5 rounded-xl w-full sm:w-auto justify-center transition-all text-gray-600 font-medium">
                                <i class="ph ph-arrow-left text-xl"></i>
                                <span>Kembali ke Profil</span>
                            </a>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                            <a href="/cv/{{ Auth::user()->pelamars->id }}/unduh"
                                class="flex items-center justify-center gap-2 bg-emerald-500 hover:bg-emerald-600 px-8 py-2.5 rounded-xl text-center w-full sm:w-auto shadow-lg shadow-emerald-100 transition-all transform hover:-translate-y-1">
                                <i class="ph ph-file-pdf text-white text-xl"></i>
                                <span class="text-white font-bold">Unduh CV</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-10 mx-4 sm:mx-10 bg-white p-8 sm:p-12 rounded-3xl border border-gray-100 shadow-sm">
            <h2 class="text-xl font-bold text-gray-800 border-b-2 border-orange-500 pb-2 mb-8 flex items-center gap-2">
                <i class="ph ph-wrench text-orange-500 text-2xl"></i>
                Detail Keahlian
            </h2>

            <form class="space-y-6" action="/update/skill/{{ $data->id }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="skill" class="block mb-2 text-sm font-semibold text-gray-700">Nama Skill</label>
                        <div class="relative">
                            <input type="text" name="skill" id="skill"
                                class="w-full border border-gray-300 rounded-xl p-3 pl-10 focus:ring-2 focus:ring-orange-400 focus:outline-none transition-all"
                                placeholder="Contoh: Laravel / Graphic Design" value="{{ $data->skill }}">
                            <i class="ph ph-star-four absolute left-3 top-3.5 text-orange-400 text-lg"></i>
                        </div>
                    </div>

                    <div>
                        <label for="experience_level" class="block mb-2 text-sm font-semibold text-gray-700">Tingkat Kemahiran</label>
                        <div class="relative">
                            <input type="text" name="experience_level" id="experience_level"
                                class="w-full border border-gray-300 rounded-xl p-3 pl-10 focus:ring-2 focus:ring-orange-400 focus:outline-none transition-all"
                                placeholder="Contoh: Pemula / Menengah / Ahli" value="{{ $data->experience_level }}">
                            <i class="ph ph-chart-bar absolute left-3 top-3.5 text-gray-400 text-lg"></i>
                        </div>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-3.5 rounded-xl transition-all shadow-lg shadow-orange-100 flex items-center justify-center gap-2 group">
                        <i class="ph ph-check-square text-xl group-hover:animate-bounce"></i>
                        Simpan Perubahan Skill
                    </button>
                </div>
            </form>

            <div class="mt-8 p-4 bg-gray-50 rounded-2xl border border-gray-200">
                <div class="flex gap-3">
                    <i class="ph ph-info text-orange-500 text-xl"></i>
                    <p class="text-xs text-gray-500 leading-relaxed">
                        <strong>Tips:</strong> Gunakan kata kunci yang spesifik seperti "Web Development" atau "Microsoft Office" agar profil Anda lebih mudah ditemukan oleh sistem pencarian perusahaan.
                    </p>
                </div>
            </div>
        </div>

    </section>
@endsection