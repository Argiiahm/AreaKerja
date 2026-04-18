@extends('layouts.index')

@section('content')
<section class="max-w-7xl mx-auto pt-32 px-4 pb-20">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-8 sm:flex items-center gap-6">
            <div class="relative inline-block">
                @if (Auth::user()->perusahaan->img_profile)
                    <img id="previewImagePerusahaan"
                        class="w-28 h-28 rounded-2xl object-cover border-4 border-orange-50 shadow-sm"
                        src="{{ asset('storage/' . Auth::user()->perusahaan->img_profile) }}" alt="Profile">
                @else
                    <img id="previewImagePerusahaan"
                        class="w-28 h-28 rounded-2xl object-cover border-4 border-orange-50 shadow-sm"
                        src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=f97316&color=fff&size=128"
                        alt="Profile">
                @endif
                <div class="absolute -bottom-2 -right-2 bg-green-500 w-5 h-5 rounded-full border-4 border-white"></div>
            </div>

            <div class="mt-4 sm:mt-0">
                <h1 class="text-3xl font-extrabold text-gray-800">{{ Auth::user()->perusahaan->nama_perusahaan }}</h1>
                <div class="flex flex-wrap gap-y-1 gap-x-4 mt-2">
                    <span class="inline-flex items-center text-sm font-medium text-orange-600 bg-orange-50 px-2.5 py-0.5 rounded">
                        {{ Auth::user()->perusahaan->jenis_perusahaan }}
                    </span>
                    <p class="text-sm text-gray-500 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        {{ optional(Auth::user()->perusahaan->alamatperusahaan->first())->detail ?? 'Alamat belum diatur' }}
                    </p>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-50 bg-gray-50/50 p-8">
            <h3 class="text-lg font-semibold text-gray-700 mb-6">Pengaturan Akun</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <a href="/dashboard/perusahaan/pengaturan/password" 
                   class="group flex items-center p-4 bg-white rounded-xl border border-gray-200 hover:border-orange-400 hover:shadow-md transition-all duration-200">
                    <div class="p-3 bg-orange-100 rounded-lg group-hover:bg-orange-500 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-bold text-gray-800">Ganti Password</p>
                        <p class="text-xs text-gray-500">Amankan akun dengan password baru</p>
                    </div>
                </a>

                <a href="/dashboard/perusahaan/pengaturan/email" 
                   class="group flex items-center p-4 bg-white rounded-xl border border-gray-200 hover:border-orange-400 hover:shadow-md transition-all duration-200">
                    <div class="p-3 bg-blue-100 rounded-lg group-hover:bg-blue-500 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-bold text-gray-800">Ganti E-mail</p>
                        <p class="text-xs text-gray-500">Perbarui alamat korespondensi</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

@if (session('success'))
    <div id="modalSuccess" class="fixed inset-0 bg-gray-900/60 backdrop-blur-sm flex items-center justify-center z-50 p-4">
        <div class="bg-white rounded-2xl p-8 max-w-sm w-full shadow-2xl transform transition-all text-center">
            <div class="flex justify-center mb-4">
                <div class="bg-green-100 rounded-full p-4">
                    <img src="{{ asset('Icon/regis.png') }}" alt="Success" class="w-24 h-24 object-contain">
                </div>
            </div>
            <h2 class="text-2xl font-bold text-gray-800">Berhasil!</h2>
            <p class="text-gray-600 mt-2">{{ session('success') }}</p>
            <button onclick="document.getElementById('modalSuccess').remove()" 
                    class="mt-6 w-full py-3 bg-orange-500 hover:bg-orange-600 text-white font-semibold rounded-xl transition-colors shadow-lg shadow-orange-200">
                Lanjutkan
            </button>
        </div>
    </div>
@endif
@endsection