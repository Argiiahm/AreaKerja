@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="p-6" x-data="eventSearch()">
        <div class="block lg:flex justify-between items-center mb-4">
            <a href="/dashboard/superadmin/event/add"
                class="bg-gray-700 border text-white px-4 py-2 rounded-md">Buat Event</a>
            <div class="flex items-center space-x-2 mt-0 lg:mt-0 md:mt">
                <input type="text" placeholder="Cari event (nama / status / tanggal)..."
                    x-model="search"
                    class="border border-gray-300 rounded-md px-3 py-2 w-64 focus:outline-none focus:ring-2 focus:ring-gray-400">
                <button class="bg-gray-700 text-white px-4 py-2 rounded-md">Cari</button>
            </div>
        </div>

        <div id="table_koin" class="-my-2 py-2 overflow-x-auto sm:-mx-6 lg:-mx-8 pr-10 lg:px-8">
            <div class="align-middle inline-block min-w-full overflow-hidden px-8 pt-3">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th class="py-3 border-gray-300 text-center leading-4 tracking-wider">Status</th>
                            <th class="py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">Nama</th>
                            <th class="py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">Quota</th>
                            <th class="py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">Mulai</th>
                            <th class="py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">Selesai</th>
                            <th class="py-3 border-gray-300 text-center text-sm leading-4 tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($Data as $d)
                            <tr class="px-6 py-4 whitespace-no-wrap border-gray-500 border-b hover:bg-gray-50 transition-all"
                                x-show="matchesSearch('{{ strtolower($d->title ?? '') }}', '{{ strtolower($d->status ?? '') }}', '{{ strtolower($d->tgl_mulai ?? '') }}', '{{ strtolower($d->tgl_akhir ?? '') }}')">
                                <td class="px-2 py-1">
                                    <span
                                        class="bg-green-500 py-1 px-4 rounded-md text-white">{{ $d->status }}</span>
                                </td>
                                <td class="py-4 whitespace-no-wrap border-gray-500 text-blue-500">
                                    <a href="/dashboard/superadmin/event/detail/{{ $d->id }}">{{ $d->title }}</a>
                                </td>
                                <td class="py-4 whitespace-no-wrap border-gray-500 text-sm leading-5">
                                    {{ $d->kuota }}
                                </td>
                                <td class="py-4 whitespace-no-wrap border-gray-500 text-sm leading-5">
                                    {{ $d->tgl_mulai }}
                                    <span class="pl-2 text-gray-600">{{ $d->jam_mulai }}</span>
                                </td>
                                <td class="py-4 whitespace-no-wrap border-gray-500 text-sm leading-5">
                                    {{ $d->tgl_akhir }}
                                    <span class="pl-2 text-gray-600">{{ $d->jam_akhir }}</span>
                                </td>
                                <td
                                    class="py-4 whitespace-no-wrap text-white font-bold border-gray-500 text-sm leading-5">
                                    <form action="/dashboard/superadmin/event/hapus/{{ $d->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Apakah Anda Yakin?')">
                                            <i class="ph ph-trash text-2xl bg-gray-700 p-0.5 rounded-md"></i>
                                        </button>
                                    </form>
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
