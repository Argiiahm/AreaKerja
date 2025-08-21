@extends('layouts.index')

@section('content')
    <section class="container max-w-screen-lg mx-auto pt-40">
        <h2 class="text-2xl font-bold text-gray-900 mb-6 mx-5 lg:mx-0">Frequently Asked Questions</h2>

        <div class="flex items-center gap-2 mb-10 mx-5 lg:mx-0">
            <input type="text" placeholder="Apa yang bisa kami bantu?"
                class="w-full md:w-96 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-orange-500 focus:outline-none">
            <button class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-md">
                Cari
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mx-5 lg:mx-0">
            <div class="space-y-6">
                <div>
                    <h3 class="font-semibold text-gray-800">Bagaimana Melamar Pekerjaan di Area Kerja ?</h3>
                    <p class="text-gray-600 text-sm mt-2">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        <a href="#" class="text-orange-500 hover:underline">Vivamus faucibus lectus viverra id</a>.
                        Lectus habitant nisi, posuere ut urna ut vitae hac ultricies.
                        Commodo ridiculus augue condimentum molestie dolor, morbi luctus nullam.
                    </p>
                </div>

                <div>
                    <h3 class="font-semibold text-gray-800">Apa itu kandidat Area Kerja?</h3>
                    <p class="text-gray-600 text-sm mt-2">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        <a href="#" class="text-orange-500 hover:underline">Vivamus faucibus lectus viverra id</a>.
                        Lectus habitant nisi, posuere ut urna ut vitae hac ultricies.
                        Commodo ridiculus augue condimentum molestie dolor, morbi luctus nullam.
                    </p>
                </div>

            </div>

            <div class="space-y-6">
                <div>
                    <h3 class="font-semibold text-gray-800">Apa itu Area Kerja?</h3>
                    <p class="text-gray-600 text-sm mt-2">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        <a href="#" class="text-orange-500 hover:underline">Vivamus faucibus lectus viverra id</a>.
                        Lectus habitant nisi, posuere ut urna ut vitae hac ultricies.
                    </p>
                </div>

                <div>
                    <h3 class="font-semibold text-gray-800">Bagaimana cara melamar kerja lewat Areakerja.com?</h3>
                    <p class="text-gray-600 text-sm mt-2">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        <a href="#" class="text-orange-500 hover:underline">Vivamus faucibus lectus viverra id</a>.
                        Lectus habitant nisi, posuere ut urna ut vitae hac ultricies.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
