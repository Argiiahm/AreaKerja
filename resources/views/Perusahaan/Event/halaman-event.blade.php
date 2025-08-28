@extends('layouts.index')
@section('content')
<div class="max-w-7xl mx-auto px-4 py-6 space-y-10 mt-28"> 

    <div>
        <p class="text-sm text-gray-600 mb-3">7 Juli 2023</p>
        <div class="relative rounded-xl overflow-hidden shadow-lg">
            <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b" 
                 alt="Seminar" class="w-full h-[500px] object-cover">
            
            <div class="absolute inset-0 bg-black bg-opacity-50 p-10 flex flex-col justify-end">
                <h2 class="text-3xl font-bold text-white mb-3">Seminar Kerja</h2>
                <p class="text-white text-lg mb-6 max-w-3xl">
                    Seminar pekerja adalah acara yang dirancang untuk memberikan wawasan, 
                    pelatihan, atau informasi terbaru kepada para profesional atau pekerja
                </p>
                <button class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-md font-medium w-max">
                    Bergabung
                </button>
            </div>
        </div>
    </div>

    <div>
        <p class="text-sm text-gray-600 mb-3">7 Juli 2023</p>
        <div class="relative rounded-xl overflow-hidden shadow-lg">
            <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4" 
                 alt="Job Fair" class="w-full h-[500px] object-cover">
            
            <div class="absolute inset-0 bg-black bg-opacity-50 p-10 flex flex-col justify-end">
                <h2 class="text-3xl font-bold text-white mb-3">Job Fair</h2>
                <p class="text-white text-lg mb-6 max-w-3xl">
                    Job fair adalah acara di mana perusahaan dan organisasi berkumpul 
                    untuk merekrut calon karyawan
                </p>
                <button class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-md font-medium w-max">
                    Bergabung
                </button>
            </div>
        </div>
    </div>

</div>

@endsection