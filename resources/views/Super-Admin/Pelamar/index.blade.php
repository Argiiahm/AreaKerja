@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="mx-aut p-6 mt-8 border-2 rounded-lg px-5 lg:px-20 md:px-5">
        <h2 class="text-lg font-semibold mb-6">Edit Profile</h2>

        <div class="flex items-center gap-4 mb-6">
            <img src="https://plus.unsplash.com/premium_photo-1689568126014-06fea9d5d341?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8cHJvZmlsZXxlbnwwfHwwfHx8MA%3D%3D"
                alt="Profile Picture" class="w-20 h-20 rounded-full object-cover border">
            <div>
                <h3 class="font-semibold text-lg">Rehan Gaming</h3>
                <p class="text-gray-500 text-sm">rehan@gmail.com</p>
            </div>
        </div>

        <form action="" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Email</label>
                    <input type="email" name="email"
                        class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Username</label>
                    <input type="text" name="username"
                        class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Nama Lengkap</label>
                <input type="text" name="nama_lengkap"
                    class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Provinsi</label>
                    <select name="provinsi" class="w-full border rounded-md p-2">
                        <option selected>Yogyakarta</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Kota/Kabupaten</label>
                    <select name="kota" class="w-full border rounded-md p-2">
                        <option selected>Sleman</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Kecamatan</label>
                    <select name="kecamatan" class="w-full border rounded-md p-2">
                        <option selected>Maguwohrjo</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Desa</label>
                    <input type="text" name="desa"
                        class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Kode Pos</label>
                    <input type="text" name="kode_pos"
                        class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Detail Lainnya</label>
                <input type="text" name="detail_lainnya"
                    class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300">
            </div>

            <div class="flex justify-center pt-2">
                <a href="/dashboard/superadmin/pelamar/edit"
                    class="bg-[#fa6601] hover:bg-gray-700 text-white px-8 py-2 rounded-md">
                    Edit
                </a>
            </div>
        </form>
    </div>
@endsection
