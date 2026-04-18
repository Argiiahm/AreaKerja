@extends('layouts.index')

@section('content')
    <section class="pt-40 pb-20 bg-gray-50/50">
        
        <h1 class="font-bold text-2xl mx-4 sm:mx-10 text-gray-800">Edit Pendidikan</h1>

        <div class="mt-6 bg-white border border-gray-100 shadow-xl shadow-orange-100/50 p-8 sm:p-12 rounded-3xl mx-4 sm:mx-10 transition-all">
            <div class="flex flex-col lg:flex-row lg:items-center gap-8 lg:gap-14">
                
                <div class="flex flex-col items-center group">
                    <div class="relative">
                        <div class="w-44 h-44 rounded-full p-1 border-4 border-orange-100 group-hover:border-orange-500 transition-all duration-500 overflow-hidden shadow-inner bg-gray-50">
                            {{-- Foto Profile tetap ambil dari Auth User --}}
                            @if (Auth::user()->pelamars->img_profile)
                                <img id="previewImage" class="w-full h-full object-cover rounded-full profile-img shadow-md"
                                    src="{{ asset('storage/' . Auth::user()->pelamars->img_profile) }}" alt="Profile">
                            @else
                                <img id="previewImage" class="w-full h-full object-cover rounded-full shadow-md"
                                    src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=f97316&color=fff&size=256"
                                    alt="Avatar">
                            @endif
                            
                            <div class="absolute inset-0 flex items-center justify-center bg-black/40 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <i class="ph ph-user text-3xl text-white"></i>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <div class="bg-orange-50 border border-orange-200 text-orange-700 py-2 px-6 rounded-full text-sm font-bold">
                            {{-- Menampilkan kategori user saat ini --}}
                            {{ ucfirst(Auth::user()->pelamars->kategori ?? 'Pelamar') }}
                        </div>
                    </div>
                </div>

                <div class="flex flex-col w-full">
                    <div class="mb-6 text-center lg:text-left">
                        <h2 class="text-2xl font-bold text-gray-800">{{ Auth::user()->pelamars->nama_pelamar ?? Auth::user()->username }}</h2>
                        <p class="text-gray-500 text-sm">Sedang memperbarui riwayat pendidikan Anda.</p>
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
                <i class="ph ph-graduation-cap text-orange-500 text-2xl"></i>
                Detail Pendidikan
            </h2>

            <form class="grid grid-cols-1 md:grid-cols-2 gap-6" action="/update/pendidikan/{{ $Data->id }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="md:col-span-2">
                    <label for="pendidikan" class="block mb-2 text-sm font-semibold text-gray-700">Tingkat Pendidikan</label>
                    <input type="text" name="pendidikan" id="pendidikan"
                        class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-orange-400 focus:outline-none transition-all"
                        placeholder="Contoh: S1 Teknik Informatika" value="{{ $Data->pendidikan }}" />
                </div>

                <div>
                    <label for="jurusan" class="block mb-2 text-sm font-semibold text-gray-700">Jurusan</label>
                    <input type="text" name="jurusan" id="jurusan"
                        class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-orange-400 focus:outline-none transition-all"
                        placeholder="Jurusan" value="{{ $Data->jurusan }}" />
                </div>

                <div>
                    <label for="asal_pendidikan" class="block mb-2 text-sm font-semibold text-gray-700">Nama Sekolah / Universitas</label>
                    <input type="text" name="asal_pendidikan" id="asal_pendidikan"
                        class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-orange-400 focus:outline-none transition-all"
                        placeholder="Nama Instansi" value="{{ $Data->asal_pendidikan }}" />
                </div>

                <div>
                    <label for="tahun_awal" class="block mb-2 text-sm font-semibold text-gray-700">Tahun Mulai</label>
                    <div class="relative">
                        <input type="text" name="tahun_awal" id="tahun_awal"
                            class="w-full border border-gray-300 rounded-xl p-3 pl-10 focus:ring-2 focus:ring-orange-400 focus:outline-none transition-all"
                            placeholder="2018" value="{{ $Data->tahun_awal }}" />
                        <i class="ph ph-calendar-blank absolute left-3 top-3.5 text-gray-400 text-lg"></i>
                    </div>
                </div>

                <div>
                    <label for="tahun_akhir" class="block mb-2 text-sm font-semibold text-gray-700">Tahun Lulus</label>
                    <div class="relative">
                        <input type="text" name="tahun_akhir" id="tahun_akhir"
                            class="w-full border border-gray-300 rounded-xl p-3 pl-10 focus:ring-2 focus:ring-orange-400 focus:outline-none transition-all"
                            placeholder="2022" value="{{ $Data->tahun_akhir }}" />
                        <i class="ph ph-calendar-check absolute left-3 top-3.5 text-gray-400 text-lg"></i>
                    </div>
                </div>

                <div class="md:col-span-2 pt-4">
                    <button type="submit"
                        class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-3.5 rounded-xl transition-all shadow-lg shadow-orange-100 flex items-center justify-center gap-2 group">
                        <i class="ph ph-floppy-disk text-xl group-hover:animate-pulse"></i>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

    </section>
@endsection