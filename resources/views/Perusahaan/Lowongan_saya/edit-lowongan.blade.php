@extends('layouts.index')
@section('content')
    <div class="max-w-7xl mx-auto px-6 py-10 mt-20 rounded-xl border border-gray-200">

        {{-- Company Profile Section (Refined) --}}
        <div class="flex items-start gap-4 p-4 mb-6 border-b border-gray-200 pb-6">
            <div
                class="flex-shrink-0 w-24 h-24 sm:w-32 sm:h-32 flex items-center justify-center rounded-lg overflow-hidden border border-gray-200">
                @if (Auth::user()->perusahaan->img_profile)
                    <img class="object-contain w-full h-full"
                        src="{{ asset('storage/' . Auth::user()->perusahaan->img_profile) }}" alt="Company Logo">
                @else
                    <img class="w-full h-full object-cover p-4"
                        src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                        alt="Placeholder Avatar">
                @endif
            </div>
            <div>
                <h2 class="font-bold text-xl text-gray-900">{{ Auth::user()->perusahaan->nama_perusahaan }}</h2>
                <p class="text-gray-600 text-sm mt-1">{{ Auth::user()->perusahaan->deskripsi }}</p>
                <p class="text-gray-400 text-xs mt-1">
                    <i class="ph ph-map-pin inline-block mr-1"></i>
                    {{ optional(Auth::user()->perusahaan->alamatperusahaan()->latest()->first())->detail ?? 'Alamat belum diatur' }}
                </p>
            </div>
        </div>

        <h2 class="text-2xl font-bold mb-6 border-b-2 border-orange-500 pb-2 text-gray-900">Edit Lowongan</h2>

        <form action="/dashboard/perusahaan/update/lowongan/{{ $data->slug }}" method="POST" class="space-y-8">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Judul Pekerjaan</label>
                    <input type="text" id="nama" name="nama"
                        value="{{ $data->nama }}"
                        placeholder="Contoh: Social Media Specialist"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2.5 focus:ring-orange-500 focus:border-orange-500 text-gray-900 placeholder-gray-400 transition-colors duration-200">
                </div>
                <div>
                    <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Lokasi Kerja</label>
                    <input type="text" id="alamat" name="alamat"
                        value="{{ $data->alamat }}"
                        placeholder="Contoh: Yogyakarta"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2.5 focus:ring-orange-500 focus:border-orange-500 text-gray-900 placeholder-gray-400 transition-colors duration-200">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 items-end">
                <div>
                    <label for="jenis" class="block text-sm font-medium text-gray-700 mb-1">Jenis Lowongan</label>
                    <select id="jenis" name="jenis"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2.5 focus:ring-orange-500 focus:border-orange-500 text-gray-900 transition-colors duration-200">
                        <option value="" disabled>Pilih Jenis Lowongan</option>
                        <option value="fulltime" {{ $data->jenis == 'fulltime' ? 'selected' : '' }}>Fulltime</option>
                        <option value="middle" {{ $data->jenis == 'middle' ? 'selected' : '' }}>Middle</option>
                        <option value="part-time" {{ $data->jenis == 'part-time' ? 'selected' : '' }}>Part-time</option>
                        <option value="freelance" {{ $data->jenis == 'freelance' ? 'selected' : '' }}>Freelance</option>
                    </select>
                </div>

                <div>
                    <label for="kategori" class="block text-sm font-medium text-gray-700 mb-1">Kategori Pekerjaan</label>
                    <select id="kategori" name="kategori"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2.5 focus:ring-orange-500 focus:border-orange-500 text-gray-900 transition-colors duration-200">
                        <option value="" disabled>Pilih Kategori</option>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->nama }}"
                                {{ $data->kategori == $kategori->nama ? 'selected' : '' }}>
                                {{ $kategori->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-span-1 sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Rentang Gaji (per bulan)</label>
                    <div class="flex items-center space-x-2">
                        <input type="number" name="gaji_awal"
                            value="{{ $data->gaji_awal }}"
                            placeholder="Minimum"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2.5 focus:ring-orange-500 focus:border-orange-500 text-gray-900 placeholder-gray-400 transition-colors duration-200">
                        <span class="text-gray-500">–</span>
                        <input type="number" name="gaji_akhir"
                            value="{{ $data->gaji_akhir }}"
                            placeholder="Maksimum"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2.5 focus:ring-orange-500 focus:border-orange-500 text-gray-900 placeholder-gray-400 transition-colors duration-200">
                    </div>
                </div>
            </div>

            <div>
                <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Pekerjaan</label>
                <textarea id="deskripsi" name="deskripsi" rows="5"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2.5 focus:ring-orange-500 focus:border-orange-500 text-gray-900 placeholder-gray-400 resize-y transition-colors duration-200">{{ $data->deskripsi }}</textarea>
            </div>

            <div class="space-y-6 border-t border-gray-200 pt-6">
                <h3 class="text-lg font-semibold text-orange-600">Syarat Pekerjaan & Lainnya</h3>

                @php
                    $syarats = is_array($data->syarat_pekerjaan) ? $data->syarat_pekerjaan : [$data->syarat_pekerjaan];
                    if (empty($syarats) || $syarats[0] === null) $syarats = [''];
                @endphp
                <div id="syarat-pekerjaan-container">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Syarat Pekerjaan</label>
                    @foreach($syarats as $index => $syarat)
                        <div class="flex items-center gap-2 mb-2 syarat-item">
                            <input type="text" name="syarat_pekerjaan[]" value="{{ $syarat }}" placeholder="Contoh: Minimal pendidikan SMA/SMK" required
                                class="w-full border border-gray-300 rounded-lg px-3 py-2.5 focus:ring-orange-500 focus:border-orange-500 text-gray-900 transition-colors duration-200">
                            <button type="button" class="px-4 py-2 bg-rose-500 text-white rounded-lg hover:bg-rose-600 {{ count($syarats) == 1 ? 'hidden' : '' }} hapus-syarat"><i class="ph ph-trash"></i></button>
                        </div>
                    @endforeach
                </div>
                <button type="button" id="tambah-syarat" class="text-sm text-white bg-orange-500 px-4 py-2 rounded-lg font-semibold hover:bg-orange-600 transition-colors">+ Tambah Syarat</button>

                <div>
                    <label for="batas_lamaran" class="block text-sm font-medium text-gray-700 mb-1">Batas Akhir
                        Lamaran</label>
                    <input type="date" id="batas_lamaran" name="batas_lamaran"
                        value="{{ $data->batas_lamaran }}"
                        min="{{ date('Y-m-d') }}"
                        class="w-full sm:w-60 border border-gray-300 rounded-lg px-3 py-2.5 focus:ring-orange-500 focus:border-orange-500 text-gray-900 transition-colors duration-200">
                </div>
            </div>

            <div class="flex justify-end space-x-4 pt-6">
                <button type="button"
                    class="px-6 py-2.5 border border-orange-500 rounded-lg text-orange-500 hover:bg-orange-50 transition-colors duration-200 font-semibold">
                    Batal
                </button>
                <button type="submit"
                    class="px-6 py-2.5 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-colors duration-200 font-semibold">
                    Simpan Lowongan
                </button>
            </div>
        </form>
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
                if (e.target.closest('.hapus-syarat')) {
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