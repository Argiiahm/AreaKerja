<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AreaKerja.com</title>
    <link rel="shortcut icon" href="{{ asset('image/logo-areakerja.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/intro.js/minified/introjs.min.css" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>

    @vite('resources/css/app.css')
</head>
<style>
    html {
        scroll-behavior: smooth;
    }

    .notif-profil {
        margin: 0 !important;
        padding: 0 !important;
        border-radius: 12px !important;
        /* box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15); */
        background: transparent !important;
    }

    .notif-profil .introjs-skipbutton {
        display: none !important;
    }

    .notif-profil .introjs-arrow {
        display: none !important;
    }

    .notif-profil.introjs-tooltip {
        transform: translateY(-25px) !important;
    }

    .introjs-overlay {
        pointer-events: none !important;
        background: rgba(0, 0, 0, 0.3) !important;
    }

    .introjs-helperLayer,
    .introjs-overlay {
        pointer-events: none !important;
    }

    .introjs-tooltip {
        pointer-events: auto !important;
    }

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

    /* gambar di modal */
    .modal img {
        max-width: 90%;
        max-height: 90%;
    }
</style>

<body>

    @include('Popup.pop-up_logout')
    @include('Modals.tambah-organisasi')
    @include('Modals.detail-modal-organisasi')
    @include('Modals.tambah-pengalaman_kerja')
    @include('Modals.detail-modal-pengalaman_kerja')
    @include('Modals.tambah-skill')
    @include('Modals.detail-modal-skill')
    @include('Modals.tambah_riwayat_pendidikan')
    @include('Modals.detail-modal-pendidikan')

    <nav class="bg-white fixed w-full z-20 top-0 start-0 border-b border-gray-200">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <div class="flex items-center gap-2">
                <img src="{{ asset('image/logo-areakerja.png') }}" class="w-20 h-20 " alt="Flowbite Logo">
                <span class="self-center text-2xl font-bold text-[#fa6601]">areakerja.com</span>
            </div>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <div class="hidden lg:flex md:flex items-center gap-8">
                    <button type="button" id="notifikasi" aria-expanded="false" data-dropdown-toggle="notif"
                        data-dropdown-placement="bottom" class="relative">
                        <span class="sr-only">Open notification</span>
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
                                        class="absolute top-0 right-0 block h-2 w-2 rounded-full ring-2 ring-white bg-red-600">
                                    </span>
                                @endif
                            @endforeach
                        @endif
                    </button>


                    {{-- Alert --}}
                    @if (Auth::check() && Auth::user()->role === 'pelamar')
                        <div id="notif"
                            class="z-50 hidden my-4 w-96 text-base bg-white divide-y divide-gray-100 rounded-lg shadow-lg">
                            <div class="flex items-center justify-between px-4 py-3">
                                <span class="block text-sm font-semibold text-gray-900">Notifikasi</span>
                                <a href="#" class="text-sm font-medium text-orange-500 hover:underline">Lihat
                                    Semua</a>
                            </div>
                            <ul class="max-h-80 mx-2 overflow-y-auto">
                                @if ($Pesan->isNotEmpty() || $PesanPerusahaan->isNotEmpty())

                                    @foreach ($Pesan as $p)
                                        @if ($p->status !== 'pending' && $p->pelamar_id === Auth::user()->pelamars->id)
                                            @php
                                                $lowongan = \App\Models\LowonganPerusahaan::find($p->lowongan_id);
                                            @endphp
                                            <li
                                                class="px-4 py-3 {{ $p->is_read === 0 ? 'bg-gray-200' : 'border-zinc-300' }} hover:bg-gray-50 transition">
                                                <form action="/detail/notif/read/{{ $p->id }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="text-left ">
                                                        <div class="flex items-start gap-3">
                                                            <img class="w-10 h-10 rounded-full object-cover"
                                                                src="{{ asset('storage/' . $lowongan->perusahaan->img_profile) }}"
                                                                alt="Logo {{ $lowongan->perusahaan->nama_perusahaan }}">
                                                            <div class="flex-1">
                                                                @if ($p->status === 'diterima')
                                                                    <p class="text-sm text-gray-700">
                                                                        <span
                                                                            class="font-medium text-gray-900">Selamat!</span>
                                                                        Lamaran Anda ke
                                                                        <span
                                                                            class="font-semibold">{{ $lowongan->perusahaan->nama_perusahaan }}</span>
                                                                        divisi <span
                                                                            class="font-semibold">{{ $lowongan->nama }}</span>
                                                                        <span
                                                                            class="text-green-600 font-medium">{{ $p->status }}</span>.
                                                                    </p>
                                                                @elseif ($p->status === 'ditolak')
                                                                    <p class="text-sm text-gray-700">
                                                                        <span class="font-medium text-gray-900">Mohon
                                                                            Maaf!</span>
                                                                        Lamaran Anda ke
                                                                        <span
                                                                            class="font-semibold">{{ $lowongan->perusahaan->nama_perusahaan }}</span>
                                                                        divisi <span
                                                                            class="font-semibold">{{ $lowongan->nama }}</span>
                                                                        <span class="text-red-600 font-medium">Belum
                                                                            Bisa Kami Terima</span>.
                                                                    </p>
                                                                @endif
                                                                <span class="text-xs text-gray-400">
                                                                    {{ $p->updated_at->diffForHumans() }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </button>
                                                </form>
                                            </li>
                                        @endif
                                    @endforeach
                                    @if (Auth::user()->pelamars->kategori === 'kandidat aktif')
                                        @foreach ($PesanPerusahaan as $pp)
                                            @if ($pp->status === 'pending' && $pp->pelamar_id === Auth::user()->pelamars->id)
                                                @php
                                                    $lowongan = \App\Models\LowonganPerusahaan::find($pp->lowongan_id);
                                                @endphp
                                                <li
                                                    class="px-4 py-3 {{ $pp->is_read === 0 ? 'bg-gray-200' : 'border-zinc-300' }} hover:bg-gray-50 transition">
                                                    <button type="submit" class="text-left"
                                                        onclick="window.location='/kandidat/rekrut'">
                                                        <div class="flex items-start gap-3">
                                                            <img class="w-10 h-10 rounded-full object-cover"
                                                                src="{{ asset('storage/' . $lowongan->perusahaan->img_profile) }}"
                                                                alt="Logo {{ $lowongan->perusahaan->nama_perusahaan }}">
                                                            <div class="flex-1">
                                                                <p class="text-sm text-gray-700">
                                                                    <span
                                                                        class="font-medium text-gray-900">Selamat!</span>
                                                                    Anda telah di rekrut oleh perusahaan
                                                                    <span
                                                                        class="font-semibold">{{ $lowongan->perusahaan->nama_perusahaan }}</span>
                                                                    dan akan di tempatkan di bagian <span
                                                                        class="font-semibold">{{ $lowongan->nama }}
                                                                    </span>
                                                                </p>
                                                                <span class="text-xs text-gray-400">
                                                                    {{ $pp->updated_at->diffForHumans() }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </button>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                    <div class="flex items-center justify-end px-5 pb-3 gap-2 mt-2">
                                        <i class="ph ph-checks text-blue-500 font-bold text-lg"></i>
                                        <button class="text-xs font-semibold text-gray-600 hover:text-blue-600">
                                            Tandai Baca
                                        </button>
                                    </div>
                                @else
                                    <li class="px-4 py-6 text-center text-sm text-gray-500">
                                        Belum ada notifikasi.
                                    </li>
                                @endif
                            </ul>

                        </div>
                    @elseif (Auth::check() && Auth::user()->role === 'perusahaan')
                        <div id="notif"
                            class="z-50 hidden my-4 w-96 text-base bg-white divide-y divide-gray-100 rounded-lg shadow-lg">
                            <div class="flex items-center justify-between px-4 py-3">
                                <span class="block text-sm font-semibold text-gray-900">Notifikasi</span>
                                <a href="#" class="text-sm font-medium text-orange-500 hover:underline">Lihat
                                    Semua</a>
                            </div>
                            <ul class="max-h-80 mx-2 overflow-y-auto">
                                @if ($PesanPerusahaan->isNotEmpty())
                                    @foreach ($PesanPerusahaan as $pp)
                                        @if ($pp->status !== 'pending' && $pp->lowongan_perusahaan->perusahaan->id === Auth::user()->perusahaan->id)
                                            @php
                                                $pelamar = \App\Models\Pelamar::find($pp->pelamar_id);
                                            @endphp
                                            <li
                                                class="px-4 py-3 {{ $pp->is_read === 0 ? 'bg-gray-200' : 'border-zinc-300' }} hover:bg-gray-50 transition">
                                                <form action="/detail/notif/read/perusahaan/{{ $pp->id }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="text-left ">
                                                        <div class="flex items-start gap-3">
                                                            <img class="w-10 h-10 rounded-full object-cover"
                                                                src="{{ asset('storage/' . $pelamar->img_profile) }}"
                                                                alt="Logo {{ $pelamar->nama_pelamar }}">
                                                            <div class="flex-1">
                                                                @if ($pp->status === 'diterima')
                                                                    <p class="text-sm text-gray-700">
                                                                        <span
                                                                            class="font-medium text-gray-900">Selamat!</span>
                                                                        Lamaran Anda ke
                                                                        <span
                                                                            class="font-semibold">{{ $pelamar->nama_pelamar }}</span>
                                                                        di Lowongan <span
                                                                            class="font-semibold">{{ $pp->lowongan_perusahaan->nama }}
                                                                        </span>
                                                                        <span
                                                                            class="text-green-600 font-medium">{{ $pp->status }}</span>.
                                                                    </p>
                                                                @elseif ($pp->status === 'ditolak')
                                                                    <p class="text-sm text-gray-700">
                                                                        <span class="font-medium text-gray-900">Mohon
                                                                            Maaf!</span>
                                                                        Lamaran Anda ke Kandidat
                                                                        <span
                                                                            class="font-semibold">{{ $pelamar->nama_pelamar }}</span>
                                                                        di Lowongan <span
                                                                            class="font-semibold">{{ $pp->lowongan_perusahaan->nama }}</span>
                                                                        <span
                                                                            class="text-red-600 font-medium">{{ $pp->status }}</span>.
                                                                    </p>
                                                                @endif
                                                                <span class="text-xs text-gray-400">
                                                                    {{ $pp->updated_at->diffForHumans() }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </button>
                                                </form>
                                            </li>
                                        @endif
                                    @endforeach


                                    <div class="flex items-center justify-end px-5 pb-3 gap-2 mt-2">
                                        <i class="ph ph-checks text-blue-500 font-bold text-lg"></i>
                                        <button class="text-xs font-semibold text-gray-600 hover:text-blue-600">
                                            Tandai Baca
                                        </button>
                                    </div>
                                @else
                                    <li class="px-4 py-6 text-center text-sm text-gray-500">
                                        Belum ada notifikasi.
                                    </li>
                                @endif
                            </ul>

                        </div>
                    @endif


                    @if (Auth::check())
                        <button type="button" id="user-menu-button" aria-expanded="false"
                            data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                            <span class="sr-only">Open user menu</span>
                            @if (Auth::user()->role == 'pelamar')
                                @if (Auth::user()->pelamars->img_profile)
                                    <img class="w-10 h-10 object-cover rounded-full"
                                        src="{{ asset('storage/' . Auth::user()->pelamars->img_profile) }}"
                                        alt="">
                                @else
                                    <img class="w-10 h-10 rounded-full"
                                        src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                                        alt="">
                                @endif
                            @elseif (Auth::user()->role == 'perusahaan')
                                <span
                                    class="flex justify-center bg-orange-500 px-4 py-2 text-white mx-5 my-3 rounded-md">
                                    {{ Auth::user()->username }}
                                </span>
                            @else
                                <img class="w-10 h-10 rounded-full"
                                    src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                                    alt="">
                            @endif
                        </button>
                        @if (Auth::user()->role == 'superadmin')
                            {{-- Dropdown Profile Nya --}}
                            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-lg"
                                id="user-dropdown">
                                <div class="flex items-center gap-2 mx-3">
                                    <img class="w-10 h-10 rounded-full"
                                        src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                                        alt="">
                                    <div class="px-4 py-3">
                                        <span class="block text-sm text-gray-900">{{ Auth::user()->username }}</span>
                                        <span
                                            class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}
                                        </span>
                                    </div>
                                </div>
                                <ul class="py-2" aria-labelledby="user-menu-button">
                                    <li class="px-3">
                                        SuperAdmin
                                    </li>
                                    <li id="btn-profile">
                                        <a href="/dashboard/superadmin"
                                            class="block px-4 py-2 text-sm underline">Dashboard</a>
                                    </li>
                                    <li
                                        class="flex justify-center bg-orange-500 px-4 py-1 text-white mx-5 my-3 rounded-md">
                                        <button data-modal-target="popup-modal-logout"
                                            data-modal-toggle="popup-modal-logout" type="button">
                                            Keluar
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        @elseif (Auth::user()->role == 'finance')
                            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-lg"
                                id="user-dropdown">
                                <div class="flex items-center gap-2 mx-3">
                                    <img class="w-10 h-10 rounded-full"
                                        src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                                        alt="">
                                    <div class="px-4 py-3">
                                        <span class="block text-sm text-gray-900">{{ Auth::user()->username }}</span>
                                        <span
                                            class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}
                                        </span>
                                    </div>
                                </div>
                                <ul class="py-2" aria-labelledby="user-menu-button">
                                    <li class="px-3">
                                        Finance
                                    </li>
                                    <li id="btn-profile">
                                        <a href="/dashboard/finance"
                                            class="block px-4 py-2 text-sm underline">Dashboard</a>
                                    </li>
                                    <li
                                        class="flex justify-center bg-orange-500 px-4 py-1 text-white mx-5 my-3 rounded-md">
                                        <button data-modal-target="popup-modal-logout"
                                            data-modal-toggle="popup-modal-logout" type="button">
                                            Keluar
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        @elseif (Auth::user()->role == 'admin')
                            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-lg"
                                id="user-dropdown">
                                <div class="flex items-center gap-2 mx-3">
                                    <img class="w-10 h-10 rounded-full"
                                        src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                                        alt="">
                                    <div class="px-4 py-3">
                                        <span class="block text-sm text-gray-900">{{ Auth::user()->username }}</span>
                                        <span
                                            class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}
                                        </span>
                                    </div>
                                </div>
                                <ul class="py-2" aria-labelledby="user-menu-button">
                                    <li class="px-3">
                                        Admin
                                    </li>
                                    <li id="btn-profile">
                                        <a href="/dashboard/admin"
                                            class="block px-4 py-2 text-sm underline">Dashboard</a>
                                    </li>
                                    <li
                                        class="flex justify-center bg-orange-500 px-4 py-1 text-white mx-5 my-3 rounded-md">
                                        <button data-modal-target="popup-modal-logout"
                                            data-modal-toggle="popup-modal-logout" type="button">
                                            Keluar
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        @elseif (Auth::user()->role == 'perusahaan')
                            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-lg"
                                id="user-dropdown">
                                <div class="flex items-center gap-2 mx-3">
                                    @if (Auth::user()->role == 'perusahaan')
                                        @if (Auth::user()->perusahaan->img_profile)
                                            <img class="w-10 h-10 object-cover rounded-full"
                                                src="{{ asset('storage/' . Auth::user()->perusahaan->img_profile) }}"
                                                alt="">
                                        @else
                                            <img class="w-10 h-10 rounded-full"
                                                src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                                                alt="">
                                        @endif
                                    @endif
                                    <div class="px-4 py-3">
                                        <span class="block text-sm text-gray-900">{{ Auth::user()->username }}</span>
                                        <span
                                            class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}
                                        </span>
                                    </div>
                                </div>
                                <ul class="py-2" aria-labelledby="user-menu-button">
                                    <li id="btn-profile">
                                        <a href="/dashboard/perusahaan/profile"
                                            class="block px-4 py-2 text-sm">Profile
                                            Perusahaan</a>
                                    </li>
                                    <li id="btn-profile">
                                        <a href="/dashboard/perusahaan" class="block px-4 py-2 text-sm">Dashboard
                                            Perusahaan</a>
                                    </li>
                                    <li>
                                        <a href="/koin/areakerja" class="block px-4 py-2 text-sm">Koin Area Kerja</a>
                                    </li>
                                    <li>
                                        <a href="/dashboard/perusahaan/kandidat"
                                            class="block px-4 py-2 text-sm">Kandidat Saya</a>
                                    </li>
                                    <li>
                                        <a href="/dashboard/perusahaan/pengaturan"
                                            class="block px-4 py-2 text-sm">Pengaturan</a>
                                    </li>
                                    <li
                                        class="flex justify-center bg-orange-500 px-4 py-1 text-white mx-5 my-3 rounded-md">
                                        <button data-modal-target="popup-modal-logout"
                                            data-modal-toggle="popup-modal-logout" type="button">
                                            Keluar
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-lg"
                                id="user-dropdown">
                                <div class="flex items-center gap-2 mx-3">
                                    @if (Auth::user()->role == 'pelamar')
                                        @if (Auth::user()->pelamars->img_profile)
                                            <img class="w-10 h-10 object-cover rounded-full"
                                                src="{{ asset('storage/' . Auth::user()->pelamars->img_profile) }}"
                                                alt="">
                                        @else
                                            <img class="w-10 h-10 rounded-full"
                                                src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                                                alt="">
                                        @endif
                                    @else
                                        <img class="w-10 h-10 rounded-full"
                                            src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                                            alt="">
                                    @endif
                                    <div class="px-4 py-3">
                                        <span class="block text-sm text-gray-900">{{ Auth::user()->username }}</span>
                                        <span
                                            class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}
                                        </span>
                                    </div>
                                </div>
                                <ul class="py-2" aria-labelledby="user-menu-button">
                                    @if (Auth::user()->pelamars->kategori === 'kandidat aktif' || Auth::user()->pelamars->kategori === 'calon kandidat')
                                        <li class="flex items-center justify-center" id="btn-profile">
                                            <img src="{{ asset('image/Kandidat.png') }}" alt="">
                                            <a href="/profile"
                                                class="block px-4 py-2 text-sm text-center">Kandidat</a>
                                        </li>
                                    @else
                                        <li id="btn-profile">
                                            <a href="/profile" class="block px-4 py-2 text-sm">Profile</a>
                                        </li>
                                    @endif
                                    <li>
                                        <a href="/lowongan/tersimpan" class="block px-4 py-2 text-sm">Lowongan
                                            Tersimpan</a>
                                    </li>
                                    @if (Auth::check() && Auth::user()->role === 'pelamar')
                                        <li>
                                            <a href="/transaksi/pelamar" class="block px-4 py-2 text-sm">Transaksi</a>
                                        </li>
                                    @endif
                                    <li>
                                        <a href="/bantuan" class="block px-4 py-2 text-sm">Bantuan</a>
                                    </li>
                                    <li
                                        class="flex justify-center bg-orange-500 px-4 py-1 text-white mx-5 my-3 rounded-md">
                                        <button data-modal-target="popup-modal-logout"
                                            data-modal-toggle="popup-modal-logout" type="button">
                                            Keluar
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        @endif
                    @else
                        <a href="/login"
                            class="text-white bg-[#fa6601] px-10 py-2 rounded-lg cursor-pointer">Masuk</a>
                    @endif
                </div>
                <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium md:flex-row md:mt-0 md:border-0 ">
                    @if (Auth::check() && Auth::user()->role == 'perusahaan')
                        <li>
                            @if (Auth::user()->perusahaan->is_berlangganan)
                                <a href="/dashboard/perusahaan/berlangganan/kandidat"
                                    class="block {{ Request()->is('dashboard/perusahaan/berlangganan/kandidat') ? 'opacity-30' : '' }} py-2 px-3 text-[#fa6601] font-semibold">Beranda</a>
                            @else
                                <a href="/dashboard/perusahaan/berlangganan"
                                    class="block {{ Request()->is('dashboard/perusahaan/berlangganan') ? 'opacity-30' : '' }} py-2 px-3 text-[#fa6601] font-semibold">Berlangganan</a>
                            @endif
                        </li>
                        <li>
                            <a href="/talenthunter"
                                class="block {{ Request()->is('talenthunter') ? 'opacity-30' : '' }} py-2 px-3 text-[#fa6601] font-semibold">Talent
                                Hunter</a>
                        </li>
                        <li>
                            <a href="/dashboard/perusahaan/kandidatak"
                                class="block {{ Request()->is('dashboard/perusahaan/kandidatak') ? 'opacity-30' : '' }} py-2 px-3 text-[#fa6601] font-semibold">Kandidat</a>
                        </li>
                        <li>
                            <a href="/pasanglowongan"
                                class="block {{ Request()->is('pasanglowongan') ? 'opacity-30' : '' }} py-2 px-3 text-[#fa6601] font-semibold">Pasang
                                Lowongan</a>
                        </li>
                        <li>
                            <a href="/dashboard/perusahaan/event"
                                class="block {{ Request()->is('dashboard/perusahaan/event') ? 'opacity-30' : '' }} py-2 px-3 text-[#fa6601] font-semibold">Event</a>
                        </li>
                    @elseif (Auth::check() && Auth::user()->role === 'pelamar')
                        <li>
                            <a href="/"
                                class="block {{ Request()->is('/') ? 'opacity-30' : '' }} py-2 px-3 text-[#fa6601] font-semibold">Beranda</a>
                        </li>
                        <li>
                            <a href="/talenthunter"
                                class="block {{ Request()->is('talenthunter') ? 'opacity-30' : '' }} py-2 px-3 text-[#fa6601] font-semibold">Talent
                                Hunter</a>
                        </li>
                        <li>
                            <a href="/tipskerja"
                                class="block  {{ Request()->is('tipskerja') ? 'opacity-30' : '' }} py-2 px-3 text-[#fa6601] font-semibold">Tips
                                Kerja</a>
                        </li>
                        @if (
                            (Auth::user()->role === 'pelamar' && Auth::user()->pelamars->kategori === 'kandidat aktif') ||
                                Auth::user()->pelamars->kategori == 'calon kandidat')
                            <li>
                                <a href="/kandidat/kosong"
                                    class="block {{ Request()->is('kandidat/kosong') ? 'opacity-30' : '' }} py-2 px-3 text-[#fa6601] font-semibold">Rekrut
                                    Saya</a>
                            </li>
                        @else
                            <li>
                                <a href="/daftarkandidat"
                                    class="block {{ Request()->is('daftarkandidat') ? 'opacity-30' : '' }} py-2 px-3 text-[#fa6601] font-semibold">Daftar
                                    Kandidat</a>
                            </li>
                        @endif
                        <li>
                            <a href="/pasanglowongan"
                                class="block {{ Request()->is('pasanglowongan') ? 'opacity-30' : '' }} py-2 px-3 text-[#fa6601] font-semibold">Pasang
                                Lowongan</a>
                        </li>
                    @else
                        <li>
                            <a href="/"
                                class="block {{ Request()->is('/') ? 'opacity-30' : '' }} py-2 px-3 text-[#fa6601] font-semibold">Beranda</a>
                        </li>
                        <li>
                            <a href="/talenthunter"
                                class="block {{ Request()->is('talenthunter') ? 'opacity-30' : '' }} py-2 px-3 text-[#fa6601] font-semibold">Talent
                                Hunter</a>
                        </li>
                        <li>
                            <a href="/tipskerja"
                                class="block  {{ Request()->is('tipskerja') ? 'opacity-30' : '' }} py-2 px-3 text-[#fa6601] font-semibold">Tips
                                Kerja</a>
                        </li>
                        <li>
                            <a href="/daftarkandidat"
                                class="block {{ Request()->is('daftarkandidat') ? 'opacity-30' : '' }} py-2 px-3 text-[#fa6601] font-semibold">Daftar
                                Kandidat</a>
                        </li>
                        <li>
                            <a href="/pasanglowongan"
                                class="block {{ Request()->is('pasanglowongan') ? 'opacity-30' : '' }} py-2 px-3 text-[#fa6601] font-semibold">Pasang
                                Lowongan</a>
                        </li>
                    @endif
                    <li class="flex lg:hidden md:hidden justify-between items-center mt-4">
                        <button type="button" id="notifikasi" aria-expanded="false" data-dropdown-toggle="notif-hp"
                            data-dropdown-placement="bottom">
                            <span class="sr-only">Open user menu</span>
                            <i class="ph-fill text-[#fa6601] ph-bell text-3xl"></i>
                        </button>

                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-lg transform translate-x-16 translate-y-[-4rem] w-80 h-56 overflow-auto"
                            id="notif-hp">
                            <div class="flex items-center px-4 py-3 justify-between">
                                <span class="block text-sm text-gray-900">Notifikasi</span>
                                <span class="block text-sm  text-orange-500">Lihat Semua</span>
                            </div>
                            <ul class="py-2" aria-labelledby="user-menu-button">
                                <li class="border-b">
                                    <div class="flex items-center gap-2 ">
                                        <a href="#" class="flex items-center gap-10 w-72 px-4 py-2 text-sm">
                                            <img class="w-8"
                                                src="https://png.pngtree.com/png-vector/20211030/ourmid/pngtree-company-logo-design-png-image_4016509.png"
                                                alt="">
                                            <p>Selamat! Lamaran yang anda
                                                ajukan ke Seven Inc divisi
                                                Videografi Diterima.</p>
                                        </a>
                                        <span class="float-right px-4 text-gray-400 py-2">2 Jam lalu</span>
                                    </div>
                                </li>
                                <li class="border-b">
                                    <div class="flex items-center gap-2 ">
                                        <a href="#" class="flex items-center gap-10 w-72 px-4 py-2 text-sm">
                                            <img class="w-8"
                                                src="https://png.pngtree.com/png-vector/20211030/ourmid/pngtree-company-logo-design-png-image_4016509.png"
                                                alt="">
                                            <p>Selamat! Lamaran yang anda
                                                ajukan ke Seven Inc divisi
                                                Videografi Diterima.</p>
                                        </a>
                                        <span class="float-right px-4 text-gray-400 py-2">2 Jam lalu</span>
                                    </div>
                                </li>
                                <li class="border-b">
                                    <div class="flex items-center gap-2 ">
                                        <a href="#" class="flex items-center gap-10 w-72 px-4 py-2 text-sm">
                                            <img class="w-8"
                                                src="https://png.pngtree.com/png-vector/20211030/ourmid/pngtree-company-logo-design-png-image_4016509.png"
                                                alt="">
                                            <p>Selamat! Lamaran yang anda
                                                ajukan ke Seven Inc divisi
                                                Videografi Diterima.</p>
                                        </a>
                                        <span class="float-right px-4 text-gray-400 py-2">2 Jam lalu</span>
                                    </div>
                                </li>
                                <span class="px-4 flex items-center justify-end gap-2 py-3">
                                    <i class="ph ph-checks text-blue-500 font-bold text-2xl"></i>
                                    <p class="text-[14px] font-semibold">Tandai baca</p>
                                </span>
                            </ul>
                        </div>

                        @if (Auth::check())
                            @if (Auth::user()->role == 'pelamar')
                                @if (Auth::user()->pelamars->img_profile)
                                    <a href="/profile">
                                        <img class="w-10 h-10 object-cover rounded-full"
                                            src="{{ asset('storage/' . Auth::user()->pelamars->img_profile) }}"
                                            alt="">
                                    </a>
                                @else
                                    <img class="w-10 h-10 rounded-full"
                                        src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                                        alt="">
                                @endif
                            @else
                                <img class="w-10 h-10 rounded-full"
                                    src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                                    alt="">
                            @endif
                        @else
                            <a href="/login"
                                class="text-white bg-[#fa6601] px-10 py-2 rounded-lg cursor-pointer">Masuk</a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')


    @if (
        (Auth::check() &&
            Auth::user()->role === 'pelamar' &&
            Auth::user()->pelamars->nama_pelamar &&
            Auth::user()->pelamars->deskripsi_diri &&
            Auth::user()->pelamars->deskripsi_diri &&
            Auth::user()->pelamars->tanggal_lahir &&
            Auth::user()->pelamars->gender &&
            Auth::user()->pelamars->telepon_pelamar) ||
            (Auth::check() && Auth::user()->role === 'perusahaan'))

        @if (session('show_event_modal') && session('latest_event'))
            @php $event = session('latest_event'); @endphp
            <div id="eventModal"
                class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 px-4">
                <div class="bg-white shadow-xl w-3/4 lg:w-3/5 p-6 rounded-xl">
                    <div>
                        <h1 class="text-4xl text-gray-500 font-bold border-b-2 py-3">🎉 Event Untukmu!</h1>
                        <h2 class="text-2xl  text-gray-300 font-bold my-4">{{ $event->title }}</h2>
                    </div>

                    <div class="overflow-y-auto max-h-[60vh] pr-2">
                        <div class="mb-6 aspect-[3/1] w-full mx-auto">
                            <img src="{{ asset('storage/' . $event->image) }}" alt="event"
                                class="w-full h-full object-cover rounded-xl shadow">
                        </div>
                        <p class="mb-3">{!! $event->content !!}</p>

                        <div class="space-y-1 text-sm text-gray-600">
                            <p><span class="font-semibold">Lokasi:</span> {{ $event->lokasi }}</p>
                            <p><span class="font-semibold">Tanggal:</span> {{ $event->tgl_mulai }} s/d
                                {{ $event->tgl_akhir }}</p>
                        </div>
                    </div>

                    <div class="mt-6 text-right">
                        <button onclick="document.getElementById('eventModal').remove()"
                            class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        @endif
    @endif

    <footer class="bg-orange-500  text-white py-10 mt-52">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <div class="flex items-center gap-2">
                    <img class="w-20 h-20" src="{{ asset('image/logo_area_kerja_putih.png') }}" alt="Logo"
                        class="h-10">
                </div>
                <p class="mt-3 text-sm leading-relaxed">
                    Lamar Pekerjaan Kamu – Dengan waktu dan langkah yang cepat
                </p>
            </div>
            <div>
                <h3 class="font-bold mb-3">Kategori</h3>
                <ul class="space-y-2 text-sm">
                    @if (Auth::check() &&
                            Auth::user()->role === 'perusahaan' &&
                            Auth::user()->perusahaan &&
                            Auth::user()->perusahaan->is_berlangganan === 0)
                        <li><a href="/dashboard/perusahaan/berlangganan" class="hover:underline">Beranda</a></li>
                    @elseif (Auth::check() &&
                            Auth::user()->role === 'perusahaan' &&
                            Auth::user()->perusahaan &&
                            Auth::user()->perusahaan->is_berlangganan)
                        <li><a href="/dashboard/perusahaan/berlangganan/kandidat" class="hover:underline">Beranda</a>
                        </li>
                    @else
                        <li><a href="/" class="hover:underline">Beranda</a></li>
                    @endif

                    <li><a href="/" class="hover:underline">Provinsi Lainnya</a></li>
                    <li><a href="/tipskerja" class="hover:underline">Tips Kerja</a></li>
                    <li><a href="/pasanglowongan" class="hover:underline">Pasang Lowongan</a></li>
                </ul>
            </div>
            <div>
                <h3 class="font-bold mb-3">Kontak Kami</h3>
                <form action="#" method="POST" class="flex">
                    <input type="email" placeholder="Email address"
                        class="px-3 py-2 w-full rounded-l-md text-gray-800 focus:outline-none" />
                    <button type="submit"
                        class="bg-black px-4 py-2 rounded-r-md text-white font-semibold hover:bg-gray-900">
                        Submit
                    </button>
                </form>
            </div>
        </div>
        <div
            class="border-t border-orange-400 mt-8 pt-6 flex flex-col md:flex-row items-center justify-between px-6 max-w-7xl mx-auto">
            <p class="text-sm text-orange-100">Get ease in applying for your dream job</p>
            <div class="flex gap-3 mt-4 md:mt-0">
                <a href="{{ $link_sosial['facebook']->link ?? '' }}" class="p-2 border border-orange-200 rounded text-white hover:bg-orange-600">
                    <i class="ph ph-facebook-logo"></i>
                </a>
                <a href="{{ $link_sosial['instagram']->link ?? '' }}" class="p-2 border border-orange-200 rounded text-white hover:bg-orange-600">
                    <i class="ph ph-instagram-logo"></i>
                </a>
                <a href="{{ $link_sosial['linkedin']->link ?? '' }}" class="p-2 border border-orange-200 rounded text-white hover:bg-orange-600">
                    <i class="ph ph-twitter-logo"></i>
                </a>
                <a href="{{ $link_sosial['linkedin']->link ?? '' }}" class="p-2 border border-orange-200 rounded text-white hover:bg-orange-600">
                    <i class="ph ph-linkedin-logo"></i>
                </a>
            </div>

            <p class="text-sm text-orange-100 mt-4 md:mt-0">
                Copyright © 2024 areakerja.com
            </p>
        </div>
    </footer>


    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://unpkg.com/intro.js/minified/intro.min.js"></script>
</body>

</html>
