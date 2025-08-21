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
            <div class="bg-white rounded-2xl w-10/12 py-5 px-8 md:w-full lg:w-9/12 lg:py-20 lg:px-20 md:py-20">
                               <div class="transform translate-x-0 lg:translate-x-[-1rem]">
                    <h2 class="text-2xl font-bold mb-2 text-[#fa6601]">Verifikasi Akun</h2>
                    <p class="text-gray-600 mb-4">
                        Silahkan verifikasi akun anda terlebih dahulu <br>
                        untuk bisa melakukan penggantian kata sandi
                    </p>
                    <p class="text-gray-600">
                        Kode verifikasi telah dikirim ke email <br>
                        <span class="font-semibold">emailpengguna@gmail.com</span>
                    </p>
                </div>
                <p class="mt-6 font-semibold text-center">Kode Verifikasi</p>
                <form action="" method="POST" class="mt-4 lg:text-center md:text-center">
                    @csrf
                    <div class="flex justify-center gap-3 mb-6">
                        @for ($i = 0; $i < 6; $i++)
                            <input type="text" maxlength="1" name="otp[]"
                                class="w-10 h-12 text-center border-b-2 border-gray-500 focus:border-black focus:outline-none text-lg"
                                oninput="moveNext(this, {{ $i + 1 }})">
                        @endfor
                    </div>
                    <p class="text-sm text-gray-600 mb-2">
                        Belum menerima kode verifikasi melalui email?
                    </p>
                    <button type="button" id="resendBtn" class="text-sm text-gray-500 hover:text-black font-medium"
                        disabled>
                        Kirim Ulang Kode Verifikasi <span id="timer"
                            class="text-orange-600 font-semibold">(00:45)</span>
                    </button>
                    <button type="submit"
                        class="w-full bg-[#fa6601] text-white mt-2 font-semibold py-2 rounded-lg hover:bg-gray-500 hover:-translate-y-1 transition-all duration-500 v">
                        Lanjutkan
                    </button>
                    <a href="/login"
                        class="block text-center text-[#fa6601] font-semibold mt-2 hover:underline">
                        Ubah E-mail
                    </a>
                </form>
            </div>
        </div>
    </div>
        <script>
        function moveNext(current, index) {
            if (current.value.length === 1) {
                let next = current.parentElement.children[index];
                if (next) next.focus();
            }
        }
        let timeLeft = 45;
        let timerEl = document.getElementById("timer");
        let resendBtn = document.getElementById("resendBtn");

        let countdown = setInterval(() => {
            timeLeft--;
            let seconds = timeLeft.toString().padStart(2, '0');
            timerEl.textContent = `(00:${seconds})`;

            if (timeLeft <= 0) {
                clearInterval(countdown);
                timerEl.textContent = "";
                resendBtn.disabled = false;
                resendBtn.classList.remove("text-gray-500");
                resendBtn.classList.add("text-orange-600");
            }
        }, 1000);
    </script>
</body>

</html>
