@extends('Admin.Dashboard-admin.layouts.index')

@section('admin-content')
    <div class="p-6">
        <div class="flex flex-wrap items-center mb-3 space-x-2 text-sm">
            <span>Semua ({{ $all }})</span>
            <span class="text-blue-500 cursor-pointer">| Telah Terbit ({{ $terbit }})</span>
            <span class="text-blue-500 cursor-pointer">| Draf ({{ $noterbit }})</span>
        </div>

        <div class="flex flex-col md:flex-row justify-between md:items-center mb-4 gap-3">
            <div class="flex flex-wrap items-center gap-2">
                <div class="relative">
                    <select
                        class="appearance-none border border-gray-300 rounded-md px-3 h-9 pr-6 text-sm text-gray-700 focus:outline-none">
                        <option>Tanggal</option>
                        <option>Nama</option>
                    </select>
                </div>

                <button type="button" onclick="setAction('update')"
                    class="bg-gray-700 text-white px-4 h-9 rounded-md text-sm">
                    Terapkan
                </button>
                <button type="button" onclick="setAction('delete')"
                    class="bg-red-500 text-white px-4 h-9 rounded-md text-sm">
                    Hapus
                </button>
            </div>

            <div class="flex flex-wrap items-center gap-2">
                <input type="text" placeholder="nama/tanggal..."
                    class="border border-gray-300 rounded-md px-3 h-9 text-sm focus:outline-none w-full md:w-48">
                <button class="bg-gray-700 text-white px-5 h-9 rounded-md text-sm">Cari</button>
                <a href="/dashboard/admin/tipskerja/addpost"
                    class="bg-blue-500 text-white px-6 py-2 rounded-md text-sm text-center">
                    Buat Post
                </a>
            </div>
        </div>

        <form id="bulkAction" method="POST">
            @csrf
            <input type="hidden" name="_method" id="formMethod">
            <input type="hidden" name="status" id="statusField">

            <div class="overflow-x-auto rounded-lg shadow">
                <table class="w-full text-sm text-left border-collapse">
                    <thead class="bg-gray-700 text-white">
                        <tr>
                            <th class="px-4 py-3">
                                <input type="checkbox" id="checkAll" class="w-4 h-4">
                            </th>
                            <th class="px-4 py-3">Judul</th>
                            <th class="px-4 py-3">Penulis</th>
                            <th class="px-4 py-3">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Data as $d)
                            <tr class="bg-gray-200">
                                <td class="px-4 py-3">
                                    <input name="ids[]" type="checkbox" value="{{ $d->id }}" class="w-4 h-4">
                                </td>
                                <td class="px-4 py-3 text-blue-600 font-medium cursor-pointer">{{ $d->title }}</td>
                                <td class="px-4 py-3">{{ $d->penulis }}</td>
                                <td class="px-4 py-3">{{ $d->created_at->format('d M Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </form>
    </div>

    <script>
        function setAction(action) {
            let form = document.getElementById('bulkAction');

            if (action === 'update') {
                form.action = "/ubah/status";
                document.getElementById('formMethod').value = "PUT";
                document.getElementById('statusField').value = "terbit";
            } else if (action === 'delete') {
                form.action = "/delete";
                document.getElementById('formMethod').value = "DELETE";
            }

            form.submit();
        }

        // Select all
        document.getElementById("checkAll").addEventListener("change", function() {
            document.querySelectorAll("input[name='ids[]']").forEach(cb => cb.checked = this.checked);
        });
    </script>
@endsection
