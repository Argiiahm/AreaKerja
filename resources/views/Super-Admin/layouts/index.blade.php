<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Com patible" content="ie=edge">
    <title>AreaKerja.com | Super Admin Dashboard</title>
    <link rel="shortcut icon" href="{{ asset('image/logo-areakerja.png') }}" type="image/x-icon">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css" />
    <link rel="stylesheet" href="{{ public_path('css/tailwind.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite('resources/css/app.css')
</head>

<style>
    trix-toolbar [data-trix-button-group="file-tools"] {
        display: none;
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

<body class="bg-gray-50">
    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
        type="button"
        class="inline-flex items-center p-2 mt-4 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none">
        <i class="ph ph-list text-xl"></i>
        <span class="sr-only">Open sidebar</span>
    </button>

    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-[#fa6601] text-white flex flex-col justify-between overflow-y-auto"
        aria-label="Sidebar">

        <div>
            <div class="flex justify-between items-center py-6 px-4">
                <div class="flex items-center gap-2">
                    <img src="{{ asset('image/logo_area_kerja_putih.png') }}" alt="Logo" class="w-12 h-12">
                    <span class="font-semibold">areakerja.com</span>
                </div>
                <button data-drawer-hide="logo-sidebar" aria-controls="logo-sidebar"
                    class="sm:hidden inline-flex items-center p-2 text-gray-300 hover:text-white">
                    <i class="ph ph-x text-xl"></i>
                </button>
            </div>

            <hr class="border-gray-400 mx-6">

            {{-- UMUM --}}
            <div>
                <p class="px-6 my-5 text-sm font-semibold text-white/70">Umum</p>
                <a href="/dashboard/superadmin"
                    class="flex items-center gap-2 px-6 
                {{ Request()->is('dashboard/superadmin')
                    ? 'mx-6 py-2 my-5 rounded-md shadow bg-white text-gray-700 text-md font-medium'
                    : 'hover:translate-x-0.5 transition-all duration-500 py-2 hover:mx-3 hover:bg-white hover:text-black rounded-lg' }}">
                    <img src="{{ Request()->is('dashboard/superadmin')
                        ? asset('Icon/dashboard-icon-black.png')
                        : asset('Icon/dashboard-icon.png') }}"
                        alt="">
                    <span>Dashboard</span>
                </a>
            </div>

            {{-- SUPER ADMIN --}}
            <div class="space-y-3">
                <p class="px-6 text-sm my-5 font-semibold text-white/70">Super Admin</p>

                <a href="/dashboard/superadmin/pelamar"
                    class="flex items-center gap-2 px-6 {{ Request()->is('dashboard/superadmin/pelamar')
                        ? 'mx-6 py-2 my-5 rounded-md shadow bg-white text-gray-700 text-md font-medium'
                        : 'hover:translate-x-0.5 transition-all duration-500 py-2 hover:mx-3 hover:bg-white hover:text-black rounded-lg' }}">
                    <img src="{{ Request()->is('dashboard/superadmin/pelamar') ? asset('Icon/Pelamar OREN.png') : asset('Icon/Account.png') }}"
                        alt="">
                    <span>Data Pelamar</span>
                </a>

                <a href="/dashboard/superadmin/perusahaan"
                    class="flex items-center gap-2 px-6 {{ Request()->is('dashboard/superadmin/perusahaan')
                        ? 'mx-6 py-2 my-5 rounded-md shadow bg-white text-gray-700 text-md font-medium'
                        : 'hover:translate-x-0.5 transition-all duration-500 py-2 hover:mx-3 hover:bg-white hover:text-black rounded-lg' }}">
                    <img src="{{ Request()->is('dashboard/superadmin/perusahaan')
                        ? asset('Icon/Data Perusahaan OREN.png')
                        : asset('Icon/Commission.png') }}"
                        alt="">
                    <span>Data Perusahaan</span>
                </a>

                <a href="/dashboard/superadmin/finance"
                    class="flex items-center gap-2 px-6 {{ Request()->is('dashboard/superadmin/finance')
                        ? 'mx-6 py-2 my-5 rounded-md shadow bg-white text-gray-700 text-md font-medium'
                        : 'hover:translate-x-0.5 transition-all duration-500 py-2 hover:mx-3 hover:bg-white hover:text-black rounded-lg' }}">
                    <img src="{{ Request()->is('dashboard/superadmin/finance') ? asset('Icon/Finance OREN.png') : asset('Icon/Finance.png') }}"
                        alt="">
                    <span>Finance</span>
                </a>

                <a href="/dashboard/superadmin/freeze"
                    class="flex items-center gap-2 px-6 {{ Request()->is('dashboard/superadmin/freeze')
                        ? 'mx-6 py-2 my-5 rounded-md shadow bg-white text-gray-700 text-md font-medium'
                        : 'hover:translate-x-0.5 transition-all duration-500 py-2 hover:mx-3 hover:bg-white hover:text-black rounded-lg' }}">
                    <img src="{{ Request()->is('dashboard/superadmin/freeze')
                        ? asset('Icon/Akun Freeze OREN.png')
                        : asset('Icon/Akun Freeze.png') }}"
                        alt="">
                    <span>Akun Freeze</span>
                </a>

                <a href="/dashboard/superadmin/tipskerja"
                    class="flex items-center gap-2 px-6 {{ Request()->is('dashboard/superadmin/tipskerja')
                        ? 'mx-6 py-2 my-5 rounded-md shadow bg-white text-gray-700 text-md font-medium'
                        : 'hover:translate-x-0.5 transition-all duration-500 py-2 hover:mx-3 hover:bg-white hover:text-black rounded-lg' }}">
                    <img src="{{ Request()->is('dashboard/superadmin/tipskerja')
                        ? asset('Icon/Tips Kerja OREN.png')
                        : asset('Icon/Tips kerja.png') }}"
                        alt="">
                    <span>Tips Kerja</span>
                </a>

                <a href="/dashboard/superadmin/event"
                    class="flex items-center gap-2 px-6 {{ Request()->is('dashboard/superadmin/event')
                        ? 'mx-6 py-2 my-5 rounded-md shadow bg-white text-gray-700 text-md font-medium'
                        : 'hover:translate-x-0.5 transition-all duration-500 py-2 hover:mx-3 hover:bg-white hover:text-black rounded-lg' }}">
                    <img src="{{ Request()->is('dashboard/superadmin/event') ? asset('Icon/Event OREN.png') : asset('Icon/Bank Event.png') }}"
                        alt="">
                    <span>Event</span>
                </a>
            </div>

            {{-- MANAJEMEN AKUN --}}
            <div class="space-y-3">
                <p class="px-6 text-sm my-5 font-semibold text-white/70">Manajemen Akun</p>

                <a href="/dashboard/superadmin/akun"
                    class="flex items-center gap-2 px-6 {{ Request()->is('dashboard/superadmin/akun')
                        ? 'mx-6 py-2 my-5 rounded-md shadow bg-white text-gray-700 text-md font-medium'
                        : 'hover:translate-x-0.5 transition-all duration-500 py-2 hover:mx-3 hover:bg-white hover:text-black rounded-lg' }}">
                    <img src="{{ Request()->is('dashboard/superadmin/akun') ? asset('Icon/Settings-orange.png') : asset('Icon/Settings.png') }}"
                        alt="">
                    <span>Akun</span>
                </a>

                <a href="/dashboard/superadmin/pengaturan_page"
                    class="flex items-center gap-2 px-6 {{ Request()->is('dashboard/superadmin/pengaturan_page')
                        ? 'mx-6 py-2 my-5 rounded-md shadow bg-white text-gray-700 text-md font-medium'
                        : 'hover:translate-x-0.5 transition-all duration-500 py-2 hover:mx-3 hover:bg-white hover:text-black rounded-lg' }}">
                    <img src="{{ Request()->is('dashboard/superadmin/pengaturan_page')
                        ? asset('Icon/Settings-orange.png')
                        : asset('Icon/Settings.png') }}"
                        alt="">
                    <span>Link & Header</span>
                </a>

                <a href="/dashboard/superadmin/pengaturan"
                    class="flex items-center gap-2 px-6 {{ Request()->is('dashboard/superadmin/pengaturan')
                        ? 'mx-6 py-2 my-5 rounded-md shadow bg-white text-gray-700 text-md font-medium'
                        : 'hover:translate-x-0.5 transition-all duration-500 py-2 hover:mx-3 hover:bg-white hover:text-black rounded-lg' }}">
                    <img src="{{ Request()->is('dashboard/superadmin/pengaturan')
                        ? asset('Icon/Settings-orange.png')
                        : asset('Icon/Settings.png') }}"
                        alt="">
                    <span>Pengaturan</span>
                </a>
            </div>
        </div>

        <div class="px-6 my-6">
            <form action="/logout" class="flex items-center gap-2" method="post">
                @csrf
                @method('DELETE')
                <i class="ph ph-sign-out text-lg"></i>
                <button type="submit" class="hover:text-gray-200">Keluar</button>
            </form>
        </div>
    </aside>


    <div class="p-4 sm:ml-64">
        <div class="flex justify-between items-center mb-6">
            <h1 id="title" class="text-2xl font-bold hidden lg:block md:block">{{ $title }} </h1>

            <div class="flex items-center px-8 gap-4">
                @php
                    $unread = $Pesan->where('status', '!=', 'pending')->where('is_read', 0)->count();
                    $unreadPerusahaan = $PesanPerusahaan
                        ->where('status', '!=', 'pending')
                        ->where('is_read', 0)
                        ->count();
                    $totalUnread = $unread + $unreadPerusahaan;
                @endphp

                <button type="button" id="notifikasi" aria-expanded="false" data-dropdown-toggle="notif"
                    data-dropdown-placement="bottom" class="relative">
                    <span class="sr-only">Open notification</span>
                    <i class="ph ph-bell text-2xl text-[#606060]"></i>

                    @if ($totalUnread > 0)
                        <span
                            class="absolute top-0 right-0 block h-2 w-2 rounded-full ring-2 ring-white bg-red-600"></span>
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
                        @if ($Pesan->isNotEmpty() || $PesanPerusahaan->isNotEmpty())
                            @foreach ($Pesan as $p)
                                @if ($p->status !== 'pending')
                                    @php
                                        $pelamar = \App\Models\Pelamar::find($p->pelamar_id);
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
                                                                <span class="font-medium text-gray-900">Selamat!</span>
                                                                Lamaran dari pelamar <span
                                                                    class="font-medium text-gray-900">{{ $pelamar->nama_pelamar }}
                                                                </span>ke
                                                                Perusahaan
                                                                <span
                                                                    class="font-semibold">{{ $lowongan->perusahaan->nama_perusahaan }}</span>
                                                                divisi <span
                                                                    class="font-semibold">{{ $lowongan->nama }}</span>
                                                                telah
                                                                <span
                                                                    class="text-green-600 font-medium">{{ $p->status }}</span>.
                                                            </p>
                                                        @elseif ($p->status === 'ditolak')
                                                            <p class="text-sm text-gray-700">
                                                                <span class="font-medium text-gray-900">Mohon
                                                                    Maaf!</span>
                                                                Lamaran dari pelamar <span
                                                                    class="font-medium text-gray-900">{{ $pelamar->nama_pelamar }}
                                                                </span>
                                                                ke Perusahaan
                                                                <span
                                                                    class="font-semibold">{{ $lowongan->perusahaan->nama_perusahaan }}</span>
                                                                divisi <span
                                                                    class="font-semibold">{{ $lowongan->nama }}</span>
                                                                <span class="text-red-600 font-medium">Belum
                                                                    Bisa di terima</span>.
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
                            @foreach ($PesanPerusahaan as $pp)
                                @if ($pp->status !== 'pending')
                                    @php
                                        $pelamar = \App\Models\Pelamar::find($pp->pelamar_id);
                                        $lowongan = \App\Models\LowonganPerusahaan::find($pp->lowongan_id);
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
                                                                <span class="font-medium text-gray-900">Selamat!</span>
                                                                Rekrutmen dari
                                                                <span
                                                                    class="font-medium text-gray-900">{{ $lowongan->perusahaan->nama_perusahaan }}</span>
                                                                kepada
                                                                <span
                                                                    class="font-semibold">{{ $pelamar->nama_pelamar }}</span>
                                                                yang di tempatkan di posisi
                                                                <span class="font-semibold">{{ $lowongan->nama }}
                                                                </span>Telah
                                                                <span
                                                                    class="text-green-600 font-medium">{{ $pp->status }}</span>.
                                                            </p>
                                                        @elseif ($pp->status === 'ditolak')
                                                            <p class="text-sm text-gray-700">
                                                                <span class="font-medium text-gray-900">Mohon
                                                                    Maaf!</span>
                                                                Rekrutmen dari
                                                                <span
                                                                    class="font-medium text-gray-900">{{ $lowongan->perusahaan->nama_perusahaan }}</span>
                                                                kepada Kandidat
                                                                <span
                                                                    class="font-semibold">{{ $pelamar->nama_pelamar }}</span>
                                                                yang di tempatkan di posisi <span
                                                                    class="font-semibold">{{ $lowongan->nama }}</span>
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


                @if (Auth::check() && Auth::user()->role == 'superadmin')
                    <a href="/dashboard/superadmin/profile">
                        <div class="flex items-center gap-2 border border-[#606060] px-3 py-2 rounded-xl shadow-sm">
                            <div>
                                @if (optional(Auth::user()->superadmins)->img_profile)
                                    <img src="{{ asset('storage/' . Auth::user()->superadmins->img_profile) }}"
                                        alt="" class="w-9 h-9 rounded-full object-cover border">
                                @else
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                                        alt="Profile Picture" class="w-9 h-9 rounded-full object-cover border">
                                @endif
                            </div>
                            <div>
                                <p class="text-sm font-semibold">{{ Auth::user()->superadmins->nama_lengkap ?? 'belum ada nama_lengkap' }}</p>
                                <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                    </a>
                @endif

            </div>
        </div>
        @yield('super_admin-content')
    </div>

    <script src="{{ asset('js/superAdmin.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.5.1/flowbite.min.js"></script>

</body>

</html>
