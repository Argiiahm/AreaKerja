@extends('Admin.Dashboard-admin.layouts.index')

@section('admin-content')
    <div class="mx-auto p-6">

        <div class="bg-white border border-gray-300 rounded-xl shadow-sm overflow-hidden">

            <div class="flex items-center gap-3 py-6 border-b rounded-b-3xl shadow-md">
                <img src="{{ asset('Icon/seveninc.png') }}" alt="Logo" class="w-40 h-40 object-contain">
                <div class="w-full lg:w-[70%] text-left lg:text-center">
                    <h1 class="text-lg font-bold">SEVEN INC</h1>
                </div>
            </div>

            <div class="p-6 space-y-6 text-sm text-gray-700">

                <div>
                    <h2 class="font-bold text-black">Deskripsi</h2>
                    <p class="mt-2 leading-relaxed">
                        Lorem ipsum dolor sit amet consectetur. Eget potenti mauris fringilla consectetur.
                        Vel orci ultricies nibh pharetra urna. Natoque consequat cras ornare eget arcu amet tortor.
                        Vel in pulvinar posuere et enim vitae commodo sed.
                    </p>
                </div>

                <div>
                    <h2 class="font-bold text-black">Visi</h2>
                    <ul class="list-disc list-inside mt-2 space-y-1">
                        <li>Lorem ipsum dolor sit amet consectetur.</li>
                        <li>Lorem ipsum dolor sit amet consectetur.</li>
                        <li>Lorem ipsum dolor sit amet consectetur.</li>
                        <li>Lorem ipsum dolor sit amet consectetur.</li>
                    </ul>
                </div>

                <div>
                    <h2 class="font-bold text-black">Misi</h2>
                    <ul class="list-disc list-inside mt-2 space-y-1">
                        <li>Lorem ipsum dolor sit amet consectetur.</li>
                        <li>Lorem ipsum dolor sit amet consectetur.</li>
                        <li>Lorem ipsum dolor sit amet consectetur.</li>
                        <li>Lorem ipsum dolor sit amet consectetur.</li>
                    </ul>
                </div>

                <div>
                    <h2 class="font-bold text-black">Data Perusahaan</h2>
                    <div class="mt-2 space-y-1">
                        <p>User ID <span class="ml-8">: 7413580000</span></p>
                        <p>Username <span class="ml-4">: Seven_inc</span></p>
                        <p>Email <span class="ml-12">: seveninc@gmail.com</span></p>
                        <p>Kata Sandi <span class="ml-2">: ********</span></p>
                        <p>Nama Perusahaan <span class="ml-[-2px]">: Seven INC</span></p>
                        <p>Legalitas <span class="ml-8">: PT</span></p>
                    </div>
                </div>

                <div>
                    <h2 class="font-bold text-black">Kontak</h2>
                    <div class="mt-2 space-y-1">
                        <p>Perusahaan <span class="ml-3">: (0274) 123456</span></p>
                        <p>Whatsapp <span class="ml-6">: 08123456789</span></p>
                    </div>
                </div>

                <div>
                    <h2 class="font-bold text-black">Lowongan</h2>
                    <div class="mt-2 space-y-3">
                        <div>
                            <a href="/dashboard/admin/perusahaan/view/lowongan"
                                class="text-blue-600 hover:underline font-semibold">Front-End Developer</a>
                            <p>Yogyakarta</p>
                            <p class="text-gray-500 text-xs">2 Hari yang lalu</p>
                        </div>
                        <div>
                            <a href="#" class="text-blue-600 hover:underline font-semibold">Back - End Developer</a>
                            <p>Yogyakarta</p>
                            <p class="text-gray-500 text-xs">2 Hari yang lalu</p>
                        </div>
                        <div>
                            <a href="#" class="text-blue-600 hover:underline font-semibold">UI UX Designer</a>
                            <p>Yogyakarta</p>
                            <p class="text-gray-500 text-xs">2 Hari yang lalu</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="flex gap-3 items-center flex-col p-4 bg-gray-50">
            <button class="px-6 py-2 bg-gray-700 text-white text-sm rounded-md shadow hover:bg-gray-800">
                Jadikan Rekomendasi
            </button>
            <button class="px-16 py-2 bg-gray-300 text-black text-sm rounded-md shadow hover:bg-gray-400">
                Kembali
            </button>
        </div>
    </div>
@endsection
