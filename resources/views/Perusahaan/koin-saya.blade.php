@extends('layouts.index')

@section('content')
    <style>
        .package-card {
            background: linear-gradient(180deg, #ffffff 0%, #fffaf8 100%);
            border-radius: 12px;
            box-shadow:
                0 6px 18px rgba(0, 0, 0, 0.06),
                0 1px 0 rgba(255, 255, 255, 0.6) inset;
            transition: transform 200ms ease, box-shadow 200ms ease, border-color 200ms ease;
            border: 1px solid rgba(0, 0, 0, 0.03);
            overflow: visible;
        }

        .coin-wrap {
            background: radial-gradient(circle at 30% 20%, rgba(255, 198, 120, 0.12), transparent 30%);
            width: 52px;
            height: 52px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 9999px;
        }

        .coin-wrap svg {
            filter: drop-shadow(0 6px 18px rgba(249, 115, 22, 0.06));
        }

        .price-pill {
            background: linear-gradient(90deg, #f97316 0%, #f59e0b 100%);
            color: #fff;
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.15);
            display: inline-block;
        }

        .shadow-populer {
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
            transform: translateY(2px);
        }

        .shadow-check {
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.08);
        }

        .package-card:hover {
            transform: translateY(-8px);
            box-shadow:
                0 20px 40px rgba(245, 126, 34, 0.10),
                0 6px 18px rgba(0, 0, 0, 0.06);
        }

        .package-card.selected {
            border: 3px solid rgba(249, 115, 22, 0.98);
            box-shadow:
                0 28px 60px rgba(249, 115, 22, 0.10),
                0 8px 20px rgba(0, 0, 0, 0.08);
            transform: translateY(-10px);
        }

        .package-card.selected .check-wrapper {
            opacity: 1;
            transform: scale(1);
            pointer-events: auto;
        }

        .package-card .check-wrapper {
            opacity: 0;
            transform: scale(0.85);
            pointer-events: none;
        }

        .confirm-btn {
            z-index: 10;
            background-image: linear-gradient(90deg, #f97316 0%, #f59e0b 100%);
            color: #fff !important;
            box-shadow: 0 8px 24px rgba(245, 126, 34, 0.18);
        }

        @media (min-width:1024px) {
            .package-card {
                height: 13.5rem;
            }
        }
    </style>
    <div
        class="mt-16 min-h-screen bg-[radial-gradient(ellipse_at_top_left,_var(--tw-gradient-stops))] from-[rgba(255,245,235,0.6)] to-[rgba(255,255,245,0.9)] flex items-start justify-center py-16">
        <form id="transaksi" action="/dashboard/perusahaan/topup" method="POST">
            @csrf
            <div class="w-full max-w-5xl px-6">

                <div class="flex flex-col items-center">
                    <div class="flex items-center justify-center h-16 w-16 rounded-full bg-white shadow-sm mb-4">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none">
                            <circle cx="8" cy="8" r="3" stroke="#F59E0B" stroke-width="1.5" />
                            <circle cx="16" cy="12" r="3" stroke="#F59E0B" stroke-width="1.5" />
                        </svg>
                    </div>
                    <h1 class="text-3xl font-semibold text-gray-800">Top Up Koin Areakerja</h1>
                    <p class="text-sm text-gray-500 mt-2">Pilih paket koin yang sesuai dengan kebutuhan Anda</p>
                </div>

                <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 justify-items-center">
                    @foreach ($HargaKoin as $k)
                        @if ($k->id != 1)
                            <div data-id="{{ $k->id }}"
                                class="package-card relative w-64 h-52 rounded-xl p-6 flex flex-col items-center justify-between transition-all focus:outline-none select-none">
                                @if (in_array($k->id, [3, 6]))
                                    <div
                                        class="absolute -top-2 right-3 bg-orange-500 text-white text-xs font-semibold px-2 py-1 rounded-full shadow-populer">
                                        Populer
                                    </div>
                                @endif
                                <div
                                    class="absolute top-3 left-3 check-wrapper opacity-0 pointer-events-none transition-all duration-200">
                                    <div
                                        class="h-6 w-6 rounded-full bg-orange-500 flex items-center justify-center ring-2 ring-white shadow-check">
                                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none">
                                            <path d="M5 13l4 4L19 7" stroke="#ffffff" stroke-width="2.2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </div>

                                <div class="flex flex-col items-center mt-1">
                                    <div class="coin-wrap p-2 rounded-full mb-2">
                                        <img src="{{ asset($k->icon) }}" alt="">
                                    </div>
                                    <input type="radio" name="id_koin" value="{{ $k->id }}" class="hidden" />
                                    <div class="text-2xl font-extrabold text-orange-600 leading-none tracking-tight">
                                        {{ $k->jumlah_koin }}
                                    </div>
                                    <div class="text-xs text-gray-400 mt-1">Koin</div>
                                </div>

                                <!-- Price -->
                                <div class="w-full mt-3">
                                    <div
                                        class="price-pill w-full inline-block text-center font-semibold text-sm rounded-full py-2 px-4">
                                        Rp. {{ number_format($k->harga, 0, ',', '.') }}
                                    </div>
                                </div>

                            </div>
                        @endif
                    @endforeach
                </div>

                <div class="flex justify-center mt-10">
                    <button id="btn_pembayaran" type="button"
                        class="confirm-btn px-8 py-3 rounded-full bg-gradient-to-r from-orange-400 to-orange-500 text-white font-semibold shadow-lg hover:scale-105 transition-transform">
                        Konfirmasi
                    </button>
                </div>
                <div id="modalPembayaran"
                    class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
                    <div class="bg-white rounded-2xl shadow-lg w-[400px] md:w-[500px] relative p-6">
                        <div class="flex justify-between items-center border-b pb-3 mb-4">
                            <h2 class="text-lg font-bold">Daftar Kandidat</h2>
                            <button id="closeModalPembayaran"
                                class="text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
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

        <div class="mt-10 max-w-3xl mx-auto">
            <div class="bg-white/70 backdrop-blur-sm border border-orange-100 rounded-xl p-5 shadow-sm text-center">
                <p class="font-semibold text-gray-700 text-sm mb-2">Ketentuan & Persyaratan</p>

                <ul class="text-gray-500 text-xs leading-relaxed space-y-1 inline-block text-left">
                    <li>• Pembelian koin bersifat final dan tidak dapat dikembalikan.</li>
                    <li>• Pastikan paket koin yang dipilih sudah sesuai sebelum melakukan konfirmasi.</li>
                    <li>• Koin akan otomatis ditambahkan ke akun Anda setelah pembayaran berhasil.</li>
                    <li>• Dengan melanjutkan proses, Anda menyetujui semua syarat penggunaan.</li>
                </ul>
            </div>
        </div>
    </div>
    </div>



    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const cards = document.querySelectorAll('.package-card');
            let selected = null;

            function clearAll() {
                cards.forEach(x => {
                    x.classList.remove('selected');
                    x.setAttribute('aria-pressed', 'false');
                    const chk = x.querySelector('.check-wrapper');
                    if (chk) {
                        chk.classList.add('opacity-0');
                        chk.style.transform = 'scale(0.85)';
                    }
                });
            }

            cards.forEach(c => {
                const chk = c.querySelector('.check-wrapper');
                if (chk) {
                    chk.classList.add('opacity-0');
                    chk.style.transform = 'scale(0.85)';
                }

                c.setAttribute('tabindex', '0');

                c.addEventListener('click', () => {
                    clearAll();
                    c.classList.add('selected');
                    c.setAttribute('aria-pressed', 'true');
                    const check = c.querySelector('.check-wrapper');
                    if (check) {
                        check.classList.remove('opacity-0');
                        check.style.transform = 'scale(1)';
                    }
                    selected = c.getAttribute('data-id');

                    const radio = c.querySelector('input[name="id_koin"]');
                    if (radio) radio.checked = true;

                    const hiddenInput = document.getElementById('selected_package_id');
                    if (hiddenInput) hiddenInput.value = selected;

                });

                c.addEventListener('keydown', (e) => {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        c.click();
                    }
                });
            });

            const btnPembayaran = document.getElementById('btn_pembayaran');
            const modalPembayaran = document.getElementById('modalPembayaran');
            const btnList = document.getElementById('btn_list');
            const listPembayaran = document.getElementById('list_p');
            const closeModalPembayaran = document.getElementById('closeModalPembayaran');
            const btnKembali = document.getElementById('btn_kembali');

            if (btnPembayaran && modalPembayaran) {
                btnPembayaran.addEventListener('click', () => {
                    modalPembayaran.classList.remove('hidden');
                    modalPembayaran.classList.add('flex');
                });
            }

            if (closeModalPembayaran && modalPembayaran) {
                closeModalPembayaran.addEventListener('click', () => {
                    modalPembayaran.classList.add('hidden');
                    modalPembayaran.classList.remove('flex');
                });
            }

            if (btnKembali && modalPembayaran) {
                btnKembali.addEventListener('click', () => {
                    modalPembayaran.classList.add('hidden');
                    modalPembayaran.classList.remove('flex');
                });
            }

            if (btnList && listPembayaran) {
                btnList.addEventListener('click', () => {
                    listPembayaran.classList.toggle('hidden');
                });
            }

            document.querySelectorAll('.select-bank').forEach(bankDiv => {
                bankDiv.addEventListener('click', (e) => {
                    const radio = bankDiv.querySelector('input[type="radio"]');
                    if (radio) radio.checked = true;
                });
            });


        });
    </script>
@endsection
