@extends('layouts.index')
@section('content')
    <div class="font-sans mt-24">

        <!-- Hero Section -->
        <section class="bg-white px-6 ml-0 lg:ml-20 py-12 flex flex-col md:flex-row items-center justify-between">
            <div class="md:w-1/2 space-y-4">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800">
                    Berlangganan Bersama Kami <br> Menjadi Yang Terdepan
                </h2>
                <p class="text-gray-600">
                    Jangan lewatkan kesempatan untuk selalu mendapatkan penawaran menarik dengan berlangganan.
                </p>
                <button class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2 rounded-lg">
                    Berlangganan
                </button>
            </div>
            <div class="md:w-1/2 mt-8 md:mt-0 flex justify-center">
                <img src="{{ asset('image/Meeting.png') }}" alt="Illustrasi" class="w-96">
            </div>
        </section>

        <!-- Benefit Section -->
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

        <!-- Pricing Section -->
        <section class="px-6 py-12 flex justify-center">
            <div
                class="border-2 border-orange-500 rounded-lg p-8 max-w-3xl flex flex-col md:flex-row items-center space-y-6 md:space-y-0 md:space-x-8">
                <div class="md:w-1/2 space-y-4">
                    <h3 class="text-xl font-semibold text-gray-800">
                        Berlangganan Bersama Kami
                    </h3>
                    <p class="text-gray-600">
                        Dan Anda akan mendapatkan benefit yang sangat bermanfaat untuk perusahaan anda.
                    </p>
                    <p class="text-gray-800 font-medium">
                        Hanya dengan <span class="text-orange-500 font-bold">1.000</span> per Tahun
                    </p>
                    <button class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2 rounded-lg">
                        Berlangganan
                    </button>
                </div>
                <div class="md:w-1/2 flex justify-center">
                    <img src="{{ asset('image/Feedback.png') }}" alt="Ilustrasi Harga" class="w-72">
                </div>
            </div>
        </section>

    </div>
@endsection
