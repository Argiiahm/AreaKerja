@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="mx-auto p-6">
        <form action="/dashboard/superadmin/event/update/{{ $Data->id }}" method="POST" enctype="multipart/form-data"
            class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium mb-1">Status Acara</label>
                <select name="status"
                    class="rounded-md border-gray-300 focus:border-green-500 focus:ring-green-500 text-sm px-3 py-2 shadow-sm w-40">
                    <option value="open" {{ old('status', $Data->status) == 'open' ? 'selected' : '' }}>Open</option>
                    <option value="close" {{ old('status', $Data->status) == 'close' ? 'selected' : '' }}>Close</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Judul Artikel</label>
                <input type="text" name="title" placeholder="Masukkan judul artikel..."
                    value="{{ old('title', $Data->title) }}"
                    class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500 text-sm px-3 py-2 shadow-sm">
            </div>

            <div>
                <label for="uploadMedia"
                    class="cursor-pointer inline-flex items-center px-4 py-2 bg-gray-100 border rounded-lg shadow-sm hover:bg-gray-200 text-sm font-medium">
                    Tambahkan Media
                </label>
                <input id="uploadMedia" name="image" type="file" accept="image/*" hidden>

                <div class="mt-3">
                    @if ($Data->image)
                        <img id="oldImage" src="{{ asset('storage/' . $Data->image) }}"
                            class="max-h-48 rounded-lg shadow mb-3" alt="Preview Gambar Lama">
                    @endif

                    <img id="previewImage" class="max-h-48 rounded-lg shadow hidden" alt="Preview Gambar Baru">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Konten</label>
                <input id="x" type="hidden" name="content" value="{{ old('content', $Data->content) }}">
                <trix-editor input="x" class="trix-content border rounded-lg shadow-sm px-3 py-2"></trix-editor>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Waktu Acara</label>
                <div class="flex flex-wrap items-center gap-2">
                    <input type="date" name="tgl_mulai" value="{{ old('tgl_mulai', $Data->tgl_mulai) }}"
                        class="rounded-md border-gray-300 focus:border-green-500 focus:ring-green-500 text-sm px-3 py-2 shadow-sm">
                    <input type="time" name="jam_mulai" value="{{ old('jam_mulai', $Data->jam_mulai) }}"
                        class="rounded-md border-gray-300 focus:border-green-500 focus:ring-green-500 text-sm px-3 py-2 shadow-sm w-28">
                    <span class="text-sm">Sampai</span>
                    <input type="date" name="tgl_akhir" value="{{ old('tgl_akhir', $Data->tgl_akhir) }}"
                        class="rounded-md border-gray-300 focus:border-green-500 focus:ring-green-500 text-sm px-3 py-2 shadow-sm">
                    <input type="time" name="jam_akhir" value="{{ old('jam_akhir', $Data->jam_akhir) }}"
                        class="rounded-md border-gray-300 focus:border-green-500 focus:ring-green-500 text-sm px-3 py-2 shadow-sm w-28">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Penutupan Pendaftaran</label>
                <input type="date" name="penutupan_pendaftaran"
                    value="{{ old('penutupan_pendaftaran', $Data->penutupan_pendaftaran) }}"
                    class="rounded-md border-gray-300 focus:border-green-500 focus:ring-green-500 text-sm px-3 py-2 shadow-sm">
            </div>

            <div class="flex flex-wrap gap-3">
                <div class="">
                    <label class="block text-sm font-medium mb-1">Kuota Partisipasi</label>
                    <input type="number" name="kuota" value="{{ old('kuota', $Data->kuota) }}"
                        class="rounded-md border-gray-300 focus:border-green-500 focus:ring-green-500 text-sm px-3 py-2 shadow-sm w-28">
                </div>
                <div class="w-5/12">
                    <label class="block text-sm font-medium mb-1">Link Form</label>
                    <input type="text" name="link_form" value="{{ old('link_form', $Data->link_form) }}"
                        class="rounded-md border-gray-300 focus:border-green-500 focus:ring-green-500 text-sm px-3 py-2 shadow-sm w-full">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Lokasi</label>
                <textarea name="lokasi" rows="3"
                    class="rounded-md border-gray-300 focus:border-green-500 focus:ring-green-500 text-sm px-3 py-2 shadow-sm w-full"
                    placeholder="Isi Detail Alamat Acara">{{ old('lokasi', $Data->lokasi) }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium mb-2">Daftar Kegiatan</label>
                <div id="daftarKegiatan" class="space-y-2">
                    @foreach ($Data->kegiatan_events as $i => $k)
                        <div class="flex items-center gap-2" data-id="{{ $k->id }}">
                            <button type="button"
                                class="hapus-acara bg-red-500 text-white px-2 rounded-md text-sm hover:bg-red-600"
                                data-id="{{ $k->id }}">
                                ✕
                            </button>
                            <input type="hidden" name="id[]" value="{{ $k->id }}">
                            <input type="time" name="waktu[]" value="{{ old('waktu.' . $i, $k->waktu) }}"
                                class="w-28">
                            <input type="text" name="kegiatan[]" value="{{ old('kegiatan.' . $i, $k->kegiatan) }}"
                                class="w-full">
                        </div>
                    @endforeach
                </div>

                <!-- hidden delete_id -->
                <input type="hidden" name="delete_id" id="deleteIds">

                <button type="button"
                    class="mt-3 bg-green-500 text-white px-4 py-2 rounded-md text-sm shadow hover:bg-green-600">
                    Tambah Acara
                </button>
            </div>

            <div>
                <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-md text-sm shadow">
                    Simpan
                </button>
            </div>
        </form>
    </div>

    <script>
        const btnTambah = document.querySelector('button.bg-green-500');
        const daftar = document.getElementById('daftarKegiatan');
        const deleteIdsInput = document.getElementById('deleteIds');

        function addDeleteEvent(button) {
            button.addEventListener('click', () => {
                const id = button.dataset.id;
                if (id) {
                    let current = deleteIdsInput.value ? deleteIdsInput.value.split(',') : [];
                    current.push(id);
                    deleteIdsInput.value = current.join(',');
                }
                button.parentElement.remove();
            });
        }

        // event hapus untuk row lama
        document.querySelectorAll('.hapus-acara').forEach(addDeleteEvent);

        // tambah row baru
        btnTambah.addEventListener('click', () => {
            const div = document.createElement('div');
            div.className = 'flex items-center gap-2';

            const btnDelete = document.createElement('button');
            btnDelete.type = 'button';
            btnDelete.className = 'hapus-acara bg-red-500 text-white px-2 rounded-md text-sm hover:bg-red-600';
            btnDelete.textContent = '✕';
            addDeleteEvent(btnDelete);

            const inputTime = document.createElement('input');
            inputTime.type = 'time';
            inputTime.name = 'waktu[]';
            inputTime.value = '00:00';
            inputTime.className =
                'rounded-md border-gray-300 focus:border-green-500 focus:ring-green-500 text-sm px-3 py-2 shadow-sm w-28';

            const inputText = document.createElement('input');
            inputText.type = 'text';
            inputText.name = 'kegiatan[]';
            inputText.placeholder = 'Isi kegiatan';
            inputText.className =
                'rounded-md border-gray-300 focus:border-green-500 focus:ring-green-500 text-sm px-3 py-2 shadow-sm w-full';

            div.appendChild(btnDelete);
            div.appendChild(inputTime);
            div.appendChild(inputText);

            daftar.appendChild(div);
        });

        // preview gambar
        const uploadInput = document.getElementById('uploadMedia');
        const previewImage = document.getElementById('previewImage');
        const oldImage = document.getElementById('oldImage');

        uploadInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewImage.classList.remove('hidden');
                    if (oldImage) oldImage.classList.add('hidden');
                }
                reader.readAsDataURL(file);
            } else {
                previewImage.classList.add('hidden');
                previewImage.src = '';
                if (oldImage) oldImage.classList.remove('hidden');
            }
        });
    </script>
@endsection
