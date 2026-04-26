@extends('layouts.index')

@section('content')
    <section class="relative w-full h-screen pt-24">
        <div class="absolute inset-0">
            <img src="{{ $link_sosial['pasang_lowongan_header']->link ??
                'https://www.shutterstock.com/image-illustration/blue-black-gradient-background-dark-600nw-2657331673.jpg' }}"
                class="w-full h-full object-cover">

            <div class="absolute inset-0 bg-black/65/65 bg-opacity-60"></div>
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
            @foreach ($Pakets as $p)
                @if ($p->nama === 'Gold')
                    <div
                        class="bg-white rounded-lg shadow-md border border-gray-200 text-center hover:-translate-y-2 transition-all duration-500">
                        <div class="bg-yellow-500 p-5">
                            <h2 class="text-xl font-bold text-white">GOLD</h2>
                        </div>
                        <div class="p-6">
                            <p class="mt-2 font-semibold text-gray-700">Lebih Banyak Benefit</p>
                            <p class="text-sm text-gray-500 mb-6 border-b border-gray-200 pb-5">5 Kali Publikasi di semua jaringan
                                AreaKerja.com</p>
                            <ul class="space-y-2 text-gray-600 mb-6">
                                <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Website &
                                    Aplikasi</li>
                                <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Instagram Post
                                    & Story
                                </li>
                                <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Highlight Story
                                    Favorit
                                </li>
                                <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Google Jobs &
                                    Bisnis
                                </li>
                                <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Facebook Post &
                                    Story
                                </li>
                                <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Twitter</li>
                                <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>LinkedIn</li>
                                <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Telegram</li>
                            </ul>
                            @foreach ($Data as $d)
                                @if ($d->nama === 'Pasang Lowongan Gold')
                                    @if (Auth::check() && Auth::user()->role === 'perusahaan')
                                        <button
                                            class="open-detail bg-yellow-500 text-white px-6 py-2 rounded-md font-semibold w-full"
                                            data-nama="{{ $d->nama }}" data-harga="{{ $d->harga }}">Pasang
                                            Lowongan</button>
                                    @else
                                        @auth
                                            <button onclick="window.location='/'"
                                                class="bg-yellow-500 text-white px-6 py-2 rounded-md font-semibold w-full">Pasang
                                                Lowongan</button>
                                        @endauth
                                        @guest
                                            <button onclick="window.location='/register'"
                                                class="bg-yellow-500 text-white px-6 py-2 rounded-md font-semibold w-full">Pasang
                                                Lowongan</button>
                                        @endguest
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach

            @foreach ($Pakets as $p)
                @if ($p->nama === 'Silver')
                    <div
                        class="bg-white rounded-lg shadow-md transform  lg:translate-y-[-1rem] md:translate-y-[-1rem] translate-y-0 border border-gray-200 text-center hover:-translate-y-6 transition-all duration-500 ">
                        <div class="bg-[#979aa0] p-5">
                            <h2 class="text-xl font-bold text-white">Silver</h2>
                        </div>
                        <div class="p-6">
                            <p class="mt-2 font-semibold text-gray-700">Lebih Banyak Benefit</p>
                            <p class="text-sm text-gray-500 mb-6 border-b border-gray-200 pb-5">3 Kali Publikasi di semua jaringan
                                AreaKerja.com</p>
                            <ul class="space-y-2 text-gray-600 mb-6">
                                <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Website
                                    &
                                    Aplikasi</li>
                                <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Instagram Post
                                    & Story
                                </li>
                                <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Highlight Story
                                    Favorit
                                </li>
                                <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Google
                                    Jobs &
                                    Bisnis
                                </li>
                                <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Facebook Post &
                                    Story
                                </li>
                                <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Twitter
                                </li>
                                <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>LinkedIn</li>
                                <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Telegram</li>
                            </ul>
                            @foreach ($Data as $d)
                                @if ($d->nama === 'Pasang Lowongan Silver')
                                    @if (Auth::check() && Auth::user()->role === 'perusahaan')
                                        <button
                                            class="open-detail bg-[#979aa0] text-white px-6 py-2 rounded-md font-semibold w-full"
                                            data-nama="{{ $d->nama }}" data-harga="{{ $d->harga }}">Pasang
                                            Lowongan</button>
                                    @else
                                        @auth
                                            <button onclick="window.location='/'"
                                                class="bg-[#979aa0] text-white px-6 py-2 rounded-md font-semibold w-full">Pasang
                                                Lowongan</button>
                                        @endauth
                                        @guest
                                            <button onclick="window.location='/register'"
                                                class="bg-[#979aa0] text-white px-6 py-2 rounded-md font-semibold w-full">Pasang
                                                Lowongan</button>
                                        @endguest
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach

            @foreach ($Pakets as $p)
                @if ($p->nama === 'Bronze')
                    <div
                        class="bg-white rounded-lg shadow-md border border-gray-200 text-center hover:-translate-y-2 transition-all duration-500 ">
                        <div class="bg-[#71665d] p-5">
                            <h2 class="text-xl font-bold text-white">Bronze</h2>
                        </div>
                        <div class="p-6">
                            <p class="mt-2 font-semibold text-gray-700">Lebih Banyak Benefit</p>
                            <p class="text-sm text-gray-500 mb-6 border-b border-gray-200 pb-5">1 Kali Publikasi di semua jaringan
                                AreaKerja.com
                            </p>
                            <ul class="space-y-2 text-gray-600 mb-6">
                                <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Website
                                    &
                                    Aplikasi
                                </li>
                                <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Instagram Post
                                    &
                                    Story
                                </li>
                                <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Highlight Story
                                    Favorit
                                </li>
                                <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Google
                                    Jobs &
                                    Bisnis
                                </li>
                                <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Facebook Post &
                                    Story
                                </li>
                                <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Twitter
                                </li>
                                <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>LinkedIn</li>
                                <li class="flex items-center gap-2"><i class="ph ph-check font-semibold"></i>Telegram</li>
                            </ul>
                            @foreach ($Data as $d)
                                @if ($d->nama === 'Pasang Lowongan Bronze')
                                    @if (Auth::check() && Auth::user()->role === 'perusahaan')
                                        <button
                                            class="open-detail bg-[#71665d] text-white px-6 py-2 rounded-md font-semibold w-full"
                                            data-nama="{{ $d->nama }}" data-harga="{{ $d->harga }}">Pasang
                                            Lowongan</button>
                                    @else
                                        @auth
                                            <button onclick="window.location='/'"
                                                class="bg-[#71665d] text-white px-6 py-2 rounded-md font-semibold w-full">Pasang
                                                Lowongan</button>
                                        @endauth
                                        @guest
                                            <button onclick="window.location='/register'"
                                                class="bg-[#71665d] text-white px-6 py-2 rounded-md font-semibold w-full">Pasang
                                                Lowongan</button>
                                        @endguest
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
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

    <!-- Modal -->
    @if (Auth::check() && Auth::user()->role === 'perusahaan')
        <div id="modalDetails" class="hidden fixed inset-0 z-[9999] flex items-center justify-center p-4">
            <div onclick="closeDetail()" class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm"></div>

            <div
                class="bg-white w-full max-w-md relative shadow-2xl max-h-[90vh] overflow-hidden rounded-2xl border border-slate-100 z-10 animate-in fade-in zoom-in duration-200">

                <div class="p-6 border-b border-slate-100 relative">
                    <button type="button" onclick="closeDetail()"
                        class="absolute top-4 right-4 text-slate-400 hover:text-rose-500 transition-colors text-3xl leading-none">
                        &times;
                    </button>
                    <h2 class="text-xl font-bold text-slate-800 text-center">Konfirmasi Pembayaran</h2>
                    <p class="text-center text-slate-500 text-sm mt-1">Selesaikan aktivasi lowongan Anda</p>
                </div>

                <form id="formBeli" action="/topup/lowongan" method="POST" class="p-6">
                    @csrf

                    <div class="space-y-4 mb-6">
                        <div class="flex justify-between items-center p-3 bg-slate-50 rounded-xl">
                            <span class="text-sm text-slate-600">Paket Terpilih</span>
                            <input type="text" disabled id="d_nama"
                                class="font-bold text-slate-800 bg-transparent border border-gray-200 text-right outline-none w-1/2"
                                value="">
                            <input type="hidden" name="pesanan" id="pesanan_hidden">
                        </div>

                        <div
                            class="flex justify-between items-center p-3 bg-orange-50 rounded-xl border border-orange-100">
                            <span class="text-sm text-orange-700 font-medium">Total Harga</span>
                            <div class="flex items-center gap-1">
                                <input type="text" disabled id="d_harga"
                                    class="bg-transparent text-orange-600 border border-gray-200 font-bold text-right w-24 outline-none"
                                    value="">
                                <span class="text-xs font-bold text-orange-600"></span>
                            </div>
                            <input type="hidden" name="total" id="total_hidden">
                        </div>
                    </div>

                    <input type="hidden" name="paket_id" id="paket_id_hidden">

                    <label class="block text-sm font-semibold text-slate-700 mb-2 ml-1">Pilih Lowongan yang Akan
                        Diaktivasi</label>
                    <div class="overflow-hidden rounded-xl border border-slate-200 mb-6 bg-slate-50">
                        <div class="max-h-48 overflow-y-auto custom-scrollbar">
                            <table class="w-full text-sm text-left border-collapse">
                                <tbody class="divide-y divide-slate-200">
                                    @php
                                        $lowongan = \App\Models\LowonganPerusahaan::withoutGlobalScope('aktif')
                                            ->where('perusahaan_id', Auth::user()->perusahaan->id)
                                            ->get();
                                        $tanpaPaket = $lowongan->whereNull('paket_id');
                                    @endphp

                                    @if ($tanpaPaket->count() > 0)
                                        @foreach ($tanpaPaket as $p)
                                            <tr class="hover:bg-white transition-colors group">
                                                <td class="px-4 py-3 w-10">
                                                    <input name="id_lowongan" type="radio" value="{{ $p->id }}"
                                                        required
                                                        class="w-4 h-4 text-orange-500 border-slate-300 focus:ring-orange-500 cursor-pointer radio-lowongan">
                                                </td>
                                                <td class="px-2 py-3 text-slate-700 font-medium group-hover:text-orange-600 transition-colors cursor-pointer"
                                                    onclick="this.parentElement.querySelector('input').click()">
                                                    {{ $p->nama }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="2" class="px-4 py-8 text-center text-slate-500">
                                                Belum ada draf lowongan. <br>
                                                <a href="/dashboard/perusahaan/lowongan"
                                                    class="text-orange-500 underline font-bold">Buat dulu yuk!</a>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="flex items-center justify-between px-1">
                            <div class="flex items-center gap-2">
                                <span class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Saldo:</span>
                                <div
                                    class="flex items-center gap-1 bg-emerald-100 text-emerald-700 px-2 py-1 rounded-md text-xs font-bold">
                                    <span id="saldo_koin">{{ $totalKoin }}</span> Koin
                                </div>
                            </div>
                            <p id="p" class="text-[10px] font-bold italic"></p>
                        </div>

                        <label class="flex items-start gap-3 cursor-pointer group p-1">
                            <input class="mt-1 border-slate-300 rounded text-orange-500 focus:ring-orange-500"
                                type="checkbox" id="konfirmasi" required>
                            <span
                                class="text-xs text-slate-500 leading-tight group-hover:text-slate-700 transition-colors">
                                Saya menyetujui pemotongan saldo koin untuk aktivasi ini.
                            </span>
                        </label>

                        <button type="submit" id="submitBtn"
                            class="w-full bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white font-bold py-3.5 rounded-xl transition-all shadow-lg active:scale-[0.98]">
                            Konfirmasi & Bayar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    @if (session('success'))
        <div id="toast-success"
            class="fixed top-5 right-5 z-50 flex items-center w-full max-w-xs p-4 text-green-500 bg-green-100 rounded-lg shadow-lg"
            role="alert">
            <div class="flex justify-center">
                <img src="{{ asset('topup_icon/Ceklis.png') }}" alt="" class="w-10 object-contain">
            </div>
            <div class="ms-3 text-sm font-medium">
                {{ session('success') }}
                <p class="text-zinc-600">Lowongan Anda Sekarang Telah Ter Publish!</p>
            </div>
        </div>

        <script>
            setTimeout(() => {
                document.getElementById('toast-success')?.remove();
            }, 5000);
        </script>
    @endif

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const detailBtns = document.querySelectorAll(".open-detail");
            const modalDetails = document.getElementById("modalDetails");
            const d_nama = document.getElementById("d_nama");
            const d_harga = document.getElementById("d_harga");
            const saldoKoin = document.getElementById("saldo_koin");
            const formBeli = document.getElementById("formBeli");
            const pesananHidden = document.getElementById("pesanan_hidden");
            const totalHidden = document.getElementById("total_hidden");
            const paketIdHidden = document.getElementById("paket_id_hidden");
            const submitBtn = formBeli ? formBeli.querySelector("button[type='submit']") : null;
            const checkboxKoin = document.getElementById("konfirmasi");
            const pesan = document.getElementById("p");

            if (!modalDetails) return;

            detailBtns.forEach(btn => {
                btn.addEventListener("click", () => {

                    const nama = btn.dataset.nama;
                    const harga = parseInt(btn.dataset.harga);

                    // isi data
                    if (d_nama) d_nama.value = nama;
                    if (d_harga) d_harga.value = new Intl.NumberFormat("id-ID").format(harga) +
                        " Koin";
                    if (pesananHidden) pesananHidden.value = nama;
                    if (totalHidden) totalHidden.value = harga;

                    // set paket id
                    if (paketIdHidden) {
                        if (nama === "Pasang Lowongan Bronze") paketIdHidden.value = 1;
                        else if (nama === "Pasang Lowongan Silver") paketIdHidden.value = 2;
                        else if (nama === "Pasang Lowongan Gold") paketIdHidden.value = 3;
                    }

                    // cek saldo
                    const koin = saldoKoin ? parseInt(saldoKoin.textContent) : 0;

                    if (koin < harga) {
                        if (checkboxKoin) {
                            checkboxKoin.checked = false;
                            checkboxKoin.disabled = true;
                        }

                        if (submitBtn) {
                            submitBtn.disabled = true;
                            submitBtn.classList.add("opacity-50", "cursor-not-allowed");
                        }

                        if (pesan) {
                            pesan.innerHTML = "Saldo Tidak Mencukupi";
                            pesan.classList.remove("text-green-500");
                            pesan.classList.add("text-red-500");
                        }

                    } else {
                        if (checkboxKoin) {
                            checkboxKoin.checked = true;
                            checkboxKoin.disabled = false;
                        }

                        if (submitBtn) {
                            submitBtn.disabled = false;
                            submitBtn.classList.remove("opacity-50", "cursor-not-allowed");
                        }

                        if (pesan) {
                            pesan.innerHTML = "Saldo Mencukupi";
                            pesan.classList.remove("text-red-500");
                            pesan.classList.add("text-green-500");
                        }
                    }

                    // tampilkan modal
                    modalDetails.classList.remove("hidden");
                });
            });

            // close modal kalau klik luar
            modalDetails.addEventListener("click", function(e) {
                if (e.target === modalDetails) {
                    closeDetail();
                }
            });

        });

        function closeDetail() {
            const modal = document.getElementById("modalDetails");
            if (modal) modal.classList.add("hidden");
        }
    </script>
@endsection
