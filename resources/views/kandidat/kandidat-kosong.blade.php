@extends('layouts.index')

@section('content')
    @if (Auth::user()->pelamars->kategori === 'kandidat aktif')
        <div class="flex items-center justify-center mt-40">
            <div class="bg-white border border-gray-300 rounded-lg shadow-sm p-10 text-center w-[400px]">
                <div class="flex justify-center mb-4 ">
                    <i class="ph ph-lock-key-open text-9xl text-gray-500"></i>
                </div>

                <p class="text-gray-600 text-sm font-bold mb-5">
                    Anda harus menyelesaikan pelatihan kandidat <br>
                    agar bisa mengakses halaman ini
                </p>
                <a href="/kandidat/rekrut"
                    class="text-white bg-orange-500 hover:bg-gray-100 focus:ring-4 focus:ring-orange-500 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-orange-500 dark:hover:opacity-100 hover:text-black transition duration-300 ease-in-out  focus:outline-none dark:focus:ring-orange-500">Selanjutnya</a>
            </div>
        </div>
    @elseif (Auth::user()->pelamars->kategori === 'calon kandidat')
        <div class="flex items-center justify-center mt-40">
            <div class="bg-white border border-gray-300 rounded-lg shadow-sm p-10 text-center w-[400px]">
                <div class="flex justify-center mb-4 ">
                    <i class="ph ph-lock-key text-9xl text-gray-500"></i>
                </div>

                <p class="text-gray-600 text-sm font-bold">
                    Anda harus menyelesaikan pelatihan kandidat <br>
                    agar bisa mengakses halaman ini
                </p>
            </div>
        </div>
    @endif
@endsection
