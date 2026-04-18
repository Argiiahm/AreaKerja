@extends('Super-Admin.layouts.index')

@section('super_admin-content')
<section class="max-w-4xl mx-auto pt-10 px-4 sm:px-6 lg:px-8">
    
    {{-- Success Modal --}}
    @if (session('success'))
        <div id="modalSukses" class="fixed inset-0 bg-gray-900/60 backdrop-blur-sm flex items-center justify-center z-50 transition-opacity">
            <div class="bg-white rounded-2xl shadow-2xl w-full max-w-sm text-center relative p-8 transform transition-all">
                <button id="closeSukses" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <div class="flex flex-col items-center">
                    <div class="flex items-center justify-center w-20 h-20 rounded-full bg-green-100 mb-4">
                        <div class="flex items-center justify-center w-14 h-14 rounded-full bg-green-500 shadow-lg shadow-green-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="white" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Berhasil!</h3>
                    <p class="text-gray-500 mt-2">Kata sandi Anda telah berhasil diperbarui.</p>
                </div>
            </div>
        </div>
        <script>
            setTimeout(() => {
                const modal = document.getElementById('modalSukses');
                if(modal) modal.style.display = 'none';
            }, 3000);

            document.getElementById('closeSukses')?.addEventListener('click', () => {
                document.getElementById('modalSukses').style.display = 'none';
            });
        </script>
    @endif

    <div class="mt-8 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        {{-- Header Section --}}
        <div class="bg-orange-500 px-6 py-4">
            <h2 class="text-lg font-semibold text-white flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
                Pengaturan Keamanan
            </h2>
        </div>

        <div class="p-6 sm:p-10">
            <form action="/dashboard/superadmin/pengaturan/change_password/{{ Auth::user()->id }}" method="POST" class="space-y-8">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    {{-- Old Password --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-2 md:gap-6 items-center">
                        <label class="text-sm font-semibold text-gray-700">Kata Sandi Lama <span class="text-red-500">*</span></label>
                        <div class="md:col-span-2">
                            <input type="password" name="password" 
                                class="w-full max-w-md border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none transition-all"
                                placeholder="Masukkan sandi saat ini" required>
                            @error('password')
                                <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <hr class="border-gray-50">

                    {{-- New Password --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-2 md:gap-6 items-center">
                        <label class="text-sm font-semibold text-gray-700">Kata Sandi Baru <span class="text-red-500">*</span></label>
                        <div class="md:col-span-2">
                            <input type="password" name="password_new" 
                                class="w-full max-w-md border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none transition-all"
                                placeholder="Minimal 8 karakter" required>
                            @error('password_new')
                                <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Confirm New Password --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-2 md:gap-6 items-center">
                        <label class="text-sm font-semibold text-gray-700">Konfirmasi Sandi <span class="text-red-500">*</span></label>
                        <div class="md:col-span-2">
                            <input type="password" name="password_new_confirmation" 
                                class="w-full max-w-md border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none transition-all"
                                placeholder="Ulangi sandi baru" required>
                        </div>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-col sm:flex-row gap-3 pt-6 border-t border-gray-100">
                    <button type="submit" class="bg-orange-500 hover:bg-orange-600 px-8 py-2.5 text-white font-semibold rounded-lg shadow-md shadow-orange-200 transition-all active:scale-95">
                        Simpan Perubahan
                    </button>
                    <button type="button" class="border border-gray-300 hover:bg-gray-50 px-8 py-2.5 text-gray-700 font-semibold rounded-lg transition-all">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection