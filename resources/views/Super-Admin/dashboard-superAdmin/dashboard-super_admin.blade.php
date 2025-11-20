@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="px-4 mt-10 flex justify-center">
        <div class="w-full max-w-7xl">

            <!-- Bagian header -->
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
                <p class="text-gray-500 text-sm mt-1">Overview aktivitas super admin</p>
            </div>

            <!-- GRID CARD -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- CARD -->
                <div class="bg-gradient-to-br from-white to-gray-50 border border-gray-100 rounded-2xl shadow-md p-6 hover:shadow-xl hover:-translate-y-1 transition duration-300">
                    <div class="flex justify-between items-center">
                        <h3 class="text-sm font-semibold text-gray-600 flex items-center gap-2">
                            <i class="fa-solid fa-building text-orange-500"></i>
                            Perusahaan
                        </h3>
                        <span class="bg-green-100 text-green-600 text-xs px-2 py-1 rounded-full font-medium">
                            +{{ ($Perusahaan * 1) / 5 }}%
                        </span>
                    </div>
                    <p class="text-4xl font-bold text-gray-800 mt-3">{{ $Perusahaan }}</p>
                    <a href="#" class="text-sm text-green-700 mt-4 inline-block hover:text-green-800 hover:underline">
                        Lihat Detail &gt;
                    </a>
                </div>

                <!-- CARD COPY → Kandidat -->
                <div class="bg-gradient-to-br from-white to-gray-50 border border-gray-100 rounded-2xl shadow-md p-6 hover:shadow-xl hover:-translate-y-1 transition duration-300">
                    <div class="flex justify-between items-center">
                        <h3 class="text-sm font-semibold text-gray-600 flex items-center gap-2">
                            <i class="fa-solid fa-user text-blue-500"></i>
                            Kandidat
                        </h3>
                        <span class="bg-green-100 text-green-600 text-xs px-2 py-1 rounded-full font-medium">
                            +{{ ($Kandidat * 1) / 5 }}%
                        </span>
                    </div>
                    <p class="text-4xl font-bold text-gray-800 mt-3">{{ $Kandidat }}</p>
                    <a href="#" class="text-sm text-green-700 mt-4 inline-block hover:text-green-800 hover:underline">
                        Lihat Detail &gt;
                    </a>
                </div>

                <!-- CARD Non Kandidat -->
                <div class="bg-gradient-to-br from-white to-gray-50 border border-gray-100 rounded-2xl shadow-md p-6 hover:shadow-xl hover:-translate-y-1 transition duration-300">
                    <div class="flex justify-between items-center">
                        <h3 class="text-sm font-semibold text-gray-600 flex items-center gap-2">
                            <i class="fa-solid fa-user-xmark text-red-500"></i>
                            Non Kandidat
                        </h3>
                        <span class="bg-green-100 text-green-600 text-xs px-2 py-1 rounded-full font-medium">
                            +{{ ($Pelamar * 1) / 5 }}%
                        </span>
                    </div>
                    <p class="text-4xl font-bold text-gray-800 mt-3">{{ $Pelamar }}</p>
                    <a href="#" class="text-sm text-green-700 mt-4 inline-block hover:text-green-800 hover:underline">
                        Lihat Detail &gt;
                    </a>
                </div>

                <!-- CARD Lowongan -->
                <div class="bg-gradient-to-br from-white to-gray-50 border border-gray-100 rounded-2xl shadow-md p-6 hover:shadow-xl hover:-translate-y-1 transition duration-300">
                    <div class="flex justify-between items-center">
                        <h3 class="text-sm font-semibold text-gray-600 flex items-center gap-2">
                            <i class="fa-solid fa-briefcase text-yellow-500"></i>
                            Lowongan
                        </h3>
                        <span class="bg-green-100 text-green-600 text-xs px-2 py-1 rounded-full font-medium">
                            +{{ ($Lowongan * 1) / 5 }}%
                        </span>
                    </div>
                    <p class="text-4xl font-bold text-gray-800 mt-3">{{ $Lowongan }}</p>
                    <a href="#" class="text-sm text-green-700 mt-4 inline-block hover:text-green-800 hover:underline">
                        Lihat Detail &gt;
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection
