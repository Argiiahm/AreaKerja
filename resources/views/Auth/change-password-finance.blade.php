<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Change Password Finance</title>
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
            <div class="bg-white rounded-2xl w-10/12 py-5 px-8 md:w-full lg:w-9/12 lg:py-16 lg:px-20 md:py-24">
                       <div class="col-span-3 flex justify-center items-center bg-white">
            <div class="w-full max-w-md px-6">
                <h1 class="text-2xl font-bold mb-2 text-[#fa6601]">Lupa Kata Sandi</h1>
                <p class="text-[#616161] text-sm mb-6">
                    Masukan kata sandi anda.<br>
                    kata sandi harus mengandung.
                </p>

                <div class="grid grid-cols-5 text-center text-sm mb-6">
                    <div>
                        <p class="text-black font-semibold">8+</p>
                        <p class="text-[#616161]">Karakter</p>
                    </div>
                    <div>
                        <p class="text-black font-semibold">AA</p>
                        <p class="text-[#616161]">Huruf Besar</p>
                    </div>
                    <div>
                        <p class="text-black font-semibold">aa</p>
                        <p class="text-[#616161]">Huruf Kecil</p>
                    </div>
                    <div>
                        <p class="text-black font-semibold">123</p>
                        <p class="text-[#616161]">Angka</p>
                    </div>
                    <div>
                        <p class="text-black font-semibold">@#$</p>
                        <p class="text-[#616161]">Simbol</p>
                    </div>
                </div>

                <form action="" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Kata Sandi Baru</label>
                        <div class="relative">
                            <input type="password" name="password"
                                class="w-full border rounded-md p-3 pr-10 focus:ring-2 focus:ring-[#616161] focus:outline-none placeholder-gray-400"
                                placeholder="Kata Sandi">
                            <button type="button" class="absolute inset-y-0 right-3 flex items-center text-gray-500">
                                0
                            </button>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Konfirmasi Kata Sandi</label>
                        <div class="relative">
                            <input type="password" name="password_confirmation"
                                class="w-full border rounded-md p-3 pr-10 focus:ring-2 focus:ring-[#616161] focus:outline-none placeholder-gray-400"
                                placeholder="Kata Sandi">
                            <button type="button" class="absolute inset-y-0 right-3 flex items-center text-gray-500">
                                0
                            </button>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 rounded-md">
                        Ubah Kata Sandi
                    </button>
                </form>
            </div>
        </div>
            </div>
        </div>
    </div>
</body>

</html>
