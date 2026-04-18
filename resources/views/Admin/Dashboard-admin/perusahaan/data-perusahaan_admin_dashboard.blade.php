@extends('Admin.Dashboard-admin.layouts.index')

@section('admin-content')
    <div class="p-6" x-data="perusahaanTabs()">

        <div class="flex flex-col lg:flex-row justify-between gap-4 mb-6">
            <div class="flex bg-gray-100 p-1 rounded-2xl w-fit shadow-inner">
                <button @click="switchTab('perusahaan')"
                    :class="selected === 'perusahaan' ? 'bg-white shadow text-gray-900' : 'text-gray-500 hover:text-gray-700'"
                    class="px-5 py-2 rounded-xl text-sm font-medium transition">Perusahaan</button>

                <button @click="switchTab('recruitment')"
                    :class="selected === 'recruitment' ? 'bg-white shadow text-gray-900' : 'text-gray-500 hover:text-gray-700'"
                    class="px-5 py-2 rounded-xl text-sm font-medium transition">Recruitment</button>

                <button @click="switchTab('talent_hunter')"
                    :class="selected === 'talent_hunter' ? 'bg-white shadow text-gray-900' : 'text-gray-500 hover:text-gray-700'"
                    class="px-5 py-2 rounded-xl text-sm font-medium transition">Talent Hunter</button>
            </div>

            <div class="relative w-full lg:w-80">
                <i class="ph ph-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="text" x-model="search"
                    class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 shadow-sm text-sm transition"
                    placeholder="Cari nama / email / telepon / alamat...">
            </div>
        </div>

        <div x-show="selected === 'perusahaan'" x-cloak
            class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-center">
                    <thead class="bg-gray-50 text-gray-600 uppercase text-xs border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-3 border-r border-gray-200">ID</th>
                            <th class="px-6 py-3 border-r border-gray-200">Nama Perusahaan</th>
                            <th class="px-6 py-3 border-r border-gray-200">Email</th>
                            <th class="px-6 py-3 border-r border-gray-200">Telepon</th>
                            <th class="px-6 py-3 border-r border-gray-200">Alamat</th>
                            <th class="px-6 py-3 border-r border-gray-200">Status</th>
                            <th class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($Data as $d)
                            <tr class="hover:bg-gray-50 transition"
                                x-show="matchesSearch('{{ strtolower($d->nama_perusahaan ?? '') }}','{{ strtolower($d->users->email ?? '') }}','{{ strtolower($d->telepon_perusahaan ?? '') }}','{{ strtolower($d->alamatperusahaan()->latest()->first()->detail ?? '') }}')">
                                <td class="px-6 py-3 border-r border-gray-200">{{ $loop->iteration }}</td>
                                <td class="px-6 py-3 border-r border-gray-200">{{ $d->nama_perusahaan }}</td>
                                <td class="px-6 py-3 border-r border-gray-200">{{ $d->users->email }}</td>
                                <td class="px-6 py-3 border-r border-gray-200">{{ $d->telepon_perusahaan }}</td>
                                <td class="px-6 py-3 border-r border-gray-200">
                                    {{ $d->alamatperusahaan()->latest()->first()->detail ?? 'Belum Ada Data' }}</td>
                                <td class="px-6 py-3 border-r border-gray-200">
                                    @if ($d->users->status === 0)
                                        <span class="bg-blue-500 text-white text-xs px-2 py-1 rounded">Aktif</span>
                                    @else
                                        <span class="bg-red-500 text-white text-xs px-2 py-1 rounded">Banned</span>
                                    @endif
                                </td>
                                <td class="px-6 py-3 flex justify-center gap-2">
                                    <a href="/dashboard/admin/perusahaan/view/{{ $d->id }}"
                                        class="p-2 rounded-lg bg-gray-100 hover:bg-blue-500 hover:text-white transition">
                                        <i class="ph ph-eye text-lg"></i>
                                    </a>

                                    <form id="unbanned-{{ $d->users->id }}"
                                        action="/dashboard/admin/unbanned/{{ $d->users->id }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="number" name="status" value="0" hidden>
                                    </form>

                                    @if ($d->users->status === 0)
                                        <button type="button"
                                            class="p-2 rounded-lg bg-gray-100 hover:bg-red-500 hover:text-white transition"
                                            @click="openModal('{{ $d->users->id }}')">
                                            <i class="ph ph-x-circle text-lg"></i>
                                        </button>
                                    @else
                                        <button type="submit" form="unbanned-{{ $d->users->id }}"
                                            class="p-2 rounded-lg bg-gray-100 hover:bg-green-500 hover:text-white transition">
                                            <i class="ph ph-check-circle text-lg"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div x-show="selected === 'recruitment'" x-cloak
            class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-center">
                    <thead class="bg-gray-50 text-gray-600 uppercase text-xs border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-3 border-r border-gray-200">ID</th>
                            <th class="px-6 py-3 border-r border-gray-200">Nama</th>
                            <th class="px-6 py-3 border-r border-gray-200">Email</th>
                            <th class="px-6 py-3 border-r border-gray-200">Telepon</th>
                            <th class="px-6 py-3 border-r border-gray-200">Alamat</th>
                            <th class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($Recruitments as $recruitment)
                            @if ($recruitment->status === 'diterima')
                                <tr class="hover:bg-gray-50 transition"
                                    x-show="matchesSearch('{{ strtolower($recruitment->lowongan_perusahaan->perusahaan->nama_perusahaan ?? '') }}','{{ strtolower($recruitment->lowongan_perusahaan->perusahaan->users->email ?? '') }}','{{ strtolower($recruitment->lowongan_perusahaan->perusahaan->telepon_perusahaan ?? '') }}','{{ strtolower($recruitment->lowongan_perusahaan->perusahaan->alamatperusahaan()->latest()->first()->detail ?? '') }}')">
                                    <td class="px-6 py-3 border-r border-gray-200">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-3 border-r border-gray-200">
                                        {{ $recruitment->lowongan_perusahaan->perusahaan->nama_perusahaan }}</td>
                                    <td class="px-6 py-3 border-r border-gray-200">
                                        {{ $recruitment->lowongan_perusahaan->perusahaan->users->email }}</td>
                                    <td class="px-6 py-3 border-r border-gray-200">
                                        {{ $recruitment->lowongan_perusahaan->perusahaan->telepon_perusahaan }}</td>
                                    <td class="px-6 py-3 border-r border-gray-200">
                                        {{ $recruitment->lowongan_perusahaan->perusahaan->alamatperusahaan()->latest()->first()->detail ?? 'belum ada data' }}
                                    </td>
                                    <td class="px-6 py-3">
                                        <a href="/dashboard/admin/recruitment/view/{{ $recruitment->pelamar->id }}"
                                            class="p-2 rounded-lg bg-gray-100 hover:bg-blue-500 hover:text-white transition">
                                            <i class="ph ph-eye text-lg"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div x-show="selected === 'talent_hunter'" x-cloak
            class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-center">
                    <thead class="bg-gray-50 text-gray-600 uppercase text-xs border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-3 border-r border-gray-200">ID</th>
                            <th class="px-6 py-3 border-r border-gray-200">Nama</th>
                            <th class="px-6 py-3 border-r border-gray-200">Email</th>
                            <th class="px-6 py-3 border-r border-gray-200">Telepon</th>
                            <th class="px-6 py-3 border-r border-gray-200">Alamat</th>
                            <th class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($talent_hunter as $th)
                            <tr class="hover:bg-gray-50 transition"
                                x-show="matchesSearch('{{ strtolower($th->perusahaan->nama_perusahaan ?? '') }}','{{ strtolower($th->perusahaan->users->email ?? '') }}','{{ strtolower($th->perusahaan->telepon_perusahaan ?? '') }}','{{ strtolower($th->alamat ?? '') }}')">
                                <td class="px-6 py-3 border-r border-gray-200">{{ $loop->iteration }}</td>
                                <td class="px-6 py-3 border-r border-gray-200">{{ $th->perusahaan->nama_perusahaan }}</td>
                                <td class="px-6 py-3 border-r border-gray-200">{{ $th->perusahaan->users->email }}</td>
                                <td class="px-6 py-3 border-r border-gray-200">{{ $th->perusahaan->telepon_perusahaan }}
                                </td>
                                <td class="px-6 py-3 border-r border-gray-200">{{ $th->alamat }}</td>
                                <td class="px-6 py-3">
                                    <a href="/dashboard/admin/perusahaan/talenthunter/view/{{ $th->id }}"
                                        class="p-2 rounded-lg bg-gray-100 hover:bg-blue-500 hover:text-white transition">
                                        <i class="ph ph-eye text-lg"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div x-show="showModal" x-cloak class="fixed inset-0 z-[9999] flex items-center justify-center bg-black/50">
            <div class="bg-white rounded-xl shadow-lg p-6 w-[350px]">
                <h2 class="text-center text-lg font-semibold mb-4">Banned Akun Ini?</h2>
                <form :action="`/dashboard/admin/banned/${selectedUser}`" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="number" name="status" hidden value="1">
                    <textarea placeholder="Alasan" name="alasan_freeze_akun" class="w-full border border-gray-200 rounded-md p-2" rows="3"></textarea>
                    <div class="mt-4 flex justify-center gap-3">
                        <button type="submit" class="bg-red-500 text-white px-5 py-1 rounded">Kirim</button>
                        <button type="button" @click="showModal=false"
                            class="bg-gray-400 text-white px-5 py-1 rounded">Batal</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
        function perusahaanTabs() {
            return {
                selected: localStorage.getItem('admin_tab') || 'perusahaan',
                search: '',
                showModal: false,
                selectedUser: null,
                switchTab(tab) {
                    this.selected = tab;
                    localStorage.setItem('admin_tab', tab);
                },
                matchesSearch(nama, email, telepon, alamat) {
                    const keyword = this.search.toLowerCase().trim();
                    if (keyword === '') return true;
                    return nama.includes(keyword) || email.includes(keyword) || telepon.includes(keyword) || alamat
                        .includes(keyword);
                },
                openModal(userId) {
                    this.selectedUser = userId;
                    this.showModal = true;
                }
            }
        }
    </script>
@endsection
