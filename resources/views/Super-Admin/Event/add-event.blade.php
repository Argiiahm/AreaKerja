@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="mx-auto p-6">
        <form action="" method="POST">
            @csrf

            <div class="mb-4">
                <input type="text" name="title" placeholder="Judul artikel..."
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
            </div>

            <div class="mb-4">
                <label for="uploadMedia"
                    class="cursor-pointer px-4 py-2 bg-gray-100 border rounded-lg shadow hover:bg-gray-200 text-sm font-medium">
                    Tambahkan Media
                </label>
                <input id="uploadMedia" type="file" hidden>
            </div>

            <div class="mb-6">
                <input id="x" type="hidden" name="content">
                <trix-editor input="x" class="trix-content"></trix-editor>
            </div>

            <div class="mb-4">
                <label class="block font-medium text-sm mb-1">Waktu Acara</label>
                <div class="flex items-center gap-2">
                    <select name="tanggal" class="border rounded-md px-3 h-9 text-sm w-40">
                        <option>-- Tanggal --</option>
                        <option value="2023-07-27">27 Juli 2023</option>
                    </select>
                    <input type="time" name="mulai" value="00:00" class="border rounded-md px-3 h-9 text-sm w-28">
                    <span class="text-sm">Sampai</span>
                    <input type="time" name="selesai" value="00:00" class="border rounded-md px-3 h-9 text-sm w-28">
                </div>
            </div>

            <div class="mb-4">
                <label class="block font-medium text-sm mb-1">Penutupan Pendaftaran</label>
                <select name="" class="border rounded-md px-3 h-9 text-sm w-40">
                    <option>Pilih Tanggal</option>
                    <option value="2023-07-26">26 Juli 2023</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-medium text-sm mb-1">Kuota Partisipasi</label>
                <input type="number" name="" value="000" class="border rounded-md px-3 h-9 text-sm w-24">
            </div>

            <div class="mb-4">
                <label class="block font-medium text-sm mb-1">Lokasi</label>
                <textarea name="" rows="3" class="border rounded-md px-3 py-2 w-full text-sm"
                    placeholder="Isi Detail Alamat Acara"></textarea>
            </div>

            <div class="mb-6">
                <label class="block font-medium text-sm mb-2">Daftar Kegiatan</label>
                <div id="daftarKegiatan" class="space-y-2">
                    <div class="flex gap-2">
                        <input type="time" name="" value="00:00" class="border rounded-md px-3 h-9 text-sm w-28">
                        <input type="text" name="" placeholder="Isi kegiatan"
                            class="border rounded-md px-3 h-9 text-sm w-full">
                    </div>
                    <div class="flex gap-2">
                        <input type="time" name="" value="00:00" class="border rounded-md px-3 h-9 text-sm w-28">
                        <input type="text" name="" placeholder="Isi kegiatan"
                            class="border rounded-md px-3 h-9 text-sm w-full">
                    </div>
                    <div class="flex gap-2">
                        <input type="time" name="" value="00:00" class="border rounded-md px-3 h-9 text-sm w-28">
                        <input type="text" name="" placeholder="Isi kegiatan"
                            class="border rounded-md px-3 h-9 text-sm w-full">
                    </div>
                </div>

                <button type="button" class="mt-3 bg-green-500 text-white px-4 py-2 rounded-md text-sm shadow">
                    Tambah Acara
                </button>
            </div>

            <div>
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-md text-sm shadow">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
