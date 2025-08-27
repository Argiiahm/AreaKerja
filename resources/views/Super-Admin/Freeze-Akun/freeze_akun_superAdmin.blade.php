@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="p-6">
        <div class="flex justify-end mb-4">
            <div class="flex items-center space-x-2 mt-0 lg:mt-0 md:mt">
                <input type="text" placeholder="name/username"
                    class="border border-gray-300 rounded-md px-3 py-2 w-64 focus:outline-none focus:ring-2 focus:ring-gray-400">
                <button class="bg-gray-700 text-white px-4 py-2 rounded-md">Cari</button>
            </div>
        </div>

        <div id="" class="bg-white border rounded-2xl shadow-sm overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left">
                        <th class="px-6 py-3 font-semibold text-gray-700">No</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Username</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Email</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Telepon</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Alamat</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="">
                        <td class="px-6 py-3 text-gray-700">774770</td>
                        <td class="px-6 py-3 text-gray-700">Brahim Diaz</td>
                        <td class="px-6 py-3 text-gray-700">gmail.com</td>
                        <td class="px-6 py-3 text-gray-700">08212121221</td>
                        <td class="px-6 py-3 text-gray-700">Jawa Tengah</td>
                        <td class="px-6 py-4">
                            <a href="/dashboard/superadmin/freeze/detail"
                                class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600">
                                0
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
