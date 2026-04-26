@extends('layouts.index')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-8 mt-24">

        {{-- Profile Incomplete Warning --}}
        @if(!$isProfileComplete)
            <div class="mb-6 p-4 bg-amber-50 border border-amber-300 rounded-xl flex items-start gap-3">
                <div class="flex-shrink-0 w-10 h-10 bg-amber-100 rounded-lg flex items-center justify-center">
                    <i class="ph ph-warning text-xl text-amber-600"></i>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-amber-800">Profile Belum Lengkap</h4>
                    <p class="text-sm text-amber-700 mt-0.5">Lengkapi profile perusahaan Anda untuk dapat membuat lowongan. Data yang belum lengkap: <strong>{{ implode(', ', $missingFields) }}</strong></p>
                    <a href="/dashboard/perusahaan/edit/profile" class="inline-flex items-center gap-1.5 mt-2 text-sm font-semibold text-amber-700 hover:text-amber-900 transition-colors">
                        <i class="ph ph-pencil-simple"></i> Lengkapi Profile Sekarang
                    </a>
                </div>
            </div>
        @endif

        @if(session('profile_warning'))
            <div class="mb-6 p-4 bg-red-50 border border-red-300 rounded-xl flex items-start gap-3">
                <div class="flex-shrink-0 w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                    <i class="ph ph-warning-circle text-xl text-red-600"></i>
                </div>
                <div>
                    <p class="text-sm text-red-700">{{ session('profile_warning') }}</p>
                    <a href="/dashboard/perusahaan/edit/profile" class="inline-flex items-center gap-1.5 mt-2 text-sm font-semibold text-red-700 hover:text-red-900 transition-colors">
                        <i class="ph ph-pencil-simple"></i> Lengkapi Profile Sekarang
                    </a>
                </div>
            </div>
        @endif

        {{-- Company Profile Section --}}
        <div class="flex flex-col md:flex-row items-start md:items-center gap-4 py-5 border-b border-gray-200 mb-8">
            <div
                class="flex-shrink-0 w-24 h-24 sm:w-32 sm:h-32 flex items-center justify-center rounded-lg overflow-hidden border border-gray-200">
                @if (Auth::user()->perusahaan->img_profile)
                    <img class="object-contain w-full h-full"
                        src="{{ asset('storage/' . Auth::user()->perusahaan->img_profile) }}" alt="Company Logo">
                @else
                    <img class="w-full h-full object-cover p-4"
                        src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                        alt="Placeholder Avatar">
                @endif
            </div>
            <div class="flex-grow">
                <h2 class="text-xl font-bold text-gray-900">{{ Auth::user()->perusahaan->nama_perusahaan }}</h2>
                <p class="text-gray-600 text-sm mt-1">{{ Auth::user()->perusahaan->deskripsi }}</p>
                <p class="text-gray-400 text-xs mt-1">
                    <i class="ph ph-map-pin inline-block mr-1"></i>
                    {{ optional(Auth::user()->perusahaan->alamatperusahaan()->latest()->first())->detail ?? 'Alamat belum diatur' }}
                </p>
            </div>
            @if($isProfileComplete)
                <a href="/dashboard/perusahaan/isi/lowongan"
                    class="ml-auto w-10 h-10 border border-orange-500 rounded-md flex items-center justify-center text-orange-500 hover:bg-orange-50 transition-colors duration-200 flex-shrink-0"
                    title="Buat Lowongan Baru">
                    <i class="ph ph-plus text-xl"></i>
                </a>
            @else
                <div class="ml-auto relative group flex-shrink-0">
                    <button disabled
                        class="w-10 h-10 border border-gray-300 rounded-md flex items-center justify-center text-gray-400 bg-gray-100 cursor-not-allowed">
                        <i class="ph ph-warning text-xl text-amber-500"></i>
                    </button>
                    <div class="absolute right-0 top-full mt-2 w-64 bg-gray-900 text-white text-xs rounded-lg p-3 hidden group-hover:block z-50 shadow-lg">
                        <p class="font-semibold mb-1"><i class="ph ph-warning text-amber-400 mr-1"></i> Profile Belum Lengkap</p>
                        <p>Lengkapi profile perusahaan untuk membuat lowongan.</p>
                        <div class="absolute -top-1 right-4 w-2 h-2 bg-gray-900 rotate-45"></div>
                    </div>
                </div>
            @endif
        </div>

        {{-- Lowongan Section --}}
        <div> {{-- Removed x-data here --}}
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 mb-6">
                <h3 class="text-xl font-semibold text-gray-900">Daftar Lowongan</h3>
                <div class="flex gap-2 flex-wrap">
                    <select id="paketFilter"
                        class="border border-gray-300 rounded-md px-4 py-2 text-sm focus:ring-orange-500 focus:border-orange-500">
                        <option value="">Semua Paket</option>
                        @foreach ($Pakets->whereIn('id', [1, 2, 3]) as $pkt)
                            <option value="{{ $pkt->id }}">{{ $pkt->nama }}</option>
                        @endforeach
                    </select>

                    <select id="jenisFilter"
                        class="border border-gray-300 rounded-md px-4 py-2 text-sm focus:ring-orange-500 focus:border-orange-500">
                        <option value="">Semua Jenis</option>
                        <option value="fulltime">Fulltime</option>
                        <option value="middle">Middle</option>
                        <option value="part-time">Part-time</option>
                        <option value="freelance">Freelance</option>
                    </select>
                </div>
            </div>

            @if ($Data->count() > 0)
                <div class="grid gap-6" id="lowonganList">
                    @forelse ($Data as $d)
                        <div class="lowongan-item" data-paket-id="{{ $d->paket_id }}" data-jenis="{{ $d->jenis }}">
                            @if ($d->paket_id)
                                <a href="/dashboard/perusahaan/lowongan/detail/{{ $d->slug }}"
                                    class="block p-4 sm:p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow duration-200">
                                    <div class="flex flex-col sm:flex-row gap-4 sm:gap-6">
                                        <div
                                            class="flex-shrink-0 w-20 h-20 sm:w-28 sm:h-28 flex items-center justify-center rounded-lg overflow-hidden border border-gray-200">
                                            @if ($d->perusahaan->img_profile)
                                                <img class="object-contain w-full h-full"
                                                    src="{{ asset('storage/' . $d->perusahaan->img_profile) }}"
                                                    alt="Company Logo">
                                            @else
                                                <img class="w-full h-full object-cover p-2"
                                                    src="https://ui-avatars.com/api/?name={{ urlencode($d->perusahaan->nama_perusahaan) }}&background=random&color=fff&size=128"
                                                    alt="Placeholder Avatar">
                                            @endif
                                        </div>
                                        <div class="flex-grow">
                                            <p class="text-sm text-gray-600">{{ $d->perusahaan->nama_perusahaan }}</p>
                                            <h1 class="text-lg font-semibold text-gray-900 mt-1">{{ $d->nama }} -
                                                {{ ucfirst($d->jenis) }}</h1>
                                            <p class="text-sm text-gray-500 mt-1"><i
                                                    class="ph ph-map-pin inline-block mr-1"></i> {{ $d->alamat }}</p>

                                            <div
                                                class="mt-4 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
                                                <span
                                                    class="inline-block px-3 py-1.5 bg-gray-100 text-gray-700 text-sm font-medium rounded-md">
                                                    Rp {{ number_format((float)$d->gaji_awal, 0, ',', '.') }} - Rp
                                                    {{ number_format((float)$d->gaji_akhir, 0, ',', '.') }}
                                                </span>
                                                <span class="countdown text-red-600 text-sm font-medium"
                                                    data-expired="{{ $d->expired_date }}"></span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @else
                                {{-- Non-Published Card --}}
                               <div class="p-4 sm:p-6 bg-yellow-50 rounded-xl shadow-md border border-yellow-200">
    
                                <!-- BAGIAN LINK (klik ke detail) -->
                                <a href="/dashboard/perusahaan/lowongan/detail/{{ $d->slug }}">
                                    <h3 class="font-semibold text-lg text-orange-600 mb-4">
                                        Lowongan Belum Dipublikasikan
                                    </h3>

                                    <div class="flex flex-col sm:flex-row gap-4 sm:gap-6">
                                        <div class="flex-shrink-0 w-20 h-20 sm:w-24 sm:h-24 flex items-center justify-center rounded-lg overflow-hidden border border-gray-200">
                                            @if ($d->perusahaan->img_profile)
                                                <img class="object-contain w-full h-full"
                                                    src="{{ asset('storage/' . $d->perusahaan->img_profile) }}">
                                            @else
                                                <img class="w-full h-full object-cover p-2"
                                                    src="https://ui-avatars.com/api/?name={{ urlencode($d->perusahaan->nama_perusahaan) }}">
                                            @endif
                                        </div>

                                        <div class="flex-grow">
                                            <p class="text-sm text-gray-600">
                                                {{ Auth::user()->perusahaan->nama_perusahaan }}
                                            </p>

                                            <h1 class="text-lg font-semibold text-gray-900 mt-1">
                                                {{ $d->nama }} - {{ ucfirst($d->jenis) }}
                                            </h1>

                                            <p class="text-sm text-gray-500 mt-1">
                                                {{ $d->alamat }}
                                            </p>

                                            <div class="mt-4">
                                                <span class="inline-block px-3 py-1.5 bg-gray-100 text-gray-700 text-sm font-medium rounded-md">
                                                    Rp {{ number_format((float)$d->gaji_awal, 0, ',', '.') }} -
                                                    Rp {{ number_format((float)$d->gaji_akhir, 0, ',', '.') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <!-- TOMBOL PUBLISH  -->
                                <div class="mt-4 flex justify-end">
                                    <a href="/pasanglowongan"
                                        class="bg-orange-500 px-6 py-2 rounded-md text-white hover:bg-orange-600 text-sm">
                                        Publish
                                    </a>
                                </div>
                            @endif
                        </div>
                    @empty
                        {{-- Initial empty state when no jobs are posted yet --}}
                        <div id="initial-empty-state"
                            class="border border-gray-200 rounded-xl p-6 min-h-[250px] flex flex-col items-center justify-center text-gray-500">
                            <i class="ph ph-file text-4xl mb-2"></i>
                            <p class="text-sm">Anda belum memposting lowongan apapun.</p>
                            @if($isProfileComplete)
                                <a href="/dashboard/perusahaan/isi/lowongan"
                                    class="mt-4 inline-flex items-center gap-2 px-4 py-2 bg-orange-500 text-white rounded-md hover:bg-orange-600 transition-colors duration-200">
                                    <i class="ph ph-plus text-lg"></i> Buat Lowongan Pertama Anda
                                </a>
                            @else
                                <div class="relative group mt-4">
                                    <button disabled
                                        class="inline-flex items-center gap-2 px-4 py-2 bg-gray-300 text-gray-500 rounded-md cursor-not-allowed">
                                        <i class="ph ph-warning text-lg text-amber-500"></i> Buat Lowongan Pertama Anda
                                    </button>
                                    <div class="absolute left-1/2 -translate-x-1/2 bottom-full mb-2 w-64 bg-gray-900 text-white text-xs rounded-lg p-3 hidden group-hover:block z-50 shadow-lg">
                                        <p class="font-semibold mb-1"><i class="ph ph-warning text-amber-400 mr-1"></i> Profile Belum Lengkap</p>
                                        <p>Lengkapi profile perusahaan untuk membuat lowongan.</p>
                                        <div class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-2 h-2 bg-gray-900 rotate-45"></div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforelse
                </div>

                {{-- Filtered Empty State (Hidden by default, shown by JS) --}}
                <div id="filtered-empty-state"
                    class="hidden border border-gray-200 rounded-xl p-6 min-h-[200px] flex flex-col items-center justify-center text-gray-500">
                    <i class="ph ph-magnifying-glass text-4xl mb-2"></i>
                    <p class="text-sm">Tidak ada lowongan yang cocok dengan filter Anda.</p>
                </div>
            @else
                {{-- Initial empty state when no jobs are posted yet (outer block) --}}
                <div
                    class="border border-gray-200 rounded-xl p-6 min-h-[250px] flex flex-col items-center justify-center text-gray-500">
                    <i class="ph ph-file text-4xl mb-2"></i>
                    <p class="text-sm">Anda belum memposting lowongan apapun.</p>
                    @if($isProfileComplete)
                        <a href="/dashboard/perusahaan/isi/lowongan"
                            class="mt-4 inline-flex items-center gap-2 px-4 py-2 bg-orange-500 text-white rounded-md hover:bg-orange-600 transition-colors duration-200">
                            <i class="ph ph-plus text-lg"></i> Buat Lowongan Pertama Anda
                        </a>
                    @else
                        <div class="relative group mt-4">
                            <button disabled
                                class="inline-flex items-center gap-2 px-4 py-2 bg-gray-300 text-gray-500 rounded-md cursor-not-allowed">
                                <i class="ph ph-warning text-lg text-amber-500"></i> Buat Lowongan Pertama Anda
                            </button>
                            <div class="absolute left-1/2 -translate-x-1/2 bottom-full mb-2 w-64 bg-gray-900 text-white text-xs rounded-lg p-3 hidden group-hover:block z-50 shadow-lg">
                                <p class="font-semibold mb-1"><i class="ph ph-warning text-amber-400 mr-1"></i> Profile Belum Lengkap</p>
                                <p>Lengkapi profile perusahaan untuk membuat lowongan.</p>
                                <div class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-2 h-2 bg-gray-900 rotate-45"></div>
                            </div>
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </div>

    {{-- Publish Modal (jQuery controlled) --}}
    <div id="publishModal" class="fixed inset-0 bg-black/65 bg-opacity-50 hidden items-center justify-center p-4 z-50">
        <div class="bg-white p-6 rounded-lg shadow-xl w-full max-w-sm relative">
            <h2 class="text-lg font-bold mb-4 text-gray-900">Konfirmasi Publikasi</h2>
            <p class="text-gray-700">Apakah Anda yakin ingin mempublikasikan lowongan ini?</p>

            <div class="mt-6 flex justify-end gap-3">
                <button type="button" id="closeModal"
                    class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition-colors duration-200">Batal</button>
                <a href="#" id="confirmPublishBtn"
                    class="px-4 py-2 bg-orange-500 text-white rounded-md hover:bg-orange-600 transition-colors duration-200">Ya,
                    Publikasikan</a>
            </div>
        </div>
    </div>

    <script>
        function startCountdown(element) {
            const expiredAt = new Date($(element).data('expired')).getTime();

            function updateCountdown() {
                const now = new Date().getTime();
                const dist = expiredAt - now;

                if (dist < 0) {
                    $(element).html("Expired");
                    $(element).removeClass('text-red-600').addClass('text-gray-500');
                    return;
                }

                const d = Math.floor(dist / (1000 * 60 * 60 * 24));
                const h = Math.floor((dist % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const m = Math.floor((dist % (1000 * 60 * 60)) / (1000 * 60));
                const s = Math.floor((dist % (1000 * 60)) / 1000);

                $(element).html(`${d} Hari ${h} Jam ${m} Menit ${s} Detik`);
            }

            updateCountdown();
            setInterval(updateCountdown, 1000);
        }

        $(document).ready(function() {
            // Initialize countdowns
            $('.countdown').each(function() {
                startCountdown(this);
            });

            // Filtering logic
            function applyFilters() {
                const selectedPaket = $('#paketFilter').val();
                const selectedJenis = $('#jenisFilter').val();
                let visibleItemsCount = 0;

                $('.lowongan-item').each(function() {
                    const paketId = $(this).data('paket-id');
                    const jenis = $(this).data('jenis');

                    const isPaketMatch = (selectedPaket === '' || selectedPaket == paketId);
                    const isJenisMatch = (selectedJenis === '' || selectedJenis == jenis);

                    if (isPaketMatch && isJenisMatch) {
                        $(this).show();
                        visibleItemsCount++;
                    } else {
                        $(this).hide();
                    }
                });

                // Handle empty states
                const isAnyFilterActive = (selectedPaket !== '' || selectedJenis !== '');

                if (isAnyFilterActive && visibleItemsCount === 0) {
                    $('#filtered-empty-state').removeClass('hidden').addClass('flex');
                    $('#lowonganList').addClass('hidden'); // Hide the grid container if no items
                } else {
                    $('#filtered-empty-state').removeClass('flex').addClass('hidden');
                    $('#lowonganList').removeClass('hidden'); // Show the grid container
                }

                // If no jobs at all initially, the outer empty state already handles it.
                // We only need to manage the filtered empty state.
            }

            $('#paketFilter, #jenisFilter').on('change', applyFilters);

            // Initial filter application in case of pre-selected options
            applyFilters();

            // Publish Modal Logic
            $('.publish-btn').on('click', function() {
                const lowonganId = $(this).data('id');
                $('#confirmPublishBtn').attr('href', `/pasanglowongan`);
                $('#publishModal').removeClass('hidden').addClass('flex');
            });

            $('#closeModal, #publishModal').on('click', function(e) {
                if (e.target.id === 'closeModal' || e.target.id === 'publishModal') {
                    $('#publishModal').removeClass('flex').addClass('hidden');
                }
            });
            // Stop propagation for modal content click
            $('#publishModal > div').on('click', function(e) {
                e.stopPropagation();
            });
        });
    </script>
@endsection
