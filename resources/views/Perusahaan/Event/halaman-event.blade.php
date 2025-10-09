@extends('layouts.index')
@section('content')
    <div class="max-w-7xl mx-auto px-4 py-6 space-y-10 mt-28">
        @foreach ($Data as $item)
            <div>
                <p class="text-sm text-gray-600 mb-3">7 Juli 2023</p>
                <div class="relative rounded-xl overflow-hidden shadow-lg">
                    <img src="{{ asset('storage/' . $item->image) }}" alt="Seminar"
                        class="w-full h-[500px] object-cover">

                    <div class="absolute inset-0 bg-black bg-opacity-50 p-10 flex flex-col justify-end">
                        <h2 class="text-3xl font-bold text-white mb-3">{{ $item->title }}</h2>
                        <p class="text-white text-lg mb-6 max-w-3xl">
                            {!! Str::limit(strip_tags($item->content), 100, '...') !!}
                        </p>
                        <button onclick="window.location='/dashboard/perusahaan/gabung/event/{{ $item->id }}'" class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-md font-medium w-max">
                            Bergabung
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
