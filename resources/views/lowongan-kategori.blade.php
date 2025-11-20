@extends('layouts.index')

@section('content')
    <section class="mx-2 lg:mx-0 md:mx-0 px-0 lg:px-20 md:px-20 pt-32">
        <p class="my-10 font-semibold text-gray-500 text-center lg:text-left md:text-left">
            Lowongan berdasarkan Kategori: {{ $Kategori->nama }}
        </p>

        <div class="relative grid grid-cols-1 lg:grid-cols-2 md:grid-cols-2 gap-3 overflow-visible">
            @forelse ($Data as $d)
                @if ($d->paket_id && $d->kategori === $Kategori->nama)
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
    </section>


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
