@extends('layouts.index')
@section('content')
    <div class="w-full">
        <section class="relative w-full h-screen pt-24">
            <div class="absolute inset-0">
                <img src="https://asset-2.tribunnews.com/palu/foto/bank/images/ilustrasi-berjabat-tangan45.jpg"
                    alt="Background" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-60"></div>
            </div>
            <div class="relative z-10 flex items-center justify-start h-full px-10 lg:px-20 md:px-20">
                <div class="max-w-lg">
                    <h1 class="text-6xl font-bold text-white mb-4">Pelamar</h1>
                    <p class="text-white text-lg mb-6">
                        Lihat riwayat lamar yang masuk<br>
                        Ke lowongan anda
                    </p>
                </div>
            </div>
        </section>

        <div class="px-6 md:px-16 mt-10">
            <div
                class="bg-white rounded-xl shadow-md p-6 flex flex-col md:flex-row items-start md:items-center justify-between">
                <div class="flex items-start md:items-center gap-4">
                    <img src="{{ asset('Icon/seveninc.png') }}" alt="Logo" class="w-30">

                    <div>
                        <p class="text-gray-500 text-sm">{{ $data->perusahaan->nama_perusahaan }}</p>
                        <h2 class="text-lg font-semibold text-gray-900">{{ $data->nama }} - {{ $data->jenis }}</h2>
                        <p class="text-gray-500 text-sm">{{ $data->alam }}</p>
                        <span class="bg-gray-100 text-gray-700 text-sm px-2 py-1 rounded-md inline-block mt-1">
                            Rp.{{ $data->gaji_awal }} - Rp. {{ $data->gaji_akhir }} per bulan
                        </span>
                    </div>
                </div>
                <p class="text-gray-500 text-sm mt-4 md:mt-0">Aktif 2 jam lalu</p>
            </div>
        </div>

        <div class="px-6 md:px-16 mt-10">
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="px-4 py-3 font-semibold text-gray-700">Tanggal</th>
                                <th class="px-4 py-3 font-semibold text-gray-700">Nama</th>
                                <th class="px-4 py-3 font-semibold text-gray-700">CV</th>
                                <th class="px-4 py-3 font-semibold text-gray-700">Status</th>
                                <th class="px-4 py-3 font-semibold text-gray-700">Waktu</th>
                            </tr>
                        </thead>{{  }}{{  }}
                        <tbody class="divide-y">
                            @foreach ($datas->sortBy(function ($item) {
            return $item->status === 'diterima' ? 1 : 0;
        }) as $d)
                                @if ($d->lowongan_id === $data->id)
                                    <tr>
                                        <td class="px-4 py-3 text-gray-700"> {{ $d->created_at?->format('d M Y') }}</td>
                                        @php
                                            $namapelamar = \App\Models\Pelamar::find($d->pelamar_id);
                                            $perusahaan = \App\Models\LowonganPerusahaan::find($d->lowongan_id);

                                            $now = Illuminate\Support\Carbon::now();
                                        @endphp
                                        <td class="px-4 py-3 text-gray-700">{{ $namapelamar->nama_pelamar }}</td>
                                        <td class="px-4 py-3">
                                            <button class="text-orange-500 hover:text-orange-600 download-btn"
                                                data-url="/cv/{{ $namapelamar->id }}/unduh">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4" />
                                                </svg>
                                            </button>
                                        </td>
                                        @if ($d->status !== 'pending')
                                            <td class="px-4 py-3 flex gap-2">
                                                <button
                                                    class="bg-gray-500 cursor-no-drop text-white px-4 py-1 rounded-md text-sm">Terima</button>
                                                <button
                                                    class="bg-gray-500 cursor-no-drop text-white px-4 py-1 rounded-md text-sm">Tolak</button>
                                            @else
                                            <td class="px-4 py-3 flex gap-2">
                                                <button
                                                    onclick="window.location='/dashboard/perusahaan/form/terima/lamaran/{{ $d->id }}'"
                                                    class="bg-green-600 text-white px-4 py-1 rounded-md text-sm">Terima</button>
                                                <button
                                                    onclick="window.location='/dashboard/perusahaan/form/tolak/lamaran/{{ $d->id }}'"
                                                    class="bg-red-600 text-white px-4 py-1 rounded-md text-sm">Tolak</button>
                                            </td>
                                        @endif
                                        <td class="px-4 py-3 text-gray-700">
                                            @if ($d->expired_date > $now)
                                                Sisa {{ $now->diffInDays($d->expired_date) }} hari lagi
                                            @elseif ($d->expired_date === null)
                                                <span class="text-green-500 font-semibold">30 Hari</span>
                                            @else
                                                <span class="text-red-600 font-semibold">Sudah Expired</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>

                    </table>
                </div>

                <div class="flex items-start gap-2 mt-6 text-sm text-orange-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 mt-0.5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-lin{{  }}round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L4.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <p>
                        Informasi pelamar akan hilang dalam waktu 30 hari setelah anda konfirmasi
                        <span class="font-semibold">Terima.</span>
                    </p>
                </div>
            </div>
        </div>
    </div>


    <div id="confirmModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full">
            <h2 class="text-lg font-semibold mb-4">Konfirmasi</h2>
            <p class="text-gray-600 mb-4">Apakah Anda yakin ingin mengunduh CV ini?</p>
            <div class="flex justify-end gap-2">
                <button id="cancel{{  }} class="px-4 py-2 rounded bg-gray-300">Batal</button>
                <button id="confirmBtn" class="px-4 py-2 rounded bg-orange-500 text-white">Ya, Unduh</button>
            </div>
        </div>
    </div>

    <div id="loadingModal" class="hidden fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50">
        <div class="flex flex-col items-center">
            <div class="w-10 h-10 border-4 border-white border-t-transparent rounded-full animate-spin"></div>
            <p class="text-white mt-4">Sedang mengunduh...</p>
        </div>
    </div>

    <div id="successModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full text-center">
            <h2 class="text-lg font-semibold mb-2 text-green-600">Berhasil!</h2>
            <p class="text-gray-600 mb-4">CV berhasil diunduh.</p>
            <button id="okBtn" class="px-4 py-2 rounded bg-orange-500 text-white">Oke</button>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const confirmModal = document.getElementById("confirmModal");
            const loadingModal = document.getElementById("loadingModal");
            const successModal = document.getElementById("successModal");

            const cancelBtn = document.getElementById("cancelBtn");
            const confirmBtn = document.getElementById("confirmBtn");
            const okBtn = document.getElementById("okBtn");

            let selectedUrl = "";

            document.querySelectorAll(".download-btn").forEach(btn => {
                btn.addEventListener("click", function() {
                    selectedUrl = this.getAttribute("data-url");
                    confirmModal.classList.remove("hidden");
                });
            });

            cancelBtn.addEventListener("click", () => {
                confirmModal.classList.add("hidden");
            });

            confirmBtn.addEventListener("click", () => {
                confirmModal.classList.add("hidden");
                loadingModal.classList.remove("hidden");

                setTimeout(() => {
                    loadingModal.classList.add("hidden");
                    successModal.classList.remove("hidden");

                    let a = document.createElement("a");
                    a.href = selectedUrl;
                    a.setAttribute("download", "");
                    document.body.appendChild(a);
                    a.click();
                    document.body.removeChild(a);
                }, 2000);
            });

            okBtn.addEventListener("click", () => {
                successModal.classList.add("hidden");
            });
        });
    </script>
@endsection
