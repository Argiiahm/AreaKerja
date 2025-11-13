@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="mx-auto p-6">

        <div class="bg-white border border-gray-300 rounded-xl shadow-sm overflow-hidden">

            <div class="flex items-center gap-3 py-6 border-b rounded-b-3xl shadow-md">
                <img src="{{ asset('Icon/seveninc.png') }}" alt="Logo" class="w-40 h-40 object-contain">
                <div class="w-full lg:w-[70%] text-left lg:text-center">
                    <h1 class="text-lg font-bold">{{ $Data->perusahaan->nama_perusahaan }}</h1>
                </div>
            </div>

            <div class="p-6 space-y-6 text-sm text-gray-700">

                <div>
                    <h2 class="font-bold text-black">Deskripsi</h2>
                    <p>{{ $Data->deskripsi }}</p>
                </div>

                {{-- <div>
                    <h2 class="font-bold text-black">Culture Perusahaan</h2>
                    <p>Perushaan Belum Menyelesaikan Bagian ini</p>
                </div> --}}

                <div>
                    <h2 class="font-bold text-black">Alamat Perusahaan</h2>
                    <p>{{ $Data->alamat }}</p>
                </div>

                <div>
                    <h2 class="font-bold text-black">Kriteria Kandidat</h2>
                    <div class="flex items-center gap-20">
                        <ul class="mt-2 space-y-1">
                            <li>Posisi yang dibutuhkan</li>
                            <li>Jenis Kelamin</li>
                            <li>Kisaran Gaji</li>
                            <li>Detail Tambahan</li>
                        </ul>
                        <ul class="mt-2 space-y-1">
                            <li>:{{ $Data->posisi }}</li>
                            <li>:{{ $Data->gender }}</li>
                            <li>:{{ $Data->gaji_awal }} - {{ $Data->gaji_akhir }}</li>
                            <li>:{{ $Data->pengalaman_kerja }} </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center gap-4 pt-4">
            <a href="/dashboard/superadmin/talenthunter/edit/{{ $Data->id }}"
                class="px-6 py-2 bg-orange-500 text-white font-medium rounded-md hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 transition-colors">
                Edit
            </a>
            <button type="submit" class="px-6 py-2 bg-green-500 text-white rounded-md">Simpan</button>
            <button type="button" class="px-6 py-2 bg-red-500 text-white rounded-md">Batal</button>
        </div>
    </div>
@endsection
