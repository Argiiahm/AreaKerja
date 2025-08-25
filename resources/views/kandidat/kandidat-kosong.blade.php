@extends('layouts.index')

@section('content')
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
@endsection
