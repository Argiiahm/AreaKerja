@extends('layouts.index')
@section('content')
    <div class="w-full">
        <div class="max-w-4xl mx-auto px-6 py-12 mt-20">

            <h2 class="text-2xl font-bold text-gray-900 mb-6">Konfirmasi Terima Lamaran</h2>

            <div class="bg-white rounded-xl shadow-md p-10 border border-gray-200">

                <p class="text-gray-600 mb-8">
                    Silahkan input jadwal wawancara untuk calo kandidat
                </p>
                <form action="/dashboard/perusahaan/terima/lamaran/{{ $Data->id }}" method="POST" class="space-y-8">
                    @csrf
                    @method('PUT')
                    <div class="space-y-2">
                        <label class="block text-gray-700 font-medium">Tanggal <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <input type="date" name="tanggal_wawancara"
                                class="w-full border border-gray-300 rounded-md p-3 pr-10 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                                required>
                            <span class="absolute right-3 top-3 text-orange-500">
                                <i class="fas fa-calendar-alt"></i>
                            </span>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-gray-700 font-medium">Waktu <span class="text-red-500">*</span></label>
                        <div class="flex items-center gap-4">
                            <select name="jam"
                                class="min-w-[80px] border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-orange-400 focus:outline-none">
                                @for ($i = 0; $i < 24; $i++)
                                    <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">
                                        {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                                @endfor
                            </select>
                            <span class="text-gray-600 font-semibold">:</span>
                            <select name="menit"
                                class="min-w-[80px] border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-orange-400 focus:outline-none">
                                @for ($i = 0; $i < 60; $i += 5)
                                    <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">
                                        {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-gray-700 font-medium">Tempat / Alamat <span
                                class="text-red-500">*</span></label>
                        <textarea name="tempat_wawancara" rows="3"
                            class="w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-orange-400 focus:outline-none" required></textarea>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-gray-700 font-medium">Catatan</label>
                        <textarea name="catatan_wawancara" rows="3"
                            class="w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-orange-400 focus:outline-none"></textarea>
                    </div>

                    <div class="flex justify-center pt-4">
                        <button type="submit"
                            class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-3 rounded-lg shadow font-semibold">
                            Selanjutnya
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
