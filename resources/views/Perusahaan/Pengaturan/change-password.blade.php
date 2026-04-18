@extends('layouts.index')

@section('content')
<section class="max-w-7xl mx-auto pt-32 px-4 pb-20">
    <div class="mb-6">
        <a href="/dashboard/perusahaan/pengaturan" class="text-orange-500 hover:text-orange-600 flex items-center gap-2 text-sm font-medium">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Kembali ke Pengaturan
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-8 border-b border-gray-50 flex items-center gap-6 bg-gray-50/30">
            @if (Auth::user()->perusahaan->img_profile)
                <img class="w-16 h-16 rounded-xl object-cover border-2 border-white shadow-sm"
                    src="{{ asset('storage/' . Auth::user()->perusahaan->img_profile) }}" alt="Profile">
            @else
                <img class="w-16 h-16 rounded-xl object-cover border-2 border-white shadow-sm"
                    src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=f97316&color=fff" alt="Profile">
            @endif
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Keamanan Akun</h1>
                <p class="text-sm text-gray-500">Perbarui kata sandi Anda secara berkala untuk menjaga keamanan data.</p>
            </div>
        </div>

        <div class="p-8">
            <form id="change_pw" action="/dashboard/perusahaan/pengaturan/password/change/{{ Auth::user()->id }}"
                method="POST" class="max-w-2xl space-y-6">
                @csrf
                @method('PUT')

                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">Kata Sandi Lama <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <input type="password" name="password"
                            class="w-full sm:w-96 border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 outline-none transition-all"
                            placeholder="••••••••" required>
                    </div>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <hr class="border-gray-100">

                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">Kata Sandi Baru <span class="text-red-500">*</span></label>
                    <input type="password" name="password_new"
                        class="w-full sm:w-96 border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 outline-none transition-all"
                        placeholder="Minimal 8 karakter" required>
                    @error('password_new')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">Konfirmasi Kata Sandi Baru <span class="text-red-500">*</span></label>
                    <input type="password" name="password_new_confirmation"
                        class="w-full sm:w-96 border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 outline-none transition-all"
                        placeholder="Ulangi kata sandi baru" required>
                    @error('password_new_confirmation')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-6 flex flex-col sm:flex-row gap-4">
                    <button type="submit"
                        class="px-8 py-3 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-xl shadow-lg shadow-orange-200 transition duration-300">
                        Simpan Perubahan
                    </button>
                    <a href="/dashboard/perusahaan/pengaturan/email"
                        class="px-8 py-3 bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 font-semibold rounded-xl text-center transition">
                        Ganti Email
                    </a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection