@extends('layouts.index')

@section('content')
    <div class="max-w-screen-xl mt-10 mx-auto px-6">
        <div class="pt-24 pb-8 flex items-end justify-between gap-4 flex-wrap">
            <div>
                <p class="text-xs font-bold tracking-wider uppercase text-orange-500 mb-1.5">Dashboard</p>
                <h1 class="text-3xl sm:text-4xl text-gray-400 leading-tight m-0">Selamat
                    Datang,<br> <span class="font-medium text-gray-500">
                        {{ Auth::user()->perusahaan->nama_perusahaan }}</h1>
                </span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-[1fr_340px] gap-5 items-start">
            <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden">
                <div class="flex items-center justify-between p-6 border-b border-gray-200">
                    <p class="text-base font-bold text-gray-900 m-0">Lowongan Saya</p>
                    <a href="/dashboard/perusahaan/lowongan"
                        class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl text-sm font-semibold cursor-pointer border-none transition-all duration-200 whitespace-nowrap no-underline bg-orange-500 text-white hover:bg-orange-600 hover:-translate-y-px">
                        + Tambah Lowongan
                    </a>
                </div>
                <div class="p-6">

                    @php $lowongans = Auth::user()->perusahaan->pasanglowongan; @endphp

                    @if ($lowongans->isNotEmpty())
                        @foreach ($lowongans as $datas)
                            @php $aktif = !empty($datas->paket_id); @endphp
                            <div
                                class="flex items-center justify-between gap-4 py-4 border-b border-gray-200 flex-wrap first:pt-0 last:border-b-0 last:pb-0">
                                <img src="{{ asset('storage/' . $datas->perusahaan->img_profile) }}" alt="Logo"
                                    class="w-12 h-12 rounded-xl object-cover border border-gray-200 flex-shrink-0">
                                <div class="flex-1 min-w-0">
                                    <p class="text-xs text-gray-600 m-0 mb-0.5">{{ $datas->perusahaan->nama_perusahaan }}
                                    </p>
                                    <p
                                        class="text-sm font-bold text-gray-900 m-0 mb-0.5 whitespace-nowrap overflow-hidden text-ellipsis">
                                        {{ $datas->nama }} – {{ $datas->jenis }}</p>
                                    <p class="text-xs text-gray-600 m-0 mb-1">{{ $datas->alamat }}</p>
                                    <span
                                        class="inline-block text-xs font-semibold bg-orange-50 text-orange-500 px-2 py-0.5 rounded-md">Rp
                                        {{ $datas->gaji_awal }} – Rp {{ $datas->gaji_akhir }} /
                                        bulan</span>
                                </div>
                                <div class="flex items-center gap-2 flex-shrink-0">
                                    @if ($aktif)
                                        <span
                                            class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-green-50 text-green-700 border border-green-200">{{ $datas->paket->nama }}</span>
                                        <button
                                            onclick="window.location='/dashboard/perusahaan/pelamar/{{ $datas->slug }}'"
                                            class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl text-sm font-semibold cursor-pointer border-none transition-all duration-200 whitespace-nowrap no-underline bg-orange-500 text-white hover:bg-orange-600 hover:-translate-y-px">
                                            Lihat Pelamar
                                        </button>
                                    @else
                                        <span
                                            class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-red-50 text-red-600 border border-red-200">Non
                                            Publish</span>
                                        <button onclick="window.location='/dashboard/perusahaan/lowongan'"
                                            class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl text-sm font-semibold cursor-pointer border border-gray-200 transition-all duration-200 whitespace-nowrap bg-gray-50 text-gray-600 hover:bg-gray-200">
                                            Publish disini
                                        </button>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="text-center p-10">
                            <svg width="48" height="48" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="text-slate-400 opacity-50 mx-auto mb-3">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414A1 1 0 0119 9.414V19a2 2 0 01-2 2z" />
                            </svg>
                            <p class="text-sm text-gray-600 m-0 mb-4">Belum ada lowongan yang dipasang.</p>
                            <a href="/dashboard/perusahaan/lowongan"
                                class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl text-sm font-semibold cursor-pointer border-none transition-all duration-200 whitespace-nowrap no-underline bg-orange-500 text-white hover:bg-orange-600 hover:-translate-y-px">Pasang
                                Lowongan Sekarang</a>
                        </div>
                    @endif

                </div>
            </div>
            <div class="flex flex-col gap-4">
                <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden">
                    <div class="flex items-center justify-between p-6 border-b border-gray-200">
                        <p class="text-base font-bold text-gray-900 m-0">Koin Saya</p>
                        <img src="{{ asset('Icon/coin perusahaan.png') }}" alt="coin" class="w-7 h-7">
                    </div>
                    <div class="p-6 pt-4">
                        <div
                            class="flex items-center justify-center gap-3 bg-orange-50 border border-orange-300 rounded-xl p-5 mb-4 text-center">
                            <div>
                                <div class="text-5xl font-extrabold text-orange-500 leading-none">{{ $totalSaldo }}</div>
                                <div class="text-xs text-gray-600 mt-0.5">koin tersedia</div>
                            </div>
                        </div>
                        <button id="btn_topup"
                            class="flex items-center justify-center gap-1.5 bg-transparent border-none text-green-500 text-sm font-semibold cursor-pointer p-0 w-full transition-opacity duration-200 hover:opacity-75">
                            <span
                                class="bg-green-500 text-white rounded-full w-4.5 h-4.5 flex items-center justify-center text-sm font-bold">+</span>
                            Top Up Koin
                        </button>
                    </div>
                </div>
                <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden">
                    <div class="flex items-center justify-between p-6 border-b border-gray-200">
                        <p class="text-base font-bold text-gray-900 m-0">Kandidat</p>
                    </div>
                    <div class="p-6 flex flex-col gap-2.5">
                        <button onclick="window.location='/dashboard/perusahaan/kandidat'"
                            class="inline-flex items-center justify-center gap-1.5 px-4 py-2.5 rounded-xl text-sm font-semibold cursor-pointer border border-orange-500 bg-transparent text-orange-500 w-full transition-all duration-200 hover:bg-orange-50">
                            Lihat Kandidat Saya
                        </button>
                        <button onclick="window.location='/dashboard/perusahaan/kandidatak'"
                            class="inline-flex items-center justify-center gap-1.5 px-4 py-2.5 rounded-xl text-sm font-semibold cursor-pointer border-none transition-all duration-200 whitespace-nowrap no-underline bg-orange-500 text-white hover:bg-orange-600 hover:-translate-y-px w-full">
                            Cari Kandidat Baru
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-24 relative overflow-hidden">
            {{-- Background Decor --}}
            <div class="absolute top-0 right-0 -z-10 w-64 h-64 bg-orange-50 rounded-full blur-3xl opacity-60"></div>
            <div class="absolute bottom-0 left-0 -z-10 w-96 h-96 bg-slate-100 rounded-full blur-3xl opacity-60"></div>

            <div class="max-w-7xl mx-auto px-4">
                {{-- Header --}}
                <div class="text-center mb-16">
                    <h2 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight">
                        Tentang <span class="text-orange-500 relative inline-block">
                            Area Kerja
                            <svg class="absolute -bottom-2 left-0 w-full" viewBox="0 0 100 10" preserveAspectRatio="none">
                                <path d="M0 5 Q 50 10 100 5" stroke="#f97316" stroke-width="4" fill="none"
                                    stroke-linecap="round" />
                            </svg>
                        </span>
                    </h2>
                    <p class="mt-6 text-slate-500 max-w-xl mx-auto font-medium">Platform ekosistem kerja terlengkap untuk
                        menghubungkan talenta terbaik dengan perusahaan impian.</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                    {{-- Illustration Side --}}
                    <div class="lg:col-span-4 hidden lg:block">
                        <div class="relative group">
                            <div
                                class="absolute inset-0 bg-orange-200 rounded-full blur-2xl opacity-20 group-hover:opacity-40 transition-opacity">
                            </div>
                            <img src="{{ asset('Icon/Illustration.png') }}" alt="Ilustrasi"
                                class="w-full relative z-10 animate-float drop-shadow-2xl">
                        </div>
                    </div>

                    {{-- Feature Cards Side --}}
                    <div class="lg:col-span-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div
                                class="md:row-span-2 group bg-orange-500 rounded-[2rem] p-8 shadow-xl shadow-orange-200 flex flex-col justify-between hover:-translate-y-2 transition-all duration-300">
                                <div>
                                    <div
                                        class="w-16 h-16 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center mb-6">
                                        <img src="{{ asset('image/logo_area_kerja_putih.png') }}" alt=""
                                            class="w-10">
                                    </div>
                                    <span class="text-5xl font-black text-white/30 block mb-4 tracking-tighter">01</span>
                                    <h3 class="text-2xl font-bold text-white mb-4">Mencari Lowongan</h3>
                                    <p class="text-orange-50 leading-relaxed">Platform cerdas yang dirancang khusus untuk
                                        mempercepat langkah Anda menemukan karir yang sesuai dengan passion dan keahlian
                                        teknis.</p>
                                </div>
                                <div class="mt-8">
                                    <span class="inline-flex items-center text-white font-bold text-sm">Pelajari lebih
                                        lanjut <span class="ml-2">→</span></span>
                                </div>
                            </div>
                            <div
                                class="bg-white rounded-[2rem] p-8 border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 group">
                                <div class="flex items-center gap-4 mb-6">
                                    <div
                                        class="w-12 h-12 bg-orange-50 rounded-xl flex items-center justify-center group-hover:bg-orange-500 transition-colors">
                                        <span class="text-xl font-bold text-orange-600 group-hover:text-white">02</span>
                                    </div>
                                    <h3 class="text-lg font-extrabold text-slate-800">Lowongan Terbaru</h3>
                                </div>
                                <p class="text-slate-500 text-sm leading-relaxed">Database terintegrasi yang mencakup
                                    ribuan lowongan dari berbagai sektor industri yang diperbarui setiap harinya.</p>
                            </div>
                            <div
                                class="bg-white rounded-[2rem] p-8 border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 group">
                                <div class="flex items-center gap-4 mb-6">
                                    <div
                                        class="w-12 h-12 bg-orange-50 rounded-xl flex items-center justify-center group-hover:bg-orange-500 transition-colors">
                                        <span class="text-xl font-bold text-orange-600 group-hover:text-white">03</span>
                                    </div>
                                    <h3 class="text-lg font-extrabold text-slate-800">Pasti Cocok</h3>
                                </div>
                                <p class="text-slate-500 text-sm leading-relaxed">Setiap pelamar dibekali dengan kurikulum
                                    pelatihan mental dan hardskill, memastikan kesiapan kerja sejak hari pertama.</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form id="transaksi" action="/dashboard/perusahaan/topup" method="POST">
        @csrf

        {{-- ---- MODAL: Pilih Paket ---- --}}
        <div id="modalTopup"
            class="fixed inset-0 bg-black/65 bg-opacity-45 backdrop-blur-sm hidden items-center justify-center z-50">
            <div class="bg-white rounded-2xl w-full max-w-lg p-7 shadow-xl animate-slideUp">
                <div class="flex justify-between items-center mb-5">
                    <h2 class="text-base font-bold text-gray-900 m-0">Top Up Koin</h2>
                    <button type="button"
                        class="bg-gray-50 border-none w-[30px] h-[30px] rounded-full cursor-pointer text-lg flex items-center justify-center text-gray-600 hover:bg-gray-200"
                        data-close="modalTopup">&times;</button>
                </div>
                <div class="grid grid-cols-3 gap-3" id="paket-wrapper">
                    @foreach ($data as $d)
                        @if ($d->id != 1)
                            <label
                                class="border-2 border-gray-200 rounded-xl text-center cursor-pointer overflow-hidden transition-colors duration-200 hover:border-orange-500 has-[input:checked]:border-orange-500 has-[input:checked]:shadow-ring">
                                <input type="radio" name="id_koin" value="{{ $d->id }}" class="hidden">
                                {{-- Changed to type="radio" --}}
                                <div class="p-3.5 flex justify-center">
                                    <img src="{{ asset($d->icon) }}" alt="" class="w-11 h-11 object-contain">
                                </div>
                                <div class="text-lg font-extrabold text-orange-500 px-2 pb-1">
                                    {{ $d->jumlah_koin }}
                                </div>
                                <div class="bg-orange-500 text-white text-xs font-semibold px-1.5 py-1.5">
                                    Rp {{ number_format($d->harga, 0, ',', '.') }}
                                </div>
                            </label>
                        @endif
                    @endforeach
                </div>
                <div class="mt-6 text-right">
                    <button type="button" id="btn_pembayaran"
                        class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl text-sm font-semibold cursor-pointer border-none transition-all duration-200 whitespace-nowrap no-underline bg-orange-500 text-white hover:bg-orange-600 hover:-translate-y-px">
                        Lanjut ke Pembayaran →
                    </button>
                </div>
            </div>
        </div>

        {{-- ---- MODAL: Metode Pembayaran ---- --}}
        <div id="modalPembayaran"
            class="fixed inset-0 bg-black/65 bg-opacity-45 backdrop-blur-sm hidden items-center justify-center z-50">
            <div class="bg-white rounded-2xl w-full max-w-lg p-7 shadow-xl animate-slideUp">
                <div class="flex justify-between items-center mb-5">
                    <h2 class="text-base font-bold text-gray-900 m-0">Metode Pembayaran</h2>
                    <button type="button"
                        class="bg-gray-50 border-none w-[30px] h-[30px] rounded-full cursor-pointer text-lg flex items-center justify-center text-gray-600 hover:bg-gray-200"
                        data-close="modalPembayaran">&times;</button>
                </div>
                <p class="text-sm text-gray-600 m-0 mb-4">Pilih bank untuk transfer</p>
                <div class="flex flex-col gap-2.5">
                    @foreach ($payment as $p)
                        <label
                            class="flex items-center justify-between border-[1.5px] border-gray-200 rounded-xl p-2.5 px-3.5 cursor-pointer transition-colors duration-200 hover:border-orange-500">
                            <div class="flex items-center gap-3">
                                <img src="{{ asset($p->logo_img) }}" alt="" class="w-12 h-12 object-contain">
                                <span class="text-sm font-semibold text-gray-900">{{ $p->nama_bank }}</span>
                            </div>
                            <input type="radio" name="id_bank" value="{{ $p->id }}" required
                                class="accent-orange-500 w-4.5 h-4.5">
                        </label>
                    @endforeach
                </div>
                <hr class="border-none border-t border-gray-200 my-4">
                <div class="flex justify-between">
                    <button type="button" id="btn_kembali"
                        class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl text-sm font-semibold cursor-pointer border border-gray-200 transition-all duration-200 whitespace-nowrap bg-gray-50 text-gray-600 hover:bg-gray-200">←
                        Kembali</button>
                    <button type="submit" form="transaksi"
                        class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl text-sm font-semibold cursor-pointer border-none transition-all duration-200 whitespace-nowrap no-underline bg-orange-500 text-white hover:bg-orange-600 hover:-translate-y-px">Konfirmasi
                        Pembayaran</button>
                </div>
            </div>
        </div>

    </form>

    {{-- ---- MODAL: Konfirmasi Transaksi (session) ---- --}}
    @if (session('success_topup'))
        <div id="modalKonfirmasi"
            class="fixed inset-0 bg-black/65 bg-opacity-45 backdrop-blur-sm flex items-center justify-center z-50">
            <div class="bg-white rounded-2xl w-full max-w-lg p-7 shadow-xl animate-slideUp">
                <div class="modal-header mb-5">
                    <h2 class="text-base font-bold text-gray-900 m-0">Konfirmasi Pembayaran</h2>
                </div>
                <div class="border-[1.5px] border-gray-200 rounded-xl p-1 px-4">
                    <div class="flex justify-between py-2 text-sm border-b border-gray-200">
                        <span>No. Transaksi</span>
                        <span class="font-semibold">{{ session('success_topup')['no_referensi'] }}</span>
                    </div>
                    <div class="flex justify-between py-2 text-sm border-b border-gray-200">
                        <span>Nama Pengirim</span>
                        <span class="font-semibold">{{ session('success_topup')['dari'] }}</span>
                    </div>
                    <div class="flex justify-between py-2 text-sm border-b border-gray-200">
                        <span>Nama Penerima</span>
                        <span class="font-semibold">Area Kerja</span>
                    </div>
                    <div class="flex justify-between py-2 text-sm border-b border-gray-200">
                        <span>Metode Pembayaran</span>
                        <span
                            class="bg-orange-500 text-white rounded-md px-2 py-0.5 text-xs">{{ session('success_topup')['sumber_dana'] }}</span>
                    </div>
                    <div class="flex justify-between py-2 text-sm border-b border-gray-200">
                        <span>Jumlah Deposit</span>
                        <span class="font-semibold">Rp
                            {{ number_format(session('success_topup')['total'] - 2000, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between py-2 text-sm">
                        <span>Biaya Admin</span>
                        <span class="font-semibold">Rp 2.000</span>
                    </div>
                    <div class="flex justify-between py-2 text-base font-extrabold total">
                        <span>Total Pembayaran</span>
                        <span>Rp {{ number_format(session('success_topup')['total'], 0, ',', '.') }}</span>
                    </div>
                </div>
                <a href="/detail/pembayaran/{{ session('success_topup')['id'] }}"
                    class="inline-flex items-center justify-center gap-1.5 px-4 py-2.5 rounded-xl text-sm font-semibold cursor-pointer border-none transition-all duration-200 whitespace-nowrap no-underline bg-orange-500 text-white hover:bg-orange-600 hover:-translate-y-px w-full mt-5">
                    Konfirmasi & Lanjutkan
                </a>
            </div>
        </div>
    @endif

    <script>
        // ---- Helpers ----
        const $ = id => document.getElementById(id);
        const openModal = id => {
            const modal = $(id);
            if (modal) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            }
        };
        const closeModal = id => {
            const modal = $(id);
            if (modal) {
                modal.classList.remove('flex');
                modal.classList.add('hidden');
            }
        };

        // ---- Close buttons (data-close) ----
        document.querySelectorAll('[data-close]').forEach(btn => {
            btn.addEventListener('click', () => closeModal(btn.dataset.close));
        });

        // ---- Top Up ----
        $('btn_topup').addEventListener('click', () => openModal('modalTopup'));

        // ---- Lanjut ke pembayaran ----
        $('btn_pembayaran').addEventListener('click', () => {
            const selectedPackage = document.querySelector('#paket-wrapper input[name="id_koin"]:checked');
            if (!selectedPackage) {
                alert('Silakan pilih paket koin terlebih dahulu.');
                return;
            }
            closeModal('modalTopup');
            openModal('modalPembayaran');
        });

        // ---- Kembali ----
        $('btn_kembali').addEventListener('click', () => {
            closeModal('modalPembayaran');
            openModal('modalTopup');
        });

        // ---- Close on overlay click ----
        document.querySelectorAll('.fixed.inset-0.bg-black.bg-opacity-45').forEach(overlay => {
            overlay.addEventListener('click', e => {
                if (e.target === overlay) {
                    closeModal(overlay.id);
                }
            });
        });

        // Handle case where modalKonfirmasi is open on page load due to session
        document.addEventListener('DOMContentLoaded', () => {
            const modalKonfirmasi = document.getElementById('modalKonfirmasi');
            if (modalKonfirmasi && modalKonfirmasi.classList.contains('flex')) {
                // Modal konfirmasi sudah terbuka, biarkan saja
            }
        });
    </script>

@endsection
