@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="p-6 bg-gray-50 min-h-screen">
        <div class="flex flex-wrap items-center justify-between mb-6">
            <div class="flex flex-wrap items-center space-x-3 text-sm text-gray-700">
                <span class="font-medium text-gray-900">Semua ({{ $all }})</span>
                <span id="btn_terbit" class="text-blue-600 hover:text-blue-800 cursor-pointer font-medium transition">
                    | Telah Terbit ({{ $terbit }})
                </span>
                <span id="btn_blmterbit" class="text-blue-600 hover:text-blue-800 cursor-pointer font-medium transition">
                    | Draf ({{ $noterbit }})
                </span>
            </div>

            <a href="/dashboard/superadmin/tipskerja/add"
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg text-sm font-medium shadow transition">
                + Buat Post
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-md p-5 mb-6 border border-gray-200">
            <div class="flex flex-col md:flex-row justify-between gap-4 items-center">
                <div class="flex flex-wrap items-center gap-3">
                    <select id="filterSelect"
                        class="border border-gray-300 rounded-lg px-3 py-2 text-sm text-gray-700 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition">
                        <option value="created_at">Tanggal</option>
                        <option value="title">Nama</option>
                    </select>

                    <button type="button" onclick="setAction('update')"
                        class="bg-gray-800 hover:bg-gray-900 text-white px-4 py-2 rounded-lg text-sm shadow-sm transition">
                        Terapkan
                    </button>
                    <button type="button" onclick="setAction('delete')"
                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm shadow-sm transition">
                        Hapus
                    </button>
                </div>

                <div class="flex flex-wrap items-center gap-2">
                    <input id="searchInput" type="text" placeholder="Cari nama/tanggal..."
                        class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-400 w-48 transition">
                    <button type="button" onclick="searchTable()"
                        class="bg-gray-800 hover:bg-gray-900 text-white px-5 py-2 rounded-lg text-sm transition">
                        Cari
                    </button>
                </div>
            </div>
        </div>

        <form id="bulkAction" method="POST">
            @csrf
            <input type="hidden" name="_method" id="formMethod">
            <input type="hidden" name="status" id="statusField">

            <div id="sudah_terbit" class="overflow-x-auto rounded-xl shadow-md border border-gray-200 bg-white">
                <table class="w-full text-sm text-left border-collapse">
                    <thead class="bg-gray-800 text-white text-sm uppercase tracking-wide">
                        <tr>
                            <th class="px-5 py-3"><input type="checkbox" id="checkAllTerbit" class="w-4 h-4"></th>
                            <th class="px-5 py-3">Judul</th>
                            <th class="px-5 py-3">Penulis</th>
                            <th class="px-5 py-3">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sudah_terbit as $d)
                            <tr class="border-b hover:bg-gray-100 transition">
                                <td class="px-5 py-3">
                                    <input name="ids[]" type="checkbox" value="{{ $d->id }}" class="w-4 h-4">
                                </td>
                                <td class="px-5 py-3 text-blue-600 hover:text-blue-800 font-medium cursor-pointer">
                                    {{ $d->title }}
                                </td>
                                <td class="px-5 py-3 text-gray-700">{{ $d->penulis }}</td>
                                <td class="px-5 py-3 text-gray-600">{{ $d->created_at->format('d M Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div id="belum_terbit" class="overflow-x-auto rounded-xl shadow-md border border-gray-200 bg-white hidden">
                <table class="w-full text-sm text-left border-collapse">
                    <thead class="bg-gray-800 text-white text-sm uppercase tracking-wide">
                        <tr>
                            <th class="px-5 py-3"><input type="checkbox" id="checkAllBelum" class="w-4 h-4"></th>
                            <th class="px-5 py-3">Judul</th>
                            <th class="px-5 py-3">Penulis</th>
                            <th class="px-5 py-3">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($belum_terbit as $d)
                            <tr class="border-b hover:bg-gray-100 transition">
                                <td class="px-5 py-3">
                                    <input name="ids[]" type="checkbox" value="{{ $d->id }}" class="w-4 h-4">
                                </td>
                                <td class="px-5 py-3 text-blue-600 hover:text-blue-800 font-medium cursor-pointer">
                                    {{ $d->title }}
                                </td>
                                <td class="px-5 py-3 text-gray-700">{{ $d->penulis }}</td>
                                <td class="px-5 py-3 text-gray-600">{{ $d->created_at->format('d M Y') }}</td>
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
                if (filterBy === "title") colText = row.cells[1].innerText.toLowerCase();
                else if (filterBy === "created_at") colText = row.cells[3].innerText.toLowerCase();

                row.style.display = colText.includes(input) ? "" : "none";
            });
        }
    </script>
@endsection
