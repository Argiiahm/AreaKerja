@extends('Super-Admin.layouts.index')

@section('super_admin-content')
<section class="min-h-screen bg-gray-50 pt-10 px-6">
    <div class="max-w-7xl mx-auto">

        <div class="p-8">

            <!-- Header -->
            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-800">
                    Edit Pengalaman Kerja
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Update riwayat pengalaman kerja kandidat
                </p>
                <div class="w-12 h-1 bg-orange-500 rounded-full mt-3"></div>
            </div>

            <!-- Form -->
            <form class="space-y-6" action="/update/superadmin/kandidat/pengalaman/{{ $data->id }}" method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" name="pelamar_id" value="{{ $data->pelamar_id ?? '' }}">

                <!-- Posisi -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Posisi Kerja
                    </label>
                    <input 
                        type="text" 
                        name="posisi_kerja"
                        value="{{ $data->posisi_kerja }}"
                        placeholder="Contoh: Frontend Developer"
                        class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl bg-gray-50 focus:bg-white focus:border-orange-500 focus:ring-2 focus:ring-orange-100 outline-none transition"
                    >
                </div>

                <!-- Jabatan -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Jabatan
                    </label>
                    <input 
                        type="text" 
                        name="jabatan_kerja"
                        value="{{ $data->jabatan_kerja }}"
                        placeholder="Contoh: Senior / Lead"
                        class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl bg-gray-50 focus:bg-white focus:border-orange-500 focus:ring-2 focus:ring-orange-100 outline-none transition"
                    >
                </div>

                <!-- Perusahaan -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Perusahaan
                    </label>
                    <input 
                        type="text" 
                        name="nama_perusahaan"
                        value="{{ $data->nama_perusahaan }}"
                        placeholder="Contoh: PT Maju Jaya"
                        class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl bg-gray-50 focus:bg-white focus:border-orange-500 focus:ring-2 focus:ring-orange-100 outline-none transition"
                    >
                </div>

                <!-- Tahun -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Tahun Awal
                        </label>
                        <input 
                            type="text" 
                            name="tahun_awal"
                            value="{{ $data->tahun_awal }}"
                            placeholder="2020"
                            class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl bg-gray-50 focus:bg-white focus:border-orange-500 focus:ring-2 focus:ring-orange-100 outline-none transition"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Tahun Akhir
                        </label>
                        <input 
                            type="text" 
                            name="tahun_akhir"
                            value="{{ $data->tahun_akhir }}"
                            placeholder="2023 / Sekarang"
                            class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl bg-gray-50 focus:bg-white focus:border-orange-500 focus:ring-2 focus:ring-orange-100 outline-none transition"
                        >
                    </div>
                </div>

                <!-- Deskripsi -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Deskripsi
                    </label>
                    <textarea 
                        name="deskripsi"
                        rows="4"
                        placeholder="Jelaskan pekerjaan, tanggung jawab, atau pencapaian"
                        class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl bg-gray-50 focus:bg-white focus:border-orange-500 focus:ring-2 focus:ring-orange-100 outline-none transition"
                    >{{ $data->deskripsi }}</textarea>
                </div>

                <!-- Button -->
                <div class="flex justify-end gap-3 pt-4">
                    <a href="{{ $back_url }}"
                        class="px-6 py-3 border border-gray-300 text-gray-600 font-medium rounded-xl text-sm text-center hover:bg-gray-50 transition duration-200">Kembali</a>
                    <button 
                        type="submit"
                        class="px-6 py-3 bg-orange-500 hover:bg-orange-600 text-white text-sm font-medium rounded-xl transition duration-200 shadow-sm"
                    >
                        Simpan Perubahan
                    </button>
                </div>

            </form>
        </div>
    </div>
</section>
@endsection