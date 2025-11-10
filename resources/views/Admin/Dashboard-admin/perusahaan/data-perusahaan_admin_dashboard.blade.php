@extends('Admin.Dashboard-admin.layouts.index')

@section('admin-content')
    <div class="p-6">
        <div class="block lg:flex justify-between items-center mb-4">
            <div class="space-x-2 grid grid-cols-2 gap-2 lg:inline md:inline mb-5 lg:mb-0">
                <button id="btn_perusahaan" class="bg-gray-700 border  text-white px-4 py-2 rounded-md">Perusahaan</button>
                <button id="btn_recruitment" class="border text-gray-700 px-4 py-2 rounded-md">Recruitment</button>
                <button id="btn_talent_hunter" class="border text-gray-700 px-4 py-2 rounded-md">Talent Hunter</button>
            </div>
            <div class="flex items-center space-x-2 mt-0 lg:mt-0 md:mt">
                <input type="text" placeholder=""
                    class="border border-gray-300 rounded-md px-3 py-2 w-64 focus:outline-none focus:ring-2 focus:ring-gray-400">
                <button class="bg-gray-700 text-white px-4 py-2 rounded-md">Cari</button>
            </div>
        </div>

        <!-- Table-Perusahaan -->
        <div id="table_perusahaan" class="bg-white border rounded-2xl shadow-sm overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 text-left">
                        <th class="px-6 py-3 font-semibold text-gray-700">ID</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Nama Perusahaan</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Email</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Telepon</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Alamat</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Status</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Data as $d)
                        <tr class="border-t">
                            <td class="px-6 py-3 text-gray-700">{{ $loop->iteration }}</td>
                            <td class="px-6 py-3 text-gray-700">{{ $d->nama_perusahaan }}</td>
                            <td class="px-6 py-3 text-gray-700">{{ $d->users->email }}</td>
                            <td class="px-6 py-3 text-gray-700">{{ $d->telepon_perusahaan }}</td>
                            <td class="px-6 py-3 text-gray-700">
                                {{ $d->alamatperusahaan()->latest()->first()->detail ?? 'Belum Ada Data' }}</td>
                            <td class="px-6 py-3 text-gray-700">
                                @if ($d->users->status === 0)
                                    <span class="bg-blue-500 text-green-100 text-sm font-medium px-2.5 py-0.5 rounded-sm">
                                        Aktif
                                    </span>
                                @elseif ($d->users->status === 1)
                                    <span class="bg-red-500 text-green-100 text-sm font-medium px-2.5 py-0.5 rounded-sm">
                                        Banned
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-3 flex space-x-2 justify-center items-center">
                                <a href="/dashboard/admin/perusahaan/view/{{ $d->id }}"
                                    class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 12s3.75-6.75 9.75-6.75S21.75 12 21.75 12s-3.75 6.75-9.75 6.75S2.25 12 2.25 12z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </a>
                                <form id="unbanned" action="/dashboard/admin/unbanned/{{ $d->users->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="status" value="0" hidden>
                                </form>

                                @if ($d->users->status === 0)
                                    <button class="bg-red-500 text-white p-2 rounded hover:bg-red-600" id="btnBekukan">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M18.364 5.636a9 9 0 11-12.728 12.728A9 9 0 0118.364 5.636z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 9l-6 6" />
                                        </svg>
                                    </button>
                                @else
                                    <button class="bg-green-500 text-white p-2 rounded hover:bg-green-600" form="unbanned"
                                        type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M18.364 5.636a9 9 0 11-12.728 12.728A9 9 0 0118.364 5.636z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 9l-6 6" />
                                        </svg>
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- end-perusahaan -->


        <!-- Table-requitmen -->
        <div id="table_recruitment" class=" hidden bg-white border rounded-2xl shadow-sm overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 text-left">
                        <th class="px-6 py-3 font-semibold text-gray-700">ID</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Nama Perusahaan</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Email</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Telepon</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Alamat</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-t">
                        <td class="px-6 py-3 text-gray-700">774770</td>
                        <td class="px-6 py-3 text-gray-700">Joko Shop</td>
                        <td class="px-6 py-3 text-gray-700">Joko@gmail.com</td>
                        <td class="px-6 py-3 text-gray-700">082111111</td>
                        <td class="px-6 py-3 text-gray-700">Jl Joko No 02</td>
                        <td class="px-6 py-3 flex space-x-2">
                        <td class="px-6 py-4 flex gap-2">
                            <a href="/dashboard/admin/perusahaan/view/cv"
                                class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12s3.75-6.75 9.75-6.75S21.75 12 21.75 12s-3.75 6.75-9.75 6.75S2.25 12 2.25 12z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </a>
                        </td>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- end-requitmen -->


        <!-- Table-Talent Hunter -->
        <div id="table_talent_hunter" class="hidden bg-white border rounded-2xl shadow-sm overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 text-left">
                        <th class="px-6 py-3 font-semibold text-gray-700">ID</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Nama Perusahaan</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Email</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Telepon</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Alamat</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-t">
                        <td class="px-6 py-3 text-gray-700">774770</td>
                        <td class="px-6 py-3 text-gray-700">Joko Shop</td>
                        <td class="px-6 py-3 text-gray-700">Joko@gmail.com</td>
                        <td class="px-6 py-3 text-gray-700">082111111</td>
                        <td class="px-6 py-3 text-gray-700">Jl Joko No 02</td>
                        <td class="px-6 py-3 flex space-x-2">
                        <td class="px-6 py-4 flex gap-2">
                            <a href="/dashboard/admin/perusahaan/view/talenthunter"
                                class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12s3.75-6.75 9.75-6.75S21.75 12 21.75 12s-3.75 6.75-9.75 6.75S2.25 12 2.25 12z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </a>
                            <button class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M18.364 5.636a9 9 0 11-12.728 12.728A9 9 0 0118.364 5.636z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 9l-6 6" />
                                </svg>
                            </button>
                        </td>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div id="modalKonfirmasi" class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center">
            <div class="bg-white text-gray-800 rounded-xl shadow-lg p-6 w-[350px] text-center">
                <div class="text-red-500 text-5xl mb-3">⚠️</div>
                <p class="text-gray-800 font-semibold mb-5">Yakin akan membekukan?</p>
                <div class="flex justify-center space-x-4">
                    <button id="yaBekukan"
                        class="bg-green-500 text-white px-6 py-1 rounded-md hover:bg-green-600">Ya</button>
                    <button id="tidakBekukan"
                        class="bg-red-500 text-white px-6 py-1 rounded-md hover:bg-red-600">Tidak</button>
                </div>
            </div>
        </div>

        <div id="modalAlasan" class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center">
            <div class="bg-white text-gray-800 rounded-xl shadow-lg p-6 w-[350px]">
                <h2 class="text-center text-lg font-semibold mb-4">Konfirmasi</h2>
                <form id="banned" action="/dashboard/admin/banned/{{ $d->users->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="number" name="status" hidden value="1">
                    <textarea id="alasan" placeholder="Masukkan Alasan" name="alasan_freeze_akun"
                        class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-green-500 resize-none"
                        rows="3"></textarea>
                    <div class="mt-4 flex justify-center">
                        <button type="submit" class="bg-green-500 text-white px-6 py-1 rounded-md hover:bg-green-600">
                            Kirim
                        </button>
                    </div>
                </form>
            </div>
        </div>

        @if (session('success'))
            <div id="modalSukses" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                <div class="bg-white rounded-xl shadow-lg p-4 flex items-center space-x-3">
                    <div class="text-green-500 text-3xl">✔️</div>
                    <p class="text-gray-800 font-medium">Akun Berhasil Di Bekukan</p>
                </div>
            </div>
            <script>
                setTimeout(() => {
                    document.getElementById('modalSukses')?.classList.add('hidden');
                }, 2000);
            </script>
        @endif

        <script>
            const btnBekukan = document.getElementById('btnBekukan');
            const modalKonfirmasi = document.getElementById('modalKonfirmasi');
            const modalAlasan = document.getElementById('modalAlasan'); 
            const yaBekukan = document.getElementById('yaBekukan');
            const tidakBekukan = document.getElementById('tidakBekukan');
            const kirimAlasan = document.getElementById('kirimAlasan');
            const alasanInput = document.getElementById('alasan');

            btnBekukan.addEventListener('click', () => {
                modalKonfirmasi.classList.remove('hidden');
            });

            yaBekukan.addEventListener('click', () => {
                modalKonfirmasi.classList.add('hidden');
                modalAlasan.classList.remove('hidden');
            });

            tidakBekukan.addEventListener('click', () => {
                modalKonfirmasi.classList.add('hidden');
            });
        </script>

        <!-- end-Talen Hunter -->
    @endsection
