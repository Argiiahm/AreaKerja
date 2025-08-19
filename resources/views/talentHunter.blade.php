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
                <a href="#"
                    class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-2 rounded-md shadow-md">
                    Daftar
                </a>
            </div>
        </div>
    </section>
    <section class="bg-[#ffa70e] text-white rounded-b-[80px]">
        <div class="max-w-6xl mx-auto px-6 py-16 flex flex-col md:flex-row items-center gap-20">
            <div class="md:w-1/2 flex justify-center">
                <img src="{{ asset('image/3.png') }}" alt="" class="">
            </div>
            <div class="md:w-1/2">
                <h2 class="text-3xl font-bold mb-6">
                    Langkah - Langkah Daftar
                    Talent Hunter
                </h2>

                <div class="p-8">
                    <div class="relative border-l-2 border-white ml-6">
                        <div class="mb-8 ml-6">
                            <div class="absolute -left-3 w-6 h-6 bg-white rounded-full border-2 border-white"></div>
                            <p class="text-white">
                                Klik tombol daftar untuk mendaftarkan perusahaan anda
                            </p>
                        </div>

                        <div class="mb-8 ml-6">
                            <div class="absolute -left-3 w-6 h-6 bg-white rounded-full border-2 border-white"></div>
                            <p class="text-white">
                                Mengisi formulir pendaftaran dan kirim formulir pendaftaran
                            </p>
                        </div>

                        <div class="mb-8 ml-6">
                            <div class="absolute -left-3 w-6 h-6 bg-white rounded-full border-2 border-white"></div>
                            <p class="text-white">
                                Tunggu pemberitahuan selanjutnya setelah pendaftaran
                            </p>
                        </div>

                        <div class="ml-6">
                            <div class="absolute -left-3 w-6 h-6 bg-white rounded-full border-2 border-white"></div>
                            <p class="text-white">
                                Perusahaan berhasil didaftarkan
                            </p>
                        </div>
                    </div>
                </div>
 
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
                    <p class="text-orange-500 font-bold">
                        Mendapatkan kandidat sesuai kebutuhan perusahaan dan posisi yang ditujukan.
                    </p>
                </div>

                <div>
                    <div class="flex justify-center mb-4">
                        <img src="{{ asset('Icon/pc.png') }}" alt="">
                    </div>
                    <h3 class="font-bold text-lg mb-2">Siap Kerja</h3>
                    <p class="text-orange-500 font-bold">
                        Kandidat yang didapatkan dipastikan siap kerja dengan perusahaan yang direkomendasikan.
                    </p>
                </div>

                <div>
                    <div class="flex justify-center mb-4">
                        <img src="{{ asset('Icon/roket.png') }}" alt="">
                    </div>
                    <h3 class="font-bold text-lg mb-2">Memudahkan</h3>
                    <p class="text-orange-500 font-bold">
                        Mempermudah perusahaan dalam penyaringan kandidat.
                    </p>
                </div>

                <div>
                    <div class="flex justify-center mb-4">
                        <img src="{{ asset('Icon/roket.png') }}" alt="">
                    </div>
                    <h3 class="font-bold text-lg mb-2">Jaminan</h3>
                    <p class="text-orange-500 font-bold">
                        Jaminan ganti kandidat yang baru jika tidak cocok dengan spesifikasi perusahaan.
                    </p>
                </div>
            </div>
        </div>

    </section>
@endsection
