@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="rounded-lg border border-gray-300 p-8 w-full">
        <h2 class="text-xl font-semibold text-center mb-6">Detail Profile</h2>

        <div class="flex justify-center mb-8">
            <div class="w-20 h-20 bg-gray-400 rounded-full flex items-center justify-center">
                <i class="ph ph-user text-4xl"></i>
            </div>
        </div>

        <form>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">ID User</label>
                    <input type="text" readonly disabled value="{{ $Data->id }}"
                        class="w-full px-3 py-2 border rounded-md bg-gray-100">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" disabled value="{{ $Data->email }}"
                        class="w-full px-3 py-2 border rounded-md bg-gray-100">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                <input type="text" name="username" disabled value="{{ $Data->username }}"
                    class="w-full px-3 py-2 border rounded-md bg-gray-100">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input type="password" name="password" disabled placeholder="*******"
                    class="w-full px-3 py-2 border rounded-md bg-gray-100">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Role</label>
                    <select name="role" disabled class="w-full px-3 py-2 border rounded-md bg-gray-100">
                        @foreach (['admin', 'pelamar', 'superadmin', 'finance', 'perusahaan'] as $r)
                            <option value="{{ $r }}" {{ $Data->role === $r ? 'selected' : '' }}>
                                {{ ucfirst($r) }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select name="status" disabled class="w-full px-3 py-2 border rounded-md bg-gray-100">
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
                    <select id="provinsi" name="provinsi" disabled class="w-full px-3 py-2 border rounded-md bg-gray-100">
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
                    <select id="kota" name="kota" disabled class="w-full px-3 py-2 border rounded-md bg-gray-100">
                        <option selected>{{ $alamat?->kota ?? 'Pilih Kota' }}</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kecamatan</label>
                    <select id="kecamatan" name="kecamatan" disabled class="w-full px-3 py-2 border rounded-md bg-gray-100">
                        <option selected>{{ $alamat?->kecamatan ?? 'Pilih Kecamatan' }}</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kode Pos</label>
                    <input type="text" name="kode_pos" disabled value="{{ $alamat?->kode_pos }}"
                        class="w-full px-3 py-2 border rounded-md bg-gray-100">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Lengkap</label>
                <textarea name="detail" rows="3" disabled class="w-full px-3 py-2 border rounded-md bg-gray-100 resize-none">{{ $alamat?->detail ?? $alamat?->detail_alamat }}</textarea>
            </div>

            <div class="flex justify-center gap-4 pt-4">
                <a href="/dashboard/superadmin/{{ $Data->id }}/edit"
                    class="bg-orange-400 text-white font-medium py-2 px-8 rounded-md">Edit</a>
                <button type="button" onclick="history.back()"
                    class="bg-gray-400 text-white font-medium py-2 px-8 rounded-md">Kembali</button>
            </div>
        </form>
    </div>
@endsection
