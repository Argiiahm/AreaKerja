@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="mx-auto mt-10">
        <div class=" border-2 rounded-xl relative">
            <div class="flex items-center space-x-4 mb-6 pb-3 p-10 border-b rounded-b-2xl shadow-md">
                <img src="https://via.placeholder.com/100" alt="Profile" class="w-20 h-20 rounded-full border" />

                <form id="hapus" action="/dashboard/superadmin/hapus/{{ $data->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                </form>

                <form id="unbanned" action="/dashboard/superadmin/unbanned/{{ $data->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="number" name="status" value="0" hidden>
                </form>

                <form id="banned" action="/dashboard/superadmin/banned/{{ $data->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="number" name="status" hidden value="1">
                </form>

                <div class="flex space-x-2">
                    @if ($data->status === 0)
                        <button form="banned" type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-1.5 rounded-lg">
                            Banned
                        </button>
                    @else
                        <button form="unbanned" type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-1.5 rounded-lg">
                            Unbanned
                        </button>
                    @endif
                    <button form="hapus" type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-1.5 rounded-lg">
                        Hapus Akun
                    </button>
                </div>
            </div>
            <div class="p-10">

                <div class="flex space-x-3 mb-3">
                    <div class="flex-1 bg-gray-200 rounded-md py-2 text-center text-sm text-gray-800">
                        {{ $data->username }}
                    </div>
                    <div class="flex-1 bg-gray-200 rounded-md py-2 text-center text-sm text-gray-800">
                        {{ $data->email }}
                    </div>
                </div>

                <div class="bg-gray-200 text-center rounded-md py-2 mb-3 text-sm text-gray-800">
                    @if ($data->role == 'pelamar')
                        {{ $data->pelamars->telepon_pelamar ?? '-' }}
                    @elseif($data->role == 'perusahaan')
                        {{ $data->perusahaan->telepon_perusahaan ?? '-' }}
                    @elseif($data->role == 'finance')
                        -
                    @elseif($data->role == 'admin')
                        -
                    @elseif($data->role == 'superadmin')
                        -
                    @endif
                </div>

                <div class="bg-gray-200 rounded-md py-12 text-center text-sm text-gray-800">
                    @if ($data->role == 'pelamar')
                        {{ $data->pelamars()->latest()->first()->alamat_pelamars()->latest()->first()->detail ?? '-' }}
                    @elseif($data->role == 'perusahaan')
                        {{ $data->perusahaan()->latest()->first()->alamatperusahaan()->latest()->first()->detail ?? '-' }}
                    @elseif($data->role == 'finance')
                        {{ $data->finance->detail_alamat ?? '-' }}
                    @elseif($data->role == 'admin')
                        {{ $data->admin->detail_alamat ?? '-' }}
                    @elseif($data->role == 'superadmin')
                        {{ $data->superadmins->detail_alamat ?? '-' }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
