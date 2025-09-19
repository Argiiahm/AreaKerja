@extends('layouts.index')

@section('content')
    <section class="mx-auto pt-40">
        <div class="block lg:flex md:block">
            <div class="bg-white">
                <div class="flex justify-between items-start p-6">
                    <div>
                        <div class="flex gap-5">
                            <div>
                                <img class="w-20" src="{{ asset('storage/' . $Data->perusahaan->img_profile) }}"
                                    alt="">
                            </div>
                            <div>
                                <h1 class="font-bold text-xl">{{ $Data->nama }}</h1>
                                <p class="text-gray-500">{{ $Data->perusahaan->nama_perusahaan }}</p>
                                <p class="text-gray-500">{{ $Data->alamat }}</p>
                                <p class="bg-gray-200 w-fit my-3 px-3 py-1 text-gray-700 font-semibold rounded-md">
                                    Rp. {{ $Data->gaji_awal }} – Rp. {{ $Data->gaji_akhir }} perbulan
                                </p>
                                <div class="flex items-center gap-3">
                                    <button id="openModalBtn"
                                        class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-sm font-semibold">
                                        Lamar Cepat
                                    </button>
                                    <div class="flex items-center gap-2">
                                        <i
                                            class="ph ph-bookmark-simple text-3xl text-gray-800 bg-gray-300 p-1 rounded-md"></i>
                                        <i class="ph ph-prohibit text-3xl text-gray-800 bg-gray-300 p-1 rounded-md"></i>
                                    </div>
                                </div>
                                <div class="pb-6">
                                    <div class=" mb-3 border-t-2 my-8 py-4">
                                        <h2 class="font-semibold text-lg">Detail Lowongan</h2>
                                        <p>Berikut merupakan deskripsi lengkap terkait perusahaan yang anda tuju</p>
                                    </div>
                                    <div class="flex gap-3 mb-3 border-b-2 pb-5">
                                        <div>
                                            <img src="{{ asset('Icon/detail-lowongan.png') }}" alt="">
                                        </div>
                                        <div>
                                            <p class="mb-3 font-semibold">Jenis Lowongan</p>
                                            <span class="bg-gray-200 px-4 py-2 rounded-md text-sm font-semibold">Full
                                                Time</span>
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-3 mb-5 border-b-2 pb-5">
                                        <i class="ph ph-map-pin text-gray-500 text-lg"></i>
                                        <span>Jakarta</span>
                                    </div>

                                    <div class="mb-6 border-b-2 pb-5">
                                        <h3 class="font-semibold text-lg mb-2">Deskripsi Lowongan</h3>
                                        <p class="font-bold">Requirements</p>
                                        <ul class="list-disc list-inside space-y-1 text-gray-600">
                                            <li>Terbukti 2 tahun pengalaman sebagai Desainer UX/UI.</li>
                                            <li>Latar belakang portofolio proyek desain gratis yang terkait dengan pembuatan
                                                web
                                                dan seluler.
                                            </li>
                                            <li>Kemampuan untuk membuat wireframe, mockup HTML & CSS.</li>
                                            <li>Pemahaman UX kuat dan keterampilan komunikasi efektif.</li>
                                            <li>Keterampilan berpikir desain yang kuat.</li>
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
            <div class="mx-3">
                <div class="flex justify-between items-center">
                    <h1 class="font-semibold text-2xl">Lowongan {{ $Data->perusahaan->nama_perusahaan }} Lainya</h1>
                    <p class="text-orange-500 font-semibold hidden lg:flex md:flex">Lihat Semua</p>
                </div>
                <div class="grid grid-cols-1 gap-5 mt-4">
                    @foreach ($Rekomendasi as $s)
                        @if ($Data->count() > 1 && $s->sum('id') != $s->id)
                            <a href="/lowongan/tersimpan/detail/{{ $s->slug }}">
                                <div class="flex gap-5 shadow-md p-4">
                                    <div>
                                        <img class="w-16" src="{{ asset('storage/' . $Data->perusahaan->img_profile) }}" alt="">
                                    </div>
                                    <div class="w-full">
                                        <p>{{ $s->perusahaan->nama_perusahaan }}</p>
                                        <h1 class="font-semibold">{{ $s->nama }} - {{ $s->jenis }}</h1>
                                        <span>Yogyakarta</span>
                                        <div class="mt-5 block lg:flex md:flex justify-between items-center w-full">
                                            <span class="px-3 bg-[#d7d6d6] text-[#565656] py-2 rounded-md">Rp.{{ $s->gaji_awal }} -
                                                Rp.{{ $s->gaji_akhir }}
                                                per
                                                bulan</span>
                                            <span class="block mt-3 text-[#565656] pl-0 lg:pl-10 md:pl-10">Aktif 2jam
                                                lalu</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg shadow-lg p-8 w-[400px] border-2 border-purple-500">
            <h2 class="text-center text-xl font-semibold mb-4">Konfirmasi</h2>
            <p class="text-center mb-6">
                CV akan dikirimkan ke <span class="font-bold">({{ $Data->perusahaan->nama_perusahaan }})</span>
            </p>

            <div class="flex justify-center gap-4">
                <button class="bg-orange-500 hover:bg-orange-600 text-white font-medium px-6 py-2 rounded-lg shadow">
                    Kirim
                </button>
                <button id="closeModalBtn"
                    class="bg-orange-500 hover:bg-orange-600 text-white font-medium px-6 py-2 rounded-lg shadow">
                    Batal
                </button>
            </div>
        </div>
    </div>
    <script>
        const modal = document.getElementById("modal");
        const openModalBtn = document.getElementById("openModalBtn");
        const closeModalBtn = document.getElementById("closeModalBtn");

        openModalBtn.addEventListener("click", () => {
            modal.classList.remove("hidden");
        });

        closeModalBtn.addEventListener("click", () => {
            modal.classList.add("hidden");
        });

        window.addEventListener("click", (e) => {
            if (e.target === modal) {
                modal.classList.add("hidden");
            }
        });

        document.getElementById("kirimBtn").addEventListener("click", () => {
            alert("CV berhasil dikirim!");
            modal.classList.add("hidden");
        });
    </script>
@endsection
