@extends('Super-Admin.layouts.index')
@section('super_admin-content')
    <div class="flex justify-center">
        <div class="w-full max-w-7xl p-6 space-y-6">

            <div class="flex flex-col lg:flex-row justify-between items-center gap-4">
                <div class="flex items-center gap-3">
                    <a href="/dashboard/superadmin/perusahaan/add/perusahaan"
                        class="bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 flex items-center gap-2 px-4 py-2 rounded-lg shadow-md transition-all">
                        <i class="ph ph-plus text-2xl"></i>
                        <span class="hidden sm:inline">Tambah</span>
                    </a>

                    <select id="kategori_select_perusahaan"
                        class="bg-gray-100 border border-gray-300 text-gray-800 px-4 py-2 rounded-lg focus:ring-2 focus:ring-orange-400 transition-all">
                        <option value="perusahaan">Perusahaan</option>
                        <option value="recruitment">Recruitment</option>
                        <option value="talent_hunter">Talent Hunter</option>
                        <option value="panggilan">Panggilan</option>
                    </select>
                </div>

                <div class="flex items-center gap-2">
                    <input type="text" placeholder="Cari nama / username..."
                        class="border border-gray-300 rounded-lg px-4 py-2 w-72 focus:ring-2 focus:ring-orange-400 outline-none transition-all">
                    <button
                        class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg shadow-md transition-all">Cari</button>
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">
                <div class="bg-gray-100 px-6 py-4 flex items-center justify-between">
                    <h2 id="table_title" class="text-lg font-semibold text-gray-700">Daftar Perusahaan</h2>
                </div>

                <div class="overflow-x-auto">
                    <table id="perusahaan_table" class="min-w-full divide-y divide-gray-200 text-sm text-gray-700">
                        <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                            <tr>
                                <th class="px-6 py-3 text-left">ID</th>
                                <th class="px-6 py-3 text-left">Nama</th>
                                <th class="px-6 py-3 text-left">Email</th>
                                <th class="px-6 py-3 text-left">Telepon</th>
                                <th class="px-6 py-3 text-left">Alamat</th>
                                <th class="px-6 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100"> 
                            @foreach ($Data as $d)
                                <tr class="hover:bg-gray-50 transition-all">
                                    <td class="px-6 py-4 font-medium">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4">{{ $d->nama_perusahaan }}</td>
                                    <td class="px-6 py-4">{{ $d->users->email }}</td>
                                    <td class="px-6 py-4">{{ $d->telepon_perusahaan }}</td>
                                    <td class="px-6 py-4">
                                        {{ $d->alamatperusahaan()->latest()->first()->detail ?? 'belum ada data' }}</td>
                                    <td class="px-6 py-4 text-center">
                                        <a href="/dashboard/superadmin/perusahaan/detail/{{ $d->id }}"
                                            class="bg-orange-500 hover:bg-orange-600 text-white px-3 py-1.5 rounded-md text-sm transition-all">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <table id="recruitment_table" class="hidden min-w-full divide-y divide-gray-200 text-sm text-gray-700">
                        <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                            <tr>
                                <th class="px-6 py-3 text-left">ID</th>
                                <th class="px-6 py-3 text-left">Nama</th>
                                <th class="px-6 py-3 text-left">Email</th>
                                <th class="px-6 py-3 text-left">Telepon</th>
                                <th class="px-6 py-3 text-left">Alamat</th>
                                <th class="px-6 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr class="hover:bg-gray-50 transition-all">
                                <td class="px-6 py-4 font-medium">001</td>
                                <td class="px-6 py-4">PT Maju Jaya</td>
                                <td class="px-6 py-4">info@majujaya.co.id</td>
                                <td class="px-6 py-4">0812-9000-999</td>
                                <td class="px-6 py-4">Jakarta Selatan</td>
                                <td class="px-6 py-4 text-center">
                                    <a href="/dashboard/superadmin/recrutiment"
                                        class="bg-orange-500 hover:bg-orange-600 text-white px-3 py-1.5 rounded-md text-sm transition-all">View</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <table id="talent_hunter_table"
                        class="hidden min-w-full divide-y divide-gray-200 text-sm text-gray-700">
                        <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                            <tr>
                                <th class="px-6 py-3 text-left">ID</th>
                                <th class="px-6 py-3 text-left">Nama</th>
                                <th class="px-6 py-3 text-left">Email</th>
                                <th class="px-6 py-3 text-left">Telepon</th>
                                <th class="px-6 py-3 text-left">Alamat</th>
                                <th class="px-6 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr class="hover:bg-gray-50 transition-all">
                                <td class="px-6 py-4 font-medium">554</td>
                                <td class="px-6 py-4">Talent Seeker ID</td>
                                <td class="px-6 py-4">hr@talentseeker.id</td>
                                <td class="px-6 py-4">0812-8888-5555</td>
                                <td class="px-6 py-4">Bandung</td>
                                <td class="px-6 py-4 text-center">
                                    <a href="/dashboard/superadmin/talenthunter"
                                        class="bg-orange-500 hover:bg-orange-600 text-white px-3 py-1.5 rounded-md text-sm transition-all">View</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <table id="table_panggilan" class="hidden min-w-full divide-y divide-gray-200 text-sm text-gray-700">
                        <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                            <tr>
                                <th class="px-6 py-3 text-left">ID</th>
                                <th class="px-6 py-3 text-left">Nama</th>
                                <th class="px-6 py-3 text-left">Email</th>
                                <th class="px-6 py-3 text-left">Telepon</th>
                                <th class="px-6 py-3 text-left">Kepentingan</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr class="hover:bg-gray-50 transition-all">
                                <td class="px-6 py-4 font-medium">774770</td>
                                <td class="px-6 py-4">Brahim Diaz</td>
                                <td class="px-6 py-4">brahim@company.com</td>
                                <td class="px-6 py-4">0812-3456-7890</td>
                                <td class="px-6 py-4">List Nama Pekerja</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <script>
        document.getElementById('kategori_select_perusahaan').addEventListener('change', function() {
            const selected = this.value;
            const tables = ['perusahaan', 'recruitment', 'talent_hunter', 'panggilan'];
            tables.forEach(name => {
                document.getElementById(`${name}_table`)?.classList.add('hidden');
            });
            document.getElementById(`${selected}_table`)?.classList.remove('hidden');
            document.getElementById('table_title').textContent =
                selected.charAt(0).toUpperCase() + selected.slice(1).replace('_', ' ');
        });
    </script>
@endsection
