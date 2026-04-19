@extends('layouts.index')

@section('content')
    <section class="container max-w-screen-lg mx-auto pt-40 pb-20">
        <h2 class="text-2xl font-bold text-gray-900 mb-8 mx-5 lg:mx-0 flex items-center gap-2">
            <i class="ph ph-question text-orange-500"></i> Frequently Asked Questions
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mx-5 lg:mx-0">
            <div class="space-y-8">
                {{-- FAQ 1 --}}
                <div>
                    <h3 class="font-bold text-gray-800 flex items-center gap-2">
                        <span class="text-orange-500">01.</span> Bagaimana Melamar Pekerjaan di Area Kerja?
                    </h3>
                    <p class="text-gray-600 text-sm mt-3 leading-relaxed">
                        Cukup cari lowongan yang sesuai dengan minat dan kualifikasi Anda di halaman utama. Klik tombol
                        <strong>"Lamar Sekarang"</strong>, lengkapi profil Anda, dan unggah CV terbaru. Anda juga bisa
                        memantau status lamaran secara langsung melalui dashboard akun pelamar.
                    </p>
                </div>

                {{-- FAQ 2 --}}
                <div>
                    <h3 class="font-bold text-gray-800 flex items-center gap-2">
                        <span class="text-orange-500">02.</span> Apa itu kandidat Area Kerja?
                    </h3>
                    <p class="text-gray-600 text-sm mt-3 leading-relaxed">
                        Kandidat Area Kerja adalah fitur eksklusif bagi pelamar yang telah melengkapi profil dan
                        diverifikasi oleh sistem. Menjadi kandidat terpilih memungkinkan profil Anda
                        <strong>direkomendasikan langsung</strong> kepada perusahaan-perusahaan besar yang sedang mencari
                        tenaga kerja spesifik.
                    </p>
                </div>
            </div>

            <div class="space-y-8">
                {{-- FAQ 3 --}}
                <div>
                    <h3 class="font-bold text-gray-800 flex items-center gap-2">
                        <span class="text-orange-500">03.</span> Apa itu Area Kerja?
                    </h3>
                    <p class="text-gray-600 text-sm mt-3 leading-relaxed">
                        Area Kerja adalah platform penyedia informasi lowongan kerja terpercaya di Indonesia. Kami
                        menghubungkan jutaan pencari kerja dengan perusahaan impian, mulai dari tingkat UMKM hingga
                        korporasi besar, dengan fokus pada kemudahan akses dan transparansi proses rekrutmen.
                    </p>
                </div>

                {{-- FAQ 4 --}}
                <div>
                    <h3 class="font-bold text-gray-800 flex items-center gap-2">
                        <span class="text-orange-500">04.</span> Apakah layanan Areakerja.com berbayar?
                    </h3>
                    <p class="text-gray-600 text-sm mt-3 leading-relaxed">
                        Bagi pencari kerja, layanan dasar untuk melamar pekerjaan di Areakerja.com adalah
                        <strong>Gratis</strong>. Namun, kami juga menyediakan layanan premium bagi perusahaan yang ingin
                        memperluas jangkauan iklan lowongan atau bagi pelamar yang ingin meningkatkan visibilitas profil
                        mereka di mata rekruter.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
