@extends('layouts.index')

@section('content')
    <div class="p-4 md:p-6 mt-24 md:mt-32" x-data="kandidatFilter()">

        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-5 mb-4">

            <h1 class="font-bold text-xl md:text-2xl">Kandidat Saya</h1>

            <div class="flex flex-col md:flex-row w-full lg:w-auto gap-3">

                <div class="flex border border-gray-300 rounded-lg overflow-hidden h-10 w-full md:w-[300px] lg:w-[400px]">
                    <input type="text" placeholder="Nama Kandidat..."
                        class="px-3 text-sm text-gray-700 focus:outline-none w-full" x-model="searchNama">
                </div>

                <select class="px-4 py-2 text-sm text-gray-700 focus:outline-none border border-gray-400 rounded-md"
                    x-model="filterSkill">
                    <option value="">Skill</option>
                    @foreach ($Skills as $s)
                        <option value="{{ $s->divisi }}">{{ $s->divisi }}</option>
                    @endforeach
                </select>

            </div>
        </div>


        <div class="overflow-x-auto w-full">
            <div class="inline-block min-w-full shadow bg-white rounded-lg px-4 md:px-8 pt-3">

                <table class="min-w-full table-auto">
                    <thead class="text-xs md:text-sm">
                        <tr>
                            <th class="px-3 md:px-6 py-3 border-gray-300 text-center">Nama</th>
                            <th class="px-3 md:px-6 py-3 border-gray-300 text-center">Skill</th>
                            <th class="px-3 md:px-6 py-3 border-gray-300 text-center">CV</th>
                            <th class="px-3 md:px-6 py-3 border-gray-300 text-center">Hapus</th>
                            <th class="px-3 md:px-6 py-3 border-gray-300 text-center">Expetasi Range Gaji</th>
                            <th class="px-3 md:px-6 py-3 border-gray-300 text-center">Status</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white text-center text-xs md:text-sm">

                        @forelse ($Kandidats as $kandidat)
                            @if ($kandidat->status === 'diterima')
                                <tr class="border-b"
                                    x-show="filter('{{ $kandidat->pelamar->nama_pelamar }}', '{{ $kandidat->pelamar->divisi }}')">

                                    <td class="px-3 md:px-6 py-4 border-gray-300">
                                        <div class="flex items-center justify-center gap-2">
                                            <img src="{{ asset('image/logo-areakerja.png') }}" class="w-8 md:w-10">
                                            {{ $kandidat->pelamar->nama_pelamar }}
                                        </div>
                                    </td>

                                    <td class="px-3 md:px-6 py-4 border-gray-300">
                                        @foreach ($kandidat->pelamar->skill as $sk)
                                            <span class="inline-block bg-gray-100 px-2 py-1 rounded text-xs">
                                                {{ $sk->skill }}
                                            </span>
                                        @endforeach
                                        | {{ implode(', ', json_decode($kandidat->pelamar->divisi, true) ?? []) }}
                                    </td>

                                    <td class="px-3 md:px-6 py-4 border-gray-300">
                                        <button class="text-orange-500 hover:text-orange-600 download-btn"
                                            data-url="/cv/{{ $kandidat->pelamar->id }}/unduh">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4" />
                                            </svg>
                                        </button>
                                    </td>

                                    <td class="px-3 md:px-6 py-4 border-gray-300">
                                        <form action="/dashboard/perusahaan/kandidat/delete/{{ $kandidat->id }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                <i class="ph ph-trash-simple text-orange-500 text-xl md:text-2xl"></i>
                                            </button>
                                        </form>
                                    </td>

                                    <td class="px-3 md:px-6 py-4 border-gray-300">
                                        Rp. {{ number_format($kandidat->pelamar->gaji_maksimal, 0, ',', '.') }}
                                    </td>

                                    <td class="px-3 md:px-6 py-4 font-bold border-gray-300 text-green-500">
                                        {{ $kandidat->status }}
                                    </td>
                                </tr>
                            @endif
                        @empty
                            <tr>
                                <td colspan="6" class="py-4 text-gray-500">Belum Ada Kandidat.</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>

            </div>
        </div>

    </div>

    <div id="confirmModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full">
            <h2 class="text-lg font-semibold mb-4">Konfirmasi</h2>
            <p class="text-gray-600 mb-4">Apakah Anda yakin ingin mengunduh CV ini?</p>
            <div class="flex justify-end gap-2">
                <button id="cancelBtn" class="px-4 py-2 rounded bg-gray-300">Batal</button>
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
        function parseJsonArray(str) {
            try {
                return JSON.parse(str);
            } catch {
                return [];
            }
        }

        function kandidatFilter() {
            return {
                searchNama: "",
                filterSkill: "",

                filter(nama, divisiJson) {
                    let cocokNama = nama.toLowerCase().includes(this.searchNama.toLowerCase());

                    let divisiArray = parseJsonArray(divisiJson); // tambahan
                    let cocokSkill = this.filterSkill === "" || divisiArray.includes(this.filterSkill);

                    return cocokNama && cocokSkill;
                }
            }
        }

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
