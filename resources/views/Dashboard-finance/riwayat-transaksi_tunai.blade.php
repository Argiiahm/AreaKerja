@extends('Dashboard-finance.layouts.index')

@section('finance-content')
    <div class="p-6">
        <div class="mb-10">
            <div class="flex justify-between items-center mx-2 my-2">
                <h2 class="text-lg font-semibold mb-3">Riwayat Tunai</h2>
            </div>
            <div class="overflow-x-auto bg-white rounded-xl shadow-md">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-orange-500 text-white">
                            <th class="py-3 px-4 text-center">No</th>
                            <th class="py-3 text-center">No.Refrensi</th>
                            <th class="py-3 text-center">Jenis</th>
                            <th class="py-3 text-center">Dari</th>
                            <th class="py-3 text-center">Sumber Dana</th>
                            <th class="py-3 text-center">Total</th>
                            <th class="py-3 text-center">Status</th>
                            <th class="py-3 text-center">Detail</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @php
                            use App\Models\HargaPembayaran;
                        @endphp
                        @foreach ($data as $d)
                            @php
                                $pembayaran = HargaPembayaran::where('nama', $d->pesanan)->first() ;
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
                                        data-pembayaran="Rp. {{ number_format($pembayaran->harga ?? 0, 0, ',', '.') }}"
                                        data-admin="Rp. {{ number_format($admin, 0, ',', '.') }}"
                                        data-hasil="Rp. {{ number_format($total, 0, ',', '.') }}"
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
    </div>

    {{-- Modal Detail --}}
    <div id="detailModal"
        class="hidden fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50 px-4 py-12">
        {{-- Modal Pending --}}
        <div id="modalPending"
            class="hidden bg-white w-full max-w-md p-8 pr-4 relative shadow-lg max-h-[calc(100vh-3rem)] overflow-y-auto">
            <button onclick="closeDetail()"
                class="absolute top-3 right-4 text-gray-400 hover:text-gray-700 text-2xl">&times;</button>

            <div class="flex justify-center">
                <div class="w-20 h-20 rounded-full bg-orange-100 flex items-center justify-center">
                    <i class="ph ph-warning-circle w-10 h-10 text-orange-500 text-[40px]"></i>
                </div>
            </div>

            <h2 class="text-xl font-bold text-center mt-4">Top Up Konfirmasi</h2>

            <div class="mt-8 space-y-3 text-sm">
                <div class="flex justify-between border-b border-dashed pb-2">
                    <span>No.Transaksi</span>
                    <span id="d_no" class="font-medium"></span>
                </div>
                <div class="flex justify-between border-b border-dashed pb-2">
                    <span>Status</span>
                    <span id="d_status" class="bg-orange-500 text-white text-xs px-3 py-1 rounded-full">Pending</span>
                </div>
                <div class="flex justify-between border-b border-dashed pb-2">
                    <span>Jenis Transaksi</span>
                    <span id="d_jenis"></span>
                </div>
                <div class="flex justify-between border-b border-dashed pb-2">
                    <span>Nama Pengirim</span>
                    <span id="d_dari"></span>
                </div>
                <div class="flex justify-between border-b border-dashed pb-2">
                    <span>Nama Penerima</span>
                    <span>Area Kerja</span>
                </div>
                <div class="flex justify-between border-b border-dashed pb-2">
                    <span>Metode Pembayaran</span>
                    <span id="d_sumber"></span>
                </div>
                <div class="flex justify-between border-b border-dashed pb-2">
                    <span>Tgl/Waktu</span>
                    <span id="d_waktu"></span>
                </div>
                <div class="flex justify-between border-b border-dashed pb-2">
                    <span>Nominal</span>
                    <span id="d_nominal"></span>
                </div>
                <div class="flex justify-between border-b border-dashed pb-2">
                    <span>Biaya Admin</span>
                    <span id="d_admin"></span>
                </div>
                <div class="flex justify-between font-semibold text-base pt-2">
                    <span>Total Pembayaran</span>
                    <span id="d_total"></span>
                </div>
            </div>

            <div class="flex justify-between font-semibold text-base pt-2">
                <div>
                    <button type="button" id="openImageModal"
                        class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">
                        Lihat Bukti
                    </button>
                </div>

                <div id="actionButtons" class="space-y-2">
                    <form id="formSuccess" action="{{ route('update.status') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="form-success-id">
                        <input type="hidden" name="model" id="form-success-model">
                        <input type="hidden" name="status" value="diterima">
                        {{-- <input type="hidden" name="kategori" value="kandidat aktif"> --}}
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Konfirmasi</button>
                    </form>

                    <form id="formFailed" action="{{ route('update.status') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="form-failed-id">
                        <input type="hidden" name="" id="form-failed-model">
                        <input type="hidden" name="status" value="ditolak">
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Tolak</button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Modal Success --}}
        <div id="modalSuccess"
            class="hidden bg-white w-full max-w-md p-8 pr-4 relative shadow-lg max-h-[calc(100vh-3rem)] overflow-y-auto">
            <button onclick="closeDetail()"
                class="absolute top-3 right-4 text-gray-400 hover:text-gray-700 text-2xl">&times;</button>

            <h2 class="text-xl font-bold text-center mt-4">Top Up Berhasil</h2>

            <div class="flex justify-center mt-4">
                <div class="w-20 h-20 rounded-full bg-orange-100 flex items-center justify-center">
                    <i class="ph ph-check-circle w-10 h-10 text-orange-500 text-[40px]"></i> 
                </div>
            </div>

            <div class="mt-8 space-y-3 text-sm">
                <div class="flex justify-between border-b border-dashed pb-2">
                    <span>No.Transaksi</span>
                    <span id="s_no" class="font-medium"></span>
                </div>
                <div class="flex justify-between border-b border-dashed pb-2">
                    <span>Status</span>
                    <span class="bg-orange-500 text-white text-xs px-3 py-1 rounded-full">Berhasil</span>
                </div>
                <div class="flex justify-between border-b border-dashed pb-2">
                    <span>Jenis Transaksi</span>
                    <span id="s_jenis"></span>
                </div>
                <div class="flex justify-between border-b border-dashed pb-2">
                    <span>Nama Pengirim</span>
                    <span id="s_dari"></span>
                </div>
                <div class="flex justify-between border-b border-dashed pb-2">
                    <span>Metode Pembayaran</span>
                    <span id="s_sumber"></span>
                </div>
                <div class="flex justify-between border-b border-dashed pb-2">
                    <span>Tgl/Waktu</span>
                    <span id="s_waktu"></span>
                </div>
                <div class="flex justify-between border-b border-dashed pb-2">
                    <span>Nominal</span>
                    <span id="s_nominal"></span>
                </div>
                <div class="flex justify-between border-b border-dashed pb-2">
                    <span>Biaya Admin</span>
                    <span id="s_admin"></span>
                </div>
                <div class="flex justify-between font-semibold text-base pt-2">
                    <span>Total Pembayaran</span>
                    <span id="s_total"></span>
                </div>
            </div>
            <div>
                <button type="button" id="openImageModalditerima"
                    class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">
                    Lihat Bukti
                </button>
            </div>
            <div class="flex flex-col items-center mt-10">
                <img src="{{ asset('image/logo-areakerja.png') }}" alt="logo" class="w-12 mb-1">
                <p class="text-center text-xs text-gray-500">Copyright©2024 areakerja.com</p>
            </div>
        </div>

        {{-- Modal ditolak --}}
        <div id="modalDitolak"
            class="hidden bg-white w-full max-w-md p-8 pr-4 relative shadow-lg max-h-[calc(100vh-3rem)] overflow-y-auto">
            <button onclick="closeDetail()"
                class="absolute top-3 right-4 text-gray-400 hover:text-gray-700 text-2xl">&times;</button>

            <h2 class="text-xl font-bold text-center mt-4">Top Up di tolak</h2>

            <div class="flex justify-center mt-4">
                <div class="w-20 h-20 rounded-full bg-orange-100 flex items-center justify-center">
                    <i class="ph ph-x-circle w-10 h-10 text-orange-500 text-[40px]"></i>
                </div>
            </div>

            <div class="mt-8 space-y-3 text-sm">
                <div class="flex justify-between border-b border-dashed pb-2">
                    <span>No.Transaksi</span>
                    <span id="t_no" class="font-medium"></span>
                </div>
                <div class="flex justify-between border-b border-dashed pb-2">
                    <span>Status</span>
                    <span class="bg-red-500 text-white text-xs px-3 py-1 rounded-full">Ditolak</span>
                </div>
                <div class="flex justify-between border-b border-dashed pb-2">
                    <span>Jenis Transaksi</span>
                    <span id="t_jenis"></span>
                </div>
                <div class="flex justify-between border-b border-dashed pb-2">
                    <span>Nama Pengirim</span>
                    <span id="t_dari"></span>
                </div>
                <div class="flex justify-between border-b border-dashed pb-2">
                    <span>Metode Pembayaran</span>
                    <span id="t_sumber"></span>
                </div>
                <div class="flex justify-between border-b border-dashed pb-2">
                    <span>Tgl/Waktu</span>
                    <span id="t_waktu"></span>
                </div>
                <div class="flex justify-between border-b border-dashed pb-2">
                    <span>Nominal</span>
                    <span id="t_nominal"></span>
                </div>
                <div class="flex justify-between border-b border-dashed pb-2">
                    <span>Biaya Admin</span>
                    <span id="t_admin"></span>
                </div>
                <div class="flex justify-between font-semibold text-base pt-2">
                    <span>Total Pembayaran</span>
                    <span id="t_total"></span>
                </div>
            </div>
            <div>
                <button type="button" id="openImageModalditolak"
                    class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">
                    Lihat Bukti
                </button>
            </div>
            <div class="flex flex-col items-center mt-10">
                <img src="{{ asset('image/logo-areakerja.png') }}" alt="logo" class="w-12 mb-1">
                <p class="text-center text-xs text-gray-500">Copyright©2024 areakerja.com</p>
            </div>
        </div>
    </div>

    <div id="imageModal" class="hidden fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50">
        <div class="relative">
            <img id="modalImage" src="" alt="Bukti" class="max-h-screen rounded-lg shadow-lg">
            <button onclick="closeImage()"
                class="absolute top-2 right-2 text-white text-3xl hover:text-gray-300">&times;</button>
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
                const data = btn.dataset;
                document.getElementById("form-success-id").value = data.id;
                document.getElementById("form-failed-id").value = data.id;
                document.getElementById("form-success-model").value = data.dari;
                document.getElementById("form-failed-model").value = data.model;

                if (data.status.toLowerCase() === "pending") {
                    detailModal.classList.remove("hidden");
                    modalPending.classList.remove("hidden");

                    document.getElementById("d_no").innerText = data.no;
                    document.getElementById("d_status").innerText = data.status;
                    document.getElementById("d_jenis").innerText = data.jenis;
                    document.getElementById("d_dari").innerText = data.dari;
                    document.getElementById("d_sumber").innerText = data.sumber;
                    document.getElementById("d_waktu").innerText = data.waktu;
                    document.getElementById("d_nominal").innerText = data.pembayaran || "-";
                    document.getElementById("d_admin").innerText = data.admin || "-";
                    document.getElementById("d_total").innerText = data.hasil || "-";

                    document.getElementById("openImageModal").onclick = () => {
                        modalImage.src = data.bukti;
                        imageModal.classList.remove("hidden");
                    };

                } else if (data.status.toLowerCase() === "diterima") {
                    detailModal.classList.remove("hidden");
                    modalSuccess.classList.remove("hidden");

                    document.getElementById("s_no").innerText = data.no;
                    document.getElementById("s_jenis").innerText = data.jenis;
                    document.getElementById("s_dari").innerText = data.dari;
                    document.getElementById("s_sumber").innerText = data.sumber;
                    document.getElementById("s_waktu").innerText = data.waktu;
                    document.getElementById("s_nominal").innerText = data.pembayaran || "-";
                    document.getElementById("s_admin").innerText = data.admin || "-";
                    document.getElementById("s_total").innerText = data.hasil || "-";

                    document.getElementById("openImageModalditerima").onclick = () => {
                        modalImage.src = data.bukti;
                        imageModal.classList.remove("hidden");
                    };

                } else if (data.status.toLowerCase() === "ditolak") {
                    detailModal.classList.remove("hidden");
                    modalDitolak.classList.remove("hidden");

                    document.getElementById("t_no").innerText = data.no;
                    document.getElementById("t_jenis").innerText = data.jenis;
                    document.getElementById("t_dari").innerText = data.dari;
                    document.getElementById("t_sumber").innerText = data.sumber;
                    document.getElementById("t_waktu").innerText = data.waktu;
                    document.getElementById("t_nominal").innerText = data.pembayaran || "-";
                    document.getElementById("t_admin").innerText = data.admin || "-";
                    document.getElementById("t_total").innerText = data.hasil || "-";

                    document.getElementById("openImageModalditolak").onclick = () => {
                        modalImage.src = data.bukti;
                        imageModal.classList.remove("hidden");
                    };
                }
            });
        });
    </script>
@endsection
