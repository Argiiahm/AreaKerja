<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AreaKerja.com | Finance Dashboard</title>
    <link rel="shortcut icon" href="{{ asset('image/logo-areakerja.png') }}" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css" />

    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')

    <style>
        .drawer-backdrop {
            display: none !important;
        }
    </style>
</head>


<body class="bg-gray-50">

    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" data-drawer-backdrop="false"
        aria-controls="logo-sidebar" type="button"
        class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-200">
        <span class="sr-only">Open sidebar</span>
        <i class="ph ph-list text-2xl"></i>
    </button>

    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar">

        <div class="w-64 h-screen bg-orange-500 text-white flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between px-6 py-4">
                    <div class="flex items-center gap-2">
                        <img src="{{ asset('image/logo_area_kerja_putih.png') }}" alt="Logo" class="w-16 h-16">
                        <span class="font-bold">areakerja.com</span>
                    </div>
                    <button data-drawer-hide="logo-sidebar" aria-controls="logo-sidebar" type="button"
                        class="text-white hover:text-gray-200 lg:hidden  md:hidden">
                        <i class="ph ph-x text-2xl"></i>
                    </button>
                </div>
                <hr class="border-b mx-4">

                <div class="mt-4 space-y-4">
                    <div>
                        <p class="px-6 text-sm font-semibold text-white/80">Umum</p>
                        <a href="#" data-drawer-hide="logo-sidebar"
                            class="flex items-center gap-2 px-6 py-2 mt-2 mx-4 rounded-md transition-all duration-300
                                  bg-white text-orange-600 font-semibold shadow-md">
                            <i class="ph ph-gauge"></i>
                            <span>Dashboard</span>
                        </a>
                    </div>

                    <div>
                        <p class="px-6 text-sm font-semibold text-white/80">Finance</p>

                        <a href="#" data-drawer-hide="logo-sidebar"
                            class="flex items-center gap-2 px-6 py-2 rounded-md transition-all duration-300 hover:bg-orange-600 hover:translate-x-1">
                            <i class="ph ph-credit-card"></i>
                            <span>Paket Harga</span>
                        </a>

                        <a href="#" data-drawer-hide="logo-sidebar"
                            class="flex items-center gap-2 px-6 py-2 rounded-md transition-all duration-300 hover:bg-orange-600 hover:translate-x-1">
                            <i class="ph ph-hand-coins"></i>
                            <span>Omset Perusahaan</span>
                        </a>

                        <a href="#" data-drawer-hide="logo-sidebar"
                            class="flex items-center gap-2 px-6 py-2 rounded-md transition-all duration-300 hover:bg-orange-600 hover:translate-x-1">
                            <i class="ph ph-notebook"></i>
                            <span>Catatan Transaksi</span>
                        </a>

                        <a href="#" data-drawer-hide="logo-sidebar"
                            class="flex items-center gap-2 px-6 py-2 rounded-md transition-all duration-300 hover:bg-orange-600 hover:translate-x-1">
                            <i class="ph ph-file-text"></i>
                            <span>Laporan Transaksi</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="px-6 mb-6">
                <a href="#" data-drawer-hide="logo-sidebar" class="flex items-center gap-2 hover:text-gray-200">
                    <i class="ph ph-sign-out"></i>
                    <span>Keluar</span>
                </a>
            </div>
        </div>
    </aside>

    <div class="p-4 sm:ml-64">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold hidden lg:block md:block">Dashboard</h1>

            <div class="flex items-center px-8 gap-4">
                <button class="relative">
                    <i class="ph ph-bell text-2xl text-orange-500"></i>
                    <span
                        class="absolute -top-1 -right-1 bg-red-500 text-white text-xs px-1.5 py-0.5 rounded-full">3</span>
                </button>

                <div class="flex items-center gap-2 border border-orange-300 px-3 py-2 rounded-xl shadow-sm">
                    <div>
                        <img src="{{ asset('Icon/seveninc2.png') }}" alt="Profile" class="w-8 h-9">
                    </div>
                    <div>
                        <p class="text-sm font-semibold">Seven Inc</p>
                        <p class="text-xs text-gray-500">financeseven@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>

        @yield('finance-content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
