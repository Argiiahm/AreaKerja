@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="mx-auto mt-10">
        <div class="bg-white border border-gray-200 rounded-lg shadow p-8">
            <h2 class="text-lg font-semibold mb-6">Tambah Data Lowongan</h2>

            <form action="/dashboard/superadmin/perusahaan/lowongan/create" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <input type="text" hidden name="perusahaan_id" value="{{ $Data->id }}">
                    <div>
                        <label class="block text-sm font-medium">Judul <span class="text-red-500">*</span></label>
                        <input type="text" name="nama"
                            class="w-full border border-gray-200 rounded-md px-3 py-2 focus:ring-orange-500 focus:border-orange-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Alamat <span class="text-red-500">*</span></label>
                        <input type="text" name="alamat"
                            class="w-full border border-gray-200 rounded-md px-3 py-2 focus:ring-orange-500 focus:border-orange-500">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium">Jenis Lowongan <span class="text-red-500">*</span></label>
                        <select name="jenis"
                            class="w-full border border-gray-200 rounded-md px-3 py-2 focus:ring-orange-500 focus:border-orange-500">
                            <option value="fulltime">Full Time
                            </option>
                            <option value="middle">Middle
                            </option>
                            <option value="internship">Internship
                            </option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Gaji <span class="text-red-500">*</span></label>
                        <div class="flex items-center gap-2">
                            <input name="gaji_awal" type="number"
                                class="w-1/3 border border-gray-200 rounded-md px-3 py-2 focus:ring-orange-500 focus:border-orange-500">
                            <span>-</span>
                            <input name="gaji_akhir" type="number"
                                class="w-1/3 border border-gray-200 rounded-md px-3 py-2 focus:ring-orange-500 focus:border-orange-500">
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium">Deskripsi <span class="text-red-500">*</span></label>
                    <textarea name="deskripsi" rows="4"
                        class="w-full border border-gray-200 rounded-md px-3 py-2 focus:ring-orange-500 focus:border-orange-500"></textarea>
                </div>

                <div class="">
                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-3">Syarat Pekerjaan <span class="text-red-500">*</span></label>
                        <div id="syarat-pekerjaan-container">
                            <div class="flex items-center gap-2 mb-2 syarat-item">
                                <input type="text" name="syarat_pekerjaan[]" placeholder="Contoh: Minimal pendidikan SMA/SMK" required
                                    class="w-full border border-gray-200 rounded-md px-3 py-2 focus:ring-orange-500 focus:border-orange-500">
                                <button type="button" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 hidden hapus-syarat">Hapus</button>
                            </div>
                        </div>
                        <button type="button" id="tambah-syarat" class="mt-2 text-sm text-orange-500 font-semibold hover:text-orange-600">+ Tambah Syarat Pekerjaan</button>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Batas Lamaran <span class="text-red-500">*</span></label>
                        <input type="date" name="batas_lamaran" required
                            class="w-1/3 border border-gray-200 rounded-md px-3 py-2 focus:ring-orange-500 focus:border-orange-500">
                    </div>

                </div>

                <div class="flex justify-center gap-4 mt-6">
                    <button type="submit" class="bg-orange-500 text-white px-8 py-2 rounded-md">Simpan</button>
                    <button type="button"
                        class="border border-orange-500 text-orange-500 px-8 py-2 rounded-md">Batal</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('syarat-pekerjaan-container');
            const btnTambah = document.getElementById('tambah-syarat');

            btnTambah.addEventListener('click', function() {
                const items = container.querySelectorAll('.syarat-item');
                const newItem = items[0].cloneNode(true);
                newItem.querySelector('input').value = '';
                newItem.querySelector('input').required = true;
                newItem.querySelector('.hapus-syarat').classList.remove('hidden');
                container.appendChild(newItem);
                updateDeleteButtons();
            });

            container.addEventListener('click', function(e) {
                if (e.target.classList.contains('hapus-syarat')) {
                    const items = container.querySelectorAll('.syarat-item');
                    if (items.length > 1) {
                        e.target.closest('.syarat-item').remove();
                    }
                    updateDeleteButtons();
                }
            });

            function updateDeleteButtons() {
                const items = container.querySelectorAll('.syarat-item');
                items.forEach((item, index) => {
                    const btnHapus = item.querySelector('.hapus-syarat');
                    if (items.length === 1) {
                        btnHapus.classList.add('hidden');
                    } else {
                        btnHapus.classList.remove('hidden');
                    }
                });
            }
        });
    </script>
@endsection
