@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="p-8 bg-[#F9FAFB] min-h-screen">
        <div class="max-w-7xl mx-auto">
            {{-- Header Section --}}
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
                <div class="flex items-center gap-4">
                    <a href="/dashboard/superadmin/finance"
                        class="p-2 bg-white border border-gray-200 rounded-xl text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                        <i class="ph ph-arrow-left text-xl"></i>
                    </a>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Edit Harga Tunai</h1>
                        <p class="text-sm text-gray-500 mt-1">Sesuaikan tarif untuk paket pembayaran via uang tunai
                            (Rupiah).</p>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <button type="button" form="editForm" onclick="document.getElementById('editForm').submit();"
                        class="px-5 py-2.5 text-sm font-semibold text-white bg-gray-900 hover:bg-black rounded-xl transition-colors shadow-sm inline-flex items-center">
                        <i class="ph ph-floppy-disk mr-2 text-lg"></i> Simpan Perubahan
                    </button>
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
                    <h2 class="text-sm font-bold text-gray-900 uppercase tracking-widest">Daftar Harga Paket Tunai</h2>
                </div>

                <form id="editForm" action="/dashboard/superadmin/update/harga/tunai" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="overflow-x-auto no-scrollbar">
                        <table class="w-full text-left border-collapse min-w-[600px]">
                            <thead class="bg-white">
                                <tr>
                                    <th
                                        class="px-6 py-4 border-b border-gray-100 text-xs font-bold text-gray-400 uppercase tracking-widest w-1/2">
                                        Nama Paket</th>
                                    <th
                                        class="px-6 py-4 border-b border-gray-100 text-xs font-bold text-gray-400 uppercase tracking-widest w-1/2">
                                        Harga (Rupiah)</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                @foreach ($harga as $h)
                                    <tr class="hover:bg-gray-50/50 transition-colors group">
                                        <td class="px-6 py-5">
                                            <div class="flex items-center">
                                                <div
                                                    class="w-10 h-10 rounded-full bg-green-50 flex items-center justify-center mr-4">
                                                    <i class="ph ph-money text-green-600 text-xl"></i>
                                                </div>
                                                <span class="text-sm font-semibold text-gray-900">{{ $h->nama }}</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-5">
                                            <div class="relative max-w-[250px]">
                                                <input type="hidden" name="id[]" value="{{ $h->id }}">
                                                <div class="flex items-center">
                                                    <span
                                                        class="absolute left-0 top-0 bottom-0 flex items-center px-4 bg-gray-50 border border-r-0 border-gray-300 rounded-l-xl text-gray-500 font-medium text-sm">
                                                        Rp
                                                    </span>
                                                    <input type="number" name="harga[]" value="{{ $h->harga }}"
                                                        class="block w-full rounded-r-xl border border-gray-300 py-2.5 px-4 text-sm font-mono text-gray-900 focus:border-orange-500 focus:ring-1 focus:ring-orange-500 bg-white transition-shadow pl-14"
                                                        min="0" required>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection