@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="space-y-8 pt-8">

        {{-- Card Social Media --}}
        <div class="bg-white border border-orange-300 rounded-lg shadow-md overflow-hidden">
            <div class="bg-orange-500 px-6 py-3">
                <h2 class="text-white font-semibold text-lg">Social Media</h2>
            </div>
            <div class="p-6 space-y-4">
                <div class="border-b border-orange-200 pb-4">
                    <label class="block text-gray-700 mb-1">Facebook</label>
                    <input type="text"
                        class="w-full border border-orange-300 rounded-md p-2 focus:ring-2 focus:ring-orange-300">
                </div>

                <div class="border-b border-orange-200 pb-4">
                    <label class="block text-gray-700 mb-1">Youtube</label>
                    <input type="text"
                        class="w-full border border-orange-300 rounded-md p-2 focus:ring-2 focus:ring-orange-300">
                </div>

                <div class="border-b border-orange-200 pb-4">
                    <label class="block text-gray-700 mb-1">Instagram</label>
                    <input type="text"
                        class="w-full border border-orange-300 rounded-md p-2 focus:ring-2 focus:ring-orange-300">
                </div>

                <div>
                    <label class="block text-gray-700 mb-1">LinkedIn</label>
                    <input type="text"
                        class="w-full border border-orange-300 rounded-md p-2 focus:ring-2 focus:ring-orange-300">
                </div>
            </div>
        </div>

        {{-- Card Image Header --}}
        <div class="bg-white border border-orange-300 rounded-lg shadow-md overflow-hidden">
            <div class="bg-orange-500 px-6 py-3">
                <h2 class="text-white font-semibold text-lg">Image Header</h2>
            </div>
            <div class="p-6 space-y-4">
                <div class="border-b border-orange-200 pb-4">
                    <label class="block text-gray-700 mb-1">Beranda</label>
                    <input type="file"
                        class="w-full text-sm text-gray-700 border border-orange-300 bg-white p-5 rounded-md cursor-pointer
                              file:hidden file:border-0 file:bg-transparent file:text-transparent
                              focus:ring-2 focus:ring-orange-300">
                </div>

                <div class="border-b border-orange-200 pb-4">
                    <label class="block text-gray-700 mb-1">Tips Kerja</label>
                    <input type="file"
                        class="w-full text-sm text-gray-700 border border-orange-300 bg-white p-5 rounded-md cursor-pointer
                              file:hidden file:border-0 file:bg-transparent file:text-transparent
                              focus:ring-2 focus:ring-orange-300">
                </div>

                <div class="border-b border-orange-200 pb-4">
                    <label class="block text-gray-700 mb-1">Pasang Lowongan</label>
                    <input type="file"
                        class="w-full text-sm text-gray-700 border border-orange-300 bg-white p-5 rounded-md cursor-pointer
                              file:hidden file:border-0 file:bg-transparent file:text-transparent
                              focus:ring-2 focus:ring-orange-300">
                </div>

                <div class="border-b border-orange-200 pb-4">
                    <label class="block text-gray-700 mb-1">Daftar Kandidat</label>
                    <input type="file"
                        class="w-full text-sm text-gray-700 border border-orange-300 bg-white p-5 rounded-md cursor-pointer
                              file:hidden file:border-0 file:bg-transparent file:text-transparent
                              focus:ring-2 focus:ring-orange-300">
                </div>

                <div class="border-b border-orange-200 pb-4">
                    <label class="block text-gray-700 mb-1">Talent Hunter</label>
                    <input type="file"
                        class="w-full text-sm text-gray-700 border border-orange-300 bg-white p-5 rounded-md cursor-pointer
                              file:hidden file:border-0 file:bg-transparent file:text-transparent
                              focus:ring-2 focus:ring-orange-300">
                </div>

                <div class="border-b border-orange-200 pb-4">
                    <label class="block text-gray-700 mb-1">Profil Pelamar</label>
                    <input type="file"
                        class="w-full text-sm text-gray-700 border border-orange-300 bg-white p-5 rounded-md cursor-pointer
                              file:hidden file:border-0 file:bg-transparent file:text-transparent
                              focus:ring-2 focus:ring-orange-300">
                </div>

                <div class="border-b border-orange-200 pb-4">
                    <label class="block text-gray-700 mb-1">Lowongan Tersimpan</label>
                    <input type="file"
                        class="w-full text-sm text-gray-700 border border-orange-300 bg-white p-5 rounded-md cursor-pointer
                              file:hidden file:border-0 file:bg-transparent file:text-transparent
                              focus:ring-2 focus:ring-orange-300">
                </div>

                <div class="border-b border-orange-200 pb-4">
                    <label class="block text-gray-700 mb-1">FAQ</label>
                    <input type="file"
                        class="w-full text-sm text-gray-700 border border-orange-300 bg-white p-5 rounded-md cursor-pointer
                              file:hidden file:border-0 file:bg-transparent file:text-transparent
                              focus:ring-2 focus:ring-orange-300">
                </div>

                <div class="border-b border-orange-200 pb-4">
                    <label class="block text-gray-700 mb-1">Rekrut Pelamar</label>
                    <input type="file"
                        class="w-full text-sm text-gray-700 border border-orange-300 bg-white p-5 rounded-md cursor-pointer
                              file:hidden file:border-0 file:bg-transparent file:text-transparent
                              focus:ring-2 focus:ring-orange-300">
                </div>

                <div class="border-b border-orange-200 pb-4">
                    <label class="block text-gray-700 mb-1">Pelamar Perusahaan</label>
                    <input type="file"
                        class="w-full text-sm text-gray-700 border border-orange-300 bg-white p-5 rounded-md cursor-pointer
                              file:hidden file:border-0 file:bg-transparent file:text-transparent
                              focus:ring-2 focus:ring-orange-300">
                </div>

                <div class="border-b border-orange-200 pb-4">
                    <label class="block text-gray-700 mb-1">Kandidat AK</label>
                    <input type="file"
                        class="w-full text-sm text-gray-700 border border-orange-300 bg-white p-5 rounded-md cursor-pointer
                              file:hidden file:border-0 file:bg-transparent file:text-transparent
                              focus:ring-2 focus:ring-orange-300">
                </div>

                <div class="border-b border-orange-200 pb-4">
                    <label class="block text-gray-700 mb-1">Berlangganan</label>
                    <input type="file"
                        class="w-full text-sm text-gray-700 border border-orange-300 bg-white p-5 rounded-md cursor-pointer
                              file:hidden file:border-0 file:bg-transparent file:text-transparent
                              focus:ring-2 focus:ring-orange-300">
                </div>

                <div>
                    <label class="block text-gray-700 mb-1">Request Data</label>
                    <input type="file"
                        class="w-full text-sm text-gray-700 border border-orange-300 bg-white p-5 rounded-md cursor-pointer
                              file:hidden file:border-0 file:bg-transparent file:text-transparent
                              focus:ring-2 focus:ring-orange-300">
                </div>
            </div>
        </div>

    </div>
@endsection
