@extends('layouts.index')

@section('content')
    <section class="pt-32 px-4 md:px-10">

        <h2 class="text-2xl font-bold text-gray-800 border-b-2 border-orange-500 pb-2 mb-8">
            Edit Alamat
        </h2>

        <form id="form_update" action="/alamat/pelamar/update/{{ $data->id }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Label -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Label Alamat</label>
                <input type="text" name="label" value="{{ old('label', $data->label) }}"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                    placeholder="Contoh: Rumah / Kos / Kantor">
            </div>

            <!-- Alamat -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Alamat Lengkap</label>
                <input type="text" name="desa" value="{{ old('desa', $data->desa) }}"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                    placeholder="Nama jalan, desa, dll">
            </div>

            <!-- Grid -->
            <div class="grid md:grid-cols-2 gap-4">

                <!-- Provinsi -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Provinsi <span class="text-red-500">*</span>
                    </label>
                    <select name="provinsi"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-1 focus:ring-orange-500">
                        <option disabled selected>{{ $data->provinsi ?? 'Pilih Provinsi' }}</option>
                        <option value="jawa">Jawa</option>
                    </select>
                </div>

                <!-- Kota -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Kota <span class="text-red-500">*</span>
                    </label>
                    <select name="kota"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-1 focus:ring-orange-500">
                        <option disabled selected>{{ $data->kota ?? 'Pilih Kota' }}</option>
                        <option value="banjar">Banjar</option>
                    </select>
                </div>

                <!-- Kecamatan -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Kecamatan <span class="text-red-500">*</span>
                    </label>
                    <select name="kecamatan"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-1 focus:ring-orange-500">
                        <option disabled selected>{{ $data->kecamatan ?? 'Pilih Kecamatan' }}</option>
                        <option value="padaherang">Padaherang</option>
                    </select>
                </div>

                <!-- Kode Pos -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Kode Pos</label>
                    <input type="text" name="kode_pos" value="{{ old('kode_pos', $data->kode_pos) }}"
                        class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                        placeholder="Kode Pos">
                </div>
            </div>

            <!-- Detail -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Detail Alamat</label>
                <input type="text" name="detail" value="{{ old('detail', $data->detail) }}"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                    placeholder="Blok, unit, patokan, dll">
            </div>

            <!-- BUTTON -->
            <div class="flex justify-end gap-3 pt-6">
                <a href="/alamat/pelamar"
                    class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 transition">
                    Batal
                </a>

                <button type="submit"
                    class="px-6 py-2 rounded-lg bg-orange-500 text-white font-semibold hover:bg-orange-600 transition">
                    Simpan Perubahan
                </button>
            </div>

        </form>
    </section>
@endsection
