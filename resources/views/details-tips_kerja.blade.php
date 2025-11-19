@extends('layouts.index')

@section('content')
    <section class="pt-24">
        <div class="">
            <img class="w-full" src="{{ asset('storage/' . $Data->image ) }}" alt="">
        </div>
    </section>

    <div class="container max-w-screen-lg mx-auto pt-12" x-data="{ open:false }">

        <div class="flex gap-3 items-center mx-4 lg:mx-0">
            <span class="px-10 py-2 border rounded-full cursor-pointer">Tips</span>
            <span class="px-10 py-2 border bg-[#fa6601] text-white rounded-full cursor-pointer">Top News</span>
        </div>

        <div class="mt-6 relative">
            <div>
                <h1 class="text-2xl font-semibold mx-5 lg:mx-0">{{ $Data->title }}</h1>

                <div class="flex justify-end items-center gap-3 mx-4 lg:mx-0 relative">

                    <i class="ph ph-arrow-up-right px-6 py-2 rounded-full text-white bg-[#fa6601]"></i>

                    <button @click="open = !open" class="text-2xl hover:text-[#fa6601] transition">
                        <i class="ph ph-share-network"></i>
                    </button>

                    <div x-show="open" x-cloak x-transition @click.outside="open = false"
                        class="absolute right-0 top-10 w-44 bg-white border shadow-lg rounded-xl py-2 z-[999]">

                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}"
                            target="_blank"
                            class="flex items-center gap-3 px-3 py-2 hover:bg-gray-100">
                            <i class="ph ph-linkedin-logo text-xl"></i>
                            <span>LinkedIn</span>
                        </a>

                        <a href="mailto:?subject={{ $Data->title }}&body={{ urlencode(url()->current()) }}"
                            class="flex items-center gap-3 px-3 py-2 hover:bg-gray-100">
                            <i class="ph ph-envelope-simple text-xl"></i>
                            <span>Email</span>
                        </a>

                        <a href="{{ url()->current() }}"
                            class="flex items-center gap-3 px-3 py-2 hover:bg-gray-100">
                            <i class="ph ph-link text-xl"></i>
                            <span>Website</span>
                        </a>

                        <a href="https://wa.me/?text={{ urlencode(url()->current()) }}" target="_blank"
                            class="flex items-center gap-3 px-3 py-2 hover:bg-gray-100">
                            <i class="ph ph-whatsapp-logo text-xl"></i>
                            <span>WhatsApp</span>
                        </a>

                    </div>
                </div>
            </div>

            <div class="flex justify-between items-center mt-5 mx-4 lg:mx-0">
                <span class="text-[#fa6601] font-semibold">{{ $Data->penulis }}</span>
                <span class="font-semibold text-gray-500">{{ $Data->created_at->format('d M Y') }}</span>
            </div>
        </div>

        <div class="mt-8 mx-5 lg:mx-0">
            <div>
                {!! $Data->content !!}
            </div> 
        </div>

        <a href="#" class="float-right cursor-pointer mx-5">
            <i class="ph ph-caret-up p-5 text-white rounded-full aspect-square bg-[#fa6601]"></i>
        </a>

    </div>
@endsection
