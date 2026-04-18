@extends('Super-Admin.layouts.index')

@section('super_admin-content')
<div class="p-8 bg-[#F9FAFB] min-h-screen">
    <div class="max-w-4xl mx-auto">
        {{-- Header Section --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div class="flex items-center gap-4">
                <a href="/dashboard/superadmin/akun" class="p-2 bg-white border border-gray-200 rounded-xl text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                    <i class="ph ph-arrow-left text-xl"></i>
                </a>
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Detail Pengguna</h1>
                    <p class="text-sm text-gray-500 mt-1">Melihat informasi profil dan status dari pengguna sistem.</p>
                </div>
            </div>
            
            <div class="flex items-center gap-3">
                <a href="/dashboard/superadmin/{{ $Data->id }}/edit" class="px-5 py-2.5 text-sm font-semibold text-white bg-gray-900 hover:bg-black rounded-xl transition-colors shadow-sm inline-flex items-center">
                    <i class="ph ph-pencil-simple mr-2 text-lg"></i> Edit Profil
                </a>
            </div>
        </div>

        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">
            <div class="px-8 py-6 border-b border-gray-100 bg-gray-50/50 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center border border-blue-100 shrink-0">
                        <i class="ph ph-user text-3xl"></i>
                    </div>
                    <div>
                        <h2 class="text-lg font-bold text-gray-900">Informasi Lengkap Akun</h2>
                        <p class="text-sm text-gray-500">Berikut adalah data diri dan akses yang terdaftar.</p>
                    </div>
                </div>
            </div>

            <div class="p-8 space-y-8">
                {{-- Kredensial --}}
                <div class="space-y-5">
                    <h3 class="text-xs font-bold text-gray-400 uppercase tracking-widest border-b border-gray-100 pb-2">Kredensial Login</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">ID User</label>
                            <input type="text" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-500 focus:outline-none cursor-not-allowed" value="{{ $Data->id }}" readonly disabled>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" value="{{ $Data->email }}" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-500 focus:outline-none cursor-not-allowed" readonly disabled>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap / Username</label>
                            <input type="text" value="{{ $Data->username }}" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-500 focus:outline-none cursor-not-allowed" readonly disabled>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                            <input type="password" value="********" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-500 focus:outline-none cursor-not-allowed" readonly disabled>
                        </div>
                    </div>
                </div>

                {{-- Akses & Status --}}
                <div class="space-y-5">
                    <h3 class="text-xs font-bold text-gray-400 uppercase tracking-widest border-b border-gray-100 pb-2">Akses & Status</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Role User (Hak Akses)</label>
                            <div class="relative">
                                <input type="text" value="{{ ucfirst($Data->role) }}" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm font-bold text-gray-700 focus:outline-none cursor-not-allowed" readonly disabled>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Status Akun</label>
                            <div class="relative">
                                <div class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-700 cursor-not-allowed flex items-center gap-2">
                                    <div class="w-2.5 h-2.5 rounded-full {{ $Data->status == 0 ? 'bg-green-500' : 'bg-red-500' }}"></div>
                                    <span class="font-semibold">{{ $Data->status == 0 ? 'Aktif' : 'Tidak Aktif (Banned)' }}</span>
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
                    <h3 class="text-xs font-bold text-gray-400 uppercase tracking-widest border-b border-gray-100 pb-2">Informasi Alamat</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Provinsi</label>
                            <input type="text" value="{{ $alamat?->provinsi ?? '-' }}" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-500 focus:outline-none cursor-not-allowed" readonly disabled>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Kota / Kabupaten</label>
                            <input type="text" value="{{ $alamat?->kota ?? '-' }}" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-500 focus:outline-none cursor-not-allowed" readonly disabled>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Kecamatan</label>
                            <input type="text" value="{{ $alamat?->kecamatan ?? '-' }}" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-500 focus:outline-none cursor-not-allowed" readonly disabled>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Kode Pos</label>
                            <input type="text" value="{{ $alamat?->kode_pos ?? '-' }}" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-500 focus:outline-none cursor-not-allowed" readonly disabled>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Lengkap</label>
                        <textarea rows="3" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-500 focus:outline-none cursor-not-allowed resize-none" readonly disabled>{{ $alamat?->detail ?? ($alamat?->detail_alamat ?? '-') }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
