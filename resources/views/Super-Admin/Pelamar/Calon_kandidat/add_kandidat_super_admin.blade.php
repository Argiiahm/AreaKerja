@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="container max-w-screen-lg mx-auto mt-10 px-4">
        <div class="overflow-hidden">
            <div class="bg-slate-800 p-6">
                <h2 class="text-xl font-bold text-white">Update Calon Kandidat</h2>
                <p class="text-slate-400 text-sm">Pilih data pelamar dan tentukan jadwal pelatihan.</p>
            </div>

            <form id="updateForm" method="POST" enctype="multipart/form-data" class="p-8">
                @csrf
                @method('PUT')

                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-50 border border-red-300 rounded-lg">
                        <div class="flex items-center gap-2 mb-2">
                            <i class="ph ph-warning text-red-500 text-xl"></i>
                            <h3 class="font-semibold text-red-700">Terdapat kesalahan:</h3>
                        </div>
                        <ul class="list-disc list-inside text-sm text-red-600 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="space-y-6">
                    <div class="flex flex-col md:flex-row items-center gap-6 pb-6 border-b border-gray-100">
                        <div class="relative w-full">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Cari Nama Pelamar <span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="searchNama" autocomplete="off" placeholder="Ketik nama pelamar..."
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition">

                            <ul id="dropdownNama"
                                class="absolute top-full left-0 w-full bg-white border border-gray-200 rounded-lg shadow-xl mt-2 max-h-60 overflow-y-auto hidden z-20">
                                @forelse ($pelamarList as $pelamar)
                                    @if ($pelamar->kategori === null || $pelamar->kategori === 'pelamar' || $pelamar->kategori === 'calon kandidat')
                                        <li class="px-4 py-3 cursor-pointer hover:bg-indigo-50 border-b border-gray-50 last:border-0 transition"
                                            data-id="{{ $pelamar->id }}" data-nama="{{ $pelamar->nama_pelamar }}">
                                            <span class="font-medium text-gray-800">{{ $pelamar->nama_pelamar }}</span>
                                        </li>
                                    @endif
                                @empty
                                    <li class="px-4 py-3 text-gray-500 italic">Data pelamar tidak tersedia</li>
                                @endforelse
                                <li id="noResult" class="px-4 py-3 text-gray-500 italic hidden">Nama tidak ditemukan...</li>
                            </ul>
                        </div>
                    </div>

                    <input type="hidden" name="nama_pelamar" id="nama">
                    <input type="hidden" id="pelamar_id">

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <input type="text" name="kategori" hidden value="kandidat aktif">

                        <div class="flex flex-col">
                            <label class="text-sm font-medium text-gray-700 mb-1">Mulai Pelatihan</label>
                            <input type="date" name="mulai_pelatihan" required
                                class="px-3 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 outline-none bg-gray-50">
                        </div>

                        <div class="flex flex-col">
                            <label class="text-sm font-medium text-gray-700 mb-1">Selesai Pelatihan</label>
                            <input type="date" name="selesai_pelatihan" required
                                class="px-3 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 outline-none bg-gray-50">
                        </div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mt-10">
                    <button type="submit" id="btnUpdate" disabled
                        class="bg-emerald-600 hover:bg-emerald-700 disabled:bg-gray-300 disabled:cursor-not-allowed text-white font-bold py-3 px-10 rounded-lg w-full sm:w-64 transition shadow-md">
                        Simpan Update
                    </button>
                    <a href="{{ url()->previous() }}"
                        class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-3 px-10 rounded-lg w-full sm:w-64 transition text-center">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const searchInput = document.getElementById('searchNama');
            const dropdown = document.getElementById('dropdownNama');
            const noResult = document.getElementById('noResult');
            const hiddenNama = document.getElementById('nama');
            const hiddenId = document.getElementById('pelamar_id');
            const form = document.getElementById('updateForm');
            const btnUpdate = document.getElementById('btnUpdate');
            const items = dropdown.querySelectorAll('li:not(#noResult)');

            // Fungsi validasi tombol
            function validateSelection() {
                if (hiddenId.value && hiddenNama.value) {
                    btnUpdate.disabled = false;
                    btnUpdate.classList.remove('disabled:bg-gray-300');
                } else {
                    btnUpdate.disabled = true;
                }
            }

            searchInput.addEventListener('input', () => {
                const filter = searchInput.value.toLowerCase();
                let adaHasil = false;

                // Reset ID jika input dihapus atau diubah manual tanpa memilih
                hiddenId.value = "";
                hiddenNama.value = "";
                validateSelection();

                items.forEach(item => {
                    const text = item.textContent.toLowerCase();
                    if (text.includes(filter)) {
                        item.style.display = '';
                        adaHasil = true;
                    } else {
                        item.style.display = 'none';
                    }
                });

                dropdown.classList.remove('hidden');
                noResult.classList.toggle('hidden', adaHasil);

                if (filter === "") dropdown.classList.add('hidden');
            });

            items.forEach(item => {
                item.addEventListener('click', () => {
                    const selectedNama = item.dataset.nama;
                    const selectedId = item.dataset.id;

                    searchInput.value = selectedNama;
                    hiddenNama.value = selectedNama;
                    hiddenId.value = selectedId;

                    form.action = `/dashboard/superadmin/pelamar/update/calon_kandidat/${selectedId}`;
                    dropdown.classList.add('hidden');

                    validateSelection(); // Aktifkan tombol
                });
            });

            // Sembunyikan dropdown jika klik di luar
            document.addEventListener('click', (e) => {
                if (!dropdown.contains(e.target) && e.target !== searchInput) {
                    dropdown.classList.add('hidden');
                }
            });

            searchInput.addEventListener('focus', () => {
                if (searchInput.value !== "") {
                    dropdown.classList.remove('hidden');
                }
            });
        });
    </script>
@endsection