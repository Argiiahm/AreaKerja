@extends('Admin.Dashboard-admin.layouts.index')

@section('admin-content')
    <div class="w-full bg-white shadow-md rounded-none p-8">
    <div class="flex items-start gap-6">
        @if ($Data->img_profile)
            <img src="{{ asset('storage/' . $Data->img_profile) }}" class="w-24 h-24 rounded-full object-cover">
        @else
            <img src="https://static.vecteezy.com/system/resources/thumbnails/005/544/718/small_2x/profile-icon-design-free-vector.jpg"
                class="w-24 h-24 rounded-full object-cover">
        @endif
        <div>
            <h2 class="text-2xl font-semibold">{{ $Data->nama_pelamar }}</h2>
            <p class="text-gray-600 text-sm mt-2">
                {{ $Data->deskripsi_diri }}
            </p>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-6 mt-8 text-sm">
        <div class="space-y-2">
            <p><span class="font-medium">User ID:</span> {{ $Data->users->id }}</p>
            <p><span class="font-medium">Nama Lengkap:</span> {{ $Data->nama_pelamar }}</p>
            <p><span class="font-medium">Alamat:</span>
                {{ $Data->alamat_pelamars()->latest()->first()->detail ?? 'belum ada data' }}</p>
            <p><span class="font-medium">No. Telepon:</span> {{ $Data->telepon_pelamar }}</p>
            <div>
                <p class="font-medium">Social Media:</p>
                <ul class="ml-5 list-disc">
                    <li>Instagram : {{ $Data->sosmed->instagram ?? 'tidak ada data' }}</li>
                    <li>LinkedIn : {{ $Data->sosmed->linkedin ?? 'tidak ada data' }}</li>
                    <li>Website : {{ $Data->sosmed->website ?? 'tidak ada data' }}</li>
                    <li>Twitter : {{ $Data->sosmed->twitter ?? 'tidak ada data' }}</li>
                </ul>
            </div>
        </div>

        <div class="space-y-2">
            <p><span class="font-medium">Username:</span> {{ $Data->users->username }}</p>
            <p><span class="font-medium">Email:</span> {{ $Data->users->email }}</p>
            <p><span class="font-medium">Gender:</span> {{ $Data->gender }}</p>
            <p><span class="font-medium">Keahlian:</span> {{ $Data->divisi ?? 'Tidak Di Ketahui' }}</p>
        </div>
    </div>

    <div class="mt-8">
        <h3 class="font-semibold text-lg">Organisasi</h3>
        <ul class="list-decimal ml-6 mt-2 space-y-1">
            @foreach ($Data->organisasi as $og)
                <li>{{ $og->nama_organisasi ?? 'Data Belum Di Atur' }} | {{ $og->jabatan ?? 'Data Belum Di Atur' }} |
                    {{ $og->tahun_awal ?? 'Data Belum Di Atur' }} - {{ $og->tahun_akhir ?? 'Data Belum Di Atur' }}
                </li>
            @endforeach
        </ul>
    </div>

    <div class="mt-6">
        <h3 class="font-semibold text-lg">Pengalaman Kerja</h3>
        <ul class="list-decimal ml-6 mt-2 space-y-1">
            @foreach ($Data->pengalaman_kerja as $pk)
                <li>{{ $pk->posisi_kerja ?? 'Data Belum Di Atur' }} |
                    {{ $pk->nama_perusahaan ?? 'Data Belum Di Atur' }} | {{ $pk->tahun_awal ?? 'Data Belum Di Atur' }}
                    - {{ $pk->tahun_akhir ?? 'Data Belum Di Atur' }}</li>
            @endforeach
        </ul>
    </div>

    <div class="mt-6">
        <h3 class="font-semibold text-lg">Riwayat Pendidikan</h3>
        <ul class="list-decimal ml-6 mt-2 space-y-1">
            @foreach ($Data->riwayat_pendidikan as $rp)
                <li>{{ $rp->asal_pendidikan ?? 'Data Belum Di Atur' }} | {{ $rp->jurusan ?? 'Data Belum Di Atur' }} |
                    {{ $rp->tahun_awal ?? 'Data Belum Di Atur' }}
                    - {{ $rp->tahun_akhir ?? 'Data Belum Di Atur' }}</li>
                </li>
            @endforeach
        </ul>
    </div>
    </div>
@endsection
