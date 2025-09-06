@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="mx-auto bg-white shadow-md rounded-xl p-6">
        <div class="flex items-start gap-4">
            <img src="https://static.vecteezy.com/system/resources/thumbnails/005/544/718/small_2x/profile-icon-design-free-vector.jpg"
                class="w-20 h-20 rounded-full object-cover">
            <div>
                <h2 class="text-xl font-semibold">{{ $Data->users->username }}</h2>
                <p class="text-gray-600 text-sm">
                    {{ $Data->deskripsi_diri ?? 'Deskripsi Belum Di Isi' }}
                </p>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4 mt-6 text-sm">
            <div>
                <p><span class="font-medium">User ID: </span> {{ $Data->users->id }}</p>
                <p><span class="font-medium">Nama Lengkap: </span>{{ $Data->nama_pelamar }}</p>
                <p><span class="font-medium">Alamat: </span>
                    {{ $Data->alamat_pelamars->sortByDesc('created_at')->first()->detail ?? 'belum ada data' }}</p>
                <p><span class="font-medium">No.Telepon: </span> {{ $Data->telepon_pelamar }}</p>
                <p><span class="font-medium">Social Media: </span></p>
                @if ($Data->sosmed)
                    <ul class="ml-4 list-disc">
                        <li>Instagram : <a class="text-blue-500"
                                href="{{ $Data->sosmed->latest()->first()->instagram ?? 'tidak ada data' }}">{{ $Data->sosmed->latest()->first()->instagram ?? 'tidak ada data' }}</a>
                        </li>
                        <li>LinkedIn : <a class="text-blue-500"
                                href="{{ $Data->sosmed->latest()->first()->linkedin ?? 'tidak ada data' }}">{{ $Data->sosmed->latest()->first()->linkedin ?? 'tidak ada data' }}</a>
                        </li>
                        <li>Website : <a class="text-blue-500"
                                href="{{ $Data->sosmed->latest()->first()->website ?? 'tidak ada data' }}">{{ $Data->sosmed->latest()->first()->website ?? 'tidak ada data' }}</a>
                        </li>
                        <li>Twitter : <a class="text-blue-500"
                                href="{{ $Data->sosmed->latest()->first()->twitter ?? 'tidak ada data' }}">{{ $Data->sosmed->latest()->first()->twitter ?? 'tidak ada data' }}</a>
                        </li>
                    </ul>
                @else
                  <p>Data Masih Kosong</p>
                @endif
            </div>
            <div>
                <p><span class="font-medium">Username:</span> {{ $Data->users->username}}</p>
                <p><span class="font-medium">Email:</span> {{ $Data->users->email}}</p>
                <p><span class="font-medium">Gender:</span> {{ $Data->gender  ?? 'Data belum di atur' }}</p>
                <p><span class="font-medium">Keahlian:</span>
                    {{ $Data->skill->sortByDesc('created_at')->first()->skill ?? 'belum ada data' }}</p>
            </div>
        </div>
        <div class="mt-6">
            <h3 class="font-semibold">Organisasi</h3>
            <ul class="list-decimal ml-6">
                @forelse ($Data->organisasi as $o)
                    <li>{{ $o->nama_organisasi ?? 'belum ada data' }} | {{ $o->jabatan ?? 'belum ada data' }}
                        |{{ $o->tahun_awal ?? 'belum ada data' }} - {{ $o->tahun_akhir ?? 'belum ada data' }}</li>
                @empty
                    <p>Belum Ada Data</p>
                @endforelse
            </ul>
        </div>
        <div class="mt-4">
            <h3 class="font-semibold">Pengalaman Kerja</h3>
            <ul class="list-decimal ml-6">
                @forelse ($Data->pengalaman_kerja as $k)
                    <li>{{ $k->posisi_kerja ?? 'belum ada data' }} | {{ $k->nama_perusahaan ?? 'belum ada data' }} |
                        {{ $k->tahun_awal ?? 'belum ada data' }} - {{ $k->tahun_akhir ?? 'belum ada data' }}</li>
                @empty
                    <p>Belum Ada Data</p>
                @endforelse
            </ul>
        </div>
        <div class="mt-4">
            <h3 class="font-semibold">Riwayat Pendidikan</h3>
            <ul class="list-decimal ml-6">
                @forelse ($Data->riwayat_pendidikan as $r)
                    <li>{{ $r->pendidikan }} | {{ $r->jurusan }} | {{ $r->tahun_awal }} - {{ $r->tahun_akhir }}</li>
                @empty
                    <p>Belum Ada Data</p>
                @endforelse
            </ul>
        </div>
        <div class="flex justify-center gap-4 mt-6">
            <a href="/dashboard/superadmin/pelamar/edit/non_kandidat"
                class="px-6 py-2 bg-cyan-500 text-white rounded-md">Edit</a>
            <a href="#" class="px-6 py-2 bg-green-500 text-white rounded-md">Unduh</a>
            <a href="#" class="px-6 py-2 bg-red-500 text-white rounded-md">Hapus</a>
        </div>
        <div class="mt-10">
            <div class="max-w-screen-md mx-auto p-4 md:p-10">
                <div class="flex flex-col md:flex-row items-center md:items-start md:justify-between gap-6 border-b pb-6">
                    <div class="flex flex-col md:flex-row items-center md:items-start gap-6 text-center md:text-left">
                        <img src="https://static.vecteezy.com/system/resources/thumbnails/005/544/718/small_2x/profile-icon-design-free-vector.jpg"
                            alt="Profile"
                            class="w-24 h-24 md:w-28 md:h-28 rounded-full object-cover border-4 border-gray-300">
                        <div>
                            <h1 class="text-2xl md:text-3xl font-bold text-orange-600">{{ $Data->users->username }}</h1>
                            <p class="text-sm text-gray-700 mt-2 leading-snug">
                                Jalan Prapatan Dalam No. 04 Rt. 47 <br>
                                BALIKPAPAN KOTA, KOTA BALIKPAPAN, <br>
                                KALIMANTAN TIMUR, ID, 76111
                            </p>
                        </div>
                    </div>
                    <div class="text-sm text-gray-700 space-y-2 text-center md:text-left">
                        <p class="flex items-center justify-center md:justify-start gap-2">
                            <i class="ph ph-envelope-simple text-orange-600 text-lg"></i> bambangkurnia@gmail.com
                        </p>
                        <p class="flex items-center justify-center md:justify-start gap-2">
                            <i class="ph ph-phone text-orange-600 text-lg"></i> 08123456789
                        </p>
                        <p class="flex items-center justify-center md:justify-start gap-2">
                            <i class="ph ph-linkedin-logo text-orange-600 text-lg"></i> @bambang_kurnia
                        </p>
                        <p class="flex items-center justify-center md:justify-start gap-2">
                            <i class="ph ph-globe text-orange-600 text-lg"></i> Bambang Kurnia
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
                                Saya adalah lulusan Teknik Informatika di Universitas Gadjah Mada yang memiliki minat besar
                                dalam pengembangan web dan aplikasi...
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
                                <li>• Laravel — <span class="font-semibold">Expert</span></li>
                                <li>• PHP — <span class="font-semibold">Intermediate</span></li>
                                <li>• Flutter — <span class="font-semibold">Expert</span></li>
                                <li>• CSS — <span class="font-semibold">Intermediate</span></li>
                                <li>• JavaScript — <span class="font-semibold">Expert</span></li>
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
                                    <p>Sebagai anggota Tim Kreatif, saya bertanggung jawab dalam menghasilkan konsep
                                        kreatif...</p>
                                </div>
                                <div>
                                    <p class="font-semibold">Divisi Humas <span class="text-gray-500">(2018–2019)</span></p>
                                    <p class="italic">BEM KM UGM</p>
                                    <p>Sebagai anggota Divisi Humas BEM KM UGM, saya berperan dalam menjaga komunikasi yang
                                        baik...
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
                                <div>
                                    <p class="font-semibold">UI/UX Designer <span class="text-gray-500">(2020–2022)</span>
                                    </p>
                                    <p class="italic">PT. Mega Jaya Permata</p>
                                    <p>Bertanggung jawab untuk merancang antarmuka pengguna yang intuitif...</p>
                                </div>
                                <div>
                                    <p class="font-semibold">Front End Developer <span
                                            class="text-gray-500">(2022–2023)</span></p>
                                    <p class="italic">PT. PERTAMINA (Persero)</p>
                                    <p>Bertugas untuk mengimplementasikan desain UI/UX ke dalam kode...</p>
                                </div>
                                <div>
                                    <p class="font-semibold">Back End Developer <span
                                            class="text-gray-500">(2023–2024)</span></p>
                                    <p class="italic">PT. Haryanto Group</p>
                                    <p>Fokus utama saya adalah pada pengembangan dan pengelolaan server...</p>
                                </div>
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
                                <li>
                                    <p class="font-semibold">Universitas Gadjah Mada <span
                                            class="text-gray-500">(2018–2019)</span>
                                    </p>
                                    <p class="italic">Teknik Informatika</p>
                                </li>
                                <li>
                                    <p class="font-semibold">SMK Negeri 2 Yogyakarta <span
                                            class="text-gray-500">(2018–2019)</span>
                                    </p>
                                    <p class="italic">Teknik Komputer dan Jaringan</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
