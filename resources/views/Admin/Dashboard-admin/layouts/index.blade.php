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
                <form action="/dashboard/admin" method="GET" id="formKota">
                    <select name="provinsi"
                        class="w-full px-3 py-2 text-center rounded-md bg-white text-gray-800 text-sm font-medium"
                        onchange="document.getElementById('formKota').submit()">

                        @foreach ($Provinsi as $p)
                            <option value="{{ $p->name }}" {{ request('provinsi','DI YOGYAKARTA') == $p->name ? 'selected' : '' }}>
                                {{ $p->name }}
                            </option>
                        @endforeach

                    </select>
                </form>
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
                    class="flex items-center gap-2 px-6 {{ Request()->is('dashboard/admin/profile') ? 'mx-6 py-2 my-5 rounded-md shadow bg-white text-gray-700 text-md font-medium' : 'hover:translate-x-0.5 transition-all duration-500 py-2 hover:mx-3  hover:bg-white hover:text-black rounded-lg' }}">
                    <img src="{{ asset('Icon/bussiness-man 1.png') }}" alt="">
                    <span>Profile</span>
                </a>

                <a href="/dashboard/admin/pelamar"
                    class="flex items-center gap-2 px-6 {{ Request()->is('dashboard/admin/pelamar') ? 'mx-6 py-2 my-5 rounded-md shadow bg-white text-gray-700 text-md font-medium' : 'hover:translate-x-0.5 transition-all duration-500 py-2 hover:mx-3  hover:bg-white hover:text-black rounded-lg' }}">
                    <img src="{{ asset('Icon/user-profile 1.png') }}" alt="">
                    <span>Pelamar</span>
                </a>

                <a href="/dashboard/admin/perusahaan"
                    class="flex items-center gap-2 px-6 {{ Request()->is('dashboard/admin/perusahaan') ? 'mx-6 py-2 my-5 rounded-md shadow bg-white text-gray-700 text-md font-medium' : 'hover:translate-x-0.5 transition-all duration-500 py-2 hover:mx-3  hover:bg-white hover:text-black rounded-lg' }}">
                    <img src="{{ asset('Icon/office 3.png') }}" alt="">
                    <span>Perusahaan</span>
                </a>

                <a href="/dashboard/admin/finance"
                    class="flex items-center gap-2 px-6 {{ Request()->is('dashboard/admin/finance') ? 'mx-6 py-2 my-5 rounded-md shadow bg-white text-gray-700 text-md font-medium' : 'hover:translate-x-0.5 transition-all duration-500 py-2 hover:mx-3  hover:bg-white hover:text-black rounded-lg' }}">
                    <img src="{{ asset('Icon/budget 1.png') }}" alt="">
                    <span>Finance</span>
                </a>

                <a href="/dashboard/admin/tipskerja"
                    class="flex items-center gap-2 px-6 {{ Request()->is('dashboard/admin/tipskerja') ? 'mx-6 py-2 my-5 rounded-md shadow bg-white text-gray-700 text-md font-medium' : 'hover:translate-x-0.5 transition-all duration-500 py-2 hover:mx-3  hover:bg-white hover:text-black rounded-lg' }}">
                    <img src="{{ asset('Icon/news 2.png') }}" alt="">
                    <span>Tips Kerja</span>
                </a>

                <a href="/dashboard/admin/event"
                    class="flex items-center gap-2 px-6 {{ Request()->is('dashboard/admin/event') ? 'mx-6 py-2 my-5 rounded-md shadow bg-white text-gray-700 text-md font-medium' : 'hover:translate-x-0.5 transition-all duration-500 py-2 hover:mx-3  hover:bg-white hover:text-black rounded-lg' }}">
                    <img src="{{ asset('Icon/calendar 2.png') }}" alt="">
                    <span>Event</span>
                </a>
            </div>
        </div>

        <div class="px-6 mb-6">
            <form action="/logout" method="POST">
                @csrf
                @method('DELETE')
                <button class="flex itn-out text-lg"></i>
                    <i class="ph ph-sign-out text-lg"></i>
                    <span class="pl-3">Keluar</span>
                </button>
            </form>
        </div>
    </aside>

    <div class="p-4 sm:ml-64">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold hidden lg:block md:block">{{ $title }}</h1>

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
                                                                    class="font-medium text-gray-900">{{ $pelamar->nama_pelamar }}</span>ke
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
                                                                    class="font-medium text-gray-900">{{ $pelamar->nama_pelamar }}</span>
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
                                                                <span
                                                                    class="font-semibold">{{ $lowongan->nama }}</span>
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

                <div class="flex items-center gap-2 border border-[#606060] px-3 py-2 rounded-xl shadow-sm">
                    <div>
                        @if (Auth::user()->admin->img_profile)
                            <img class="w-10 h-10 object-cover rounded-full"
                                src="{{ asset('storage/' . Auth::user()->admin->img_profile) }}" alt="">
                        @else
                            <img class="w-10 h-10 rounded-full"
                                src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                                alt="">
                        @endif
                    </div>
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
