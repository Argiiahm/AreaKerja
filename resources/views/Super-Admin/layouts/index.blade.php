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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    @vite('resources/css/app.css')
</head>

<style>
    body {
        font-family: 'Poppins', sans-serif;
    }

    trix-toolbar [data-trix-button-group="file-tools"] {
        display: none;
    }

    /* SIDEBAR */
    aside {
        background: #0f172a;
        border-right: 1px solid rgba(255, 255, 255, 0.05);
    }

    aside a {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 10px 14px;
        margin: 4px 12px;
        border-radius: 12px;
        transition: 0.25s;
        color: #cbd5f5;
    }

    aside a:hover {
        background: rgba(255, 255, 255, 0.06);
        color: white;
    }

    aside a.active {
        background: linear-gradient(135deg, #f97316, #fb923c);
        color: white;
        box-shadow: 0 6px 20px rgba(249, 115, 22, 0.4);
    }

    aside i {
        font-size: 18px;
    }

    aside p {
        font-size: 11px;
        text-transform: uppercase;
        color: #64748b;
        margin: 16px 20px 6px;
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

    /* TOPBAR */
    .topbar {
        background: white;
        padding: 16px 20px;
        border-radius: 16px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
    }

    /* PROFILE */
    .profile-box {
        background: white;
        padding: 8px 12px;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .profile-box img {
        width: 38px;
        height: 38px;
        border-radius: 999px;
        object-fit: cover;
    }

    /* NOTIF */
    #notif {
        border-radius: 14px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    }

    #notif ul li:hover {
        background: #f8fafc;
    }

    /* SCROLL */
    ::-webkit-scrollbar {
        width: 6px;
    }

    ::-webkit-scrollbar-thumb {
        background: #94a3b8;
        border-radius: 10px;
    }
</style>

<body class="bg-gray-50">
    <!-- MOBILE BUTTON -->
    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" class="p-2 m-3 sm:hidden">
        <i class="ph ph-list text-2xl"></i>
    </button>

    <!-- SIDEBAR -->
    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 flex flex-col justify-between overflow-y-auto">

        <div>

            <!-- LOGO -->
            <div class="flex items-center gap-3 p-5">
                <img src="{{ asset('image/logo_area_kerja_putih.png') }}" class="w-10">
                <span class="text-white font-semibold">areakerja</span>
            </div>

            <!-- UMUM -->
            <p>Umum</p>

            <a href="/dashboard/superadmin" class="{{ Request()->is('dashboard/superadmin') ? 'active' : '' }}">
                <i class="ph ph-squares-four"></i> Dashboard
            </a>

            <!-- SUPER ADMIN -->
            <p>Super Admin</p>

            <a href="/dashboard/superadmin/pelamar"
                class="{{ Request()->is('dashboard/superadmin/pelamar') ? 'active' : '' }}">
                <i class="ph ph-users"></i> Data Pelamar
            </a>

            <a href="/dashboard/superadmin/perusahaan"
                class="{{ Request()->is('dashboard/superadmin/perusahaan') ? 'active' : '' }}">
                <i class="ph ph-buildings"></i> Data Perusahaan
            </a>

            <a href="/dashboard/superadmin/finance"
                class="{{ Request()->is('dashboard/superadmin/finance') ? 'active' : '' }}">
                <i class="ph ph-wallet"></i> Finance
            </a>

            <a href="/dashboard/superadmin/freeze"
                class="{{ Request()->is('dashboard/superadmin/freeze') ? 'active' : '' }}">
                <i class="ph ph-snowflake"></i> Akun Freeze
            </a>

            <a href="/dashboard/superadmin/tipskerja"
                class="{{ Request()->is('dashboard/superadmin/tipskerja') ? 'active' : '' }}">
                <i class="ph ph-newspaper"></i> Tips Kerja
            </a>

            <a href="/dashboard/superadmin/event"
                class="{{ Request()->is('dashboard/superadmin/event') ? 'active' : '' }}">
                <i class="ph ph-calendar"></i> Event
            </a>

            <!-- MANAJEMEN AKUN -->
            <p>Manajemen Akun</p>

            <a href="/dashboard/superadmin/akun"
                class="{{ Request()->is('dashboard/superadmin/akun') ? 'active' : '' }}">
                <i class="ph ph-users-three"></i> Akun
            </a>

            <a href="/dashboard/superadmin/pengaturan_page"
                class="{{ Request()->is('dashboard/superadmin/pengaturan_page') ? 'active' : '' }}">
                <i class="ph ph-link"></i> Link & Header
            </a>

            <a href="/dashboard/superadmin/pengaturan"
                class="{{ Request()->is('dashboard/superadmin/pengaturan') ? 'active' : '' }}">
                <i class="ph ph-gear"></i> Pengaturan
            </a>

        </div>

        <!-- LOGOUT -->
        <div class="p-4">
            <form action="/logout" method="POST">
                @csrf
                @method('DELETE')
                <button class="w-full flex items-center gap-2 text-red-400 hover:text-red-500">
                    <i class="ph ph-sign-out"></i> Keluar
                </button>
            </form>
        </div>

    </aside>


    <div class="p-4 sm:ml-64">
        <div class="topbar flex justify-between items-center mb-6">
            <h1 id="title" class="text-xl font-bold hidden md:block">{{ $title }}</h1>

            <div class="flex items-center gap-4">
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
                    <i class="ph ph-bell text-xl"></i>

                    @if ($totalUnread > 0)
                        <span class="absolute top-0 right-0 block h-2 w-2 rounded-full ring-2 ring-white bg-red-600"></span>
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
                                                                divisi <span class="font-semibold">{{ $lowongan->nama }}</span>
                                                                telah
                                                                <span class="text-green-600 font-medium">{{ $p->status }}</span>.
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
                                                                divisi <span class="font-semibold">{{ $lowongan->nama }}</span>
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
                                        <form action="/detail/notif/read/perusahaan/{{ $pp->id }}" method="POST">
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
                                                                <span class="font-semibold">{{ $pelamar->nama_pelamar }}</span>
                                                                yang di tempatkan di posisi
                                                                <span class="font-semibold">{{ $lowongan->nama }}
                                                                </span>Telah
                                                                <span class="text-green-600 font-medium">{{ $pp->status }}</span>.
                                                            </p>
                                                        @elseif ($pp->status === 'ditolak')
                                                            <p class="text-sm text-gray-700">
                                                                <span class="font-medium text-gray-900">Mohon
                                                                    Maaf!</span>
                                                                Rekrutmen dari
                                                                <span
                                                                    class="font-medium text-gray-900">{{ $lowongan->perusahaan->nama_perusahaan }}</span>
                                                                kepada Kandidat
                                                                <span class="font-semibold">{{ $pelamar->nama_pelamar }}</span>
                                                                yang di tempatkan di posisi <span
                                                                    class="font-semibold">{{ $lowongan->nama }}</span>
                                                                <span class="text-red-600 font-medium">{{ $pp->status }}</span>.
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
                        <div class="profile-box">
                            @if (optional(Auth::user()->superadmins)->img_profile)
                                <img src="{{ asset('storage/' . Auth::user()->superadmins->img_profile) }}" alt="">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                                    alt="Profile Picture">
                            @endif
                            <div>
                                <p class="text-sm font-semibold">
                                    {{ Auth::user()->superadmins->nama_lengkap ?? 'belum ada nama_lengkap' }}
                                </p>
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