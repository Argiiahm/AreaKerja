@extends('layouts.index')

@section('content')
    <section class="relative w-full h-screen pt-24">
        <div class="absolute inset-0">
            <img src="https://asset-2.tribunnews.com/palu/foto/bank/images/ilustrasi-berjabat-tangan45.jpg" alt="Background"
                class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-60"></div>
        </div>
        <div class="relative z-10 flex items-center justify-start h-full px-10 lg:px-20 md:px-20">
            <div class="max-w-lg">
                <h1 class="text-6xl font-bold text-white mb-4">Pasang Lowongan</h1>
                <p class="text-white text-lg mb-6">
                    Dapatkan Karyawan berkualitas<br>
                    untuk perusahaan anda
                </p>
                <a href="#pasanglowongan"
                    class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-2 rounded-md shadow-md">
                    Daftar
                </a>
            </div>
        </div>
    </section>
    <section id="pasanglowongan" class="mx-0 lg:mx-20  mt-10">
        <div class="max-w-6xl mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-3 gap-5">
            <div class="bg-white rounded-lg shadow-md border text-center hover:-translate-y-2 transition-all duration-500 ">
                <div class="bg-yellow-500 p-5">
                    <h2 class="text-xl font-bold text-white">GOLD</h2>
                </div>
                <div class="p-6">
                    <p class="mt-2 font-semibold text-gray-700">Lebih Banyak Benefit</p>
                    <p class="text-sm text-gray-500 mb-6 border-b pb-5">5 Kali Publikasi di semua jaringan AreaKerja.com</p>
                    <ul class="space-y-2 text-gray-600 mb-6">
                        <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Website & Aplikasi</li>
                        <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Instagram Post & Story
                        </li>
                        <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Highlight Story Favorit
                        </li>
                        <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Google Jobs & Bisnis
                        </li>
                        <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Facebook Post & Story
                        </li>
                        <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Twitter</li>
                        <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>LinkedIn</li>
                        <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Telegram</li>
                    </ul>
                    @foreach ($Data as $d)
                        @if ($d->nama === 'Pasang Lowongan Gold')
                            <button class="open-detail bg-yellow-400 text-white px-6 py-2 rounded-md font-semibold w-full"
                                data-nama="{{ $d->nama }}" data-harga="{{ $d->harga }}">Pasang
                                Lowongan</button>
                        @endif
                    @endforeach
                </div>
            </div>

            <div
                class="bg-white rounded-lg shadow-md transform  lg:translate-y-[-1rem] md:translate-y-[-1rem] translate-y-0 border text-center hover:-translate-y-6 transition-all duration-500 ">
                <div class="bg-[#979aa0] p-5">
                    <h2 class="text-xl font-bold text-white">Silver</h2>
                </div>
                <div class="p-6">
                    <p class="mt-2 font-semibold text-gray-700">Lebih Banyak Benefit</p>
                    <p class="text-sm text-gray-500 mb-6 border-b pb-5">3 Kali Publikasi di semua jaringan AreaKerja.com</p>
                    <ul class="space-y-2 text-gray-600 mb-6">
                        <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Website & Aplikasi</li>
                        <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Instagram Post & Story
                        </li>
                        <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Highlight Story Favorit
                        </li>
                        <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Google Jobs & Bisnis
                        </li>
                        <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Facebook Post & Story
                        </li>
                        <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Twitter</li>
                        <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>LinkedIn</li>
                        <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Telegram</li>
                    </ul>
                    @foreach ($Data as $d)
                        @if ($d->nama === 'Pasang Lowongan Silver')
                            <button class="open-detail bg-yellow-400 text-white px-6 py-2 rounded-md font-semibold w-full"
                                data-nama="{{ $d->nama }}" data-harga="{{ $d->harga }}">Pasang
                                Lowongan</button>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md border text-center hover:-translate-y-2 transition-all duration-500 ">
                <div class="bg-[#71665d] p-5">
                    <h2 class="text-xl font-bold text-white">Bronze </h2>
                </div>
                <div class="p-6">
                    <p class="mt-2 font-semibold text-gray-700">Lebih Banyak Benefit</p>
                    <p class="text-sm text-gray-500 mb-6 border-b pb-5">1 Kali Publikasi di semua jaringan AreaKerja.com</p>
                    <ul class="space-y-2 text-gray-600 mb-6">
                        <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Website & Aplikasi</li>
                        <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Instagram Post & Story
                        </li>
                        <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Highlight Story Favorit
                        </li>
                        <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Google Jobs & Bisnis
                        </li>
                        <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Facebook Post & Story
                        </li>
                        <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Twitter</li>
                        <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>LinkedIn</li>
                        <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Telegram</li>
                    </ul>
                    @foreach ($Data as $d)
                        @if ($d->nama === 'Pasang Lowongan Bronze')
                            <button class="open-detail bg-yellow-400 text-white px-6 py-2 rounded-md font-semibold w-full"
                                data-nama="{{ $d->nama }}" data-harga="{{ $d->harga }}">Pasang
                                Lowongan</button>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="mx-0 lg:mx-20 md:mx-20">
        <div class="flex justify-center mb-8">
            <h1 class="text-2xl border-b-4 pb-4 w-fit text-orange-500 font-bold border-orange-500">Langkah - Langkah</h1>
        </div>
        <div class="grid grid-cols-2 gap-2 mx-3 lg:mx-0 md:mx-0 lg:gap-0 md:gap-0 lg:grid-cols-4 md:grid-cols-4">
            <div class="bg-orange-500 p-5 rounded-l-lg">
                <span class="text-2xl text-white font-bold">01</span>
                <p class="my-4 font-semibold">Pilih paket pemasangan lowongan sesuai yang anda inginkan</p>
            </div>
            <div class="bg-yellow-400 p-5">
                <span class="text-2xl text-gray-500 font-bold">02</span>
                <p class="my-4 font-semibold">Pilih paket pemasangan lowongan sesuai yang anda inginkan</p>
            </div>
            <div class="bg-orange-500 p-5">
                <span class="text-2xl text-gray-500 font-bold">03</span>
                <p class="my-4 font-semibold">Pilih paket pemasangan lowongan sesuai yang anda inginkan</p>
            </div>
            <div class="bg-yellow-400 rounded-r-lg p-5">
                <span class="text-2xl text-white font-bold">04</span>
                <p class="my-4 font-semibold">Pilih paket pemasangan lowongan sesuai yang anda inginkan</p>
            </div>
        </div>
    </section>
    <section class="mx-0 mt-20">
        <div class="flex justify-center mb-8">
            <h1 class="text-2xl border-b-4 pb-4 w-fit text-orange-500 font-bold border-orange-500">Kenapa Harus AreaKerja?
            </h1>
        </div>
        <div class="block lg:flex md:flex items-center justify-between">
            <img src="{{ asset('image/2.png') }}" alt="">
            <div class="pr-0 mt-10 space-y-5 lg:pr-52 md:pr-10 lg:mt-0 md:mt-0 lg:space-y-0">
                <div class="flex items-center gap-2">
                    <img class="w-20" src="{{ asset('Icon/1.png') }}" alt="">
                    <p class="w-full lg:w-96 md:w-96 text-orange-500">Website kami menjangkau ratusan perusahaan yang siap
                        menerima ribuan pencari kerja</p>
                </div>
                <div class="flex items-center gap-2">
                    <img class="w-20" src="{{ asset('Icon/3.png') }}" alt="">
                    <p class="w-full lg:w-96 md:w-96 text-orange-500">Akun media social kami diikuti ratusan ribu pencari
                        kerja serta memiliki jaringan social media yang lengkap</p>
                </div>
                <div class="flex items-center gap-2 text-orange-500">
                    <img class="w-20" src="{{ asset('Icon/2.png') }}" alt="">
                    <p class="w-full lg:w-96 md:w-96">Harga yang ramah bagi para pencari kerja tetapi dengan keuntungan
                        peluang yang besar</p>
                </div>
            </div>
        </div>
    </section>

    <div id="modalDetails"
        class="hidden fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div
            class="bg-white w-full max-w-md p-8 relative mx-10 shadow-lg max-h-[calc(100vh-3rem)] overflow-y-auto rounded-lg">
            <button onclick="closeDetail()"
                class="absolute top-3 right-4 text-gray-400 hover:text-gray-700 text-2xl">&times;</button>

            <h2 class="text-xl font-bold text-center mb-10">Pasang Lowongan</h2>

            <form id="formBeli" action="" method="POST">
                @csrf
                <div class="flex justify-between border-b border-dashed pb-2">
                    <span>Nama Paket</span>
                    <input type="text" disabled id="d_nama"
                        class="font-medium border-none bg-transparent text-right" value="">
                    <input type="hidden" name="pesanan" id="pesanan_hidden">
                </div>

                <div class="flex justify-between border-b border-dashed pt-2 pb-2">
                    <span>Harga</span>
                    <input type="text" disabled id="d_harga"
                        class="bg-orange-500 text-white text-center text-xs px-3 py-1 rounded-full" value="">
                    <input type="hidden" name="total" id="total_hidden">
                </div>

                <div class="flex justify-between border-b border-dashed pt-2 pb-2">
                    <div class="flex items-center gap-2">
                        <span>Saldo Koin Anda</span>
                        <span id="saldo_koin"
                            class="bg-orange-500 text-white text-xs px-3 py-1 rounded-full">{{ $totalKoin }}</span>
                    </div>
                    <div class="flex items-center gap-1">
                        <input class="border-2" type="checkbox" required>
                        <p id="p" class="text-zinc-600"></p>
                    </div>
                </div>

                <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded w-full">Beli</button>
            </form>
        </div>
    </div>

    </div>

    <script>
        const detailBtns = document.querySelectorAll(".open-detail");
        const modalDetails = document.getElementById("modalDetails");
        const d_nama = document.getElementById("d_nama");
        const d_harga = document.getElementById("d_harga");
        const saldoKoin = document.getElementById("saldo_koin");
        const formBeli = document.getElementById("formBeli");
        const pesananHidden = document.getElementById("pesanan_hidden");
        const totalHidden = document.getElementById("total_hidden");
        const submitBtn = formBeli.querySelector("button[type='submit']");
        const checkboxKoin = formBeli.querySelector("input[type='checkbox']");
        const pesan = document.getElementById("p");

        detailBtns.forEach(btn => {
            btn.addEventListener("click", () => {
                const nama = btn.dataset.nama;
                const harga = parseInt(btn.dataset.harga);

                d_nama.value = nama;
                d_harga.value = new Intl.NumberFormat("id-ID").format(harga) + " Koin";
                pesananHidden.value = nama;
                totalHidden.value = harga;

                const koin = parseInt(saldoKoin.textContent);
                if (koin < harga) {
                    checkboxKoin.checked = false;
                    checkboxKoin.disabled = true;
                    submitBtn.disabled = true;
                    submitBtn.classList.add("opacity-50", "cursor-not-allowed");
                    pesan.innerHTML = "Saldo Tidak Mencukupi"
                } else {
                    checkboxKoin.checked = true;
                    checkboxKoin.disabled = false;
                    submitBtn.disabled = false;
                    submitBtn.classList.remove("opacity-50", "cursor-not-allowed");
                    pesan.innerHTML = "Saldo Mencukupi"


                }

                formBeli.setAttribute("action", "/topup/lowongan");
                modalDetails.classList.remove("hidden");
            });
        });

        function closeDetail() {
            modalDetails.classList.add("hidden");
        }
    </script>
@endsection
