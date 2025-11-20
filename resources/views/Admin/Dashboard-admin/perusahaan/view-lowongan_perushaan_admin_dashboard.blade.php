@extends('Admin.Dashboard-admin.layouts.index')

@section('admin-content')
   <div class="mx-auto mt-10">
        <div class="p-6">
            <div class="flex items-center justify-between shadow-lg border-2 rounded-lg p-6 mb-8">
                <div class="w-28 h-28 flex items-center justify-center rounded-md overflow-hidden">
                    <img src="{{ asset('storage/' . $Data->img_profile) }}" alt="Logo" class="object-contain">
                </div>
                <h2 class="text-2xl font-bold text-center">
                    {{ $Data->nama_perusahaan }}
                </h2>
            </div>


            <div class="space-y-6">
                <div>
                    <h3 class="font-semibold mb-1">Deskripsi</h3>
                    <p class="text-sm text-gray-700 leading-relaxed">
                        {{ $Data->deskripsi }}
                    </p>
                </div>

                <div>
                    <h3 class="font-semibold mb-1">Visi</h3>
                    <ul class="list-disc list-inside text-sm text-gray-700">
                        <li>{{ $Data->visi }}</li>
                    </ul>
                </div>

                <div>
                    <h3 class="font-bold mb-1">Misi</h3>
                    <ul class="list-disc list-inside text-sm text-gray-700 space-y-1">
                        <li>{{ $Data->misi }}</li>
                    </ul>
                </div>

                <div>
                    <h3 class="font-bold mb-1">Data Perusahaan</h3>
                    <div class="space-y-3 text-sm text-gray-700">
                        <p><span class="font-medium">User ID</span> : {{ $Data->users->id }}</p>
                        <p><span class="font-medium">Userna <span> : {{ $Data->users->username }}</p>
                        <p><span class="font-medium">Email</span> : {{ $Data->users->email }}</p>
                        <p><span class="font-medium">Kata Sandi</span> : ***********</p>
                        <p><span class="font-medium">Nama Perusahaan</span> : {{ $Data->nama_perusahaan }}</p>
                        <p><span class="font-medium">Legalitas</span> : {{ $Data->legalitas ?? 'Data Kosong!' }}</p>
                    </div>
                </div>

                <div>
                    <h3 class="font-bold mb-1">Kontak</h3>
                    <div class="space-y-3 text-sm text-gray-700">
                        <p><span class="font-medium">Perusahaan</span> : {{ $Data->telepon_perusahaan }}</p>
                        <p><span class="font-medium">Whatsapp</span> : {{ $Data->whatsapp }}</p>
                    </div>
                </div>

                <div>
                    <h3 class="font-bold mb-2">Lowongan</h3>
                    <div class="space-y-2 text-sm">
                        @foreach ($Data->pasanglowongan as $p)
                            @if ($p->paket_id)
                                <a href="/dashboard/superadmin/perusahaan/lowongan/detail/{{ $p->id }}"
                                    class="text-blue-600 hover:underline">{{ $p->nama }}</a>
                                <p class="text-gray-500 text-xs">{{ $p->alamat }} •
                                    {{ $p->created_at->diffForHumans() }}</p>
                            @endif
                        @endforeach

                        <h3 class="font-bold py-2">Lowongan Non Publish</h3>

                        @foreach ($Data->pasanglowongan as $p)
                            @if ($p->paket_id === null)
                                <a href="/dashboard/superadmin/perusahaan/lowongan/detail/{{ $p->id }}"
                                    class="text-blue-600 hover:underline">{{ $p->nama }}</a>
                                <p class="text-gray-500 text-xs">{{ $p->alamat }} •
                                    {{ $p->created_at->diffForHumans() }}</p>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-center gap-3 mt-8 w-full">
                <a href="/dashboard/superadmin/perusahaan/lowongan/add/{{ $Data->id }}"
                    class="bg-orange-500 text-white py-2 px-10 rounded-md">Tambah Lowongan</a>
                <a href="/dashboard/superadmin/perusahaan/edit/perusahaan/{{ $Data->id }}"
                    class="bg-blue-500 text-white py-2 px-32 rounded-md">Edit</a>
                <button data-id="{{ $Data->users->id }}"
                    class="btnHapus bg-red-500 text-white py-2 px-32 rounded-md">
                    Hapus
                </button>
                <div id="modalKonfirmasi-{{ $Data->users->id }}"
                    class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center z-50">
                    <div class="bg-white text-gray-800 rounded-xl shadow-lg p-6 w-[350px] text-center relative">
                        <div class="text-gray-600 text-5xl mb-3"><i class="ph ph-trash"></i></div>
                        <p class="text-gray-800 font-semibold mb-5">Yakin akan hapus data?</p>
                        <div class="flex justify-center space-x-4">
                            <form action="/dashboard/superadmin/perusahaan/delete/perusahaan/{{ $Data->users->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-green-500 text-white px-6 py-1 rounded-md hover:bg-green-600">Hapus</button>
                            </form>
                            <button data-id="{{ $Data->users->id }}"
                                class="batalHapus bg-red-500 text-white px-6 py-1 rounded-md hover:bg-red-600">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.btnHapus').forEach(btn => {
            btn.addEventListener('click', () => {
                const id = btn.dataset.id;
                document.getElementById(`modalKonfirmasi-${id}`).classList.remove('hidden');
            });
        });

        document.querySelectorAll('.batalHapus').forEach(btn => {
            btn.addEventListener('click', () => {
                const id = btn.dataset.id;
                document.getElementById(`modalKonfirmasi-${id}`).classList.add('hidden');
            });
        });
    </script>
@endsection
