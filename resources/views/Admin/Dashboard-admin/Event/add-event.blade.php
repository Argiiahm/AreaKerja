@extends('Admin.Dashboard-admin.layouts.index')

@section('admin-content')
<div class="p-8 bg-[#F9FAFB] min-h-screen">
    <div class="max-w-5xl mx-auto">
        {{-- Header --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Buat Event Baru</h1>
                <p class="text-sm text-gray-500 mt-1">Lengkapi detail acara untuk dipublikasikan kepada peserta.</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="/dashboard/superadmin/event" class="px-5 py-2.5 text-sm font-semibold text-gray-500 hover:text-gray-900 transition-colors">Batal</a>
                <button type="submit" form="eventForm" class="bg-gray-900 text-white px-8 py-2.5 rounded-xl text-sm font-bold hover:bg-black transition-all shadow-sm">
                    Simpan Event
                </button>
            </div>
        </div>

        <form id="eventForm" action="/dashboard/admin/event/tambah" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                {{-- Kiri: Informasi Utama --}}
                <div class="lg:col-span-2 space-y-6">
                    {{-- Judul & Konten --}}
                    <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm space-y-6">
                        <div class="space-y-2">
                            <label class="text-[11px] font-bold text-gray-400 uppercase tracking-wider">Judul Event</label>
                            <input type="text" name="title" required placeholder="Contoh: Webinar Strategi Karir 2026"
                                class="w-full text-xl font-bold text-gray-900 border-none p-0 focus:ring-0 placeholder:text-gray-200 bg-transparent">
                            <div class="h-[1px] bg-gray-100 w-full"></div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-[11px] font-bold text-gray-400 uppercase tracking-wider">Deskripsi Lengkap</label>
                            <div class="prose max-w-none">
                                <input id="x" type="hidden" name="content">
                                <trix-editor input="x" placeholder="Tulis rincian acara Anda di sini..." class="trix-content border-none p-0 focus:ring-0 min-h-[300px]"></trix-editor>
                            </div>
                        </div>
                    </div>

                    {{-- Agenda Kegiatan --}}
                    <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
                        <div class="flex justify-between items-center mb-6">
                            <label class="text-[11px] font-bold text-gray-400 uppercase tracking-wider">Agenda Kegiatan</label>
                            <button type="button" id="addRow" class="text-xs font-bold text-green-600 hover:text-green-700 flex items-center gap-1">
                                <i class="ph ph-plus-circle text-lg"></i> Tambah Acara
                            </button>
                        </div>
                        
                        <div id="daftarKegiatan" class="space-y-3">
                            <div class="flex gap-3 group">
                                <input type="time" name="waktu[]" value="08:00"
                                    class="w-32 bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-1 focus:ring-gray-900 outline-none">
                                <input type="text" name="kegiatan[]" placeholder="Pembukaan & Registrasi"
                                    class="flex-1 bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-1 focus:ring-gray-900 outline-none">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Kanan: Pengaturan & Media --}}
                <div class="space-y-6">
                    {{-- Media --}}
                    <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
                        <label class="text-[11px] font-bold text-gray-400 uppercase tracking-wider block mb-4">Poster Event</label>
                        <div id="previewContainer" class="hidden mb-4 relative rounded-xl overflow-hidden border border-gray-100 shadow-inner">
                            <img id="previewImage" class="w-full h-auto object-cover">
                        </div>
                        <label for="uploadMedia" class="flex flex-col items-center justify-center py-8 border-2 border-dashed border-gray-100 rounded-xl cursor-pointer hover:bg-gray-50 transition-all group">
                            <i class="ph ph-cloud-arrow-up text-3xl text-gray-300 group-hover:text-green-500 transition-colors"></i>
                            <span class="text-xs font-medium text-gray-500 mt-2">Upload Poster</span>
                            <input id="uploadMedia" name="image" type="file" accept="image/*" hidden>
                        </label>
                    </div>

                    {{-- Status & Quota --}}
                    <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm space-y-4">
                        <div class="space-y-2">
                            <label class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Status</label>
                            <select name="status" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-1 focus:ring-gray-900 outline-none appearance-none">
                                <option value="open">Open (Terbuka)</option>
                                <option value="close">Close (Ditutup)</option>
                            </select>
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Kuota Peserta</label>
                            <div class="relative">
                                <i class="ph ph-users absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                <input type="number" name="kuota" value="100" class="w-full bg-gray-50 border border-gray-200 rounded-xl pl-10 pr-4 py-2.5 text-sm focus:ring-1 focus:ring-gray-900 outline-none">
                            </div>
                        </div>
                    </div>

                    {{-- Waktu --}}
                    <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm space-y-4">
                        <label class="text-[11px] font-bold text-gray-400 uppercase tracking-wider block">Jadwal Pelaksanaan</label>
                        <div class="space-y-4">
                            <div class="space-y-1">
                                <span class="text-[10px] text-gray-400 font-medium ml-1">Mulai</span>
                                <div class="flex gap-2">
                                    <input type="date" name="tgl_mulai" class="flex-1 bg-gray-50 border border-gray-100 rounded-lg p-2 text-xs">
                                    <input type="time" name="jam_mulai" value="08:00" class="w-20 bg-gray-50 border border-gray-100 rounded-lg p-2 text-xs">
                                </div>
                            </div>
                            <div class="space-y-1">
                                <span class="text-[10px] text-gray-400 font-medium ml-1">Selesai</span>
                                <div class="flex gap-2">
                                    <input type="date" name="tgl_akhir" class="flex-1 bg-gray-50 border border-gray-100 rounded-lg p-2 text-xs">
                                    <input type="time" name="jam_akhir" value="17:00" class="w-20 bg-gray-50 border border-gray-100 rounded-lg p-2 text-xs">
                                </div>
                            </div>
                            <div class="pt-2 border-t border-gray-50">
                                <span class="text-[10px] text-gray-400 font-medium ml-1 uppercase tracking-tight">Batas Pendaftaran</span>
                                <input type="date" name="penutupan_pendaftaran" class="w-full mt-1 bg-gray-50 border border-gray-100 rounded-lg p-2 text-xs">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
    /* Trix Overhaul */
    trix-toolbar { @apply sticky top-0 bg-white z-10 py-2 border-b border-gray-50 mb-4; }
    trix-toolbar .trix-button { @apply bg-transparent border-none scale-90 hover:bg-gray-50 rounded-md !important; }
    .trix-content { @apply text-gray-700 leading-relaxed border-none outline-none !important; }
    /* Hide number arrows */
    input::-webkit-outer-spin-button, input::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; }
</style>

<script>
    // Preview Image
    document.getElementById('uploadMedia').addEventListener('change', function(e) {
        const preview = document.getElementById('previewImage');
        const container = document.getElementById('previewContainer');
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                preview.src = event.target.result;
                container.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }
    });

    // Dynamic Agenda Rows
    document.getElementById('addRow').addEventListener('click', function() {
        const wrapper = document.getElementById('daftarKegiatan');
        const newRow = document.createElement('div');
        newRow.className = 'flex gap-3 group animate-fadeIn';
        newRow.innerHTML = `
            <input type="time" name="waktu[]" value="09:00" class="w-32 bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-1 focus:ring-gray-900 outline-none">
            <input type="text" name="kegiatan[]" placeholder="Deskripsi acara..." class="flex-1 bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-1 focus:ring-gray-900 outline-none">
        `;
        wrapper.appendChild(newRow);
    });
</script>
@endsection