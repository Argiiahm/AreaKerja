@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="rounded-lg border border-gray-300 p-8 w-full">
        <h2 class="text-xl font-semibold text-center mb-6">Edit Profile</h2>

        <div class="flex justify-center mb-8">
            <div class="w-20 h-20 bg-gray-400 rounded-full flex items-center justify-center">
                <i class="ph ph-user text-4xl"></i>
            </div>
        </div>

        <form action="/dasboard/superadmin/update/pengguna/{{ $Data->id }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">ID User <span
                            class="text-red-500">*</span></label>
                    <input type="text" readonly value="{{ $Data->id }}" class="w-full px-3 py-2 border rounded-md">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email <span
                            class="text-red-500">*</span></label>
                    <input type="email" name="email" value="{{ $Data->email }}"
                        class="w-full px-3 py-2 border rounded-md">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap <span
                        class="text-red-500">*</span></label>
                <input type="text" name="username" value="{{ $Data->username }}"
                    class="w-full px-3 py-2 border rounded-md">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input type="password" name="password" placeholder="Lewati Jika Tidak Ingin Ubah Password"
                    class="w-full px-3 py-2 border rounded-md">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Role</label>
                    <select name="role" class="w-full px-3 py-2 border rounded-md">
                        @foreach (['admin', 'pelamar', 'superadmin', 'finance', 'perusahaan'] as $r)
                            <option value="{{ $r }}" {{ $Data->role === $r ? 'selected' : '' }}>
                                {{ ucfirst($r) }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select name="status" class="w-full px-3 py-2 border rounded-md">
                        <option value="0" {{ $Data->status == 0 ? 'selected' : '' }}>Aktif</option>
                        <option value="1" {{ $Data->status == 1 ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
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

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Provinsi</label>
                    <select id="provinsi" name="provinsi" class="w-full px-3 py-2 border rounded-md">
                        <option disabled>Pilih Provinsi</option>
                        @foreach ($Provinsi as $p)
                            <option value="{{ $p->name }}" data-id="{{ $p->id }}"
                                {{ $alamat?->provinsi == $p->name ? 'selected' : '' }}>
                                {{ $p->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kota / Kabupaten</label>
                    <select id="kota" name="kota" class="w-full px-3 py-2 border rounded-md">
                        <option selected>{{ $alamat?->kota ?? 'Pilih Kota' }}</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kecamatan</label>
                    <select id="kecamatan" name="kecamatan" class="w-full px-3 py-2 border rounded-md">
                        <option selected>{{ $alamat?->kecamatan ?? 'Pilih Kecamatan' }}</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kode Pos</label>
                    <input type="text" name="kode_pos" value="{{ $alamat?->kode_pos }}"
                        class="w-full px-3 py-2 border rounded-md">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Lengkap</label>
                <textarea name="detail" rows="3" class="w-full px-3 py-2 border rounded-md resize-none">{{ $alamat?->detail ?? $alamat->detail_alamat }}</textarea>
            </div>

            <div class="flex justify-center gap-4 pt-4">
                <button type="submit" class="bg-orange-500 text-white font-medium py-2 px-8 rounded-md">Simpan</button>
                <button type="button" onclick="history.back()"
                    class="bg-gray-400 text-white font-medium py-2 px-8 rounded-md">Batal</button>
            </div>
        </form>
    </div>

    <script>
        const kabupatenData = @json($Kabupaten);
        const kecamatanData = @json($Kecamatan);

        const provinsiSelect = document.getElementById('provinsi');
        const kotaSelect = document.getElementById('kota');
        const kecamatanSelect = document.getElementById('kecamatan');

        provinsiSelect.addEventListener('change', function() {
            const provinsiId = this.selectedOptions[0].getAttribute('data-id');
            kotaSelect.innerHTML = '<option disabled selected>Pilih Kota / Kabupaten</option>';
            kecamatanSelect.innerHTML = '<option disabled selected>Pilih Kecamatan</option>';
            const filteredKota = kabupatenData.filter(k => k.provinsi_id == provinsiId);
            filteredKota.forEach(k => {
                const option = document.createElement('option');
                option.value = k.name;
                option.dataset.id = k.id;
                option.textContent = k.name;
                kotaSelect.appendChild(option);
            });
        });

        kotaSelect.addEventListener('change', function() {
            const kotaId = this.selectedOptions[0].dataset.id;
            kecamatanSelect.innerHTML = '<option disabled selected>Pilih Kecamatan</option>';
            const filteredKecamatan = kecamatanData.filter(k => k.kabupaten_id == kotaId);
            filteredKecamatan.forEach(k => {
                const option = document.createElement('option');
                option.value = k.name;
                option.textContent = k.name;
                kecamatanSelect.appendChild(option);
            });
        });
    </script>
@endsection
