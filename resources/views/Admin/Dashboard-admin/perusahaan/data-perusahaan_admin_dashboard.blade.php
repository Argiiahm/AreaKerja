@extends('Admin.Dashboard-admin.layouts.index')

@section('admin-content')
    <div class="p-6" x-data="perusahaanTabs()">

        <!-- Tombol Tab & Search -->
        <div class="block lg:flex justify-between items-center mb-4">
            <div class="space-x-2 grid grid-cols-2 gap-2 lg:inline md:inline mb-5 lg:mb-0">
                <button @click="switchTab('perusahaan')" 
                    :class="selected === 'perusahaan' ? 'bg-gray-700 text-white' : 'border text-gray-700'"
                    class="px-4 py-2 rounded-md transition">Perusahaan</button>

                <button @click="switchTab('recruitment')" 
                    :class="selected === 'recruitment' ? 'bg-gray-700 text-white' : 'border text-gray-700'"
                    class="px-4 py-2 rounded-md transition">Recruitment</button>

                <button @click="switchTab('talent_hunter')" 
                    :class="selected === 'talent_hunter' ? 'bg-gray-700 text-white' : 'border text-gray-700'"
                    class="px-4 py-2 rounded-md transition">Talent Hunter</button>
            </div>

            <div class="flex items-center space-x-2">
                <input type="text" x-model="search"
                    placeholder="Cari nama / email / telepon / alamat..."
                    class="border border-gray-300 rounded-md px-3 py-2 w-64 focus:outline-none focus:ring-2 focus:ring-gray-400">
                <button class="bg-gray-700 text-white px-4 py-2 rounded-md">Cari</button>
            </div>
        </div>

        <!-- Table: Perusahaan -->
        <div x-show="selected === 'perusahaan'" x-cloak class="bg-white border rounded-2xl shadow-sm overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 text-left">
                        <th class="px-6 py-3 font-semibold text-gray-700">ID</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Nama Perusahaan</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Email</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Telepon</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Alamat</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Status</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Data as $d)
                        <tr x-show="matchesSearch('{{ strtolower($d->nama_perusahaan ?? '') }}', '{{ strtolower($d->users->email ?? '') }}', '{{ strtolower($d->telepon_perusahaan ?? '') }}', '{{ strtolower($d->alamatperusahaan()->latest()->first()->detail ?? '') }}')" 
                            class="border-t hover:bg-gray-50 transition">
                            <td class="px-6 py-3 text-gray-700">{{ $loop->iteration }}</td>
                            <td class="px-6 py-3 text-gray-700">{{ $d->nama_perusahaan }}</td>
                            <td class="px-6 py-3 text-gray-700">{{ $d->users->email }}</td>
                            <td class="px-6 py-3 text-gray-700">{{ $d->telepon_perusahaan }}</td>
                            <td class="px-6 py-3 text-gray-700">
                                {{ $d->alamatperusahaan()->latest()->first()->detail ?? 'Belum Ada Data' }}
                            </td>
                            <td class="px-6 py-3 text-gray-700">
                                @if ($d->users->status === 0)
                                    <span class="bg-blue-500 text-white text-sm font-medium px-2.5 py-0.5 rounded">Aktif</span>
                                @else
                                    <span class="bg-red-500 text-white text-sm font-medium px-2.5 py-0.5 rounded">Banned</span>
                                @endif
                            </td>
                            <td class="px-6 py-3 flex justify-center gap-2">
                                <a href="/dashboard/admin/perusahaan/view/{{ $d->id }}"
                                    class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600">
                                    <i class="ph ph-eye text-lg"></i>
                                </a>

                                {{-- Form Unban --}}
                                <form id="unbanned-{{ $d->users->id }}" action="/dashboard/admin/unbanned/{{ $d->users->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="status" value="0" hidden>
                                </form>

                                {{-- Tombol Ban / Unban --}}
                                @if ($d->users->status === 0)
                                    <button type="button" class="bg-red-500 text-white p-2 rounded hover:bg-red-600" 
                                        @click="openModal('{{ $d->users->id }}')">
                                        <i class="ph ph-x-circle text-lg"></i>
                                    </button>
                                @else
                                    <button type="submit" form="unbanned-{{ $d->users->id }}"
                                        class="bg-green-500 text-white p-2 rounded hover:bg-green-600">
                                        <i class="ph ph-check-circle text-lg"></i>
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Table: Recruitment -->
        <div x-show="selected === 'recruitment'" x-cloak class="bg-white border rounded-2xl shadow-sm overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 text-left">
                        <th class="px-6 py-3 font-semibold text-gray-700">ID</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Nama</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Email</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Telepon</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Alamat</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-t">
                        <td class="px-6 py-3 text-gray-700">001</td>
                        <td class="px-6 py-3 text-gray-700">PT Maju Jaya</td>
                        <td class="px-6 py-3 text-gray-700">info@majujaya.co.id</td>
                        <td class="px-6 py-3 text-gray-700">0812-9000-999</td>
                        <td class="px-6 py-3 text-gray-700">Jakarta Selatan</td>
                        <td class="px-6 py-3">
                            <a href="/dashboard/admin/recruitment/view/1" class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600">
                                <i class="ph ph-eye text-lg"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Table: Talent Hunter -->
        <div x-show="selected === 'talent_hunter'" x-cloak class="bg-white border rounded-2xl shadow-sm overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 text-left">
                        <th class="px-6 py-3 font-semibold text-gray-700">ID</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Nama</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Email</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Telepon</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Alamat</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-t">
                        <td class="px-6 py-3 text-gray-700">554</td>
                        <td class="px-6 py-3 text-gray-700">Talent Seeker ID</td>
                        <td class="px-6 py-3 text-gray-700">hr@talentseeker.id</td>
                        <td class="px-6 py-3 text-gray-700">0812-8888-5555</td>
                        <td class="px-6 py-3 text-gray-700">Bandung</td>
                        <td class="px-6 py-3">
                            <a href="/dashboard/admin/talenthunter/view/1" class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600">
                                <i class="ph ph-eye text-lg"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Modal Konfirmasi Bekukan -->
        <div id="modalBekukan" x-show="showModal" x-cloak
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <div class="bg-white text-gray-800 rounded-xl shadow-lg p-6 w-[350px]">
                <h2 class="text-center text-lg font-semibold mb-4">Konfirmasi Bekukan Akun</h2>
                <form :action="`/dashboard/admin/banned/${selectedUser}`" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="number" name="status" hidden value="1">
                    <textarea name="alasan_freeze_akun" placeholder="Masukkan alasan pembekuan..."
                        class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-red-500 resize-none"
                        rows="3"></textarea>
                    <div class="mt-4 flex justify-center gap-3">
                        <button type="submit" class="bg-red-500 text-white px-5 py-1 rounded hover:bg-red-600">Kirim</button>
                        <button type="button" @click="showModal=false"
                            class="bg-gray-400 text-white px-5 py-1 rounded hover:bg-gray-500">Batal</button>
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
                    return nama.includes(keyword) || email.includes(keyword) || telepon.includes(keyword) || alamat.includes(keyword);
                },
                openModal(userId) {
                    this.selectedUser = userId;
                    this.showModal = true;
                }
            };
        }
    </script>
@endsection
