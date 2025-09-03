@extends('layouts.index')
@section('content')
    <div class="max-w-5xl mx-auto px-6 py-10 mt-24">
        <h3 class="font-semibold text-lg">Alamat</h3>
        <hr class="border-t-4 border-orange-300 mt-1">

        <form action="/dashboard/perusahaan/update/alamat/{{ $Data->id }}" method="POST" class="mt-6 space-y-5">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Nama Alamat <span class="text-red-500">*</span>
                </label>
                   <input type="text" name="label" placeholder="Nama Alamat"
                    class="w-full border border-orange-400 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-orange-500"
                    value="{{ $Data->label }}">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Kode Pos <span class="text-red-500">*</span>
                </label>
                <input type="text" name="kode_pos" placeholder="Kode Pos"
                    class="w-full border border-orange-400 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-orange-500"
                    value="{{ $Data->kode_pos }}">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    desa<span class="text-red-500">*</span>
                </label>
                <input type="text" name="desa" placeholder="desa"
                    class="w-full border border-orange-400 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-orange-500"
                    value="{{ $Data->desa }}">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Provinsi <span class="text-red-500">*</span>
                </label>
                <select name="provinsi"
                    class="w-full border border-orange-400 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-orange-500">
                    @if ($Data->provinsi)
                        <option value="{{ $Data->provinsi }}" selected disabled>{{ $Data->provinsi }}</option>
                    @else
                        <option value="" selected disabled>Provinsi</option>
                        <option value="jawa">jawa</option>
                    @endif
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Kota <span class="text-red-500">*</span>
                </label>
                <select name="kota"
                    class="w-full border border-orange-400 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-orange-500">
                    @if ($Data->kota)
                        <option value="{{ $Data->kota }}" selected disabled>{{ $Data->kota }}</option>
                    @else
                        <option value="" selected disabled>Kota</option>
                        <option value="banjar">banjar</option>
                    @endif
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Kecamatan <span class="text-red-500">*</span>
                </label>
                <select name="kecamatan"
                    class="w-full border border-orange-400 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-orange-500">
                    @if ($Data->kecamatan)
                        <option value="{{ $Data->kecamatan }}" selected disabled>{{ $Data->kecamatan }}</option>
                    @else
                        <option value="" selected disabled>Kecamatan</option>
                        <option value="padaherang">padaherang</option>
                    @endif
                </select>
            </div>

            @if (Auth::user()->perusahaan->alamatperusahaan)
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Detail Alamat <span class="text-red-500">*</span>
                </label>
                <input
                    class="w-full border border-orange-400 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-orange-500"
                    type="text" name="detail" value="{{ $Data->detail }}">
            @else
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Detail Alamat <span class="text-red-500">*</span>
                    </label>
                    <textarea name="detail" rows="4" placeholder="Detail Alamat"
                        class="w-full border border-orange-400 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-orange-500"></textarea>
                </div>
            @endif

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
