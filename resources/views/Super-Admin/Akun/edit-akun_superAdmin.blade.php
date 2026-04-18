@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="p-8 bg-[#F9FAFB] min-h-screen">
        <div class="max-w-7xl mx-auto">
            {{-- Header Section --}}
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
                <div class="flex items-center gap-4">
                    <a href="/dashboard/superadmin/akun"
                        class="p-2 bg-white border border-gray-200 rounded-xl text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                        <i class="ph ph-arrow-left text-xl"></i>
                    </a>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Edit Pengguna</h1>
                        <p class="text-sm text-gray-500 mt-1">Ubah data profil atau hak akses pengguna.</p>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <button type="button" form="editForm" onclick="document.getElementById('editForm').submit();"
                        class="px-5 py-2.5 text-sm font-semibold text-white bg-gray-900 hover:bg-black rounded-xl transition-colors shadow-sm inline-flex items-center">
                        <i class="ph ph-floppy-disk mr-2 text-lg"></i> Simpan Perubahan
                    </button>
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">
                <div
                    class="px-8 py-6 border-b border-gray-100 bg-gray-50/50 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                    <div class="flex items-center gap-4">
                        <div
                            class="w-16 h-16 bg-orange-50 text-orange-600 rounded-full flex items-center justify-center border border-orange-100 shrink-0">
                            <i class="ph ph-user-circle text-3xl"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-gray-900">Informasi Pengguna</h2>
                            <p class="text-sm text-gray-500">Perbarui data profil dan akses akun.</p>
                        </div>
                    </div>
                </div>

                <form id="editForm" action="/dasboard/superadmin/update/pengguna/{{ $Data->id }}" method="POST"
                    class="p-8 space-y-8">
                    @csrf
                    @method('PUT')

                    {{-- Kredensial --}}
                    <div class="space-y-5">
                        <h3 class="text-xs font-bold text-gray-400 uppercase tracking-widest border-b border-gray-100 pb-2">
                            Kredensial Login</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">ID User</label>
                                <input type="text"
                                    class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-500 focus:outline-none cursor-not-allowed"
                                    value="{{ $Data->id }}" readonly disabled>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email <span
                                        class="text-red-500">*</span></label>
                                <input type="email" name="email" value="{{ $Data->email }}" required
                                    placeholder="akun@example.com"
                                    class="w-full px-4 py-2.5 bg-white border border-gray-300 rounded-xl text-sm text-gray-900 focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 transition-all placeholder-gray-400">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap / Username <span
                                        class="text-red-500">*</span></label>
                                <input type="text" name="username" value="{{ $Data->username }}" required
                                    placeholder="Masukkan nama"
                                    class="w-full px-4 py-2.5 bg-white border border-gray-300 rounded-xl text-sm text-gray-900 focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 transition-all placeholder-gray-400">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Password Baru</label>
                                <input type="password" name="password" placeholder="Kosongkan jika tidak diubah"
                                    class="w-full px-4 py-2.5 bg-white border border-gray-300 rounded-xl text-sm text-gray-900 focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 transition-all placeholder-gray-400">
                                <p class="mt-1 text-[11px] text-gray-500">Biarkan kosong jika Anda tidak ingin mengganti
                                    password.</p>
                            </div>
                        </div>
                    </div>

                    {{-- Akses & Status --}}
                    <div class="space-y-5">
                        <h3 class="text-xs font-bold text-gray-400 uppercase tracking-widest border-b border-gray-100 pb-2">
                            Akses & Status</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Role User (Hak Akses) <span
                                        class="text-red-500">*</span></label>
                                <div class="relative">
                                    <select name="role" required
                                        class="w-full pl-4 pr-10 py-2.5 bg-white border border-gray-300 rounded-xl text-sm text-gray-900 focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 transition-all appearance-none cursor-pointer">
                                        <option value="" disabled>Pilih Role User</option>
                                        @foreach (['admin', 'pelamar', 'superadmin', 'finance', 'perusahaan'] as $r)
                                            <option value="{{ $r }}" {{ $Data->role === $r ? 'selected' : '' }}>
                                                {{ ucfirst($r) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400">
                                        <i class="ph ph-caret-down text-sm"></i>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Status Akun <span
                                        class="text-red-500">*</span></label>
                                <div class="relative">
                                    <select name="status" required
                                        class="w-full pl-4 pr-10 py-2.5 bg-white border border-gray-300 rounded-xl text-sm text-gray-900 focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 transition-all appearance-none cursor-pointer">
                                        <option value="" disabled>Pilih Status</option>
                                        <option value="0" {{ $Data->status == 0 ? 'selected' : '' }}>Aktif</option>
                                        <option value="1" {{ $Data->status == 1 ? 'selected' : '' }}>Tidak Aktif
                                            (Suspend/Banned)</option>
                                    </select>
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400">
                                        <i class="ph ph-caret-down text-sm"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @php
                        $alamat = null;
                        if ($Data->role === 'pelamar') {
                            $alamat = optional($Data->pelamars?->alamat_pelamars()->latest()->first());
                        } elseif ($Data->role === 'perusahaan') {
                            $alamat = optional($Data->perusahaan?->alamatperusahaan()->latest()->first());
                        } elseif ($Data->role === 'finance') {
                            $alamat = $Data->finance;
                        } elseif ($Data->role === 'admin') {
                            $alamat = $Data->admin;
                        } elseif ($Data->role === 'superadmin') {
                            $alamat = $Data->superadmins;
                        }
                    @endphp

                    {{-- Regional / Alamat --}}
                    <div class="space-y-5">
                        <h3 class="text-xs font-bold text-gray-400 uppercase tracking-widest border-b border-gray-100 pb-2">
                            Informasi Alamat</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Provinsi
                                    {{ $alamat && $alamat->provinsi ? '' : '(Opsional)' }}</label>
                                <div class="relative">
                                    <select id="provinsi" name="provinsi"
                                        class="w-full pl-4 pr-10 py-2.5 bg-white border border-gray-300 rounded-xl text-sm text-gray-900 focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 transition-all appearance-none cursor-pointer">
                                        <option value="" disabled {{ !$alamat || !$alamat->provinsi ? 'selected' : '' }}>
                                            Pilih Provinsi</option>
                                        @foreach ($Provinsi as $p)
                                            <option value="{{ $p->name }}" data-id="{{ $p->id }}" {{ $alamat?->provinsi == $p->name ? 'selected' : '' }}>
                                                {{ $p->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400">
                                        <i class="ph ph-caret-down text-sm"></i>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Kota / Kabupaten
                                    {{ $alamat && $alamat->kota ? '' : '(Opsional)' }}</label>
                                <div class="relative">
                                    <select id="kota" name="kota"
                                        class="w-full pl-4 pr-10 py-2.5 bg-white border border-gray-300 rounded-xl text-sm text-gray-900 focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 transition-all appearance-none cursor-pointer disabled:bg-gray-50 disabled:text-gray-400">
                                        @if($alamat?->kota)
                                            <option value="{{ $alamat->kota }}" selected>{{ $alamat->kota }}</option>
                                        @else
                                            <option value="" disabled selected>Pilih Kota/Kabupaten</option>
                                        @endif
                                    </select>
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400">
                                        <i class="ph ph-caret-down text-sm"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Kecamatan
                                    {{ $alamat && $alamat->kecamatan ? '' : '(Opsional)' }}</label>
                                <div class="relative">
                                    <select id="kecamatan" name="kecamatan"
                                        class="w-full pl-4 pr-10 py-2.5 bg-white border border-gray-300 rounded-xl text-sm text-gray-900 focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 transition-all appearance-none cursor-pointer disabled:bg-gray-50 disabled:text-gray-400">
                                        @if($alamat?->kecamatan)
                                            <option value="{{ $alamat->kecamatan }}" selected>{{ $alamat->kecamatan }}</option>
                                        @else
                                            <option value="" disabled selected>Pilih Kecamatan</option>
                                        @endif
                                    </select>
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400">
                                        <i class="ph ph-caret-down text-sm"></i>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Kode Pos</label>
                                <input type="text" name="kode_pos" value="{{ $alamat?->kode_pos }}" placeholder="Ex: 55281"
                                    class="w-full px-4 py-2.5 bg-white border border-gray-300 rounded-xl text-sm text-gray-900 focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 transition-all placeholder-gray-400">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Lengkap</label>
                            <textarea rows="3" name="detail" placeholder="Jalan, RT/RW, Patokan..."
                                class="w-full px-4 py-3 bg-white border border-gray-300 rounded-xl text-sm text-gray-900 focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 transition-all placeholder-gray-400 resize-none">{{ $alamat?->detail ?? $alamat?->detail_alamat }}</textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const kabupatenData = @json($Kabupaten);
        const kecamatanData = @json($Kecamatan);

        const provinsiSelect = document.getElementById('provinsi');
        const kotaSelect = document.getElementById('kota');
        const kecamatanSelect = document.getElementById('kecamatan');

        provinsiSelect.addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            const provinsiId = selectedOption.getAttribute('data-id');

            kotaSelect.innerHTML = '<option value="" disabled selected>Pilih Kota / Kabupaten</option>';
            kecamatanSelect.innerHTML = '<option value="" disabled selected>Pilih Kecamatan</option>';

            if (provinsiId) {
                const filteredKota = kabupatenData.filter(k => k.provinsi_id == provinsiId);
                filteredKota.forEach(k => {
                    const option = document.createElement('option');
                    option.value = k.name;
                    option.setAttribute('data-id', k.id);
                    option.textContent = k.name;
                    kotaSelect.appendChild(option);
                });
                kotaSelect.disabled = false;
            } else {
                kotaSelect.disabled = true;
                kecamatanSelect.disabled = true;
            }
        });

        kotaSelect.addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            const kotaId = selectedOption.getAttribute('data-id');

            kecamatanSelect.innerHTML = '<option value="" disabled selected>Pilih Kecamatan</option>';

            if (kotaId) {
                const filteredKecamatan = kecamatanData.filter(kec => kec.kabupaten_id == kotaId);
                filteredKecamatan.forEach(kec => {
                    const option = document.createElement('option');
                    option.value = kec.name;
                    option.textContent = kec.name;
                    kecamatanSelect.appendChild(option);
                });
                kecamatanSelect.disabled = false;
            } else {
                kecamatanSelect.disabled = true;
            }
        });
    </script>
@endsection