@extends('layouts.index')

@section('content')
    <section class="container max-w-screen-lg mx-auto pt-40">
        <form action="/" method="GET">
            <div
                class="flex items-center mx-5 lg:w-full lg:mx-auto md:w-auto p-2 border border-gray-300 rounded-lg shadow-sm">

                <div class="flex items-center flex-1 px-2">
                    <i class="ph ph-magnifying-glass text-zinc-900 text-lg mr-2"></i>
                    <input name="search" type="text" placeholder="Posisi lowongan, kata kunci, ..."
                        class="w-full outline-none border-none placeholder-gray-500 text-gray-700" />
                </div>

                <span class="w-px h-6 bg-gray-300"></span>

                <div class="flex items-center flex-1 px-2">
                    <i class="ph ph-map-pin text-zinc-900 text-lg mr-2"></i>
                    <input name="lokasi" type="text" placeholder="Kota, provinsi, kode pos..."
                        class="w-full outline-none placeholder-gray-500 border-none text-gray-700" />
                </div>

                <button type="submit" class="ml-2 bg-[#fa6601] cursor-pointer text-white font-medium px-4 py-2 rounded-lg">
                    <div class="hidden lg:block md:block">
                        Cari Lowongan Kerja
                    </div>
                    <div class="block lg:hidden md:hidden">
                        Cari
                    </div>
                </button>

            </div>
        </form>


        <div class="flex justify-center my-10 mx-2">
            <p class="text-[#fa6601] font-semibold text-center lg:text-left md:text-left">
                Lamar Pekerjaan Kamu ~
                <span class="font-normal block lg:inline md:inline text-zinc-600">
                    Dengan Waktu Dan Langkah Yang Tepat
                </span>
            </p>
        </div>

        <div>
            <p class="font-medium hidden lg:block md:block text-zinc-600 px-5 lg:px-0">
                KATEGORI PEKERJAAN POPULER
            </p>

            <div class="flex flex-col lg:flex-row md:flex-row gap-4 mx-2 mt-5">

                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-4 gap-2 w-full">
                    <div class="border border-gray-300 py-2 shadow-sm">
                        <p class="text-center text-zinc-500 font-medium text-sm">Teknologi</p>
                    </div>
                    <div class="border border-gray-300 py-2 shadow-sm">
                        <p class="text-center text-zinc-500 font-medium text-sm">Pelayanan</p>
                    </div>
                    <div class="border border-gray-300 py-2 shadow-sm">
                        <p class="text-center text-zinc-500 font-medium text-sm">Administrasi</p>
                    </div>
                    <div class="border border-gray-300 py-2 shadow-sm">
                        <p class="text-center text-zinc-500 font-medium text-sm">Pemasaran</p>
                    </div>
                    <div class="border border-gray-300 py-2 shadow-sm">
                        <p class="text-center text-zinc-500 font-medium text-sm">Pendidik</p>
                    </div>
                    <div class="border border-gray-300 py-2 shadow-sm">
                        <p class="text-center text-zinc-500 font-medium text-sm">Customer Service</p>
                    </div>
                    <div class="border border-gray-300 py-2 shadow-sm">
                        <p class="text-center text-zinc-500 font-medium text-sm">Keuangan</p>
                    </div>
                    <div class="border border-gray-300 py-2 shadow-sm">
                        <p class="text-center text-zinc-500 font-medium text-sm">Kasir</p>
                    </div>
                    <div class="border border-gray-300 py-2 shadow-sm">
                        <p class="text-center text-zinc-500 font-medium text-sm">Admin</p>
                    </div>
                    <div class="border border-gray-300 py-2 shadow-sm">
                        <p class="text-center text-zinc-500 font-medium text-sm">Programmer</p>
                    </div>
                    <div class="border border-gray-300 py-2 shadow-sm">
                        <p class="text-center text-zinc-500 font-medium text-sm">Marketing</p>
                    </div>
                    <div class="border border-gray-300 py-2 shadow-sm">
                        <p class="text-center text-zinc-500 font-medium text-sm">Multimedia</p>
                    </div>
                </div>

                <div class="grid grid-cols-3 md:grid-cols-1 lg:grid-cols-1 gap-2 w-full lg:w-32 md:w-32">
                    <div
                        class="border border-gray-300 border-l-4 border-l-red-600 py-2 flex items-center justify-center gap-1 shadow-sm text-red-600 font-semibold text-sm text-center">
                        <i class="ph ph-fire text-lg"></i>
                        Full Time
                    </div>
                    <div
                        class="border border-gray-300 border-l-4 border-l-sky-500 py-2 flex items-center justify-center gap-1 shadow-sm text-sky-500 font-semibold text-sm text-center">
                        <i class="ph ph-globe text-lg"></i>
                        WFO/WFH
                    </div>
                    <div
                        class="border border-gray-300 border-l-4 border-l-orange-600 py-2 flex items-center justify-center gap-1 shadow-sm text-orange-600 font-semibold text-sm text-center">
                        <i class="ph ph-graduation-cap text-lg"></i>
                        Graduate
                    </div>
                </div>

            </div>
        </div>

    </section>

    <div class="mt-10 flex justify-center gap-10 items-center font-semibold border-b">
        <button id="umpan-lowongan"
            class="border-b-2 border-[#fa6601] text-[13px] lg:text-[16px] text-zinc-500 md:text-[16px] cursor-pointer">
            UMPAN LOWONGAN
        </button>
        <button id="pencarian"
            class="cursor-pointer border-[#fa6601] text-[13px] lg:text-[16px] text-zinc-500 md:text-[16px]">
            PENCARIAN BARU BARU INI
        </button>
    </div>


    <section class="mx-2 lg:mx-0 md:mx-0 px-0 lg:px-20 md:px-20">
        <p class="my-10 font-semibold text-gray-500 text-center lg:text-left md:text-left">
            Lowongan berdasarkan pada aktivitas anda di areakerja
        </p>

        <div id="section-umpan-lowongan" x-data="{ show: 5 }"
            class="relative grid grid-cols-1 lg:grid-cols-2 md:grid-cols-2 gap-3 overflow-visible">
            @forelse ($Data as $d)
                @if ($d->paket_id)
                    <div class="relative border p-8 overflow-visible">

                        <div x-data="{ open: false }" class="absolute top-3 right-3 z-[1]">
                            <button @click="open = !open" class="text-3xl p-1 relative z-[1000]">
                                <i class="ph ph-dots-three-vertical"></i>
                            </button>

                            <div x-show="open" @click.outside="open = false" x-transition
                                class="absolute right-0 mt-2 w-40 bg-white shadow-lg rounded-xl border py-2 z-[1500]">

                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url('/detail/job/' . $d->slug)) }}"
                                    target="_blank" class="flex items-center gap-2 px-3 py-2 hover:bg-gray-100">
                                    <i class="ph ph-linkedin-logo text-xl"></i> <span>LinkedIn</span>
                                </a>

                                <a href="mailto:?subject=Lowongan Kerja&body={{ urlencode(url('/detail/job/' . $d->slug)) }}"
                                    class="flex items-center gap-2 px-3 py-2 hover:bg-gray-100">
                                    <i class="ph ph-envelope-simple text-xl"></i> <span>Gmail</span>
                                </a>

                                <a href="{{ url('/detail/job/' . $d->slug) }}"
                                    class="flex items-center gap-2 px-3 py-2 hover:bg-gray-100">
                                    <i class="ph ph-link text-xl"></i> <span>Website</span>
                                </a>

                                <a href="https://wa.me/?text={{ urlencode(url('/detail/job/' . $d->slug)) }}"
                                    target="_blank" class="flex items-center gap-2 px-3 py-2 hover:bg-gray-100">
                                    <i class="ph ph-whatsapp-logo text-xl"></i> <span>WhatsApp</span>
                                </a>

                            </div>
                        </div>

                        <a href="/detail/job/{{ $d->slug }}" class="block">
                            <div class="flex justify-between items-start pr-12">
                                <div>
                                    <p class="bg-[#fdedf4] w-fit p-2 text-[#9d2b6b] font-semibold rounded-md text-[12px]">
                                        dibutuhkan segera
                                    </p>
                                    <h1 class="font-bold text-[18px] my-3">{{ $d->nama }} - {{ $d->jenis }}</h1>
                                </div>
                            </div>

                            <p class="text-gray-500 font-semibold">{{ $d->perusahaan->nama_perusahaan }}</p>
                            <p class="text-gray-500 font-semibold">{{ $d->alamat }}</p>

                            <p class="bg-[#d7d6d6] w-fit my-3 p-2 text-[#565656] font-semibold rounded-md">
                                Rp{{ number_format($d->gaji_awal) }} – Rp{{ number_format($d->gaji_akhir) }} per bulan
                            </p>

                            <div class="flex items-center gap-2 my-4">
                                <i class="ph-fill ph-paper-plane-right text-blue-600 text-2xl"></i>
                                <span>Lamar Dengan Cepat</span>
                            </div>

                            <ul class="ps-5 mt-2 space-y-1 list-disc list-inside mb-5">
                                <li>Gaji – Rp{{ number_format($d->gaji_awal) }} – Rp{{ number_format($d->gaji_akhir) }}
                                    per bulan.</li>
                                <li>Anda harus menyelesaikan penilaian pra-wawancara singkat sebelum wawancara.</li>
                                <li>Anda akan diminta untuk mengirim video 1 menit untuk memperkenalkan diri.</li>
                            </ul>

                            <span>{{ $d->created_at->diffForHumans() }}</span>
                        </a>

                    </div>
                @endif
            @empty
                <div class="text-center py-10 text-gray-500">
                    Tidak ada lowongan ditemukan.
                </div>
            @endforelse

        </div>
        <section id="berdasarkan-pencarian" x-data="{ show: 5 }" class="hidden mt-10">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-3">

                @forelse ($recentResult as $d)
                    @if ($d->paket_id)
                        <div class="relative border p-8 overflow-visible">

                            <div x-data="{ open: false }" class="absolute top-3 right-3 z-[999]">
                                <button @click="open = !open" class="text-3xl p-1 relative z-[1000]">
                                    <i class="ph ph-dots-three-vertical"></i>
                                </button>

                                <div x-show="open" @click.outside="open = false" x-transition
                                    class="absolute right-0 mt-2 w-40 bg-white shadow-lg rounded-xl border py-2 z-[1500]">

                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url('/detail/job/' . $d->slug)) }}"
                                        target="_blank" class="flex items-center gap-2 px-3 py-2 hover:bg-gray-100">
                                        <i class="ph ph-linkedin-logo text-xl"></i>
                                        <span>LinkedIn</span>
                                    </a>

                                    <a href="mailto:?subject=Lowongan Kerja&body={{ urlencode(url('/detail/job/' . $d->slug)) }}"
                                        class="flex items-center gap-2 px-3 py-2 hover:bg-gray-100">
                                        <i class="ph ph-envelope-simple text-xl"></i>
                                        <span>Gmail</span>
                                    </a>

                                    <a href="{{ url('/detail/job/' . $d->slug) }}"
                                        class="flex items-center gap-2 px-3 py-2 hover:bg-gray-100">
                                        <i class="ph ph-link text-xl"></i>
                                        <span>Website</span>
                                    </a>

                                    <a href="https://wa.me/?text={{ urlencode(url('/detail/job/' . $d->slug)) }}"
                                        target="_blank" class="flex items-center gap-2 px-3 py-2 hover:bg-gray-100">
                                        <i class="ph ph-whatsapp-logo text-xl"></i>
                                        <span>WhatsApp</span>
                                    </a>
                                </div>
                            </div>

                            <a href="/detail/job/{{ $d->slug }}" class="block">
                                <div class="flex justify-between items-start pr-12">
                                    <div>
                                        <p
                                            class="bg-[#fdedf4] w-fit p-2 text-[#9d2b6b] font-semibold rounded-md text-[12px]">
                                            dibutuhkan segera
                                        </p>
                                        <h1 class="font-bold text-[18px] my-3">{{ $d->nama }} - {{ $d->jenis }}
                                        </h1>
                                    </div>
                                </div>

                                <p class="text-gray-500 font-semibold">{{ $d->perusahaan->nama_perusahaan }}</p>
                                <p class="text-gray-500 font-semibold">{{ $d->alamat }}</p>

                                <p class="bg-[#d7d6d6] w-fit my-3 p-2 text-[#565656] font-semibold rounded-md">
                                    Rp{{ number_format($d->gaji_awal) }} – Rp{{ number_format($d->gaji_akhir) }} per bulan
                                </p>

                                <div class="flex items-center gap-2 my-4">
                                    <i class="ph-fill ph-paper-plane-right text-blue-600 text-2xl"></i>
                                    <span>Lamar Dengan Cepat</span>
                                </div>

                                <ul class="ps-5 mt-2 space-y-1 list-disc list-inside mb-5">
                                    <li>Gaji – Rp{{ number_format($d->gaji_awal) }} –
                                        Rp{{ number_format($d->gaji_akhir) }} per bulan.</li>
                                    <li>Anda harus menyelesaikan penilaian pra-wawancara singkat sebelum wawancara.</li>
                                    <li>Anda akan diminta untuk mengirim video 1 menit untuk memperkenalkan diri.</li>
                                </ul>

                                <span>{{ $d->created_at->diffForHumans() }}</span>
                            </a>

                        </div>
                    @endif
                @empty
                    <p class="text-center text-gray-500 col-span-2">
                        Tidak ada lowongan ditemukan berdasarkan pencarian terakhir.
                    </p>
                @endforelse

            </div>
        </section>

    </section>

    <div class="my-20 flex justify-center" x-data="{ total: {{ $Data->count() }} }">
        <button x-show="total > 5" @click="$dispatch('load-more')"
            class="bg-[#fa6601] px-12 py-2 text-white font-semibold rounded-md">
            Memuat
        </button>
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
                                    <img src="{{ asset('image/Lengkapi Profile.png') }}" style="width:100%; border-radius:12px;" />
                                </div>
                            `,
                            position: 'right',
                            tooltipClass: 'notif-profil'
                        },
                        {
                            element: '#btn-profile',
                            intro: `
                                <div style="max-width:180px; text-align:center">
                                    <img src="{{ asset('image/Klik Profil.png') }}" style="width:100%; border-radius:12px;" />
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
