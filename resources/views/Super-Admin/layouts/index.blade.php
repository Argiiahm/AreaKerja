<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    {{-- Custom CSS for Trix editor and scrollbar that can't be easily done with Tailwind --}}
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }

        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-thumb {
            background: #94a3b8;
            border-radius: 10px;
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- MOBILE BUTTON -->
    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" class="p-2 m-3 sm:hidden">
        <i class="ph ph-list text-2xl"></i>
    </button>

    <!-- SIDEBAR -->
    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 flex flex-col justify-between overflow-y-auto bg-slate-900 border-r border-white/5">

        <div>

            <!-- LOGO -->
            <div class="flex items-center gap-3 p-5">
                <img src="{{ asset('image/logo_area_kerja_putih.png') }}" class="w-10">
                <span class="text-white font-semibold">areakerja</span>
            </div>

            <!-- UMUM -->
            <p class="text-[11px] uppercase text-slate-500 mt-4 mx-5 mb-1.5">Umum</p>

            <a href="/dashboard/superadmin"
                class="flex items-center gap-3 py-[10px] px-[14px] my-1 mx-3 rounded-xl transition-all duration-250 text-slate-300 hover:bg-white/10 hover:text-white {{ Request()->is('dashboard/superadmin') ? 'bg-gradient-to-br from-orange-500 to-orange-400 text-white shadow-lg shadow-orange-500/40' : '' }}">
                <i class="ph ph-squares-four text-lg"></i> Dashboard
            </a>

            <!-- SUPER ADMIN -->
            <p class="text-[11px] uppercase text-slate-500 mt-4 mx-5 mb-1.5">Super Admin</p>

            <a href="/dashboard/superadmin/pelamar"
                class="flex items-center gap-3 py-[10px] px-[14px] my-1 mx-3 rounded-xl transition-all duration-250 text-slate-300 hover:bg-white/10 hover:text-white {{ Request()->is('dashboard/superadmin/pelamar') ? 'bg-gradient-to-br from-orange-500 to-orange-400 text-white shadow-lg shadow-orange-500/40' : '' }}">
                <i class="ph ph-users text-lg"></i> Data Pelamar
            </a>

            <a href="/dashboard/superadmin/perusahaan"
                class="flex items-center gap-3 py-[10px] px-[14px] my-1 mx-3 rounded-xl transition-all duration-250 text-slate-300 hover:bg-white/10 hover:text-white {{ Request()->is('dashboard/superadmin/perusahaan') ? 'bg-gradient-to-br from-orange-500 to-orange-400 text-white shadow-lg shadow-orange-500/40' : '' }}">
                <i class="ph ph-buildings text-lg"></i> Data Perusahaan
            </a>

            <a href="/dashboard/superadmin/finance"
                class="flex items-center gap-3 py-[10px] px-[14px] my-1 mx-3 rounded-xl transition-all duration-250 text-slate-300 hover:bg-white/10 hover:text-white {{ Request()->is('dashboard/superadmin/finance') ? 'bg-gradient-to-br from-orange-500 to-orange-400 text-white shadow-lg shadow-orange-500/40' : '' }}">
                <i class="ph ph-wallet text-lg"></i> Finance
            </a>

            <a href="/dashboard/superadmin/freeze"
                class="flex items-center gap-3 py-[10px] px-[14px] my-1 mx-3 rounded-xl transition-all duration-250 text-slate-300 hover:bg-white/10 hover:text-white {{ Request()->is('dashboard/superadmin/freeze') ? 'bg-gradient-to-br from-orange-500 to-orange-400 text-white shadow-lg shadow-orange-500/40' : '' }}">
                <i class="ph ph-snowflake text-lg"></i> Akun Freeze
            </a>

            <a href="/dashboard/superadmin/tipskerja"
                class="flex items-center gap-3 py-[10px] px-[14px] my-1 mx-3 rounded-xl transition-all duration-250 text-slate-300 hover:bg-white/10 hover:text-white {{ Request()->is('dashboard/superadmin/tipskerja') ? 'bg-gradient-to-br from-orange-500 to-orange-400 text-white shadow-lg shadow-orange-500/40' : '' }}">
                <i class="ph ph-newspaper text-lg"></i> Tips Kerja
            </a>

            <a href="/dashboard/superadmin/event"
                class="flex items-center gap-3 py-[10px] px-[14px] my-1 mx-3 rounded-xl transition-all duration-250 text-slate-300 hover:bg-white/10 hover:text-white {{ Request()->is('dashboard/superadmin/event') ? 'bg-gradient-to-br from-orange-500 to-orange-400 text-white shadow-lg shadow-orange-500/40' : '' }}">
                <i class="ph ph-calendar text-lg"></i> Event
            </a>

            <!-- MANAJEMEN AKUN -->
            <p class="text-[11px] uppercase text-slate-500 mt-4 mx-5 mb-1.5">Manajemen Akun</p>

            <a href="/dashboard/superadmin/akun"
                class="flex items-center gap-3 py-[10px] px-[14px] my-1 mx-3 rounded-xl transition-all duration-250 text-slate-300 hover:bg-white/10 hover:text-white {{ Request()->is('dashboard/superadmin/akun') ? 'bg-gradient-to-br from-orange-500 to-orange-400 text-white shadow-lg shadow-orange-500/40' : '' }}">
                <i class="ph ph-users-three text-lg"></i> Akun
            </a>

            <a href="/dashboard/superadmin/pengaturan_page"
                class="flex items-center gap-3 py-[10px] px-[14px] my-1 mx-3 rounded-xl transition-all duration-250 text-slate-300 hover:bg-white/10 hover:text-white {{ Request()->is('dashboard/superadmin/pengaturan_page') ? 'bg-gradient-to-br from-orange-500 to-orange-400 text-white shadow-lg shadow-orange-500/40' : '' }}">
                <i class="ph ph-link text-lg"></i> Link & Header
            </a>

            <a href="/dashboard/superadmin/pengaturan"
                class="flex items-center gap-3 py-[10px] px-[14px] my-1 mx-3 rounded-xl transition-all duration-250 text-slate-300 hover:bg-white/10 hover:text-white {{ Request()->is('dashboard/superadmin/pengaturan') ? 'bg-gradient-to-br from-orange-500 to-orange-400 text-white shadow-lg shadow-orange-500/40' : '' }}">
                <i class="ph ph-gear text-lg"></i> Pengaturan
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
        <div
            class="topbar flex justify-between items-center mb-6 bg-white p-4 px-5 rounded-2xl shadow-xl shadow-black/5">
            <h1 id="title" class="text-xl font-bold hidden md:block">{{ $title }}</h1>
            <div class="flex items-center gap-4">
                @if (Auth::check() && Auth::user()->role == 'superadmin')
                    <a href="/dashboard/superadmin/profile">
                        <div
                            class="profile-box bg-white py-2 px-3 rounded-xl shadow-md shadow-black/5 flex items-center gap-2.5">
                            @if (optional(Auth::user()->superadmins)->img_profile)
                                <img src="{{ asset('storage/' . Auth::user()->superadmins->img_profile) }}" alt=""
                                    class="w-[38px] h-[38px] rounded-full object-cover">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                                    alt="Profile Picture" class="w-[38px] h-[38px] rounded-full object-cover">
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