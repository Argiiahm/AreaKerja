@extends('layouts.index')

@section('content')
    <section class="container max-w-screen-lg mx-auto pt-40">
        <div class="flex items-center mx-5 lg:w-full lg:mx-auto md:w-auto  p-2 border border-gray-300 rounded-lg shadow-sm">
            <div class="flex items-center flex-1 px-2">
                <i class="ph ph-magnifying-glass text-zinc-900 text-lg mr-2"></i>
                <input type="text" placeholder="Posisi lowongan, kata kunci, ..."
                    class="w-full outline-none border-none placeholder-gray-500 text-gray-700" />
            </div>

            <span class="w-px h-6 bg-gray-300"></span>

            <div class="flex items-center flex-1 px-2">
                <i class="ph ph-map-pin text-zinc-900 text-lg mr-2"></i>
                <input type="text" placeholder="Kota, provinsi, kode pos..."
                    class="w-full outline-none placeholder-gray-500 border-none text-gray-700" />
            </div>

            <button class="ml-2 bg-[#fa6601] cursor-pointer text-white font-medium px-4 py-2 rounded-lg">
                <div class="hidden lg:block md:block">
                    Cari Lowongan Kerja
                </div>
                <div class="block lg:hidden md:hidden">
                    Cari
                </div>
            </button>
        </div>


        <div class="flex justify-center my-10">
            <p class="text-[#fa6601] font-semibold text-center lg:text-left md:text-left">Lamar Pekerjaan Kamu ~ <span
                    class="font-normal block lg:inline md:inline text-zinc-600">Dengan Waktu
                    Dan Langkah Yang Tepat</span></p>
        </div>

        <div>
            <p class="font-semibold text-zinc-700 px-2 lg:px-0">KATEGORI PEKERJAAN POPULER</p>
            <div class="flex gap-3">

                <div class="px-2 lg:px-0 md:ml-5 grid grid-cols-2 lg:grid-cols-4 md:grid-cols-4 gap-2 mt-5 flex-1">
                    <div class="border border-gray-300 py-2 shadow-sm">
                        <p class="text-center text-zinc-700 font-bold">Teknologi</p>
                    </div>
                    <div class="border border-gray-300 py-2 shadow-sm">
                        <p class="text-center text-zinc-700 font-bold">Pelayanan</p>
                    </div>
                    <div class="border border-gray-300 py-2 shadow-sm">
                        <p class="text-center text-zinc-700 font-bold">Administrasi</p>
                    </div>
                    <div class="border border-gray-300 py-2 shadow-sm">
                        <p class="text-center text-zinc-700 font-bold">Pemasaran</p>
                    </div>
                    <div class="border border-gray-300 py-2 shadow-sm">
                        <p class="text-center text-zinc-700 font-bold">Pendidik</p>
                    </div>
                    <div class="border border-gray-300 py-2 shadow-sm">
                        <p class="text-center text-zinc-700 font-bold">Customer Service</p>
                    </div>
                    <div class="border border-gray-300 py-2 shadow-sm">
                        <p class="text-center text-zinc-700 font-bold">Keuangan</p>
                    </div>
                    <div class="border border-gray-300 py-2 shadow-sm">
                        <p class="text-center text-zinc-700 font-bold">Kasir</p>
                    </div>
                    <div class="border border-gray-300 py-2 shadow-sm">
                        <p class="text-center text-zinc-700 font-bold">Admin</p>
                    </div>
                    <div class="border border-gray-300 py-2 shadow-sm">
                        <p class="text-center text-zinc-700 font-bold">Programmer</p>
                    </div>
                    <div class="border border-gray-300 py-2 shadow-sm">
                        <p class="text-center text-zinc-700 font-bold">Marketing</p>
                    </div>
                    <div class="border border-gray-300 py-2 shadow-sm">
                        <p class="text-center text-zinc-700 font-bold">Multimedia</p>
                    </div>
                </div>
                <div class="mt-5 flex flex-col pr-2 lg:pr-0 md:mr-5 gap-2 w-32">
                    <div
                        class="border border-gray-300 border-l-4 border-l-red-600 py-2 flex items-center justify-center gap-1 shadow-sm text-red-600 font-semibold">
                        <i class="ph ph-fire text-lg"></i>
                        Full Time
                    </div>
                    <div
                        class="border border-gray-300 border-l-4 border-l-sky-500 py-2 flex items-center justify-center gap-1 shadow-sm text-sky-500 font-semibold">
                        <i class="ph ph-globe text-lg"></i>
                        WFO/WFH
                    </div>
                    <div
                        class="border border-gray-300 border-l-4 border-l-orange-600 py-2 flex items-center justify-center gap-1 shadow-sm text-orange-600 font-semibold">
                        <i class="ph ph-graduation-cap text-lg"></i>
                        Graduate
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="mt-10 flex justify-center gap-10  items-center font-semibold border-b">
        <button id="umpan-lowongan"
            class="border-b-2 border-[#fa6601] text-[13px] lg:text-[16px] md:text-[16px] cursor-pointer">UMPAN
            LOWONGAN</button>
        <button id="pencarian"
            class="gacursor-pointer border-[#fa6601]  text-[13px] lg:text-[16px] md:text-[16px]">PENCARIAN BARU BARU
            INI</button>
    </div>

    <section class="mx-2 lg:mx-0 md:mx-0 px-0 lg:px-20 md:px-20">
        <p class="my-10 font-semibold text-gray-500 text-center lg:text-left md:text-left">Lowongan berdasarkan pada
            aktivitas anda di areakerja</p>
        <div id="section-umpan-lowongan" class="grid grid-cols-1 lg:grid-cols-2 md:grid-cols-2 gap-3">
            <a href="/detail/job" class="border p-8">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="bg-[#fdedf4] w-fit p-2 text-[#9d2b6b] font-semibold rounded-md text-[12px]">dibutuhkan
                            segera</p>
                        <h1 class="font-bold text-[18px] my-3">Lead Graphic Designer - WFH </h1>
                    </div>
                    <div class="text-5xl font-bold">
                        <i class="ph ph-dots-three-vertical"></i>
                    </div>
                </div>
                <p class="text-gray-500 font-semibold">Capital Club</p>
                <p class="text-gray-500 font-semibold">Jakarta</p>
                <p class="bg-[#d7d6d6] w-fit my-3 p-2 text-[#565656] font-semibold rounded-md">Rp. 4.500.000 – Rp. 7.000.000
                    per
                    bulan
                </p>
                <div class="flex items-center gap-2 my-4">
                    <i class="ph-fill ph-paper-plane-right text-blue-600 text-2xl"></i>
                    <span>Lamar Dengan Cepat</span>
                </div>

                <ul class="ps-5 mt-2 space-y-1 list-disc list-inside mb-5">
                    <li>Gaji – Rp6.000.000 – Rp11.894.293 per bulan Tergantung Pengalaman.</li>
                    <li>Anda harus menyelesaikan penilaian pra-wawancara singkat sebelum Anda diwawancara.</li>
                    <li>Bersamaan dengan penilaian pra-wawancara, Anda akan diminta untuk mengirimkan video berdurasi 1
                        menit tentang diri Anda yang memperkenalkan diri kepada perusahaan (Rinciannya akan diberikan).</li>
                </ul>
                <span>Aktif 2jam lalu</span>
            </a>
            <div class="border p-8">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="bg-[#fdedf4] w-fit p-2 text-[#9d2b6b] font-semibold rounded-md text-[12px]">dibutuhkan
                            segera</p>
                        <h1 class="font-bold text-[18px] my-3">Lead Graphic Designer - WFH </h1>
                    </div>
                    <div class="text-5xl font-bold">
                        <i class="ph ph-dots-three-vertical"></i>
                    </div>
                </div>
                <p class="text-gray-500 font-semibold">Eduwork.id</p>
                <p class="text-gray-500 font-semibold">Yogyakarta</p>
                <p class="bg-[#d7d6d6] w-fit my-3 p-2 text-[#565656] font-semibold rounded-md">Rp. 4.500.000 – Rp. 7.000.000
                    per
                    bulan
                </p>
                <div class="flex items-center gap-2 my-4">
                    <i class="ph-fill ph-paper-plane-right text-blue-600 text-2xl"></i>
                    <span>Lamar Dengan Cepat</span>
                </div>

                <ul class="ps-5 mt-2 space-y-1 list-disc list-inside mb-5">
                    <li>Gaji – Rp6.000.000 – Rp11.894.293 per bulan Tergantung Pengalaman.</li>
                    <li>Anda harus menyelesaikan penilaian pra-wawancara singkat sebelum Anda diwawancara.</li>
                    <li>Bersamaan dengan penilaian pra-wawancara, Anda akan diminta untuk mengirimkan video berdurasi 1
                        menit tentang diri Anda yang memperkenalkan diri kepada perusahaan (Rinciannya akan diberikan).</li>
                </ul>
                <span>Aktif 2jam lalu</span>
            </div>
            <div class="border p-8">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="bg-[#fdedf4] w-fit p-2 text-[#9d2b6b] font-semibold rounded-md text-[12px]">dibutuhkan
                            segera</p>
                        <h1 class="font-bold text-[18px] my-3">UI/UX Designer WFO</h1>
                    </div>
                    <div class="text-5xl font-bold">
                        <i class="ph ph-dots-three-vertical"></i>
                    </div>
                </div>
                <p class="text-gray-500 font-semibold">Permata Solutions</p>
                <p class="text-gray-500 font-semibold">Jakarta</p>
                <p class="bg-[#d7d6d6] w-fit my-3 p-2 text-[#565656] font-semibold rounded-md">Rp. 7.000.000 – Rp.
                    15.000.000 per
                    bulan
                </p>
                <div class="flex items-center gap-2 my-4">
                    <i class="ph-fill ph-paper-plane-right text-blue-600 text-2xl"></i>
                    <span>Lamar Dengan Cepat</span>
                </div>

                <ul class="ps-5 mt-2 space-y-1 list-disc list-inside mb-5">
                    <li>Mengembangkan dan menerapkan pengujian kegunaan</li>
                    <li>Komunikasikan konsep desain yang kompleks dan interaktif dengan jelas dan persuasif</li>
                    <li>Menciptakan antarmuka dan pengalaman yang berpusat pada pengguna dengan mempertimbangkan analisis
                        pasar, data, umpan balik pelanggan, riset pengguna, dan kendala/peluang teknis</li>
                </ul>
                <span>Aktif 2jam lalu</span>
            </div>
        </div>


        <section id="berdasarkan-pencarian" class="hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2 md:grid-cols-2 gap-3">
                <a href="/detail/job" class="border p-8">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="bg-[#fdedf4] w-fit p-2 text-[#9d2b6b] font-semibold rounded-md text-[12px]">
                                dibutuhkan
                                segera</p>
                            <h1 class="font-bold text-[18px] my-3">Lead Graphic Designer - WFH </h1>
                        </div>
                        <div class="text-5xl font-bold">
                            <i class="ph ph-dots-three-vertical"></i>
                        </div>
                    </div>
                    <p class="text-gray-500 font-semibold">Capital Club</p>
                    <p class="text-gray-500 font-semibold">Jakarta</p>
                    <p class="bg-[#d7d6d6] w-fit my-3 p-2 text-[#565656] font-semibold rounded-md">Rp. 4.500.000 – Rp.
                        7.000.000 per
                        bulan
                    </p>
                    <div class="flex items-center gap-2 my-4">
                        <i class="ph-fill ph-paper-plane-right text-blue-600 text-2xl"></i>
                        <span>Lamar Dengan Cepat</span>
                    </div>

                    <ul class="ps-5 mt-2 space-y-1 list-disc list-inside mb-5">
                        <li>Gaji – Rp6.000.000 – Rp11.894.293 per bulan Tergantung Pengalaman.</li>
                        <li>Anda harus menyelesaikan penilaian pra-wawancara singkat sebelum Anda diwawancara.</li>
                        <li>Bersamaan dengan penilaian pra-wawancara, Anda akan diminta untuk mengirimkan video berdurasi 1
                            menit tentang diri Anda yang memperkenalkan diri kepada perusahaan (Rinciannya akan diberikan).
                        </li>
                    </ul>
                    <span>Aktif 2jam lalu</span>
                </a>
            </div>
        </section>
    </section>

    <div class="my-20 flex justify-center">
        <button class="bg-[#fa6601] px-12 py-2 text-white font-semibold rounded-md">Memuat</button>
    </div>

    @if (Auth::check() && Auth::user()->role === 'pelamar' && Auth::user()->pelamars->nama_pelamar == null)
        <script>
            window.onload = function() {
                let intro = introJs();

                intro.setOptions({
                    steps: [{
                            element: '#user-menu-button',
                            intro: `
                        <div style="max-width:180px; text-align:center">
                            <img src="{{ asset('image/Lengkapi Profile.png') }}" 
                                 style="width:100%; border-radius:12px;" />
                        </div>
                    `,
                            position: 'right',
                            tooltipClass: 'notif-profil'
                        },
                        {
                            element: '#btn-profile',
                            intro: `
                        <div style="max-width:180px; text-align:center">
                            <img src="{{ asset('image/Klik Profil.png') }}" 
                                 style="width:100%; border-radius:12px;" />
                        </div>
                    `,
                            position: 'right',
                            tooltipClass: 'notif-profil'
                        }
                    ],
                    showButtons: false,
                    showBullets: false,
                    showProgress: false,
                    exitOnOverlayClick: false,
                    showStepNumbers: false,
                    disableInteraction: false
                });

                intro.onafterchange(function(targetElement) {
                    if (targetElement.id === "btn-profile") {
                        document.querySelector('#user-menu')?.classList.remove('hidden');
                    }
                });

                document.querySelector('#user-menu-button').addEventListener('click', () => {
                    intro.nextStep();
                });

                document.querySelector('#btn-profile').addEventListener('click', () => {
                    intro.exit();
                });

                intro.start();
            };
        </script>
    @endif
@endsection
