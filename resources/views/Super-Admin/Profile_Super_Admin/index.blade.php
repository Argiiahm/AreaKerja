@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="mx-auto p-6 mt-8 border-2 rounded-lg px-5 lg:px-20 md:px-5 bg-white shadow-md space-y-6">
        <h2 class="text-2xl font-bold text-gray-800 border-b pb-3">Edit Profile</h2>

        <div class="flex items-center gap-5">
            @if (Auth::user()->superadmins->img_profile)
                <img src="{{ asset('storage/' . Auth::user()->superadmins->img_profile) }}" 
                     alt="Profile Picture" 
                     class="w-24 h-24 rounded-full object-cover border-2 border-gray-300 shadow">
            @else
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                     alt="Profile Picture" 
                     class="w-24 h-24 rounded-full object-cover border-2 border-gray-300 shadow">
            @endif

            <div>
                <h3 class="font-semibold text-xl text-gray-800">{{ Auth::user()->superadmins->nama_lengkap }}</h3>
                <p class="text-gray-500">{{ Auth::user()->email }}</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium mb-1">Email</label>
                <input type="email" readonly
                       class="w-full border rounded-md p-2.5 focus:outline-none focus:ring-2 focus:ring-gray-300 bg-gray-50"
                       value="{{ Auth::user()->email }}">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Username</label>
                <input type="text" readonly
                       class="w-full border rounded-md p-2.5 focus:outline-none focus:ring-2 focus:ring-gray-300 bg-gray-50"
                       value="{{ Auth::user()->username }}">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Nama Lengkap</label>
            <input type="text" readonly
                   class="w-full border rounded-md p-2.5 focus:outline-none focus:ring-2 focus:ring-gray-300 bg-gray-50"
                   value="{{ Auth::user()->superadmins->nama_lengkap }}">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label class="block text-sm font-medium mb-1">Provinsi</label>
                <select disabled class="w-full border rounded-md p-2.5 bg-gray-50">
                    <option selected>{{ Auth::user()->superadmins->provinsi ?? 'Data Belum Terisi' }}</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Kota/Kabupaten</label>
                <select disabled class="w-full border rounded-md p-2.5 bg-gray-50">
                    <option selected>{{ Auth::user()->superadmins->kota ?? 'Data Belum Terisi' }}</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Kecamatan</label>
                <select disabled class="w-full border rounded-md p-2.5 bg-gray-50">
                    <option selected>{{ Auth::user()->superadmins->kecamatan ?? 'Data Belum Terisi' }}</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium mb-1">Desa</label>
                <input type="text" readonly
                       class="w-full border rounded-md p-2.5 bg-gray-50"
                       value="{{ Auth::user()->superadmins->desa ?? 'Data Belum Terisi' }}">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Kode Pos</label>
                <input type="text" readonly
                       class="w-full border rounded-md p-2.5 bg-gray-50"
                       value="{{ Auth::user()->superadmins->kode_pos ?? 'Data Belum Terisi' }}">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Detail Lainnya</label>
            <input type="text" readonly
                   class="w-full border rounded-md p-2.5 bg-gray-50"
                   value="{{ Auth::user()->superadmins->detail_alamat ?? 'Data Belum Terisi' }}">
        </div>

        <div class="flex justify-center pt-4">
            <a href="/dashboard/superadmin/profile/edit"
               class="bg-[#fa6601] hover:bg-gray-700 text-white px-8 py-2 rounded-md shadow">
                Edit
            </a>
        </div>
    </div>
@endsection
