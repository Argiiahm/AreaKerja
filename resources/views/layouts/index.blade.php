<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AreaKerja.com</title>
    <link rel="shortcut icon" href="{{ asset('image/logo-areakerja.png') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite('resources/css/app.css')


    @vite('resources/css/app.css')

    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
        }

        /* Intro.js Custom Styling */
        .notif-profil {
            margin: 0 !important;
            padding: 0 !important;
            border-radius: 12px !important;
            background: transparent !important;
            border: 0 !important;
            box-shadow: none !important;
        }

        .notif-profil .introjs-skipbutton,
        .notif-profil .introjs-arrow {
            display: none !important;
        }

        .notif-profil.introjs-tooltip {
            transform: translateY(-25px) !important;
        }

        .introjs-overlay,
        .introjs-helperLayer {
            pointer-events: none !important;
        }

        .introjs-overlay {
            background: rgba(0, 0, 0, 0.3) !important;
        }

        .introjs-tooltip {
            z-index: 100000 !important;
            pointer-events: auto !important;
            background-clip: padding-box;
            box-shadow: none !important;
            filter: none !important;
        }

        .introjs-tooltip:before,
        .introjs-tooltip:after {
            box-shadow: none !important;
            background: transparent !important;
        }

        /* Profile & Modal */
        .profile-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            cursor: pointer;
            object-fit: cover;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            justify-content: center;
            align-items: center;
        }

        .modal img {
            max-width: 90%;
            max-height: 90%;
        }

        /* Responsive Mobile */
        @media (max-width: 767px) {
            .introjs-tooltip {
                max-width: calc(100vw - 32px) !important;
                min-width: 220px !important;
                left: 50% !important;
                transform: translateX(-50%) !important;
            }

            .notif-profil.introjs-tooltip {
                transform: translateX(-50%) !important;
                left: 50% !important;
            }

            .introjs-tooltip img {
                max-width: 100% !important;
                height: auto !important;
            }

            .introjs-helperLayer {
                border-radius: 50% !important;
            }
        }
    </style>
</head>

<body>

    {{-- Includes Modals --}}
    @include('Popup.pop-up_logout')
    @include('Modals.tambah-organisasi')
    @include('Modals.detail-modal-organisasi')
    @include('Modals.tambah-pengalaman_kerja')
    @include('Modals.detail-modal-pengalaman_kerja')
    @include('Modals.tambah-skill')
    @include('Modals.detail-modal-skill')
    @include('Modals.tambah_riwayat_pendidikan')
    @include('Modals.detail-modal-pendidikan')

    {{-- Navigation --}}
    <nav class="bg-white fixed w-full z-20 top-0 start-0 border-b border-gray-200">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <div class="flex items-center gap-2">
                <img src="{{ asset('image/logo-areakerja.png') }}" class="w-20 h-20" alt="Logo">
                <span class="self-center text-2xl font-bold text-[#fa6601]">areakerja.com</span>
            </div>

            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <div class="hidden lg:flex md:flex items-center gap-8">

                    <button type="button" id="notifikasi" data-dropdown-toggle="notif" class="relative">
                        <i class="ph-fill text-[#fa6601] ph-bell text-3xl"></i>
                        @if (Auth::check() && Auth::user()->role === 'pelamar')
                            @php
                                $user = Auth::user();
                                $unread = $Pesan->where('status', '!=', 'pending')->where('is_read', 0)->count();
                                $unreadPerusahaan = $PesanPerusahaan
                                    ->where('status', 'pending')
                                    ->where('pelamar_id', $user->pelamars->id)
                                    ->where('is_read', 0)
                                    ->count();
                                $totalUnread = $unread + $unreadPerusahaan;
                            @endphp
                            @if ($totalUnread > 0)
                                <span
                                    class="absolute top-0 right-0 block h-2 w-2 rounded-full ring-2 ring-white bg-red-600"></span>
                            @endif
                        @elseif (Auth::check() && Auth::user()->role === 'perusahaan')
                            @foreach ($PesanPerusahaan as $pp)
                                @if ($pp->status !== 'pending' && $pp->is_read === 0)
                                    <span
                                        class="absolute top-0 right-0 block h-2 w-2 rounded-full ring-2 ring-white bg-red-600"></span>
                                @endif
                            @endforeach
                        @endif
                    </button>

                    <div id="notif"
                        class="z-50 hidden my-4 w-96 text-base bg-white divide-y divide-gray-100 rounded-lg shadow-lg">
                        <div class="flex items-center justify-between px-4 py-3">
                            <span class="block text-sm font-semibold text-gray-900">Notifikasi</span>
                            <a href="#" class="text-sm font-medium text-orange-500 hover:underline">Lihat
                                Semua</a>
                        </div>
                        <ul class="max-h-80 mx-2 overflow-y-auto">
                            @if (Auth::check())
                                @include('partials.notification_list')
                            @else
                                <li class="px-4 py-6 text-center text-sm text-gray-500">Belum ada notifikasi.</li>
                            @endif
                        </ul>
                    </div>

                    @if (Auth::check())
                        <button type="button" id="user-menu-button" data-dropdown-toggle="user-dropdown">
                            @if (Auth::user()->role == 'pelamar')
                                @if (Auth::user()->pelamars->img_profile)
                                    <img class="w-10 h-10 object-cover rounded-full"
                                        src="{{ asset('storage/' . Auth::user()->pelamars->img_profile) }}">
                                @else
                                    <img class="w-10 h-10 rounded-full"
                                        src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128">
                                @endif
                            @elseif (Auth::user()->role == 'perusahaan')
                                <span
                                    class="flex justify-center bg-orange-500 px-4 py-2 text-white mx-5 my-3 rounded-md">
                                    {{ Auth::user()->username }}
                                </span>
                            @else
                                <img class="w-10 h-10 rounded-full"
                                    src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128">
                            @endif
                        </button>

                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-lg"
                            id="user-dropdown">
                            @if (Auth::user()->role == 'superadmin')
                                <div class="flex items-center gap-2 mx-3">
                                    <img class="w-10 h-10 rounded-full"
                                        src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128">
                                    <div class="px-4 py-3">
                                        <span class="block text-sm text-gray-900">{{ Auth::user()->username }}</span>
                                        <span
                                            class="block text-sm text-gray-500 truncate">{{ Auth::user()->email }}</span>
                                    </div>
                                </div>
                                <ul class="py-2">
                                    <li class="px-3">SuperAdmin</li>
                                    <li><a href="/dashboard/superadmin"
                                            class="block px-4 py-2 text-sm underline">Dashboard</a></li>
                                    <li
                                        class="flex justify-center bg-orange-500 px-4 py-1 text-white mx-5 my-3 rounded-md">
                                        <button data-modal-target="popup-modal-logout"
                                            data-modal-toggle="popup-modal-logout" type="button">Keluar</button>
                                    </li>
                                </ul>
                            @elseif (Auth::user()->role == 'finance')
                                <div class="flex items-center gap-2 mx-3">
                                    <img class="w-10 h-10 rounded-full"
                                        src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128">
                                    <div class="px-4 py-3">
                                        <span class="block text-sm text-gray-900">{{ Auth::user()->username }}</span>
                                        <span
                                            class="block text-sm text-gray-500 truncate">{{ Auth::user()->email }}</span>
                                    </div>
                                </div>
                                <ul class="py-2">
                                    <li class="px-3">Finance</li>
                                    <li><a href="/dashboard/finance"
                                            class="block px-4 py-2 text-sm underline">Dashboard</a></li>
                                    <li
                                        class="flex justify-center bg-orange-500 px-4 py-1 text-white mx-5 my-3 rounded-md">
                                        <button data-modal-target="popup-modal-logout"
                                            data-modal-toggle="popup-modal-logout" type="button">Keluar</button>
                                    </li>
                                </ul>
                            @elseif (Auth::user()->role == 'admin')
                                <div class="flex items-center gap-2 mx-3">
                                    <img class="w-10 h-10 rounded-full"
                                        src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128">
                                    <div class="px-4 py-3">
                                        <span class="block text-sm text-gray-900">{{ Auth::user()->username }}</span>
                                        <span
                                            class="block text-sm text-gray-500 truncate">{{ Auth::user()->email }}</span>
                                    </div>
                                </div>
                                <ul class="py-2">
                                    <li class="px-3">Admin</li>
                                    <li><a href="/dashboard/admin"
                                            class="block px-4 py-2 text-sm underline">Dashboard</a></li>
                                    <li
                                        class="flex justify-center bg-orange-500 px-4 py-1 text-white mx-5 my-3 rounded-md">
                                        <button data-modal-target="popup-modal-logout"
                                            data-modal-toggle="popup-modal-logout" type="button">Keluar</button>
                                    </li>
                                </ul>
                            @elseif (Auth::user()->role == 'perusahaan')
                                <div class="flex items-center gap-2 mx-3">
                                    @if (Auth::user()->perusahaan->img_profile)
                                        <img class="w-10 h-10 object-cover rounded-full"
                                            src="{{ asset('storage/' . Auth::user()->perusahaan->img_profile) }}">
                                    @else
                                        <img class="w-10 h-10 rounded-full"
                                            src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128">
                                    @endif
                                    <div class="px-4 py-3">
                                        <span class="block text-sm text-gray-900">{{ Auth::user()->username }}</span>
                                        <span
                                            class="block text-sm text-gray-500 truncate">{{ Auth::user()->email }}</span>
                                    </div>
                                </div>
                                <ul class="py-2">
                                    <li><a href="/dashboard/perusahaan/profile"
                                            class="block px-4 py-2 text-sm">Profile Perusahaan</a></li>
                                    <li><a href="/dashboard/perusahaan" class="block px-4 py-2 text-sm">Dashboard
                                            Perusahaan</a></li>
                                    <li><a href="/koin/areakerja" class="block px-4 py-2 text-sm">Koin Area Kerja</a>
                                    </li>
                                    <li><a href="/dashboard/perusahaan/kandidat"
                                            class="block px-4 py-2 text-sm">Kandidat Saya</a></li>
                                    <li><a href="/dashboard/perusahaan/pengaturan"
                                            class="block px-4 py-2 text-sm">Pengaturan</a></li>
                                    <li
                                        class="flex justify-center bg-orange-500 px-4 py-1 text-white mx-5 my-3 rounded-md">
                                        <button data-modal-target="popup-modal-logout"
                                            data-modal-toggle="popup-modal-logout" type="button">Keluar</button>
                                    </li>
                                </ul>
                            @else
                                {{-- Role Pelamar/Lainnya --}}
                                <div class="flex items-center gap-2 mx-3">
                                    @if (Auth::user()->role == 'pelamar' && Auth::user()->pelamars->img_profile)
                                        <img class="w-10 h-10 object-cover rounded-full"
                                            src="{{ asset('storage/' . Auth::user()->pelamars->img_profile) }}">
                                    @else
                                        <img class="w-10 h-10 rounded-full"
                                            src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128">
                                    @endif
                                    <div class="px-4 py-3">
                                        <span class="block text-sm text-gray-900">{{ Auth::user()->username }}</span>
                                        <span
                                            class="block text-sm text-gray-500 truncate">{{ Auth::user()->email }}</span>
                                    </div>
                                </div>
                                <ul class="py-2">
                                    @if (Auth::user()->pelamars->kategori === 'kandidat aktif' || Auth::user()->pelamars->kategori === 'calon kandidat')
                                        <li class="flex items-center justify-center">
                                            <img src="{{ asset('image/Kandidat.png') }}" alt="">
                                            <a href="/profile"
                                                class="block px-4 py-2 text-sm text-center">Kandidat</a>
                                        </li>
                                    @else
                                        <li><a href="/profile" class="block px-4 py-2 text-sm">Profile</a></li>
                                    @endif
                                    <li><a href="/lowongan/tersimpan" class="block px-4 py-2 text-sm">Lowongan
                                            Tersimpan</a></li>
                                    @if (Auth::user()->role === 'pelamar')
                                        <li><a href="/transaksi/pelamar" class="block px-4 py-2 text-sm">Transaksi</a>
                                        </li>
                                    @endif
                                    <li><a href="/bantuan" class="block px-4 py-2 text-sm">Bantuan</a></li>
                                    <li
                                        class="flex justify-center bg-orange-500 px-4 py-1 text-white mx-5 my-3 rounded-md">
                                        <button data-modal-target="popup-modal-logout"
                                            data-modal-toggle="popup-modal-logout" type="button">Keluar</button>
                                    </li>
                                </ul>
                            @endif
                        </div>
                    @else
                        <a href="/login"
                            class="text-white bg-[#fa6601] px-10 py-2 rounded-lg cursor-pointer">Masuk</a>
                    @endif
                </div>

                <button data-collapse-toggle="navbar-sticky" type="button"
                    class="md:hidden inline-flex items-center p-2 text-gray-500">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>

            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium md:flex-row md:mt-0 md:border-0">
                    @if (Auth::check() && Auth::user()->role == 'perusahaan')
                        <li><a href="{{ Auth::user()->perusahaan->is_berlangganan ? '/dashboard/perusahaan/berlangganan/kandidat' : '/dashboard/perusahaan/berlangganan' }}"
                                class="block py-2 px-3 text-[#fa6601] {{ Request::is('dashboard/perusahaan/berlangganan') ? 'opacity-30' : '' }} font-semibold">Beranda</a>
                        </li>
                        <li><a href="/talenthunter"
                                class="block py-2 px-3 text-[#fa6601] {{ Request::is('talenthunter') ? 'opacity-30' : '' }} font-semibold">Talent
                                Hunter</a></li>
                        <li><a href="/dashboard/perusahaan/kandidatak"
                                class="block py-2 px-3 text-[#fa6601] {{ Request::is('dashboard/perusahaan/kandidatak') ? 'opacity-30' : '' }} font-semibold">Kandidat</a>
                        </li>
                        <li><a href="/pasanglowongan"
                                class="block py-2 px-3 text-[#fa6601] {{ Request::is('pasanglowongan') ? 'opacity-30' : '' }} font-semibold">Pasang
                                Lowongan</a></li>
                        <li><a href="/dashboard/perusahaan/event"
                                class="block py-2 px-3 text-[#fa6601] {{ Request::is('dashboard/perusahaan/event') ? 'opacity-30' : '' }} font-semibold">Event</a>
                        </li>
                    @else
                        <li><a href="/"
                                class="block py-2 px-3 text-[#fa6601] font-semibold {{ Request::is('/') ? 'opacity-30' : '' }}">Beranda</a>
                        </li>
                        <li><a href="/talenthunter"
                                class="block py-2 px-3 text-[#fa6601] font-semibold {{ Request::is('talenthunter') ? 'opacity-30' : '' }}">Talent
                                Hunter</a></li>
                        <li><a href="/tipskerja"
                                class="block py-2 px-3 text-[#fa6601] font-semibold {{ Request::is('tipskerja') ? 'opacity-30' : '' }}">Tips
                                Kerja</a></li>
                        @if (Auth::check() &&
                                Auth::user()->role === 'pelamar' &&
                                (Auth::user()->pelamars->kategori === 'kandidat aktif' || Auth::user()->pelamars->kategori == 'calon kandidat'))
                            <li><a href="/kandidat/kosong" class="block py-2 px-3 text-[#fa6601] font-semibold">Rekrut
                                    Saya</a></li>
                        @else
                            <li><a href="/daftarkandidat"
                                    class="block py-2 px-3 text-[#fa6601] {{ Request::is('daftarkandidat') ? 'opacity-30' : '' }} font-semibold">Daftar
                                    Kandidat</a></li>
                        @endif
                        <li><a href="/pasanglowongan"
                                class="block py-2 px-3 text-[#fa6601] {{ Request::is('pasanglowongan') ? 'opacity-30' : '' }} font-semibold">Pasang
                                Lowongan</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    {{-- Event Modal --}}
    @if (Auth::check() && session('show_event_modal') && session('latest_event'))
        @php $event = session('latest_event'); @endphp
        <div id="eventModal" class="fixed inset-0 bg-black/65 bg-opacity-50 flex items-center justify-center z-50 px-4">
            <div class="bg-white shadow-xl w-3/4 lg:w-3/5 p-6 rounded-xl">
                <h1 class="text-4xl text-gray-500 font-bold border-b-2 py-3">🎉 Event Untukmu!</h1>
                <div class="overflow-y-auto max-h-[60vh] mt-4">
                    <img src="{{ asset('storage/' . $event->image) }}" class="w-full rounded-xl shadow mb-4">
                    <h2 class="text-2xl text-gray-700 font-bold mb-2">{{ $event->title }}</h2>
                    <p>{!! $event->content !!}</p>
                </div>
                <div class="mt-6 text-right">
                    <button onclick="this.closest('#eventModal').remove()"
                        class="px-5 py-2 bg-blue-600 text-white rounded-lg">Tutup</button>
                </div>
            </div>
        </div>
    @endif

    {{-- Footer --}}
    <footer class="bg-orange-500 text-white py-10 mt-52">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <img class="w-20 h-20" src="{{ asset('image/logo_area_kerja_putih.png') }}" alt="Logo">
                <p class="mt-3 text-sm">Lamar Pekerjaan Kamu – Dengan waktu dan langkah yang cepat</p>
            </div>
            <div>
                <h3 class="font-bold mb-3">Kategori</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="/" class="hover:underline">Beranda</a></li>
                    <li><a href="/tipskerja" class="hover:underline">Tips Kerja</a></li>
                    <li><a href="/pasanglowongan" class="hover:underline">Pasang Lowongan</a></li>
                </ul>
            </div>
            <div>
                <h3 class="font-bold mb-3">Kontak Kami</h3>
                <form class="flex">
                    <input type="email" placeholder="Email address"
                        class="px-3 py-2 w-full rounded-l-md text-gray-800" />
                    <button class="bg-black px-4 py-2 rounded-r-md text-white">Submit</button>
                </form>
            </div>
        </div>
        <div
            class="border-t border-orange-400 mt-8 pt-6 flex flex-col md:flex-row items-center justify-between px-6 max-w-7xl mx-auto text-sm">
            <p>Get ease in applying for your dream job</p>
            <div class="flex gap-3 my-4 md:my-0">
                <a href="#" class="p-2 border border-orange-200 rounded"><i
                        class="ph ph-facebook-logo"></i></a>
                <a href="#" class="p-2 border border-orange-200 rounded"><i
                        class="ph ph-instagram-logo"></i></a>
                <a href="#" class="p-2 border border-orange-200 rounded"><i
                        class="ph ph-linkedin-logo"></i></a>
            </div>
            <p>Copyright © 2024 areakerja.com</p>
        </div>
    </footer>

    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
