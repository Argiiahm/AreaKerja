@extends('Super-Admin.dashboard-superAdmin.dashboard-super_admin')

@section('super_admin-content')
<div class="p-6 flex justify-center">
    <div class="w-full max-w-7xl">

        {{-- 🔸 Header: Tombol & Pencarian --}}
        <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
            
            {{-- Kiri: Tambah & Pilih Kategori --}}
            <div class="flex items-center gap-3">
                <a id="btnAdd" href="/dashboard/superadmin/pelamar/add/kandidat"
                    class="bg-orange-500 hover:bg-orange-600 transition text-white flex justify-center items-center px-4 py-2 rounded-md shadow">
                    <i class="ph ph-plus text-lg"></i>
                </a>

                <select id="kategori_select"
                    class="bg-orange-500 text-white px-6 py-2 rounded-md focus:outline-none cursor-pointer hover:bg-orange-600 transition">
                    <option id="kandidat_opt" value="kandidat">Kandidat</option>
                    <option id="non_kandidat_opt" value="non_kandidat">Non Kandidat</option>
                    <option id="calon_pelamar_opt" value="calon_pelamar">Calon Pelamar</option>
                </select>
            </div>

            {{-- Kanan: Search --}}
            <div class="flex items-center gap-2 w-full md:w-auto justify-end">
                <input type="text" placeholder="Cari nama / username..."
                    class="border border-gray-300 rounded-md px-4 py-2 w-full md:w-64 focus:outline-none focus:ring-2 focus:ring-orange-400">
                <button class="bg-gray-700 hover:bg-gray-800 text-white px-5 py-2 rounded-md transition">Cari</button>
            </div>
        </div>

        {{-- 🔸 Tabel Kandidat --}}
        <div id="kandidat" class="bg-white border rounded-2xl shadow-sm overflow-x-auto transition-all">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-100 text-left text-gray-700">
                        <th class="px-6 py-3 font-semibold">ID</th>
                        <th class="px-6 py-3 font-semibold">Nama</th>
                        <th class="px-6 py-3 font-semibold">Pendidikan</th>
                        <th class="px-6 py-3 font-semibold">Skill</th>
                        <th class="px-6 py-3 font-semibold">Alamat</th>
                        <th class="px-6 py-3 font-semibold text-center">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-gray-50 border-b">
                        <td class="px-6 py-3 text-gray-700">774770</td>
                        <td class="px-6 py-3 text-gray-700">Brahim Diaz</td>
                        <td class="px-6 py-3 text-gray-700">S1</td>
                        <td class="px-6 py-3 text-gray-700">UI UX Designer</td>
                        <td class="px-6 py-3 text-gray-700">Jawa Tengah</td>
                        <td class="px-6 py-4 text-center">
                            <a href="/dashboard/superadmin/kandidat_view"
                                class="bg-gray-600 hover:bg-gray-700 text-white px-3 py-1.5 rounded-md transition">
                                View
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- 🔸 Tabel Non Kandidat --}}
        <div id="non_kandidat" class="hidden bg-white border rounded-2xl shadow-sm overflow-x-auto mt-6 transition-all">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-100 text-left text-gray-700">
                        <th class="px-6 py-3 font-semibold">ID</th>
                        <th class="px-6 py-3 font-semibold">Nama</th>
                        <th class="px-6 py-3 font-semibold">Pendidikan</th>
                        <th class="px-6 py-3 font-semibold">Skill</th>
                        <th class="px-6 py-3 font-semibold">Alamat</th>
                        <th class="px-6 py-3 font-semibold text-center">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelamar as $p)
                        <tr class="hover:bg-gray-50 border-b">
                            <td class="px-6 py-3 text-gray-700">{{ $loop->iteration }}</td>
                            <td class="px-6 py-3 text-gray-700">{{ $p->nama_pelamar ?? 'belum terisi' }}</td>
                            <td class="px-6 py-3 text-gray-700">
                                {{ $p->riwayat_pendidikan->sortByDesc('created_at')->first()->pendidikan ?? 'belum ada data' }}
                            </td>
                            <td class="px-6 py-3 text-gray-700">
                                {{ $p->skill->sortByDesc('created_at')->first()->skill ?? 'belum ada data' }}
                            </td>
                            <td class="px-6 py-3 text-gray-700">
                                {{ $p->alamat_pelamars->sortByDesc('created_at')->first()->detail ?? 'belum ada data' }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                <a href="/dashboard/superadmin/nonkandidat_view/{{ $p->id }}"
                                    class="bg-gray-600 hover:bg-gray-700 text-white px-3 py-1.5 rounded-md transition">
                                    View
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- 🔸 Tabel Calon Pelamar --}}
        <div id="calon_pelamar" class="hidden bg-white border rounded-2xl shadow-sm overflow-x-auto mt-6 transition-all">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-100 text-left text-gray-700">
                        <th class="px-6 py-3 font-semibold">ID</th>
                        <th class="px-6 py-3 font-semibold">Nama</th>
                        <th class="px-6 py-3 font-semibold">Pendidikan</th>
                        <th class="px-6 py-3 font-semibold">Skill</th>
                        <th class="px-6 py-3 font-semibold">Alamat</th>
                        <th class="px-6 py-3 font-semibold text-center">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-gray-50 border-b">
                        <td class="px-6 py-3 text-gray-700">774770</td>
                        <td class="px-6 py-3 text-gray-700">Brahim Diaz</td>
                        <td class="px-6 py-3 text-gray-700">S1</td>
                        <td class="px-6 py-3 text-gray-700">UI UX Designer</td>
                        <td class="px-6 py-3 text-gray-700">Jawa Tengah</td>
                        <td class="px-6 py-4 text-center">
                            <a href="/dashboard/superadmin/pelamar/view/calon_kandidat"
                                class="bg-gray-600 hover:bg-gray-700 text-white px-3 py-1.5 rounded-md transition">
                                View
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
