@extends('Super-Admin.dashboard-superAdmin.dashboard-super_admin')

@section('super_admin-content')
    <div class="p-6">
        <div class="block lg:flex justify-between items-center mb-4">

            <div class="flex items-center gap-2">
                <a id="btnAddPerusahaan" class="bg-orange-500 flex justify-center items-center px-4 py-1 rounded-md" href="/dashboard/superadmin/perusahaan/add/perusahaan"><i
                        class="ph ph-plus text-2xl text-white"></i></a>
                <select id="kategori_select_perusahaan" class="bg-orange-500 text-white px-10 py-2 rounded-md" name=""
                    id="">
                    <option id="perusahaan_opt" value="perusahaan">Perusahaan</option>
                    <option id="recruitment_opt" value="recruitment">Recruitment</option>
                    <option id="talent_hunter_opt" value="talent_hunter">Talent Hunter</option>
                </select>
            </div>

            <div class="flex items-center space-x-2 mt-0 lg:mt-0 md:mt">
                <input type="text" placeholder="name/username"
                    class="border border-gray-300 rounded-md px-3 py-2 w-64 focus:outline-none focus:ring-2 focus:ring-gray-400">
                <button class="bg-gray-700 text-white px-4 py-2 rounded-md">Cari</button>
            </div>
        </div>

        <div id="perusahaan_table" class="bg-white border rounded-2xl shadow-sm overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left">
                        <th class="px-6 py-3 font-semibold text-gray-700">ID</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Nama Perusahaan</th>
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
                        <td class="px-6 py-3 text-gray-700">S1</td>
                        <td class="px-6 py-3 text-gray-700">UI UX Designer</td>
                        <td class="px-6 py-3 text-gray-700">Jawa Tengah</td>
                        <td class="px-6 py-4">
                            <a href="/dashboard/superadmin/perusahaan/detail"
                                class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600">
                                View
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div id="recruitment_table" class="hidden bg-white border rounded-2xl shadow-sm overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left">
                        <th class="px-6 py-3 font-semibold text-gray-700">ID</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Nama Perusahaan</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Email</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Telepon</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Alamat</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="/dashboard/superadmin/nonkandidat_view">
                        <td class="px-6 py-3 text-gray-700">0</td>
                        <td class="px-6 py-3 text-gray-700">Brahim Diaz</td>
                        <td class="px-6 py-3 text-gray-700">S1</td>
                        <td class="px-6 py-3 text-gray-700">UI UX Designer</td>
                        <td class="px-6 py-3 text-gray-700">Jawa Tengah</td>
                        <td class="px-6 py-4">
                            <a href="/dashboard/superadmin/recrutiment"
                                class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600">
                                View
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="talent_hunter_table" class="hidden bg-white border rounded-2xl shadow-sm overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left">
                        <th class="px-6 py-3 font-semibold text-gray-700">ID</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Nama Perusahaan</th>
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
                        <td class="px-6 py-3 text-gray-700">S1</td>
                        <td class="px-6 py-3 text-gray-700">UI UX Designer</td>
                        <td class="px-6 py-3 text-gray-700">Jawa Tengah</td>
                        <td class="px-6 py-4">
                            <a href="/dashboard/superadmin/pelamar/view/calon_kandidat"
                                class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600">
                                View
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
@endsection
