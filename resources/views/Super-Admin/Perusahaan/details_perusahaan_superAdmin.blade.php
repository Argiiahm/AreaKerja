@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="mx-auto mt-10">
        <div class="p-6">
            <div class="space-y-6">
                <div>
                    <h3 class="font-semibold mb-1">Deskripsi</h3>
                    <p class="text-sm text-gray-700 leading-relaxed">
                        {{ $Data->deskripsi ?? 'N/A' }}
                    </p>
                </div>

                <div>
                    <h3 class="font-semibold mb-1">Visi</h3>
                    <ul class="list-disc list-inside text-sm text-gray-700">
                        <li>{{ $Data->visi ?? 'N/A' }}</li>
                    </ul>
                </div>

                <div>
                    <h3 class="font-bold mb-1">Misi</h3>
                    <ul class="list-disc list-inside text-sm text-gray-700 space-y-1">
                        <li>{{ $Data->misi ?? 'N/A' }}</li>
                    </ul>
                </div>

                <div>
                    <h3 class="font-bold mb-1">Data Perusahaan</h3>
                    <div class="space-y-3 text-sm text-gray-700">
                        <p><span class="font-medium">User ID</span> : {{ $Data->users->id }}</p>
                        <p><span class="font-medium">Username <span> : {{ $Data->users->username ?? 'N/A' }}</p>
                        <p><span class="font-medium">Email</span> : {{ $Data->users->email ?? 'N/A' }}</p>
                        <p><span class="font-medium">Nama Perusahaan</span> : {{ $Data->nama_perusahaan ?? 'N/A' }}</p>
                        <p><span class="font-medium">Legalitas</span> : {{ $Data->legalitas ?? 'N/A' }}</p>
                    </div>
                </div>

                <div>
                    <h3 class="font-bold mb-1">Kontak</h3>
                    <div class="space-y-3 text-sm text-gray-700">
                        <p><span class="font-medium">Perusahaan</span> : {{ $Data->telepon_perusahaan ?? 'N/A' }}</p>
                        <p><span class="font-medium">Whatsapp</span> : {{ $Data->whatsapp ?? 'N/A' }}</p>
                    </div>
                </div>

                <div>
                    <h3 class="font-bold mb-2">Lowongan Aktif</h3>
                    <div class="space-y-2 text-sm">
                        @forelse ($Data->pasanglowongan as $p)
                            @if ($p->paket_id)
                                <a href="/dashboard/superadmin/perusahaan/lowongan/detail/{{ $p->id }}"
                                    class="text-blue-600 hover:underline">{{ $p->nama }}</a>
                                <p class="text-gray-500 text-xs">{{ $p->alamat }} •
                                    {{ $p->created_at->diffForHumans() }}
                                </p>
                            @endif
                        @empty
                            <span>Belum Ada Lowongan</span>
                        @endforelse

                        <h3 class="font-bold py-2">Lowongan Non Publish</h3>

                        @forelse ($Data->pasanglowongan as $p)
                            @if ($p->paket_id === null)
                                <a href="/dashboard/superadmin/perusahaan/lowongan/detail/{{ $p->id }}"
                                    class="text-blue-600 hover:underline">{{ $p->nama }}</a>
                                <p class="text-gray-500 text-xs">{{ $p->alamat }} •
                                    {{ $p->created_at->diffForHumans() }}
                                </p>
                            @endif
                        @empty
                            <span>Belum Ada Lowongan</span>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-3 mt-8 w-full">
                <a href="/dashboard/superadmin/perusahaan/lowongan/add/{{ $Data->id }}"
                    class="bg-orange-500 text-white py-2 px-10 rounded-md">Tambah Lowongan</a>
                <a href="/dashboard/superadmin/perusahaan/edit/perusahaan/{{ $Data->id }}"
                    class="bg-blue-500 text-white py-2 px-32 rounded-md">Edit</a>
            </div>
        </div>
    </div>
@endsection
