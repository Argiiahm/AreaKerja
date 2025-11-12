@extends('layouts.index')

@section('content')
    <section class="relative w-full h-screen pt-24">
        <div class="absolute inset-0">
            <img src="https://png.pngtree.com/background/20240507/original/pngtree-digital-marketing-website-displayed-on-rendered-office-desktop-picture-image_8837781.jpg"
                alt="Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-60"></div>
        </div>

        <div class="relative z-10 flex items-center justify-start h-full px-10 lg:px-20 md:px-20">
            <div class="max-w-lg">
                <h1 class="text-6xl font-bold text-white mb-4">Talent Hunter</h1>
                <p class="text-white text-lg mb-6">
                    Daftarkan perusahaan anda dan biar kami<br>
                    yang mencarikan kandidat yang cocok untuk anda
                </p>
                @if (Auth::check() && Auth::user()->role === 'perusahaan')
                    <button type="button" onclick="modalDetails()"
                        class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-2 rounded-md shadow-md">
                        Daftar
                    </button>
                @elseif (Auth::check() && Auth::user()->role !== 'perusahaan')
                    <button type="button"
                        class="inline-block cursor-no-drop bg-zinc-500 hover:bg-zinc-600 text-white font-semibold px-6 py-2 rounded-md shadow-md">
                        Daftar
                    </button>
                @else
                    <button type="button" onclick="window.location='/login'"
                        class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-2 rounded-md shadow-md">
                        Daftar
                    </button>
                @endif
            </div>
        </div>
    </section>

    <section class="bg-[#ffa70e] text-white rounded-b-[80px]">
        <div class="max-w-6xl mx-auto px-6 py-16 flex flex-col md:flex-row items-center gap-20">
            <div class="md:w-1/2 flex justify-center">
                <img src="{{ asset('image/3.png') }}" alt="">
            </div>
            <div class="md:w-1/2">
                <h2 class="text-3xl font-bold mb-6">Langkah - Langkah Daftar Talent Hunter</h2>
                <ul class="space-y-4 border-l-2 border-white pl-6">
                    <li class="relative">
                        <div class="absolute -left-3 w-6 h-6 bg-white rounded-full border-2 border-white"></div>
                        Klik tombol daftar untuk mendaftarkan perusahaan anda
                    </li>
                    <li class="relative">
                        <div class="absolute -left-3 w-6 h-6 bg-white rounded-full border-2 border-white"></div>
                        Isi formulir pendaftaran dan kirim
                    </li>
                    <li class="relative">
                        <div class="absolute -left-3 w-6 h-6 bg-white rounded-full border-2 border-white"></div>
                        Tunggu pemberitahuan selanjutnya
                    </li>
                    <li class="relative">
                        <div class="absolute -left-3 w-6 h-6 bg-white rounded-full border-2 border-white"></div>
                        Perusahaan berhasil didaftarkan
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section>
        <div class="bg-white py-12 px-6 text-center">
            <h2 class="text-3xl font-bold text-orange-500 mb-2">Benefit Talent Hunter</h2>
            <div class="w-40 h-1 bg-orange-500 rounded mx-auto mb-12"></div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 max-w-4xl mx-auto text-orange-500">
                <div>
                    <div class="flex justify-center mb-4">
                        <img src="{{ asset('Icon/Kandidat.png') }}" alt="">
                    </div>
                    <h3 class="font-bold text-lg mb-2">Kandidat</h3>
                    <p class="font-bold">Mendapatkan kandidat sesuai kebutuhan perusahaan.</p>
                </div>
                <div>
                    <div class="flex justify-center mb-4">
                        <img src="{{ asset('Icon/pc.png') }}" alt="">
                    </div>
                    <h3 class="font-bold text-lg mb-2">Siap Kerja</h3>
                    <p class="font-bold">Kandidat yang direkomendasikan sudah siap bekerja.</p>
                </div>
            </div>
        </div>

        @if (Auth::check() && Auth::user()->role === 'perusahaan')
            <div id="modalbeli"
                class="hidden fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white w-full max-w-md p-8 relative mx-10 shadow-lg rounded-lg">
                    <button onclick="closeDetail()"
                        class="absolute top-3 right-4 text-gray-400 hover:text-gray-700 text-2xl">&times;</button>
                    <h2 class="text-xl font-bold text-center mb-10">Talent Hunter</h2>

                    <form action="/beli/talenthunter" method="POST">
                        @csrf
                        <div class="flex justify-between border-b border-dashed pb-2">
                            <span>Nama Paket</span>
                            <input type="text" disabled class="font-medium border-none bg-transparent text-right"
                                value="{{ $harga->nama }}">
                        </div>
                        <div class="flex justify-between border-b border-dashed pt-2 pb-2">
                            <span>Harga</span>
                            <input type="text" disabled
                                class="bg-orange-500 text-white text-center text-xs px-3 py-1 rounded-full"
                                value="{{ $harga->harga }}">
                        </div>

                        <div class="flex justify-between items-center border-b border-dashed pt-2 pb-2">
                            <div class="flex items-center gap-2">
                                <span class="text-sm font-medium">Saldo Koin Anda</span>
                                <span class="bg-orange-500 text-white text-xs px-3 py-1 rounded-full">
                                    {{ $totalKoin }}
                                </span>
                            </div>

                            <div class="flex items-center gap-1">
                                @if ($totalKoin < $harga->harga)
                                    <input type="checkbox" disabled class="accent-orange-500">
                                    <label class="text-gray-600 text-sm select-none">Saldo Tidak Cukup</label>
                                @else
                                    <input type="checkbox" checked class="accent-orange-500">
                                    <label class="text-gray-600 text-sm select-none">Saldo Cukup</label>
                                @endif
                            </div>
                        </div>

                        <button id="btnBeli" type="submit"
                            class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded w-full mt-4 font-semibold transition disabled:bg-orange-200 disabled:cursor-not-allowed"
                            @if ($totalKoin < $harga->harga) disabled @endif>
                            Beli
                        </button>
                    </form>
                </div>
            </div>
        @endif


        @if (Auth::check() && Auth::user()->role === 'perusahaan')
            <div id="modalFormPerusahaan"
                class="hidden fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex items-center justify-center z-50">
                <div
                    class="bg-white w-full max-w-lg p-8 relative mx-4 sm:mx-6 md:mx-10 shadow-2xl rounded-2xl border border-gray-100">
                    <h2 class="text-2xl font-bold text-center text-gray-800 mb-8">
                        Form Pendaftaran <span class="text-orange-500">Talent Hunter</span>
                    </h2>

                    <form action="/form/talenthunter" method="POST" class="space-y-5">
                        @csrf
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Perusahaan</label>
                            <input type="text" name="nama_perusahaan" required
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400"
                                value="{{ Auth::user()->perusahaan->nama_perusahaan }}">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Alamat</label>
                            <input type="text" name="alamat" required
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Posisi</label>
                            <input type="text" name="posisi" required
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Pengalaman Kerja</label>
                            <textarea name="pengalaman_kerja" rows="3" required
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 resize-none"></textarea>
                        </div>

                        <div class="flex gap-2">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Gaji Awal</label>
                                <input type="number" name="gaji_awal" required
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Gaji Akhir</label>
                                <input type="number" name="gaji_akhir" required
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Gender</label>
                            <div class="flex gap-6">
                                <label class="flex items-center gap-2 cursor-pointer ">
                                    <input type="radio" name="gender" value="Laki-laki" required
                                        class="text-orange-500 focus:ring-orange-400 border">
                                    <span>Laki-laki</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="gender" value="Perempuan"
                                        class="text-orange-500 focus:ring-orange-400 border">
                                    <span>Perempuan</span>
                                </label>
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 rounded-lg mt-4 shadow-md transition">
                            Kirim Formulir
                        </button>
                    </form>
                </div>
            </div>
        @endif
    </section>

    <script>
        function modalDetails() {
            document.getElementById("modalbeli").classList.remove("hidden");
        }

        function closeDetail() {
            document.getElementById("modalbeli").classList.add("hidden");
        }
    </script>

    @if (session('showModalForm'))
        <script>
            window.addEventListener('DOMContentLoaded', function() {
                document.getElementById("modalFormPerusahaan").classList.remove("hidden");
            });
        </script>
    @endif

    @if (session('error'))
        <div class="fixed top-5 right-5 bg-red-500 text-white px-4 py-2 rounded-lg shadow-md z-50">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded-lg shadow-md z-50">
            {{ session('success') }}
        </div>
    @endif
@endsection
