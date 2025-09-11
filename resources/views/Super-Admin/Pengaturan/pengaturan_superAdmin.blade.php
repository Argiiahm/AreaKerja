@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <section class="mx-auto pt-10 px-4 sm:px-10">
        <div class="mt-8 w-full py-12 sm:py-20 space-y-8">
            
            {{-- Tombol Ganti Password (sejajar dengan input) --}}
            <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                <label class="sm:w-60"></label> {{-- label kosong buat sejajar --}}
                <a href="#"
                   class="flex-1 bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg shadow block text-center sm:text-left">
                    Ganti Password
                </a>
            </div>


            <!-- {{-- Tombol Ganti Password (full kiri–kanan) --}}
<div>
    <a href="#"
       class="w-full bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg shadow block text-center">
        Ganti Password
    </a>
</div> -->


            {{-- Form Ganti Password --}}
            <form action="#" method="POST" class="space-y-6">
                @csrf

                {{-- Kata Sandi Lama --}}
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <label class="sm:w-60 font-medium">
                        Kata Sandi Lama <span class="text-red-500">*</span>
                    </label>
                    <input type="password" 
                           class="flex-1 border border-orange-400 rounded-md p-2 focus:ring-2 focus:ring-orange-400">
                </div>

                {{-- Kata Sandi Baru --}}
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <label class="sm:w-60 font-medium">
                        Kata Sandi Baru <span class="text-red-500">*</span>
                    </label>
                    <input type="password" 
                           class="flex-1 border border-orange-400 rounded-md p-2 focus:ring-2 focus:ring-orange-400">
                </div>

                {{-- Konfirmasi Kata Sandi Baru --}}
                <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                    <label class="sm:w-60 font-medium">
                        Masukan Kembali Kata Sandi Baru <span class="text-red-500">*</span>
                    </label>
                    <input type="password" 
                           class="flex-1 border border-orange-400 rounded-md p-2 focus:ring-2 focus:ring-orange-400">
                </div>

                {{-- Tombol Aksi --}}
                <div class="flex gap-3 items-center">
                    <button type="submit"
                            class="bg-orange-500 hover:bg-orange-600 px-10 py-2 text-white rounded-lg">
                        Simpan
                    </button>
                    <button type="button"
                            class="border border-orange-500 hover:bg-orange-50 px-10 py-2 rounded-lg">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
