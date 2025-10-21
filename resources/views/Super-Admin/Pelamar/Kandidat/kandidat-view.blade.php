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
            <a href="/dashboard/superadmin/pelamar/edit/kandidat/{{ $Data->id }}"
                class="px-6 py-2 bg-cyan-500 hover:bg-cyan-600 text-white rounded-md shadow">Edit</a>
            <a href="/cv/{{ $Data->id }}/unduh"
                class="px-6 py-2 bg-green-500 hover:bg-green-600 text-white rounded-md shadow">Unduh</a>
            <button data-id="{{ $Data->id }}" class="btnHapus px-6 py-2 bg-red-500 hover:bg-red-600 text-white rounded-md shadow">Hapus</button data-id="{{ $Data->id }}">
        </div>

        @include('CV_PELAMAR.cv_pelamar')


        <div id="modalKonfirmasi-{{ $Data->id }}"
            class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white text-gray-800 rounded-xl shadow-lg p-6 w-[350px] text-center relative">
                <div class="text-gray-600 text-5xl mb-3"><i class="ph ph-trash"></i></div>
                <p class="text-gray-800 font-semibold mb-5">Yakin akan hapus data?</p>
                <div class="flex justify-center space-x-4">
                    <form action="dashboaod/supadmin./hapus/users/pelamar/{{ $Data->users->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-green-500 text-white px-6 py-1 rounded-md hover:bg-green-600">Hapus</button>
                    </form>
                    <button data-id="{{ $Data->id }}"
                        class="batalHapus bg-red-500 text-white px-6 py-1 rounded-md hover:bg-red-600">Batal</button>
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div id="modalSukses" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-xl shadow-lg w-[350px] text-center relative p-6">
                <button id="closeSukses" class="absolute top-2 right-3 text-gray-400 text-xl hover:text-gray-600">×</button>

                <div class="flex flex-col items-center justify-center space-y-4">
                    <div class="flex items-center justify-center w-20 h-20 rounded-full bg-green-100">
                        <div class="flex items-center justify-center w-14 h-14 rounded-full bg-green-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                                stroke="white" class="w-10 h-10">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </div>

                    <p class="text-gray-800 font-semibold text-[15px]">Data User Berhasil Dihapus</p>
                </div>
            </div>
        </div>
        <script>
            setTimeout(() => {
                document.getElementById('modalSukses')?.classList.add('hidden');
            }, 2000);

            document.getElementById('closeSukses')?.addEventListener('click', () => {
                document.getElementById('modalSukses').classList.add('hidden');
            });
        </script>
    @endif
    </div>

    <script>
        document.querySelectorAll('.btnHapus').forEach(btn => {
            btn.addEventListener('click', () => {
                const id = btn.dataset.id;
                document.getElementById(`modalKonfirmasi-${id}`).classList.remove('hidden');
            });
        });

        document.querySelectorAll('.batalHapus').forEach(btn => {
            btn.addEventListener('click', () => {
                const id = btn.dataset.id;
                document.getElementById(`modalKonfirmasi-${id}`).classList.add('hidden');
            });
        });
    </script>
@endsection
