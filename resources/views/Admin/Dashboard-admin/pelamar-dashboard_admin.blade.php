@extends('Admin.Dashboard-admin.layouts.index')

@section('admin-content')
    <div class="p-6" x-data="kandidatTabs()">

        {{-- Tombol & Search --}}
        <div class="block lg:flex justify-between items-center mb-4">
            <div class="space-x-2 grid grid-cols-2 gap-2 lg:inline md:inline mb-5 lg:mb-0">
                <button @click="switchTab('kandidat')" 
                    :class="selected === 'kandidat' ? 'bg-gray-700 text-white' : 'border text-gray-700'" 
                    class="px-4 py-2 rounded-md transition">Kandidat</button>
                <button @click="switchTab('non_kandidat')" 
                    :class="selected === 'non_kandidat' ? 'bg-gray-700 text-white' : 'border text-gray-700'" 
                    class="px-4 py-2 rounded-md transition">Non Kandidat</button>
                <button @click="switchTab('calon_kandidat')" 
                    :class="selected === 'calon_kandidat' ? 'bg-gray-700 text-white' : 'border text-gray-700'" 
                    class="px-4 py-2 rounded-md transition">Calon Kandidat</button>
            </div>

            <div class="flex items-center space-x-2">
                <input type="text" placeholder="Cari nama / skill / pendidikan..." 
                    x-model="search"
                    class="border border-gray-300 rounded-md px-4 py-2 w-full md:w-64 focus:outline-none focus:ring-2 focus:ring-orange-400">
                <button class="bg-gray-700 hover:bg-gray-800 text-white px-5 py-2 rounded-md transition">Cari</button>
            </div>
        </div>

        {{-- Table: Kandidat --}}
        <div x-show="selected === 'kandidat'" x-cloak class="bg-white border rounded-2xl shadow-sm overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 text-left">
                        <th class="px-6 py-3 font-semibold text-gray-700">ID</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Nama</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Skill</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Pendidikan</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Alamat</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Data as $d)
                        @if ($d->kategori === 'kandidat aktif')
                            <tr x-show="matchesSearch('{{ strtolower($d->nama_pelamar ?? '') }}', '{{ strtolower($d->skill->pluck('skill')->implode(', ')) }}', '{{ strtolower($d->riwayat_pendidikan->pluck('asal_pendidikan')->implode(', ')) }}', '{{ strtolower($d->alamat_pelamars()->latest()->first()->provinsi ?? '') }}')" 
                                class="border-t hover:bg-gray-50 transition">
                                <td class="px-6 py-3 text-gray-700">{{ $d->id }}</td>
                                <td class="px-6 py-3 text-gray-700">{{ $d->nama_pelamar }}</td>
                                <td class="px-6 py-3 text-gray-700">{{ $d->skill->pluck('skill')->implode(', ') }}</td>
                                <td class="px-6 py-3 text-gray-700">{{ $d->riwayat_pendidikan->pluck('asal_pendidikan')->implode(', ') }}</td>
                                <td class="px-6 py-3 text-gray-700">{{ $d->alamat_pelamars()->latest()->first()->provinsi ?? '' }}</td>
                                <td class="px-6 py-3 flex gap-2">
                                    <a href="/dashboard/admin/kandidat/view/{{ $d->id }}"
                                        class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600">
                                        <i class="ph ph-eye text-lg"></i>
                                    </a>
                                    <button class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600">
                                        <i class="ph ph-x-circle text-lg"></i>
                                    </button>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Table: Non Kandidat --}}
        <div x-show="selected === 'non_kandidat'" x-cloak class="bg-white border rounded-2xl shadow-sm overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 text-left">
                        <th class="px-6 py-3 font-semibold text-gray-700">ID</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Nama</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Skill</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Pendidikan</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Alamat</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Data as $d)
                        @if ($d->kategori === null || $d->kategori === 'pelamar')
                            <tr x-show="matchesSearch('{{ strtolower($d->nama_pelamar ?? '') }}', '{{ strtolower($d->skill->pluck('skill')->implode(', ')) }}', '{{ strtolower($d->riwayat_pendidikan->pluck('asal_pendidikan')->implode(', ')) }}', '{{ strtolower($d->alamat_pelamars->pluck('provinsi')->implode(', ')) }}')" 
                                class="border-t hover:bg-gray-50 transition">
                                <td class="px-6 py-3 text-gray-700">{{ $d->id }}</td>
                                <td class="px-6 py-3 text-gray-700">{{ $d->nama_pelamar }}</td>
                                <td class="px-6 py-3 text-gray-700">{{ $d->skill->pluck('skill')->implode(', ') }}</td>
                                <td class="px-6 py-3 text-gray-700">{{ $d->riwayat_pendidikan->pluck('asal_pendidikan')->implode(', ') }}</td>
                                <td class="px-6 py-3 text-gray-700">{{ $d->alamat_pelamars->pluck('provinsi')->implode(', ') }}</td>
                                <td class="px-6 py-3 flex gap-2">
                                    <a href="/dashboard/admin/nonkandidat/view/{{ $d->id }}"
                                        class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600">
                                        <i class="ph ph-eye text-lg"></i>
                                    </a>
                                    <button class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600">
                                        <i class="ph ph-x-circle text-lg"></i>
                                    </button>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Table: Calon Kandidat --}}
        <div x-show="selected === 'calon_kandidat'" x-cloak class="bg-white border rounded-2xl shadow-sm overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 text-left">
                        <th class="px-6 py-3 font-semibold text-gray-700">ID</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Nama</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Skill</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Pendidikan</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Alamat</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Data as $d)
                        @if ($d->kategori === 'calon kandidat')
                            <tr x-show="matchesSearch('{{ strtolower($d->nama_pelamar ?? '') }}', '{{ strtolower($d->skill->pluck('skill')->implode(', ')) }}', '{{ strtolower($d->riwayat_pendidikan->pluck('asal_pendidikan')->implode(', ')) }}', '{{ strtolower($d->alamat_pelamars->pluck('provinsi')->implode(', ')) }}')" 
                                class="border-t hover:bg-gray-50 transition">
                                <td class="px-6 py-3 text-gray-700">{{ $d->id }}</td>
                                <td class="px-6 py-3 text-gray-700">{{ $d->nama_pelamar }}</td>
                                <td class="px-6 py-3 text-gray-700">{{ $d->skill->pluck('skill')->implode(', ') }}</td>
                                <td class="px-6 py-3 text-gray-700">{{ $d->riwayat_pendidikan->pluck('asal_pendidikan')->implode(', ') }}</td>
                                <td class="px-6 py-3 text-gray-700">{{ $d->alamat_pelamars->pluck('provinsi')->implode(', ') }}</td>
                                <td class="px-6 py-3 flex gap-2">
                                    <a href="/dashboard/admin/calonkandidat/view/{{ $d->id }}"
                                        class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600">
                                        <i class="ph ph-eye text-lg"></i>
                                    </a>
                                    <button class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600">
                                        <i class="ph ph-x-circle text-lg"></i>
                                    </button>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    <script>
        function kandidatTabs() {
            return {
                selected: localStorage.getItem('admin_kandidat_tab') || 'kandidat',
                search: '',
                switchTab(tab) {
                    this.selected = tab;
                    localStorage.setItem('admin_kandidat_tab', tab);
                },
                matchesSearch(nama, skill, pendidikan, alamat) {
                    const keyword = this.search.toLowerCase().trim();
                    if (keyword === '') return true;
                    return (
                        nama.includes(keyword) ||
                        skill.includes(keyword) ||
                        pendidikan.includes(keyword) ||
                        alamat.includes(keyword)
                    );
                }
            }
        }
    </script>
@endsection
