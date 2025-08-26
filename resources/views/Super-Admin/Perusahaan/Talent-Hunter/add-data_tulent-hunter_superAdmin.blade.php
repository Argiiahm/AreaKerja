@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="p-6">
        <div class="mx-auto border-2 rounded-lg p-6">
            <h1 class="text-lg font-medium text-gray-900 mb-6">Tambah Data Talent Hunter</h1>

            <form action="" method="POST">
                @csrf

                <div class="space-y-4">
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Perusahaan</label>
                        <input type="text" id="nama" name="nama"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                        <input type="text" id="alamat"
                            name="alamat"="Jl. Gang Arjuna No 59 Karangkemba, Banguntapan, Bantul, Daerah Istimewa Yogyakarta"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" id="email" name="email"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="telepon" class="block text-sm font-medium text-gray-700 mb-1">No.Telepon</label>
                        <input type="text" id="telepon" name="telepon"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi
                            Perusahaan</label>
                        <textarea id="deskripsi" name="deskripsi" rows="4"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"></textarea>
                    </div>

                    <div>
                        <label for="posisi" class="block text-sm font-medium text-gray-700 mb-1">Posisi yang
                            dibutuhkan</label>
                        <input type="text" id="posisi" name="posisi"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Gender</label>
                        <div class="flex space-x-6">
                            <label class="flex items-center">
                                <input type="radio" name="gender"
                                    class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-300 focus:ring-orange-500">
                                <span class="ml-2 text-sm text-gray-900">Laki-laki</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="gender"
                                    class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-300 focus:ring-orange-500">
                                <span class="ml-2 text-sm text-gray-900">Perempuan</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label for="gaji" class="block text-sm font-medium text-gray-700 mb-1">Gaji</label>
                        <div class="block lg:flex md:flex space-y-3 lg:space-y-0 md:space-y-0 space-x-4">
                            <input type="text" id="" name=""
                                class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                            <input type="text" id="" name=""
                                class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                        </div>
                    </div>

                    <div>
                        <label for="culture" class="block text-sm font-medium text-gray-700 mb-1">Culture
                            Perusahaan</label>
                        <textarea id="culture" name="culture" rows="6"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"></textarea>
                    </div>
                </div>

                <div class="flex justify-center space-x-3 mt-6 pt-4">
                    <button type="submit"
                        class="px-6 py-2 bg-orange-500 text-white font-medium rounded-md hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 transition-colors">
                        Simpan
                    </button>
                    <button type="button"
                        class="px-6 py-2 border border-gray-300 text-gray-700 font-medium rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
