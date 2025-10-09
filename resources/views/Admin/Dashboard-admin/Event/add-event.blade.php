@extends('Admin.Dashboard-admin.layouts.index')

@section('admin-content')
<div class="max-w-5xl mx-auto p-8 bg-white shadow-lg rounded-2xl border border-gray-100 mt-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-8 border-b pb-4">
        🗓️ Tambah Event Baru
    </h1>

    <form action="/dashboard/admin/event/tambah" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf

        <div class="grid sm:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Status Acara</label>
                <select name="status"
                    class="rounded-xl border-gray-300 focus:border-green-500 focus:ring-green-400 text-sm px-4 py-2.5 w-full shadow-sm">
                    <option value="open">Open</option>
                    <option value="close">Close</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Artikel</label>
                <input type="text" name="title" placeholder="Masukkan judul artikel..."
                    class="w-full rounded-xl border-gray-300 focus:border-green-500 focus:ring-green-400 text-sm px-4 py-2.5 shadow-sm">
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Gambar / Media</label>
            <label for="uploadMedia"
                class="cursor-pointer inline-flex items-center px-5 py-2.5 bg-green-50 border border-green-200 text-green-700 rounded-xl shadow-sm hover:bg-green-100 transition">
                <i class="ph ph-upload-simple mr-2"></i> Tambahkan Media
            </label>
            <input id="uploadMedia" name="image" type="file" accept="image/*" hidden>

            <div class="mt-4">
                <img id="previewImage" class="max-h-52 rounded-xl shadow-md border hidden" alt="Preview Gambar">
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Konten</label>
            <input id="x" type="hidden" name="content">
            <trix-editor input="x"
                class="trix-content border rounded-xl shadow-sm px-4 py-2 focus:ring-green-400 focus:border-green-400"></trix-editor>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Waktu Acara</label>
            <div class="flex flex-wrap items-center gap-3">
                <input type="date" name="tgl_mulai"
                    class="rounded-xl border-gray-300 focus:border-green-500 focus:ring-green-400 text-sm px-4 py-2 shadow-sm">
                <input type="time" name="jam_mulai" value="00:00"
                    class="rounded-xl border-gray-300 focus:border-green-500 focus:ring-green-400 text-sm px-4 py-2 shadow-sm w-28">
                <span class="text-sm text-gray-500">Sampai</span>
                <input type="date" name="tgl_akhir"
                    class="rounded-xl border-gray-300 focus:border-green-500 focus:ring-green-400 text-sm px-4 py-2 shadow-sm">
                <input type="time" name="jam_akhir" value="00:00"
                    class="rounded-xl border-gray-300 focus:border-green-500 focus:ring-green-400 text-sm px-4 py-2 shadow-sm w-28">
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Penutupan Pendaftaran</label>
            <input type="date" name="penutupan_pendaftaran"
                class="rounded-xl border-gray-300 focus:border-green-500 focus:ring-green-400 text-sm px-4 py-2 shadow-sm">
        </div>

        <div class="grid sm:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Kuota Partisipasi</label>
                <input type="number" name="kuota" value="000"
                    class="rounded-xl border-gray-300 focus:border-green-500 focus:ring-green-400 text-sm px-4 py-2 shadow-sm w-full">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Link Form</label>
                <input type="text" name="link_form" placeholder="Masukkan URL pendaftaran..."
                    class="rounded-xl border-gray-300 focus:border-green-500 focus:ring-green-400 text-sm px-4 py-2 shadow-sm w-full">
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Lokasi</label>
            <textarea name="lokasi" rows="3"
                class="rounded-xl border-gray-300 focus:border-green-500 focus:ring-green-400 text-sm px-4 py-2 shadow-sm w-full"
                placeholder="Isi detail alamat acara..."></textarea>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-3">Daftar Kegiatan</label>
            <div id="daftarKegiatan" class="space-y-3">
                <div class="flex gap-3">
                    <input type="time" name="waktu[]" value="00:00"
                        class="rounded-xl border-gray-300 focus:border-green-500 focus:ring-green-400 text-sm px-3 py-2 shadow-sm w-28">
                    <input type="text" name="kegiatan[]" placeholder="Isi kegiatan"
                        class="rounded-xl border-gray-300 focus:border-green-500 focus:ring-green-400 text-sm px-3 py-2 shadow-sm w-full">
                </div>
            </div>
            <button type="button"
                class="mt-4 bg-green-500 hover:bg-green-600 text-white px-5 py-2.5 rounded-xl text-sm shadow-md transition flex items-center gap-2">
                <i class="ph ph-plus-circle"></i> Tambah Acara
            </button>
        </div>

        <div class="flex justify-end pt-6 border-t mt-10">
            <button type="submit"
                class="bg-green-600 hover:bg-green-700 text-white px-8 py-2.5 rounded-xl text-sm font-medium shadow-md transition">
                Simpan Event
            </button>
        </div>
    </form>
</div>

<script>
    const btnTambah = document.querySelector('button.bg-green-500');
    const daftar = document.getElementById('daftarKegiatan');

    btnTambah.addEventListener('click', () => {
        const div = document.createElement('div');
        div.className = 'flex gap-3';

        const inputTime = document.createElement('input');
        inputTime.type = 'time';
        inputTime.name = 'waktu[]';
        inputTime.value = '00:00';
        inputTime.className =
            'rounded-xl border-gray-300 focus:border-green-500 focus:ring-green-400 text-sm px-3 py-2 shadow-sm w-28';

        const inputText = document.createElement('input');
        inputText.type = 'text';
        inputText.name = 'kegiatan[]';
        inputText.placeholder = 'Isi kegiatan';
        inputText.className =
            'rounded-xl border-gray-300 focus:border-green-500 focus:ring-green-400 text-sm px-3 py-2 shadow-sm w-full';

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
