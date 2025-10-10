@extends('layouts.index')
@section('content')
    <div class="max-w-5xl mx-auto px-6 py-10 mt-24">
        <h3 class="font-semibold text-lg">Alamat</h3>
        <hr class="border-t-4 border-orange-300 mt-1">

        <form action="/dashboard/perusahaan/create/alamat" method="POST" class="mt-6 space-y-5">
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
                    Kode Pos <span class="text-red-500">*</span>
                </label>
                <input type="text" name="kode_pos" placeholder="Kode Pos"
                    class="w-full border border-orange-400 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-orange-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    desa<span class="text-red-500">*</span>
                </label>
                <input type="text" name="desa" placeholder="desa"
                    class="w-full border border-orange-400 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-orange-500">
            </div>

            <select id="provinsi" name="provinsi"
                class="w-full border border-orange-400 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-orange-500">
                <option value="" selected disabled>Provinsi</option>
                @foreach ($Provinsi as $p)
                    <option value="{{ $p->name }}" data-id="{{ $p->id }}">{{ $p->name }}</option>
                @endforeach
            </select>

            <select id="kota" name="kota"
                class="w-full border border-orange-400 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-orange-500">
                <option value="" selected disabled>Kota</option>
            </select>


            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Kecamatan <span class="text-red-500">*</span>
                </label>
                <input id="kecamatan" type="text" name="kecamatan" placeholder="kecamatan"
                    class="w-full border border-orange-400 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-orange-500">
            </div>





            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Detail Alamat <span class="text-red-500">*</span>
                </label>
                <textarea name="detail" rows="4" placeholder="Detail Alamat"
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

    <script>
        const kabupatenData = @json($Kabupaten);
        const kecamatanData = @json($Daerah);

        const provinsiSelect = document.getElementById('provinsi');
        const kotaSelect = document.getElementById('kota');
        const kecamatanSelect = document.getElementById('kecamatan');

        provinsiSelect.addEventListener('change', function() {
            const provinsiId = this.selectedOptions[0].getAttribute('data-id');
            kotaSelect.innerHTML = '<option value="" selected disabled>Kota</option>';
            kecamatanSelect.innerHTML = '<option value="" selected disabled>Kecamatan</option>';

            const filteredKota = kabupatenData.filter(k => k.provinsi_id == provinsiId);
            filteredKota.forEach(k => {
                const option = document.createElement('option');
                option.value = k.name;
                option.setAttribute('data-id', k.id);
                option.textContent = k.name;
                kotaSelect.appendChild(option);
            });
        });


        kotaSelect.addEventListener('change', function() {
            const kotaId = this.selectedOptions[0].getAttribute('data-id');
            kecamatanSelect.innerHTML = '<option value="" selected disabled>Kecamatan</option>';

            const filteredKecamatan = kecamatanData.filter(kec => kec.kabupaten_id == kotaId);
            filteredKecamatan.forEach(kec => {
                const option = document.createElement('option');
                option.value = kec.name;
                option.textContent = kec.name;
                kecamatanSelect.appendChild(option);
            });
        });
    </script>
@endsection
