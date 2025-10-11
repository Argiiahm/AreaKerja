@extends('layouts.index')
@section('content')
    <div class="w-full">
        <div class="max-w-4xl mx-auto px-6 py-12 mt-20">

            <h2 class="text-2xl font-bold text-gray-900 mb-6">Konfirmasi Tolak Lamaran</h2>

            <div class="bg-white rounded-xl shadow-md p-10 border border-gray-200">

                <p class="text-gray-600 mb-8">
                    Silahkan input Catatan Untuk Pelamar yang di Tolak
                </p>
                <form action="/dashboard/perusahaan/tolak/lamaran/{{ $Data->id }}" method="POST" class="space-y-8">
                    @csrf
                    @method('PUT')

                    <div class="space-y-2">

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
