@extends('layouts.index')

@section('content')
    <section class="pt-36 px-5 lg:px-16 min-h-screen">
        <div class="flex flex-col lg:flex-row gap-10">
            <div class="flex-1  rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="flex flex-col md:flex-row gap-6 p-8 border-b border-gray-100">
                    <div class="flex-shrink-0 mx-auto md:mx-0">
                        <img src="{{ asset('Icon/seveninc.png') }}" alt="Logo Perusahaan"
                            class="w-24 h-24 rounded-lg object-cover ">
                    </div>

                    <div class="flex-1">
                        <h1 class="text-2xl font-bold text-gray-800">{{ $Data->lowongan_perusahaan->nama }}</h1>
                        <p class="text-gray-600 font-medium">{{ $Data->lowongan_perusahaan->perusahaan->nama_perusahaan }}
                        </p>
                        <p class="text-gray-500 mt-1">{{ $Data->lowongan_perusahaan->alamat }}</p>

                        <p class="mt-3 inline-block bg-orange-100 text-orange-600 font-semibold px-4 py-2 rounded-lg">
                            Rp. {{ number_format($Data->lowongan_perusahaan->gaji_awal, 0, ',', '.') }} – Rp.
                            {{ number_format($Data->lowongan_perusahaan->gaji_akhir, 0, ',', '.') }} / bulan
                        </p>

                        <div class="mt-5 flex flex-wrap items-center gap-4">
                            @if ($Data->status !== 'pending')
                                <button disabled
                                    class="bg-gray-400 text-white px-6 py-2 rounded-lg font-semibold cursor-not-allowed shadow">
                                    Terima
                                </button>
                                <button disabled
                                    class="bg-gray-400 text-white px-6 py-2 rounded-lg font-semibold cursor-not-allowed shadow">
                                    Tolak
                                </button>
                            @else
                                <button
                                    onclick="openKonfirmasi('{{ $Data->lowongan_perusahaan->perusahaan->nama_perusahaan }}')"
                                    class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg font-semibold shadow transition">
                                    Terima
                                </button>
                                <button
                                    onclick="openModalTolak('{{ optional(optional($Data->lowongan_perusahaan)->perusahaan)->nama_perusahaan }}')"
                                    class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-lg font-semibold shadow transition">
                                    Tolak
                                </button>
                            @endif
                            <button class="bg-gray-100 hover:bg-gray-200 p-2 rounded-lg shadow-sm">
                                <i class="ph ph-heart-straight text-xl text-gray-700"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="p-8 space-y-8">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800 border-b pb-2 mb-4">Detail Lowongan</h2>
                        <p class="text-gray-600 mb-4">Berikut merupakan informasi lengkap mengenai posisi ini.</p>

                        <div class="flex items-center gap-4 mb-5">
                            <img src="{{ asset('Icon/detail-lowongan.png') }}" alt="Icon" class="w-10 h-10 opacity-90">
                            <div>
                                <p class="font-semibold text-gray-700">Jenis Lowongan</p>
                                <span
                                    class="inline-block mt-2 bg-gray-100 px-4 py-1.5 text-gray-700 font-medium rounded-md">
                                    {{ $Data->lowongan_perusahaan->jenis }}
                                </span>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 text-gray-700 border-t pt-4">
                            <i class="ph ph-map-pin text-orange-500 text-lg"></i>
                            <span>{{ $Data->lowongan_perusahaan->alamat }}</span>
                        </div>
                    </div>
                    {{-- Deskripsi --}}
                    <div class="border-t pt-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Deskripsi Pekerjaan</h3>
                        <ul class="list-disc list-inside text-gray-600 space-y-1">
                            @foreach (explode("\n", $Data->lowongan_perusahaan->deskripsi) as $baris)
                                @if (trim($baris) != '')
                                    <li>{{ $baris }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    {{-- Responsibilities --}}
                    <div class="border-t pt-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Tanggung Jawab</h3>
                        <ul class="list-disc list-inside text-gray-600 space-y-1">
                            <li>Kumpulkan dan periksa kebutuhan pengguna.</li>
                            <li>Konsultasi dengan tim desainer dan pengembang.</li>
                            <li>Mendesain dan mengembangkan desain visual aplikasi.</li>
                            <li>Bekerja sama dengan tim produk dan engineering.</li>
                            <li>Uji prototipe dengan pengguna.</li>
                            <li>Buat wireframe, user flow, dan spesifikasi desain.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <aside class="w-full lg:w-[30%] lg:pl-6 mt-10 lg:mt-0">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <div class="flex justify-between items-center mb-5">
                        <h2 class="text-lg font-bold text-gray-800 leading-tight break-words">
                            Lowongan Lain di {{ $Data->lowongan_perusahaan->perusahaan->nama_perusahaan }}
                        </h2>
                        <a href="#" class="text-orange-500 font-semibold hover:underline text-sm whitespace-nowrap">
                            Lihat Semua
                        </a>
                    </div>

                    <div class="space-y-4">
                        @foreach ($lowongan as $l)
                            @if ($l->paket_id)
                                @if ($l->perusahaan_id === $Data->lowongan_perusahaan->perusahaan_id && $l->id !== $Data->lowongan_perusahaan->id)
                                    <a href="/lowongan/tersimpan/detail/{{ $l->slug }}"
                                        class="block bg-gray-50 border border-gray-100 rounded-xl p-4 hover:bg-orange-50 hover:border-orange-300 transition-all shadow-sm">
                                        <div class="flex items-start gap-3">
                                            <img src="{{ asset('Icon/seveninc.png') }}" alt="Logo"
                                                class="w-12 h-12 object-cover rounded-md shadow-sm flex-shrink-0">
                                            <div class="flex-1 min-w-0">
                                                <p class="text-xs text-gray-500 mb-0.5 truncate">
                                                    {{ $l->perusahaan->nama_perusahaan }}
                                                </p>
                                                <h3 class="font-semibold text-gray-800 text-sm leading-snug break-words">
                                                    {{ $l->nama }}
                                                    <span class="text-gray-500"> - {{ $l->jenis }}</span>
                                                </h3>
                                                <p class="text-xs text-gray-500 mt-0.5 break-words">
                                                    {{ $l->alamat }}
                                                </p>
                                                <div
                                                    class="mt-2 flex flex-wrap justify-between items-center text-xs text-gray-600 gap-y-2">
                                                    <span
                                                        class="bg-gray-100 px-3 py-1 rounded-md font-medium whitespace-nowrap">
                                                        Rp {{ $l->gaji_awal }} - {{ $l->gaji_akhir }}
                                                    </span>
                                                    <span class="text-gray-400 updated-date"
                                                        data-updated="{{ $l->updated_at }}">
                                                        Menghitung...
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>
            </aside>
        </div>

        <div id="modalKonfirmasi"
            class="fixed inset-0 bg-black bg-opacity-40 hidden z-50 flex items-center justify-center backdrop-blur-sm">
            <div class="bg-white rounded-2xl p-8 w-[380px] text-center border-t-4 border-orange-500 shadow-xl">
                <h2 class="text-lg font-semibold text-gray-800 mb-3">Konfirmasi Rekrutmen</h2>
                <p class="text-gray-600 mb-6">
                    Yakin ingin menerima rekrutmen dari
                    <span class="font-semibold text-orange-600" id="namaPerusahaan1">(Nama Perusahaan)</span>?
                </p>
                <form id="formupdate" action="/diterima/kandidat/{{ $Data->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" hidden name="status" value="diterima">
                </form>
                <div class="flex justify-center gap-4">
                    <button form="formupdate"
                        class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-2 rounded-lg shadow">
                        Terima
                    </button>
                    <button id="btnBatal"
                        class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold px-6 py-2 rounded-lg shadow">
                        Batal
                    </button>
                </div>
            </div>
        </div>

        <div id="modalSelesai"
            class="fixed inset-0 bg-black bg-opacity-40 hidden z-50 flex items-center justify-center backdrop-blur-sm">
            <div class="relative bg-white rounded-2xl p-8 w-[400px] text-center shadow-xl">
                <button id="closeSelesai" class="absolute top-4 right-5 text-gray-400 hover:text-black text-xl transition">
                    &times;
                </button>
                <h2 class="text-lg font-semibold text-gray-700 mb-2">
                    Selamat! Anda telah menjadi bagian dari
                </h2>
                <h3 class="text-orange-500 font-bold mb-6" id="namaPerusahaan2">
                    {{ $Data->lowongan_perusahaan->perusahaan->nama_perusahaan }}
                </h3>
                <img src="{{ asset('Icon/poplogout.png') }}" alt="ilustrasi" class="mx-auto w-28 mb-6">
                <p class="text-gray-600">
                    Silakan tunggu
                    <span class="font-semibold text-black" id="namaPerusahaan3">
                        {{ $Data->lowongan_perusahaan->perusahaan->nama_perusahaan }}
                    </span>
                    menghubungi Anda.
                </p>
            </div>
        </div>

        <div id="modalKonfirmasitolak"
            class="fixed inset-0 bg-black bg-opacity-40 hidden z-50 flex items-center justify-center backdrop-blur-sm">
            <div class="bg-white rounded-2xl p-8 w-[380px] text-center border-t-4 border-orange-500 shadow-xl">
                <h2 class="text-lg font-semibold text-gray-800 mb-3">Konfirmasi Rekrutmen</h2>
                <p class="text-gray-600 mb-6">
                    Yakin ingin menolak rekrutmen dari
                    <span class="font-semibold text-orange-600" id="namaPerusahaanTolak">(Nama Perusahaan)</span>?
                </p>
                <div class="flex justify-center gap-4">
                    <button onclick="openModalAlasan()"
                        class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-2 rounded-lg shadow">
                        Tolak
                    </button>
                    <button onclick="closeModalTolak()"
                        class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold px-6 py-2 rounded-lg shadow">
                        Batal
                    </button>
                </div>
            </div>
        </div>

        <div id="modalAlasan" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
            <div class="bg-white rounded-2xl p-8 w-[420px] text-center shadow-lg relative">
                <h2 class="text-lg font-semibold text-gray-800 mb-6">Pilih Alasan</h2>

                <form action="/ditolak/kandidat/{{ $Data->id }}" method="POST" class="text-left space-y-3">
                    @csrf
                    @method('PUT')
                    <input type="text" hidden name="status" value="ditolak">
                    <label class="block border-b border-gray-300 pb-1 cursor-pointer">
                        <input type="radio" name="alasan" value="Gaji yang ditawarkan tidak sesuai" class="mr-2">
                        Gaji yang ditawarkan tidak sesuai
                    </label>

                    <label class="block border-b border-gray-300 pb-1 cursor-pointer">
                        <input type="radio" name="alasan" value="Menerima tawaran dari perusahaan lain"
                            class="mr-2">
                        Menerima tawaran dari perusahaan lain
                    </label>

                    <label class="block border-b border-gray-300 pb-1 cursor-pointer">
                        <input type="radio" name="alasan" value="Menginginkan benefit yang lebih lengkap"
                            class="mr-2">
                        Menginginkan benefit yang lebih lengkap
                    </label>

                    <label class="block border-b border-gray-300 pb-1 cursor-pointer">
                        <input type="radio" name="alasan" value="Menginginkan fleksibilitas dalam bekerja"
                            class="mr-2">
                        Menginginkan fleksibilitas dalam bekerja
                    </label>

                    <div class="pt-2">
                        <label class="font-medium text-gray-700">Lainnya :</label>
                        <textarea name="alasan_lainya"
                            class="w-full border border-gray-300 rounded-md mt-1 p-2 text-sm focus:ring-2 focus:ring-orange-400 focus:outline-none"
                            rows="3" placeholder="Tulis alasan lain..."></textarea>
                    </div>

                    <div class="flex justify-center gap-3 pt-6">
                        <button type="submit"
                            class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg font-semibold transition">
                            Lanjut
                        </button>
                        <button type="button" onclick="closeModalAlasan()"
                            class="bg-orange-200 hover:bg-orange-300 text-orange-700 px-6 py-2 rounded-lg font-semibold transition">
                            Kembali
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div id="modalTolakSelesai"
            class="fixed inset-0 bg-black bg-opacity-40 hidden z-50 flex items-center justify-center backdrop-blur-sm">
            <div class="bg-white rounded-2xl p-8 w-[340px] text-center border-t-4 border-orange-500 shadow-xl relative">
                <button onclick="closeModalTolakSelesai()"
                    class="absolute top-3 right-4 text-gray-500 text-xl font-bold hover:text-gray-700">&times;</button>
                <div class="flex flex-col items-center justify-center">
                    <div class="bg-orange-100 p-4 rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-orange-500" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M20 6L9 17l-5-5" />
                        </svg>
                    </div>
                    <h2 class="text-lg font-semibold text-gray-800 mb-2">Penolakan Selesai</h2>
                    <p class="text-gray-600">Penolakan anda telah dikirim ke<br>
                        <span id="namaPerusahaanTolakSelesai"
                            class="font-semibold text-black">{{ $Data->lowongan_perusahaan->perusahaan->nama_perusahaan }}</span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <script>
        const modalKonfirmasi = document.getElementById('modalKonfirmasi');
        const modalSelesai = document.getElementById('modalSelesai');
        const btnBatal = document.getElementById('btnBatal');
        const closeSelesai = document.getElementById('closeSelesai');

        function openKonfirmasi(namaPerusahaan) {
            document.getElementById('namaPerusahaan1').innerText = namaPerusahaan;
            modalKonfirmasi.classList.remove('hidden');
        }

        btnBatal.addEventListener('click', () => modalKonfirmasi.classList.add('hidden'));

        @if (session('showModalSelesai'))
            modalSelesai.classList.remove('hidden');
        @endif

        closeSelesai.addEventListener('click', () => modalSelesai.classList.add('hidden'));

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.updated-date').forEach(function(el) {
                const updatedStr = el.getAttribute('data-updated');
                const updatedDate = new Date(updatedStr);
                const today = new Date();
                updatedDate.setHours(0, 0, 0, 0);
                today.setHours(0, 0, 0, 0);
                const diffTime = today - updatedDate;
                const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));
                if (diffDays === 0) el.textContent = 'Hari ini diperbarui';
                else if (diffDays === 1) el.textContent = '1 hari yang lalu';
                else el.textContent = diffDays + ' hari yang lalu';
            });
        });

        const ModalTolak = document.getElementById("modalKonfirmasitolak");
        const ModalTolakSelesai = document.getElementById("modalTolakSelesai");

        function openModalAlasan() {
            document.getElementById("modalAlasan").classList.remove("hidden");
            document.getElementById("modalKonfirmasitolak").classList.add("hidden");
        }

        function closeModalAlasan() {
            document.getElementById("modalAlasan").classList.add("hidden");
        }


        window.openModalTolak = function(namaPerusahaan) {
            document.getElementById("namaPerusahaanTolak").innerText = namaPerusahaan;
            ModalTolak.classList.remove("hidden");
        };
        window.closeModalTolak = function() {
            document.getElementById("modalKonfirmasitolak").classList.add("hidden");
        };

        @if (session('showModalSelesaiTolak'))
            ModalTolakSelesai.classList.remove('hidden');
        @endif

        window.closeModalTolakSelesai = function() {
            ModalTolakSelesai.classList.add('hidden');
        };
    </script>
@endsection
