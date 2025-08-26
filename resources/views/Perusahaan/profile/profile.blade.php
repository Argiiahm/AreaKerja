@extends('layouts.index')

@section('content')
<div class="max-w-5xl mx-auto px-6 py-10 mt-32">
    <div class="flex items-center gap-4 mb-8">
        <img src="{{ asset('Icon/seveninc.png') }}" alt="Logo" class="w-[100px] h-20 object-contain">

        <div>
            <h2 class="font-bold text-xl">Seven_Inc</h2>
            <p class="text-gray-600 text-sm mb-2">Jasa IT dan Konsultan TI</p>
            <a href="/dashboard/perusahaan/edit/profile" class="mt-4 px-4 py-1 text-sm border border-orange-500 text-orange-500 rounded-md hover:bg-orange-500 hover:text-white transition">
                Edit Profile
            </a>
        </div>
    </div>
    <div class="flex gap-36 justify-center items-center">
        <label class=" block font-semibold mb-1">Deskripsi</label>
        <textarea class="w-full h-40 border border-orange-400 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-orange-400" rows="3"></textarea>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="md:col-span-2 flex flex-col gap-4">

            <div class="flex items-center justify-center gap-24 mt-7">
                <label class="block font-semibold mb-1 w-40">Badan Usaha</label>
                <select class="w-full border border-orange-400 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-orange-400">
                    <option>Pilih badan usaha</option>
                </select>
            </div>

            <div class="flex items-center justify-center gap-44">
                <label class="block font-semibold mb-1">Visi</label>
                <input type="text" class="w-full border border-orange-400 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-orange-400">
            </div>

            <div class="flex items-center justify-center gap-44">
                <label class="block font-semibold mb-1">Misi</label>
                <input type="text" class="w-full border border-orange-400 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-orange-400">
            </div>
        </div>

        <div class="border border-orange-400 rounded-md p-4 mt-7">
            <h3 class="font-bold text-lg mb-3">Kontak</h3>
            <ul class="text-sm space-y-2 list-disc px-5">
                <li><span class="font-semibold">Website :</span> <a href="#" class="text-blue-600 hover:underline">http://Seven.inc</a></li>
                <li><span class="font-semibold">Telepon :</span> +62 81353729803</li>
                <li><span class="font-semibold">Whatsapp :</span> +62 81353729803</li>
                <li><span class="font-semibold">Email :</span> seveninc@gmail.com</li>
            </ul>
        </div>
    </div>

    <div class="mt-12 flex justify-center">
        <button class="flex flex-col items-center border border-orange-400 rounded-md p-6 hover:bg-orange-50 transition">
            <span class="text-orange-500 text-4xl font-bold">+</span>
            <span class="mt-2 bg-orange-500 text-white px-6 py-2 rounded-md">Lowongan</span>
        </button>
    </div>
</div>
@endsection
