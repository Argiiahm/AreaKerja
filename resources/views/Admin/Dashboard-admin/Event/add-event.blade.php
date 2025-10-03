@extends('Admin.Dashboard-admin.layouts.index')

@section('admin-content')
    <div class="mx-auto p-6">
        <form action="/dashboard/admin/event/tambah" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-medium mb-1">Status Acara</label>
                <select name="status"
                    class="rounded-md border-gray-300 focus:border-green-500 focus:ring-green-500 text-sm px-3 py-2 shadow-sm w-40">
                    <option value="open">Open</option>
                    <option value="close">Close</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Judul Artikel</label>
                <input type="text" name="title" placeholder="Masukkan judul artikel..."
                    class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500 text-sm px-3 py-2 shadow-sm">
            </div>


            <div>
                <label for="uploadMedia"
                    class="cursor-pointer inline-flex items-center px-4 py-2 bg-gray-100 border rounded-lg shadow-sm hover:bg-gray-200 text-sm font-medium">
                    Tambahkan Media
                </label>
                <input id="uploadMedia" name="image" type="file" accept="image/*" hidden>

                <div class="mt-3">
                    <img id="previewImage" class="max-h-48 rounded-lg shadow hidden" alt="Preview Gambar">
                </div>
            </div>


            <div>
                <label class="block text-sm font-medium mb-1">Konten</label>
                <input id="x" type="hidden" name="content">
                <trix-editor input="x" class="trix-content border rounded-lg shadow-sm px-3 py-2"></trix-editor>
            </div>


            <div>
                <label class="block text-sm font-medium mb-1">Waktu Acara</label>
                <div class="flex flex-wrap items-center gap-2">
                    <input type="date" name="tgl_mulai"
                        class="rounded-md border-gray-300 focus:border-green-500 focus:ring-green-500 text-sm px-3 py-2 shadow-sm">
                    <input type="time" name="jam_mulai" value="00:00"
                        class="rounded-md border-gray-300 focus:border-green-500 focus:ring-green-500 text-sm px-3 py-2 shadow-sm w-28">
                    <span class="text-sm">Sampai</span>
                    <input type="date" name="tgl_akhir"
                        class="rounded-md border-gray-300 focus:border-green-500 focus:ring-green-500 text-sm px-3 py-2 shadow-sm">
                    <input type="time" name="jam_akhir" value="00:00"
                        class="rounded-md border-gray-300 focus:border-green-500 focus:ring-green-500 text-sm px-3 py-2 shadow-sm w-28">
                </div>
            </div>


            <div>
                <label class="block text-sm font-medium mb-1">Penutupan Pendaftaran</label>
                <input type="date" name="penutupan_pendaftaran"
                    class="rounded-md border-gray-300 focus:border-green-500 focus:ring-green-500 text-sm px-3 py-2 shadow-sm">
            </div>


            <div class="flex flex-wrap gap-6">
                <div class="flex-1">
                    <label class="block text-sm font-medium mb-1">Kuota Partisipasi</label>
                    <input type="number" name="kuota" value="000"
                        class="rounded-md border-gray-300 focus:border-green-500 focus:ring-green-500 text-sm px-3 py-2 shadow-sm w-28">
                </div>
                <div class="flex-1">
                    <label class="block text-sm font-medium mb-1">Link Form</label>
                    <input type="text" name="link_form"
                        class="rounded-md border-gray-300 focus:border-green-500 focus:ring-green-500 text-sm px-3 py-2 shadow-sm w-full">
                </div>
            </div>


            <div>
                <label class="block text-sm font-medium mb-1">Lokasi</label>
                <textarea name="lokasi" rows="3"
                    class="rounded-md border-gray-300 focus:border-green-500 focus:ring-green-500 text-sm px-3 py-2 shadow-sm w-full"
                    placeholder="Isi Detail Alamat Acara"></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium mb-2">Daftar Kegiatan</label>
                <div id="daftarKegiatan" class="space-y-2">
                    <div class="flex gap-2">
                        <input type="time" name="waktu[]" value="00:00"
                            class="rounded-md border-gray-300 focus:border-green-500 focus:ring-green-500 text-sm px-3 py-2 shadow-sm w-28">
                        <input type="text" name="kegiatan[]" placeholder="Isi kegiatan"
                            class="rounded-md border-gray-300 focus:border-green-500 focus:ring-green-500 text-sm px-3 py-2 shadow-sm w-full">
                    </div>
                </div>
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

        btnTambah.addEventListener('click', () => {
            const div = document.createElement('div');
            div.className = 'flex gap-2';

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

            div.appendChild(inputTime);
            div.appendChild(inputText);

            daftar.appendChild(div);
        });

        document.addEventListener("trix-initialize", function(event) {
            let editor = event.target.editor;
            event.target.removeAttribute("autofocus");
            editor.setSelectedRange(null);
            editor.composition.updateSelection = function() {
                return;
            };
        });

        const uploadInput = document.getElementById('uploadMedia');
        const previewImage = document.getElementById('previewImage');

        uploadInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewImage.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            } else {
                previewImage.classList.add('hidden');
                previewImage.src = '';
            }
        }); 
    </script>
@endsection
