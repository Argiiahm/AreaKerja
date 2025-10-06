@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-2xl p-8 mt-10 border border-gray-200">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 border-b pb-3">📝 Tambah Artikel Tips Kerja</h2>

        <form action="/dashboard/superadmin/tipskerja/create/post" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label for="title" class="block text-sm font-semibold text-gray-700 mb-1">Judul Artikel</label>
                <input type="text" id="title" name="title" placeholder="Masukkan judul artikel..."
                    class="w-full border-2 border-gray-300 rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none transition duration-200">
            </div>

            <div>
                <label for="uploadMedia"
                    class="cursor-pointer flex items-center gap-2 w-fit bg-orange-500 text-white px-4 py-2 rounded-lg shadow hover:bg-orange-600 transition duration-200">
                    <i class="ph ph-upload-simple text-lg"></i> Tambahkan Media
                </label>
                <input id="uploadMedia" type="file" name="image" hidden>
                <p class="text-sm text-gray-500 mt-1">Format yang didukung: JPG, PNG, atau JPEG.</p>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Isi Artikel</label>
                <input id="x" type="hidden" name="content">
                <div
                    class="border-2 border-gray-300 rounded-xl overflow-hidden focus-within:ring-2 focus-within:ring-orange-500">
                    <trix-editor input="x" class="trix-content bg-gray-50 p-3 min-h-[250px]"></trix-editor>
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t mt-6">
                <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white px-6 py-2.5 rounded-lg shadow transition duration-200">
                    Simpan
                </button>
                <a href="/dashboard/superadmin/tipskerja"
                    class="bg-red-600 hover:bg-red-700 text-white px-6 py-2.5 rounded-lg shadow transition duration-200">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection
