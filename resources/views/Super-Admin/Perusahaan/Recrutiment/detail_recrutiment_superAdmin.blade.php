@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="mx-auto bg-white shadow-md rounded-xl p-6">
        <div class="flex items-start gap-4">
            <img src="https://static.vecteezy.com/system/resources/thumbnails/005/544/718/small_2x/profile-icon-design-free-vector.jpg"
                class="w-20 h-20 rounded-full object-cover">
            <div>
                <h2 class="text-xl font-semibold">Bambang Kurnia</h2>
                <p class="text-gray-600 text-sm">
                    Saya adalah lulusan Teknik Informatika di Universitas Gadjah Mada yang memiliki minat besar dalam
                    pengembangan web dan aplikasi.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mt-6 text-sm">
            <div>
                <p><span class="font-medium">User ID:</span> 7469180000</p>
                <p><span class="font-medium">Nama Lengkap:</span> Bambang Kurnia</p>
                <p><span class="font-medium">Alamat:</span> Jl. RE Martadinata RT10 No.80</p>
                <p><span class="font-medium">No.Telepon:</span> 089653653021</p>
                <p><span class="font-medium">Social Media:</span></p>
                <ul class="ml-4 list-disc">
                    <li>Instagram : bambang_kurnia</li>
                    <li>LinkedIn : bambang_kurnia</li>
                    <li>Website : www.bambangkurnia.com</li>
                    <li>Twitter : bambang_kurnia</li>
                </ul>
            </div>
            <div>
                <p><span class="font-medium">Username:</span> bambang_kurnia</p>
                <p><span class="font-medium">Email:</span> bambang_kurnia@gmail.com</p>
                <p><span class="font-medium">Gender:</span> Laki-laki</p>
                <p><span class="font-medium">Keahlian:</span> Front-end Developer</p>
            </div>
        </div>

        <div class="mt-6">
            <h3 class="font-semibold">Organisasi</h3>
            <ul class="list-decimal ml-6">
                <li>Nama Organisasi | Jabatan | 20xx–20xx</li>
                <li>Nama Organisasi | Jabatan | 20xx–20xx</li>
            </ul>
        </div>

        <div class="mt-4">
            <h3 class="font-semibold">Pengalaman Kerja</h3>
            <ul class="list-decimal ml-6">
                <li>Nama Pekerjaan | Nama Perusahaan | Lokasi | 20xx–20xx</li>
                <li>Nama Pekerjaan | Nama Perusahaan | Lokasi | 20xx–20xx</li>
            </ul>
        </div>

        <div class="mt-4">
            <h3 class="font-semibold">Riwayat Pendidikan</h3>
            <ul class="list-decimal ml-6">
                <li>SMA N 1 Yogyakarta | Teknik Komputer dan Jaringan | 20xx–20xx</li>
                <li>Universitas Amikom Yogyakarta | Informatika | 20xx–20xx</li>
            </ul>
        </div>

        <div class="flex justify-center gap-4 mt-6">
            <a href="/dashboard/superadmin/recrutiment/edit"
                class="px-6 py-2 bg-cyan-500 text-white rounded-md">Edit</a>
            <a href="#" class="px-6 py-2 bg-green-500 text-white rounded-md">Unduh</a>
            <a href="#" class="px-6 py-2 bg-red-500 text-white rounded-md">Hapus</a>
        </div>
    @endsection
