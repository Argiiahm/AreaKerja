    @extends('Super-Admin.layouts.index')

    @section('super_admin-content')
        <div class="mx-auto bg-white shadow-md rounded-xl p-6">

            <div class="flex items-center gap-2">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/005/544/718/small_2x/profile-icon-design-free-vector.jpg"
                    class="w-24 h-24 rounded-full object-cover mb-2">
                <div class="flex gap-2">
                    <div
                        class="flex items-center gap-2 border-2 bg-orange-500 px-6 py-2 rounded-lg w-full sm:w-auto justify-center">
                        <i class="ph ph-upload-simple text-2xl text-white"></i>
                        <span class="text-white">Upload</span>
                    </div>
                    <div
                        class="flex items-center gap-2 border border-orange-500 px-6 py-2 rounded-lg w-full sm:w-auto justify-center">
                        <i class="ph ph-trash text-2xl text-orange-500"></i>
                        <span class="text-orange-500">Remove</span>
                    </div>
                </div>
            </div>

            <form action="/edit/nonkandidat/{{ $Data->id }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-sm mb-1">Pelamar ID *</label>
                    <input type="text" name="" disabled value="{{ $Data->id }}"
                        class="w-full border rounded-md px-3 py-2">
                    <input type="hidden" name="role" value="{{ $Data->users->role }}">
                </div>

                <div>
                    <label class="block text-sm mb-1">Email *</label>
                    <input type="email" name="email" value="{{ $Data->users->email }}"
                        class="w-full border rounded-md px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm mb-1">Username *</label>
                    <input type="text" name="username" value="{{ $Data->users->username }}"
                        class="w-full border rounded-md px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm mb-1">Nama Lengkap *</label>
                    <input type="text" name="nama_pelamar" value="{{ $Data->nama_pelamar }}"
                        class="w-full border rounded-md px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm mb-1">Kata Sandi *</label>
                    <input type="password" name="password" placeholder="Kosongkan jika tidak ingin ubah"
                        class="w-full border rounded-md px-3 py-2">
                </div>

                <div class="flex justify-center items-center gap-10">
                    <label class="block text-sm mb-1">Gender *</label>
                    <div class="flex gap-4">
                        <label class="flex items-center gap-2">
                            <input type="radio" name="gender" value="laki-laki" class="accent-orange-500"
                                @checked($Data->gender === 'laki-laki')>
                            <span>Laki-Laki</span>
                        </label>

                        <label class="flex items-center gap-2">
                            <input type="radio" name="gender" value="perempuan" class="accent-orange-500"
                                @checked($Data->gender === 'perempuan')>
                            <span>Perempuan</span>
                        </label>
                    </div>
                </div>


                <div>
                    <label class="block text-sm mb-1">Alamat *</label>
                    <input type="text" name="detail" value="{{ $Data->alamat_pelamars()->latest()->first()->detail }}"
                        class="w-full border rounded-md px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm mb-1">No. Telepon *</label>
                    <input type="text" name="telepon_pelamar" value="{{ $Data->telepon_pelamar }}"
                        class="w-full border rounded-md px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm mb-1">Pendidikan</label>
                    <div class="space-y-2">
                        @foreach ($Data->riwayat_pendidikan as $p)
                            <div class="bg-gray-100 p-3 rounded-md">{{ $p->asal_pendidikan }} ({{ $p->tahun_awal }} –
                                {{ $p->tahun_akhir }})
                            </div>
                        @endforeach
                    </div>
                </div>

                <div>
                    <label class="block text-sm mb-1">Organisasi</label>
                    @foreach ($Data->organisasi as $o)
                        <div class="bg-gray-100 p-3 rounded-md">{{ $o->jabatan }} – {{ $o->nama_organisasi }}
                            ({{ $o->tahun_awal }} – {{ $o->tahun_akhir }})</div>
                    @endforeach
                </div>

                <div>
                    <label class="block text-sm mb-1">Pengalaman Kerja</label>
                    @foreach ($Data->pengalaman_kerja as $pe)
                        <div class="bg-gray-100 p-3 rounded-md">
                            {{ $pe->posisi_kerja }} – {{ $pe->nama_perusahaan }} ({{ $pe->tahun_awal }} –
                            {{ $pe->tahun_akhir }}) <br>
                            {{ $pe->deskripsi }}
                    @endforeach
                </div>

                <div>
                    <label class="block text-sm mb-1">Skill</label>
                    <div class="space-y-2">
                        @foreach ($Data->skill as $s)
                            <div class="bg-gray-100 p-3 rounded-md">{{ $s->skill }}</div>
                        @endforeach
                    </div>
                </div>

                <div class="flex justify-center gap-4 pt-4">
                    <button type="submit" class="px-6 py-2 bg-orange-500 text-white rounded-md">Simpan</button>
                    <button type="reset" class="px-6 py-2 border border-gray-300 rounded-md">Reset</button>
                </div>
            </form>
        </div>
    @endsection
