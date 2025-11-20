@extends('Admin.Dashboard-admin.layouts.index')

@section('admin-content')
    <div class="mx-auto p-6">

        <div class="bg-white border border-gray-300 rounded-xl shadow-sm overflow-hidden">

            <div class="flex items-center gap-3 py-6 border-b rounded-b-3xl shadow-md">
                <img src="{{ asset('storage/' . $data->img_profile) }}" alt="Logo" class="w-40 h-40 object-contain">
                <div class="w-full lg:w-[70%] text-left lg:text-center">
                    <h1 class="text-lg font-bold">{{ $data->nama_perusahaan }}</h1>
                </div>
            </div>

            <div class="p-6 space-y-6 text-sm text-gray-700">

                <div>
                    <h2 class="font-bold text-black">Deskripsi</h2>
                    <p class="mt-2 leading-relaxed">
                        {{ $data->deskripsi }}
                    </p>
                </div>

                <div>
                    <h2 class="font-bold text-black">Visi</h2>
                    <ul class="list-disc list-inside text-sm text-gray-700">
                        <li>{{ $data->visi }}</li>
                    </ul>
                </div>

                <div>
                    <h2 class="font-bold text-black">Misi</h2>
                    <ul class="list-disc list-inside text-sm text-gray-700 space-y-1">
                        <li>{{ $data->misi }}</li>
                    </ul>
                </div>

                <div>
                    <h2 class="font-bold text-black">Data Perusahaan</h2>
                    <div class="mt-2 space-y-1">
                        <p>User ID <span class="ml-8">: {{ $data->users->id }}</span></p>
                        <p>Username <span class="ml-4">: {{ $data->users->username }}</span></p>
                        <p>Email <span class="ml-12">: {{ $data->users->email }}</span></p>
                        <p>Kata Sandi <span class="ml-2">: ********</span></p>
                        <p>Nama Perusahaan <span class="ml-[-2px]">: {{ $data->nama_perusahaan }}</span></p>
                        <p>Legalitas <span class="ml-8">: {{ $data->legalitas }}</span></p>
                    </div>
                </div>

                <div>
                    <h2 class="font-bold text-black">Kontak</h2>
                    <div class="mt-2 space-y-1">
                        <p>Perusahaan <span class="ml-3">: (0274) 123456</span></p>
                        <p>Whatsapp <span class="ml-6">: 08123456789</span></p>
                    </div>
                </div>

                <div>
                    <h2 class="font-bold text-black">Lowongan</h2>
                    <div class="mt-2 space-y-3">
                        @foreach ($lowongan as $l)
                            @if ($l->perusahaan_id === $data->id && $l->updated_at)
                                <div>
                                    <a href="/dashboard/admin/perusahaan/view/lowongan/{{ $l->id }}"
                                        class="text-blue-600 hover:underline font-semibold">{{ $l->nama }}</a>
                                    <p>{{ $l->alamat }}</p>
                                    <p class="text-gray-500 text-xs updated-date" data-updated="{{ $l->updated_at }}">
                                        Menghitung...
                                    </p>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.updated-date').forEach(function(el) {
                const updatedStr = el.getAttribute('data-updated');
                const updatedDate = new Date(updatedStr);
                const today = new Date();

                updatedDate.setHours(0, 0, 0, 0);
                today.setHours(0, 0, 0, 0);

                const diffTime = today - updatedDate;
                const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));

                if (diffDays === 0) {
                    el.textContent = 'Hari ini diperbarui';
                } else if (diffDays === 1) {
                    el.textContent = '1 hari yang lalu';
                } else {
                    el.textContent = diffDays + ' hari yang lalu';
                }
            });
        });
    </script>
@endsection
