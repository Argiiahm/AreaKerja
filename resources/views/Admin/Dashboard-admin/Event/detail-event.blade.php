.@extends('Admin.Dashboard-admin.layouts.index')

@section('admin-content')
    <div class="p-6">
        <div class="flex justify-between items-center mb-4">
            <p class="text-sm text-gray-700">25 Juni 2024</p>
            <div class="flex items-center gap-2">
                <span class="text-sm">Status</span>
                <span class="bg-green-500 text-white px-3 py-1 rounded text-xs">{{ $Data->status }}</span>
                <form action="/dashboard/admin/event/hapus/{{ $Data->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 text-white px-4 py-1 rounded text-sm" type="submit"
                        onclick="return confirm('Apakah Anda Yakin')">Hapus</button>
                </form>
            </div>
        </div>

        <div class="flex justify-end gap-3 mb-4">
            <a href="/dashboard/admin/event/edit/{{ $Data->id }}"
                class="bg-blue-500 text-white px-5 py-2 rounded text-sm">Edit Event</a>
        </div>

        <div class="mb-6 aspect-[3/1] w-full max-w-[900px] mx-auto">
            <img src="{{ asset('storage/' . $Data->image) }}" alt="event"
                class="w-full h-full object-cover rounded-xl shadow">
        </div>



        <div class="mb-6">
            <h2 class="font-semibold text-lg mb-2">Event</h2>
            <p class="text-gray-700 text-sm leading-relaxed">
                {!! $Data->content !!}
            </p>
        </div>

        <div class="mb-6">
            <h3 class="text-orange-600 font-semibold mb-3">Detail acara</h3>
            <div class="flex items-center gap-2 mb-2 text-sm">
                <span class="text-gray-600">🕒</span>
                @if ($Data->tgl_akhir)
                    <p>Waktu: {{ $Data->tgl_mulai }} ({{ $Data->jam_mulai }} WIB) - {{ $Data->tgl_akhir }}(
                        {{ $Data->jam_akhir }} WIB )</p>
                @else
                    <p>Waktu: {{ $Data->tgl_mulai }} ({{ $Data->jam_mulai }} - {{ $Data->jam_akhir }}) WIB</p>
                @endif
            </div>
            <div class="flex items-center gap-2 text-sm">
                <span class="text-gray-600">📍</span>
                <p>Lokasi: {{ $Data->lokasi }}</p>
            </div>
        </div>

        <div class="mb-6">
            <h3 class="font-semibold mb-3">Daftar kegiatan:</h3>
            <div class="overflow-hidden rounded-lg border border-orange-500">
                <table class="w-full text-sm border-collapse border border-orange-500">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="w-32 border border-orange-500 px-3 py-2 text-left font-semibold text-gray-700">
                                Waktu
                            </th>
                            <th class="border border-orange-500 px-3 py-2 text-left font-semibold text-gray-700">
                                Acara
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Data->kegiatan_events as $k)
                            <tr>
                                <td class="w-32 border border-orange-500 px-3 py-2">{{ $k->waktu }}</td>
                                <td class="border border-orange-500 px-3 py-2">{{ $k->kegiatan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
