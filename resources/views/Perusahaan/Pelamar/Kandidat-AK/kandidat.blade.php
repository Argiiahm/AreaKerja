@extends('layouts.index')

@section('content')
    <section class="relative w-full h-[75vh] lg:h-[90vh] flex items-center justify-start overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://png.pngtree.com/background/20240507/original/pngtree-digital-marketing-website-displayed-on-rendered-office-desktop-picture-image_8837781.jpg"
                alt="Background" class="w-full h-full object-cover">
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

    <form action="/dashboard/perusahaan/kandidatak" method="GET"
        class="bg-white shadow-xl -mt-8 relative  rounded-2xl flex flex-wrap items-center justify-between gap-4 px-6 py-6 mx-4 lg:mx-40 border border-gray-100">
        <div class="flex flex-col lg:flex-row items-center gap-4 w-full lg:w-auto flex-wrap">
            <div class="flex items-center border border-gray-300 rounded-lg px-3 py-2 w-full lg:w-44">
                <select name="skill" class="focus:outline-none text-sm w-full bg-transparent">
                    <option value="" selected disabled>Skill</option>
                    @foreach ($divisi as $dv)
                        <option value="{{ $dv->divisi }}">{{ $dv->divisi }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center border border-gray-300 rounded-lg px-3 py-2 w-full lg:w-44">
                <select name="umur" class="focus:outline-none text-sm w-full bg-transparent">
                    <option value="" selected disabled>Umur</option>
                    <option value="17-25">17-25</option>
                    <option value="26-35">26-35</option>
                </select>
            </div>

            <div class="flex items-center border border-gray-300 rounded-lg px-3 py-2 w-full lg:w-44">
                <select name="gender" class="focus:outline-none text-sm w-full bg-transparent">
                    <option value="" selected disabled>Gender</option>
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
        <div class="bg-white border border-gray-100 shadow-md rounded-xl p-5 flex flex-col items-center w-full lg:w-72">
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
        <div class="overflow-x-auto shadow-md rounded-xl">
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
                <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach ($Data as $d)
                        @if ($d->kategori === 'kandidat aktif')
                            <tr class="hover:bg-orange-50 transition">
                                <td class="px-5 py-3 font-medium text-gray-800">{{ $d->nama_pelamar }}</td>
                                <td class="px-5 py-3 text-center text-gray-600">
                                    {{ $d->skill->pluck('skill')->implode(', ') }}</td>
                                <td class="px-5 py-3 text-center text-gray-600">{{ $d->umur }} Tahun</td>
                                <td class="px-5 py-3 text-center text-gray-600">Expert</td>
                                <td class="px-5 py-3 text-center text-gray-600">{{ $d->gender }}</td>
                                <td class="px-5 py-3 text-center">
                                    <button class="text-orange-500 hover:text-orange-600 download-btn"
                                        data-url="/cv/{{ $d->id }}/unduh" title="Download CV">
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
                                        <button
                                            class="bg-zinc-500 hover:bg-zinc-600 text-white px-3 py-1.5 rounded-lg text-sm font-medium shadow-sm transition">
                                            <i class="ph ph-clock"></i>
                                        </button>
                                    @else
                                        <button onclick="cekKoin({{ $d->id }})"
                                            class="bg-green-500 hover:bg-green-600 text-white px-3 py-1.5 rounded-lg text-sm font-medium shadow-sm transition">
                                            Beli
                                        </button>
                                    @endif

                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div id="modalKoin" class="fixed inset-0 flex items-center justify-center bg-black/50 hidden z-40 px-4">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-6 text-center">
            <h2 class="text-2xl font-bold mb-2 text-red-500">Upss!!</h2>
            <p class="text-gray-600 mb-6">Koin anda kurang. Silakan Top Up terlebih dahulu.</p>
            <button class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg font-medium transition"
                onclick="closeModal('modalKoin')">Top Up Sekarang</button>
        </div>
    </div>

    <div id="modalVerifikasi" class="fixed inset-0 flex items-center justify-center bg-black/50 hidden z-50 px-4">
        <div class="bg-white rounded-2xl shadow-lg w-full max-w-md p-6 text-center">
            <div class="flex justify-center items-center mb-4">
                <span class="text-3xl font-bold text-yellow-500">100</span>
                <img src="{{ asset('Icon/coin perusahaan.png') }}" alt="" class="w-8 h-8 ml-2">
            </div>
            <p class="text-gray-700 mb-6">Beli kandidat area kerja</p>
            <input type="hidden" id="pelamarId">
            <div class="flex justify-center gap-4 flex-wrap">
                <button type="button" class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg transition"
                    onclick="lanjutPilihLowongan()">Beli</button>
                <button class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-lg transition"
                    onclick="closeModal('modalVerifikasi')">Batal</button>
            </div>
        </div>
    </div>

    <div id="modalLowongan" class="fixed inset-0 flex items-center justify-center bg-black/50 hidden z-[70] px-4">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-6 text-center">
            <h2 class="text-2xl font-bold mb-2 text-orange-500">Pilih Lowongan</h2>
            <p class="text-gray-600 mb-4">Silakan pilih lowongan untuk kandidat ini</p>
            <form action="/beli/kandidatak/{{ $harga->id }}" method="POST" id="formLowongan">
                @csrf
                <input type="hidden" name="pelamar_id" id="pelamarIdLowongan">
                <div class="mb-6 text-left">
                    <label for="lowongan_id" class="block text-sm font-medium text-gray-700 mb-2">Pilih Lowongan</label>
                    <select name="lowongan_id" id="lowongan_id"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                        <option value="" disabled selected>Pilih lowongan...</option>
                        @foreach ($lowongan as $lw)
                            <option value="{{ $lw->id }}">{{ $lw->nama }}</option>
                        @endforeach
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
            class="fixed top-5 right-5 z-50 flex items-center w-full max-w-xs p-4 text-green-600 bg-green-100 rounded-lg shadow-lg animate-fade-in"
            role="alert">
            <img src="{{ asset('topup_icon/Ceklis.png') }}" alt="" class="w-8">
            <div class="ms-3 text-sm font-medium">
                <p class="font-semibold">{{ session('success') }}</p>
                <p>Beli Kandidat Berhasil! Mohon menunggu konfirmasi dari kandidat.</p>
            </div>
        </div>
        <script>
            setTimeout(() => document.getElementById('toast-success')?.remove(), 5000);
        </script>
    @endif

    <script>
        let koinUser = {{ $totalSaldo }};

        function cekKoin(pelamarId) {
            if (koinUser < 100) openModal('modalKoin');
            else {
                document.getElementById('pelamarId').value = pelamarId;
                openModal('modalVerifikasi');
            }
        }

        function lanjutPilihLowongan() {
            closeModal('modalVerifikasi');
            const pelamarId = document.getElementById('pelamarId').value;
            document.getElementById('pelamarIdLowongan').value = pelamarId;
            setTimeout(() => openModal('modalLowongan'), 200);
        }

        function openModal(id) {
            document.getElementById(id).classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }

        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
    </script>
@endsection
