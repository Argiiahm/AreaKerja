@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="p-6">
        <div class="flex flex-wrap items-center mb-3 space-x-2 text-sm">
            <span>Semua ({{ $all }})</span>
            <span id="btn_terbit" class="text-blue-500 cursor-pointer">| Telah Terbit ({{ $terbit }})</span>
            <span id="btn_blmterbit" class="text-blue-500 cursor-pointer">| Draf ({{ $noterbit }})</span>
        </div>

        <div class="flex flex-col md:flex-row justify-between md:items-center mb-4 gap-3">
            <div class="flex flex-wrap items-center gap-2">
                <div class="relative">
                    <select id="filterSelect"
                        class="appearance-none border border-gray-300 rounded-md px-3 h-9 pr-6 text-sm text-gray-700 focus:outline-none">
                        <option value="created_at">Tanggal</option>
                        <option value="title">Nama</option>
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
                <input id="searchInput" type="text" placeholder="nama/tanggal..."
                    class="border border-gray-300 rounded-md px-3 h-9 text-sm focus:outline-none w-full md:w-48">
                <button type="button" onclick="searchTable()"
                    class="bg-gray-700 text-white px-5 h-9 rounded-md text-sm">Cari</button>
                <a href="/dashboard/superadmin/tipskerja/add"
                    class="bg-blue-500 text-white px-6 py-2 rounded-md text-sm text-center">
                    Buat Post
                </a>
            </div>
        </div>

        <form id="bulkAction" method="POST">
            @csrf
            <input type="hidden" name="_method" id="formMethod">
            <input type="hidden" name="status" id="statusField">

            <div id="sudah_terbit" class="overflow-x-auto rounded-lg shadow">
                <table class="w-full text-sm text-left border-collapse">
                    <thead class="bg-gray-700 text-white">
                        <tr>
                            <th class="px-4 py-3">
                                <input type="checkbox" id="checkAllTerbit" class="w-4 h-4">
                            </th>
                            <th class="px-4 py-3">Judul</th>
                            <th class="px-4 py-3">Penulis</th>
                            <th class="px-4 py-3">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sudah_terbit as $d)
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

            <div id="belum_terbit" class="overflow-x-auto rounded-lg shadow hidden">
                <table class="w-full text-sm text-left border-collapse">
                    <thead class="bg-gray-700 text-white">
                        <tr>
                            <th class="px-4 py-3">
                                <input type="checkbox" id="checkAllBelum" class="w-4 h-4">
                            </th>
                            <th class="px-4 py-3">Judul</th>
                            <th class="px-4 py-3">Penulis</th>
                            <th class="px-4 py-3">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($belum_terbit as $d)
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
        let btn_terbit = document.getElementById("btn_terbit");
        let btn_blmterbit = document.getElementById("btn_blmterbit");

        let belum_terbit = document.getElementById('belum_terbit');
        let sudah_terbit = document.getElementById('sudah_terbit');

        btn_blmterbit.addEventListener("click", () => {
            sudah_terbit.classList.add('hidden');
            belum_terbit.classList.remove('hidden');
        });

        btn_terbit.addEventListener("click", () => {
            belum_terbit.classList.add('hidden');
            sudah_terbit.classList.remove('hidden');
        });

        function setAction(action) {
            let form = document.getElementById('bulkAction');

            if (action === 'update') {
                form.action = "/ubah/status/tipskerja";
                document.getElementById('formMethod').value = "PUT";
                document.getElementById('statusField').value = "terbit";
            } else if (action === 'delete') {
                form.action = "/delete/tipskerja";
                document.getElementById('formMethod').value = "DELETE";
            }

            form.submit();
        }

        document.getElementById("checkAllTerbit").addEventListener("change", function() {
            document.querySelectorAll("#sudah_terbit input[name='ids[]']").forEach(cb => cb.checked = this.checked);
        });

        document.getElementById("checkAllBelum").addEventListener("change", function() {
            document.querySelectorAll("#belum_terbit input[name='ids[]']").forEach(cb => cb.checked = this.checked);
        });

        function searchTable() {
            let input = document.getElementById("searchInput").value.toLowerCase();
            let filterBy = document.getElementById("filterSelect").value;

            let table = document.querySelector("#sudah_terbit:not(.hidden) table, #belum_terbit:not(.hidden) table");
            let rows = table.querySelectorAll("tbody tr");

            rows.forEach(row => {
                let colText = "";

                if (filterBy === "title") {
                    colText = row.cells[2].innerText.toLowerCase();
                } else if (filterBy === "created_at") {
                    colText = row.cells[3].innerText.toLowerCase();
                }

                row.style.display = colText.includes(input) ? "" : "none";
            });
        }
    </script>
@endsection
