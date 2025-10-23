@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <section class="mx-auto pt-10 px-4 sm:px-10">
        <div class="mt-8 w-full py-12 sm:py-20 space-y-8">

            @if (session('success'))
                <div id="modalSukses" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                    <div class="bg-white rounded-xl shadow-lg w-[350px] text-center relative p-6">
                        <button id="closeSukses"
                            class="absolute top-2 right-3 text-gray-400 text-xl hover:text-gray-600">×</button>

                        <div class="flex flex-col items-center justify-center space-y-4">
                            <div class="flex items-center justify-center w-20 h-20 rounded-full bg-green-100">
                                <div class="flex items-center justify-center w-14 h-14 rounded-full bg-green-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="3" stroke="white" class="w-10 h-10">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                            </div>

                            <p class="text-gray-800 font-semibold text-[15px]">Kata Sandi Berhasil Di Ubah</p>
                        </div>
                    </div>
                </div>
                <script>
                    setTimeout(() => {
                        document.getElementById('modalSukses')?.classList.add('hidden');
                    }, 2000);

                    document.getElementById('closeSukses')?.addEventListener('click', () => {
                        document.getElementById('modalSukses').classList.add('hidden');
                    });
                </script>
            @endif

            <div class="w-full">
                <button type="button"
                    class="w-full bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg shadow text-center">
                    Ganti Password
                </button>
            </div>

            <form action="/dashboard/superadmin/pengaturan/change_password/{{ Auth::user()->id }}" method="POST"
                class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-[200px_minmax(0,1fr)] items-start gap-4">
                    <label class="font-medium mt-2">Kata Sandi Lama <span class="text-red-500">*</span></label>
                    <div>
                        <input type="password" name="password"
                            class="w-72 border border-orange-400 rounded-md p-2 focus:ring-2 focus:ring-orange-400"
                            required>
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-[200px_minmax(0,1fr)] items-start gap-4">
                    <label class="font-medium mt-2">Kata Sandi Baru <span class="text-red-500">*</span></label>
                    <div>
                        <input type="password" name="password_new"
                            class="w-72 border border-orange-400 rounded-md p-2 focus:ring-2 focus:ring-orange-400"
                            required>
                        @error('password_new')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-[200px_minmax(0,1fr)] items-start gap-4">
                    <label class="font-medium mt-2">Masukkan Kembali Kata Sandi Baru <span
                            class="text-red-500">*</span></label>
                    <div>
                        <input type="password" name="password_new_confirmation"
                            class="w-72 border border-orange-400 rounded-md p-2 focus:ring-2 focus:ring-orange-400"
                            required>
                        @error('password_new_confirmation')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex gap-3 items-center">
                    <button type="submit" class="bg-orange-500 hover:bg-orange-600 px-10 py-2 text-white rounded-lg">
                        Simpan
                    </button>
                    <button type="button" class="border border-orange-500 hover:bg-orange-50 px-10 py-2 rounded-lg">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
