@extends('layouts.index')

@section('content')
    <section class="relative w-full h-screen pt-24">
        <div class="absolute inset-0">
            <img src="https://png.pngtree.com/background/20240507/original/pngtree-digital-marketing-website-displayed-on-rendered-office-desktop-picture-image_8837781.jpg"
                alt="Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-60"></div>
        </div>
        <div class="relative z-10 flex items-center justify-start h-full px-10 lg:px-20 md:px-20">
            <div class="max-w-lg">
                <h1 class="text-6xl font-bold text-white mb-4">Daftar Kandidat</h1>
                <p class="text-white text-lg mb-6">
                    Ikuti pelatihan terakreditasi Areakerja.com<br>
                    dan dapatkan pekerjaan impian anda!
                </p>
                <button id="openFormModal"
                    class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-2 rounded-md shadow-md">
                    Daftar
                </button>
            </div>
        </div>
    </section>
    <section class="bg-orange-500 text-white">
        <div class="max-w-6xl mx-auto px-6 py-16 flex flex-col md:flex-row items-center gap-8">
            <div class="md:w-1/2">
                <h2 class="text-3xl font-bold mb-6">
                    Benefit Menjadi Kandidat <br> Areakerja.com
                </h2>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <span class="text-xl mr-2"><i class="ph ph-check"></i></span>
                        Menjadi prioritas pilihan dari perusahaan mitra Areakerja
                    </li>
                    <li class="flex items-start">
                        <span class="text-xl mr-2"><i class="ph ph-check"></i></span>
                        Areakerja memiliki banyak mitra perusahaan yang sedang membuka lowongan
                    </li>
                    <li class="flex items-start">
                        <span class="text-xl mr-2"><i class="ph ph-check"></i></span>
                        Areakerja merupakan perusahaan terpercaya berbadan hukum
                    </li>
                    <li class="flex items-start">
                        <span class="text-xl mr-2"><i class="ph ph-check"></i></span>
                        Server Terbaik
                    </li>
                </ul>
            </div>
            <div class="md:w-1/2 flex justify-center">
                <img src="{{ asset('image/1.png') }}" alt="Kandidat" class="">
            </div>
        </div>
    </section>

    <div class="flex justify-center py-10">
        <div class="bg-white  rounded-2xl w-full max-w-5xl overflow-hidden">

            <div class="bg-gradient-to-r from-orange-400 to-yellow-400 text-center py-4">
                <h2 class="text-xl font-bold text-black">Cara Daftar Kandidat</h2>
            </div>

            <div class="flex flex-col md:flex-row items-center p-6">
                <div class="w-48 h-48 bg-orange-500 rounded-lg overflow-hidden mr-6">
                    <img src="{{ asset('image/1.png') }}" alt="" class="object-cover w-full h-full">
                </div>

                <div class="ml-0 mr-9 flex justify-center items-center">
                    <div class="w-10 h-10 bg-orange-500 text-white flex items-center justify-center rounded-full shadow-md">
                        <span class="text-lg font-bold"> →</span>
                    </div>
                </div>
                <div class="flex-1 flex items-center justify-between ml-20">
                    <div class="divide-y divide-gray-300 text-gray-700 w-full">
                        <p class="py-3">Klik Daftar untuk registrasi kandidat</p>
                        <p class="py-3">Lengkapi data yang diperlukan pada proses registrasi</p>
                        <p class="py-3">Tunggu pemberitahuan setelah melakukan registrasi</p>
                        <p class="py-3">Ikuti pelatihan sesuai prosedur Areakerja.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Daftar Kandidat --}}
    <div id="formModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
        <div class="bg-white rounded-2xl shadow-lg p-6 w-[400px] md:w-[500px] relative">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-gray-800">Daftar Kandidat</h3>
                <button id="closeFormModal" class="text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
            </div>

            <label for="divisi" class="block mb-2 text-sm font-medium text-gray-900">Bidang yang diminati</label>
            <form>
                <div id="dropdownWrapper" class="relative">
                    <button id="dropdownBtn" type="button"
                        class="w-full flex flex-wrap gap-2 items-center px-3 py-2 border rounded-lg bg-white text-gray-700">
                        <span id="placeholder" class="text-gray-400">Divisi</span>
                        <span id="selectedChips" class="flex flex-wrap gap-2"></span>
                        <svg class="w-4 h-4 ml-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <div id="dropdownMenu" class="hidden absolute z-50 mt-2 w-full bg-white border rounded-lg shadow-lg">
                        <ul class="max-h-48 overflow-y-auto text-sm text-gray-700">
                            <li>
                                <label class="flex items-center p-2 hover:bg-gray-100 cursor-pointer">
                                    <input type="checkbox" value="UI UX Designer"
                                        class="checkbox w-4 h-4 text-orange-500 rounded">
                                    <span class="ml-2">UI UX Designer</span>
                                </label>
                            </li>
                            <li>
                                <label class="flex items-center p-2 hover:bg-gray-100 cursor-pointer">
                                    <input type="checkbox" value="Design Grafis"
                                        class="checkbox w-4 h-4 text-orange-500 rounded">
                                    <span class="ml-2">Design Grafis</span>
                                </label>
                            </li>
                            <li>
                                <label class="flex items-center p-2 hover:bg-gray-100 cursor-pointer">
                                    <input type="checkbox" value="UX Designer"
                                        class="checkbox w-4 h-4 text-orange-500 rounded">
                                    <span class="ml-2">UX Designer</span>
                                </label>
                            </li>
                            <li>
                                <label class="flex items-center p-2 hover:bg-gray-100 cursor-pointer">
                                    <input type="checkbox" value="UX Research"
                                        class="checkbox w-4 h-4 text-orange-500 rounded">
                                    <span class="ml-2">UX Research</span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
            </form>

            <div class="flex justify-between mt-6">
                <button type="button" id="btn_kembali_divisi" class="text-orange-500 font-medium">Kembali</button>
                <button type="button" id="btn_pembayaran" class="text-orange-500 font-medium">Selanjutnya</button>
            </div>
        </div>
    </div>

    <!-- Modal Pembayaran -->
    <div id="modalPembayaran" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
        <div class="bg-white rounded-2xl shadow-lg w-[400px] md:w-[500px] relative p-6">
            <div class="flex justify-between items-center border-b pb-3 mb-4">
                <h2 class="text-lg font-bold">Daftar Kandidat</h2>
                <button id="closeModalPembayaran" class="text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
            </div>

            <h3 class="text-gray-700 font-semibold mb-2">Metode Pembayaran</h3>
            <div id="dropdownBankBtn"
                class="border rounded-lg px-4 py-2 flex items-center justify-between cursor-pointer mb-4">
                <div class="flex items-center gap-2">
                    <span class="text-orange-500">⇄</span>
                    <span>Transfer Bank</span>
                </div>
                <span class="text-gray-600 text-xl">⮟</span>
            </div>

            <div id="list_p" class="space-y-3 hidden">
                @foreach ($payment as $p)
                    <div
                        class="flex items-center justify-between border rounded-lg px-3 py-2 cursor-pointer hover:bg-gray-50 select-bank">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset($p->logo_img) }}" alt="" class="w-12 h-12">
                            <span>{{ $p->nama_bank }}</span>
                        </div>
                        <input type="radio" name="id_bank" value="{{ $p->id }}" required
                            class="w-5 h-5 border-2 border-orange-500 rounded-full cursor-pointer">
                    </div>
                @endforeach

                <div class="flex justify-between mt-6 text-sm font-semibold">
                    <button type="button" id="btn_kembali_pembayaran"
                        class="px-4 py-2 border border-orange-500 text-orange-500 rounded-lg hover:bg-orange-50 transition">
                        Kembali
                    </button>

                    <button type="submit" form="transaksi"
                        class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition">
                        Selanjutnya
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const openFormModal = document.getElementById("openFormModal");
        const formModal = document.getElementById("formModal");
        const modalPembayaran = document.getElementById("modalPembayaran");

        const closeFormModal = document.getElementById("closeFormModal");
        const btnKembaliDivisi = document.getElementById("btn_kembali_divisi");
        const btnPembayaran = document.getElementById("btn_pembayaran");

        const closeModalPembayaran = document.getElementById("closeModalPembayaran");
        const btnKembaliPembayaran = document.getElementById("btn_kembali_pembayaran");

        openFormModal.addEventListener("click", () => {
            formModal.classList.remove("hidden")
        })

        closeFormModal.onclick = () => formModal.classList.add("hidden");
        btnKembaliDivisi.onclick = () => formModal.classList.add("hidden");

        btnPembayaran.onclick = () => {
            formModal.classList.add("hidden");
            modalPembayaran.classList.remove("hidden");
        };

        closeModalPembayaran.onclick = () => modalPembayaran.classList.add("hidden");
        btnKembaliPembayaran.onclick = () => {
            modalPembayaran.classList.add("hidden");
            formModal.classList.remove("hidden");
        };

        const dropdownBtn = document.getElementById("dropdownBtn");
        const dropdownMenu = document.getElementById("dropdownMenu");
        const selectedChips = document.getElementById("selectedChips");
        const placeholder = document.getElementById("placeholder");

        dropdownBtn.onclick = () => dropdownMenu.classList.toggle("hidden");

        dropdownMenu.onchange = e => {
            if (e.target.type !== "checkbox") return;
            const val = e.target.value;
            if (e.target.checked) {
                placeholder.classList.add("hidden");
                selectedChips.insertAdjacentHTML("beforeend",
                    `<span data-v="${val}" class="flex items-center bg-gray-100 px-2 py-1 rounded text-sm">${val}<button class="ml-2">✕</button></span>`
                );
            } else {
                selectedChips.querySelector(`[data-v="${val}"]`)?.remove();
                if (!selectedChips.children.length) placeholder.classList.remove("hidden");
            }
        };

        selectedChips.onclick = e => {
            if (e.target.tagName === "BUTTON") {
                const chip = e.target.parentElement;
                dropdownMenu.querySelector(`[value="${chip.dataset.v}"]`).checked = false;
                chip.remove();
                if (!selectedChips.children.length) placeholder.classList.remove("hidden");
            }
        };

        const dropdownBankBtn = document.getElementById("dropdownBankBtn");
        const list_p = document.getElementById("list_p");

        dropdownBankBtn.onclick = () => {
            list_p.classList.toggle("hidden");
        };
    </script>
@endsection
