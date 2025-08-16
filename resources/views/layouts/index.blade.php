<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css" />
    @vite('resources/css/app.css')
</head>

<body>
    <nav class="bg-white fixed w-full z-20 top-0 start-0 border-b border-gray-200">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <div class="flex items-center gap-2">
                <img src="{{ asset('image/logo-areakerja.png') }}" class="w-20 h-20 " alt="Flowbite Logo">
                <span class="self-center text-2xl font-bold text-[#fa6601]">areakerja.com</span>
            </div>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <div class="hidden lg:flex md:flex items-center gap-8">
                    <i class="ph-fill text-[#fa6601] ph-bell text-3xl"></i>
                    <a href=""
                        class="text-white bg-[#fa6601] px-10 py-2 rounded-lg cursor-pointer">Masuk</a>
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
                <ul
                    class="flex flex-col p-4 md:p-0 mt-4 font-medium md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 ">
                    <li>
                        <a href="#" class="block py-2 px-3 text-[#fa6601] font-semibold"
                            aria-current="page">Beranda</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-[#fa6601] font-semibold">Talent Hunter</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-[#fa6601] font-semibold">Tips Kerja</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-[#fa6601] font-semibold">Daftar Kandidat</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-[#fa6601] font-semibold">Pasang Lowongan</a>
                    </li>
                    <li class="flex lg:hidden md:hidden justify-between items-center mt-4">
                        <i class="ph-fill text-[#fa6601] ph-bell text-3xl"></i>
                        <button type="button"
                            class="text-white bg-[#fa6601] px-10 py-2 rounded-lg cursor-pointer">Masuk</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="container max-w-screen-lg mx-auto pt-40">
        @yield('content')
    </section>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
