@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="mx-auto shadow-md rounded-xl p-8 border pl-10">


        <div class="flex items-start gap-6 mb-8">
            <img src="{{ asset('storage/' . $Data->img_profile) }}" alt="Profile"
                class="w-32 h-32 md:w-28 md:h-28 rounded-full object-cover border-4 border-gray-300">

            <div>
                <h2 class="text-2xl font-bold text-gray-800">{{ $Data->nama_pelamar }}</h2>
                <p class="text-gray-600 text-sm leading-relaxed mt-1">
                    {{ $Data->deskripsi_diri ?? 'Deskripsi Belum Di Isi' }}
                </p>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-x-10 gap-y-4 leading-relaxed">
            <div>
                <p class="font-bold text-lg text-gray-800">User ID</p>
                <p class="font-semibold text-base">{{ $Data->users->id }}</p>
           </div>
            <div>
                <p class="font-bold text-lg text-gray-800">Username</p>
                <p class="font-semibold text-base">{{ $Data->users->username }}</p>
            </div>

            <div>
                <p class="font-bold text-lg text-gray-800">Nama Lengkap</p>
                <p class="font-semibold text-base">{{ $Data->nama_pelamar }}</p>
            </div>
            <div>
                <p class="font-bold text-lg text-gray-800">Email</p>
                <p class="font-semibold text-base">{{ $Data->users->email }}</p>
            </div>

            <div>
                <p class="font-bold text-lg text-gray-800">Alamat</p>
                <p class="font-semibold text-base">
                    {{ $Data->alamat_pelamars->sortByDesc('created_at')->first()->detail ?? 'belum ada data' }}
                </p>
            </div>
            <div>
                <p class="font-bold text-lg text-gray-800">Gender</p>
                <p class="font-semibold text-base">{{ $Data->gender ?? 'Data belum di atur' }}</p>
            </div>

            <div>
                <p class="font-bold text-lg text-gray-800">No.Telepon</p>
                <p class="font-semibold text-base">{{ $Data->telepon_pelamar }}</p>
            </div>
            <div>
                <p class="font-bold text-lg text-gray-800">Keahlian</p>
                <p class="font-semibold text-base">
                    {{ $Data->skill->sortByDesc('created_at')->first()->skill ?? 'belum ada data' }}
                </p>
            </div>
        </div>


        <div class="mt-8">
            <h3 class="font-semibold text-lg text-gray-800 mb-2">Social Media</h3>
            @if ($Data->sosmed)
                <ul class="space-y-1 text-sm">
                    <li><span class="font-bold">Instagram</span> :
                        {{ $Data->sosmed->latest()->first()->instagram ?? 'tidak ada data' }}</li>
                    <li><span class="font-bold">LinkedIn</span> :
                        {{ $Data->sosmed->latest()->first()->linkedin ?? 'tidak ada data' }}</li>
                    <li><span class="font-bold">Website</span> :
                        {{ $Data->sosmed->latest()->first()->website ?? 'tidak ada data' }}</li>
                    <li><span class="font-bold">Twitter</span> :
                        {{ $Data->sosmed->latest()->first()->twitter ?? 'tidak ada data' }}</li>
                </ul>
            @else
                <p class="text-gray-500">Data Masih Kosong</p>
            @endif
        </div>

        <div class="mt-8">
            <h3 class="font-semibold text-lg text-gray-800 mb-2">Organisasi</h3>
            <ul class="list-decimal ml-6 space-y-1 text-sm">
                @forelse ($Data->organisasi as $o)
                    <li>{{ $o->nama_organisasi ?? 'belum ada data' }} | {{ $o->jabatan ?? 'belum ada data' }} |
                        {{ $o->tahun_awal ?? 'belum ada data' }} - {{ $o->tahun_akhir ?? 'belum ada data' }}</li>
                @empty
                    <p class="text-gray-500">Belum Ada Data</p>
                @endforelse
            </ul>
        </div>

        <div class="mt-8">
            <h3 class="font-semibold text-lg text-gray-800 mb-2">Pengalaman Kerja</h3>
            <ul class="list-decimal ml-6 space-y-1 text-sm">
                @forelse ($Data->pengalaman_kerja as $k)
                    <li>{{ $k->posisi_kerja ?? 'belum ada data' }} | {{ $k->nama_perusahaan ?? 'belum ada data' }} |
                        {{ $k->tahun_awal ?? 'belum ada data' }} - {{ $k->tahun_akhir ?? 'belum ada data' }}</li>
                @empty
                    <p class="text-gray-500">Belum Ada Data</p>
                @endforelse
            </ul>
        </div>

        <div class="mt-8">
            <h3 class="font-semibold text-lg text-gray-800 mb-2">Riwayat Pendidikan</h3>
            <ul class="list-decimal ml-6 space-y-1 text-sm">
                @forelse ($Data->riwayat_pendidikan as $r)
                    <li>{{ $r->pendidikan }} | {{ $r->jurusan }} | {{ $r->tahun_awal }} - {{ $r->tahun_akhir }}</li>
                @empty
                    <p class="text-gray-500">Belum Ada Data</p>
                @endforelse
            </ul>
        </div>

        <div class="flex justify-center gap-4 mt-10">
            <a href="/dashboard/superadmin/pelamar/edit/non_kandidat/{{ $Data->id }}"
                class="px-6 py-2 bg-cyan-500 hover:bg-cyan-600 text-white rounded-md shadow">Edit</a>
            <a href="/cv/{{ $Data->id }}/unduh"
                class="px-6 py-2 bg-green-500 hover:bg-green-600 text-white rounded-md shadow">Unduh</a>
            <a href="#" class="px-6 py-2 bg-red-500 hover:bg-red-600 text-white rounded-md shadow">Hapus</a>
        </div>

        @include('CV_PELAMAR.cv_pelamar')

    </div>
@endsection
