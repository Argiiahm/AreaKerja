@extends('Admin.Dashboard-admin.layouts.index')

@section('admin-content')
<div class="p-8 bg-[#F9FAFB] min-h-screen" x-data="eventSearch()">
    {{-- Header Section --}}
    <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Manajemen Event</h1>
            <p class="text-sm text-gray-500 mt-1">Kelola jadwal, kuota, dan status event aktif Anda.</p>
        </div>
        
        <a href="/dashboard/admin/event/add" class="inline-flex items-center gap-2 bg-gray-900 text-white px-5 py-2.5 rounded-xl text-sm font-bold hover:bg-black transition-all shadow-sm">
            <i class="ph ph-plus-circle text-lg"></i>
            Buat Event Baru
        </a>
    </div>

    {{-- Filter & Search Card --}}
    <div class="bg-white border border-gray-200 rounded-2xl p-4 mb-6 shadow-sm flex items-center gap-3">
        <div class="relative flex-1 group">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="ph ph-magnifying-glass text-gray-400 group-focus-within:text-gray-900 transition-colors"></i>
            </div>
            <input type="text" x-model="search" placeholder="Cari nama event, status, atau tanggal..."
                class="block w-full pl-10 pr-3 py-2.5 border border-gray-200 rounded-xl focus:ring-1 focus:ring-gray-900 focus:border-gray-900 outline-none transition-all text-sm">
        </div>
    </div>

    {{-- Table Section --}}
    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-100">
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Status</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Nama Event</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest text-center">Kuota</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Waktu Pelaksanaan</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($Data as $d)
                    <tr class="hover:bg-gray-50/50 transition-colors group"
                        x-show="matchesSearch('{{ strtolower($d->title ?? '') }}', '{{ strtolower($d->status ?? '') }}', '{{ strtolower($d->tgl_mulai ?? '') }}', '{{ strtolower($d->tgl_akhir ?? '') }}')">
                        
                        <td class="px-6 py-4">
                            @if(strtolower($d->status) == 'aktif' || strtolower($d->status) == 'active')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-green-50 text-green-600 border border-green-100 uppercase">
                                    {{ $d->status }}
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-gray-100 text-gray-500 border border-gray-200 uppercase">
                                    {{ $d->status }}
                                </span>
                            @endif
                        </td>
                        
                        <td class="px-6 py-4">
                            <a href="/dashboard/admin/event/detail/{{ $d->id }}" class="text-sm font-semibold text-gray-900 hover:text-blue-600 transition-colors block">
                                {{ $d->title }}
                            </a>
                            <span class="text-[10px] text-gray-400">ID: #EVT-{{ $d->id }}</span>
                        </td>

                        <td class="px-6 py-4 text-center">
                            <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-gray-50 border border-gray-100">
                                <i class="ph ph-users text-gray-400"></i>
                                <span class="text-xs font-bold text-gray-700">{{ $d->kuota }}</span>
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex flex-col">
                                <span class="text-xs font-medium text-gray-700">{{ $d->tgl_mulai }}</span>
                                <span class="text-[10px] text-gray-400">s/d {{ $d->tgl_akhir }}</span>
                            </div>
                        </td>

                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end items-center gap-2">
                                <a href="/dashboard/admin/event/edit/{{ $d->id }}" class="p-2 text-gray-400 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-all">
                                    <i class="ph ph-pencil-simple text-lg"></i>
                                </a>
                                <form action="/dashboard/admin/event/hapus/{{ $d->id }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Apakah Anda Yakin?')" class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all">
                                        <i class="ph ph-trash text-lg"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function eventSearch() {
        return {
            search: '',
            matchesSearch(nama, status, mulai, akhir) {
                const keyword = this.search.toLowerCase().trim();
                if (keyword === '') return true;
                return (
                    nama.includes(keyword) ||
                    status.includes(keyword) ||
                    mulai.includes(keyword) ||
                    akhir.includes(keyword)
                );
            }
        }
    }
</script>
@endsection