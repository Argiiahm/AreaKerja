@extends('Admin.Dashboard-admin.layouts.index')

@section('admin-content')
    <div class="p-8 bg-[#F9FAFB] min-h-screen font-sans">
        {{-- Header Section --}}
        <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Laporan Keuangan</h1>
                <p class="text-sm text-gray-500 mt-1">Kelola transaksi koin dan pembayaran tunai dalam satu dasbor.</p>
            </div>

            <div class="bg-white border border-gray-200 p-1 rounded-xl flex shadow-sm w-fit">
                <button id="btn_koin" onclick="switchTab('koin')"
                    class="tab-btn active px-6 py-2 text-sm font-medium rounded-lg transition-all">Koin</button>
                <button id="btn_tunai" onclick="switchTab('tunai')"
                    class="tab-btn px-6 py-2 text-sm font-medium rounded-lg transition-all text-gray-500 hover:text-gray-700">Tunai</button>
            </div>
        </div>

        {{-- Filter & Search --}}
        <div class="bg-white border border-gray-200 rounded-2xl p-4 mb-6 shadow-sm">
            <form method="GET" action="/dashboard/admin/cari/finance/admin" class="flex flex-col md:flex-row gap-3">
                <div class="relative flex-1 group">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="ph ph-magnifying-glass text-gray-400 group-focus-within:text-gray-900"></i>
                    </div>
                    <input type="text" name="q" value="{{ request('q') }}"
                        placeholder="Cari nomor referensi, ID user..."
                        class="block w-full pl-10 pr-3 py-2.5 border border-gray-200 rounded-xl focus:ring-1 focus:ring-gray-900 focus:border-gray-900 outline-none transition-all text-sm">
                </div>

                <div class="flex gap-2">
                    <select name="filter"
                        class="bg-white border border-gray-200 rounded-xl pl-4 pr-10 py-2.5 text-sm focus:ring-1 focus:ring-gray-900 outline-none min-w-[140px]">
                        <option value="no_referensi" {{ request('filter') == 'no_referensi' ? 'selected' : '' }}>No.
                            Referensi</option>
                        <option value="user_id" {{ request('filter') == 'dari' ? 'selected' : '' }}>ID User</option>
                    </select>
                    <button type="submit"
                        class="bg-gray-900 text-white px-8 py-2.5 rounded-xl font-medium text-sm hover:bg-black transition-colors">
                        Terapkan
                    </button>
                </div>
            </form>
        </div>

        {{-- Main Table Card --}}
        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">
            {{-- Koin Table --}}
            <div id="table_koin" class="overflow-x-auto custom-scrollbar">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50/50 border-b border-gray-100">
                            <th class="px-6 py-4 text-xs font-semibold text-gray-400 uppercase tracking-wider w-16">No</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">No. Referensi
                            </th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Jenis</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Pengirim</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Sumber Dana
                            </th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-400 uppercase tracking-wider text-right">
                                Nominal</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-400 uppercase tracking-wider text-center">
                                Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($koin as $k)
                            <tr class="hover:bg-gray-50/50 transition-colors group">
                                <td class="px-6 py-4 text-sm text-gray-400">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $k->no_referensi }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $k->pesanan }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $k->dari }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $k->sumber_dana }}</td>
                                <td class="px-6 py-4 text-sm font-bold text-gray-900 text-right">
                                    {{ number_format($k->total) }} <span
                                        class="text-[10px] text-gray-400 font-normal ml-0.5 uppercase tracking-tighter">Koin</span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-50 text-green-700 border border-green-100">
                                        Success
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Tunai Table --}}
            <div id="table_tunai" class="hidden overflow-x-auto custom-scrollbar">
                @php use App\Models\HargaPembayaran; @endphp
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50/50 border-b border-gray-100">
                            <th class="px-6 py-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">No</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">No. Referensi
                            </th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Jenis</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Pengirim</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-400 uppercase tracking-wider text-right">
                                Nominal</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-400 uppercase tracking-wider text-center">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($data as $d)
                            @php
                                $pembayaran = HargaPembayaran::where('nama', $d->pesanan)->first();
                                $awal = $pembayaran->harga ?? 0;
                                $admin = 2000;
                                $total = $awal + $admin;
                            @endphp
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="px-6 py-4 text-sm text-gray-400">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $d->no_referensi }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $d->pesanan }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $d->dari }}</td>
                                <td class="px-6 py-4 text-sm font-bold text-gray-900 text-right">Rp
                                    {{ number_format($awal, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 text-center">
                                    <button
                                        class="open-detail inline-flex items-center justify-center w-8 h-8 rounded-lg hover:bg-gray-100 transition-colors text-gray-500"
                                        data-id="{{ $d->id }}" data-no="{{ $d->no_referensi }}"
                                        data-jenis="{{ $d->pesanan }}" data-dari="{{ $d->dari }}"
                                        data-sumber="{{ $d->sumber_dana }}"
                                        data-waktu="{{ $d->created_at->format('d M Y') }}"
                                        data-nominal="Rp {{ number_format($awal, 0, ',', '.') }}"
                                        data-admin="Rp {{ number_format($admin, 0, ',', '.') }}"
                                        data-total="Rp {{ number_format($total, 0, ',', '.') }}"
                                        data-status="{{ strtolower($d->status) }}"
                                        data-bukti="{{ $d->bukti ? asset('storage/' . $d->bukti) : asset('Icon/no-image.png') }}">
                                        <i class="ph ph-eye text-lg"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modern Modal Layer --}}
    <div id="detailModal"
        class="hidden fixed inset-0 bg-gray-900/60 backdrop-blur-sm flex items-center justify-center z-50 p-4">
        <div id="modalContent"
            class="bg-white w-full max-w-md rounded-3xl shadow-2xl overflow-hidden border border-gray-100 relative">
            <button onclick="closeDetail()"
                class="absolute top-5 right-5 text-gray-400 hover:text-gray-900 transition-colors">
                <i class="ph ph-x text-2xl"></i>
            </button>

            <div class="p-8">
                <div id="statusIconContainer" class="flex flex-col items-center text-center mb-8">
                    <div id="statusIconBox"
                        class="w-16 h-16 rounded-2xl flex items-center justify-center mb-4 transition-colors">
                        <i id="statusIcon" class="text-3xl"></i>
                    </div>
                    <h3 id="statusTitle" class="text-xl font-bold text-gray-900"></h3>
                    <p class="text-sm text-gray-500 mt-1">Detail rincian transaksi penggunna</p>
                </div>

                <div class="space-y-4 mb-8">
                    <div class="flex justify-between text-sm"><span class="text-gray-400">ID Transaksi</span><span
                            id="m_no" class="font-medium text-gray-900"></span></div>
                    <div class="flex justify-between text-sm"><span class="text-gray-400">Nama Pengirim</span><span
                            id="m_dari" class="font-medium text-gray-900"></span></div>
                    <div class="flex justify-between text-sm"><span class="text-gray-400">Metode</span><span
                            id="m_sumber" class="font-medium text-gray-900"></span></div>
                    <div class="flex justify-between text-sm"><span class="text-gray-400">Waktu</span><span
                            id="m_waktu" class="font-medium text-gray-900"></span></div>

                    <div class="pt-4 border-t border-dashed border-gray-100 space-y-2">
                        <div class="flex justify-between text-sm"><span class="text-gray-400">Nominal</span><span
                                id="m_nominal" class="text-gray-900"></span></div>
                        <div class="flex justify-between text-sm"><span class="text-gray-400">Biaya Admin</span><span
                                id="m_admin" class="text-gray-900"></span></div>
                        <div class="flex justify-between items-center pt-2">
                            <span class="text-gray-900 font-semibold">Total Bayar</span>
                            <span id="m_total" class="text-xl font-bold text-gray-900 tracking-tight"></span>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-3">
                    <button id="lihatBukti"
                        class="w-full py-3 bg-gray-50 text-gray-700 rounded-xl font-medium hover:bg-gray-100 transition-all flex items-center justify-center gap-2 border border-gray-200">
                        <i class="ph ph-image"></i> Lihat Bukti Transfer
                    </button>

                    <div id="actionButtons" class="hidden flex gap-3 mt-2">
                        <button
                            class="flex-1 py-3 bg-gray-900 text-white rounded-xl font-semibold hover:bg-black transition-all">Terima</button>
                        <button
                            class="flex-1 py-3 bg-white text-red-600 border border-red-100 rounded-xl font-semibold hover:bg-red-50 transition-all">Tolak</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Simple Image Preview --}}
    <div id="imageModal" onclick="this.classList.add('hidden')"
        class="hidden fixed inset-0 bg-black/90 z-[60] flex items-center justify-center p-4 cursor-zoom-out">
        <img id="modalImage" src="" alt="Bukti" class="max-h-[90vh] rounded-lg">
    </div>

    <script>
        function switchTab(type) {
            const btnKoin = document.getElementById('btn_koin');
            const btnTunai = document.getElementById('btn_tunai');
            const tableKoin = document.getElementById('table_koin');
            const tableTunai = document.getElementById('table_tunai');

            if (type === 'koin') {
                btnKoin.classList.add('active');
                btnTunai.classList.remove('active');
                btnTunai.classList.add('text-gray-500');
                tableKoin.classList.remove('hidden');
                tableTunai.classList.add('hidden');
            } else {
                btnTunai.classList.add('active');
                btnKoin.classList.remove('active');
                btnKoin.classList.add('text-gray-500');
                tableTunai.classList.remove('hidden');
                tableKoin.classList.add('hidden');
            }
        }

        const detailModal = document.getElementById("detailModal");
        const imageModal = document.getElementById("imageModal");
        const modalImage = document.getElementById("modalImage");

        function closeDetail() {
            detailModal.classList.add("hidden");
        }

        document.querySelectorAll(".open-detail").forEach(btn => {
            btn.addEventListener("click", () => {
                const d = btn.dataset;
                detailModal.classList.remove("hidden");

                // Map Data
                document.getElementById("m_no").innerText = d.no;
                document.getElementById("m_dari").innerText = d.dari;
                document.getElementById("m_sumber").innerText = d.sumber;
                document.getElementById("m_waktu").innerText = d.waktu;
                document.getElementById("m_nominal").innerText = d.nominal;
                document.getElementById("m_admin").innerText = d.admin;
                document.getElementById("m_total").innerText = d.total;

                const iconBox = document.getElementById("statusIconBox");
                const icon = document.getElementById("statusIcon");
                const title = document.getElementById("statusTitle");
                const actions = document.getElementById("actionButtons");

                // Reset & Apply Status Style
                actions.classList.add("hidden");
                if (d.status === "pending") {
                    iconBox.className =
                        "w-16 h-16 rounded-2xl flex items-center justify-center mb-4 bg-orange-50 text-orange-500";
                    icon.className = "ph ph-clock-counter-clockwise text-3xl";
                    title.innerText = "Konfirmasi Top Up";
                    actions.classList.remove("hidden");
                } else if (d.status === "diterima" || d.status === "berhasil" || d.status === "success") {
                    iconBox.className =
                        "w-16 h-16 rounded-2xl flex items-center justify-center mb-4 bg-green-50 text-green-500";
                    icon.className = "ph ph-check-circle text-3xl";
                    title.innerText = "Top Up Berhasil";
                } else {
                    iconBox.className =
                        "w-16 h-16 rounded-2xl flex items-center justify-center mb-4 bg-red-50 text-red-500";
                    icon.className = "ph ph-x-circle text-3xl";
                    title.innerText = "Top Up Ditolak";
                }

                document.getElementById("lihatBukti").onclick = () => {
                    modalImage.src = d.bukti;
                    imageModal.classList.remove("hidden");
                };
            });
        });
    </script>
@endsection
