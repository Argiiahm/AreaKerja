@extends('layouts.index')

@section('content')
    <div class="p-6 mt-24 md:mt-32">


        <div class="block lg:flex justify-between items-center mb-4">
            <div class="space-x-2 grid grid-cols-2 gap-2 lg:inline md:inline mb-5 lg:mb-0">
                <h1 class="font-bold">Kandidat Saya</h1>
            </div>

            <div class="flex items-center space-x-2">
                <div class="flex border border-gray-300 rounded-lg overflow-hidden h-10 w-[400px]">
                    <input type="text" placeholder="Nama Kandidat/User ..."
                        class="px-3 text-sm text-gray-700 focus:outline-none w-full">
                </div>



                <select class="px-10 py-2 text-sm text-gray-700 focus:outline-none border border-gray-400 rounded-md">
                    <option selected disabled>Skill</option>
                    <option>Video graver</option>
                    <option>programer</option>
                </select>
            </div>



        </div>


        <div id="table_koin" class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">
            <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white  px-8 pt-3 rounded-lg">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 border-gray-300 text-center leading-4 tracking-wider">
                                Nama</th>
                            <th class="px-6 py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">
                                Skill</th>
                            <th class="px-6 py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">
                                CV</th>
                            <th class="px-6 py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">
                                Hapus</th>
                            <th class="px-6 py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">
                                Expetasi Range Gaji</th>
                            <th class="px-6 py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">
                                Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white text-center ">
                        <tr class="border-b">
                            <td class="px-6 py-4 whitespace-no-wrap  border-gray-500">
                                <div class="flex items-center justify-center gap-2 ">
                                    <img src="{{ asset('image/logo-areakerja.png') }}" alt="" class="w-[40px]">
                                    Bambang Sudoyono
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-gray-500">
                                <div class="text-sm leading-5">Video Graver</div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap  border-gray-500 text-sm leading-5">
                                <i class="ph ph-arrow-line-down text-orange-500 text-2xl"></i>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap  border-gray-500 text-sm leading-5">
                                <i class="ph ph-trash-simple text-orange-500 text-2xl"></i>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap  border-gray-500 text-sm leading-5">
                                Rp.5.500.00</td>
                            <td
                                class="px-6 py-4 whitespace-no-wrap text-green-500 font-bold  border-gray-500 text-sm leading-5">
                                di terima
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
