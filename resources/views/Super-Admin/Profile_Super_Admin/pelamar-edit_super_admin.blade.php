@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="p-6 mt-8 px-5 lg:px-20 md:px-5 border-2">
        <h2 class="text-lg font-semibold mb-6">Edit Profile</h2>
        <form action="/dashboard/superadmin/profile/update" method="POST" class="space-y-5">
            @csrf
            @method('PUT')
            <div class="flex items-center gap-4 mb-6">
                <div class="flex items-center gap-4">
                    <img src="https://plus.unsplash.com/premium_photo-1689568126014-06fea9d5d341?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8cHJvZmlsZXxlbnwwfHwwfHx8MA%3D%3D"
                        alt="Profile Picture" class="w-20 h-20 rounded-full object-cover border">
                    <div>
                        <h3 class="font-semibold text-lg">Ronaldo</h3>
                        <p class="text-gray-500 text-sm">ronaldo@gmail.com</p>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <button type="button"
                        class="flex items-center gap-1 bg-[#fa6601] hover:bg-gray-700 text-white px-4 py-2 rounded-md text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1M12 12v9m0-9l-3 3m3-3l3 3M12 3v9" />
                        </svg>
                        Upload
                    </button>
                    <button type="button"
                        class="flex items-center gap-1 border border-[#fa6601] text-[#fa6601] hover:bg-gray-100 px-4 py-2 rounded-md text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22M8 7V4a4 4 0 018 0v3" />
                        </svg>
                        Remove
                    </button>
                </div>
            </div>


            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Email</label>
                    <input type="email" name="email" value="{{ Auth::user()->email }}"
                        class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Username</label>
                    <input type="text" name="username" value="{{ Auth::user()->username }}"
                        class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" value="{{ Auth::user()->superadmins->nama_lengkap }}"
                    class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Provinsi</label>
                    @if (Auth::user()->superadmins->provinsi == null)
                        <select name="provinsi" class="w-full border rounded-md p-2">
                            <option selected disabled>Provinsi</option>
                            <option>Yogyakarta</option>
                        </select>
                    @else
                        <select name="provinsi" class="w-full border rounded-md p-2">
                            <option selected>{{ Auth::user()->superadmins->provinsi }}</option>
                        </select>
                    @endif
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Kota/Kabupaten</label>
                    @if (Auth::user()->superadmins->kota == null)
                    <select name="kota" class="w-full border rounded-md p-2">
                        <option selected disabled>Kota</option>
                        <option>Sleman</option>
                    </select>
                    @else
                    <select name="kota" class="w-full border rounded-md p-2">
                        <option selected>{{ Auth::user()->superadmins->kota }}</option>
                    </select>
                    @endif
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Kecamatan</label>
                    @if (Auth::user()->superadmins->kecamatan == null)
                    <select name="kecamatan" class="w-full border rounded-md p-2">
                    <option selected disabled>Kecamatan</option>
                    <option >Maguwaharjo</option>
                    </select>
                    @else
                    <select name="kecamatan" class="w-full border rounded-md p-2">
                        <option selected>{{ Auth::user()->superadmins->kecamatan }}</option>
                    </select>
                    @endif
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Desa</label>
                    @if (Auth::user()->superadmins->desa == null)
                        <input type="text" name="desa"
                            class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300" placeholder="Data masih Kosong"
                            value="">
                    @else
                        <input type="text" name="desa"
                            class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300"
                            value="{{ Auth::user()->superadmins->desa }}">
                    @endif

                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Kode Pos</label>
                    @if (Auth::user()->superadmins->kode_pos == null)
                    <input type="text" name="kode_pos" value="" placeholder="Data Kosong"
                        class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300">
                        @else
                        <input type="text" name="kode_pos" value="{{ Auth::user()->superadmins->kode_pos }}"
                            class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300">
                    @endif
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Detail Lainnya</label>
                    @if (Auth::user()->superadmins->detail_alamat == null)
                <input type="text" name="detail_alamat" value="" placeholder="Contoh: Jl. Perintis Kemerdekaan No. 11B, Gg. Cendrawasih"
                    class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300">
                    @else
                    <input type="text" name="detail_alamat" value="{{ Auth::user()->superadmins->detail_alamat }}"
                        class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300">
                    @endif
            </div>

            <div class="flex justify-center gap-4 pt-4">
                <button type="submit" class="bg-[#fa6601] hover:bg-green-700 text-white px-8 py-2 rounded-md">
                    Simpan
                </button>
                <a href="/dashboard/superadmin/profile" class="border border-[#fa6601] text-[#fa6601] px-8 py-2 rounded-md">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection
