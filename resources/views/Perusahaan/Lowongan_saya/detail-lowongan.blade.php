@extends('layouts.index')

@section('content')
    <section class="mx-auto pt-40">
        <div class="flex w-full gap-5 mb-10">
            <div class="ml-5">
                @if (Auth::user()->perusahaan->img_profile)
                    <div class="w-28 h-28">
                        <img class="object-contain w-full"
                            src="{{ asset('storage/' . Auth::user()->perusahaan->img_profile) }}" alt="">
                    </div>
                @else
                    <div class="w-28 h-28">
                        <img class="w-20 h-20 rounded-full"
                            src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                            alt="">
                    </div>
                @endif
            </div>
            <div>
                <h1 class="text-3xl font-bold">{{ Auth::user()->perusahaan->nama_perusahaan }}</h1>
                <p class="text-sm text-gray-600">Jasa TI dan Konsultan TI</p>
                <p class="text-sm text-gray-500">Jakarta Timur, DKI Jakarta, Indonesia</p>
            </div>
        </div>
        <div class="block lg:flex lg:justify-between mx-0 lg:mx-40 md:mx-0 md:block">
            <div class="bg-white">
                <div class="flex justify-between items-start p-6">
                    <div class="">
                        <div class="flex gap-2">
                            <div>
                                @if (Auth::user()->perusahaan->img_profile)
                                    <div class="w-20 h-20  flex items-center justify-center">
                                        <img class="object-contain w-full"
                                            src="{{ asset('storage/' . Auth::user()->perusahaan->img_profile) }}"
                                            alt="">
                                    </div>
                                @else
                                    <div class="w-32 h-32  flex justify-center">
                                        <img class="w-20 h-20 rounded-full"
                                            src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                                            alt="">
                                    </div>
                                @endif
                            </div>
                            <div class="">
                                <h1 class="font-bold text-xl">{{ $data->nama }}</h1>
                                <p class="text-gray-500">{{ $data->perusahaan->nama_perusahaan }}</p>
                                <p class="text-gray-500">{{ $data->alamat }}</p>
                                <p class="bg-gray-200 w-fit my-3 px-3 py-1 text-gray-700 font-semibold rounded-md">
                                    Rp. {{ $data->gaji_awal }} – Rp. {{ $data->gaji_akhir }}
                                </p>
                                <div class="flex gap-6 mt-4">
                                    <form action="" method="POST" class="flex items-center gap-2">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                            class="flex items-center gap-1 text-orange-600 hover:text-orange-700">
                                            <i class="ph ph-trash text-lg"></i>
                                            <span class="text-sm font-medium">Tutup lowongan</span>
                                        </button>
                                    </form>

                                    <form action="/dashboard/perusahaan/edit/lowongan/{{ $data->slug }}" method="POST"
                                        class="flex items-center gap-2">
                                        @csrf
                                        <button type="submit"
                                            class="flex items-center gap-1 text-orange-600 hover:text-orange-700">
                                            <i class="ph ph-pencil-simple-line text-lg"></i>
                                            <span class="text-sm font-medium">Edit lowongan</span>
                                        </button>
                                    </form>
                                </div>

                                <div class="pb-6">
                                    <div class="mb-3 border-t-2 my-8 py-4">
                                        <h2 class="font-semibold text-lg">Detail Lowongan</h2>
                                        <ul class="list-disc pl-6">
                                            @foreach (explode("\n", $data->deskripsi) as $baris)
                                                @if (trim($baris) != '')
                                                    <li>{{ $baris }}</li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>

                                    <div class="flex gap-3 mb-3 border-b-2 pb-5">
                                        <div>
                                            <img src="{{ asset('Icon/detail-lowongan.png') }}" alt="">
                                        </div>
                                        <div>
                                            <p class="mb-3 font-semibold">Jenis Lowongan</p>
                                            <span
                                                class="bg-gray-200 px-4 py-2 rounded-md text-sm font-semibold">{{ $data->jenis }}</span>
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-3 mb-5 border-b-2 pb-5">
                                        <i class="ph ph-map-pin text-gray-500 text-lg"></i>
                                        <span>{{ $data->alamat }}</span>
                                    </div>

                                    <div class="mb-6 border-b-2 pb-5">
                                        <h3 class="font-semibold text-lg mb-2">Deskripsi Lowongan</h3>
                                        <p class="font-bold">Requirements</p>
                                        <ul class="list-disc list-inside space-y-1 text-gray-600">
                                            <li>{{ $data->syarat_pekerjaan }}</li>
                                        </ul>
                                    </div>

                                    <div class="">
                                        <h3 class="font-semibold text-lg mb-2">Responsibilities</h3>
                                        <ul class="list-disc list-inside space-y-1 text-gray-600">
                                            <li>{{ $data->tanggung_jawab }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mx-3">
                @if ($Data->count() > 1 && $Data->sum('id') != $data->id)
                    <div class="flex justify-between gap-5 items-center">
                        <h2 class="font-semibold text-2xl">Lowongan {{ Auth::user()->perusahaan->nama_perusahaan }} Lainya
                        </h2>
                        <p class="text-orange-500 font-semibold hidden lg:flex md:flex">Lihat Semua</p>
                    </div>
                    <div class="grid grid-cols-1 gap-5 mt-4">
                        @foreach (Auth::user()->perusahaan->pasanglowongan as $d)
                            @if ($d->id != $data->id)
                                <a href="/dashboard/perusahaan/lowongan/detail/{{ $d->slug }}">
                                    <div class="flex shadow-md p-4 gap-2">
                                        <div>
                                            @if (Auth::user()->perusahaan->img_profile)
                                                <div class="w-20 h-20  flex items-center justify-center">
                                                    <img class="object-contain w-full"
                                                        src="{{ asset('storage/' . Auth::user()->perusahaan->img_profile) }}"
                                                        alt="">
                                                </div>
                                            @else
                                                <div class="w-20 h-20  flex justify-center">
                                                    <img class="w-20 h-20 rounded-full"
                                                        src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                                                        alt="">
                                                </div>
                                            @endif
                                        </div>
                                        <div class="w-full">
                                            <p>{{ $d->perusahaan->nama_perusahaan }}</p>
                                            <h1 class="font-semibold">{{ $d->nama }} - {{ $d->jenis }}</h1>
                                            <span>{{ $d->alamat }}</span>
                                            <div class="mt-5 block lg:flex md:flex justify-between items-center w-full">
                                                <span
                                                    class="px-3 bg-[#d7d6d6] text-[#565656] py-2 rounded-md">Rp.{{ $d->gaji_awal }}
                                                    - Rp.{{ $d->gaji_akhir }}</span>
                                                <span
                                                    class="block mt-3 text-[#565656] pl-0 lg:pl-10 md:pl-10">{{ $d->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                @endif
            </div>
        </div>
        </div>
    </section>
@endsection
