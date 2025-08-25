@extends('Admin.Dashboard-admin.layouts.index')

@section('admin-content')
    <div class="p-6">
        <div class="block lg:flex justify-between items-center mb-4">
            <a href="/dashboard/admin/event/add" class="bg-gray-700 border  text-white px-4 py-2 rounded-md">Buat Event</a>
            <div class="flex items-center space-x-2 mt-0 lg:mt-0 md:mt">
                <input type="text" placeholder=""
                    class="border border-gray-300 rounded-md px-3 py-2 w-64 focus:outline-none focus:ring-2 focus:ring-gray-400">
                <button class="bg-gray-700 text-white px-4 py-2 rounded-md">Cari</button>
            </div>
        </div>
        <div id="table_koin" class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm: lg:-mx-8 pr-10 lg:px-8">
            <div class="align-middle inline-block min-w-full overflow-hidden px-8 pt-3 ">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th class=" py-3 border-gray-300 text-center leading-4 tracking-wider">
                                Status</th>
                            <th class=" py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">
                                Nama</th>
                            <th class=" py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">
                                Pendaftaran</th>
                            <th class=" py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">
                                Quota</th>
                            <th class=" py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">
                                Mulai</th>
                            <th class=" py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">
                                Selesai</th>
                            <th class=" py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr class="px-6 py-4 whitespace-no-wrap border-gray-500 border-b">
                            <td class="px-2 py-1 ">
                                <span class="bg-green-500  py-1 px-4 rounded-md text-white">Buka</span>
                            </td>
                            <td class="py-4 whitespace-no-wrap border-gray-500 text-blue-500">
                                <a href="/dashboard/admin/event/detail">Testing</a>
                            </td>
                            <td class=" py-4 whitespace-no-wrap  border-gray-500 text-sm leading-5">
                                3</td>
                            <td class=" py-4 whitespace-no-wrap  border-gray-500 text-sm leading-5">
                                oo</td>
                            <td class=" py-4 whitespace-no-wrap  border-gray-500 text-sm leading-5">
                                25-08-2025 08.00</td>
                            <td class=" py-4 whitespace-no-wrap  border-gray-500 text-sm leading-5">
                                30-10-2025 17.00</td>
                            <td
                                class=" py-4 whitespace-no-wrap text-white font-bold  border-gray-500 text-sm leading-5">
                                <button><i class="ph ph-trash text-2xl bg-gray-700 p-0.5"></i></button>
                            </td>
                            <td class=" py-4 whitespace-no-wrap text-right border-gray-500 text-sm leading-5">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
