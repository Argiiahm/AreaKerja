@extends('Admin.Dashboard-admin.layouts.index')

@section('admin-content')
    <div class="container max-w-screen-lg mx-auto mt-30">
        <div class="bg-gray-600 rounded-lg shadow-md p-16">
            <div class="flex items-center">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/005/544/718/small_2x/profile-icon-design-free-vector.jpg"
                    alt="Profile" class="w-20 h-20 rounded-full object-cover border-4 border-gray-600">
                <h2 class="text-white text-xl font-bold ml-4">Ariefin Cahya Nugroho</h2>
            </div>

            <div class="grid grid-cols-3 gap-6 mt-6 text-white text-sm">
                <div>
                    <p class="opacity-80">Divisi</p>
                    <p class="font-medium">Programmer</p>
                </div>
                <div>
                    <p class="opacity-80">Mulai Pelatihan</p>
                    <p class="font-medium">20 Oktober 2023</p>
                </div>
                <div>
                    <p class="opacity-80">Selesai Pelatihan</p>
                    <p class="font-medium">20 Desember 2023</p>
                </div>
            </div>
        </div>

        <div class="flex flex-col items-center gap-3 mt-6">
            <button class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 rounded-md w-60 shadow">
                Lulus
            </button>
            <button class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 rounded-md w-60 shadow">
                Gugur
            </button>
        </div>
    </div>
@endsection
