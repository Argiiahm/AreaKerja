@extends('layouts.index')

@section('content')
    <section class="pt-40 mx-10">
        <h1 class="font-semibold">Profile Akun</h1>
        <div class="mt-10 border-2 border-orange-500 p-6 sm:p-10 rounded-lg">
            <div class="flex flex-col lg:flex-row lg:items-center gap-6 lg:gap-10">
                <div class="flex flex-col items-center">
                    <img class="w-32 sm:w-40 rounded-full mb-3"
                        src="https://fisika.uad.ac.id/wp-content/uploads/blank-profile-picture-973460_1280.png"
                        alt="">
                    <div>
                        <select class="border-2 border-orange-500 w-32 sm:w-40 p-2 rounded-md text-orange-500 font-semibold">
                            <option value="">Pelamar Aktif</option>
                        </select>
                    </div>
                </div>

                <div class="flex flex-col lg:flex-row items-center w-full justify-between gap-6">
                    <div class="flex flex-col sm:flex-row gap-4 items-center w-full sm:w-auto">
                        <div
                            class="flex items-center gap-2 border-2 border-orange-500 px-6 py-2 rounded-lg w-full sm:w-auto justify-center">
                            <i class="ph ph-upload-simple text-2xl text-orange-500"></i>
                            <span class="text-orange-500">Upload</span>
                        </div>
                        <div class="flex items-center gap-2 border px-6 py-2 rounded-lg w-full sm:w-auto justify-center">
                            <i class="ph ph-trash text-2xl"></i>
                            <span>Remove</span>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
                        <div class="bg-orange-500 px-6 py-2 rounded-lg text-center w-full sm:w-auto">
                            <span class="text-white font-semibold">Simpan</span>
                        </div>
                        <div class="bg-green-500 px-6 py-2 rounded-lg text-center w-full sm:w-auto">
                            <span class="text-white font-semibold">Unduh CV</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mx-auto p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div class="bg-white p-6">
                    <h2 class="text-lg font-bold text-gray-800 border-b-2 border-orange-500 pb-2 mb-4">Data Diri</h2>

                    <form action="" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-sm font-semibold text-gray-700">Nama Lengkap <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="nama"
                                class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                                placeholder="Nama Lengkap">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700">Gender <span
                                    class="text-red-500">*</span></label>
                            <div class="flex space-x-6 mt-1">
                                <label class="flex items-center space-x-2 cursor-pointer">
                                    <input type="radio" name="gender" value="Laki-laki"
                                        class="text-orange-500 focus:ring-orange-400">
                                    <span>Laki - Laki</span>
                                </label>
                                <label class="flex items-center space-x-2 cursor-pointer">
                                    <input type="radio" name="gender" value="Perempuan"
                                        class="text-orange-500 focus:ring-orange-400">
                                    <span>Perempuan</span>
                                </label>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700">Tanggal Lahir <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="tanggal_lahir"
                                class="w-full border border-gray-300 rounded-md p-2 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                                placeholder="DD/MM/YYYY">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700">No. Tlp <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="telepon"
                                class="w-full border border-gray-300 rounded-md p-2 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                                placeholder="No. Tlp">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700">Deskripsi Diri <span
                                    class="text-red-500">*</span></label>
                            <textarea name="deskripsi" rows="3"
                                class="w-full border border-gray-300 rounded-md p-2 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                                placeholder="Deskripsikan diri anda secara singkat"></textarea>
                        </div>

                        <a href="/alamat">
                            <label class="block text-sm font-semibold text-gray-800 mb-1">Alamat <span
                                    class="text-red-500">*</span></label>
                            <div class="w-full bg-orange-500 text-white border border-orange-500 rounded-md p-2">
                                <span class="" href="">Alamat</span>
                            </div>
                        </a>


                        <div class="mb-4">
                            <label class="block text-sm font-semibold text-gray-800 mb-1">Organisasi</label>
                            <div
                                class="flex items-center justify-between border border-orange-500 rounded-md px-4 py-3 text-orange-500 font-semibold">
                                <span>Tambahkan Organisasi</span>
                                <button type="button" class="text-2xl font-bold">+</button>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-semibold text-gray-800 mb-1">Pengalaman Kerja</label>
                            <div
                                class="flex items-center justify-between border border-orange-500 rounded-md px-4 py-3 text-orange-500 font-semibold">
                                <span>Tambahkan Pengalaman Kerja</span>
                                <button type="button" class="text-2xl font-bold">+</button>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-semibold text-gray-800 mb-1">Skill <span
                                    class="text-red-500">*</span></label>
                            <div
                                class="flex items-center justify-between border border-orange-500 rounded-md px-4 py-3 text-orange-500 font-semibold">
                                <span>Tambahkan Skill</span>
                                <button type="button" class="text-2xl font-bold">+</button>
                            </div>
                        </div>


                        {{-- Sosial Media --}}
                        <div class="mt-6">
                            <h1 class="text-lg font-bold text-gray-800 mb-2">Sosial Media</h1>
                            <div class="border-t-2 border-orange-500 mb-4"></div>

                            <div class="mb-2">
                                <label class="block text-sm font-semibold text-gray-800 mb-1">Instagram</label>
                                <input type="text" name="instagram"
                                    class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                                    placeholder="Instagram">
                            </div>

                            <div class="mb-2">
                                <label class="block text-sm font-semibold text-gray-800 mb-1">LinkedIn</label>
                                <input type="text" name="linkedin"
                                    class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                                    placeholder="LinkedIn">
                            </div>

                            <div class="mb-2">
                                <label class="block text-sm font-semibold text-gray-800 mb-1">Website</label>
                                <input type="text" name="website"
                                    class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                                    placeholder="Website">
                            </div>

                            <div class="mb-2">
                                <label class="block text-sm font-semibold text-gray-800 mb-1">Twitter</label>
                                <input type="text" name="twitter"
                                    class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                                    placeholder="Twitter">
                            </div>
                        </div>


                </div>

                {{-- Informasi Akun --}}
                <div class="bg-white  p-6">
                    <h2 class="text-lg font-bold text-gray-800 border-b-2 border-orange-500 pb-2 mb-4">Informasi Akun</h2>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700">ID Pengguna</label>
                            <input type="text" value="{{ rand(100000000, 999999999) }}" readonly
                                class="w-full border border-gray-200 rounded-md p-2 bg-gray-100 text-gray-500">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700">Nama Pengguna <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="username"
                                class="w-full border border-gray-300 rounded-md p-2 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                                placeholder="Nama Pengguna">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700">Email <span
                                    class="text-red-500">*</span></label>
                            <input type="email" name="email"
                                class="w-full border border-gray-300 rounded-md p-2 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                                placeholder="Email">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700">Kata Sandi <span
                                    class="text-red-500">*</span></label>
                            <input type="password" name="password"
                                class="w-full border border-gray-300 rounded-md p-2 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                                placeholder="Kata Sandi">
                        </div>

                        <div>
                            <div class="mt-6">
                                <h1 class="text-lg font-bold text-gray-800 mb-2">Ekspetasi Gaji</h1>
                                <div class="border-t-2 border-orange-500 mb-4"></div>
                                <div class="flex items-center space-x-2">
                                    <input type="number" name="gaji_min"
                                        class="w-1/2 border border-gray-300 rounded-md p-2 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                                        placeholder="Rp. -">
                                    <span>—</span>
                                    <input type="number" name="gaji_max"
                                        class="w-1/2 border border-gray-300 rounded-md p-2 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                                        placeholder="Rp. -">
                                </div>

                                {{-- <input type="range" min="1000000" max="20000000" step="500000"
                                    class="w-full mt-3 accent-orange-500"> --}}
                            </div>

                            <div class="text-sm text-orange-500 mt-3 space-y-5">
                                <p><i
                                        class="ph ph-check border w-fit p-2 bg-orange-500 text-white rounded-full mr-3"></i>Setelah
                                    menjadi kandidat Areakerja, CV anda akan otomatis terunggah ke etalase perusahaan
                                </p>
                                <p><i
                                        class="ph ph-check border w-fit p-2 bg-orange-500 text-white rounded-full mr-3"></i>Range
                                    gaji akan tampil pada profil anda di etalase perusahaan</p>
                            </div>

                            <div class="pt-4">
                                <button type="submit"
                                    class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded-md w-full">
                                    Simpan
                                </button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
@endsection
