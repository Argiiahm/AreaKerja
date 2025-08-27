@extends('layouts.index')

@section('content')
    <div class="max-w-6xl mx-auto px-4 sm:px-6 py-8 mt-24 hidden">
        <div class="flex items-start gap-4 w-full py-5">
            <div class="w-32 h-32  flex items-center justify-center">
                <img src="{{ asset('Icon/seveninc.png') }}" alt="Logo" class="object-contain w-full">
            </div>
            <div>
                <h2 class="text-lg font-bold">Seven_Inc</h2>
                <p class="text-sm text-gray-600">Jasa TI dan Konsultan TI</p>
                <p class="text-sm text-gray-500">Jakarta Timur, DKI Jakarta, Indonesia</p>
            </div>
        </div>

        <div class="mt-8">

            <div class="flex justify-between items-end text-center gap-3 mb-3">
                <h3 class="font-semibold text-center">Lowongan</h3>
                <div>
                    <select class="border rounded-md px-10 py-2 text-sm">
                        <option>Jenis Paket</option>
                        <option>Paket A</option>
                        <option>Paket B</option>
                    </select>
                    <select class="border rounded-md px-10 py-2 text-sm">
                        <option>Jenis Lowongan</option>
                        <option>Fulltime</option>
                        <option>Part-time</option>
                        <option>Freelance</option>
                    </select>
                </div>
            </div>

            <div class="border rounded-xl p-6 min-h-[250px] flex flex-col items-center justify-center relative">
                <button
                    class="absolute top-4 left-4 w-10 h-10 border border-orange-500 rounded-md flex items-center justify-center text-orange-500 hover:bg-orange-50">
                    <i class="ph ph-plus text-xl"></i>
                </button>
                <div class="flex flex-col items-center justify-center text-gray-500">
                    <i class="ph ph-file text-4xl mb-2"></i>
                    <p class="text-sm">Lowongan Kosong</p>
                </div>
            </div>
        </div>
    </div>



    <div class="max-w-6xl mx-auto px-4 sm:px-6 py-8 mt-24">
        <div class="flex items-start gap-4 w-full py-5 justify-between">
            <div class="flex gap-5 justify-between w-10/12 md:w-11/12 lg:w-11/12 items-center">
                <div class="flex">
                    <div class="w-32 h-32  flex items-center justify-center">
                        <img src="{{ asset('Icon/seveninc.png') }}" alt="Logo" class="object-contain w-full">
                    </div>
                    <div>
                        <h2 class="text-lg font-bold">Seven_Inc</h2>
                        <p class="text-sm text-gray-600">Jasa TI dan Konsultan TI</p>
                        <p class="text-sm text-gray-500">Jakarta Timur, DKI Jakarta, Indonesia</p>
                    </div>
                </div>
                <div>
                    <a href=""
                        class="absolute w-16 h-16 border border-orange-500 rounded-md flex items-center justify-center text-orange-500 hover:bg-orange-50">
                        <i class="ph ph-plus text-xl"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="mt-8">
            <div class="flex justify-between items-end text-center gap-3 mb-3">
                <h3 class="font-semibold text-center">Lowongan</h3>
                <div>
                    <select class="border rounded-md px-6 lg:px-10 md:px-10 py-2 text-sm">
                        <option>Jenis Paket</option>
                        <option>Paket A</option>
                        <option>Paket B</option>
                    </select>
                    <select class="border rounded-md px-6 lg:px-10 md:px-10 py-2 text-sm">
                        <option>Jenis Lowongan</option>
                        <option>Fulltime</option>
                        <option>Part-time</option>
                        <option>Freelance</option>
                    </select>
                </div>
            </div>
            <a href="/lowongan/tersimpan/detail">
                <div class="flex shadow-md p-4">
                    <div>
                        <img src="{{ asset('Icon/seveninc.png') }}" alt="">
                    </div>
                    <div class="w-full">
                        <p>Seven Inc</p>
                        <h1 class="font-semibold">UI UX Designer - WFO</h1>
                        <span>Yogyakarta</span>
                        <div class="mt-5 block lg:flex md:flex justify-between items-center w-full">
                            <span class="px-3 bg-[#d7d6d6] text-[#565656] py-2 rounded-md">Rp.xxxxx - Rp.xxxxx per
                                bulan</span>
                            <span class="block mt-3 text-[#565656] pl-0 lg:pl-10 md:pl-10">Aktif 2jam lalu</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>

            <div class="flex justify-center mt-8">
        <button class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-2 rounded-lg shadow">
            Memuat
        </button>
    </div>
    </div>
@endsection
