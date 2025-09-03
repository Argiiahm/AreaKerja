@extends('layouts.index')

@section('content')
    <section class="pt-24">
        <div class="">
            <img class="w-full" src="{{ asset('storage/' . $Data->image ) }}" alt="">
        </div>
    </section>
    <div class="container max-w-screen-lg mx-auto pt-12">
        <div class="flex gap-3 items-center mx-4 lg:mx-0">
            <span class="px-10 py-2 border rounded-full cursor-pointer">Tips</span>
            <span class="px-10 py-2 border bg-[#fa6601] text-white rounded-full cursor-pointer">Top News</span>
        </div>
        <div class="mt-6">
            <div>
                <h1 class="text-2xl font-semibold mx-5 lg:mx-0">{{ $Data->title }}
                </h1>
                <div class="flex justify-end items-center gap-3 mx-4 lg:mx-0">
                    <i class="ph ph-arrow-up-right px-6 py-2 rounded-full text-white bg-[#fa6601]"></i>
                    <i class="ph ph-share-network text-2xl"></i>
                </div>
            </div>
            <div class="flex justify-between items-center mt-5 mx-4 lg:mx-0">
                <span class="text-[#fa6601] font-semibold">{{ $Data->penulis }}</span>
                <span class="font-semibold text-gray-500">{{ $Data->created_at->format('Data-y-m') }}</span>
            </div>
        </div>
        <div class="mt-8 mx-5 lg:mx-0">
            <div>
                {{-- <p class="pb-3"></p> --}}
                {!! $Data->content !!}
            </div> 
        </div>
        <a href="#" class="float-right cursor-pointer mx-5">
            <i class="ph ph-caret-up p-5 text-white rounded-full aspect-square bg-[#fa6601]"></i>
        </a>
    </div>
@endsection
