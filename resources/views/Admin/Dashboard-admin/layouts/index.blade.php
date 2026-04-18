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
        body {
            background: #f1f5f9;
            font-family: 'Inter', sans-serif;
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
        }

        /* NOTIF */
        #notif {
            border-radius: 14px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        #notif ul li:hover {
            background: #f8fafc;
        }

        /* MODAL IMAGE */
        .modal {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 1000;
            background: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
        }

        .modal img {
            max-width: 90%;
            max-height: 90%;
            border-radius: 12px;
        }

        .profile-img {
            width: 100px;
            height: 100px;
            border-radius: 999px;
            object-fit: cover;
            cursor: pointer;
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
</head>

<body>

    <!-- MOBILE BUTTON -->
    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" class="p-2 m-3 sm:hidden">
        <i class="ph ph-list text-2xl"></i>
    </button>

    <!-- SIDEBAR -->
    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen flex flex-col justify-between">

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
                        <span class="absolute -top-2 left-3 bg-[#0f172a] px-1 text-[10px] text-gray-400">
                            Pilih Provinsi
                        </span>

                        <!-- SELECT -->
                        <select name="provinsi"
                            class="w-full pl-10 pr-10 py-3 rounded-2xl text-sm 
                       bg-[#020617] text-gray-200
                       border border-gray-700 
                       shadow-[inset_0_1px_2px_rgba(0,0,0,0.4)]
                       focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400
                       transition-all duration-200 appearance-none cursor-pointer"
                            onchange="document.getElementById('formKota').submit()">
                            @foreach ($Provinsi as $p)
                                <option value="{{ $p->name }}"
                                    {{ request('provinsi', 'DI YOGYAKARTA') == $p->name ? 'selected' : '' }}>
                                    {{ $p->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>

            <!-- MENU -->
            <p>Menu</p>

            <a href="/dashboard/admin" class="{{ Request()->is('dashboard/admin') ? 'active' : '' }}">
                <i class="ph ph-squares-four"></i> Dashboard
            </a>

            <a href="/dashboard/admin/profile" class="{{ Request()->is('dashboard/admin/profile') ? 'active' : '' }}">
                <i class="ph ph-user"></i> Profile
            </a>

            <a href="/dashboard/admin/pelamar" class="{{ Request()->is('dashboard/admin/pelamar') ? 'active' : '' }}">
                <i class="ph ph-users"></i> Pelamar
            </a>

            <a href="/dashboard/admin/perusahaan"
                class="{{ Request()->is('dashboard/admin/perusahaan') ? 'active' : '' }}">
                <i class="ph ph-buildings"></i> Perusahaan
            </a>

            <a href="/dashboard/admin/finance" class="{{ Request()->is('dashboard/admin/finance') ? 'active' : '' }}">
                <i class="ph ph-wallet"></i> Finance
            </a>

            <a href="/dashboard/admin/tipskerja"
                class="{{ Request()->is('dashboard/admin/tipskerja') ? 'active' : '' }}">
                <i class="ph ph-newspaper"></i> Tips Kerja
            </a>

            <a href="/dashboard/admin/event" class="{{ Request()->is('dashboard/admin/event') ? 'active' : '' }}">
                <i class="ph ph-calendar"></i> Event
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

        <div class="topbar flex justify-between items-center mb-6">

            <h1 class="text-xl font-bold">{{ $title }}</h1>

            <div class="flex items-center gap-4">

                <!-- NOTIF -->
                <button id="notifikasi">
                    <i class="ph ph-bell text-xl"></i>
                </button>

                <!-- PROFILE -->
                <div class="profile-box">
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->username }}">
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
