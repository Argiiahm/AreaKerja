@extends('layouts.index')

@section('content')
<section class="max-w-7xl mx-auto pt-32 px-4 pb-20">
    <div class="mb-6">
        <a href="/dashboard/perusahaan/pengaturan" class="text-orange-500 hover:text-orange-600 flex items-center gap-2 text-sm font-medium transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Kembali ke Pengaturan
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-8 border-b border-gray-50 flex items-center gap-6 bg-gray-50/30">
            <div class="p-4 bg-orange-100 text-orange-600 rounded-2xl">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Ubah Alamat Email</h1>
                <p class="text-sm text-gray-500">Gunakan alamat email aktif untuk menerima notifikasi dan laporan penting.</p>
            </div>
        </div>

        <div class="p-8">
            <form id="change_email" action="/dashboard/perusahaan/pengaturan/email/change/{{ Auth::user()->id }}"
                method="POST" class="max-w-2xl space-y-8">
                @csrf
                @method('PUT')

                <div class="space-y-4">
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-600">Email Saat Ini</label>
                        <input type="text" value="{{ Auth::user()->email }}" disabled
                            class="w-full sm:w-96 bg-gray-50 border border-gray-200 rounded-xl p-3 text-gray-400 cursor-not-allowed">
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700">Email Baru <span class="text-red-500">*</span></label>
                        <div class="relative max-w-sm">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206"/></svg>
                            </span>
                            <input type="email" name="email"
                                class="w-full pl-10 border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 outline-none transition-all"
                                placeholder="nama@perusahaan.com" required>
                        </div>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="pt-6 border-t border-gray-50 flex flex-col sm:flex-row gap-4">
                    <button type="submit"
                        class="px-10 py-3 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-xl shadow-lg shadow-orange-200 transition-all duration-300">
                        Simpan Email Baru
                    </button>
                    <a href="/dashboard/perusahaan/pengaturan/password"
                        class="px-8 py-3 bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 font-semibold rounded-xl text-center transition">
                        Ganti Password
                    </a>
                </div>
            </form>
        </div>
    </div>
</section>

@if (session('email_success'))
    <div id="alertSuccess"
        class="fixed top-6 right-6 flex items-center gap-4 px-6 py-4 rounded-2xl shadow-2xl
        bg-white border-l-4 border-green-500 z-[9999] transition-all duration-500 opacity-0 translate-x-10">
        
        <div class="flex items-center justify-center w-10 h-10 bg-green-100 text-green-600 rounded-full">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
        </div>

        <div class="pr-8">
            <h4 class="font-bold text-gray-800">Berhasil!</h4>
            <p class="text-sm text-gray-600">{{ session('email_success') }}</p>
        </div>

        <button id="closeAlertBtn" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const alertBox = document.getElementById("alertSuccess");
            const closeBtn = document.getElementById("closeAlertBtn");

            if (alertBox) {
                // Show Animation
                setTimeout(() => {
                    alertBox.classList.remove("opacity-0", "translate-x-10");
                    alertBox.classList.add("opacity-100", "translate-x-0");
                }, 100);

                const hideAlert = () => {
                    alertBox.classList.add("opacity-0", "translate-x-10");
                    setTimeout(() => alertBox.remove(), 500);
                };

                setTimeout(hideAlert, 5000);
                closeBtn.addEventListener("click", hideAlert);
            }
        });
    </script>
@endif
@endsection