@extends('layouts.index')

@section('content')
    <div class="p-6 max-w-5xl mx-auto mt-28">

        <p class="text-sm text-gray-600 mb-3">25 Juni 2024</p>

        <div class="mb-6">
            <img src="{{ asset('storage/' . $Data->image) }}" alt="event"
                class="w-full h-[350px] object-cover rounded-xl shadow-md">
        </div>

        <div class="mb-8">
            <h2 class="font-semibold text-2xl mb-4">{{ $Data->title }}</h2>
            <p class="text-gray-700 text-base leading-relaxed mb-3">
                {!! $Data->content !!}
            </p>
        </div>

        <div class="mb-10">
            <h3 class="text-orange-600 font-semibold mb-4">Detail acara</h3>
            <div class="flex items-center gap-2 mb-2 text-sm text-gray-700">
                <span class="text-lg">🕒</span>
                @if ($Data->tgl_akhir)
                    <p>Waktu: {{ $Data->tgl_mulai }} ({{ $Data->jam_mulai }} WIB) - {{ $Data->tgl_akhir }}(
                        {{ $Data->jam_akhir }} WIB )</p>
                @else
                    <p>Waktu: {{ $Data->tgl_mulai }} ({{ $Data->jam_mulai }} - {{ $Data->jam_akhir }}) WIB</p>
                @endif
            </div>
            <div class="flex items-center gap-2 text-sm text-gray-700">
                <span class="text-lg">📍</span>
                <p>Lokasi: {{ $Data->lokasi }}</p>
            </div>
        </div>

        <div class="mb-10">  
            <h3 class="font-semibold mb-3">Daftar kegiatan:</h3>
            <div class="overflow-hidden rounded-lg border border-orange-500 shadow-sm">
                <table class="w-full text-sm border-collapse">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="w-40 border border-orange-500 px-4 py-2 text-left font-semibold text-gray-700">Waktu
                            </th>
                            <th class="border border-orange-500 px-4 py-2 text-left font-semibold text-gray-700">Acara</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Data->kegiatan_events as $k)
                            <tr>
                                <td class="border border-orange-500 px-4 py-2">{{ $k->waktu }}</td>
                                <td class="border border-orange-500 px-4 py-2">{{ $k->kegiatan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="flex justify-center">
            <button class="bg-orange-500 hover:bg-orange-600 text-white px-10 py-3 rounded-full font-medium transition">
                Mendaftar
            </button>
        </div>

    </div>
@endsection
