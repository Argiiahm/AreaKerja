@extends('layouts.index')
@section('content')
    <div class="w-full">
        <div class="max-w-3xl mx-auto px-8 py-12 mt-40 bg-white rounded-xl shadow-md border border-gray-300">
            @php
                $namapelamar = \App\Models\Pelamar::find($Data->pelamar_id);
                $lowongan = \App\Models\LowonganPerusahaan::find($Data->lowongan_id);
            @endphp
            <div class="flex items-center gap-6 mb-10">
                <img src="{{ asset('Icon/seveninc.png') }}" alt="Logo" class="w-48 h-auto">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">Mohon Maaf Kepada</h2>
                    <p class="mt-4 text-gray-800">
                        <span class="block font-semibold text-lg">{{ $namapelamar->nama_pelamar }}</span>
                        <span class="block text-sm">Status : Belum Kerja</span>
                    </p>
                </div>
            </div>

            <div class="text-gray-800 text-[15px] leading-relaxed space-y-5 max-w-2xl mx-auto text-justify">
                <p>
                   Mohon Maaf Lamaran yang anda ajukan ke lowongan kami pada <span class="font-semibold">{{ $lowongan->nama }}</span>
                    <span class="text-red-600 font-bold">Belum Bisa Kami Terima</span>.
                </p>

                <p>
                    <span class="font-semibold">Catatan :</span> {{ $Data->catatan_wawancara }}.
                </p>

                <div class="pt-6">
                    <p>Hormat kami,</p>
                    <p class="mt-1 font-semibold">{{ $lowongan->perusahaan->nama_perusahaan }}</p>
                </div>
            </div>

            <div class="flex flex-col items-center mt-16">
                <img src="{{ asset('image/logo-areakerja.png') }}" alt="Logo Footer" class="h-10 mb-3">
                <p class="text-center text-xs text-gray-500">Copyright ©2024 areakerja.com</p>
            </div>
        </div>

        <div class="flex justify-end gap-4 mt-8 max-w-3xl mx-auto px-8">
            <button onclick="window.location='/dashboard/perusahaan/form/terima/lamaran/{{ $Data->id }}'"
                class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-md shadow font-medium">
                Kembali
            </button>
            <form action="/dashboard/perusahaan/konfirmasi/tolak/{{ $Data->id }}" method="POST">
                @csrf
                @method('PUT')
                <input type="text" value="ditolak" hidden name="status">
                <button class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-md shadow font-medium">
                    Kirim
                </button>
            </form>
        </div>
    </div>
@endsection
