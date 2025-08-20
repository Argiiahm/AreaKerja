@extends('layouts.index')

@section('content')
    <section class="pt-40 mx-10">
        <h1 class="font-semibold">Profile Akun</h1>
        <div class="mt-10 border-2 border-orange-500 p-6 sm:p-10 rounded-lg">
            <div class="flex flex-col lg:flex-row lg:items-center gap-6 lg:gap-10">
                <div class="flex flex-col items-center">
                    <img class="w-32 sm:w-40 rounded-full mb-3"
                        src="https://fisika.uad.ac.id/wp-content/uploads/blank-profile-picture-973460_1280.png"
                        alt="">
                    <div>
                        <select class="border-2 border-orange-500 w-32 sm:w-40 p-2 rounded-md text-orange-500 font-semibold">
                            <option value="">Pelamar Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="flex flex-col lg:flex-row items-center w-full justify-between gap-6">
                    <div class="flex flex-col sm:flex-row gap-4 items-center w-full sm:w-auto">
                        <div
                            class="flex items-center gap-2 border-2 border-orange-500 px-6 py-2 rounded-lg w-full sm:w-auto justify-center">
                            <i class="ph ph-upload-simple text-2xl text-orange-500"></i>
                            <span class="text-orange-500">Upload</span>
                        </div>
                        <div class="flex items-center gap-2 border px-6 py-2 rounded-lg w-full sm:w-auto justify-center">
                            <i class="ph ph-trash text-2xl"></i>
                            <span>Remove</span>
                        </div>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
                        <div class="bg-orange-500 px-6 py-2 rounded-lg text-center w-full sm:w-auto">
                            <span class="text-white font-semibold">Simpan</span>
                        </div>
                        <div class="bg-green-500 px-6 py-2 rounded-lg text-center w-full sm:w-auto">
                            <span class="text-white font-semibold">Unduh CV</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=" mx-auto bg-white p-6">
            <h2 class="text-xl font-semibold text-gray-800 border-b-2 border-orange-500 pb-1 mb-6">
                Alamat
            </h2>

            <form action="#" method="POST" class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Label Alamat</label>
                    <input type="text" name="label_alamat"
                        class="w-full border border-gray-300 rounded-md p-3 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                        placeholder="Label Alamat">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Alamat Lengkap</label>
                    <input type="text" name="alamat_lengkap"
                        class="w-full border border-gray-300 rounded-md p-3 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                        placeholder="Alamat Lengkap">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Kecamatan</label>
                    <input type="text" name="kecamatan"
                        class="w-full border border-gray-300 rounded-md p-3 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                        placeholder="Kecamatan">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Kota</label>
                    <input type="text" name="kota"
                        class="w-full border border-gray-300 rounded-md p-3 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                        placeholder="Kota">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Provinsi</label>
                    <input type="text" name="provinsi"
                        class="w-full border border-gray-300 rounded-md p-3 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                        placeholder="Provinsi">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Detail Alamat</label>
                    <input type="text" name="detail_alamat"
                        class="w-full border border-gray-300 rounded-md p-3 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                        placeholder="Detail lainnya (Cth: Blok/Unit)">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Kode Pos</label>
                    <input type="text" name="kode_pos"
                        class="w-full border border-gray-300 rounded-md p-3 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                        placeholder="Kode Pos">
                </div>

                <div class="flex justify-center pt-4">
                    <button type="submit"
                        class="bg-orange-600 hover:bg-orange-700 text-white font-semibold px-8 py-2 rounded-md">
                        Simpan
                    </button>
                </div>
            </form>
        </div>

    </section>
@endsection
