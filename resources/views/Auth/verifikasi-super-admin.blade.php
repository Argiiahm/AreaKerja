<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verifikasi Super Admin</title>
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
                    <a href="/login/admin"
                        class="px-8 py-4 w-52 border-2 border-white text-white font-bold rounded-full bg-transparent hover:bg-white/20 hover:-translate-y-1 transition-all duration-500  text-center">
                        Masuk
                    </a>
                </div>
            </div>


        </div>
        <div class="col-span-3 flex justify-center items-center bg-white ">
            <div class="w-full max-w-md bg-white shadow-md rounded-xl p-8">
                <h2 class="text-2xl font-bold text-center mb-2">Verifikasi Akun</h2>
                <p class="text-gray-500 text-center mb-6">
                    kata sandi Anda akan diatur ulang melalui email
                </p>

                <form action="" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-semibold mb-1">E-mail</label>
                        <input type="email" id="email" name="email" required
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-gray-500"
                            placeholder="E-mail">
                    </div>

                    <button type="submit"
                        class="w-full bg-gray-700 text-white font-semibold py-2 rounded-lg hover:bg-gray-800 transition">
                        Lanjutkan
                    </button>

                    <a href="/login/admin"
                        class="block text-center text-gray-500 font-semibold mt-2 hover:underline">
                        Kembali
                    </a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
