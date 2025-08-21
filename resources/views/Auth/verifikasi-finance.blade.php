<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verifikasi Finance</title>
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

<body class="bg-orange-500">
    <div class="grid grid-cols-1 md:grid-cols-5 min-h-screen md:block lg:grid">
        <div class="col-span-2 bg-orange-500 hidden md:flex items-center justify-center">
            <div
                class="relative h-[600px] flex flex-col items-center justify-center pt-1 max-w-md mx-auto w-full bg-orange-500">
                <div class="absolute top-4 left-6 flex items-center text-white">
                    <img class="w-10" src="{{ asset('image/logo_area_kerja_putih.png') }}" alt="">
                    <span class="ml-2 font-semibold">AreaKerja.com</span>
                </div>
                <h1 class="text-white font-bold text-2xl font-sans text-center mb-2">Selamat Datang Kembali !</h1>
                <h1 class="text-white font-bold text-2xl font-sans text-center mb-2">Finance Area Kerja</h1>
                <img src="{{ asset('image/bg-login-finance.png') }}" alt="" class="w-80">
                <div class="flex justify-center mt-6">
                    <a href="/login/finance"
                        class="px-8 py-4 w-52 border-2 border-white text-white font-bold rounded-full bg-transparent hover:bg-white/20 hover:-translate-y-1 transition-all duration-500  text-center">
                        Masuk
                    </a>
                </div>
            </div>
        </div>
        <div class="col-span-3 flex justify-center items-center bg-orange-500 ">
            <div class="bg-white rounded-2xl w-10/12 py-5 px-8 md:w-full lg:w-9/12 lg:py-28 lg:px-20 md:py-24">
                <div class="w-full">
                <h2 class="text-2xl font-bold text-center mb-2 text-[#fa6601]">Verifikasi Akun</h2>
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
                        class="w-full bg-[#fa6601] text-white font-semibold py-2 rounded-lg hover:bg-gray-800 transition">
                        Lanjutkan
                    </button>

                    <a href="/login/admin"
                        class="block text-center text-[#fa6601] font-semibold mt-2 hover:underline">
                        Kembali
                    </a>
                </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
