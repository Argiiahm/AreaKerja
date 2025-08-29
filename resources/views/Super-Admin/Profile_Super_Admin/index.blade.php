@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="mx-aut p-6 mt-8 border-2 rounded-lg px-5 lg:px-20 md:px-5">
        <h2 class="text-lg font-semibold mb-6">Edit Profile</h2>

        <div class="flex items-center gap-4 mb-6">
            @if (Auth::user()->superadmins->img_profile == null)
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                    alt="Profile Picture" class="w-20 h-20 rounded-full object-cover border">
            @else
                <img src="" alt="Profile Picture" class="w-20 h-20 rounded-full object-cover border">
            @endif
            <div>
                <h3 class="font-semibold text-lg">{{ Auth::user()->superadmins->nama_lengkap }}</h3>
                <p class="text-gray-500 text-sm">{{ Auth::user()->email }}</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium mb-1">Email</label>
                <input type="email"
                    class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300" readonly
                    value="{{ Auth::user()->email }}">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Username</label>
                <input type="text"
                    class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300" readonly
                    value="{{ Auth::user()->username }}">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Nama Lengkap</label>
            <input type="text" class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300"
                readonly value="{{ Auth::user()->superadmins->nama_lengkap }}">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium mb-1">Provinsi</label>
                @if (Auth::user()->superadmins->provinsi == null)
                    <select name="provinsi" class="w-full border rounded-md p-2">
                        <option selected>Data Belum Terisi</option>
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
                    <select name="provinsi" class="w-full border rounded-md p-2">
                        <option selected>Data Belum Terisi</option>
                    </select>
                @else
                    <select name="provinsi" class="w-full border rounded-md p-2">
                        <option selected>{{ Auth::user()->superadmins->kota }}</option>
                    </select>
                @endif
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Kecamatan</label>
                @if (Auth::user()->superadmins->kecamatan == null)
                    <select name="provinsi" class="w-full border rounded-md p-2">
                        <option selected>Data Belum Terisi</option>
                    </select>
                @else
                    <select name="provinsi" class="w-full border rounded-md p-2">
                        <option selected>{{ Auth::user()->superadmins->kecamatan }}</option>
                    </select>
                @endif
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium mb-1">Desa</label>
                @if (Auth::user()->superadmins->desa == null)
                    <input type="text" readonly
                        class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300"
                        value="Data Belum terisi">
                @else
                    <input type="text" readonly
                        class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300"
                        value="{{ Auth::user()->superadmins->desa }}">
                @endif
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Kode Pos</label>
                @if (Auth::user()->superadmins->kode_pos == null)
                    <input type="text" readonly
                        class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300"
                        value="Data Belum Terisi">
                @else
                    <input type="text" readonly
                        class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300"
                        value="{{ Auth::user()->superadmins->kode_pos }}">
                @endif
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Detail Lainnya</label>
            @if (Auth::user()->superadmins->detail_alamat == null)
                <input type="text"
                    class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300"
                    value="Data Belum Terisi" readonly>
            @else
                <input type="text"
                    class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300"
                    value="{{ Auth::user()->superadmins->detail_alamat }}" readonly>
            @endif
        </div>

        <div class="flex justify-center pt-2">
            <a href="/dashboard/superadmin/profile/edit"
                class="bg-[#fa6601] hover:bg-gray-700 text-white px-8 py-2 rounded-md">
                Edit
            </a>
        </div>
    @endsection
