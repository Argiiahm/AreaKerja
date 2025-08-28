@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="rounded-lg border border-gray-300 p-8 w-full">
        <h2 class="text-xl font-semibold text-center mb-6">Tambah Profile</h2>

        <div class="flex justify-center mb-8">
            <div class="w-20 h-20 bg-gray-400 rounded-full flex items-center justify-center">
                <i class="fas fa-user text-gray-600 text-2xl"></i>
            </div>
        </div>

        <form class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        ID User <span class="text-red-500">*</span>
                    </label>
                    <input type="text"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" readonly>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <input type="email"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Nama Lengkap <span class="text-red-500">*</span>
                </label>
                <input type="text"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        User <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <select
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent appearance-none pr-8">
                            <option value="">Pilih User</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                        <i class="fas fa-chevron-down absolute right-3 top-3 text-orange-500 pointer-events-none"></i>
                    </div>
                </div>

                <div>
                    <div class="relative">
                        <select
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent appearance-none pr-8 mt-7">
                            <option value="">Pilih Status</option>
                            <option value="active">Aktif</option>
                            <option value="inactive">Tidak Aktif</option>
                        </select>
                        <i class="fas fa-chevron-down absolute right-3 top-10 text-orange-500 pointer-events-none"></i>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Provinsi <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <select
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent appearance-none pr-8">
                            <option value="">Pilih Provinsi</option>
                            <option value="jawa-timur">Jawa Timur</option>
                            <option value="jawa-tengah">Jawa Tengah</option>
                            <option value="jawa-barat">Jawa Barat</option>
                        </select>
                        <i class="fas fa-chevron-down absolute right-3 top-3 text-orange-500 pointer-events-none"></i>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Kota/Kabupaten <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <select
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent appearance-none pr-8">
                            <option value="">Pilih Kota</option>
                            <option value="surabaya">Surabaya</option>
                            <option value="malang">Malang</option>
                            <option value="yogyakarta">Yogyakarta</option>
                        </select>
                        <i class="fas fa-chevron-down absolute right-3 top-3 text-orange-500 pointer-events-none"></i>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Kecamatan <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <select
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent appearance-none pr-8">
                            <option value="">Pilih Kecamatan</option>
                            <option value="kecamatan1">Kecamatan 1</option>
                            <option value="kecamatan2">Kecamatan 2</option>
                        </select>
                        <i class="fas fa-chevron-down absolute right-3 top-3 text-orange-500 pointer-events-none"></i>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Kode Pos <span class="text-red-500">*</span>
                    </label>
                    <input type="text"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Alamat Lengkap <span class="text-red-500">*</span>
                </label>
                <textarea rows="3"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none"></textarea>
            </div>

            <div class="flex justify-center gap-4 pt-4">
                <button
                    class="bg-orange-500 text-white font-medium py-2 px-8 rounded-md transition duration-200">
                    Simpan
                </button>
                <button type="button"
                    class="bg-orange-500 text-white font-medium py-2 px-8 rounded-md transition duration-200">
                    Batal
                </button>
            </div>
        </form>
    </div>
@endsection
