@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="mx-auto p-6">

        <div class="bg-white border border-gray-300 rounded-xl shadow-sm overflow-hidden">

            <div class="flex items-center gap-3 py-6 border-b rounded-b-3xl shadow-md">
                <img src="{{ asset('Icon/seveninc.png') }}" alt="Logo" class="w-40 h-40 object-contain">
                <div class="w-full lg:w-[70%] text-left lg:text-center">
                    <h1 class="text-lg font-bold">SEVEN INC</h1>
                </div>
            </div>

            <div class="p-6 space-y-6 text-sm text-gray-700">

                <div>
                    <h2 class="font-bold text-black">Deskripsi</h2>
                    <p>Perushaan Belum Menyelesaikan Bagian ini</p>
                </div>

                <div>
                    <h2 class="font-bold text-black">Culture Perusahaan</h2>
                    <p>Perushaan Belum Menyelesaikan Bagian ini</p>
                </div>

                <div>
                    <h2 class="font-bold text-black">Alamat Perusahaan</h2>
                    <p>Ngasinan, Kraguman, Jogonalan, Klaten, Jawa Tengah 57452</p>
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
                            <li>:Frontend</li>
                            <li>:Laki Laki</li>
                            <li>:1 Juta</li>
                            <li>:Memiliki Pengalaman 1 tahun</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center gap-4 pt-4">
            <a href="/dashboard/superadmin/talenthunter/edit"
                class="px-6 py-2 bg-orange-500 text-white font-medium rounded-md hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 transition-colors">
                Edit
            </a>
            <button type="submit" class="px-6 py-2 bg-green-500 text-white rounded-md">Simpan</button>
            <button type="button" class="px-6 py-2 bg-red-500 text-white rounded-md">Batal</button>
        </div>
    </div>
@endsection
