@extends('layouts.index')

@section('content')
<section class="pt-32 px-4 md:px-10">

    <h2 class="text-2xl font-bold text-gray-800 border-b-2 border-orange-500 pb-2 mb-8">
        Tambah Alamat
    </h2>

    <form id="alamat_form" action="/alamat/pelamar/create" method="POST" class="space-y-6">
        @csrf

        <!-- Label -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Label Alamat</label>
            <input type="text" name="label"
                class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                placeholder="Contoh: Rumah / Kos / Kantor">
        </div>

        <!-- Alamat -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Alamat Lengkap</label>
            <input type="text" name="desa"
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
                <select id="provinsi" name="provinsi"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-1 focus:ring-orange-500">
                    <option value="" selected disabled>Pilih Provinsi</option>
                    @foreach ($Provinsi as $p)
                        <option value="{{ $p->name }}" data-id="{{ $p->id }}">{{ $p->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Kota -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Kota <span class="text-red-500">*</span>
                </label>
                <select id="kota" name="kota"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-1 focus:ring-orange-500">
                    <option value="" selected disabled>Pilih Kota</option>
                </select>
            </div>

            <!-- Kecamatan -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Kecamatan <span class="text-red-500">*</span>
                </label>
                <select id="kecamatan" name="kecamatan"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-1 focus:ring-orange-500">
                    <option value="" selected disabled>Pilih Kecamatan</option>
                </select>
            </div>

            <!-- Kode Pos -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Kode Pos</label>
                <input type="text" name="kode_pos"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                    placeholder="Kode Pos">
            </div>
        </div>

        <!-- Detail -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Detail Alamat</label>
            <input type="text" name="detail"
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
                Simpan
            </button>
        </div>

    </form>
</section>

<script>
    const kabupatenData = @json($Kabupaten);
    const kecamatanData = @json($Daerah);

    const provinsiSelect = document.getElementById('provinsi');
    const kotaSelect = document.getElementById('kota');
    const kecamatanSelect = document.getElementById('kecamatan');

    provinsiSelect.addEventListener('change', function() {
        const provinsiId = this.selectedOptions[0].getAttribute('data-id');

        kotaSelect.innerHTML = '<option value="" selected disabled>Pilih Kota</option>';
        kecamatanSelect.innerHTML = '<option value="" selected disabled>Pilih Kecamatan</option>';

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

        kecamatanSelect.innerHTML = '<option value="" selected disabled>Pilih Kecamatan</option>';

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