@extends('Super-Admin.layouts.index')
@section('super_admin-content')
    {{ session()->forget('pelamar_id') }}
    {{-- {{ session()->forget('pelamar')->users->email }} --}}
    <div class="p-6 flex justify-center" x-data="pelamarTabs()">
        <div class="w-full max-w-7xl">

            <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">

                <div class="flex items-center gap-3">
                    {{-- Tombol Tambah, href dinamis mengikuti value dropdown --}}
                    <a :href="getAddUrl(selected)"
                        class="bg-orange-500 hover:bg-orange-600 transition text-white flex justify-center items-center px-4 py-2 rounded-md shadow">
                        <i class="ph ph-plus text-lg"></i>
                    </a>

                    <select x-model="selected" @change="saveState"
                        class="bg-orange-500 text-white px-6 py-2 rounded-md focus:outline-none cursor-pointer hover:bg-orange-600 transition">
                        <option value="kandidat">Kandidat</option>
                        <option value="non_kandidat">Non Kandidat</option>
                        <option value="calon_kandidat">Calon Kandidat</option>
                    </select>
                </div>

                <div class="flex items-center gap-2 w-full md:w-auto justify-end">
                    <input type="text" placeholder="Cari nama / username..."
                        class="border border-gray-300 rounded-md px-4 py-2 w-full md:w-64 focus:outline-none focus:ring-2 focus:ring-orange-400">
                    <button class="bg-gray-700 hover:bg-gray-800 text-white px-5 py-2 rounded-md transition">Cari</button>
                </div>
            </div>

            {{-- KANDIDAT --}}
            <div id="kandidat" x-show="selected === 'kandidat'" x-cloak
                class="bg-white border rounded-2xl shadow-sm overflow-x-auto transition-all">
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
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($pelamar as $p)
                            @if ($p->kategori === 'kandidat aktif')
                                <tr class="hover:bg-gray-50 border-b">
                                    <td class="px-6 py-3 text-gray-700">{{ $i++ }}</td>
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
                                        <a href="/dashboard/superadmin/kandidat_view/{{ $p->id }}"
                                            class="bg-gray-600 hover:bg-gray-700 text-white px-3 py-1.5 rounded-md transition">
                                            View
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- NON KANDIDAT --}}
            <div id="non_kandidat" x-show="selected === 'non_kandidat'" x-cloak
                class="bg-white border rounded-2xl shadow-sm overflow-x-auto mt-6 transition-all">
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
                            @if ($p->kategori === null)
                                <tr class="hover:bg-gray-50 border-b">
                                    <td class="px-6 py-3 text-gray-700">{{ $i++ }}</td>
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
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- CALON KANDIDAT --}}
            <div id="calon_kandidat" x-show="selected === 'calon_kandidat'" x-cloak
                class="bg-white border rounded-2xl shadow-sm overflow-x-auto mt-6 transition-all">
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
                            @if ($p->kategori === 'calon kandidat')
                                <tr class="hover:bg-gray-50 border-b">
                                    <td class="px-6 py-3 text-gray-700">{{ $i++ }}</td>
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
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <script>
        function pelamarTabs() {
            return {
                selected: localStorage.getItem('pelamar_tab') || 'kandidat',
                saveState() {
                    localStorage.setItem('pelamar_tab', this.selected);
                },
                getAddUrl(tab) {
                    return `/dashboard/superadmin/pelamar/add/${tab}`;
                }
            }
        }
    </script>
@endsection
