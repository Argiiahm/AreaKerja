<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AreaKerja.com | Admin Dashboard</title>
    <link rel="shortcut icon" href="{{ asset('image/logo-areakerja.png') }}" type="image/x-icon">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50">
    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
        type="button"
        class="inline-flex items-center p-2 mt-4 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none">
        <i class="ph ph-list text-xl"></i>
        <span class="sr-only">Open sidebar</span>
    </button>

    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-[#606060] text-white flex flex-col justify-between"
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

            <div class="mt-4 px-6">
                <div class="w-full px-3 py-2 text-center rounded-md bg-white text-gray-800 text-sm font-medium">
                    Yogyakarta
                </div>
            </div>

            <div>
                <p class="px-6 my-5 text-sm font-semibold text-white/70">Umum</p>
                <a href="/dashboard/admin"
                    class="flex items-center gap-2 px-6 {{ Request()->is('dashboard/admin') ? 'mx-6 py-2 my-5 rounded-md shadow bg-white text-gray-700 text-md font-medium' : '' }}">

                    @if (Request()->is('dashboard/admin'))
                        <img src="{{ asset('Icon/dashboard-icon-black.png') }}" alt="">
                    @else
                        <img src="{{ asset('Icon/dashboard-icon.png') }}" alt="">
                    @endif

                    <span>Dashboard</span>
                </a>  
            </div>


            <div class="space-y-3">
                <p class="px-6 text-sm my-5 font-semibold text-white/70">Finance</p>

                <a href="/dashboard/admin/profile"
                    class="flex items-center gap-2 px-6 {{ Request()->is('dashboard/admin/profile') ? 'mx-6 py-2 my-5 rounded-md shadow bg-white text-gray-700 text-md font-medium' : '' }}">
                    <img src="{{ asset('Icon/bussiness-man 1.png') }}" alt="">
                    <span>Profile</span>
                </a>

                <a href="/dashboard/pelamar" class="flex items-center gap-2 px-6 py-2 rounded-md">
                    <img src="{{ asset('Icon/user-profile 1.png') }}" alt="">
                    <span>Pelamar</span>
                </a>

                <a href="/dashboard/perusahaan" class="flex items-center gap-2 px-6 py-2 rounded-md">
                    <img src="{{ asset('Icon/office 3.png') }}" alt="">
                    <span>Perusahaan</span>
                </a>

                <a href="/dashboard/finance" class="flex items-center gap-2 px-6 py-2 rounded-md">
                    <img src="{{ asset('Icon/budget 1.png') }}" alt="">
                    <span>Finance</span>
                </a>

                <a href="/dashboard/tips" class="flex items-center gap-2 px-6 py-2 rounded-md">
                    <img src="{{ asset('Icon/news 2.png') }}" alt="">
                    <span>Tips Kerja</span>
                </a>

                <a href="/dashboard/event" class="flex items-center gap-2 px-6 py-2 rounded-md">
                    <img src="{{ asset('Icon/calendar 2.png') }}" alt="">
                    <span>Event</span>
                </a>
            </div>
        </div>

        <div class="px-6 mb-6">
            <a href="/logout" class="flex items-center gap-2 hover:text-gray-200">
                <i class="ph ph-sign-out text-lg"></i>
                <span>Keluar</span> 
            </a>
        </div>
    </aside>

    <div class="p-4 sm:ml-64">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold hidden lg:block md:block">{{ $title }}</h1>

            <div class="flex items-center px-8 gap-4">
                <button class="relative">
                    <i class="ph ph-bell text-2xl text-[#606060]"></i>
                    <span
                        class="absolute -top-1 -right-1 bg-red-500 text-white text-xs px-1.5 py-0.5 rounded-full">3</span>
                </button>

                <div class="flex items-center gap-2 border border-[#606060] px-3 py-2 rounded-xl shadow-sm">
                    <div>
                        <img src="https://newprofilepic.photo-cdn.net//assets/images/article/profile.jpg?90af0c8"
                            alt="Profile" class="w-8 h-9 rounded-full">
                    </div>
                    <div>
                        <p class="text-sm font-semibold">Rehan Roblox</p>
                        <p class="text-xs text-gray-500">admin@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
        @yield('admin-content')
    </div>

</body>

</html>
