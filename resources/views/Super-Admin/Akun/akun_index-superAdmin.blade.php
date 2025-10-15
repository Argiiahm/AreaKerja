@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="mx-auto p-6">
        <div class="overflow-hidden">
            <div class="text-white py-3 flex items-center gap-2">
                <a href="/dashboard/superadmin/akun/add"
                    class="bg-orange-500 hover:bg-orange-700 px-3 py-1 rounded text-sm font-medium flex items-center gap-1">
                    Tambah User
                    <i class="ph ph-plus text-xs"></i>
                </a>
            </div>

            <div class="overflow-x-auto rounded-lg">
                <table class="w-full">
                    <thead class="bg-orange-500 text-white">
                        <tr>
                            <th class="px-4 py-3 text-left text-sm font-medium">ID</th>
                            <th class="px-4 py-3 text-left text-sm font-medium">User</th>
                            <th class="px-4 py-3 text-left text-sm font-medium">Email</th>
                            <th class="px-4 py-3 text-left text-sm font-medium">Username</th>
                            <th class="px-4 py-3 text-left text-sm font-medium">Region</th>
                            <th class="px-4 py-3 text-left text-sm font-medium">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($Data as $d)
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="px-4 py-3 text-sm text-gray-900">{{ $loop->iteration }}</td>
                                <td class="px-4 py-3 text-sm text-gray-900">{{ $d->role }}</td>
                                <td class="px-4 py-3 text-sm text-gray-900">{{ $d->email }}</td>
                                <td class="px-4 py-3 text-sm text-gray-900">{{ $d->username }}</td>
                                @if ($d->superadmins?->kota === null || $d->pelamars?->alamat_pelamars?->kota === null)
                                    <td class="px-4 py-3 text-sm text-gray-900">Data Belum Terisi</td>
                                @else
                                    <td class="px-4 py-3 text-sm text-gray-900">
                                        {{ $d->superadmins?->kota ?? $d->pelamars?->alamat_pelamars?->kota }}
                                    </td>
                                @endif

                                <td class="px-4 py-3 text-sm">
                                    <div class="flex gap-1">
                                        <a href="/dashboard/superadmin/{{ $d->id }}/edit"
                                            class="bg-orange-500 hover:bg-orange-600 text-white p-1.5 rounded text-xs">
                                            <i class="ph ph-pencil"></i>
                                        </a>
                                        <a href="/dashboard/superadmin/{{ $d->id }}/view"
                                            class="bg-orange-500 hover:bg-orange-600 text-white p-1.5 rounded text-xs">
                                            <i class="ph ph-eye"></i>
                                        </a>
                                        <button data-id="{{ $d->id }}"
                                            class="btnHapus bg-orange-500 hover:bg-orange-600 text-white p-1.5 rounded text-xs">
                                            <i class="ph ph-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <div id="modalKonfirmasi-{{ $d->id }}"
                                class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center z-50">
                                <div class="bg-white text-gray-800 rounded-xl shadow-lg p-6 w-[350px] text-center relative">
                                    <div class="text-gray-600 text-5xl mb-3"><i class="ph ph-trash"></i></div>
                                    <p class="text-gray-800 font-semibold mb-5">Yakin akan hapus data?</p>
                                    <div class="flex justify-center space-x-4">
                                        <form action="/delete/akun/{{ $d->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-green-500 text-white px-6 py-1 rounded-md hover:bg-green-600">Hapus</button>
                                        </form>
                                        <button data-id="{{ $d->id }}"
                                            class="batalHapus bg-red-500 text-white px-6 py-1 rounded-md hover:bg-red-600">Batal</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @if (session('success'))
        <div id="modalSukses" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-xl shadow-lg w-[350px] text-center relative p-6">
                <button id="closeSukses" class="absolute top-2 right-3 text-gray-400 text-xl hover:text-gray-600">×</button>

                <div class="flex flex-col items-center justify-center space-y-4">
                    <div class="flex items-center justify-center w-20 h-20 rounded-full bg-green-100">
                        <div class="flex items-center justify-center w-14 h-14 rounded-full bg-green-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                                stroke="white" class="w-10 h-10">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </div>

                    <p class="text-gray-800 font-semibold text-[15px]">Data User Berhasil Dihapus</p>
                </div>
            </div>
        </div>

        <script>
            setTimeout(() => {
                document.getElementById('modalSukses')?.classList.add('hidden');
            }, 2000);

            document.getElementById('closeSukses')?.addEventListener('click', () => {
                document.getElementById('modalSukses').classList.add('hidden');
            });
        </script>
        @endif

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
