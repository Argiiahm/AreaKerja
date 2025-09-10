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
                            <th class="py-3 text-center">Total Koin</th>
                            <th class="py-3 text-center">Detail</th>
                            <th class="py-3 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @php
                            use App\Models\HargaPembayaran;
                        @endphp
                        @foreach ($data as $d)
                            <tr>
                                <td class="py-3 text-center">{{ $d->id }}</td>
                                <td class="py-3 text-center">{{ $d->no_referensi }}</td>
                                <td class="py-3 text-center">{{ $d->pesanan }}</td>
                                <td class="py-3 text-center">{{ $d->dari }}</td>
                                <td class="py-3 text-center">{{ $d->sumber_dana }}</td>
                                <td class="py-3 text-center">{{ $d->total }}</td>
                                <td class="py-3 text-center">{{ $d->status }}</td>
                                @php
                                    $pembayaran = HargaPembayaran::where('jumlah_koin', $d->total)->first();
                                    $awal = $pembayaran->harga;
                                    $admin = 2000;
                                    $total = $awal + $admin;
                                @endphp
                                <td class="px-6 py-4">
                                    <button class="open-detail" data-id="{{ $d->id }}"
                                        data-no="{{ $d->no_referensi }}" data-jenis="{{ $d->pesanan }}"
                                        data-dari="{{ $d->dari }}" data-sumber="{{ $d->sumber_dana }}"
                                        data-pembayaran="Rp. {{ number_format($pembayaran->harga, 0, ',', '.') }}"
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

    <div id="detailModal"
        class="hidden fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50 px-4 py-12">
        <div class="bg-white rounded-2xl w-full max-w-md p-8 pr-4 relative shadow-lg max-h-[calc(100vh-3rem)] overflow-y-auto">
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
                    <span id="d_status" class="bg-orange-500 text-white text-xs px-3 py-1 rounded-full"></span>
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

                <div class="flex justify-between font-semibold text-base pt-2">
                    <div>
                        <button id="openImageModal" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">
                            Lihat Bukti
                        </button>
                    </div>
                    <div class="space-y-2">                            
                        <form id="form-success" action="{{ route('update.status') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" id="form-success-id" value="">
                            <input type="hidden" name="status" value="diterima">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Konfirmasi</button>
                        </form>
                        
                        <form id="form-failed" action="{{ route('update.status') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" id="form-failed-id" value="">
                            <input type="hidden" name="status" value="ditolak">
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Tolak</button>
                        </form>

                    </div>
                </div>
            </div>

            <div class="flex flex-col items-center mt-10">
                <img src="{{ asset('image/logo-areakerja.png') }}" alt="logo" class="w-12 mb-1">
                <p class="text-center text-xs text-gray-500">Copyright©2024 areakerja.com</p>
            </div>
        </div>
    </div>

    <div id="imageModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="relative">
            <button onclick="closeImage()" class="absolute top-2 right-2 text-white text-xl font-bold">x</button>
            <img id="modalImage" class="max-h-[80vh] rounded" src="" alt="Bukti Pembayaran">
        </div>
    </div>


    <script>
        const detailBtns = document.querySelectorAll(".open-detail");
        const detailModal = document.getElementById("detailModal");
        const imageModal = document.getElementById("imageModal");
        const modalImage = document.getElementById("modalImage");
        let currentBukti = "";

        detailBtns.forEach(btn => {
            btn.addEventListener("click", () => {
                const recordId = btn.dataset.id;

                document.getElementById("form-success-id").value = recordId;
                document.getElementById("form-failed-id").value = recordId;


                document.getElementById("d_no").textContent = btn.dataset.no;
                document.getElementById("d_no").textContent = btn.dataset.no;
                document.getElementById("d_jenis").textContent = btn.dataset.jenis;
                document.getElementById("d_dari").textContent = btn.dataset.dari;
                document.getElementById("d_sumber").textContent = btn.dataset.sumber;
                document.getElementById("d_nominal").textContent = btn.dataset.pembayaran;
                document.getElementById("d_admin").textContent = btn.dataset.admin;
                document.getElementById("d_total").textContent = btn.dataset.hasil;

                const statusEl = document.getElementById("d_status");
                statusEl.textContent = btn.dataset.status;
                statusEl.className = "text-xs px-3 py-1 rounded-full " +
                    (btn.dataset.status === "pending" ? "bg-orange-500 text-white" :
                        "bg-blue-500 text-white");

                currentBukti = btn.dataset.bukti;

                detailModal.classList.remove("hidden");
            });
        });

        document.getElementById("openImageModal").addEventListener("click", () => {
            modalImage.src = currentBukti;
            imageModal.classList.remove("hidden");
        });

        function closeDetail() {
            detailModal.classList.add("hidden");
        }

        function closeImage() {
            imageModal.classList.add("hidden");
        }

        detailModal.addEventListener("click", e => {
            if (e.target === detailModal) closeDetail();
        });
        imageModal.addEventListener("click", e => {
            if (e.target === imageModal) closeImage();
        });
    </script>
@endsection
