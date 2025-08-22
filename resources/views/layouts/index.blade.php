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
    @vite('resources/css/app.css')
</head>

<body>

    @include('Popup.pop-up_logout')

    <nav class="bg-white fixed w-full z-20 top-0 start-0 border-b border-gray-200">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <div class="flex items-center gap-2">
                <img src="{{ asset('image/logo-areakerja.png') }}" class="w-20 h-20 " alt="Flowbite Logo">
                <span class="self-center text-2xl font-bold text-[#fa6601]">areakerja.com</span>
            </div>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <div class="hidden lg:flex md:flex items-center gap-8">
                    {{-- Notifikasi --}}
                    <button type="button" id="notifikasi" aria-expanded="false" data-dropdown-toggle="notif"
                        data-dropdown-placement="bottom">
                        <span class="sr-only">Open user menu</span>
                        <i class="ph-fill text-[#fa6601] ph-bell text-3xl"></i>
                    </button>

                    {{-- Dropdown Notifikasi Nya --}}
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-lg"
                        id="notif">
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
                    {{-- End Drowpdown --}}
                    {{-- End Notifikasi --}}

                    {{-- @if (Auth::check()) --}}
                    {{-- Profile --}}
                    <button type="button" id="user-menu-button" aria-expanded="false"
                        data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-10 h-10 rounded-full"
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSdjmL3nLNv9HOqsLUu6f2A8I0o6uRSDI3RyFeyhipqbyJGhzu_Xm0bjws4wT29JD5dTsU&usqp=CAU"
                            alt="">
                    </button>

                    {{-- Dropdown Profile Nya --}}
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-lg"
                        id="user-dropdown">
                        <div class="flex items-center gap-2 mx-3">
                            <img class="w-10 h-10 rounded-full"
                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSdjmL3nLNv9HOqsLUu6f2A8I0o6uRSDI3RyFeyhipqbyJGhzu_Xm0bjws4wT29JD5dTsU&usqp=CAU"
                                alt="">
                            <div class="px-4 py-3">
                                <span class="block text-sm text-gray-900">Bonnie Green</span>
                                <span
                                    class="block text-sm  text-gray-500 truncate dark:text-gray-400">Bonnie@gmail.com</span>
                            </div>
                        </div>
                        <ul class="py-2" aria-labelledby="user-menu-button">
                            <li>
                                <a href="/profile" class="block px-4 py-2 text-sm">Profile</a>
                            </li>
                            <li>
                                <a href="/lowongan/tersimpan" class="block px-4 py-2 text-sm">Lowongan Tersimpan</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm">Transaksi</a>
                            </li>
                            <li>
                                <a href="/bantuan" class="block px-4 py-2 text-sm">Bantuan</a>
                            </li>
                            <li class="flex justify-center bg-orange-500 px-4 py-1 text-white mx-5 my-3 rounded-md">
                                <button data-modal-target="popup-modal-logout" data-modal-toggle="popup-modal-logout"  type="button">
                                    Keluar
                                </button>
                            </li>
                        </ul>
                    </div>
                    {{-- End Drowpdown --}}

                    {{-- End Profile --}}
                    {{-- @else --}}
                    {{-- Link Login --}}
                    <a href="/login" class="text-white bg-[#fa6601] px-10 py-2 rounded-lg cursor-pointer">Masuk</a>
                    {{-- End Link Login --}}
                    {{-- @endif --}}


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
                    <li class="flex lg:hidden md:hidden justify-between items-center mt-4">
                        {{-- Notifikasi --}}
                        <button type="button" id="notifikasi" aria-expanded="false" data-dropdown-toggle="notif-hp"
                            data-dropdown-placement="bottom">
                            <span class="sr-only">Open user menu</span>
                            <i class="ph-fill text-[#fa6601] ph-bell text-3xl"></i>
                        </button>

                        {{-- Dropdown Notifikasi Nya --}}
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

                        {{-- End Drowpdown --}}
                        {{-- End Notifikasi --}}
                        <button type="button"
                            class="text-white bg-[#fa6601] px-10 py-2 rounded-lg cursor-pointer">Masuk</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')


    <footer class="bg-orange-500  text-white py-10 mt-32">
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
                    <li><a href="#" class="hover:underline">Beranda</a></li>
                    <li><a href="#" class="hover:underline">Provinsi Lainnya</a></li>
                    <li><a href="#" class="hover:underline">Tips Kerja</a></li>
                    <li><a href="#" class="hover:underline">Pasang Lowongan</a></li>
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
                <a href="#" class="p-2 border border-orange-200 rounded text-white hover:bg-orange-600">
                    <i class="ph ph-facebook-logo"></i>
                </a>
                <a href="#" class="p-2 border border-orange-200 rounded text-white hover:bg-orange-600">
                    <i class="ph ph-instagram-logo"></i>
                </a>
                <a href="#" class="p-2 border border-orange-200 rounded text-white hover:bg-orange-600">
                    <i class="ph ph-twitter-logo"></i>
                </a>
                <a href="#" class="p-2 border border-orange-200 rounded text-white hover:bg-orange-600">
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
</body>

</html>
