@extends('layouts.index');
@section('content')
<div class="p-6 max-w-5xl mx-auto mt-28">
    <div class="w-full max-w-6xl bg-white border-4 border-gray-300 rounded-2xl shadow-md flex flex-col items-center justify-center py-28">
        <!-- Icon Amplop -->
        <svg xmlns="http://www.w3.org/2000/svg" 
             class="w-28 h-28 text-gray-500 mb-6" 
             fill="currentColor" 
             viewBox="0 0 24 24">
            <path d="M2 4a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v16a2 
                     2 0 0 1-2 2H4a2 2 0 0 1-2-2V4zm2 0v.217l8 
                     6.4 8-6.4V4H4zm16 2.383-8 6.4-8-6.4V20h16V6.383z"/>
        </svg>

        <!-- Text -->
        <p class="text-gray-600 text-2xl font-semibold text-center leading-relaxed">
            Tidak Ada Event Yang Tersedia <br> Untuk Saat Ini
        </p>
    </div>
</div>


@endsection