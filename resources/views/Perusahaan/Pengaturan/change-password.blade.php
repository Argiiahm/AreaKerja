@extends('layouts.index')

@section('content')
    <section class="mx-auto pt-40 px-4 sm:px-10">
        <div class="flex w-full mb-10">
            <div class="w-3/12 h-32  flex items-center justify-center">
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
                <h1 class="text-3xl font-bold">{{ Auth::user()->perusahaan->nama_perusahaan }}</h1>
                <p class="text-sm text-gray-600">{{ Auth::user()->perusahaan->jenis_perusahaan }}</p>
                <p class="text-sm text-gray-500">
                    {{ optional(Auth::user()->perusahaan->alamatperusahaan->first())->detail }}</p>
            </div>
        </div>

        <div class="mt-8 w-full py-12 sm:py-20 space-y-8">
            <div class="w-full sm:w-8/12">
                <button form="change_pw" type="submit"
                    class="bg-orange-500 hover:bg-orange-600 transition duration-300 ease-in-out text-white px-4 w-full py-2 rounded-lg shadow block text-center">
                    Ganti Password
                </button>
            </div>

            <form id="change_pw" action="/dashboard/perusahaan/pengaturan/password/change/{{ Auth::user()->id }}"
                method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-[200px_minmax(0,1fr)] items-start gap-4">
                    <label class="font-medium mt-2">Kata Sandi Lama <span class="text-red-500">*</span></label>
                    <div>
                        <input type="password" name="password"
                            class="w-72 border border-orange-400 rounded-md p-2 focus:ring-2 focus:ring-orange-400"
                            required>
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-[200px_minmax(0,1fr)] items-start gap-4">
                    <label class="font-medium mt-2">Kata Sandi Baru <span class="text-red-500">*</span></label>
                    <div>
                        <input type="password" name="password_new"
                            class="w-72 border border-orange-400 rounded-md p-2 focus:ring-2 focus:ring-orange-400"
                            required>
                        @error('password_new')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-[200px_minmax(0,1fr)] items-start gap-4">
                    <label class="font-medium mt-2">Masukkan Kembali Kata Sandi Baru <span
                            class="text-red-500">*</span></label>
                    <div>
                        <input type="password" name="password_new_confirmation"
                            class="w-72 border border-orange-400 rounded-md p-2 focus:ring-2 focus:ring-orange-400"
                            required>
                        @error('password_new_confirmation')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </form>

            <div class="w-full sm:w-8/12">
                <a href="/dashboard/perusahaan/pengaturan/email"
                    class="bg-orange-500 hover:bg-orange-600 transition duration-300 ease-in-out text-white px-4 py-2 rounded-lg shadow block text-center">
                    Ganti Email
                </a>
            </div>
        </div>
    </section>
@endsection
