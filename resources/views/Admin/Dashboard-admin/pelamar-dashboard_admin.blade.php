@extends('Admin.Dashboard-admin.layouts.index')

@section('admin-content')
    <div class="p-6" x-data="kandidatTabs()">

        <!-- TOP CONTROL -->
        <div class="flex flex-col lg:flex-row justify-between gap-4 mb-6">

            <!-- TABS -->
            <div class="flex bg-gray-100 p-1 rounded-2xl w-fit shadow-inner">

                <button @click="switchTab('kandidat')"
                    :class="selected === 'kandidat'
                        ?
                        'bg-white shadow text-gray-900' :
                        'text-gray-500 hover:text-gray-700'"
                    class="px-5 py-2 rounded-xl text-sm font-medium transition">
                    Kandidat
                </button>

                <button @click="switchTab('non_kandidat')"
                    :class="selected === 'non_kandidat'
                        ?
                        'bg-white shadow text-gray-900' :
                        'text-gray-500 hover:text-gray-700'"
                    class="px-5 py-2 rounded-xl text-sm font-medium transition">
                    Non Kandidat
                </button>

                <button @click="switchTab('calon_kandidat')"
                    :class="selected === 'calon_kandidat'
                        ?
                        'bg-white shadow text-gray-900' :
                        'text-gray-500 hover:text-gray-700'"
                    class="px-5 py-2 rounded-xl text-sm font-medium transition">
                    Calon Kandidat
                </button>

            </div>

            <!-- SEARCH -->
            <div class="relative w-full lg:w-80">
                <i class="ph ph-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="text" placeholder="Cari kandidat..." x-model="search"
                    class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-gray-200
                       focus:ring-2 focus:ring-orange-400 focus:border-orange-400
                       shadow-sm text-sm transition">
            </div>

        </div>

        <!-- TABLE -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">

            <div class="px-6 py-4 border-b border-gray-200 flex justify-between">
                <h2 class="font-semibold text-gray-800 text-sm capitalize">
                    <span x-text="selected.replace('_',' ')"></span>
                </h2>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-center">

                    <thead class="bg-gray-50 text-gray-600 uppercase text-xs border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-3 border-r border-gray-200">ID</th>
                            <th class="px-6 py-3 border-r border-gray-200">Nama</th>
                            <th class="px-6 py-3 border-r border-gray-200">Skill</th>
                            <th class="px-6 py-3 border-r border-gray-200">Pendidikan</th>
                            <th class="px-6 py-3 border-r border-gray-200">Alamat</th>
                            <th class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">

                        @foreach ($Data as $d)
                            <tr class="hover:bg-gray-50 transition"
                                x-show="
                                ((selected === 'kandidat' && @js($d->kategori) === 'kandidat aktif') ||
                                    (selected === 'non_kandidat' && (@js($d->kategori) === null || @js($d->kategori) === 'pelamar')) ||
                                    (selected === 'calon_kandidat' && @js($d->kategori) === 'calon kandidat'))
&&
                                matchesSearch(
                                    @js(strtolower($d->nama_pelamar ?? '')),
                                    @js(strtolower($d->skill->pluck('skill')->implode(', '))),
                                    @js(strtolower($d->riwayat_pendidikan->pluck('asal_pendidikan')->implode(', '))),
                                    @js(strtolower($d->alamat_pelamars->pluck('provinsi')->implode(', ')))
                                )
                            ">

                                <td class="px-6 py-3 border-r border-gray-200 text-gray-500">
                                    {{ $d->id }}
                                </td>

                                <td class="px-6 py-3 border-r border-gray-200 font-medium text-gray-800">
                                    {{ $d->nama_pelamar ?: 'N/A' }}
                                </td>

                                <td class="px-6 py-3 border-r border-gray-200 text-gray-600">
                                    {{ $d->skill->pluck('skill')->implode(', ') ?: 'N/A' }}
                                </td>

                                <td class="px-6 py-3 border-r border-gray-200 text-gray-600">
                                    {{ $d->riwayat_pendidikan->pluck('asal_pendidikan')->implode(', ') ?: 'N/A' }}
                                </td>

                                <td class="px-6 py-3 border-r border-gray-200 text-gray-600">
                                    {{ $d->alamat_pelamars->pluck('provinsi')->implode(', ') ?: 'N/A' }}
                                </td>

                                <td class="px-6 py-3">
                                    <div class="flex justify-center gap-2">

                                        <a href="/dashboard/admin/kandidat/view/{{ $d->id }}"
                                            class="p-2 rounded-lg bg-gray-100 hover:bg-blue-500 hover:text-white transition">
                                            <i class="ph ph-eye"></i>
                                        </a>
                                    </div>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
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
                    const keyword = (this.search || '').toLowerCase().trim();
                    if (!keyword) return true;

                    return (
                        (nama || '').includes(keyword) ||
                        (skill || '').includes(keyword) ||
                        (pendidikan || '').includes(keyword) ||
                        (alamat || '').includes(keyword)
                    );
                }
            }
        }
    </script>
@endsection
