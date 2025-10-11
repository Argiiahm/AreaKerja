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

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mx-5">
            <div class="lg:col-span-2 bg-white">
                <div class="flex justify-between items-start p-6">
                    <div class="flex gap-2">
                        <div>
                            @if (Auth::user()->perusahaan->img_profile)
                                <div class="w-20 h-20 flex items-center justify-center">
                                    <img class="object-contain w-full"
                                        src="{{ asset('storage/' . Auth::user()->perusahaan->img_profile) }}"
                                        alt="">
                                </div>
                            @else
                                <div class="w-32 h-32 flex justify-center">
                                    <img class="w-20 h-20 rounded-full"
                                        src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                                        alt="">
                                </div>
                            @endif
                        </div>
                        <div>
                            <h1 class="font-bold text-xl">{{ $data->nama }}</h1>
                            <p class="text-gray-500">{{ $data->perusahaan->nama_perusahaan }}</p>
                            <p class="text-gray-500">{{ $data->alamat }}</p>
                            <p class="bg-gray-200 w-fit my-3 px-3 py-1 text-gray-700 font-semibold rounded-md">
                                Rp. {{ $data->gaji_awal }} – Rp. {{ $data->gaji_akhir }}
                            </p>

                            <div class="flex gap-6 mt-4">
                                 <form id="deleteForm" action="/dashboard/perusahaan/hapus/lowongan/{{ $data->slug }}" method="POST"
                                    class="flex items-center gap-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" id="openModalBtn"
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

                                <div>
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

            <aside class="lg:col-span-1">
                @if ($Data->count() > 1)
                    <div class="flex justify-between gap-5 items-center">
                        <h2 class="font-semibold text-2xl">Lowongan {{ Auth::user()->perusahaan->nama_perusahaan }} Lainnya
                        </h2>
                        <a href="/dashboard/perusahaan/lowongan" class="text-orange-500 font-semibold hover:underline">
                            Lihat Semua
                        </a>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-5 mt-4">
                        @foreach (Auth::user()->perusahaan->pasanglowongan as $d)
                            @if ($d->id != $data->id)
                                <a href="/dashboard/perusahaan/lowongan/detail/{{ $d->slug }}">
                                    <div class="bg-white shadow-md rounded-lg p-4 flex flex-col justify-between h-full">
                                        <div class="flex gap-3 items-start">
                                            <div class="w-16 h-16 flex items-center justify-center">
                                                @if (Auth::user()->perusahaan->img_profile)
                                                    <img class="object-contain w-full h-full rounded-md"
                                                        src="{{ asset('storage/' . Auth::user()->perusahaan->img_profile) }}"
                                                        alt="">
                                                @else
                                                    <img class="w-16 h-16 rounded-full"
                                                        src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                                                        alt="">
                                                @endif
                                            </div>
                                            <div>
                                                <p class="text-sm text-gray-600">{{ $d->perusahaan->nama_perusahaan }}</p>
                                                <h1 class="font-semibold text-lg">{{ $d->nama }} -
                                                    {{ $d->jenis }}</h1>
                                                <span class="text-sm text-gray-500">{{ $d->alamat }}</span>
                                            </div>
                                        </div>

                                        <div class="flex justify-between items-center mt-5">
                                            <span
                                                class="px-3 py-2 bg-gray-200 text-gray-700 rounded-md text-sm font-semibold">
                                                Rp.{{ $d->gaji_awal }} - Rp.{{ $d->gaji_akhir }}
                                            </span>
                                            <span class="text-sm text-gray-500">
                                                {{ $d->created_at->diffForHumans() }}
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                    </div>
                @endif
            </aside>
        </div>
    </section>

    <div id="confirmModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full">
            <h2 class="text-lg font-semibold mb-4">Konfirmasi</h2>
            <p class="text-gray-600 mb-4">Apakah Anda yakin ingin menghapus lowongan ini?</p>
            <div class="flex justify-end gap-2">
                <button id="cancelBtn" class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400">Batal</button>
                <button id="confirmBtn" class="px-4 py-2 rounded bg-orange-500 text-white hover:bg-orange-600">Ya, Hapus</button>
            </div>
        </div>
    </div>

    <script>
        const openModalBtn = document.getElementById('openModalBtn');
        const modal = document.getElementById('confirmModal');
        const cancelBtn = document.getElementById('cancelBtn');
        const confirmBtn = document.getElementById('confirmBtn');
        const deleteForm = document.getElementById('deleteForm');

        openModalBtn.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });

        cancelBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
        });

        confirmBtn.addEventListener('click', () => {
            deleteForm.submit();
        });
    </script>
@endsection
