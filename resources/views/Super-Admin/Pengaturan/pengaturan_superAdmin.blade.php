@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <section class="mx-auto pt-10 px-4 sm:px-10">
        <div class="mt-8 w-full py-12 sm:py-20 space-y-8">
            <div class="w-full sm:w-8/12">
                <a href="#"
                    class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg shadow block text-center sm:text-left">
                    Ganti Password
                </a>
            </div>

            <form action="#" method="POST" class="space-y-6">
                @csrf
                <div class="flex flex-col sm:flex-row sm:items-center lg:gap-[200px] gap-3 md:gap-32">
                    <label class="sm:w-40 font-medium">Kata Sandi Lama <span class="text-red-500">*</span></label>
                    <input type="password"
                        class="lg:px-[122px] border border-orange-400 rounded-md p-2 focus:ring-2 focus:ring-orange-400">
                </div>

                <div class="flex flex-col sm:flex-row sm:items-center lg:gap-[200px] gap-3 md:gap-32">
                    <label class="sm:w-40 font-medium">Kata Sandi Baru <span class="text-red-500">*</span></label>
                    <input type="password"
                        class="lg:px-[122px] border border-orange-400 rounded-md p-2 focus:ring-2 focus:ring-orange-400">
                </div>

                <div class="flex flex-col sm:flex-row sm:items-center lg:gap-[60px] gap-3 md:gap-12">
                    <label class="md:w-60 lg:w-3/12 font-medium">Masukan Kembali Kata Sandi Baru <span
                            class="text-red-500">*</span></label>
                    <input type="password"
                        class="lg:px-[122px] border border-orange-400 rounded-md p-2 focus:ring-2 focus:ring-orange-400">
                </div>
                <div class="flex gap-2 items-center">
                    <button class="bg-orange-500 px-10 py-2 text-white rounded-lg">Simpan</button>
                    <button class="border border-orange-500 px-10 py-2 rounded-lg">Batal</button>
                </div>
            </form>
        </div>
    </section>
@endsection
