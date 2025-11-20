@extends('layouts.index')

@section('content')
    <section class="container max-w-screen-lg mx-auto pt-40">
        <form action="/" method="GET">
            <div
                class="flex items-center mx-5 lg:w-full lg:mx-auto md:w-auto p-2 border border-gray-300 rounded-lg shadow-sm">

                <div class="flex items-center flex-1 px-2">
                    <i class="ph ph-magnifying-glass text-zinc-900 text-lg mr-2"></i>
                    <input name="search" type="text" placeholder="Posisi lowongan, kata kunci, ..."
                        class="w-full outline-none border-none placeholder-gray-500 text-gray-700" />
                </div>

                <span class="w-px h-6 bg-gray-300"></span>

                <div class="flex items-center flex-1 px-2">
                    <i class="ph ph-map-pin text-zinc-900 text-lg mr-2"></i>
                    <input name="lokasi" type="text" placeholder="Kota, provinsi, kode pos..."
                        class="w-full outline-none placeholder-gray-500 border-none text-gray-700" />
                </div>

                <button type="submit" class="ml-2 bg-[#fa6601] cursor-pointer text-white font-medium px-4 py-2 rounded-lg">
                    <div class="hidden lg:block md:block">
                        Cari Lowongan Kerja
                    </div>
                    <div class="block lg:hidden md:hidden">
                        Cari
                    </div>
                </button>

            </div>
        </form>


        <div class="flex justify-center my-10 mx-2">
            <p class="text-[#fa6601] font-semibold text-center lg:text-left md:text-left">
                Lamar Pekerjaan Kamu ~
                <span class="font-normal block lg:inline md:inline text-zinc-600">
                    Dengan Waktu Dan Langkah Yang Tepat
                </span>
            </p>
        </div>

        <div>
            <p class="font-medium hidden lg:block md:block text-zinc-600 px-5 lg:px-0">
                KATEGORI PEKERJAAN POPULER
            </p>

            <div class="flex flex-col lg:flex-row md:flex-row gap-4 mx-2 mt-5">

                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-4 gap-2 w-full">
                    @foreach ($Kategories as $kategori)
                        <a href="/lowongan/kategori/{{ $kategori->id }}">
                            <div class="border border-gray-300 py-2 shadow-sm">
                                <p class="text-center text-zinc-500 font-medium text-sm">{{ $kategori->nama }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="grid grid-cols-3 md:grid-cols-1 lg:grid-cols-1 gap-2 w-full lg:w-32 md:w-32">
                    <div
                        class="border border-gray-300 border-l-4 border-l-red-600 py-2 flex items-center justify-center gap-1 shadow-sm text-red-600 font-semibold text-sm text-center">
                        <i class="ph ph-fire text-lg"></i>
                        Full Time
                    </div>
                    <div
                        class="border border-gray-300 border-l-4 border-l-sky-500 py-2 flex items-center justify-center gap-1 shadow-sm text-sky-500 font-semibold text-sm text-center">
                        <i class="ph ph-globe text-lg"></i>
                        WFO/WFH
                    </div>
                    <div
                        class="border border-gray-300 border-l-4 border-l-orange-600 py-2 flex items-center justify-center gap-1 shadow-sm text-orange-600 font-semibold text-sm text-center">
                        <i class="ph ph-graduation-cap text-lg"></i>
                        Graduate
                    </div>
                </div>

            </div>
        </div>

    </section>
    <div class="mt-10 flex justify-center gap-10  items-center font-semibold border-b">
        <button class="border-b-2 border-[#fa6601] text-[13px] lg:text-[16px] md:text-[16px] cursor-pointer">UMPAN
            LOWONGAN</button>
        <button class="cursor-pointer text-[13px] lg:text-[16px] md:text-[16px]">PENCAPAIAN BARU BARU INI</button>
    </div>

    <section class="mx-2 lg:mx-0 md:mx-0 px-0 lg:px-20 md:px-20">
        <p class="my-10 font-semibold text-gray-500 text-center lg:text-left md:text-left">
            Lowongan berdasarkan pada aktivitas anda di areakerja
        </p>

        <div class="border rounded-lg shadow bg-white">
            <div class="flex justify-between items-start p-6">
                <div>
                    <h1 class="font-bold text-xl">{{ $Data->nama }}</h1>
                    <p class="text-gray-500">{{ $Data->perusahaan->nama_perusahaan }} | {{ $Data->alamat }}</p>
                    <p class="bg-gray-200 w-fit my-3 px-3 py-1 text-gray-700 font-semibold rounded-md">
                        Rp. {{ number_format($Data->gaji_awal, 0, ',', '.') }} – Rp.
                        {{ number_format($Data->gaji_awal, 0, ',', '.') }} perbulan
                    </p>
                    @if (Auth::check() && Auth::user()->role === 'pelamar')
                        <div class="flex items-center gap-10">
                            <button id="openModalBtn"
                                class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-md font-semibold">
                                Lamar Cepat
                            </button>
                            <form action="/simpanlowongan/{{ $Data->slug }}" method="POST">
                                @csrf
                                <button type="submit">
                                    @if (Auth::user()->pelamars->simpan_lowongan->contains($Data->id))
                                        <i class="ph-fill ph-bookmark-simple text-4xl text-orange-500"></i>
                                    @else
                                        <i class="ph ph-bookmark-simple text-4xl text-gray-800"></i>
                                    @endif
                                </button>
                            </form>
                        </div>
                    @else
                        <div class="flex items-center gap-10">
                            <button onclick="window.location='/login'"
                                class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-md font-semibold">
                                Lamar Cepat
                            </button>
                            <button onclick="window.location='/login'"
                                class="ph ph-bookmark-simple text-4xl  text-gray-800"></button>
                        </div>
                    @endif
                </div>
            </div>

            <div class="px-6 pb-6">
                <h2 class="font-semibold text-lg mb-3">Detail Lowongan</h2>

                <div class="flex items-center gap-3 mb-3 border-b pb-5">
                    <i class="ph ph-briefcase text-gray-500 text-lg"></i>
                    <span class="bg-gray-200 px-3 py-1 rounded-md text-sm font-semibold">{{ $Data->jenis }}</span>
                </div>

                <div class="flex items-center gap-3 mb-5 border-b pb-5">
                    <i class="ph ph-map-pin text-gray-500 text-lg"></i>
                    <span>{{ $Data->alamat }}</span>
                </div>

                <div class="mb-6 border-b pb-5">
                    <div class="mb-3 my-8 py-4">
                        <h3 class="font-semibold text-lg mb-2">Deskripsi Lowongan</h3>
                        <ul class="list-disc pl-6">
                            @foreach (explode("\n", $Data->deskripsi) as $baris)
                                @if (trim($baris) != '')
                                    <li>{{ $baris }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <p class="font-bold">Requirements</p>
                    <ul class="list-disc list-inside space-y-1 text-gray-600">
                        <li>{{ $Data->syarat_pekerjaan }}</li>
                    </ul>
                </div>

                <div class="">
                    <h3 class="font-semibold text-lg mb-2">Responsibilities</h3>
                    <ul class="list-disc list-inside space-y-1 text-gray-600">
                        <li>{{ $Data->tanggung_jawab }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    @if (Auth::check())
        <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
            <div class="bg-white rounded-lg shadow-lg p-8 w-[400px] border-2 border-purple-500">
                @php
                    $pelamar = Auth::user()->pelamars;
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
