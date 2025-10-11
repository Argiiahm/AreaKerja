@extends('layouts.index')
@section('content')
    <div class="font-sans mt-24">

        <section class="bg-white px-6 ml-0 lg:ml-20 py-12 flex flex-col md:flex-row items-center justify-between">
            <div class="md:w-1/2 space-y-4">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800">
                    Berlangganan Bersama Kami <br> Menjadi Yang Terdepan
                </h2>
                <p class="text-gray-600">
                    Jangan lewatkan kesempatan untuk selalu mendapatkan penawaran menarik dengan berlangganan.
                </p>
                <div>
                    <a href="#b" class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2 rounded-lg">
                        Berlangganan
                    </a>
                </div>
            </div>
            <div class="md:w-1/2 mt-8 md:mt-0 flex justify-center">
                <img src="{{ asset('image/Meeting.png') }}" alt="Illustrasi" class="w-96">
            </div>
        </section>

        <section class="bg-orange-500 py-12 text-white">
            <h3 class="text-center text-xl md:text-2xl font-semibold mb-10">
                Benefit Berlangganan Di AreaKerja
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto text-center">
                <div class="flex flex-col items-center space-y-2">
                    <div class="text-4xl">🌐</div>
                    <p>Di undang ke dalam event yang diadakan oleh AreaKerja</p>
                </div>
                <div class="flex flex-col items-center space-y-2">
                    <div class="text-4xl">💬</div>
                    <p>Konsultasi Lifetime dalam mencari pekerjaan</p>
                </div>
            </div>
        </section>

        <section id="b" class="px-6 py-12 flex justify-center">
            <div
                class="border-2 border-orange-500 rounded-lg p-8 max-w-3xl flex flex-col md:flex-row items-center space-y-6 md:space-y-0 md:space-x-8">
                <div class="md:w-1/2 space-y-4">
                    <h3 class="text-xl font-semibold text-gray-800">
                        Berlangganan Bersama Kami
                    </h3>
                    <p class="text-gray-600">
                        Dan Anda akan mendapatkan benefit yang sangat bermanfaat untuk perusahaan anda.
                    </p>
                    <p class="text-gray-800 font-medium flex">
                        Hanya dengan <span class="text-orange-500 px-2 font-bold flex items-center">
                            <img class="w-10" src="{{ asset('Icon/coin perusahaan.png') }}" alt=""> 1.000
                        </span> per Tahun
                    </p>
                    @if ($sudahBeli && Auth::user()->perusahaan->is_berlangganan === 0)
                        <button 
                            class="bg-orange-300 cursor-no-drop text-white px-5 py-2 rounded-lg">
                            Mohon Menunggu!
                        </button>
                    @else
                        <button onclick="openModal()"
                            class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2 rounded-lg">
                            Berlangganan
                        </button>
                    @endif
                </div>
                <div class="md:w-1/2 flex justify-center">
                    <img src="{{ asset('image/Feedback.png') }}" alt="Ilustrasi Harga" class="w-72">
                </div>
            </div>
        </section>

        <div id="modalLangganan" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
            <div class="bg-white w-full max-w-md rounded-lg p-6 relative shadow-lg">
                <button onclick="closeModal()"
                    class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 text-2xl font-bold">
                    &times;
                </button>

                <h3 class="text-xl font-semibold text-gray-800 mb-6">
                    Pembayaran
                </h3>

                <div class="border-2 border-orange-500 rounded-lg flex items-center justify-between p-4 mb-4">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('Icon/coin perusahaan.png') }}" alt="Koin" class="w-12">
                        <span class="text-2xl font-bold text-orange-500">1.000</span>
                    </div>
                    <span class="text-gray-600 font-medium">Berlangganan</span>
                </div>

                <div class="flex justify-between text-sm mb-6">
                    <span class="text-gray-600">Tagihan Tahunan</span>
                    <span class="font-semibold text-gray-800">1000 Koin</span>
                </div>

                <div class="flex items-center justify-between mb-6">
                    <div>
                        <span class="font-semibold text-gray-500">Koin Saya:</span>
                        <div class="flex items-center gap-3 border-2 border-orange-500 rounded-lg px-4 py-2">
                            <img src="{{ asset('Icon/coin perusahaan.png') }}" alt="Koin" class="w-10">
                            <span class="text-lg font-bold text-orange-500">{{ $totalSaldo }}</span>
                        </div>
                    </div>
                    <a href="/dashboard/perusahaan"
                        class="text-green-600 text-sm font-semibold flex items-center gap-1 hover:underline">
                        <span class="text-lg">+</span> Top Up Koin
                    </a>
                </div>

                <div class="flex justify-end">
                    <form action="/berlangganan/bayar" method="POST">
                        @csrf
                        @if ($totalSaldo < 100)
                            <p class="text-red-400 font-normal">Koin Anda Tidak Cukup</p>
                            <button type="button"
                                class="bg-zinc-500 cursor-no-drop hover:bg-zinc-600 text-white font-semibold px-6 py-2 rounded-lg transition">
                                Bayar
                            </button>
                        @else
                            <input type="number" hidden name="total" value="{{ $harga->harga }}">
                            <button type="submit"
                                class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-2 rounded-lg transition">
                                Bayar
                            </button>
                        @endif
                    </form>
                </div>
            </div>
        </div>

        @if (session('success'))
            <div id="popup" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                <div class="bg-white rounded-lg shadow-xl w-[420px] text-center overflow-hidden">
                    <div class="bg-orange-500 text-white p-3">
                        <h2 class="font-semibold text-lg">Pembayaran Sukses</h2>
                    </div>

                    <div class="p-6 space-y-5">
                        <img class="w-14 mx-auto" src="{{ asset('Icon/ceklis.png') }}" alt="Ceklis">
                        <p class="text-gray-800 text-base">
                            Pembayaran dengan <b>areakerja.com</b> sukses
                        </p>

                        <div class="mt-4 bg-gray-100 p-3 rounded-md flex justify-between items-center">
                            <div class="text-left">
                                <p class="text-sm text-gray-600">Kirim bukti pembayaran ke email</p>
                                <p class="text-sm font-semibold text-gray-800">
                                    seveninc@gmail.com
                                </p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" checked class="sr-only peer">
                                <div
                                    class="w-16 h-5 bg-gray-300 rounded-full peer peer-checked:bg-orange-500 transition-colors duration-200">
                                </div>
                                <div
                                    class="absolute left-1 top-1 w-3.5 h-3.5 bg-white rounded-full transition-transform duration-200 peer-checked:translate-x-5">
                                </div>
                            </label>
                        </div>

                        <button onclick="window.location.href='/dashboard/perusahaan/berlangganan/kirim/email'"
                            class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-md w-full transition-colors duration-200">
                            Selesai
                        </button>
                    </div>
                </div>
            </div>
        @endif

        @if (session('success_email'))
            <div id="popup" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                <div class="bg-white rounded-lg shadow-xl w-[420px] text-center overflow-hidden">
                    <div class="bg-orange-500 text-white p-3">
                        <h2 class="font-semibold text-lg">Pembayaran Sukses</h2>
                    </div>

                    <div class="p-6 space-y-5">
                        <img class="w-14 mx-auto" src="{{ asset('Icon/ceklis.png') }}" alt="Ceklis">
                        <p class="text-gray-800 text-base">
                            Permintaan Panggilan anda sudah terkirim
                            Mohon tunggu 1/24 Jam untuk kami hubungi
                        </p>

                        <button onclick="document.getElementById('popup').classList.add('hidden')"
                            class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-md w-full transition-colors duration-200">
                            Selesai
                        </button>
                    </div>
                </div>
            </div>
        @endif



        <script>
            function openModal() {
                document.getElementById('modalLangganan').classList.remove('hidden');
            }

            function closeModal() {
                document.getElementById('modalLangganan').classList.add('hidden');
            }
        </script>
    @endsection
