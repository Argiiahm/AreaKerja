@extends('Admin.Dashboard-admin.layouts.index')

@section('admin-content')
    <div class="p-6">


        <div class="block lg:flex justify-between items-center mb-4">
            <div class="space-x-2 grid grid-cols-2 gap-2 lg:inline md:inline mb-5 lg:mb-0">
                <button id="btn_koin" class="bg-gray-700 border  text-white px-4 py-2 rounded-md">Koin</button>
                <button id="btn_tunai" class="border text-gray-700 px-4 py-2 rounded-md">Tunai</button>
            </div>

            <div class="flex items-center space-x-2">
                <div class="flex border border-gray-300 rounded-lg overflow-hidden h-10">
                    <select class="px-10 text-sm text-gray-700 focus:outline-none border-r border-gray-300">
                        <option>No. Ref</option>
                        <option>ID User</option>
                        <option>Email</option>
                    </select>

                    <input type="text" value="991773493631" class="px-3 text-sm text-gray-700 focus:outline-none w-40">
                </div>

                <button class="bg-gray-700 text-white px-6 h-10 rounded-lg">
                    Cari
                </button>
            </div>



        </div>


        <!-- Koin -->
        <div id="table_koin" class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">
            <div
                class="align-middle inline-block min-w-full shadow overflow-hidden bg-white  px-8 pt-3 rounded-lg">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 border-gray-300 text-center leading-4 tracking-wider">
                                No</th>
                            <th class="px-6 py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">
                                No.Referensi</th>
                            <th class="px-6 py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">
                                jenis</th>
                            <th class="px-6 py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">
                                Dari</th>
                            <th class="px-6 py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">
                                Sumber Dana</th>
                            <th class="px-6 py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">
                                Transaksi Koin</th>
                            <th class="px-6 py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">
                                Status</th>
                            <th class="px-6 py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">
                                Aksi</th>
                            <th class="px-6 py-3 border-gray-300"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white text-center ">
                        <tr class="border-b">
                            <td class="px-6 py-4 whitespace-no-wrap  border-gray-500">
                                1
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-gray-500">
                                <div class="text-sm leading-5">3923948129891</div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap  border-gray-500 text-sm leading-5">
                                Open CV</td>
                            <td class="px-6 py-4 whitespace-no-wrap  border-gray-500 text-sm leading-5">
                                Apple Corp</td>
                            <td class="px-6 py-4 whitespace-no-wrap  border-gray-500 text-sm leading-5">
                                VA BCA</td>
                            <td class="px-6 py-4 whitespace-no-wrap  border-gray-500 text-sm leading-5">
                                1000 Koin</td>
                            <td
                                class="px-6 py-4 whitespace-no-wrap text-green-500 font-bold  border-gray-500 text-sm leading-5">
                                Success
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-right border-gray-500 text-sm leading-5">

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="table_tunai" class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8 hidden">
            <div
                class="align-middle inline-block min-w-full shadow overflow-hidden bg-white  px-8 pt-3 rounded-lg rounded-br-lg">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 border-gray-300 text-center leading-4 tracking-wider">
                                No</th>
                            <th class="px-6 py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">
                                No.Referensi</th>
                            <th class="px-6 py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">
                                jenis</th>
                            <th class="px-6 py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">
                                Dari</th>
                            <th class="px-6 py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">
                                Sumber Dana</th>
                            <th class="px-6 py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">
                                Transaksi Tunai</th>
                            <th class="px-6 py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">
                                Status</th>
                            <th class="px-6 py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">
                                Aksi</th>
                            <th class="px-6 py-3 border-gray-300"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white text-center ">
                        <tr class="border-b">
                            <td class="px-6 py-4 whitespace-no-wrap  border-gray-500">
                                1
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-gray-500">
                                <div class="text-sm leading-5">3923948129891</div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap  border-gray-500 text-sm leading-5">
                                Open CV</td>
                            <td class="px-6 py-4 whitespace-no-wrap  border-gray-500 text-sm leading-5">
                                Apple Corp</td>
                            <td class="px-6 py-4 whitespace-no-wrap  border-gray-500 text-sm leading-5">
                                VA BCA</td>
                            <td class="px-6 py-4 whitespace-no-wrap  border-gray-500 text-sm leading-5">
                                1.000.000</td>
                            <td
                                class="px-6 py-4 whitespace-no-wrap text-green-500 font-bold  border-gray-500 text-sm leading-5">
                                Success
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-right border-gray-500 text-sm leading-5">

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
