@extends('layouts.index')

@section('content')
    <section class="pt-24">
        <img src="{{ $link_sosial['tips_kerja_header']->link ??
            'https://arbinger.com/wp-content/uploads/2023/04/develop-people-accountable_Header-img-02-scaled.jpg' }}"
            class="w-full h-full object-cover">

    </section>

    <div class="max-w-screen-lg mx-auto pt-12">

        <div class="flex gap-3 items-center mx-4 lg:mx-0">
            <span class="px-10 py-2 rounded-full border cursor-pointer hover:bg-gray-100 transition">Tips</span>
            <span class="px-10 py-2 rounded-full bg-[#fa6601] text-white cursor-pointer shadow-md">Top News</span>
        </div>

        <div class="mt-6 mx-4 lg:mx-0">
            <div class="flex justify-between items-start">
                <h1 class="text-3xl font-bold leading-tight tracking-wide">
                    Artikel Areakerja.com
                </h1>

                <div class="flex items-center gap-3">
                    <button class="bg-[#fa6601] text-white px-4 py-2 rounded-full shadow-md hover:opacity-90 transition">
                        <i class="ph ph-arrow-up-right"></i>
                    </button>
                    <button class="text-2xl text-gray-600 hover:text-[#fa6601] transition">
                        <i class="ph ph-share-network"></i>
                    </button>
                </div>
            </div>

            <div class="flex justify-between items-center mt-4 text-sm text-gray-600">
                <span class="text-[#fa6601] font-semibold">AreaKerja.com</span>
                <span>Senin, 18 Agustus 09.00 WIB</span>
            </div>
        </div>

        <div class="mt-12 mx-4 lg:mx-0">
            <h2 class="text-2xl font-bold mb-6">Tips Kerja</h2>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                @foreach ($Data as $d)
                    @if ($d->status == 'terbit')
                        <a href="/tipskerja/details/{{ $d->id }}"
                            class="group bg-white rounded-xl shadow hover:shadow-lg transition p-2 flex flex-col">

                            <div class="overflow-hidden rounded-lg">
                                <img class="w-full h-40 object-cover group-hover:scale-105 transition"
                                    src="{{ asset('storage/' . $d->image) }}" alt="">
                            </div>

                            <div class="flex mt-3 items-center gap-2 text-gray-400 text-xs">
                                <img class="w-6" src="{{ asset('image/logo-areakerja.png') }}" alt="">
                                <span>{{ $d->penulis }} • {{ $d->created_at->format('d M Y') }}</span>
                            </div>

                            <h3 class="mt-1 text-sm font-bold text-gray-900 line-clamp-2">
                                {{ $d->title }}
                            </h3>

                            <p class="text-xs text-gray-500 line-clamp-2">
                                {{ $d->intro }}
                            </p>

                            <span class="mt-2 text-[13px] font-bold text-[#fa6601]">
                                Tips <span class="text-gray-400">• {{ $d->updated_at->diffForHumans() }}</span>
                            </span>

                        </a>
                    @endif
                @endforeach

            </div>

            <button
                class="fixed bottom-6 right-6 bg-[#fa6601] text-white p-4 rounded-full shadow-lg hover:opacity-90 transition">
                <i class="ph ph-caret-up text-xl"></i>
            </button>
        </div>

    </div>
@endsection
