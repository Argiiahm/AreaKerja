@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="p-6">
        <div class="flex justify-end mb-4">
            <div class="flex items-center space-x-2 mt-0 lg:mt-0 md:mt">
                <input type="text" placeholder="name/username" id="searchInput"
                    class="border border-gray-300 rounded-md px-3 py-2 w-64 focus:outline-none focus:ring-2 focus:ring-gray-400">
                <button class="bg-gray-700 text-white px-4 py-2 rounded-md" type="button" onclick="searchTable()">Cari</button>
            </div>
        </div>

        <div id="" class="bg-white border rounded-2xl shadow-sm overflow-x-auto">
            <table id="myTable" class="w-full">
                <thead>
                    <tr class="text-left">
                        <th class="px-6 py-3 font-semibold text-gray-700">No</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Username</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Email</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">role</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Telepon</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Alamat</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Status</th>
                        <th class="px-6 py-3 font-semibold text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Data as $d)
                        <tr class="">
                            <td class="px-6 py-3 text-gray-700">{{ $d->id }}</td>
                            <td class="px-6 py-3 text-gray-700">{{ $d->username }}</td>
                            <td class="px-6 py-3 text-gray-700">{{ $d->email }}</td>
                            <td class="px-6 py-3 text-gray-700">{{ $d->role }}</td>
                            <td>
                                @if ($d->role == 'pelamar')
                                    {{ $d->pelamars->telepon_pelamar ?? '-' }}
                                @elseif($d->role == 'perusahaan')
                                    {{ $d->perusahaan->telepon_perusahaan ?? '-' }}
                                @elseif($d->role == 'finance')
                                    -
                                @elseif($d->role == 'admin')
                                    -
                                @elseif($d->role == 'superadmin')
                                    -
                                @endif
                            </td>
                            <td>
                                @if ($d->role == 'pelamar')
                                    {{ $d->pelamars()->latest()->first()->alamat_pelamars()->latest()->first()->provinsi ?? '-' }}
                                @elseif($d->role == 'perusahaan')
                                    {{ $d->perusahaan()->latest()->first()->alamatperusahaan()->latest()->first()->provinsi ?? '-' }}
                                @elseif($d->role == 'finance')
                                    {{ $d->finance->provinsi ?? '-' }}
                                @elseif($d->role == 'admin')
                                    {{ $d->admin->provinsi ?? '-' }}
                                @elseif($d->role == 'superadmin')
                                    {{ $d->superadmins->provinsi ?? '-' }}
                                @endif
                            </td>
                            @if ($d->status === 0)
                                <td class="px-6 py-3 text-gray-700 "><span class="bg-blue-500 text-green-100 text-sm font-medium me-2 px-2.5 py-0.5 rounded-sm">Aktif</span></td>
                            @elseif ($d->status === 1)
                                <td class="px-6 py-3 text-gray-700"><span class="bg-red-500 text-green-100 text-sm font-medium me-2 px-2.5 py-0.5 rounded-sm">Banned</span></td>
                            @endif
                            <td class="px-6 py-4">
                                <a href="/dashboard/superadmin/freeze/detail/{{ $d->id }}" class="">
                                    <img src="{{ asset('Icon/fzd.png') }}" alt="">
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
<script>  
document.getElementById("searchInput").addEventListener("keyup", function() {
    let input = this.value.toLowerCase();
    let rows = document.querySelectorAll("#myTable tbody tr");

    rows.forEach(row => {
        let rowText = row.innerText.toLowerCase();
        row.style.display = rowText.includes(input) ? "" : "none";
    });
});
</script>
@endsection
