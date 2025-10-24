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
                        <a href="/dashboard/finance" data-drawer-hide="logo-sidebar"
                            class="flex items-center gap-2 px-6 
                                {{ Request()->is('dashboard/finance')
                                    ? 'mx-6 py-2 my-2 rounded-md shadow bg-white text-orange-600 font-medium'
                                    : 'hover:translate-x-0.5 transition-all duration-500 py-2 hover:mx-3 hover:bg-white hover:text-black rounded-lg' }}">
                            <i class="ph ph-gauge"></i>
                            <span>Dashboard</span>
                        </a>
                    </div>

                    <div>
                        <p class="px-6 text-sm font-semibold text-white/80 my-3">Finance</p>

                        <a href="/dashboard/finance/paketharga" data-drawer-hide="logo-sidebar"
                            class="flex items-center gap-2 px-6 
                                {{ Request()->is('dashboard/finance/paketharga')
                                    ? 'mx-6 py-2 my-2 rounded-md shadow bg-white text-orange-600 font-medium'
                                    : 'hover:translate-x-0.5 transition-all duration-500 py-2 hover:mx-3 hover:bg-white hover:text-black rounded-lg' }}">
                            <i class="ph ph-credit-card"></i>
                            <span>Paket Harga</span>
                        </a>

                        <a href="/dashboard/finance/omset" data-drawer-hide="logo-sidebar"
                            class="flex items-center gap-2 px-6 
                                {{ Request()->is('dashboard/finance/omset')
                                    ? 'mx-6 py-2 my-2 rounded-md shadow bg-white text-orange-600 font-medium'
                                    : 'hover:translate-x-0.5 transition-all duration-500 py-2 hover:mx-3 hover:bg-white hover:text-black rounded-lg' }}">
                            <i class="ph ph-hand-coins"></i>
                            <span>Omset Perusahaan</span>
                        </a>

                        <details class="group">
                            <summary
                                class="flex items-center gap-2 px-6 cursor-pointer
                                    {{ Request()->is('dashboard/finance/catatantransaksi')
                                        ? 'mx-6 py-2 my-2 rounded-md shadow bg-white text-orange-600 font-medium'
                                        : 'hover:translate-x-0.5 transition-all duration-500 py-2 hover:mx-3 hover:bg-white hover:text-black rounded-lg' }}">
                                <i class="ph ph-notebook"></i>
                                <span>Catatan Transaksi</span>
                                <span class="ml-auto transition-transform group-open:rotate-180">▼</span>
                            </summary>
                            <div class="ml-12 mt-2 flex flex-col gap-1">
                                <a href="/dashboard/finance/catatantransaksi/tunai"
                                    class="flex items-center gap-2 px-6 
                                        {{ Request()->is('dashboard/finance/catatantransaksi/tunai')
                                            ? 'mx-6 py-2 my-2 rounded-md shadow bg-white text-orange-600 font-medium'
                                            : 'hover:translate-x-0.5 transition-all duration-500 py-2 hover:mx-3 hover:bg-white hover:text-black rounded-lg' }}">
                                    Riwayat Tunai
                                </a>
                                <a href="/dashboard/finance/catatantransaksi/koin"
                                    class="flex items-center gap-2 px-6 
                                        {{ Request()->is('dashboard/finance/catatantransaksi/koin')
                                            ? 'mx-6 py-2 my-2 rounded-md shadow bg-white text-orange-600 font-medium'
                                            : 'hover:translate-x-0.5 transition-all duration-500 py-2 hover:mx-3 hover:bg-white hover:text-black rounded-lg' }}">
                                    Riwayat Koin
                                </a>
                            </div>
                        </details>

                        <a href="/dashboard/finance/laporan" data-drawer-hide="logo-sidebar"
                            class="flex items-center gap-2 px-6 
                                {{ Request()->is('dashboard/finance/laporan')
                                    ? 'mx-6 py-2 my-2 rounded-md shadow bg-white text-orange-600 font-medium'
                                    : 'hover:translate-x-0.5 transition-all duration-500 py-2 hover:mx-3 hover:bg-white hover:text-black rounded-lg' }}">
                            <i class="ph ph-file-text"></i>
                            <span>Laporan Transaksi</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="px-6 mb-6">
                <form action="/logout" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" data-drawer-hide="logo-sidebar"
                        class="flex items-center gap-2 hover:translate-x-0.5 transition-all duration-500 py-2 hover:mx-3 hover:bg-white hover:text-black rounded-lg px-6">
                        <i class="ph ph-sign-out"></i>
                        <span>Keluar</span>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <div class="p-4 sm:ml-64">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold hidden lg:block md:block">{{ $title }}</h1>

            <div class="flex items-center px-8 gap-4">
                <button id="notifBtn" class="relative focus:outline-none">
                    <i class="ph ph-bell text-2xl text-orange-500"></i>
                    @foreach ($NotifTfMasuk as $nm)
                        <span
                            class="absolute -top-1 -right-1 bg-red-500 text-white text-xs px-1.5 py-0.5 rounded-full">{{ $nm->where('status', 'pending')->count() }}</span>
                    @endforeach
                </button>

                <div id="notifDropdown"
                    class="hidden absolute right-2 mt-32 w-96 bg-white rounded-2xl shadow-xl border border-gray-100 z-50">
                    <div class="flex justify-between items-center p-4 border-b">
                        <h2 class="text-base font-semibold text-gray-700">Notifikasi</h2>
                    </div>

                    <div class="p-4 space-y-4 max-h-72 overflow-y-auto">
                        <div class="flex space-x-3 items-start">
                            <div class="flex-1">
                                @foreach ($NotifTfMasuk as $nmd)
                                    @if ($nmd->status === 'pending')
                                        <p class="text-sm text-gray-700 leading-snug">
                                            <span class="font-semibold text-gray-800">Ada Transaksi Masuk!, Dari
                                                <span
                                                    class="text-green-500 font-bold">{{ $nmd->dari }}</span></span>
                                        </p>
                                        <p class="text-xs text-gray-400 mt-1">{{ $nmd->created_at->diffForHumans() }}
                                        </p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-2 border border-orange-300 px-3 py-2 rounded-xl shadow-sm">
                    <div>
                        @if (Auth::user()->finance->img_profile)
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
                    </div>
                    <div>
                        <p class="text-sm font-semibold">{{ Auth::user()->username }}</p>
                        <p class="text-sm font-normal">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>
        </div>

        @yield('finance-content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script>
        const notifBtn = document.getElementById('notifBtn');
        const notifDropdown = document.getElementById('notifDropdown');

        notifBtn.addEventListener('click', () => {
            notifDropdown.classList.toggle('hidden');
        });

        document.addEventListener('click', (e) => {
            if (!notifBtn.contains(e.target) && !notifDropdown.contains(e.target)) {
                notifDropdown.classList.add('hidden');
            }
        });
    </script>
</body>

</html>
