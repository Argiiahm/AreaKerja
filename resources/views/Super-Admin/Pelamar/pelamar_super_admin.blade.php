@extends('Super-Admin.dashboard-superAdmin.dashboard-super_admin')

@section('super_admin-content')
    <div class="p-6">
        <div class="block lg:flex justify-between items-center mb-4">

            <div class="flex items-center gap-2">
                <a id="btnAdd" class="bg-orange-500 flex justify-center items-center px-4 py-1 rounded-md"
                    href="/dashboard/superadmin/pelamar/add/kandidat"><i class="ph ph-plus text-2xl text-white"></i></a>
                <select id="kategori_select" class="bg-orange-500 text-white px-10 py-2 rounded-md" name=""
                    id="">
                    <option id="kandidat_opt" value="kandidat">Kandidat</option>
                    <option id="non_kandidat_opt" value="non_kandidat">Non Kandidat</option>
                    <option id="calon_pelamar_opt" value="calon_pelamar">Calon Pelamar</option>
                </select>
            </div>

            <div class="flex items-center space-x-2 mt-0 lg:mt-0 md:mt">
                <input type="text" placeholder="name/username"
                    class="border border-gray-300 rounded-md px-3 py-2 w-64 focus:outline-none focus:ring-2 focus:ring-gray-400">
                <button class="bg-gray-700 text-white px-4 py-2 rounded-md">Cari</button>
            </div>
        </div>

        <div id="kandidat" class="bg-white border rounded-2xl shadow-sm overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left">
                        <th class="px-6 py-3 font-semibold text-gray-700">ID</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Nama</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Pendidikan</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Skill</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Alamat</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Detail</th>
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
                            <a href="/dashboard/superadmin/kandidat_view"
                                class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600">
                                View
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div id="non_kandidat" class="hidden bg-white border rounded-2xl shadow-sm overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left">
                        <th class="px-6 py-3 font-semibold text-gray-700">ID</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Nama</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Pendidikan</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Skill</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Alamat</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelamar as $p)
                        <tr class="/dashboard/superadmin/nonkandidat_view">
                            <td class="px-6 py-3 text-gray-700">{{ $loop->iteration }}</td>
                            <td class="px-6 py-3 text-gray-700">{{ $p->nama_pelamar ?? 'belum terisi' }}</td>
                            <td class="px-6 py-3 text-gray-700">
                                {{ $p->riwayat_pendidikan->sortByDesc('created_at')->first()->pendidikan ?? 'belum ada data' }}</td>
                            <td class="px-6 py-3 text-gray-700">
                                {{ $p->skill->sortByDesc('created_at')->first()->skill ?? 'belum ada data' }}</td>
                            <td class="px-6 py-3 text-gray-700">
                                {{ $p->alamat_pelamars->sortByDesc('created_at')->first()->detail ?? 'belum ada data' }}</td>
                            <td class="px-6 py-4">
                                <a href="/dashboard/superadmin/nonkandidat_view/{{ $p->id }}"
                                    class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600">
                                    View
                                </a>
                            </td>
                    @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="calon_pelamar" class="hidden bg-white border rounded-2xl shadow-sm overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left">
                        <th class="px-6 py-3 font-semibold text-gray-700">ID</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Nama</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Pendidikan</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Skill</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Alamat</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Detail</th>
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
