@extends('layouts.index')
@section('content')
    @php
        $nomorWA = '6287874732189';
        $pesan =
            'Halo admin, saya ingin Mencari Nama Pekerja.%0A' .
            'Nama Perusahaan: ' .
            Auth::user()->perusahaan->nama_perusahaan .
            '%0A' .
            'Email: ' .
            Auth::user()->email .
            '%0A' .
            'Terima kasih.';
    @endphp

    <div class="mt-24 md:mt-36 lg:mt-24">
        <section class="max-w-5xl mx-auto px-6 py-8">
            <div class="flex justify-center items-center mb-8">
                <h2 class="bg-orange-500 text-white px-6 py-2 rounded-full font-semibold text-sm">
                    Cari Nama Pekerja
                </h2>
                <div></div>
            </div>

            <div class="mb-6">
                <h3 class="text-xl font-semibold mb-2">Cari Nama Pekerja</h3>
                <p class="text-gray-700 leading-relaxed">
                    Halaman ini dibuat untuk membantu perusahaan dalam mencari nama pekerja dan memeriksa riwayat atau
                    informasi terkait karyawan tersebut. Dengan mengklik tombol ‘request’, Anda dapat mengajukan permintaan
                    untuk menerima data tersebut melalui WhatsApp atau aplikasi pilihan lainnya. Fitur ini memberikan
                    informasi penting yang dapat mendukung proses pengecekan dan memastikan keputusan yang lebih tepat dalam
                    pengelolaan karyawan.
                </p>
            </div>

            <div class="flex items-start gap-4 bg-gray-50 border border-gray-200 rounded-lg p-4 shadow-sm">
                <div
                    class="flex-shrink-0 bg-orange-100 text-orange-500 w-12 h-12 rounded-full flex items-center justify-center text-2xl">
                    🎧
                </div>
                <div>
                    <h4 class="font-semibold mb-1">Permintaan Panggilan</h4>
                    <p class="text-gray-600 text-sm">
                        Halaman ini dibuat untuk membantu perusahaan dalam mencari nama pekerja dan memeriksa riwayat atau
                        informasi terkait karyawan tersebut. Dengan mengklik tombol ‘request’
                    </p>
                </div>
            </div>

            <div class="flex justify-end mt-8">
                <a href="https://wa.me/{{ $nomorWA }}?text={{ $pesan }}" target="_blank"
                    class="bg-orange-500 text-white px-6 py-2 rounded-md font-medium hover:bg-orange-600">
                    Kirim Permintaan
                </a>
            </div>
        </section>
    </div>
@endsection
