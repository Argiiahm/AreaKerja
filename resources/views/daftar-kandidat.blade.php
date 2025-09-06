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
                <button data-modal-target="formModal" data-modal-toggle="formModal"
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
    <div id="formModal" tabindex="-1" aria-hidden="true"
        class="hidden fixed top-0 left-0 right-0 z-50 flex items-center justify-center w-full h-full bg-black/50">
        <div class="relative w-full max-w-md p-4">
            <!-- Konten Modal -->
            <div class="bg-white rounded-2xl shadow-lg p-6">

                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold text-gray-800">Daftar Kandidat</h3>
                    <button type="button" class="text-gray-500 hover:text-gray-700" data-modal-hide="formModal">✕</button>
                </div>

                <label for="divisi" class="block mb-2 text-sm font-medium text-gray-900">Bidang yang diminati</label>

                <form>
                    <div id="dropdownWrapper" class="relative">
                        <button id="dropdownBtn" type="button"
                            class="w-full flex flex-wrap gap-2 items-center px-3 py-2 border rounded-lg bg-white text-gray-700">
                            <span id="placeholder" class="text-gray-400">Divisi</span>
                            <span id="selectedChips" class="flex flex-wrap gap-2"></span>
                            <svg class="w-4 h-4 ml-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>

                        <div id="dropdownMenu"
                            class="hidden absolute z-50 mt-2 w-full bg-white border rounded-lg shadow-lg">
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
                    <button type="button" data-modal-hide="formModal"
                        class="text-orange-500 font-medium">Kembali</button>
                    <button type="submit"
                        class="text-orange-500 font-medium">Selanjutnya</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        const btn = dropdownBtn,
              menu = dropdownMenu,
              chips = selectedChips,
              ph = placeholder;

        btn.onclick = () => menu.classList.toggle("hidden");

        menu.onchange = e => {
            if (e.target.type !== "checkbox") return;
            const val = e.target.value;
            if (e.target.checked) {
                ph.classList.add("hidden");
                chips.insertAdjacentHTML("beforeend",
                    `<span data-v="${val}" class="flex items-center bg-gray-100 px-2 py-1 rounded text-sm">${val}<button class="ml-2">✕</button></span>`
                );
            } else chips.querySelector(`[data-v="${val}"]`)?.remove();
            if (!chips.children.length) ph.classList.remove("hidden");
        };

        chips.onclick = e => {
            if (e.target.tagName === "BUTTON") {
                const chip = e.target.parentElement;
                menu.querySelector(`[value="${chip.dataset.v}"]`).checked = false;
                chip.remove();
                if (!chips.children.length) ph.classList.remove("hidden");
            }
        };

        window.onclick = e => {
            if (!btn.contains(e.target) && !menu.contains(e.target)) menu.classList.add("hidden");
        };
    </script>
@endsection
