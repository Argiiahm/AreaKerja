@extends('Super-Admin.layouts.index')
@section('super_admin-content')
        <section class="pt-40 mx-10">
        <div class=" mx-auto bg-white p-6">
            <h2 class="text-xl font-semibold text-gray-800 border-b-2 border-orange-500 pb-1 mb-6">
                Edit Pendidikan
            </h2>
            <form class="space-y-4" action="/update/superadmin/kandidat/pendidikan/{{ $Data->id }}" method="POST">
                @csrf
                @method('PUT')
                <input type="text" hidden name="pelamars_id" value="{{ $Data->pelamar_id }}">
                <div>
                    <label for="pendidikan"
                        class="block mb-2 text-sm font-medium text-gray-900 ">Pendidikan</label>
                    <input type="text" name="pendidikan" id="pendidikan"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                        placeholder="pendidikan" value="{{ $Data->pendidikan }}" />
                </div>
                <div>
                    <label for="jurusan"
                        class="block mb-2 text-sm font-medium text-gray-900 ">jurusan</label>
                    <input type="text" name="jurusan" id="jurusan"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                        placeholder="jurusan" value="{{ $Data->jurusan }}" />
                </div>
                <div>
                    <label for="asal_pendidikan" class="block mb-2 text-sm font-medium text-gray-900 ">Asal
                        Pendidikan</label>
                    <input type="text" name="asal_pendidikan" id="asal_pendidikan"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                        placeholder="asal_pendidikan" value="{{ $Data->asal_pendidikan }}" />
                </div>
                <div>
                    <label for="tahun_awal" class="block mb-2 text-sm font-medium text-gray-900 ">Tahun
                        Awal</label>
                    <input type="text" name="tahun_awal" id="tahun_awal"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                        placeholder="tahun_awal" value="{{ $Data->tahun_awal }}" />
                </div>
                <div>
                    <label for="tahun_akhir" class="block mb-2 text-sm font-medium text-gray-900 ">Tahun
                        Akhir</label>
                    <input type="text" name="tahun_akhir" id="tahun_akhir"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                        placeholder="tahun_akhir" value="{{ $Data->tahun_akhir }}" />
                </div>
                <button type="submit"
                    class="w-full text-white bg-orange-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan</button>
            </form>
        </div>

    </section>
@endsection