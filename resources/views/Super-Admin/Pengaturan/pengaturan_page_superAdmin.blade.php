@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <section class="max-w-7xl mx-auto pt-10 px-4 mb-20">
        <form action="/dashboard/superadmin" method="POST" enctype="multipart/form-data" class="space-y-10">
            @csrf

            {{-- Section 1: Social Media --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6 bg-gray-50/50">
                    @foreach(['facebook', 'youtube', 'instagram', 'linkedin'] as $platform)
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-600 uppercase tracking-wider">{{ $platform }}</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-400 text-sm italic">URL:</span>
                                </div>
                                <input type="text" name="{{ $platform }}" value="{{ $sosial[$platform]->link ?? '' }}"
                                    class="w-full pl-12 border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all bg-white"
                                    placeholder="https://{{ $platform }}.com/...">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Section 2: Image Header --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
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
                        <div
                            class="flex flex-col space-y-3 bg-white p-4 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
                            <label class="font-bold text-gray-700 border-l-4 border-orange-500 pl-3">{{ $label }}</label>

                            {{-- Image Preview Container --}}
                            <div
                                class="relative group h-32 w-full bg-gray-100 rounded-lg overflow-hidden border border-gray-200">
                                @if (isset($sosial[$key]) && $sosial[$key]->link)
                                    <img src="{{ $sosial[$key]->link }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                    <div onclick="showModal('{{ $sosial[$key]->link }}')"
                                        class="absolute inset-0 bg-black/65/40 flex items-center justify-center opacity-0 group-hover:opacity-100 cursor-pointer transition-opacity">
                                        <span
                                            class="text-white text-xs font-medium px-3 py-1 border border-white rounded-full">Lihat
                                            Detail</span>
                                    </div>
                                @else
                                    <div class="flex flex-col items-center justify-center h-full text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span class="text-[10px] mt-1 italic">Belum ada gambar</span>
                                    </div>
                                @endif
                            </div>

                            <input type="text" name="{{ $key }}" value="{{ $sosial[$key]->link ?? '' }}"
                                class="w-full text-xs border border-gray-300 rounded-md p-2 bg-gray-50 focus:bg-white focus:ring-1 focus:ring-orange-500 transition-all"
                                placeholder="Masukkan URL Gambar...">
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Action Button --}}
            <div class="flex justify-end pt-4">
                <button type="submit"
                    class="group flex items-center gap-2 px-8 py-3 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-xl shadow-lg shadow-orange-200 transition-all active:scale-95">
                    <span>Simpan Semua Perubahan</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:translate-x-1 transition-transform"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </button>
            </div>
        </form>
    </section>

    {{-- Modern Modal --}}
    <div id="imgModal"
        class="fixed inset-0 bg-gray-900/90 backdrop-blur-sm hidden z-[100] p-4 flex items-center justify-center transition-all duration-300">
        <div class="relative max-w-5xl w-full animate-in zoom-in duration-300">
            <button onclick="closeModal()"
                class="absolute -top-12 right-0 text-white hover:text-orange-400 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <div class="bg-white p-2 rounded-2xl shadow-2xl">
                <img id="modalImg" src="" class="w-full h-auto max-h-[80vh] object-contain rounded-xl">
            </div>
        </div>
    </div>

    <script>
        function showModal(src) {
            document.getElementById('modalImg').src = src;
            const modal = document.getElementById('imgModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden'; // Lock scroll
        }

        function closeModal() {
            const modal = document.getElementById('imgModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = 'auto'; // Unlock scroll
        }

        // Close on click outside
        document.getElementById('imgModal').addEventListener('click', function (e) {
            if (e.target === this) closeModal();
        });
    </script>
@endsection