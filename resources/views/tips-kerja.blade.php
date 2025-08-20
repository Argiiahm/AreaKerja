@extends('layouts.index')

@section('content')
    <section class="pt-24">
        <div class="">
            <img class="w-full" src="{{ asset('image/13819-lowongan-kerja-jasa-raharja-freepik 2.png') }}" alt="">
        </div>
    </section>
    <div class="container max-w-screen-lg mx-auto pt-12">
        <div class="flex gap-3 items-center mx-4 lg:mx-0">
            <span class="px-10 py-2 border rounded-full cursor-pointer">Tips</span>
            <span class="px-10 py-2 border bg-[#fa6601] text-white rounded-full cursor-pointer">Top News</span>
        </div>
        <div class="mt-6">
            <div>
                <h1 class="text-2xl font-semibold mx-5 lg:mx-0">4 Rekomendasi Kerja Freelance Yang Patut Kamu Coba
                </h1>
                <div class="flex justify-end items-center gap-3 mx-4 lg:mx-0">
                    <i class="ph ph-arrow-up-right px-6 py-2 rounded-full text-white bg-[#fa6601]"></i>
                    <i class="ph ph-share-network text-2xl"></i>
                </div>
            </div>
            <div class="flex justify-between items-center mt-5 mx-4 lg:mx-0">
                <span class="text-[#fa6601] font-semibold">AreaKerja.com</span>
                <span class="font-semibold text-gray-500">Senin, 18 Agustus 09.00 WIB</span>
            </div>
        </div>
        {{-- Tips Kerja --}}
        <div class="mt-8 mx-5 lg:mx-0">
            <h1 class="my-4 text-2xl font-bold">Tips Kerja</h1>
            <div class="grid grid-cols-2 lg:grid-cols-4 md:grid-cols-4 gap-5">
                <a href="/tipskerja/details" class="">
                    <img class="w-52 h-52 object-cover rounded-lg"
                        src="{{ asset('image/13819-lowongan-kerja-jasa-raharja-freepik 2.png') }}" alt="">
                    <div class="flex mt-2 items-center gap-1 text-gray-500 font-semibold">
                        <img class="w-8" src="{{ asset('image/logo-areakerja.png') }}" alt="">
                        <span class="text-[10px]">AreaKerja.com - 14 Oktober 2024</span>
                    </div>
                    <h1 class="w-40 lg:w-52 md:w-52 pl-1 text-gray-800 font-bold mb-3">4 Rekomendasi Kerja Freelance Yang
                        Patut Kamu Coba</h1>
                    <p class="w-40 lg:w-52 md:w-52 pl-1 text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Omnis, debitis.</p>
                    <span class="text-[#fa6601] pl-1 font-bold text-[13px]">Tips <span class="text-gray-400"> - 20
                            Menit</span></span>
                </a>
                <div class="">
                    <img class="w-52 h-52 object-cover rounded-lg"
                        src="{{ asset('image/13819-lowongan-kerja-jasa-raharja-freepik 2.png') }}" alt="">
                    <div class="flex mt-2 items-center gap-1 text-gray-500 font-semibold">
                        <img class="w-8" src="{{ asset('image/logo-areakerja.png') }}" alt="">
                        <span class="text-[10px]">AreaKerja.com - 14 Oktober 2024</span>
                    </div>
                    <h1 class="w-40 lg:w-52 md:w-52 pl-1 text-gray-800 font-bold mb-3">4 Rekomendasi Kerja Freelance Yang
                        Patut Kamu Coba</h1>
                    <p class="w-40 lg:w-52 md:w-52 pl-1 text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Omnis, debitis.</p>
                    <span class="text-[#fa6601] pl-1 font-bold text-[13px]">Tips <span class="text-gray-400"> - 20
                            Menit</span></span>
                </div>
                <div class="">
                    <img class="w-52 h-52 object-cover rounded-lg"
                        src="{{ asset('image/13819-lowongan-kerja-jasa-raharja-freepik 2.png') }}" alt="">
                    <div class="flex mt-2 items-center gap-1 text-gray-500 font-semibold">
                        <img class="w-8" src="{{ asset('image/logo-areakerja.png') }}" alt="">
                        <span class="text-[10px]">AreaKerja.com - 14 Oktober 2024</span>
                    </div>
                    <h1 class="w-40 lg:w-52 md:w-52 pl-1 text-gray-800 font-bold mb-3">4 Rekomendasi Kerja Freelance Yang
                        Patut Kamu Coba</h1>
                    <p class="w-40 lg:w-52 md:w-52 pl-1 text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Omnis, debitis.</p>
                    <span class="text-[#fa6601] pl-1 font-bold text-[13px]">Tips <span class="text-gray-400"> - 20
                            Menit</span></span>
                </div>
                <div class="">
                    <img class="w-52 h-52 object-cover rounded-lg"
                        src="{{ asset('image/13819-lowongan-kerja-jasa-raharja-freepik 2.png') }}" alt="">
                    <div class="flex mt-2 items-center gap-1 text-gray-500 font-semibold">
                        <img class="w-8" src="{{ asset('image/logo-areakerja.png') }}" alt="">
                        <span class="text-[10px]">AreaKerja.com - 14 Oktober 2024</span>
                    </div>
                    <h1 class="w-40 lg:w-52 md:w-52 pl-1 text-gray-800 font-bold mb-3">4 Rekomendasi Kerja Freelance Yang
                        Patut Kamu Coba</h1>
                    <p class="w-40 lg:w-52 md:w-52 pl-1 text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Omnis, debitis.</p>
                    <span class="text-[#fa6601] pl-1 font-bold text-[13px]">Tips <span class="text-gray-400"> - 20
                            Menit</span></span>
                </div>
                <div class="">
                    <img class="w-52 h-52 object-cover rounded-lg"
                        src="{{ asset('image/13819-lowongan-kerja-jasa-raharja-freepik 2.png') }}" alt="">
                    <div class="flex mt-2 items-center gap-1 text-gray-500 font-semibold">
                        <img class="w-8" src="{{ asset('image/logo-areakerja.png') }}" alt="">
                        <span class="text-[10px]">AreaKerja.com - 14 Oktober 2024</span>
                    </div>
                    <h1 class="w-40 lg:w-52 md:w-52 pl-1 text-gray-800 font-bold mb-3">4 Rekomendasi Kerja Freelance Yang
                        Patut Kamu Coba</h1>
                    <p class="w-40 lg:w-52 md:w-52 pl-1 text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Omnis, debitis.</p>
                    <span class="text-[#fa6601] pl-1 font-bold text-[13px]">Tips <span class="text-gray-400"> - 20
                            Menit</span></span>
                </div>
            </div>
            <a href="#" class="float-right cursor-pointer">
                <i class="ph ph-caret-up p-5 text-white rounded-full aspect-square bg-[#fa6601]"></i>
            </a>
        </div>
    </div>
@endsection
