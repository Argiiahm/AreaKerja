@extends('Admin.Dashboard-admin.layouts.index')

@section('admin-content')
<div class="p-8 bg-white min-h-screen">
    <div class="max-w-4xl mx-auto">
        <form action="/dashboard/admin/tipskerja/create/post" method="POST" enctype="multipart/form-data">
            @csrf
            
            {{-- Header Fix: Tombol di dalam Form --}}
            <div class="flex justify-between items-center mb-8 pb-4 border-b border-gray-100">
                <div>
                    <h1 class="text-xl font-bold text-gray-900">Buat Post Baru</h1>
                    <p class="text-xs text-gray-500">Tulis dan publikasikan tips kerja terbaru.</p>
                </div>
                <div class="flex gap-3">
                    <a href="/dashboard/admin/tipskerja" class="px-4 py-2 text-xs font-medium text-gray-500 hover:text-gray-800 transition-all">Batal</a>
                    {{-- Button Type Submit murni tanpa JS --}}
                    <button type="submit" class="bg-gray-900 text-white px-6 py-2 rounded-lg text-xs font-bold hover:bg-black transition-all shadow-sm">
                        Simpan & Terbitkan
                    </button>
                </div>
            </div>

            <div class="space-y-8">
                {{-- Input Judul --}}
                <div class="space-y-2">
                    <label class="text-[11px] font-bold text-gray-400 uppercase tracking-wider">Judul Artikel</label>
                    <input type="text" name="title" required placeholder="Masukkan judul artikel di sini..."
                        class="w-full text-2xl font-bold text-gray-900 border-none p-0 focus:ring-0 placeholder:text-gray-200 bg-transparent">
                    <div class="h-[1px] bg-gray-100 w-full"></div>
                </div>

                {{-- Upload Media Simple (Murni HTML) --}}
                <div class="p-4 bg-gray-50 rounded-xl border border-gray-100 flex flex-col gap-2">
                    <label class="text-[11px] font-bold text-gray-400 uppercase tracking-wider">Gambar Unggulan</label>
                    <input type="file" name="image" 
                        class="text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-gray-900 file:text-white hover:file:bg-black cursor-pointer">
                    <p class="text-[10px] text-gray-400 italic">*Format: JPG, PNG, atau WEBP (Maks 2MB)</p>
                </div>

                {{-- Editor Trix (Trix menangani input tersembunyi secara internal) --}}
                <div class="space-y-2">
                    <label class="text-[11px] font-bold text-gray-400 uppercase tracking-wider">Konten Artikel</label>
                    <div class="prose max-w-none">
                        <input id="x" type="hidden" name="content">
                        <trix-editor input="x" class="trix-content border-none p-0 focus:ring-0 min-h-[400px]"></trix-editor>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection