@extends('layouts.index')

@section('content')
    <section class="relative w-full h-[70vh] lg:h-screen pt-24">
        <div class="absolute inset-0">
            <img src="https://png.pngtree.com/background/20240507/original/pngtree-digital-marketing-website-displayed-on-rendered-office-desktop-picture-image_8837781.jpg"
                alt="Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-60"></div>
        </div>
        <div class="relative z-10 flex items-center justify-start h-full px-6 lg:px-20">
            <div class="max-w-lg">
                <h1 class="text-3xl lg:text-6xl font-bold text-white mb-4">Kandidat Area Kerja</h1>
                <p class="text-3xl text-white lg:text-lg mb-6 leading-relaxed">
                    Rekrut karyawan terakreditasi <br>
                    di Area Kerja
                </p>
            </div>
        </div>
    </section>

    <form action="/dashboard/perusahaan/kandidatak" method="GET"
        class="bg-white shadow-md transform -translate-y-3 rounded-lg flex flex-wrap lg:flex-nowrap items-center justify-between gap-4 px-4 py-4 mx-4 lg:mx-52">

        <div class="flex flex-col lg:flex-row items-center gap-4 lg:gap-8 w-full lg:w-auto flex-wrap">
            <div class="flex items-center border-b lg:border-r lg:border-b-0 w-full lg:w-auto pb-2 lg:pb-0 lg:pr-4">
                <select name="skill" class="focus:outline-none text-sm w-full lg:w-40">
                    <option value="" selected disabled>Skill</option>
                    @foreach ($divisi as $dv)
                        <option value="{{ $dv->divisi }}">{{ $dv->divisi }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center border-b lg:border-r lg:border-b-0 w-full lg:w-auto pb-2 lg:pb-0 lg:pr-4">
                <select name="umur" class="focus:outline-none text-sm w-full lg:w-40">
                    <option value="" selected disabled>Umur</option>
                    <option value="17-25">17-25</option>
                    <option value="26-35">26-35</option>
                </select>
            </div>

            <div class="flex items-center w-full lg:w-auto">
                <select name="gender" class="focus:outline-none text-sm w-full lg:w-40">
                    <option value="" selected disabled>Gender</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
        </div>

        <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg w-full lg:w-auto">
            Cari Kandidat
        </button>
    </form>

    <div class="flex justify-end mt-4 px-4 lg:px-20">
        <div
            class="md:col-span-3 bg-white shadow rounded-lg p-6 flex flex-col items-center justify-center w-full lg:w-auto">
            <div class="flex items-center w-full">
                <p class="text-3xl font-bold text-orange-500">{{ $totalSaldo }}</p>
                <img src="{{ asset('Icon/coin perusahaan.png') }}" alt="" class="px-3 py-2">
            </div>
            <button onclick="window.location='/dashboard/perusahaan'"
                class="bg-green-600 text-white py-2 font-semibold rounded-md flex w-full items-center justify-center gap-1 mt-2">
                Top Up Koin
            </button>
        </div>
    </div>

    <div class="flex flex-col lg:flex-row justify-center items-start gap-6 mt-8 px-4 lg:px-20 flex-wrap">
        <div class="w-full overflow-x-auto">
            <table class="w-max min-w-full text-sm table-auto">
                <thead class="bg-orange-500 text-white">
                    <tr>
                        <th class="px-4 py-2 text-left">Nama</th>
                        <th class="px-4 py-2 text-center">Skill</th>
                        <th class="px-4 py-2 text-center">Umur</th>
                        <th class="px-4 py-2 text-center">Pengalaman</th>
                        <th class="px-4 py-2 text-center">Gender</th>
                        <th class="px-4 py-2 text-center">CV</th>
                        <th class="px-4 py-2 text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Data as $d)
                        @if ($d->kategori === 'kandidat aktif')
                            <tr class="border-b">
                                <td class="px-4 py-2">{{ $d->nama_pelamar }}</td>
                                <td class="px-4 py-2 text-center">{{ $d->skill->pluck('skill')->implode(', ') }}</td>
                                <td class="px-4 py-2 text-center">{{ $d->umur }} Tahun</td>
                                <td class="px-4 py-2 text-center">Expert</td>
                                <td class="px-4 py-2 text-center">{{ $d->gender }}</td>
                                <td class="px-4 py-2 text-center">
                                    <button class="text-orange-500 hover:text-orange-600 download-btn"
                                        data-url="/cv/{{ $d->id }}/unduh">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4" />
                                        </svg>
                                    </button>
                                </td>
                                <td class="px-4 py-2 text-center">
                                    <button onclick="cekKoin({{ $d->id }})"
                                        class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">Beli</button>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <!-- Confirm Modal -->
    <div id="confirmModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 px-4">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full">
            <h2 class="text-lg font-semibold mb-4">Konfirmasi</h2>
            <p class="text-gray-600 mb-4">Apakah Anda yakin ingin mengunduh CV ini?</p>
            <div class="flex justify-end gap-2">
                <button id="cancelBtn" class="px-4 py-2 rounded bg-gray-300">Batal</button>
                <button id="confirmBtn" class="px-4 py-2 rounded bg-orange-500 text-white">Ya, Unduh</button>
            </div>
        </div>
    </div>

    <!-- Loading Modal -->
    <div id="loadingModal" class="hidden fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50 px-4">
        <div class="flex flex-col items-center">
            <div class="w-10 h-10 border-4 border-white border-t-transparent rounded-full animate-spin"></div>
            <p class="text-white mt-4">Sedang mengunduh...</p>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="successModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 px-4">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full text-center">
            <h2 class="text-lg font-semibold mb-2 text-green-600">Berhasil!</h2>
            <p class="text-gray-600 mb-4">CV berhasil diunduh.</p>
            <button id="okBtn" class="px-4 py-2 rounded bg-orange-500 text-white">Oke</button>
        </div>
    </div>

    <!-- Modal Koin -->
    <div id="modalKoin" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50 px-4">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-md p-6 text-center">
            <h2 class="text-2xl font-bold mb-2">Upss!!</h2>
            <p class="text-gray-600 mb-6">Koin anda kurang silahkan Top Up terlebih dahulu.</p>
            <button class="bg-orange-500 text-white px-6 py-2 rounded-lg hover:bg-orange-600 transition"
                onclick="closeModal('modalKoin')">Top Up</button>
        </div>
    </div>

    <!-- Modal Verifikasi -->
    <div id="modalVerifikasi"
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50 px-4">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-md p-6 text-center">
            <div class="flex items-center justify-center mb-4">
                <span class="text-3xl font-extrabold text-yellow-500">100</span>
                <svg class="w-8 h-8 text-yellow-500 ml-2" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"
                        fill="none" />
                    <text x="12" y="16" text-anchor="middle" font-size="12" fill="currentColor">$</text>
                </svg>
            </div>
            <p class="text-gray-700 mb-6">Beli kandidat area kerja</p>
            <div class="flex justify-center space-x-4 flex-wrap">
                <form action="/beli/kandidatak/{{ $harga->id }}" method="POST">
                    @csrf
                    <input type="hidden" name="pelamar_id" id="pelamarId">

                    <button class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition"
                        onclick="">Beli</button>
                </form>
                <button class="bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-red-600 transition"
                    onclick="closeModal('modalVerifikasi')">Batal</button>
            </div>
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

        let koinUser = {{ $totalSaldo }};

        function cekKoin(pelamarId) {
            if (koinUser < 100) {
                openModal('modalKoin'); // modal kalau koin tidak cukup
            } else {
                document.getElementById('pelamarId').value = pelamarId;
                openModal('modalVerifikasi'); // modal konfirmasi beli
            }
        }

        function openModal(id) {
            document.getElementById(id).classList.remove('hidden');
        }

        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
        }
    </script>
@endsection
