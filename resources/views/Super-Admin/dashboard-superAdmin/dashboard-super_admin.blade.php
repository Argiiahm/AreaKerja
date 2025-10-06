@extends('Super-Admin.layouts.index')

@section('super_admin-content')
<div class="flex justify-center mt-10 px-4">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 w-full max-w-7xl">
        
        <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-lg transition duration-300">
            <div class="flex justify-between items-center">
                <h3 class="text-sm font-semibold text-gray-600">Perusahaan</h3>
                <span class="bg-green-100 text-green-600 text-xs px-2 py-1 rounded-full font-medium">+1.3%</span>
            </div>
            <p class="text-3xl font-bold text-gray-800 mt-3">27</p>
            <a href="#" class="text-sm text-green-700 mt-4 inline-block hover:text-green-800 hover:underline">
                Lihat Detail &gt;
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-lg transition duration-300">
            <div class="flex justify-between items-center">
                <h3 class="text-sm font-semibold text-gray-600">Kandidat</h3>
                <span class="bg-green-100 text-green-600 text-xs px-2 py-1 rounded-full font-medium">+2.3%</span>
            </div>
            <p class="text-3xl font-bold text-gray-800 mt-3">15</p>
            <a href="#" class="text-sm text-green-700 mt-4 inline-block hover:text-green-800 hover:underline">
                Lihat Detail &gt;
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-lg transition duration-300">
            <div class="flex justify-between items-center">
                <h3 class="text-sm font-semibold text-gray-600">Non Kandidat</h3>
                <span class="bg-green-100 text-green-600 text-xs px-2 py-1 rounded-full font-medium">+0.7%</span>
            </div>
            <p class="text-3xl font-bold text-gray-800 mt-3">14</p>
            <a href="#" class="text-sm text-green-700 mt-4 inline-block hover:text-green-800 hover:underline">
                Lihat Detail &gt;
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-lg transition duration-300">
            <div class="flex justify-between items-center">
                <h3 class="text-sm font-semibold text-gray-600">Lowongan</h3>
                <span class="bg-green-100 text-green-600 text-xs px-2 py-1 rounded-full font-medium">+5.3%</span>
            </div>
            <p class="text-3xl font-bold text-gray-800 mt-3">37</p>
            <a href="#" class="text-sm text-green-700 mt-4 inline-block hover:text-green-800 hover:underline">
                Lihat Detail &gt;
            </a>
        </div>

    </div>
</div>
@endsection
