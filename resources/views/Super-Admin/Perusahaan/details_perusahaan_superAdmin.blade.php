@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="mx-auto mt-10">
        <div class="p-6">
            <div class="flex items-center justify-between shadow-lg border-2 rounded-lg p-6 mb-8">
                <div class="w-28 h-28 flex items-center justify-center rounded-md overflow-hidden">
                    <img src="{{ asset('Icon/seveninc.png') }}" alt="Logo" class="object-contain">
                </div>
                <h2 class="text-xl font-semibold absolute left-1/2 transform -translate-x-1/2">
                    SEVEN INC
                </h2>
            </div>


            <div class="space-y-6">
                <div>
                    <h3 class="font-semibold mb-1">Deskripsi</h3>
                    <p class="text-sm text-gray-700 leading-relaxed">
                        SEVEN INC adalah perusahaan yang bergerak di bidang teknologi dan inovasi digital.
                        Fokus utama perusahaan ini adalah mengembangkan solusi teknologi yang mendukung berbagai sektor,
                        seperti pengembangan aplikasi, layanan digital, dan konsultasi teknologi.
                    </p>
                </div>

                <div>
                    <h3 class="font-semibold mb-1">Visi</h3>
                    <ul class="list-disc list-inside text-sm text-gray-700">
                        <li>Menyelid perusahaan teknologi terdepan yang menciptakan solusi digital inovatif dan
                            berkelanjutan</li>
                    </ul>
                </div>

                <div>
                    <h3 class="font-bold mb-1">Misi</h3>
                    <ul class="list-disc list-inside text-sm text-gray-700 space-y-1">
                        <li>Mengembangkan produk dan layanan teknologi yang mengutamakan kualitas & kebutuhan</li>
                        <li>Mendorong inovasi di setiap aspek pengembangan solusi digital untuk membantu klien</li>
                        <li>Menyediakan lingkungan kerja yang mendukung pengembangan profesional tim</li>
                    </ul>
                </div>

                <div>
                    <h3 class="font-bold mb-1">Data Perusahaan</h3>
                    <div class="space-y-3 text-sm text-gray-700">
                        <p><span class="font-medium">User ID</span> : 7413580000</p>
                        <p><span class="font-medium">Username</span> : Seven_Inc</p>
                        <p><span class="font-medium">Email</span> : seveninc@gmail.com</p>
                        <p><span class="font-medium">Kata Sandi</span> : ********</p>
                        <p><span class="font-medium">Nama Perusahaan</span> : Seven INC</p>
                        <p><span class="font-medium">Legalitas</span> : PT</p>
                    </div>
                </div>

                <div>
                    <h3 class="font-bold mb-1">Kontak</h3>
                    <div class="space-y-3 text-sm text-gray-700">
                        <p><span class="font-medium">Perusahaan</span> : (0274) 123456</p>
                        <p><span class="font-medium">Whatsapp</span> : 08123456789</p>
                    </div>
                </div>

                <div>
                    <h3 class="font-bold mb-2">Lowongan</h3>
                    <div class="space-y-2 text-sm">
                        <a href="/dashboard/superadmin/perusahaan/lowongan/detail"
                            class="text-blue-600 hover:underline">Front-End Developer</a>
                        <p class="text-gray-500 text-xs">Yogyakarta • 2 hari yang lalu</p>

                        <a href="#" class="text-blue-600 hover:underline">Back-End Developer</a>
                        <p class="text-gray-500 text-xs">Yogyakarta • 2 hari yang lalu</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-center gap-3 mt-8 w-full">
                <a href="/dashboard/superadmin/perusahaan/lowongan/add"
                    class="bg-orange-500 text-white py-2 px-10 rounded-md">Tambah Lowongan</a>
                <a href="/dashboard/superadmin/perusahaan/lowongan/edit"
                    class="bg-blue-500 text-white py-2 px-32 rounded-md">Edit</a>
                <button class="bg-red-500 text-white py-2 px-32 rounded-md">Hapus</button>
            </div>
        </div>
    </div>
@endsection
