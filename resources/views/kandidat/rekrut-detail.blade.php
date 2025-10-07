@extends('layouts.index')

@section('content')
    <section class="mx-auto pt-40">
        <div class="flex flex-col lg:flex-row gap-8 items-start">
            <div class="bg-white flex-1 min-h-[600px]">
                <div class="flex justify-between items-start p-6">
                    <div>
                        <div class="flex">
                            <div>
                                <img src="{{ asset('Icon/seveninc.png') }}" alt="">
                            </div>
                            <div>
                                <h1 class="font-bold text-xl">{{ $Data->lowongan_perusahaan->nama }}</h1>
                                <p class="text-gray-500">{{ $Data->lowongan_perusahaan->perusahaan->nama_perusahaan }}</p>
                                <p class="text-gray-500">{{ $Data->lowongan_perusahaan->alamat }}</p>
                                <p class="bg-gray-200 w-fit my-3 px-3 py-1 text-gray-700 font-semibold rounded-md">
                                    Rp. {{ number_format($Data->lowongan_perusahaan->gaji_awal, 0, ',', '.') }} – Rp.
                                    {{ number_format($Data->lowongan_perusahaan->gaji_akhir, 0, ',', '.') }} perbulan
                                </p>
                                <div class="flex items-center gap-3">
                                    @if ($Data->status !== 'pending')
                                        <button disabled
                                            onclick="openKonfirmasi('{{ $Data->lowongan_perusahaan->perusahaan->nama_perusahaan }}')"
                                            class="bg-zinc-500 cursor-no-drop  text-white px-6 py-2 rounded-md font-semibold">
                                            Terima
                                        </button>
                                        <button disabled
                                            class="bg-zinc-500 cursor-no-drop text-white px-6 py-2 rounded-md font-semibold">
                                            Tolak
                                        </button>
                                    @else
                                        <button
                                            onclick="openKonfirmasi('{{ $Data->lowongan_perusahaan->perusahaan->nama_perusahaan }}')"
                                            class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-md font-semibold">
                                            Terima
                                        </button>
                                        <button
                                            class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-md font-semibold">
                                            Tolak
                                        </button>
                                    @endif
                                    <div class="flex items-center gap-2">
                                        <i
                                            class="ph ph-heart-straight text-3xl text-gray-800 bg-gray-300 p-1 rounded-md"></i>
                                    </div>
                                </div>
                                <div class="pb-6">
                                    <div class=" mb-3 border-t-2 my-8 py-4">
                                        <h2 class="font-semibold text-lg">Detail Lowongan
                                            @foreach (explode("\n", $Data->lowongan_perusahaan->deskripsi) as $baris)
                                                @if (trim($baris) != '')
                                                    <li>{{ $baris }}</li>
                                                @endif
                                            @endforeach
                                    </div>
                                    <div class="flex gap-3 mb-3 border-b-2 pb-5">
                                        <div>
                                            <img src="{{ asset('Icon/detail-lowongan.png') }}" alt="">
                                        </div>
                                        <div>
                                            <p class="mb-3 font-semibold">Jenis Lowongan</p>
                                            <span
                                                class="bg-gray-200 px-4 py-2 rounded-md text-sm font-semibold">{{ $Data->lowongan_perusahaan->jenis }}</span>
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-3 mb-5 border-b-2 pb-5">
                                        <i class="ph ph-map-pin text-gray-500 text-lg"></i>
                                        <span>{{ $Data->lowongan_perusahaan->alamat }}</span>
                                    </div>

                                    <div class="mb-6 border-b-2 pb-5">
                                        <h3 class="font-semibold text-lg mb-2">Deskripsi Lowongan</h3>
                                        <ul class="list-disc list-inside space-y-1 text-gray-600">
                                            @foreach (explode("\n", $Data->lowongan_perusahaan->deskripsi) as $baris)
                                                @if (trim($baris) != '')
                                                    <li>{{ $baris }}</li>
                                                @endif
                                            @endforeach
                                        </ul>
                                        <p class="font-bold mt-5">Requirements</p>
                                        <ul class="list-disc list-inside space-y-1 text-gray-600">

                                        </ul>
                                    </div>

                                    <div class="">
                                        <h3 class="font-semibold text-lg mb-2">Responsibilities</h3>
                                        <ul class="list-disc list-inside space-y-1 text-gray-600">
                                            <li>Kumpulkan dan periksa kebutuhan pengguna.</li>
                                            <li>Konsultasi dengan insinyur dan desainer produk mengenai produk.</li>
                                            <li>Mendesain dan mengembangkan desain visual untuk aplikasi.</li>
                                            <li>Bekerja sama dengan tim produk dan engineering.</li>
                                            <li>Uji prototipe dengan pengguna.</li>
                                            <li>Buat wireframe, user flow, dan spesifikasi desain.</li>
                                            <li>Kolaborasi erat dengan tim pengembangan produk.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mx-3 flex-1">
                <div class="flex justify-between items-center">
                    <h1 class="font-semibold text-2xl">Lowongan
                        {{ $Data->lowongan_perusahaan->perusahaan->nama_perusahaan }} Lainya</h1>
                    <p class="text-orange-500 font-semibold hidden lg:flex md:flex">Lihat Semua</p>
                </div>
                <div class="grid grid-cols-1 gap-5 mt-4">
                    @foreach ($lowongan as $l)
                        @if ($l->perusahaan_id === $Data->lowongan_perusahaan->perusahaan_id && $l->id !== $Data->lowongan_perusahaan->id)
                            <a href="/lowongan/tersimpan/detail/{{ $l->slug }}">
                                <div class="flex shadow-md p-4">
                                    <div>
                                        <img src="{{ asset('Icon/seveninc.png') }}" alt="">
                                    </div>
                                    <div class="w-full">
                                        <p>{{ $l->perusahaan->nama_perusahaan }}</p>
                                        <h1 class="font-semibold">{{ $l->nama }} - {{ $l->jenis }}</h1>
                                        <span>{{ $l->alamat }}</span>
                                        <div class="mt-5 block lg:flex md:flex justify-between items-center w-full">
                                            <span
                                                class="px-3 bg-[#d7d6d6] text-[#565656] py-2 rounded-md">Rp.{{ $l->gaji_awal }}
                                                - Rp.{{ $l->gaji_akhir }} per
                                                bulan</span>
                                            <span class="block mt-3 text-[#565656] pl-0 lg:pl-10 md:pl-10 updated-date"
                                                data-updated="{{ $l->updated_at }}">Menghitung...</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <div id="modalKonfirmasi" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
            <div class="bg-white rounded-2xl p-8 w-[400px] text-center border-2 border-purple-500">
                <h2 class="text-lg font-semibold text-purple-700 mb-4">Konfirmasi Menerima Rekrutmen</h2>
                <p class="text-gray-700 mb-6">
                    Yakin ingin menerima rekrutmen dari <span class="font-semibold text-black" id="namaPerusahaan1">(Nama
                        Perusahaan)</span>?
                </p>
                <form id="formupdate" action="/diterima/kandidat/{{ $Data->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" hidden name="status" value="diterima">
                </form>
                <div class="flex justify-center gap-4">
                    <button form="formupdate"
                        class="bg-orange-500 text-white px-6 py-2 rounded-md hover:bg-orange-600 transition">Terima</button>
                    <button id="btnBatal"
                        class="bg-gray-200 text-gray-700 px-6 py-2 rounded-md hover:bg-gray-300 transition">Batal</button>
                </div>
            </div>
        </div>

        <div id="modalSelesai" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
            <div class="relative bg-white rounded-2xl p-8 w-[420px] text-center shadow-lg">
                <button id="closeSelesai" class="absolute top-4 right-6 text-gray-400 hover:text-black text-xl transition">
                    &times;
                </button>
                <h2 class="text-lg font-semibold text-gray-700 mb-2">
                    Selamat! Anda telah menjadi bagian dari
                </h2>
                <h3 class="text-orange-500 font-bold mb-6" id="namaPerusahaan2">
                    {{ $Data->lowongan_perusahaan->perusahaan->nama_perusahaan }}</h3>
                <img src="{{ asset('Icon/poplogout.png') }}" alt="ilustrasi" class="mx-auto w-32 mb-6">
                <p class="text-gray-600">
                    Silahkan tunggu
                    <span class="font-semibold text-black"
                        id="namaPerusahaan3">{{ $Data->lowongan_perusahaan->perusahaan->nama_perusahaan }}</span>
                    menghubungi anda.
                </p>
            </div>
        </div>



    </section>
    <script>
        const modalKonfirmasi = document.getElementById('modalKonfirmasi');
        const modalSelesai = document.getElementById('modalSelesai');
        const btnTerima = document.getElementById('btnTerima');
        const btnBatal = document.getElementById('btnBatal');
        const closeSelesai = document.getElementById('closeSelesai');

        function openKonfirmasi(namaPerusahaan) {
            document.getElementById('namaPerusahaan1').innerText = namaPerusahaan;
            modalKonfirmasi.classList.remove('hidden');
        }

        btnBatal.addEventListener('click', () => {
            modalKonfirmasi.classList.add('hidden');
        });

        @if (session('showModalSelesai'))
            modalSelesai.classList.remove('hidden');
        @endif

        closeSelesai.addEventListener('click', () => {
            modalSelesai.classList.add('hidden');
        });

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.updated-date').forEach(function(el) {
                const updatedStr = el.getAttribute('data-updated');
                const updatedDate = new Date(updatedStr);
                const today = new Date();

                updatedDate.setHours(0, 0, 0, 0);
                today.setHours(0, 0, 0, 0);

                const diffTime = today - updatedDate;
                const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));

                if (diffDays === 0) {
                    el.textContent = 'Hari ini diperbarui';
                } else if (diffDays === 1) {
                    el.textContent = '1 hari yang lalu';
                } else {
                    el.textContent = diffDays + ' hari yang lalu';
                }
            });
        });
    </script>
@endsection
