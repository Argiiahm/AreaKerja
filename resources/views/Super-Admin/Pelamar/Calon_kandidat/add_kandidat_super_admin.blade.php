@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="container max-w-screen-lg mx-auto mt-30">
        <form id="updateForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="bg-orange-500 rounded-lg shadow-md p-10">
                <div class="flex items-center gap-4 relative">
                    <div class="w-24 h-20 rounded-full bg-white flex items-center justify-center overflow-hidden">
                        <label for="foto" class="cursor-pointer">
                            <img id="preview" src="https://cdn-icons-png.flaticon.com/512/847/847969.png" alt="Profile"
                                class="w-24 h-20 object-cover">
                        </label>
                        <input type="file" name="foto" id="foto" accept="image/*" class="hidden"
                            onchange="previewImage(event)">
                    </div>

                    <div class="relative w-full">
                        <input type="text" id="searchNama" placeholder="Masukan Nama..."
                            class="w-full px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-300">
                        <ul id="dropdownNama"
                            class="absolute top-full left-0 w-full bg-white rounded-md shadow-md mt-1 max-h-48 overflow-y-auto hidden z-10">
                            @foreach ($pelamarList as $pelamar)
                                @if ($pelamar->kategori === null)
                                    <li class="px-4 py-2 cursor-pointer hover:bg-orange-100" data-id="{{ $pelamar->id }}"
                                        data-nama="{{ $pelamar->nama_pelamar }}">
                                        {{ $pelamar->nama_pelamar }}
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>

                    <input type="hidden" name="nama_pelamar" id="nama">
                    <input type="hidden" id="pelamar_id">
                </div>

                <div class="grid grid-cols-3 gap-6 mt-6">
                    <div class="flex flex-col">
                        <label class="text-white text-sm mb-1">Divisi</label>
                        <select name="divisi"
                            class="px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-300">
                            <option value="">Pilih Divisi</option>
                            @foreach ($Divisi as $d)
                                <option value="{{ $d->divisi }}">{{ $d->divisi }}</option>
                            @endforeach
                        </select>
                    </div>

                    <input type="text" name="kategori" hidden value="calon kandidat">

                    <div class="flex flex-col">
                        <label class="text-white text-sm mb-1">Mulai Pelatihan</label>
                        <input type="date" name="mulai_pelatihan"
                            class="px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-300">
                    </div>

                    <div class="flex flex-col">
                        <label class="text-white text-sm mb-1">Selesai Pelatihan</label>
                        <input type="date" name="selesai_pelatihan"
                            class="px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-300">
                    </div>
                </div>
            </div>

            <div class="flex flex-col items-center gap-3 mt-6">
                <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 rounded-md w-60 shadow">
                    Update
                </button>
                <a href="{{ url()->previous() }}"
                    class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 rounded-md w-60 shadow text-center">
                    Kembali
                </a>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const searchInput = document.getElementById('searchNama');
            const dropdown = document.getElementById('dropdownNama');
            const hiddenNama = document.getElementById('nama');
            const hiddenId = document.getElementById('pelamar_id');
            const form = document.getElementById('updateForm');
            const items = dropdown.querySelectorAll('li');

            window.previewImage = function(event) {
                const output = document.getElementById('preview');
                output.src = URL.createObjectURL(event.target.files[0]);
            }

            searchInput.addEventListener('input', () => {
                const filter = searchInput.value.toLowerCase();
                let adaHasil = false;

                items.forEach(item => {
                    const text = item.textContent.toLowerCase();
                    if (text.includes(filter)) {
                        item.style.display = '';
                        adaHasil = true;
                    } else {
                        item.style.display = 'none';
                    }
                });

                dropdown.classList.toggle('hidden', !adaHasil);
            });

            items.forEach(item => {
                item.addEventListener('click', () => {
                    searchInput.value = item.dataset.nama;
                    hiddenNama.value = item.dataset.nama;
                    hiddenId.value = item.dataset.id;

                    form.action =
                        `/dashboard/superadmin/pelamar/update/calon_kandidat/${item.dataset.id}`;
                    dropdown.classList.add('hidden');
                });
            });

            document.addEventListener('click', (e) => {
                if (!dropdown.contains(e.target) && e.target !== searchInput) {
                    dropdown.classList.add('hidden');
                }
            });

            searchInput.addEventListener('focus', () => {
                dropdown.classList.remove('hidden');
                items.forEach(item => item.style.display = '');
            });
        });
    </script>
@endsection
