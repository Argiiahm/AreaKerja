@extends('layouts.index')

@section('content')
    <section class="mx-auto pt-40 px-4 sm:px-10">
        <div class="flex flex-col sm:flex-row w-full mb-10 sm:items-center">
            <div class="w-full sm:w-3/12 h-32 flex items-center justify-center mb-4 sm:mb-0">
                <img src="{{ asset('storage/' . Auth::user()->perusahaan->img_profile) }}" alt="Logo"
                    class="object-contain w-6/12 sm:w-10/12 max-h-28">
            </div>
            <div class="text-center sm:text-left">
                <h1 class="text-2xl sm:text-3xl font-bold">Seven_Inc</h1>
                <p class="text-sm text-gray-600">Jasa TI dan Konsultan TI</p>
                <p class="text-sm text-gray-500">Jakarta Timur, DKI Jakarta, Indonesia</p>
            </div>
        </div>

        <div class="mt-8 w-full py-12 sm:py-20 space-y-8">
            <div class="w-full sm:w-8/12">
                <a href="/dashboard/perusahaan/pengaturan/password"
                    class="bg-orange-500 hover:bg-orange-600 transition duration-300 ease-in-out text-white px-4 w-full py-2 rounded-lg shadow block text-center">
                    Ganti Password
                </a>
            </div>


            <div class="w-full sm:w-8/12">
                <button type="submit" form="change_email"
                    class="bg-orange-500 hover:bg-orange-600 transition duration-300 ease-in-out text-white px-4 w-full py-2 rounded-lg shadow block text-center">
                    Ganti Email
                </button>
                <form id="change_email" action="/dashboard/perusahaan/pengaturan/email/change/{{ Auth::user()->id }}"
                    method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-[200px_minmax(0,1fr)] items-start gap-4">
                        <label class="font-medium mt-2">Masukan Email <span class="text-red-500">*</span></label>
                        <div>
                            <input type="email" name="email"
                                class="w-72 border border-orange-400 rounded-md p-2 focus:ring-2 focus:ring-orange-400"
                                required>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @if (session('email_success'))
<div id="alertSuccess"
    class="fixed top-6 right-6 flex items-center gap-3 px-5 py-3 rounded-xl shadow-lg
           bg-white/80 backdrop-blur-md border border-green-300 
           text-green-700 font-medium z-[9999] 
           transition-all duration-300 opacity-0 translate-y-[-10px]">

    <div class="w-3 h-3 rounded-full bg-green-500 animate-ping"></div>

    <p>{{ session('email_success') }}</p>

    <button id="closeAlertBtn"
        class="text-green-700 text-lg font-bold hover:scale-125 transition">
        &times;
    </button>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const alertBox = document.getElementById("alertSuccess");
        const closeBtn = document.getElementById("closeAlertBtn");

        if (alertBox) {
            setTimeout(() => {
                alertBox.classList.remove("opacity-0", "translate-y-[-10px]");
                alertBox.classList.add("opacity-100", "translate-y-0");
            }, 50);

            setTimeout(() => closeAlert(), 4000);

            function closeAlert() {
                alertBox.classList.add("opacity-0", "translate-y-[-10px]");
                setTimeout(() => alertBox.remove(), 300);
            }

            closeBtn.addEventListener("click", closeAlert);
        }
    });
</script>
@endif

    </section>
@endsection
