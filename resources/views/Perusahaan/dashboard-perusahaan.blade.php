@extends('layouts.index')

@section('content')
    <div class="">
        @if (Auth::check() && Auth::user()->perusahaan->pasanglowongan->isNotEmpty())
            <div>
                <div class="max-w-6xl mx-auto px-4 sm:px-6 py-6 mt-24 sm:mt-32">
                    <p class="text-sm text-orange-600 font-medium">Dashboard</p>
                    <h1 class="text-xl sm:text-2xl font-bold leading-snug">
                        Selamat Datang Di Area Kerja <br class="hidden sm:block"> Seven Inc
                    </h1>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6 px-4 sm:px-6 lg:px-32 items-start">
                    <div class="col-span-2 bg-orange-500 rounded-xl p-4 sm:p-6">
                        <div class="flex justify-between items-center mb-5">
                            <h2 class="text-white font-semibold text-base sm:text-lg mb-4">Lowongan Saya</h2>
                            <a class="bg-white text-orange-500 font-semibold px-4 sm:px-6 py-2 rounded-md"
                                href="/dashboard/perusahaan/lowongan">Tambah Lowongan</a>
                        </div>
                        @foreach (Auth::user()->perusahaan->pasanglowongan as $datas)
                            @if ($datas->paket_id)
                                <div
                                    class="bg-white rounded-xl p-4 flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4 gap-4">
                                    <div class="flex items-start sm:items-center gap-3 sm:gap-4">
                                        <img src="{{ asset('Icon/seveninc.png') }}" alt="Logo"
                                            class="w-12 h-12 sm:w-14 sm:h-14">
                                        <div class="text-sm sm:text-base">
                                            <p class="text-gray-800 font-semibold">{{ $datas->perusahaan->nama_perusahaan }}
                                            </p>
                                            <p class="text-black font-bold">{{ $datas->nama }} – {{ $datas->jenis }}</p>
                                            <p class="text-xs sm:text-sm text-gray-500">{{ $datas->alamat }}</p>
                                            <p class="text-xs sm:text-sm bg-gray-100 inline-block mt-1 px-2 py-0.5 rounded">
                                                Rp. {{ $datas->gaji_awal }} - Rp. {{ $datas->gaji_akhir }} / bulan
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2 sm:gap-3">
                                        <span
                                            class="px-3 py-1 border rounded-lg text-gray-700 text-xs sm:text-sm">{{ $datas->paket->nama }}</span>
                                        <button
                                            onclick="window.location='/dashboard/perusahaan/pelamar/{{ $datas->slug }}'"
                                            class="bg-orange-500 text-white px-3 sm:px-4 py-1 rounded-lg hover:bg-orange-600 transition text-xs sm:text-sm">
                                            Lihat Pelamar
                                        </button>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="bg-orange-500 rounded-xl p-4 sm:p-6 flex flex-col justify-center h-fit">
                        <h2 class="text-white font-semibold text-base sm:text-lg mb-6">Koin Saya</h2>

                        <div class="bg-white text-center rounded-md px-4 sm:px-6 mb-5 py-3 w-full">
                            <div class="flex items-center justify-center gap-3">
                                <span class="text-orange-500 font-bold text-2xl sm:text-4xl">{{ $totalSaldo }}</span>
                                <img src="{{ asset('Icon/coin perusahaan.png') }}" alt="coin"
                                    class="w-8 h-8 sm:w-10 sm:h-10">
                            </div>
                            <button id="btn_topup"
                                class="text-green-600 text-sm flex w-full items-center justify-center gap-1 mt-2">
                                Top Up Koin <span
                                    class="bg-green-500 text-white rounded-full px-1 sm:px-2 text-center">+</span>
                            </button>
                        </div>

                        <h2 class="text-white font-semibold text-base sm:text-lg mb-6">Kandidat Saya</h2>
                        <button
                            class="bg-orange-500 text-white border-2 border-white font-semibold px-4 sm:px-6 py-2 rounded-lg mb-3 hover:bg-orange-600 transition text-sm sm:text-base">
                            Lihat Kandidat
                        </button>
                        <button
                            class="bg-white text-orange-500 font-semibold px-4 sm:px-6 py-2 rounded-lg shadow hover:bg-gray-100 transition text-sm sm:text-base">
                            Cari Kandidat
                        </button>
                    </div>
                </div>
            </div>
        @else
            <div class="max-w-6xl mx-auto px-4 sm:px-6 py-6 mt-24 sm:mt-32">
                <p class="text-sm text-orange-600 font-medium">Dashboard</p>
                <h1 class="text-xl sm:text-2xl font-bold leading-snug">
                    Selamat Datang Di Area Kerja <br class="hidden sm:block">
                    {{ Auth::user()->perusahaan->nama_perusahaan }}
                </h1>
            </div>

            <div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4 sm:px-6 lg:px-40">
                    <div class="col-span-2 bg-orange-500 rounded-xl p-4 sm:p-6">
                        <h2 class="text-white font-semibold text-base sm:text-lg mb-4">Lowongan Saya</h2>
                        <div
                            class="bg-white flex flex-col md:flex-row justify-between items-center rounded-md px-4 py-3 mb-4 gap-3 text-sm sm:text-base">
                            <span class="font-semibold text-black text-center md:text-left">Lowongan Belum Terpasang</span>
                            <a href="/dashboard/perusahaan/lowongan"
                                class="text-orange-500 border border-orange-500 px-3 sm:px-4 py-2 rounded-md text-xs sm:text-sm">
                                Tambah Lowongan
                            </a>
                        </div>
                        <div class="bg-white text-center rounded-md px-4 sm:px-6 py-4 w-full md:w-fit mx-auto">
                            <div class="flex items-center justify-center gap-3">
                                <span class="text-orange-500 font-bold text-2xl sm:text-4xl">{{ $totalSaldo }}</span>
                                <img src="{{ asset('Icon/coin perusahaan.png') }}" alt="coin"
                                    class="w-8 h-8 sm:w-10 sm:h-10">
                            </div>
                            <button id="btn_topup"
                                class="text-green-600 text-sm flex w-full items-center justify-center gap-1 mt-2">
                                Top Up Koin <span
                                    class="bg-green-500 text-white rounded-full px-1 sm:px-2 text-center">+</span>
                            </button>
                        </div>
                    </div>
                    <div class="bg-orange-500 rounded-xl p-4 sm:p-6">
                        <h2 class="text-white font-semibold text-base sm:text-lg mb-4">Kandidat Saya</h2>
                        <button
                            class="w-full border border-white text-white font-semibold py-2 rounded-md mb-3 text-sm sm:text-base">
                            Lihat Kandidat
                        </button>
                        <button class="w-full bg-white text-black font-semibold py-2 rounded-md text-sm sm:text-base">
                            Cari Kandidat
                        </button>
                    </div>
                </div>
        @endif

        <div class="max-w-6xl mx-auto px-4 sm:px-6 py-12">
            <h2 class="text-center text-xl sm:text-2xl font-bold text-orange-600 mb-12">
                Tentang Area Kerja
            </h2>
            <div class="block lg:grid md:grid-cols-2 items-start gap-6">
                <img src="{{ asset('Icon/Illustration.png') }}" alt="Ilustrasi"
                    class="w-[220px] sm:w-[280px] lg:w-[320px] mx-auto lg:mx-0">
                <div class="block md:flex lg:flex gap-3 items-center mt-6 md:mt-0">
                    <div class="bg-orange-500 text-white p-4 sm:p-5 rounded-xl shadow-md mb-6">
                        <div class="flex gap-2">
                            <div>
                                <img src="{{ asset('image/logo_area_kerja_putih.png') }}" alt=""
                                    class="w-[60px] sm:w-[80px]">
                            </div>
                            <div>
                                <span class="text-xl sm:text-2xl font-bold">01</span>
                                <h3 class="font-bold text-sm sm:text-base mb-2">Mencari Lowongan</h3>
                            </div>
                        </div>
                        <p class="text-xs sm:text-sm leading-relaxed">
                            Area Kerja menyediakan platform bagi para pencari lowongan kerja sesuai keahlian.
                        </p>
                    </div>
                    <div class="flex flex-col gap-6">
                        <div class="border border-orange-500 p-4 sm:p-5 rounded-xl shadow-md flex flex-col justify-between">
                            <div class="flex gap-2">
                                <div>
                                    <img src="{{ asset('image/logo-areakerja.png') }}" alt=""
                                        class="w-[60px] sm:w-[80px]">
                                </div>
                                <div>
                                    <span class="text-xl sm:text-2xl text-orange-600 font-bold">02</span>
                                    <h3 class="font-bold text-orange-600 text-sm sm:text-base mb-2">Lowongan Terbaru</h3>
                                </div>
                            </div>
                            <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                                Area Kerja dapat menerima lowongan terbaru untuk mencakup berbagai macam bidang keahlian
                            </p>
                        </div>
                        <div class="border border-orange-500 p-4 sm:p-5 rounded-xl shadow-md flex flex-col justify-between">
                            <div class="flex gap-2">
                                <div>
                                    <img src="{{ asset('image/logo-areakerja.png') }}" alt=""
                                        class="w-[60px] sm:w-[80px]">
                                </div>
                                <div>
                                    <span class="text-xl sm:text-2xl text-orange-600 font-bold">03</span>
                                    <h3 class="font-bold text-orange-600 text-sm sm:text-base mb-2">Pasti Cocok</h3>
                                </div>
                            </div>
                            <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                                Pelamar merupakan orang yang sudah siap kerja secara mental dan keahlian berkat pelatihan
                                sebelumnya.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form id="transaksi" action="/dashboard/perusahaan/topup" method="POST">
        @csrf
        <div id="modalTopup" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
            <div class="bg-white rounded-2xl shadow-lg w-[400px] md:w-[500px] relative p-6">
                <div class="flex justify-between items-center border-b pb-2 mb-4">
                    <h2 class="text-lg font-semibold">Daftar Top Up</h2>
                    <button id="closeModal" class="text-gray-500 hover:text-gray-700">&times;</button>
                </div>
                <h3 class="text-center font-semibold mb-4">Top Up Koin</h3>
                <div class="grid grid-cols-3 gap-4" id="paket-wrapper">
                    @foreach ($data as $d)
                        @if ($d->id != 1)
                            <label
                                class="paket border rounded-xl shadow-sm text-center cursor-pointer hover:shadow-md transition block">
                                <input type="checkbox" name="id_koin" value="{{ $d->id }}" class="hidden" />
                                <div class="w-full flex justify-center py-2">
                                    <img src="{{ asset($d->icon) }}" alt="">
                                </div>
                                <p class="text-orange-500 font-bold text-lg mt-2">{{ $d->jumlah_koin }}</p>
                                <p class="bg-orange-500 text-white py-1 rounded-b-xl">Rp.
                                    {{ number_format($d->harga, 0, ',', '.') }}</p>
                            </label>
                        @endif
                    @endforeach
                </div>
                <div class="mt-6 text-center">
                    <button id="btn_pembayaran" type="button"
                        class="bg-orange-500 text-white font-semibold px-6 py-2 rounded-full hover:bg-orange-600">
                        Konfirmasi
                    </button>
                </div>
            </div>
        </div>
        <div id="modalPembayaran" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
            <div class="bg-white rounded-2xl shadow-lg w-[400px] md:w-[500px] relative p-6">
                <div class="flex justify-between items-center border-b pb-3 mb-4">
                    <h2 class="text-lg font-bold">Daftar Kandidat</h2>
                    <button id="closeModalPembayaran" class="text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
                </div>
                <h3 class="text-gray-700 font-semibold mb-2">Metode Pembayaran</h3>
                <div class="border rounded-lg px-4 py-2 flex items-center justify-between cursor-pointer mb-4">
                    <div class="flex items-center gap-2">
                        <span class="text-orange-500">⇄</span>
                        <span>Transfer Bank</span>
                    </div>
                    <span id="btn_list" class="text-gray-600 text-xl">⮟</span>

                </div>
                <div id="list_p" class="space-y-3 hidden">
                    @foreach ($payment as $p)
                        <div
                            class="flex items-center justify-between border rounded-lg px-3 py-2 cursor-pointer hover:bg-gray-50 select-bank">
                            <div class="flex items-center gap-3">
                                <img src="{{ asset($p->logo_img) }}" alt="" class="w-12 h-12">
                                <span>{{ $p->nama_bank }}</span>
                            </div>
                            <input type="radio" name="id_bank" value="{{ $p->id }}" required
                                class="w-5 h-5 border-2 border-orange-500 rounded-full cursor-pointer">
                        </div>
                    @endforeach
                    <div class="flex justify-between mt-6 text-sm font-semibold">

                        <button type="button" id="btn_kembali"
                            class="px-4 py-2 border border-orange-500 text-orange-500 rounded-lg hover:bg-orange-50 transition">
                            Kembali
                        </button>

                        <button type="submit" form="transaksi"
                            class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition">
                            Selanjutnya
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </form>
    </div>

    @if (session('success_topup'))
        <div id="modalKonfirmasi" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-2xl p-6 w-[450px] shadow-lg relative">
                <h2 class="text-lg font-bold mb-4">Konfirmasi Pembayaran</h2>
                <div class="border border-orange-500 rounded-xl p-4 space-y-2">
                    <p class="flex justify-between">
                        <span>No. Transaksi</span>
                        <span>{{ session('success_topup')['no_referensi'] }}</span>
                    </p>
                    <p class="flex justify-between">
                        <span>Nama Pengirim</span>
                        <span>{{ session('success_topup')['dari'] }}</span>
                    </p>
                    <p class="flex justify-between">
                        <span>Nama Penerima</span>
                        <span>Area Kerja</span>
                    </p>
                    <p class="flex justify-between">
                        <span>Metode Pembayaran</span>
                        <span class="bg-orange-500 text-white px-2 rounded">
                            {{ session('success_topup')['sumber_dana'] }}
                        </span>
                    </p>
                    <p class="flex justify-between">
                        <span>Jumlah Deposit</span>
                        <span>Rp. {{ number_format(session('success_topup')['total'] - 2000, 0, ',', '.') }}</span>
                    </p>
                    <p class="flex justify-between">
                        <span>Biaya Admin</span>
                        <span>Rp. 2.000</span>
                    </p>
                    <hr>
                    <p class="flex justify-between font-bold">
                        <span>Total Pembayaran</span>
                        <span>Rp. {{ number_format(session('success_topup')['total'], 0, ',', '.') }}</span>
                    </p>
                </div>
                <div>
                    <a href="/detail/pembayaran/{{ session('success_topup')['id'] }}"
                        class="mt-5 w-full flex justify-center my-5 bg-orange-500 text-white py-2 rounded-xl">Konfirmasi</a>

                </div>
            </div>
        </div>
    @endif



    <script>
        const btn_topup = document.getElementById("btn_topup");
        const modal_topup = document.getElementById("modalTopup");
        const closeModal = document.getElementById("closeModal");
        const paketItems = document.querySelectorAll('#paket-wrapper .paket');
        const btn_pembayaran = document.getElementById("btn_pembayaran");
        const modalPembayaran = document.getElementById("modalPembayaran");
        const btn_list = document.getElementById("btn_list");
        const list_pembayaran = document.getElementById("list_p");
        const closeModalPembayaran = document.getElementById("closeModalPembayaran");
        const btn_kembali = document.getElementById("btn_kembali");
        const form = document.getElementById("transaksi");

        btn_topup.addEventListener("click", () => {
            modal_topup.classList.remove('hidden');
            modal_topup.classList.add('flex');
        });

        closeModal.addEventListener("click", () => {
            modal_topup.classList.add('hidden');
            modal_topup.classList.remove('flex');
        });

        paketItems.forEach(item => {
            item.addEventListener('click', () => {
                paketItems.forEach(i => i.classList.remove('ring-2', 'ring-orange-500'));
                item.classList.add('ring-2', 'ring-orange-500');
            });
        });

        btn_pembayaran.addEventListener("click", () => {
            modalPembayaran.classList.remove("hidden");
            modalPembayaran.classList.add("flex");
            modal_topup.classList.add('hidden');
        });

        closeModalPembayaran.addEventListener("click", () => {
            modalPembayaran.classList.add("hidden");
            modalPembayaran.classList.remove("flex");
        });

        btn_kembali.addEventListener("click", () => {
            modalPembayaran.classList.add("hidden");
            modalPembayaran.classList.remove("flex");
            modal_topup.classList.remove("hidden");
            modal_topup.classList.add("flex");
        });

        btn_list.addEventListener("click", () => {
            list_pembayaran.classList.toggle("hidden");
        });

        // document.addEventListener("click", (e) => {
        //     const modal = document.getElementById("modalKonfirmasi");
        //     if (modal && e.target === modal) modal.remove();
        // });
    </script>
@endsection
