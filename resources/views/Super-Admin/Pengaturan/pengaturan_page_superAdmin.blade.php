@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <style>
        input[type="file"]::-webkit-file-upload-button {
            display: none !important;
        }

        input[type="file"]::file-selector-button {
            display: none !important;
        }
    </style>

    <form action="/dashboard/superadmin" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="space-y-8 pt-8">

            <div class="bg-white border border-orange-300 rounded-lg shadow-md overflow-hidden">
                <div class="bg-orange-500 px-6 py-3">
                    <h2 class="text-white font-semibold text-lg">Social Media</h2>
                </div>
                <div class="p-6 space-y-4">

                    <div class="border-b border-orange-200 pb-4">
                        <label class="block text-gray-700 mb-1">Facebook</label>
                        <input type="text" name="facebook" value="{{ $sosial['facebook']->link ?? '' }}"
                            class="w-full border border-orange-300 rounded-md p-2">
                    </div>

                    <div class="border-b border-orange-200 pb-4">
                        <label class="block text-gray-700 mb-1">Youtube</label>
                        <input type="text" name="youtube" value="{{ $sosial['youtube']->link ?? '' }}"
                            class="w-full border border-orange-300 rounded-md p-2">
                    </div>

                    <div class="border-b border-orange-200 pb-4">
                        <label class="block text-gray-700 mb-1">Instagram</label>
                        <input type="text" name="instagram" value="{{ $sosial['instagram']->link ?? '' }}"
                            class="w-full border border-orange-300 rounded-md p-2">
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-1">LinkedIn</label>
                        <input type="text" name="linkedin" value="{{ $sosial['linkedin']->link ?? '' }}"
                            class="w-full border border-orange-300 rounded-md p-2">
                    </div>

                </div>
            </div>


            <div class="bg-white border border-orange-300 rounded-lg shadow-md overflow-hidden">
                <div class="bg-orange-500 px-6 py-3">
                    <h2 class="text-white font-semibold text-lg">Image Header</h2>
                </div>

                <div class="p-6 space-y-4">

                    @php
                        $headers = [
                            'beranda_header' => 'Beranda',
                            'tips_kerja_header' => 'Tips Kerja',
                            'pasang_lowongan_header' => 'Pasang Lowongan',
                            'daftar_kandidat_header' => 'Daftar Kandidat',
                            'tahunter_header' => 'Talent Hunter',
                            'profil_pelamar_header' => 'Profil Pelamar',
                            'lowongan_tersimpan_header' => 'Lowongan Tersimpan',
                            'faq_header' => 'FAQ',
                            'rekrut_pelamar_header' => 'Rekrut Pelamar',
                            'pelamar_perusahaan_header' => 'Pelamar Perusahaan',
                            'kandidat_ak_header' => 'Kandidat AK',
                            'berlangganan_header' => 'Berlangganan',
                            'request_data_header' => 'Request Data',
                        ];
                    @endphp

                    @foreach ($headers as $key => $label)
                        <div class="border-b border-orange-200 pb-4">
                            <label class="block text-gray-700 mb-1">{{ $label }}</label>

                            {{-- Gambar Preview --}}
                            @if (isset($sosial[$key]) && $sosial[$key]->link)
                                <img src="{{ $sosial[$key]->link }}" onclick="showModal('{{ $sosial[$key]->link }}')"
                                    class="w-40 rounded-lg mb-3 shadow cursor-pointer hover:opacity-80 transition">
                            @endif

                            <input type="text" name="{{ $key }}" value="{{ $sosial[$key]->link ?? '' }}"
                                class="w-full text-sm text-gray-700 border border-orange-300 bg-white p-5 rounded-md cursor-pointer">
                        </div>
                    @endforeach

                </div>
            </div>

            <button type="submit" class="px-6 py-3 bg-orange-500 text-white font-semibold rounded-lg shadow-md">
                Simpan Perubahan
            </button>

        </div>
    </form>


    <div id="imgModal" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center hidden z-50">

        <div class="bg-white p-4 rounded-lg shadow-xl max-w-3xl w-full">
            <img id="modalImg" src="" class="w-full rounded-lg">

            <button onclick="closeModal()" class="mt-4 px-4 py-2 bg-orange-500 text-white rounded-md">
                Tutup
            </button>
        </div>
    </div>

    <script>
        function showModal(src) {
            document.getElementById('modalImg').src = src;
            document.getElementById('imgModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('imgModal').classList.add('hidden');
        }
    </script>
@endsection
