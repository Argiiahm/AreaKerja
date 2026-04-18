@extends('Admin.Dashboard-admin.layouts.index')

@section('admin-content')
    <div class="p-8 bg-[#F9FAFB] min-h-screen">
        {{-- Header & Stats --}}
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Manajemen Konten</h1>
            <p class="text-sm text-gray-500 mt-1">Kelola artikel, tips kerja, dan publikasi konten Anda.</p>
        </div>

        {{-- Toolbar & Navigation --}}
        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">
            <div class="px-6 border-b border-gray-100 flex flex-col md:flex-row justify-between items-center bg-white gap-4">
                {{-- Tabs --}}
                <div class="flex space-x-6">
                    <button id="btn_all" class="status-tab active py-4 text-sm transition-all">Semua
                        ({{ $all }})</button>
                    <button id="btn_terbit" class="status-tab py-4 text-sm transition-all">Telah Terbit
                        ({{ $terbit }})</button>
                    <button id="btn_blmterbit" class="status-tab py-4 text-sm transition-all">Draf
                        ({{ $noterbit }})</button>
                </div>

                {{-- Create Button --}}
                <div class="py-3">
                    <a href="/dashboard/admin/tipskerja/addpost"
                        class="inline-flex items-center gap-2 bg-gray-900 text-white px-5 py-2 rounded-xl text-sm font-medium hover:bg-black transition-all">
                        <i class="ph ph-plus-circle text-lg"></i>
                        Buat Post baru
                    </a>
                </div>
            </div>

            {{-- Filters Bar --}}
            <div class="p-4 bg-gray-50/50 border-b border-gray-100 flex flex-wrap gap-3 items-center justify-between">
                <div class="flex items-center gap-2">
                    <select id="filterSelect"
                        class="bg-white border border-gray-200 rounded-lg px-3 py-2 text-xs font-medium focus:ring-1 focus:ring-gray-900 outline-none">
                        <option value="title">Urutkan: Nama</option>
                        <option value="created_at">Urutkan: Tanggal</option>
                    </select>

                    <div class="h-6 w-[1px] bg-gray-300 mx-1"></div>

                    <button type="button" onclick="setAction('update')"
                        class="text-xs font-semibold text-gray-600 hover:text-gray-900 px-3 py-2">Terbitkan</button>
                    <button type="button" onclick="setAction('delete')"
                        class="text-xs font-semibold text-red-500 hover:text-red-700 px-3 py-2">Hapus</button>
                </div>

                <div class="relative w-full md:w-64">
                    <i class="ph ph-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    <input id="searchInput" onkeyup="searchTable()" type="text" placeholder="Cari judul..."
                        class="w-full pl-9 pr-4 py-2 bg-white border border-gray-200 rounded-lg text-xs focus:ring-1 focus:ring-gray-900 outline-none">
                </div>
            </div>

            {{-- Table Content --}}
            <form id="bulkAction" method="POST">
                @csrf
                <input type="hidden" name="_method" id="formMethod">
                <input type="hidden" name="status" id="statusField">

                <div class="overflow-x-auto no-scrollbar">
                    <table class="w-full text-left border-separate border-spacing-0">
                        <thead class="bg-white">
                            <tr>
                                <th class="px-6 py-4 border-b border-gray-100 w-10">
                                    <input type="checkbox" id="mainCheckbox"
                                        class="rounded border-gray-300 text-gray-900 focus:ring-gray-900 w-4 h-4">
                                </th>
                                <th
                                    class="px-6 py-4 border-b border-gray-100 text-xs font-bold text-gray-400 uppercase tracking-widest">
                                    Judul Artikel</th>
                                <th
                                    class="px-6 py-4 border-b border-gray-100 text-xs font-bold text-gray-400 uppercase tracking-widest">
                                    Penulis</th>
                                <th
                                    class="px-6 py-4 border-b border-gray-100 text-xs font-bold text-gray-400 uppercase tracking-widest text-center">
                                    Status</th>
                                <th
                                    class="px-6 py-4 border-b border-gray-100 text-xs font-bold text-gray-400 uppercase tracking-widest text-right">
                                    Tanggal</th>
                            </tr>
                        </thead>
                        <tbody id="table_body">
                            {{-- Merge data for dynamic filtering --}}
                            @foreach ($sudah_terbit as $d)
                                <tr class="row-terbit hover:bg-gray-50/50 transition-all group">
                                    <td class="px-6 py-4 border-b border-gray-50">
                                        <input name="ids[]" type="checkbox" value="{{ $d->id }}"
                                            class="rounded border-gray-300 text-gray-900 focus:ring-gray-900 w-4 h-4">
                                    </td>
                                    <td class="px-6 py-4 border-b border-gray-50">
                                        <div
                                            class="text-sm font-semibold text-gray-900 group-hover:text-blue-600 transition-colors cursor-pointer">
                                            {{ $d->title }}</div>
                                        <div class="text-[10px] text-gray-400 mt-0.5">ID: #TIP-{{ $d->id }}</div>
                                    </td>
                                    <td class="px-6 py-4 border-b border-gray-50">
                                        <span class="text-sm text-gray-600">{{ $d->penulis }}</span>
                                    </td>
                                    <td class="px-6 py-4 border-b border-gray-50 text-center">
                                        <span
                                            class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-green-50 text-green-600 border border-green-100 uppercase">Terbit</span>
                                    </td>
                                    <td
                                        class="px-6 py-4 border-b border-gray-50 text-right text-sm text-gray-500 font-mono">
                                        {{ $d->created_at->format('d/m/Y') }}
                                    </td>
                                </tr>
                            @endforeach

                            @foreach ($belum_terbit as $d)
                                <tr class="row-draf hover:bg-gray-50/50 transition-all group">
                                    <td class="px-6 py-4 border-b border-gray-50">
                                        <input name="ids[]" type="checkbox" value="{{ $d->id }}"
                                            class="rounded border-gray-300 text-gray-900 focus:ring-gray-900 w-4 h-4">
                                    </td>
                                    <td class="px-6 py-4 border-b border-gray-50">
                                        <div
                                            class="text-sm font-semibold text-gray-900 group-hover:text-blue-600 transition-colors cursor-pointer">
                                            {{ $d->title }}</div>
                                        <div class="text-[10px] text-gray-400 mt-0.5">ID: #TIP-{{ $d->id }}</div>
                                    </td>
                                    <td class="px-6 py-4 border-b border-gray-50">
                                        <span class="text-sm text-gray-600">{{ $d->penulis }}</span>
                                    </td>
                                    <td class="px-6 py-4 border-b border-gray-50 text-center">
                                        <span
                                            class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-gray-100 text-gray-500 border border-gray-200 uppercase">Draf</span>
                                    </td>
                                    <td
                                        class="px-6 py-4 border-b border-gray-50 text-right text-sm text-gray-500 font-mono">
                                        {{ $d->created_at->format('d/m/Y') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>

    <script>
        const tabs = document.querySelectorAll('.status-tab');
        const rowsTerbit = document.querySelectorAll('.row-terbit');
        const rowsDraf = document.querySelectorAll('.row-draf');

        function filterTab(type) {
            tabs.forEach(tab => tab.classList.remove('active'));
            if (type === 'all') {
                document.getElementById('btn_all').classList.add('active');
                rowsTerbit.forEach(r => r.style.display = "");
                rowsDraf.forEach(r => r.style.display = "");
            } else if (type === 'terbit') {
                document.getElementById('btn_terbit').classList.add('active');
                rowsTerbit.forEach(r => r.style.display = "");
                rowsDraf.forEach(r => r.style.display = "none");
            } else {
                document.getElementById('btn_blmterbit').classList.add('active');
                rowsTerbit.forEach(r => r.style.display = "none");
                rowsDraf.forEach(r => r.style.display = "");
            }
        }

        document.getElementById('btn_all').onclick = () => filterTab('all');
        document.getElementById('btn_terbit').onclick = () => filterTab('terbit');
        document.getElementById('btn_blmterbit').onclick = () => filterTab('draf');

        function setAction(action) {
            let form = document.getElementById('bulkAction');
            let selected = document.querySelectorAll("input[name='ids[]']:checked");

            if (selected.length === 0) {
                alert("Pilih minimal satu item!");
                return;
            }

            if (action === 'update') {
                form.action = "/ubah/status";
                document.getElementById('formMethod').value = "PUT";
                document.getElementById('statusField').value = "terbit";
            } else if (action === 'delete') {
                if (!confirm('Yakin ingin menghapus item terpilih?')) return;
                form.action = "/delete";
                document.getElementById('formMethod').value = "DELETE";
            }
            form.submit();
        }

        // Checkbox logic
        document.getElementById("mainCheckbox").addEventListener("change", function() {
            document.querySelectorAll("input[name='ids[]']").forEach(cb => {
                if (cb.closest('tr').style.display !== 'none') {
                    cb.checked = this.checked;
                }
            });
        });

        // Modern Real-time Search
        function searchTable() {
            let input = document.getElementById("searchInput").value.toLowerCase();
            let rows = document.querySelectorAll("#table_body tr");

            rows.forEach(row => {
                let title = row.querySelector('div').innerText.toLowerCase();
                row.style.display = title.includes(input) ? "" : "none";
            });
        }
    </script>
@endsection
