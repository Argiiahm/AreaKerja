@extends('layouts.index')

@section('content')
    <div class="container max-w-4xl mx-auto bg-white shadow-md rounded-2xl mt-32 p-8 border">

        <div class="mb-8 pb-3 border-b border-gray-200 px-4">
            <h2 class="text-2xl font-bold text-gray-800">Detail Transaksi</h2>
        </div>

        <div class="grid md:grid-cols-2 gap-6 px-4">

            <div class="space-y-5 text-sm text-gray-600">
                <div>
                    <p class="font-semibold">No. Transaksi</p>
                    <p class="text-gray-800">{{ $Data->no_referensi }}</p>
                </div>
                <div>
                    @if ($Data->bukti)
                    <p class="font-semibold">Status Tagihan</p>
                    <span class="inline-block bg-orange-100 text-orange-600 px-3 py-1 rounded-md text-xs font-medium">
                        Menunggu Konfirmasi
                    </span>
                    @else
                    <p class="font-semibold">Status Tagihan</p>
                    <span class="inline-block bg-orange-100 text-orange-600 px-3 py-1 rounded-md text-xs font-medium">
                        Menunggu Pembayaran
                    </span>
                    @endif
                </div>
                <div>
                    <p class="font-semibold">Batas Pembayaran</p>
                    <p id="countdown" class="text-red-500 font-medium"></p>
                </div>
                <div>
                    <p class="font-semibold">Waktu</p>
                    <p class="text-gray-800">{{ $Data->created_at->format('d M Y') }}</p>
                </div>
                <div>
                    <p class="font-semibold">Metode Pembayaran</p>
                    <p class="text-gray-800">{{ $Data->sumber_dana }}</p>
                </div>
            </div>

            <div class="flex justify-center items-start">
                <div class="border rounded-xl shadow-sm p-6 text-center w-full mx-4">
                    <img src="{{ asset($Bank->logo_img) }}" alt="BCA" class="w-24 mx-auto mb-3">
                    <p class="text-sm font-medium text-gray-800">{{ $Data->sumber_dana }}</p>
                    <button onclick="copyText('noRek')"
                        class="mt-3 text-xs text-gray-500 flex items-center gap-1 mx-auto hover:text-gray-700">
                        <span id="noRek">{{ $Bank->no_rek }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 16h8M8 12h8m-5 8h5a2 2 0 002-2V7a2 2 0 00-2-2h-5m-2 0H7a2 2 0 00-2 2v11a2 2 0 002 2h5a2 2 0 002-2V5a2 2 0 00-2-2z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="mt-8 overflow-x-auto px-4">
            <table class="w-full text-sm border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-50 text-gray-700">
                        <th class="text-left py-2 px-6">Keterangan</th>
                        <th class="text-left py-2 px-6">Jumlah</th>
                        <th class="text-left py-2 px-6">Tagihan</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    <tr>
                        <td class="py-2 px-6">{{ $Data->pesanan }}</td>
                        <td class="py-2 px-6">{{ $Data->total }} Koin</td>
                        <td class="py-2 px-6">Rp. {{ number_format($pembayaran->harga, 0, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>

            @php
                $awal = $pembayaran->harga;
                $admin = 2000;
                $output = $awal + $admin;
            @endphp

            <div class="mt-4 space-y-2 text-sm px-2">
                <p class="flex justify-between"><span>Tagihan</span> <span>Rp.
                        {{ number_format($awal, 0, ',', '.') }}</span></p>
                <p class="flex justify-between"><span>Admin</span> <span>Rp.
                        {{ number_format($admin, 0, ',', '.') }}</span></p>
                <p class="flex justify-between font-semibold"><span>Total</span> <span>Rp.
                        {{ number_format($output, 0, ',', '.') }}</span></p>
                <p class="flex justify-between font-bold border-t pt-2"><span>Total Tagihan</span>
                    <span>Rp. {{ number_format($output, 0, ',', '.') }}</span>
                </p>
            </div>  
        </div>

        <div class="mt-8 px-4">
            <form action="/upload/bukti/pembayaran/{{ $Data->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <label for="bukti"
                    class="cursor-pointer bg-green-500 hover:bg-green-600 text-white px-5 py-2 rounded-lg shadow inline-block">
                    Upload Bukti
                </label>
                <input type="file" name="bukti" id="bukti" class="hidden" onchange="previewFileName(this)">
                <span id="file-name" class="ml-3 text-blue-600 text-sm"></span>
            </form>
        </div>


        <div class="mt-10 px-4">
            <h3 class="text-lg font-semibold text-gray-800 mb-3">Petunjuk Pembayaran</h3>
            <div class="divide-y border-t border-b">
                <button
                    class="w-full flex justify-between items-center py-3 text-left font-medium text-gray-700 hover:bg-gray-50">
                    <span>Transfer mBanking</span>
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <button
                    class="w-full flex justify-between items-center py-3 text-left font-medium text-gray-700 hover:bg-gray-50">
                    <span>Transfer iBanking</span>
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <button
                    class="w-full flex justify-between items-center py-3 text-left font-medium text-gray-700 hover:bg-gray-50">
                    <span>Transfer QRIS</span>
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
            </div>
        </div>

    </div>

    <script>
        const expiredAt = new Date("{{ $Data->expired_date }}").getTime();

        function updateCountdown() {
            const now = new Date().getTime();
            const distance = expiredAt - now;

            if (distance < 0) {
                document.getElementById("countdown").innerHTML = "Expired";
                return;
            }

            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("countdown").innerHTML =
                hours + " Jam " + minutes + " Menit " + seconds + " Detik";
        }

        setInterval(updateCountdown, 1000);
        updateCountdown();

        function copyText(elementId) {
            const text = document.getElementById(elementId).innerText;
            navigator.clipboard.writeText(text);
        }

        function previewFileName(input) {
            if (input.files && input.files[0]) {
                document.getElementById('file-name').textContent = input.files[0].name;
                input.form.submit();
            }
        }
    </script>
@endsection
