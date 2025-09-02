<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
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
            background: linear-gradient(rgba(2, 2, 2, .7), rgba(0, 0, 0, .7)), url('/image/login-bg-1.jpg');
            background-size: cover;
            background-position: center;
            ;
        }
    </style>
</head>

<body>
    <div class="grid grid-cols-1 md:grid-cols-5 min-h-screen">
        <div class="col-span-2 login_img_section hidden md:flex items-center justify-center">
            <div class="relative h-screen flex flex-col items-center justify-center pt-1 max-w-md mx-auto w-full">
                <div class="absolute top-4 left-6 flex items-center text-white">
                    <img class="w-10" src="{{ asset('image/logo_area_kerja_putih.png') }}" alt="">
                    <span class="ml-2 font-semibold">AreaKerja.com</span>
                </div>
                <h1 class="text-white font-bold text-4xl font-sans text-center mb-8">Super Admin Area Kerja</h1>
                <p class="text-white mt-1 text-center font-semibold">
                    Untuk tetap terhubung dengan kami, silahkan
                </p>
                <p class="text-white mb-3 font-semibold">
                    masuk dengan informasi pribadi anda
                </p>
                <div class="flex justify-center mt-6">
                    <a href="/register/admin"
                        class="px-8 py-4 w-52 border-2 border-white text-white font-bold rounded-full bg-transparent hover:bg-white/20 hover:-translate-y-1 transition-all duration-500  text-center">
                        Daftar
                    </a>
                </div>
            </div>


        </div>
        <div class="col-span-3 flex justify-center items-center bg-white ">
            <div class="w-10/12 px-8 md:w-full lg:w-10/12">
                <div class="w-full">
                    <h1 class="text-gray-800 font-bold text-2xl mb-3 text-center">Masuk</h1>
                    <div class="flex gap-3 mt-4 md:mt-0 justify-center">
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

                    <p class="text-sm font-normal text-gray-600 mb-8 text-center mt-3">gunakan email anda untuk
                        pendaftaran
                    </p>
                    <form class="" action="/login/super/admin/masuk" method="POST">
                        @csrf 
                        <label for="name" class="font-semibold ">Nama Pengguna</label>
                        <div class="flex items-center border-2 mt-2 mb-8 py-2 px-3">
                            <input id="nama_lengkap" class=" pl-2 w-full outline-none border-none" type="text" name="username"
                                placeholder="Nama Pengguna" required autofocus />
                        </div>
                        <label for="password" class="font-semibold">Kata Sandi</label>
                        <div class="flex items-center border-2 py-2 mt-2 px-3 mb-3">
                            <input class="pl-2 w-full outline-none border-none" type="password" name="password"
                                id="password" placeholder="Kata Sandi" required />
                        </div>
                        <div>
                            <input type="checkbox" name="" id="" class="border">
                            <label for="" class="font-semibold text-gray-500 pl-1 md:">ingat saya </label>
                            <a href="/verifikasi/admin" class="float-right font-semibold text-[#fa6601] lg:px-4">Lupa
                                Kata
                                Sandi</a>
                        </div>
                        <div class="flex justify-center">
                            <button type="submit"
                                class="w-52  bg-[#fa6601] mt-5 py-4 rounded-full hover:bg-[#fa6601] hover:-translate-y-1 transition-all duration-500 text-white font-semibold mb-2">MASUK</button>
                        </div>
                        <div class="flex justify-center mt-4">
                            <span class="font-semibold text-black">Tidak Memiliki Acount? <a href="/register/super/admin"
                                    class="text-[#fa6601] font-semibold">Daftar Sekarang</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
