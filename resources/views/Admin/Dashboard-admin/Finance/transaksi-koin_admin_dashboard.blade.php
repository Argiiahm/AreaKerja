@extends('Admin.Dashboard-admin.layouts.index')

@section('admin-content')
    <div class="p-6">


        <div class="block lg:flex justify-between items-center mb-4">
            <div class="space-x-2 grid grid-cols-2 gap-2 lg:inline md:inline mb-5 lg:mb-0">
                <button id="btn_koin" class="bg-gray-700 border  text-white px-4 py-2 rounded-md">Koin</button>
                <button id="btn_tunai" class="border text-gray-700 px-4 py-2 rounded-md">Tunai</button>
            </div>

            <div class="flex items-center space-x-2">
                <div class="flex border border-gray-300 rounded-lg overflow-hidden h-10">
                    <select class="px-10 text-sm text-gray-700 focus:outline-none border-r border-gray-300">
                        <option>No. Ref</option>
                        <option>ID User</option>
                        <option>Email</option>
                    </select>

                    <input type="text" value="991773493631" class="px-3 text-sm text-gray-700 focus:outline-none w-40">
                </div>

                <button class="bg-gray-700 text-white px-6 h-10 rounded-lg">
                    Cari
                </button>
            </div>
        </div>


        <!-- Koin -->
        <div id="table_koin" class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">
            <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white  px-8 pt-3 rounded-lg">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 border-gray-300 text-center leading-4 tracking-wider">
                                No</th>
                            <th class="px-6 py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">
                                No.Referensi</th>
                            <th class="px-6 py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">
                                jenis</th>
                            <th class="px-6 py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">
                                Dari</th>
                            <th class="px-6 py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">
                                Sumber Dana</th>
                            <th class="px-6 py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">
                                Transaksi Koin</th>
                            <th class="px-6 py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">
                                Status</th>
                            <th class="px-6 py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">
                                Aksi</th>
                            <th class="px-6 py-3 border-gray-300"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white text-center ">
                        @foreach ($koin as $k)
                            <tr class="border-b">
                                <td class="px-6 py-4 whitespace-no-wrap  border-gray-500">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-gray-500">
                                    <div class="text-sm leading-5">{{ $k->no_referensi }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap  border-gray-500 text-sm leading-5">
                                    {{ $k->pesanan }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap  border-gray-500 text-sm leading-5">
                                    {{ $k->dari }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap  border-gray-500 text-sm leading-5">
                                    {{ $k->sumber_dana }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap  border-gray-500 text-sm leading-5">
                                    {{ $k->total }} Koin</td>
                                <td
                                    class="px-6 py-4 whitespace-no-wrap text-green-500 font-bold  border-gray-500 text-sm leading-5">
                                    Success
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-right border-gray-500 text-sm leading-5">

                                </td>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="table_tunai" class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8 hidden">
            <div
                class="align-middle inline-block min-w-full shadow overflow-hidden bg-white  px-8 pt-3 rounded-lg rounded-br-lg">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 border-gray-300 text-center leading-4 tracking-wider">
                                No</th>
                            <th class="px-6 py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">
                                No.Referensi</th>
                            <th class="px-6 py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">
                                jenis</th>
                            <th class="px-6 py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">
                                Dari</th>
                            <th class="px-6 py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">
                                Sumber Dana</th>
                            <th class="px-6 py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">
                                Transaksi Tunai</th>
                            <th class="px-6 py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">
                                Status</th>
                            <th class="px-6 py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">
                                Aksi</th>
                            <th class="px-6 py-3 border-gray-300"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white text-center ">
                        @php
                            use App\Models\HargaPembayaran;
                        @endphp
                        @foreach ($data as $d)
                            @php
                                $pembayaran = HargaPembayaran::where('nama', $d->pesanan)->first();
                                $awal = $pembayaran->harga ?? 0;
                                $admin = 2000;
                                $total = $awal + $admin;
                            @endphp
                            <tr>
                                <td class="py-3 text-center">{{ $loop->iteration }}</td>
                                <td class="py-3 text-center">{{ $d->no_referensi }}</td>
                                <td class="py-3 text-center">{{ $d->pesanan }}</td>
                                <td class="py-3 text-center">{{ $d->dari }}</td>
                                <td class="py-3 text-center">{{ $d->sumber_dana }}</td>
                                <td class="py-3 text-center">Rp. {{ number_format($awal, 0, ',', '.') }}</td>
                                <td class="py-3 text-center">{{ $d->status }}</td>
                                <td class="px-6 py-4">
                                    <button class="open-detail" data-id="{{ $d->id }}"
                                        data-no="{{ $d->no_referensi }}" data-jenis="{{ $d->pesanan }}"
                                        data-dari="{{ $d->dari }}" data-sumber="{{ $d->sumber_dana }}"
                                        data-waktu="{{ $d->created_at->format('d M Y') }}"
                                        data-nominal="Rp. {{ number_format($pembayaran->harga ?? 0, 0, ',', '.') }}"
                                        data-admin="Rp. {{ number_format($admin, 0, ',', '.') }}"
                                        data-total="Rp. {{ number_format($total, 0, ',', '.') }}"
                                        data-status="{{ $d->status }}"
                                        data-bukti="{{ $d->bukti ? asset('storage/' . $d->bukti) : asset('Icon/no-image.png') }}">
                                        <img src="{{ asset('Icon/fzd.png') }}" alt="detail">
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div id="detailModal"
            class="hidden fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50 px-4 py-12">

            {{-- MODAL PENDING --}}
            <div id="modalPending"
                class="hidden bg-white w-full max-w-md p-8 relative rounded-xl shadow-lg overflow-y-auto">
                <button onclick="closeDetail()"
                    class="absolute top-3 right-4 text-gray-500 hover:text-gray-700 text-2xl">&times;</button>

                <div class="flex flex-col items-center">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center">
                        <i class="ph ph-warning-circle text-orange-500 text-[36px]"></i>
                    </div>
                    <h2 class="text-lg font-semibold mt-3">Top Up Konfirmasi</h2>
                </div>

                <div class="mt-6 space-y-2 text-sm">
                    <div class="flex justify-between"><span>No.Transaksi</span><span id="d_no"></span></div>
                    <div class="flex justify-between"><span>Status</span><span
                            class="bg-orange-500 text-white text-xs px-2 py-1 rounded-full">Pending</span></div>
                    <div class="flex justify-between"><span>Jenis</span><span id="d_jenis"></span></div>
                    <div class="flex justify-between"><span>Nama Pengirim</span><span id="d_dari"></span></div>
                    <div class="flex justify-between"><span>Metode</span><span id="d_sumber"></span></div>
                    <div class="flex justify-between"><span>Tanggal</span><span id="d_waktu"></span></div>
                    <div class="flex justify-between"><span>Nominal</span><span id="d_nominal"></span></div>
                    <div class="flex justify-between"><span>Biaya Admin</span><span id="d_admin"></span></div>
                    <div class="flex justify-between font-semibold border-t pt-2"><span>Total</span><span
                            id="d_total"></span></div>
                </div>

                <div class="flex justify-between mt-5">
                    <button id="lihatBuktiPending" class="bg-orange-500 text-white px-4 py-2 rounded">Lihat Bukti</button>
                    <div class="space-x-2">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded">Terima</button>
                        <button class="bg-red-500 text-white px-4 py-2 rounded">Tolak</button>
                    </div>
                </div>
            </div>

            {{-- MODAL BERHASIL --}}
            <div id="modalSuccess"
                class="hidden bg-white w-full max-w-md p-8 relative rounded-xl shadow-lg overflow-y-auto">
                <button onclick="closeDetail()"
                    class="absolute top-3 right-4 text-gray-500 hover:text-gray-700 text-2xl">&times;</button>

                <div class="flex flex-col items-center">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="ph ph-check-circle text-green-500 text-[36px]"></i>
                    </div>
                    <h2 class="text-lg font-semibold mt-3">Top Up Berhasil</h2>
                </div>

                <div class="mt-6 space-y-2 text-sm">
                    <div class="flex justify-between"><span>No.Transaksi</span><span id="s_no"></span></div>
                    <div class="flex justify-between"><span>Status</span><span
                            class="bg-green-500 text-white text-xs px-2 py-1 rounded-full">Berhasil</span></div>
                    <div class="flex justify-between"><span>Jenis</span><span id="s_jenis"></span></div>
                    <div class="flex justify-between"><span>Nama Pengirim</span><span id="s_dari"></span></div>
                    <div class="flex justify-between"><span>Metode</span><span id="s_sumber"></span></div>
                    <div class="flex justify-between"><span>Tanggal</span><span id="s_waktu"></span></div>
                    <div class="flex justify-between"><span>Nominal</span><span id="s_nominal"></span></div>
                    <div class="flex justify-between"><span>Admin</span><span id="s_admin"></span></div>
                    <div class="flex justify-between font-semibold border-t pt-2"><span>Total</span><span
                            id="s_total"></span></div>
                </div>

                <div class="text-center mt-5">
                    <button id="lihatBuktiSuccess" class="bg-orange-500 text-white px-4 py-2 rounded">Lihat Bukti</button>
                </div>
            </div>

            {{-- MODAL DITOLAK --}}
            <div id="modalDitolak"
                class="hidden bg-white w-full max-w-md p-8 relative rounded-xl shadow-lg overflow-y-auto">
                <button onclick="closeDetail()"
                    class="absolute top-3 right-4 text-gray-500 hover:text-gray-700 text-2xl">&times;</button>

                <div class="flex flex-col items-center">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center">
                        <i class="ph ph-x-circle text-red-500 text-[36px]"></i>
                    </div>
                    <h2 class="text-lg font-semibold mt-3">Top Up Ditolak</h2>
                </div>

                <div class="mt-6 space-y-2 text-sm">
                    <div class="flex justify-between"><span>No.Transaksi</span><span id="t_no"></span></div>
                    <div class="flex justify-between"><span>Status</span><span
                            class="bg-red-500 text-white text-xs px-2 py-1 rounded-full">Ditolak</span></div>
                    <div class="flex justify-between"><span>Jenis</span><span id="t_jenis"></span></div>
                    <div class="flex justify-between"><span>Nama Pengirim</span><span id="t_dari"></span></div>
                    <div class="flex justify-between"><span>Metode</span><span id="t_sumber"></span></div>
                    <div class="flex justify-between"><span>Tanggal</span><span id="t_waktu"></span></div>
                    <div class="flex justify-between"><span>Nominal</span><span id="t_nominal"></span></div>
                    <div class="flex justify-between"><span>Admin</span><span id="t_admin"></span></div>
                    <div class="flex justify-between font-semibold border-t pt-2"><span>Total</span><span
                            id="t_total"></span></div>
                </div>

                <div class="text-center mt-5">
                    <button id="lihatBuktiDitolak" class="bg-orange-500 text-white px-4 py-2 rounded">Lihat Bukti</button>
                </div>
            </div>
        </div>

        {{-- MODAL GAMBAR --}}
        <div id="imageModal" class="hidden fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50">
            <div class="relative">
                <img id="modalImage" src="" alt="Bukti" class="max-h-screen rounded-lg shadow-lg">
                <button onclick="closeImage()"
                    class="absolute top-2 right-2 text-white text-3xl hover:text-gray-300">&times;</button>
            </div>
        </div>
    </div>

    <script>
        const detailBtns = document.querySelectorAll(".open-detail");
        const detailModal = document.getElementById("detailModal");
        const modalPending = document.getElementById("modalPending");
        const modalSuccess = document.getElementById("modalSuccess");
        const modalDitolak = document.getElementById("modalDitolak");
        const imageModal = document.getElementById("imageModal");
        const modalImage = document.getElementById("modalImage");

        function closeDetail() {
            detailModal.classList.add("hidden");
            modalPending.classList.add("hidden");
            modalSuccess.classList.add("hidden");
            modalDitolak.classList.add("hidden");
        }

        function closeImage() {
            imageModal.classList.add("hidden");
        }

        detailBtns.forEach(btn => {
            btn.addEventListener("click", () => {
                const d = btn.dataset;
                closeDetail();
                detailModal.classList.remove("hidden");

                if (d.status === "pending") {
                    modalPending.classList.remove("hidden");
                    document.getElementById("d_no").innerText = d.no;
                    document.getElementById("d_jenis").innerText = d.jenis;
                    document.getElementById("d_dari").innerText = d.dari;
                    document.getElementById("d_sumber").innerText = d.sumber;
                    document.getElementById("d_waktu").innerText = d.waktu;
                    document.getElementById("d_nominal").innerText = "Rp " + d.nominal;
                    document.getElementById("d_admin").innerText = "Rp " + d.admin;
                    document.getElementById("d_total").innerText = "Rp " + d.total;
                    document.getElementById("lihatBuktiPending").onclick = () => {
                        modalImage.src = d.bukti;
                        imageModal.classList.remove("hidden");
                    };
                } else if (d.status === "diterima") {
                    modalSuccess.classList.remove("hidden");
                    document.getElementById("s_no").innerText = d.no;
                    document.getElementById("s_jenis").innerText = d.jenis;
                    document.getElementById("s_dari").innerText = d.dari;
                    document.getElementById("s_sumber").innerText = d.sumber;
                    document.getElementById("s_waktu").innerText = d.waktu;
                    document.getElementById("s_nominal").innerText = "Rp " + d.nominal;
                    document.getElementById("s_admin").innerText = "Rp " + d.admin;
                    document.getElementById("s_total").innerText = "Rp " + d.total;
                    document.getElementById("lihatBuktiSuccess").onclick = () => {
                        modalImage.src = d.bukti;
                        imageModal.classList.remove("hidden");
                    };
                } else {
                    modalDitolak.classList.remove("hidden");
                    document.getElementById("t_no").innerText = d.no;
                    document.getElementById("t_jenis").innerText = d.jenis;
                    document.getElementById("t_dari").innerText = d.dari;
                    document.getElementById("t_sumber").innerText = d.sumber;
                    document.getElementById("t_waktu").innerText = d.waktu;
                    document.getElementById("t_nominal").innerText = "Rp " + d.nominal;
                    document.getElementById("t_admin").innerText = "Rp " + d.admin;
                    document.getElementById("t_total").innerText = "Rp " + d.total;
                    document.getElementById("lihatBuktiDitolak").onclick = () => {
                        modalImage.src = d.bukti;
                        imageModal.classList.remove("hidden");
                    };
                }
            });
        });
    </script>
@endsection
