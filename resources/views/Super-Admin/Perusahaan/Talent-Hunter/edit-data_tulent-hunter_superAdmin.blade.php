@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="p-6">
        <div class="mx-auto bg-white rounded-lg shadow-sm p-6">
            <h1 class="text-lg font-medium text-gray-900 mb-6">Edit Data Talent Hunter</h1>

            <form action="/dashboard/superadmin/talenthunter/update/{{ $Data->id }}" method="POST">
                @csrf
                @method('PUT')

                <div class="space-y-4">
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Perusahaan</label>
                        <input type="text" id="nama" name="" value="{{ $Data->perusahaan->nama_perusahaan }}"
                            disabled readonly
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                        <input type="text" id="alamat" name="alamat" value="{{ $Data->alamat }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" id="email" name="email" value="{{ $Data->perusahaan->users->email }}"
                            disabled readonly
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="telepon" class="block text-sm font-medium text-gray-700 mb-1">No.Telepon</label>
                        <input type="text" id="telepon" name="telepon"
                            value="{{ $Data->perusahaan->telepon_perusahaan }}" disabled readonly
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi
                            Perusahaan</label>
                        <textarea id="deskripsi" name="deskripsi" rows="4" disabled readonly
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">{{ $Data->perusahaan->deskripsi }}</textarea>
                    </div>

                    <div>
                        <label for="posisi" class="block text-sm font-medium text-gray-700 mb-1">Posisi yang
                            dibutuhkan</label>
                        <input type="text" id="posisi" name="posisi" value="{{ $Data->posisi }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700">
                            Gender <span class="text-red-500">*</span>
                        </label>
                        <div class="flex space-x-6 mt-1">
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input type="radio" name="gender" value="Laki-laki"
                                    class="w-4 h-4 text-orange-500 focus:ring-orange-500 border-gray-300"
                                    {{ $Data->gender === 'Laki-laki' ? 'checked' : '' }}>
                                <span>Laki - Laki</span>
                            </label>

                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input type="radio" name="gender" value="Perempuan"
                                    class="w-4 h-4 text-orange-500 focus:ring-orange-500 border-gray-300"
                                    {{ $Data->gender === 'perempuan' ? 'checked' : '' }}>
                                <span>Perempuan</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label for="gaji" class="block text-sm font-medium text-gray-700 mb-1">Gaji</label>
                        <div class="flex space-x-4">
                            <input type="text" id="gaji_min" name="gaji_awal" value="Rp. {{ $Data->gaji_awal }}"
                                class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                            <input type="text" id="gaji_max" name="gaji_akhir" value="Rp. {{ $Data->gaji_akhir }}"
                                class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                        </div>
                    </div>

                    {{-- <div>
                        <label for="culture" class="block text-sm font-medium text-gray-700 mb-1">Culture
                            Perusahaan</label>
                        <textarea id="culture" name="culture" rows="6"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"></textarea>
                    </div> --}}
                </div>

                <div class="flex space-x-3 mt-6 pt-4">
                    <button type="submit"
                        class="px-6 py-2 bg-orange-500 text-white font-medium rounded-md hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 transition-colors">
                        Simpan
                    </button>
                    <button type="button"
                        class="px-6 py-2 border border-gray-300 text-gray-700 font-medium rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
