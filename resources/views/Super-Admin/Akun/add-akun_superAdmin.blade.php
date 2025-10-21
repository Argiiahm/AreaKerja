@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="rounded-lg border border-gray-300 p-8 w-full">
        <h2 class="text-xl font-semibold text-center mb-6">Tambah Profile</h2>

        <div class="flex justify-center mb-8">
            <div class="w-20 h-20 bg-gray-400 rounded-full flex items-center justify-center">
                <i class="ph ph-user text-4xl"></i>
            </div>
        </div>

        <form action="/dasboard/superadmin/create/pengguna" method="POST" class="space-y-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        ID User <span class="text-red-500">*</span>
                    </label>
                    <input type="text"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        readonly>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <input type="email" name="email"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Nama Lengkap <span class="text-red-500">*</span>
                </label>
                <input type="text" name="username"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Password <span class="text-red-500">*</span>
                </label>
                <input type="password" name="password"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        User <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <select name="role"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent appearance-none pr-8">
                            <option value="">Pilih User</option>
                            <option value="admin">Admin</option>
                            <option value="pelamar">Pelamar</option>
                            <option value="superadmin">Super Admin</option>
                            <option value="finance">Finance</option>
                            <option value="perusahaan">Perusahaan</option>
                        </select>
                        <i class="fas fa-chevron-down absolute right-3 top-3 text-orange-500 pointer-events-none"></i>
                    </div>
                </div>

                <div>
                    <div class="relative">
                        <select name="status"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent appearance-none pr-8 mt-7">
                            <option selected disabled value="">Pilih Status</option>
                            <option value="0">Aktif</option>
                            <option value="1">Tidak Aktif</option>
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
                        <select id="provinsi" name="provinsi"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 appearance-none pr-8">
                            <option selected disabled value="">Pilih Provinsi</option>
                            @foreach ($Provinsi as $p)
                                <option value="{{ $p->name }}" data-id="{{ $p->id }}">{{ $p->name }}
                                </option>
                            @endforeach
                        </select>
                        <i class="fas fa-chevron-down absolute right-3 top-3 text-orange-500 pointer-events-none"></i>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Kota/Kabupaten <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <select name="kota" id="kota"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 appearance-none pr-8">
                            <option selected disabled value="">Pilih Kota / Kabupaten</option>
                        </select>
                        <i class="fas fa-chevron-down absolute right-3 top-3 text-orange-500 pointer-events-none"></i>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Kecamatan <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <select name="kecamatan" id="kecamatan"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 appearance-none pr-8">
                            <option selected disabled value="">Pilih Kecamatan</option>
                        </select>
                        <i class="fas fa-chevron-down absolute right-3 top-3 text-orange-500 pointer-events-none"></i>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Kode Pos <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="kode_pos"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Alamat Lengkap <span class="text-red-500">*</span>
                </label>
                <textarea rows="3" name="detail"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none"></textarea>
            </div>

            <div class="flex justify-center gap-4 pt-4">
                <button type="submit" class="bg-orange-500 text-white font-medium py-2 px-8 rounded-md transition duration-200">
                    Simpan
                </button>
                <button type="button"
                    class="bg-orange-500 text-white font-medium py-2 px-8 rounded-md transition duration-200">
                    Batal
                </button>
            </div>
        </form>
    </div>

    <script>
        const kabupatenData = @json($Kabupaten);
        const kecamatanData = @json($Kecamatan);

        const provinsiSelect = document.getElementById('provinsi');
        const kotaSelect = document.getElementById('kota');
        const kecamatanSelect = document.getElementById('kecamatan');

        provinsiSelect.addEventListener('change', function() {
            const provinsiId = this.selectedOptions[0].getAttribute('data-id');
            kotaSelect.innerHTML = '<option value="" disabled selected>Pilih Kota / Kabupaten</option>';
            kecamatanSelect.innerHTML = '<option value="" disabled selected>Pilih Kecamatan</option>';

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
            kecamatanSelect.innerHTML = '<option value="" disabled selected>Pilih Kecamatan</option>';

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
