@extends('layouts.index')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-6 space-y-10 mt-28">

        @if ($Data->isEmpty())
            <div class="p-6 max-w-5xl mx-auto mt-28">
                <div
                    class="w-full max-w-6xl bg-white border-4 border-gray-300 rounded-2xl shadow-md flex flex-col items-center justify-center py-28">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-28 h-28 text-gray-500 mb-6" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path d="M2 4a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v16a2
                                 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4zm2 0v.217l8
                                 6.4 8-6.4V4H4zm16 2.383-8 6.4-8-6.4V20h16V6.383z" />
                    </svg>

                    <p class="text-gray-600 text-2xl font-semibold text-center leading-relaxed">
                        Tidak Ada Event Yang Tersedia <br> Untuk Saat Ini
                    </p>
                </div>
            </div>
        @else
            @foreach ($Data as $item)
                <div>
                    <p class="text-sm text-gray-600 mb-3">
                        {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}
                    </p>

                    <div class="relative rounded-xl overflow-hidden shadow-lg">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="Event {{ $item->title }}"
                            class="w-full h-[500px] object-cover">

                        <div class="absolute inset-0 bg-black bg-opacity-50 p-10 flex flex-col justify-end">
                            <h2 class="text-3xl font-bold text-white mb-3">{{ $item->title }}</h2>
                            <p class="text-white text-lg mb-6 max-w-3xl">
                                {!! Str::limit(strip_tags($item->content), 100, '...') !!}
                            </p>
                            <button onclick="window.location='/dashboard/perusahaan/gabung/event/{{ $item->id }}'"
                                class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-md font-medium w-max">
                                Bergabung
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
