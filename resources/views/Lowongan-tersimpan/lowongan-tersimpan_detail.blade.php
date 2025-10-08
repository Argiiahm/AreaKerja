@extends('layouts.index')

@section('content')
    <section class="pt-36 px-5 lg:px-20 bg-gray-50 min-h-screen">
        <div class="flex flex-col lg:flex-row gap-10">

            <div class="flex-1 rounded-2xl shadow-md overflow-hidden">
                <div class="flex flex-col md:flex-row gap-6 p-8 border-b">
                    <div class="flex-shrink-0 mx-auto md:mx-0">
                        <img src="{{ asset('storage/' . $Data->perusahaan->img_profile) }}" alt="Logo Perusahaan"
                            class="w-24 h-24 rounded-lg object-cover">
                    </div>

                    <div class="flex-1">
                        <h1 class="text-2xl font-bold text-gray-800">{{ $Data->nama }}</h1>
                        <p class="text-gray-600 font-medium">{{ $Data->perusahaan->nama_perusahaan }}</p>
                        <p class="text-gray-500 mt-1">{{ $Data->alamat }}</p>
                        <p class="mt-3 inline-block bg-orange-100 text-orange-600 font-semibold px-4 py-2 rounded-lg">
                            Rp {{ $Data->gaji_awal }} – Rp {{ $Data->gaji_akhir }} / bulan
                        </p>

                        <div class="mt-5 flex flex-wrap items-center gap-4">
                            @php
                                $beliData = $beli->first(function ($item) use ($Data) {
                                    return optional($item->lowongan_perusahaan)->id === $Data->id;
                                });
                            @endphp

                            @if ($beliData)
                                @if ($beliData->status === 'pending')
                                    <button
                                        onclick="openKonfirmasi('{{ optional(optional($beliData->lowongan_perusahaan)->perusahaan)->nama_perusahaan }}')"
                                        class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-md font-semibold">
                                        Terima
                                    </button>
                                    <button
                                        class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-md font-semibold">
                                        Tolak
                                    </button>
                                @else
                                    <button disabled
                                        class="bg-zinc-500 cursor-no-drop text-white px-6 py-2 rounded-md font-semibold">
                                        Terima
                                    </button>
                                    <button disabled
                                        class="bg-zinc-500 cursor-no-drop text-white px-6 py-2 rounded-md font-semibold">
                                        Tolak
                                    </button>
                                @endif
                            @else
                                <button id="openModalBtn"
                                    class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-2 rounded-lg shadow transition">
                                    Lamar Cepat
                                </button>
                            @endif

                            <div class="flex items-center gap-3">
                                <button title="Simpan" class="bg-gray-100 hover:bg-gray-200 p-2 rounded-lg shadow-sm">
                                    <i class="ph ph-bookmark-simple text-xl text-gray-700"></i>
                                </button>
                                <button title="Laporkan" class="bg-gray-100 hover:bg-gray-200 p-2 rounded-lg shadow-sm">
                                    <i class="ph ph-prohibit text-xl text-gray-700"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-8 space-y-8">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800 border-b pb-2 mb-4">Detail Lowongan</h2>
                        <p class="text-gray-600 mb-4">Berikut merupakan deskripsi lengkap terkait perusahaan yang anda tuju.
                        </p>

                        <div class="flex items-center gap-4 mb-5">
                            <img src="{{ asset('Icon/detail-lowongan.png') }}" alt="Icon" class="w-10 h-10">
                            <div>
                                <p class="font-semibold text-gray-700">Jenis Lowongan</p>
                                <span
                                    class="inline-block mt-2 bg-gray-100 px-4 py-1.5 text-gray-700 font-medium rounded-md">
                                    Full Time
                                </span>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 text-gray-700 border-t pt-4">
                            <i class="ph ph-map-pin text-orange-500 text-lg"></i>
                            <span>Jakarta</span>
                        </div>
                    </div>

                    <div class="border-t pt-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Deskripsi Lowongan</h3>
                        <p class="font-bold text-gray-700 mb-2">Requirements:</p>
                        <ul class="list-disc list-inside text-gray-600 space-y-1">
                            <li>Terbukti 2 tahun pengalaman sebagai Desainer UX/UI.</li>
                            <li>Latar belakang portofolio proyek desain web dan mobile.</li>
                            <li>Kemampuan membuat wireframe, mockup HTML & CSS.</li>
                            <li>Pemahaman UX kuat dan keterampilan komunikasi efektif.</li>
                            <li>Kemampuan berpikir desain yang baik.</li>
                        </ul>
                    </div>

                    <div class="border-t pt-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Responsibilities</h3>
                        <ul class="list-disc list-inside text-gray-600 space-y-1">
                            <li>Kumpulkan dan periksa kebutuhan pengguna.</li>
                            <li>Konsultasi dengan insinyur dan desainer produk.</li>
                            <li>Mendesain dan mengembangkan desain visual aplikasi.</li>
                            <li>Bekerja sama dengan tim produk dan engineering.</li>
                            <li>Uji prototipe dengan pengguna.</li>
                            <li>Buat wireframe, user flow, dan spesifikasi desain.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <aside class="w-full lg:w-[30%] lg:pl-4">
                <div class="bg-white rounded-2xl shadow-md p-6">
                    <div class="flex justify-between items-center mb-5">
                        <h2 class="text-lg font-bold text-gray-800 leading-tight">
                            Lowongan Lain di {{ $Data->perusahaan->nama_perusahaan }}
                        </h2>
                        <a href="#" class="text-orange-500 font-semibold hover:underline text-sm">
                            Lihat Semua
                        </a>
                    </div>

                    <div class="space-y-4">
                        @forelse ($Rekomendasi as $s)
                            @if ($s->paket_id && $Data->count() > 1 && $s->sum('id') != $s->id)
                                <a href="/lowongan/tersimpan/detail/{{ $s->slug }}"
                                    class="block bg-gray-50 border border-gray-200 rounded-xl p-4 hover:bg-orange-50 hover:border-orange-300 transition-all shadow-sm">
                                    <div class="flex items-center gap-4">
                                        <img src="{{ asset('storage/' . $Data->perusahaan->img_profile) }}" alt="Logo"
                                            class="w-12 h-12 object-cover rounded-md shadow-sm">
                                        <div class="flex-1">
                                            <p class="text-xs text-gray-500 mb-0.5">{{ $s->perusahaan->nama_perusahaan }}
                                            </p>
                                            <h3 class="font-semibold text-gray-800 text-sm leading-snug">
                                                {{ $s->nama }} <span class="text-gray-500">-
                                                    {{ $s->jenis }}</span>
                                            </h3>
                                            <p class="text-xs text-gray-500 mt-0.5">{{ $s->alamat ?? 'Yogyakarta' }}</p>

                                            <div class="mt-2 flex justify-between items-center text-xs text-gray-600">
                                                <span class="bg-gray-100 px-3 py-1 rounded-md font-medium">
                                                    Rp {{ $s->gaji_awal }} - {{ $s->gaji_akhir }}
                                                </span>
                                                <span class="text-gray-400">Aktif 2 jam lalu</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        @empty
                            <p class="text-center text-gray-500 text-sm py-4">Tidak ada lowongan lain</p>
                        @endforelse
                    </div>
                </div>
            </aside>
        </div>
    </section>

    <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg shadow-lg p-8 w-[400px] border-2 border-purple-500">
            @php
                $pelamar = Auth::user()->pelamars; // relasi ke tabel pelamars
                $profilLengkap =
                    $pelamar &&
                    $pelamar->nama_pelamar &&
                    $pelamar->deskripsi_diri &&
                    $pelamar->tanggal_lahir &&
                    $pelamar->gender &&
                    $pelamar->telepon_pelamar &&
                    $pelamar->img_profile &&
                    $pelamar->gaji_minimal &&
                    $pelamar->gaji_maksimal;
            @endphp
            @if (!$profilLengkap)
                <h2 class="text-center text-xl font-semibold mb-4">Konfirmasi</h2>
                <p class="text-center mb-3">Lengkapi Profile anda Terlebih Dahulu</p>
                <div class="flex justify-center">
                    <button onclick="window.location='/profile'"
                        class="bg-orange-500 hover:bg-orange-600 text-white font-medium px-6 py-2 rounded-lg shadow">
                        Lengkapi
                    </button>
                </div>
            @else
                @if (!Auth::user()->pelamars->lowongan_perusahaan->contains($Data->id))
                    <h2 class="text-center text-xl font-semibold mb-4">Konfirmasi</h2>
                    <p class="text-center mb-6">
                        CV akan dikirimkan ke <span class="font-bold">({{ $Data->perusahaan->nama_perusahaan }})</span>
                    </p>

                    <div class="flex justify-center gap-4">
                        <form action="/lamar/cepat" method="POST">
                            @csrf
                            <input type="text" name="lowongan_id" value="{{ $Data->id }}" id="" hidden>
                            <button
                                class="bg-orange-500 hover:bg-orange-600 text-white font-medium px-6 py-2 rounded-lg shadow">
                                Kirim
                            </button>
                        </form>
                        <button id="closeModalBtn"
                            class="bg-orange-500 hover:bg-orange-600 text-white font-medium px-6 py-2 rounded-lg shadow">
                            Batal
                        </button>
                    </div>
                @else
                    <h2 class="text-center text-xl font-semibold mb-4">Konfirmasi</h2>
                    <p class="text-center mb-1">
                        Anda Sudah Mengirim Lamaran Ke <br> <span
                            class="font-bold">({{ $Data->perusahaan->nama_perusahaan }})</span>
                    </p>
                    <p class="text-center mb-3">Tunggu Respon dari perusahaan</p>
                    <div class="flex justify-center">
                        <button id="closeModalBtn"
                            class="bg-orange-500 hover:bg-orange-600 text-white font-medium px-6 py-2 rounded-lg shadow">
                            Selesai
                        </button>
                    </div>
                @endif
            @endif
        </div>
    </div>

    @if ($beliData)
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
                <button id="closeSelesai"
                    class="absolute top-4 right-5 text-gray-400 hover:text-black text-xl transition">
                    &times;
                </button>
                <h2 class="text-lg font-semibold text-gray-700 mb-2">
                    Selamat! Anda telah menjadi bagian dari
                </h2>
                <h3 class="text-orange-500 font-bold mb-6" id="namaPerusahaan2">
                    {{ optional(optional($beliData->lowongan_perusahaan)->perusahaan)->nama_perusahaan }}
                </h3>
                <img src="{{ asset('Icon/poplogout.png') }}" alt="ilustrasi" class="mx-auto w-28 mb-6">
                <p class="text-gray-600">
                    Silakan tunggu
                    <span class="font-semibold text-black" id="namaPerusahaan3">
                        {{ optional(optional($beliData->lowongan_perusahaan)->perusahaan)->nama_perusahaan }}
                    </span>
                    menghubungi Anda.
                </p>
            </div>
        </div>
    @endif

    @if (session('success'))
        <div id="modalSuccess" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-md p-6 w-[500px] shadow-lg relative text-center">
                <h2 class="mt-2">Lamaran Anda Berhasil Terkirim</h2>
                <p class="text-zinc-400">Silahkan Menunggu Informasi Selanjutnya <br> Melalui Sytem Kamu.</p>
                <div class="flex justify-center mb-2">
                    <img class="my-8" src="{{ asset('Icon/poplogout.png') }}" alt="">
                </div>

                <div>
                    <button id="closeSuccessModal"
                        class="inline-block rounded-md py-2 px-10 bg-orange-500 text-white font-semibold hover:bg-gray-800 transition">
                        Selesai
                    </button>
                </div>
            </div>
        </div>

        <script>
            const modalSuccess = document.getElementById("modalSuccess");
            const closeSuccessModal = document.getElementById("closeSuccessModal");

            closeSuccessModal.addEventListener("click", () => {
                modalSuccess.classList.add("hidden");
            });
        </script>
    @endif

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const modal = document.getElementById("modal");
            const openModalBtn = document.getElementById("openModalBtn");
            const closeModalBtn = document.getElementById("closeModalBtn");
            const modalKonfirmasi = document.getElementById("modalKonfirmasi");
            const modalSelesai = document.getElementById("modalSelesai");
            const btnBatal = document.getElementById("btnBatal");
            const closeSelesai = document.getElementById("closeSelesai");

            if (openModalBtn && modal)
                openModalBtn.addEventListener("click", () => modal.classList.remove("hidden"));
            if (closeModalBtn && modal)
                closeModalBtn.addEventListener("click", () => modal.classList.add("hidden"));
            if (btnBatal && modalKonfirmasi)
                btnBatal.addEventListener("click", () => modalKonfirmasi.classList.add("hidden"));
            if (closeSelesai && modalSelesai)
                closeSelesai.addEventListener("click", () => modalSelesai.classList.add("hidden"));

            window.addEventListener("click", (e) => {
                if (e.target === modal) modal.classList.add("hidden");
            });

            window.openKonfirmasi = function(namaPerusahaan) {
                document.getElementById("namaPerusahaan1").innerText = namaPerusahaan;
                modalKonfirmasi.classList.remove("hidden");
            };

            @if (session('showModalSelesai'))
                modalSelesai.classList.remove('hidden');
            @endif
        });
    </script>
@endsection
