@extends('Admin.Dashboard-admin.layouts.index')

@section('admin-content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-sm font-semibold text-gray-700">Perusahaan</h3>
            <p class="text-2xl font-bold mt-2">27
                <span class="text-green-600 text-sm font-medium">+1.3%</span>
            </p>
            <a href="#" class="text-sm text-green-700 mt-4 inline-block hover:underline">
                Lihat Detail &gt;
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-sm font-semibold text-gray-700">Kandidat</h3>
            <p class="text-2xl font-bold mt-2">15
                <span class="text-green-600 text-sm font-medium">+2.3%</span>
            </p>
            <a href="#" class="text-sm text-green-700 mt-4 inline-block hover:underline">
                Lihat Detail &gt;
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-sm font-semibold text-gray-700">Non Kandidat</h3>
            <p class="text-2xl font-bold mt-2">14
                <span class="text-green-600 text-sm font-medium">+0.7%</span>
            </p>
            <a href="#" class="text-sm text-green-700 mt-4 inline-block hover:underline">
                Lihat Detail &gt;
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-sm font-semibold text-gray-700">Lowongan</h3>
            <p class="text-2xl font-bold mt-2">37
                <span class="text-green-600 text-sm font-medium">+5.3%</span>
            </p>
            <a href="#" class="text-sm text-green-700 mt-4 inline-block hover:underline">
                Lihat Detail &gt;
            </a>
        </div>
    </div>
@endsection
