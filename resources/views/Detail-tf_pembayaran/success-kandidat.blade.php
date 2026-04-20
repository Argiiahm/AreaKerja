@extends('layouts.index')

@section('content')
    <div class="min-h-[80vh] flex items-center h-screen justify-center py-20 px-4">
        <div class="max-w-md w-full text-center">
            {{-- Success Icon --}}
            <div class="w-24 h-24 bg-green-50 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-12 h-12 text-green-500 animate-bounce-slow" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>

            {{-- Title & Message --}}
            <h1 class="text-3xl font-black text-slate-800 mb-3 tracking-tight">Daftar Kandidat Berhasil!</h1>
            <p class="text-slate-500 mb-8 leading-relaxed">
                Bukti pembayaran Anda untuk mendaftar sebagai Kandidat telah berhasil diupload dan saat ini sedang menunggu konfirmasi dari pihak admin. Harap tunggu info selanjutnya untuk bergabung dengan program kami!
            </p>

            {{-- Action Buttons --}}
            <div class="flex flex-col gap-3 outline-none">
                <a href="/daftarkandidat"
                    class="inline-flex items-center justify-center px-6 py-3.5 rounded-xl text-sm font-bold text-white bg-orange-500 hover:bg-orange-600 transition-all duration-200 hover:-translate-y-0.5 shadow-lg shadow-orange-200 w-full no-underline">
                    Kembali ke Daftar Kandidat
                </a>
            </div>
        </div>
    </div>
@endsection
