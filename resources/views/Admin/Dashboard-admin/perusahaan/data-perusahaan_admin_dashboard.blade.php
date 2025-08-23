@extends('Admin.Dashboard-admin.layouts.index')

@section('admin-content')
    <div class="p-6">
        <div class="block lg:flex justify-between items-center mb-4">
            <div class="space-x-2 grid grid-cols-2 gap-2 lg:inline md:inline mb-5 lg:mb-0">
                <button id="btn_perusahaan" class="bg-gray-700 border  text-white px-4 py-2 rounded-md">Perusahaan</button>
                <button id="btn_recruitment" class="border text-gray-700 px-4 py-2 rounded-md">Recruitment</button>
                <button id="btn_talent_hunter" class="border text-gray-700 px-4 py-2 rounded-md">Talent Hunter</button>
            </div>
            <div class="flex items-center space-x-2 mt-0 lg:mt-0 md:mt">
                <input type="text" placeholder=""
                    class="border border-gray-300 rounded-md px-3 py-2 w-64 focus:outline-none focus:ring-2 focus:ring-gray-400">
                <button class="bg-gray-700 text-white px-4 py-2 rounded-md">Cari</button>
            </div>
        </div>

        <!-- Table-Perusahaan -->
        <div id="table_perusahaan" class="bg-white border rounded-2xl shadow-sm overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 text-left">
                        <th class="px-6 py-3 font-semibold text-gray-700">ID</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Nama Perusahaan</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Email</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Telepon</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Alamat</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-t">
                        <td class="px-6 py-3 text-gray-700">774770</td>
                        <td class="px-6 py-3 text-gray-700">Joko Shop</td>
                        <td class="px-6 py-3 text-gray-700">Joko@gmail.com</td>
                        <td class="px-6 py-3 text-gray-700">082111111</td>
                        <td class="px-6 py-3 text-gray-700">Jl Joko No 02</td>
                        <td class="px-6 py-3 flex space-x-2">
                        <td class="px-6 py-4 flex gap-2">
                            <a href="/dashboard/admin/perusahaan/view"
                                class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12s3.75-6.75 9.75-6.75S21.75 12 21.75 12s-3.75 6.75-9.75 6.75S2.25 12 2.25 12z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </a>
                            <button class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M18.364 5.636a9 9 0 11-12.728 12.728A9 9 0 0118.364 5.636z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 9l-6 6" />
                                </svg>
                            </button>
                        </td>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    <!-- end-perusahaan -->


    <!-- Table-requitmen -->
    <div id="table_recruitment" class=" hidden bg-white border rounded-2xl shadow-sm overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="bg-gray-50 text-left">
                    <th class="px-6 py-3 font-semibold text-gray-700">ID</th>
                    <th class="px-6 py-3 font-semibold text-gray-700">Nama Perusahaan</th>
                    <th class="px-6 py-3 font-semibold text-gray-700">Email</th>
                    <th class="px-6 py-3 font-semibold text-gray-700">Telepon</th>
                    <th class="px-6 py-3 font-semibold text-gray-700">Alamat</th>
                    <th class="px-6 py-3 font-semibold text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-t">
                    <td class="px-6 py-3 text-gray-700">774770</td>
                    <td class="px-6 py-3 text-gray-700">Joko Shop</td>
                    <td class="px-6 py-3 text-gray-700">Joko@gmail.com</td>
                    <td class="px-6 py-3 text-gray-700">082111111</td>
                    <td class="px-6 py-3 text-gray-700">Jl Joko No 02</td>
                    <td class="px-6 py-3 flex space-x-2">
                    <td class="px-6 py-4 flex gap-2">
                        <a href="/dashboard/admin/perusahaan/view/cv"
                            class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12s3.75-6.75 9.75-6.75S21.75 12 21.75 12s-3.75 6.75-9.75 6.75S2.25 12 2.25 12z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </a>
                    </td>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- end-requitmen -->


    <!-- Table-Talent Hunter -->
    <div id="table_talent_hunter" class="hidden bg-white border rounded-2xl shadow-sm overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="bg-gray-50 text-left">
                    <th class="px-6 py-3 font-semibold text-gray-700">ID</th>
                    <th class="px-6 py-3 font-semibold text-gray-700">Nama Perusahaan</th>
                    <th class="px-6 py-3 font-semibold text-gray-700">Email</th>
                    <th class="px-6 py-3 font-semibold text-gray-700">Telepon</th>
                    <th class="px-6 py-3 font-semibold text-gray-700">Alamat</th>
                    <th class="px-6 py-3 font-semibold text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-t">
                    <td class="px-6 py-3 text-gray-700">774770</td>
                    <td class="px-6 py-3 text-gray-700">Joko Shop</td>
                    <td class="px-6 py-3 text-gray-700">Joko@gmail.com</td>
                    <td class="px-6 py-3 text-gray-700">082111111</td>
                    <td class="px-6 py-3 text-gray-700">Jl Joko No 02</td>
                    <td class="px-6 py-3 flex space-x-2">
                    <td class="px-6 py-4 flex gap-2">
                        <a href="/dashboard/admin/perusahaan/view/talenthunter"
                            class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12s3.75-6.75 9.75-6.75S21.75 12 21.75 12s-3.75 6.75-9.75 6.75S2.25 12 2.25 12z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </a>
                        <button class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M18.364 5.636a9 9 0 11-12.728 12.728A9 9 0 0118.364 5.636z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 9l-6 6" />
                            </svg>
                        </button>
                    </td>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
    <!-- end-Talen Hunter -->
@endsection
