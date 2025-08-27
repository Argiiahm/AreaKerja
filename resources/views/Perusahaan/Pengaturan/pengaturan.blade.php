@extends('layouts.index')

@section('content')
    <section class="mx-auto pt-40">
        <div class="flex w-full mb-10">
            <div class="w-3/12 h-32  flex items-center justify-center">
                <img src="{{ asset('Icon/seveninc.png') }}" alt="Logo" class="object-contain w-10/12">

            </div>
            <div>
                <h1 class="text-3xl font-bold">Seven_Inc</h1>
                <p class="text-sm text-gray-600">Jasa TI dan Konsultan TI</p>
                <p class="text-sm text-gray-500">Jakarta Timur, DKI Jakarta, Indonesia</p>
            </div>
        </div>
<div class="mt-8 w-full py-24 block space-y-5 mx-10">
    <div class="w-8/12">
        <a href="/dashboard/perusahaan/pengaturan/password" class="bg-orange-500 hover:bg-orange-600 text-white pl-3 py-2 rounded-lg shadow block">
            Ganti Password
        </a>
    </div>
    <div class="w-8/12">
        <a href="#" class="bg-orange-500 hover:bg-orange-600 text-white pl-3 py-2 rounded-lg shadow block">
            Ganti E-mail
        </a>
    </div>
</div>
    </section>
@endsection
