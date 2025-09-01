@extends('layouts.index')
@section('content')
    <div class="max-w-5xl mx-auto px-6 py-10 mt-24">
        <h3 class="font-semibold text-lg">Alamat</h3>
        <hr class="border-t-4 border-orange-300 mt-1">

        <form action="#" method="POST" class="mt-6 space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Nama Alamat <span class="text-red-500">*</span>
                </label>
                <input type="text" name="label" placeholder="Nama Alamat"
                    class="w-full border border-orange-400 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-orange-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Provinsi <span class="text-red-500">*</span>
                </label>
                <select name="provinsi"
                    class="w-full border border-orange-400 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-orange-500">
                    <option value="">Provinsi</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Kota <span class="text-red-500">*</span>
                </label>
                <select name="kabupaten"
                    class="w-full border border-orange-400 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-orange-500">
                    <option value="">Kota</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Kecamatan <span class="text-red-500">*</span>
                </label>
                <select name="kecamatan"
                    class="w-full border border-orange-400 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-orange-500">
                    <option value="">Kecamatan</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Detail Alamat <span class="text-red-500">*</span>
                </label>
                <textarea name="detail_alamat" rows="4" placeholder="Detail Alamat"
                    class="w-full border border-orange-400 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-orange-500"></textarea>
            </div>

            <div class="flex justify-end space-x-3 pt-4">
                <button type="button"
                    class="px-6 py-2 border border-orange-500 text-orange-500 rounded hover:bg-orange-50">
                    Batal
                </button>
                <button type="submit" class="px-6 py-2 bg-orange-500 text-white rounded hover:bg-orange-600">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
