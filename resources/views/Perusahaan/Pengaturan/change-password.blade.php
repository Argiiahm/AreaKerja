@extends('layouts.index')

@section('content')
    <section class="mx-auto pt-40 px-4 sm:px-10">
        <div class="flex flex-col sm:flex-row w-full mb-10 sm:items-center">
            <div class="w-full sm:w-3/12 h-32 flex items-center justify-center mb-4 sm:mb-0">
                <img src="{{ asset('Icon/seveninc.png') }}" alt="Logo" class="object-contain w-6/12 sm:w-10/12">
            </div>
            <div class="text-center sm:text-left">
                <h1 class="text-2xl sm:text-3xl font-bold">Seven_Inc</h1>
                <p class="text-sm text-gray-600">Jasa TI dan Konsultan TI</p>
                <p class="text-sm text-gray-500">Jakarta Timur, DKI Jakarta, Indonesia</p>
            </div>
        </div>

        <div class="mt-8 w-full py-12 sm:py-20 space-y-8">
            <div class="w-full sm:w-8/12">
                <a href="#"
                   class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg shadow block text-center sm:text-left">
                    Ganti Password
                </a>
            </div>

            <form action="#" method="POST" class="space-y-6">
                @csrf
                <div class="flex flex-col sm:flex-row sm:items-center lg:gap-[200px] gap-3 md:gap-32">
                    <label class="sm:w-40 font-medium">Kata Sandi Lama <span class="text-red-500">*</span></label>
                    <input type="password"
                           class="lg:px-[122px] border border-orange-400 rounded-md p-2 focus:ring-2 focus:ring-orange-400">
                </div>

                <div class="flex flex-col sm:flex-row sm:items-center lg:gap-[200px] gap-3 md:gap-32">
                    <label class="sm:w-40 font-medium">Kata Sandi Baru <span class="text-red-500">*</span></label>
                    <input type="password"
                           class="lg:px-[122px] border border-orange-400 rounded-md p-2 focus:ring-2 focus:ring-orange-400">
                </div>

                <div class="flex flex-col sm:flex-row sm:items-center lg:gap-[60px] gap-3 md:gap-12">
                    <label class="md:w-60 lg:w-3/12 font-medium">Masukan Kembali Kata Sandi Baru <span
                            class="text-red-500">*</span></label>
                    <input type="password"
                           class="lg:px-[122px] border border-orange-400 rounded-md p-2 focus:ring-2 focus:ring-orange-400">
                </div>
            </form>

            <div class="w-full sm:w-8/12">
                <a href="#"
                   class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg shadow block text-center sm:text-left">
                    Ganti E-mail
                </a>
            </div>
        </div>
    </section>
@endsection
