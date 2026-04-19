@extends('layouts.index')

@section('content')
    <section class="relative w-full h-[75vh] lg:h-[90vh] flex items-center justify-start overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ $link_sosial['kandidat_ak_header']->link ??
                'https://arc.amig.com/wp-content/uploads/2016/01/training-header.jpg' }}"
                class="w-full h-full object-cover">

            <div class="absolute inset-0 bg-black/60"></div>
        </div>

        <div class="relative z-10 px-6 lg:px-20 mt-16 lg:mt-0">
            <div class="max-w-2xl space-y-4">
                <h1 class="text-4xl lg:text-6xl font-extrabold text-white leading-tight drop-shadow-lg">
                    Kandidat Area Kerja
                </h1>
                <p class="text-lg lg:text-2xl text-gray-200">
                    Rekrut <span class="text-orange-400 font-semibold">karyawan terakreditasi</span><br>
                    langsung di platform Area Kerja.
                </p>
            </div>
        </div>
    </section>

    <form id="filterForm" action="/dashboard/perusahaan/kandidatak" method="GET"
        class="bg-white shadow-xl -mt-8 relative rounded-2xl flex flex-wrap items-center justify-between gap-4 px-6 py-6 mx-4 lg:mx-40 border border-gray-200">
        {{-- Added border-gray-200 --}}

        <div class="flex items-center border border-gray-300 rounded-lg px-3 py-2 w-full lg:w-60">
            <input type="text" id="searchNama" placeholder="Cari Nama..."
                class="focus:outline-none border border-gray-200 text-sm w-full bg-transparent">
        </div>

        <div class="flex flex-col lg:flex-row items-center gap-4 w-full lg:w-auto flex-wrap">

            <div class="flex items-center border border-gray-300 rounded-lg px-3 py-2 w-full lg:w-44">
                <select name="skill" id="filterSkill" class="focus:outline-none border border-gray-200 text-sm w-full bg-transparent">
                    <option value="">Skill</option>
                    @foreach ($divisi as $dv)
                        <option value="{{ $dv->divisi }}">{{ $dv->divisi }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center border border-gray-300 rounded-lg px-3 py-2 w-full lg:w-44">
                <select name="umur" id="filterUmur" class="focus:outline-none border border-gray-200 text-sm w-full bg-transparent">
                    <option value="">Umur</option>
                    <option value="17-25">17-25</option>
                    <option value="26-35">26-35</option>
                </select>
            </div>

            <div class="flex items-center border border-gray-300 rounded-lg px-3 py-2 w-full lg:w-44">
                <select name="gender" id="filterGender" class="focus:outline-none border border-gray-200 text-sm w-full bg-transparent">
                    <option value="">Gender</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
        </div>

        <button type="submit"
            class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg font-semibold shadow-md transition w-full lg:w-auto">
            <i class="ph ph-magnifying-glass mr-1"></i> Cari Kandidat
        </button>
    </form>

    <div class="flex justify-end mt-8 px-4 lg:px-20">
        <div class="bg-white border border-gray-200 shadow-md rounded-xl p-5 flex flex-col items-center w-full lg:w-72">
            {{-- Added border-gray-200 --}}
            <div class="flex items-center justify-center">
                <p class="text-3xl font-bold text-orange-500">{{ $totalSaldo }}</p>
                <img src="{{ asset('Icon/coin perusahaan.png') }}" alt="" class="w-10 ml-2">
            </div>
            <button onclick="window.location='/dashboard/perusahaan'"
                class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 mt-3 rounded-lg w-full shadow transition">
                <i class="ph ph-plus-circle mr-1"></i> Top Up Koin
            </button>
        </div>
    </div>

    <div class="mt-10 px-4 lg:px-20 mb-16">
        <div class="overflow-x-auto shadow-md rounded-xl border border-gray-200"> {{-- Added border-gray-200 --}}
            <table class="w-full text-sm text-left border-collapse">
                <thead class="bg-orange-500 text-white">
                    <tr>
                        <th class="px-5 py-3 font-semibold">Nama</th>
                        <th class="px-5 py-3 text-center font-semibold">Skill</th>
                        <th class="px-5 py-3 text-center font-semibold">Umur</th>
                        <th class="px-5 py-3 text-center font-semibold">Pengalaman</th>
                        <th class="px-5 py-3 text-center font-semibold">Gender</th>
                        <th class="px-5 py-3 text-center font-semibold">CV</th>
                        <th class="px-5 py-3 text-center font-semibold">Status</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 bg-white" id="kandidatTableBody">
                    @foreach ($Data as $d)
                        @if ($d->kategori === 'kandidat aktif')
                            <tr class="kandidat-row hover:bg-orange-50 transition"
                                data-nama="{{ strtolower($d->nama_pelamar) }}"
                                data-skill="{{ strtolower($d->skill->pluck('divisi')->implode(', ')) }}"
                                {{-- Mengambil divisi dari skill --}} data-umur="{{ $d->umur }}"
                                data-gender="{{ strtolower($d->gender) }}"
                                data-divisi="{{ strtolower($d->skill->pluck('divisi')->implode(', ')) }}">
                                {{-- Menggunakan divisi untuk filter skill --}}

                                <td class="px-5 py-3 font-medium text-gray-800">{{ $d->nama_pelamar }}</td>

                                <td class="px-5 py-3 text-center text-gray-600">
                                    {{ $d->skill->pluck('skill')->implode(', ') }}
                                </td>

                                <td class="px-5 py-3 text-center text-gray-600">{{ $d->umur }} Tahun</td>

                                <td class="px-5 py-3 text-center text-gray-600">Expert</td> {{-- Asumsi "Expert" --}}

                                <td class="px-5 py-3 text-center text-gray-600">{{ $d->gender }}</td>

                                <td class="px-5 py-3 text-center">
                                    <button type="button" class="text-orange-500 hover:text-orange-600 download-btn"
                                        data-url="/cv/{{ $d->id }}/unduh">
                                        <i class="ph ph-download-simple text-lg"></i>
                                    </button>
                                </td>

                                <td class="px-5 py-3 text-center">
                                    @php
                                        $pembelian = $pembeliKandidat
                                            ->where('pelamar_id', $d->id)
                                            ->sortByDesc('created_at')
                                            ->first();
                                    @endphp

                                    @if ($pembelian && $pembelian->status === 'pending')
                                        <button class="bg-zinc-500 text-white px-3 py-1.5 rounded-lg text-sm shadow">
                                            <i class="ph ph-clock"></i>
                                        </button>
                                    @else
                                        <button type="button" onclick="cekKoin({{ $d->id }})"
                                            class="bg-green-500 text-white px-3 py-1.5 rounded-lg text-sm shadow">
                                            Beli
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    <tr id="noResultsRow" class="hidden">
                        <td colspan="7" class="px-5 py-3 text-center text-gray-500">Tidak ada kandidat yang cocok dengan
                            filter.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- Download Confirmation Modal --}}
    <div id="confirmModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full border border-gray-200"> {{-- Added border-gray-200 --}}
            <h2 class="text-lg font-semibold mb-4 text-gray-900">Konfirmasi</h2>
            <p class="text-gray-700 mb-4">Apakah Anda yakin ingin mengunduh CV ini?</p>
            <div class="flex justify-end gap-2">
                <button id="cancelBtn"
                    class="px-4 py-2 rounded-lg bg-gray-200 text-gray-800 hover:bg-gray-300 transition-colors duration-200">Batal</button>
                <button id="confirmBtn"
                    class="px-4 py-2 rounded-lg bg-orange-500 text-white hover:bg-orange-600 transition-colors duration-200">Ya,
                    Unduh</button>
            </div>
        </div>
    </div>

    {{-- Loading Modal --}}
    <div id="loadingModal" class="hidden fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50">
        <div class="flex flex-col items-center">
            <div class="w-10 h-10 border-4 border-white border-t-transparent rounded-full animate-spin"></div>
            <p class="text-white mt-4">Sedang mengunduh...</p>
        </div>
    </div>

    {{-- Success Modal --}}
    <div id="successModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full text-center border border-gray-200">
            {{-- Added border-gray-200 --}}
            <h2 class="text-lg font-semibold mb-2 text-green-600">Berhasil!</h2>
            <p class="text-gray-700 mb-4">CV berhasil diunduh.</p>
            <button id="okBtn"
                class="px-4 py-2 rounded-lg bg-orange-500 text-white hover:bg-orange-600 transition-colors duration-200">Oke</button>
        </div>
    </div>

    {{-- Koin Kurang Modal --}}
    <div id="modalKoin" class="hidden fixed inset-0 flex items-center justify-center bg-black/50 z-40 px-4">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-6 text-center border border-gray-200">
            {{-- Added border-gray-200 --}}
            <h2 class="text-2xl font-bold mb-2 text-red-500">Upss!!</h2>
            <p class="text-gray-600 mb-6">Koin anda kurang. Silakan Top Up terlebih dahulu.</p>
            <button class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg font-medium transition"
                onclick="window.location='/dashboard/perusahaan'">Top Up Sekarang</button> {{-- Mengarahkan ke halaman dashboard/topup --}}
        </div>
    </div>

    {{-- Verifikasi Beli Kandidat Modal --}}
    <div id="modalVerifikasi" class="hidden fixed inset-0 flex items-center justify-center bg-black/50 z-50 px-4">
        <div class="bg-white rounded-2xl shadow-lg w-full max-w-md p-6 text-center border border-gray-200">
            {{-- Added border-gray-200 --}}
            <div class="flex justify-center items-center mb-4">
                <span class="text-3xl font-bold text-yellow-500">100</span>
                <img src="{{ asset('Icon/coin perusahaan.png') }}" alt="" class="w-8 h-8 ml-2">
            </div>
            <p class="text-gray-700 mb-6">Beli kandidat Area Kerja dengan 100 koin?</p> {{-- Teks lebih jelas --}}
            <input type="hidden" id="pelamarIdVerifikasi"> {{-- ID unik untuk pelamarId --}}
            <div class="flex justify-center gap-4 flex-wrap">
                <button type="button" class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg transition"
                    id="lanjutPilihLowonganBtn">Beli</button> {{-- ID untuk jQuery --}}
                <button class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-lg transition"
                    onclick="closeModal('modalVerifikasi')">Batal</button>
            </div>
        </div>
    </div>

    {{-- Pilih Lowongan Modal --}}
    <div id="modalLowongan" class="hidden fixed inset-0 flex items-center justify-center bg-black/50 z-[70] px-4">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-6 text-center border border-gray-200">
            {{-- Added border-gray-200 --}}
            <h2 class="text-2xl font-bold mb-2 text-orange-500">Pilih Lowongan</h2>
            <p class="text-gray-600 mb-4">Silakan pilih lowongan untuk kandidat ini</p>
            <form action="/beli/kandidatak/{{ $harga->id }}" method="POST" id="formLowongan">
                @csrf
                <input type="hidden" name="pelamar_id" id="pelamarIdLowongan">
                <div class="mb-6 text-left">
                    <label for="lowongan_id" class="block text-sm font-medium text-gray-700 mb-2">Pilih Lowongan</label>
                    <select name="lowongan_id" id="lowongan_id"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2.5 focus:outline-none border border-gray-200 focus:ring-2 focus:ring-orange-500 text-gray-900">
                        {{-- Consistent py-2.5, text-gray-900 --}}
                        <option value="" disabled selected>Pilih lowongan...</option>
                        @forelse ($lowongan as $lw)
                            {{-- Gunakan @forelse untuk handle lowongan kosong --}}
                            @if ($lw->paket_id)
                                <option value="{{ $lw->id }}">{{ $lw->nama }}</option>
                            @endif
                        @empty
                            <option value="" disabled>Belum Ada Lowongan Aktif.</option>
                        @endforelse
                    </select>
                </div>
                <div class="flex justify-center gap-4 flex-wrap">
                    <button type="submit"
                        class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg transition">Konfirmasi
                        Beli</button>
                    <button type="button" class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-lg transition"
                        onclick="closeModal('modalLowongan')">Batal</button>
                </div>
            </form>
        </div>
    </div>

    @if (session('success'))
        <div id="toast-success"
            class="fixed top-5 right-5 z-50 flex items-center w-full max-w-xs p-4 text-green-600 bg-green-100 rounded-lg shadow-lg animate-fade-in border border-green-200"
            {{-- Added border-green-200 --}} role="alert">
            <img src="{{ asset('topup_icon/Ceklis.png') }}" alt="" class="w-8">
            <div class="ms-3 text-sm font-medium">
                <p class="font-semibold">{{ session('success') }}</p>
                <p>Beli Kandidat Berhasil! Mohon menunggu konfirmasi dari kandidat.</p>
            </div>
        </div>
        <script>
            setTimeout(() => $('#toast-success').remove(), 5000);
        </script>
    @endif

    <script>
        // Global functions for modals (can be called from onclick attributes)
        function openModal(id) {
            $('#' + id).removeClass('hidden').addClass('flex');
            $('body').addClass('overflow-hidden');
        }

        function closeModal(id) {
            $('#' + id).removeClass('flex').addClass('hidden');
            $('body').removeClass('overflow-hidden');
        }

        let koinUser = {{ $totalSaldo }};
        let currentPelamarId = null; // Variable to store pelamar ID temporarily

        function cekKoin(pelamarId) {
            currentPelamarId = pelamarId; // Store the ID
            if (koinUser < 100) { // Assuming 100 is the price
                openModal('modalKoin');
            } else {
                $('#pelamarIdVerifikasi').val(pelamarId); // Set ID in verification modal
                openModal('modalVerifikasi');
            }
        }

        // jQuery document ready
        $(document).ready(function() {
            // Filter Kandidat Logic
            function applyKandidatFilters() {
                const searchNama = $('#searchNama').val().toLowerCase();
                const filterSkill = $('#filterSkill').val().toLowerCase();
                const filterUmur = $('#filterUmur').val();
                const filterGender = $('#filterGender').val().toLowerCase();
                let resultsFound = false;

                $('.kandidat-row').each(function() {
                    const kandidatNama = $(this).data('nama');
                    const kandidatSkill = $(this).data(
                        'skill'); // Menggunakan data-skill yang berisi divisi
                    const kandidatUmur = parseInt($(this).data('umur'));
                    const kandidatGender = $(this).data('gender');

                    const matchNama = kandidatNama.includes(searchNama);
                    const matchSkill = filterSkill === '' || kandidatSkill.includes(
                        filterSkill); // Check if skill is in the list
                    const matchGender = filterGender === '' || kandidatGender === filterGender;

                    let matchUmur = true;
                    if (filterUmur !== '') {
                        if (filterUmur === '17-25') {
                            matchUmur = (kandidatUmur >= 17 && kandidatUmur <= 25);
                        } else if (filterUmur === '26-35') {
                            matchUmur = (kandidatUmur >= 26 && kandidatUmur <= 35);
                        }
                    }

                    if (matchNama && matchSkill && matchUmur && matchGender) {
                        $(this).show();
                        resultsFound = true;
                    } else {
                        $(this).hide();
                    }
                });

                if (resultsFound) {
                    $('#noResultsRow').hide();
                } else {
                    $('#noResultsRow').show();
                }
            }

            // Event listeners for filters
            $('#searchNama, #filterSkill, #filterUmur, #filterGender').on('change keyup', applyKandidatFilters);

            // Initial filter application
            applyKandidatFilters();

            // Download CV Modals
            let selectedDownloadUrl = "";
            $('.download-btn').on('click', function() {
                selectedDownloadUrl = $(this).data('url');
                openModal('confirmModal');
            });

            $('#cancelBtn').on('click', function() {
                closeModal('confirmModal');
            });

            $('#confirmBtn').on('click', function() {
                closeModal('confirmModal');
                openModal('loadingModal');

                setTimeout(() => {
                    closeModal('loadingModal');
                    openModal('successModal');

                    let a = document.createElement("a");
                    a.href = selectedDownloadUrl;
                    a.setAttribute("download",
                        ""); // Ini akan membuat browser mencoba mengunduh file
                    document.body.appendChild(a);
                    a.click();
                    document.body.removeChild(a);
                }, 2000); // Simulate download time
            });

            $('#okBtn').on('click', function() {
                closeModal('successModal');
            });

            // Handle "Beli" button in Verifikasi modal
            $('#lanjutPilihLowonganBtn').on('click', function() {
                closeModal('modalVerifikasi');
                const pelamarId = $('#pelamarIdVerifikasi').val();
                $('#pelamarIdLowongan').val(pelamarId); // Set ID in lowongan modal
                openModal('modalLowongan');
            });

            // Close modals by clicking outside (overlay)
            $('.fixed.inset-0.bg-black\\/50').on('click', function(e) {
                if ($(e.target).is(this)) {
                    closeModal($(this).attr('id'));
                }
            });
            // Stop propagation for modal content click
            $('.fixed.inset-0.bg-black\\/50 > div').on('click', function(e) {
                e.stopPropagation();
            });
        });
    </script>
@endsection
