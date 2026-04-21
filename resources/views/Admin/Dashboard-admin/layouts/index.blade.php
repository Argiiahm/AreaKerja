<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AreaKerja.com | Admin Dashboard</title>

    <link rel="shortcut icon" href="{{ asset('image/logo-areakerja.png') }}">

    <!-- PHOSPHOR ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css" />

    <!-- TRIX -->
    <link rel="stylesheet" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

    <!-- ALPINE -->
    <script src="//unpkg.com/alpinejs" defer></script>

    @vite('resources/css/app.css')

    <style>
        /* TRIX EDITOR - Hide file-tools button */
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }

        /* SCROLLBAR */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-thumb {
            background: #94a3b8;
            border-radius: 10px;
        }
    </style>
</head>

<body class="bg-slate-100 font-sans">

    <!-- MOBILE BUTTON -->
    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" class="p-2 m-3 sm:hidden">
        <i class="ph ph-list text-2xl"></i>
    </button>

    <!-- SIDEBAR -->
    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen flex flex-col justify-between bg-slate-900 border-r border-gray-800">

        <div>

            <!-- LOGO -->
            <div class="flex items-center gap-3 p-5">
                <img src="{{ asset('image/logo_area_kerja_putih.png') }}" class="w-10">
                <span class="text-white font-semibold">areakerja</span>
            </div>

            <!-- FILTER -->
            <div class="px-4 mb-5">
                <form action="/dashboard/admin" method="GET" id="formKota">

                    <div class="relative group">

                        <!-- LABEL FLOAT -->
                        <span class="absolute -top-2 left-3 bg-slate-900 px-1 text-[10px] text-gray-400">
                            Pilih Provinsi
                        </span>

                        <!-- SELECT -->
                        <select name="provinsi" class="w-full pl-10 pr-10 py-3 rounded-2xl text-sm
                       bg-gray-950 text-gray-200
                       border border-gray-700
                       shadow-inner shadow-gray-900
                       focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400
                       transition-all duration-200 appearance-none cursor-pointer"
                            onchange="document.getElementById('formKota').submit()">
                            @foreach ($Provinsi as $p)
                                <option value="{{ $p->name }}" {{ request('provinsi', 'DI YOGYAKARTA') == $p->name ? 'selected' : '' }}>
                                    {{ $p->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>

            <!-- MENU -->
            <p class="text-xs uppercase text-slate-500 mt-4 mx-5 mb-1.5">Menu</p>

            <a href="/dashboard/admin"
                class="flex items-center gap-3 py-2.5 px-3 mx-3 rounded-xl transition-all duration-250 text-slate-300 hover:bg-white/10 hover:text-white
                {{ Request()->is('dashboard/admin') ? 'bg-gradient-to-br from-orange-500 to-orange-400 text-white shadow-lg shadow-orange-500/40' : '' }}">
                <i class="ph ph-squares-four text-lg"></i> Dashboard
            </a>

            <a href="/dashboard/admin/profile"
                class="flex items-center gap-3 py-2.5 px-3 mx-3 rounded-xl transition-all duration-250 text-slate-300 hover:bg-white/10 hover:text-white
                {{ Request()->is('dashboard/admin/profile') ? 'bg-gradient-to-br from-orange-500 to-orange-400 text-white shadow-lg shadow-orange-500/40' : '' }}">
                <i class="ph ph-user text-lg"></i> Profile
            </a>

            <a href="/dashboard/admin/pelamar"
                class="flex items-center gap-3 py-2.5 px-3 mx-3 rounded-xl transition-all duration-250 text-slate-300 hover:bg-white/10 hover:text-white
                {{ Request()->is('dashboard/admin/pelamar') ? 'bg-gradient-to-br from-orange-500 to-orange-400 text-white shadow-lg shadow-orange-500/40' : '' }}">
                <i class="ph ph-users text-lg"></i> Pelamar
            </a>

            <a href="/dashboard/admin/perusahaan"
                class="flex items-center gap-3 py-2.5 px-3 mx-3 rounded-xl transition-all duration-250 text-slate-300 hover:bg-white/10 hover:text-white
                {{ Request()->is('dashboard/admin/perusahaan') ? 'bg-gradient-to-br from-orange-500 to-orange-400 text-white shadow-lg shadow-orange-500/40' : '' }}">
                <i class="ph ph-buildings text-lg"></i> Perusahaan
            </a>

            <a href="/dashboard/admin/finance"
                class="flex items-center gap-3 py-2.5 px-3 mx-3 rounded-xl transition-all duration-250 text-slate-300 hover:bg-white/10 hover:text-white
                {{ Request()->is('dashboard/admin/finance') ? 'bg-gradient-to-br from-orange-500 to-orange-400 text-white shadow-lg shadow-orange-500/40' : '' }}">
                <i class="ph ph-wallet text-lg"></i> Finance
            </a>

            <a href="/dashboard/admin/tipskerja"
                class="flex items-center gap-3 py-2.5 px-3 mx-3 rounded-xl transition-all duration-250 text-slate-300 hover:bg-white/10 hover:text-white
                {{ Request()->is('dashboard/admin/tipskerja') ? 'bg-gradient-to-br from-orange-500 to-orange-400 text-white shadow-lg shadow-orange-500/40' : '' }}">
                <i class="ph ph-newspaper text-lg"></i> Tips Kerja
            </a>

            <a href="/dashboard/admin/event"
                class="flex items-center gap-3 py-2.5 px-3 mx-3 rounded-xl transition-all duration-250 text-slate-300 hover:bg-white/10 hover:text-white
                {{ Request()->is('dashboard/admin/event') ? 'bg-gradient-to-br from-orange-500 to-orange-400 text-white shadow-lg shadow-orange-500/40' : '' }}">
                <i class="ph ph-calendar text-lg"></i> Event
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

    <!-- CONTENT -->
    <div class="p-4 sm:ml-64">

        <div class="topbar flex justify-between items-center mb-6 bg-white p-4 rounded-2xl shadow-md">

            <h1 class="text-xl font-bold">{{ $title }}</h1>

            <div class="flex items-center gap-4">
                <!-- PROFILE -->
                <div class="profile-box bg-white p-2 px-3 rounded-xl shadow-sm flex items-center gap-2.5">
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->username }}"
                        class="w-10 h-10 rounded-full object-cover">
                    <div>
                        <p class="text-sm font-semibold">{{ Auth::user()->username }}</p>
                        <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                    </div>
                </div>

            </div>
        </div>

        @yield('admin-content')

    </div>

    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.5.1/flowbite.min.js"></script>

</body>

</html>