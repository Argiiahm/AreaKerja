@extends('Admin.Dashboard-admin.layouts.index')

@section('admin-content')
    <div class="max-w-6xl mx-auto p-4 md:p-10">

        <div class="flex flex-col md:flex-row items-center md:items-start md:justify-between gap-6 border-b pb-6">
            <div class="flex flex-col md:flex-row items-center md:items-start gap-6 text-center md:text-left">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/005/544/718/small_2x/profile-icon-design-free-vector.jpg"
                    alt="Profile" class="w-24 h-24 md:w-28 md:h-28 rounded-full object-cover border-4 border-gray-300">

                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-orange-600">{{ $Data->nama_pelamar }}</h1>
                    <p class="text-sm text-gray-700 mt-2 leading-snug">
                        @php
                            $alamatTerbaru = $Data->alamat_pelamars->sortByDesc('created_at')->first();
                        @endphp

                        @if ($alamatTerbaru)
                            {{ $alamatTerbaru->desa }}<br>
                            {{ $alamatTerbaru->detail }},<br>
                            {{ $alamatTerbaru->provinsi }}, {{ $alamatTerbaru->kode_pos }}
                        @endif
                    </p>
                </div>
            </div>
            <div class="text-sm text-gray-700 space-y-2 text-center md:text-left">
                <p class="flex items-center justify-center md:justify-start gap-2">
                    <i class="ph ph-envelope-simple text-orange-600 text-lg"></i> {{ $Data->users->email }}
                </p>
                <p class="flex items-center justify-center md:justify-start gap-2">
                    <i class="ph ph-phone text-orange-600 text-lg"></i> {{ $Data->telepon_pelamar }}
                </p>
                <p class="flex items-center justify-center md:justify-start gap-2">
                    <i class="ph ph-linkedin-logo text-orange-600 text-lg"></i> {{ $Data->sosmed->latest()->first()->linkedin ?? 'tidak ada data' }}
                </p>
                <p class="flex items-center justify-center md:justify-start gap-2">
                    <i class="ph ph-globe text-orange-600 text-lg"></i>  {{ $Data->sosmed->latest()->first()->website ?? 'tidak ada data' }}
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-10 mt-8">

            <div class="col-span-1 space-y-8">
                <div>
                    <h2 class="text-lg font-bold text-orange-600 uppercase">
                        Tentang Saya
                    </h2>
                    <div class="flex items-center ">
                        <hr class="w-12 border-2 border-orange-600 mb-3">
                        <hr class="w-full border border-orange-300 mb-3">
                    </div>
                    <p class="text-sm text-gray-700 leading-relaxed">
                        {{ $Data->deskripsi_diri }}
                    </p>
                </div>

                <div>
                    <h2 class="text-lg font-bold text-orange-600 uppercase">
                        Keahlian & Kompetensi
                    </h2>
                    <div class="flex items-center ">
                        <hr class="w-12 border-2 border-orange-600 mb-3">
                        <hr class="w-full border border-orange-300 mb-3">
                    </div>
                    <ul class="text-sm text-gray-700 space-y-1">
                        @foreach ($Data->skill as $s)
                            <li>• {{ $s->skill }} — <span class="font-semibold">{{ $s->experience_level }}</span></li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <h2 class="text-lg font-bold text-orange-600 uppercase">
                        Organisasi
                    </h2>
                    <div class="flex items-center ">
                        <hr class="w-12 border-2 border-orange-600 mb-3">
                        <hr class="w-full border border-orange-300 mb-3">
                    </div>
                    <div class="space-y-4 text-sm text-gray-700">
                        <div>
                            <p class="font-semibold">Tim Kreatif <span class="text-gray-500">(2018–2019)</span></p>
                            <p class="italic">HIMA ILKOM UGM</p>
                            <p>Sebagai anggota Tim Kreatif, saya bertanggung jawab dalam menghasilkan konsep kreatif...</p>
                        </div>
                        <div>
                            <p class="font-semibold">Divisi Humas <span class="text-gray-500">(2018–2019)</span></p>
                            <p class="italic">BEM KM UGM</p>
                            <p>Sebagai anggota Divisi Humas BEM KM UGM, saya berperan dalam menjaga komunikasi yang baik...
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-2 space-y-8">
                <div>
                    <h2 class="text-lg font-bold text-orange-600 uppercase">
                        Pengalaman Kerja
                    </h2>
                    <div class="flex items-center ">
                        <hr class="w-12 border-2 border-orange-600 mb-3">
                        <hr class="w-full border border-orange-300 mb-3">
                    </div>
                    <div class="space-y-4 text-sm text-gray-700">
                        @foreach ($Data->pengalaman_kerja as $k)
                            <div>
                                <p class="font-semibold">{{ $k->posisi_kerja }} <span
                                        class="text-gray-500">({{ $k->tahun_awal }} - {{ $k->tahun_akhir }})</span></p>
                                <p class="italic">{{ $k->nama_perusahaan }}</p>
                                <p>{{ $k->deskripsi }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div>
                    <h2 class="text-lg font-bold text-orange-600 uppercase">
                        Latar Belakang Pendidikan
                    </h2>
                    <div class="flex items-center ">
                        <hr class="w-12 border-2 border-orange-600 mb-3">
                        <hr class="w-full border border-orange-300 mb-3">
                    </div>
                    <ul class="text-sm text-gray-700 space-y-2">
                        @foreach ($Data->riwayat_pendidikan as $p)
                            <li>
                                <p class="font-semibold">{{ $p->asal_pendidikan }}<span
                                        class="text-gray-500">({{ $p->tahun_awal }} - {{ $k->tahun_akhir }})</span>
                                </p>
                                <p class="italic">{{ $k->jurusan }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
