<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
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
        .login_img_section {
            background: linear-gradient(rgba(2, 2, 2, .7), rgba(0, 0, 0, .7)),
                url('/image/login-bg-1.jpg');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="grid grid-cols-1 md:grid-cols-5 min-h-screen">

        <div class="col-span-3 flex justify-center items-center bg-white">
            <div class="w-10/12 md:w-full px-8 lg:w-10/12">
                <div
                    class="flex  items-center mb-6 transform translate-x-[-2rem] lg:translate-x-[-2rem] md:translate-x-[-2rem]">
                    <img class="w-10 h-10" src="{{ asset('image/logo-areakerja.png') }}" alt="Logo" class="w-20">
                    <span class=" font-semibold text-[#fa6601]">AreaKerja.com</span>
                </div>
                <div class="w-full">
                    <h1 class=" font-bold text-2xl mb-4 text-center text-[#fa6601]">Buat Akun</h1>
                    <div class="flex gap-3 justify-center mb-6">
                        <a href="#"
                            class="w-10 h-10 border border-gray-500 rounded-full flex items-center justify-center text-black hover:bg-orange-600 hover:-translate-y-1 duration-500">
                            <i class="ph ph-facebook-logo"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 border border-gray-500 rounded-full flex items-center justify-center text-black hover:bg-orange-600 hover:-translate-y-1 duration-500">
                            <i class="ph ph-google-logo"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 border border-gray-500 rounded-full flex items-center justify-center text-black hover:bg-orange-600 hover:-translate-y-1 duration-500">
                            <i class="ph ph-linkedin-logo"></i>
                        </a>
                    </div>

                    <div class="flex justify-center mb-6">
                        <div class="flex bg-gray-200 rounded-full w-max p-1">
                            <button id="pelamar"
                                class="px-4 py-2 rounded-full bg-orange-500 text-white font-semibold">
                                Pelamar
                            </button>
                            <button id="perusahaan" class="px-4 py-2 rounded-full font-semibold">
                                Perusahaan
                            </button>
                        </div>
                    </div>

                    <!-- form regist Pelamar -->
                    <form id="form-pelamar" action="/buat" method="POST">
                        @csrf
                        <label for="name" class="font-semibold">Nama Pengguna</label>
                        <div class="flex items-center border-2 mt-2 mb-4 py-2 px-3">
                            <input id="name" class="pl-2 w-full outline-none border-none" type="text"
                                name="username" placeholder="Nama Pengguna" />
                        </div>

                        <label for="email" class="font-semibold">E-Mail</label>
                        <div class="flex items-center border-2 mt-2 mb-4 py-2 px-3">
                            <input id="email" class="pl-2 w-full outline-none border-none" type="email"
                                name="email" placeholder="E-Mail" />
                        </div>

                        <label for="tlp" class="font-semibold">No. Tlp</label>
                        <div class="flex items-center border-2 mt-2 mb-4 py-2 px-3">
                            <input id="tlp" class="pl-2 w-full outline-none border-none" type="text"
                                name="telepon_pelamar" placeholder="No. Tlp" />
                        </div>

                        <input id="text" class="pl-2 w-full outline-none border-none" type="hidden" name="role"
                            value="pelamar" />

                        <label for="password" class="font-semibold">Kata Sandi</label>

                        <div class="flex items-center border-2 py-2 mt-2 px-3 mb-3">
                            <input class="pl-2 w-full outline-none border-none" type="password" name="password"
                                id="password" placeholder="Kata Sandi" />
                        </div>

                        <div class="flex items-center justify-center mb-4">
                            <label class="flex items-center text-gray-500 font-semibold">
                                <input type="checkbox" class="mr-2 border" required>
                                <span class="text-[12px] text-black">saya menyetujui <a class="text-[#fa6601]">syarat
                                        dan ketentuan</a> yang
                                    berlaku</span>
                            </label>
                        </div>

                        <div class="flex justify-center">
                            <button type="submit"
                                class="w-52 bg-[#fa6601] mt-3 py-4 rounded-full hover:-translate-y-1 transition-all duration-500 text-white font-semibold">
                                DAFTAR
                            </button>
                        </div>
                    </form>

                    <!-- form login perusahaan -->
                    <form id="form-perusahaan" class="hidden">
                        <label for="name" class="font-semibold">Nama Perusahaan</label>
                        <div class="flex items-center border-2 mt-2 mb-4 py-2 px-3">
                            <input id="name" class="pl-2 w-full outline-none border-none" type="text"
                                name="name" placeholder="Nama Perusahaan" />
                        </div>

                        <label for="email" class="font-semibold">E-Mail</label>
                        <div class="flex items-center border-2 mt-2 mb-4 py-2 px-3">
                            <input id="email" class="pl-2 w-full outline-none border-none" type="email"
                                name="email" placeholder="E-Mail" />
                        </div>

                        <label for="phone" class="font-semibold">No. Tlp Perusahaan</label>
                        <div class="flex items-center border-2 mt-2 mb-4 py-2 px-3">
                            <input id="phone" class="pl-2 w-full outline-none border-none" type="number"
                                name="phone" placeholder="No. Tlp Perusahaan" />
                        </div>

                        <label for="password" class="font-semibold">Kata Sandi</label>
                        <div class="flex items-center border-2 py-2 mt-2 px-3 mb-3">
                            <input class="pl-2 w-full outline-none border-none" type="password" name="password"
                                id="password" placeholder="Kata Sandi" />
                        </div>

                        <div class="flex items-center justify-center mb-4">
                            <label class="flex items-center text-gray-500 font-semibold">
                                <input type="checkbox" class="mr-2 border" required>
                                <span class="text-[12px] text-black">saya menyetujui <a class="text-[#fa6601]">syarat
                                        dan ketentuan</a> yang
                                    berlaku</span>
                            </label>
                        </div>

                        <div class="flex justify-center">
                            <button type="submit"
                                class="w-52 bg-[#fa6601] mt-3 py-4 rounded-full hover:-translate-y-1 transition-all duration-500 text-white font-semibold">
                                DAFTAR
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <div class="col-span-2 login_img_section hidden md:flex items-center justify-center">
            <div class="relative h-screen flex flex-col items-center justify-center pt-1 max-w-md mx-auto">

                <h1 class="text-white font-bold text-4xl font-sans text-center mb-8">Hallo, Pekerja</h1>
                <p class="text-white mt-1 text-center font-semibold">
                    Untuk tetap terhubung dengan kami, silahkan
                </p>
                <p class="text-white mb-3 font-semibold">
                    masuk dengan informasi pribadi anda
                </p>

                <div class="flex justify-center mt-6">
                    <a href="/login"
                        class="px-8 py-4 w-52 border-2 border-white text-white font-bold rounded-full bg-transparent hover:bg-white/20 hover:-translate-y-1 transition-all duration-500  text-center">
                        Masuk
                    </a>
                </div>
            </div>
        </div>

    </div>
    <script src="{{ asset('js/Auth.js') }}"></script>
</body>

</html>
