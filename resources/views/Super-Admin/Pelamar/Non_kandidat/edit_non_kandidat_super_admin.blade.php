@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="p-8">
        <form id="kandidatForm" action="/edit/nonkandidat/{{ $Data->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-300 rounded-lg">
                    <div class="flex items-center gap-2 mb-2">
                        <i class="ph ph-warning-octagon text-red-500 text-2xl"></i>
                        <h3 class="font-semibold text-red-700 text-lg">Terdapat kesalahan:</h3>
                    </div>
                    <ul class="list-disc list-inside text-sm text-red-600 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Profile Image Section -->
            <div
                class="flex flex-col sm:flex-row items-center sm:items-start gap-6 mb-8 p-6 bg-gray-50 rounded-lg border border-gray-200">
                <div class="relative">
                    <img id="previewImage"
                        src="{{ $Data->img_profile
                            ? asset('storage/' . $Data->img_profile)
                            : 'https://static.vecteezy.com/system/resources/thumbnails/005/544/718/small_2x/profile-icon-design-free-vector.jpg' }}"
                        class="w-32 h-32 rounded-full object-cover border-4 border-gray-200">
                </div>

                <div class="flex flex-col sm:flex-row gap-4 mt-4 sm:mt-0">
                    <label
                        class="flex items-center gap-2 px-6 py-3 bg-orange-500 text-white font-semibold rounded-lg shadow-md hover:bg-orange-600 cursor-pointer transition duration-300">
                        <i class="ph ph-upload-simple text-xl"></i>
                        <span class="text-sm">Upload Foto</span>
                        <input type="file" name="img_profile" id="foto" class="hidden" accept="image/*">
                    </label>
                    <button type="button" onclick="removeImage()"
                        class="flex items-center gap-2 px-6 py-3 border border-orange-500 text-orange-600 font-semibold rounded-lg shadow-md hover:bg-orange-50 hover:border-orange-600 transition duration-300">
                        <i class="ph ph-trash text-xl"></i>
                        <span class="text-sm">Hapus Foto</span>
                    </button>
                </div>
            </div>

            <!-- Account Information Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="md:col-span-2">
                    <h2 class="text-xl font-semibold text-gray-700 mb-4 border-b border-gray-200 pb-2">Informasi Akun
                    </h2>
                </div>
                <div>
                    <label for="pelamar_id" class="block text-sm font-medium text-gray-700 mb-1">Pelamar ID</label>
                    <input type="text" disabled value="{{ $Data->id }}"
                        class="w-full border-gray-300 rounded-md shadow-sm px-4 py-2 bg-gray-100 focus:ring-orange-500 focus:border-orange-500">
                    <input type="hidden" name="role" value="{{ $Data->users->role }}">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email <span
                            class="text-red-500">*</span></label>
                    <input type="email" name="email" id="email"
                        class="w-full border-gray-300 rounded-md shadow-sm px-4 py-2 @error('email') border-red-500 @enderror focus:ring-orange-500 focus:border-orange-500"
                        value="{{ old('email', $Data->users->email) }}" placeholder="Masukan Email">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="username" id="username"
                        class="w-full border-gray-300 rounded-md shadow-sm px-4 py-2 @error('username') border-red-500 @enderror focus:ring-orange-500 focus:border-orange-500"
                        value="{{ old('username', $Data->users->username) }}" placeholder="Masukan Username">
                    @error('username')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Kata Sandi</label>
                    <input type="password" name="password" id="password"
                        class="w-full border-gray-300 rounded-md shadow-sm px-4 py-2 @error('password') border-red-500 @enderror focus:ring-orange-500 focus:border-orange-500"
                        placeholder="Kosongkan jika tidak ingin ubah">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Personal Information Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="md:col-span-2">
                    <h2 class="text-xl font-semibold text-gray-700 mb-4 border-b border-gray-200 pb-2">Informasi Pribadi
                    </h2>
                </div>
                <div>
                    <label for="nama_pelamar" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="nama_pelamar" id="nama_pelamar"
                        class="w-full border-gray-300 rounded-md shadow-sm px-4 py-2 @error('nama_pelamar') border-red-500 @enderror focus:ring-orange-500 focus:border-orange-500"
                        value="{{ old('nama_pelamar', $Data->nama_pelamar) }}" placeholder="Masukan Nama Lengkap">
                    @error('nama_pelamar')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin <span
                            class="text-red-500">*</span></label>
                    <div class="flex gap-6 mt-2">
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="radio" name="gender" value="laki-laki"
                                class="form-radio h-4 w-4 text-orange-600 focus:ring-orange-500"
                                {{ old('gender', $Data->gender) == 'laki-laki' ? 'checked' : '' }}>
                            <span class="ml-2 text-gray-700">Laki-Laki</span>
                        </label>
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="radio" name="gender" value="perempuan"
                                class="form-radio h-4 w-4 text-orange-600 focus:ring-orange-500"
                                {{ old('gender', $Data->gender) == 'perempuan' ? 'checked' : '' }}>
                            <span class="ml-2 text-gray-700">Perempuan</span>
                        </label>
                    </div>
                    @error('gender')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="telepon_pelamar" class="block text-sm font-medium text-gray-700 mb-1">No Telepon <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="telepon_pelamar" id="telepon_pelamar"
                        class="w-full border-gray-300 rounded-md shadow-sm px-4 py-2 @error('telepon_pelamar') border-red-500 @enderror focus:ring-orange-500 focus:border-orange-500"
                        value="{{ old('telepon_pelamar', $Data->telepon_pelamar) }}" placeholder="Masukan No.telp">
                    @error('telepon_pelamar')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Alamat Section -->
            <div class="grid grid-cols-1 gap-6 mb-8">
                <div>
                    <h2 class="text-xl font-semibold text-gray-700 mb-4 border-b border-gray-200 pb-2">Alamat</h2>
                </div>
                @if ($Data->alamat_pelamars && $Data->alamat_pelamars->count() > 0)
                    <div>
                        <div class="flex gap-2 w-full">
                            <div class="bg-gray-50 rounded-lg w-full border border-gray-200">
                                @foreach ($Data->alamat_pelamars as $alamat)
                                    <div class="p-4 {{ !$loop->last ? 'border-b border-gray-200' : '' }}">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                @if ($alamat->label)
                                                    <span
                                                        class="inline-block px-2 py-1 bg-orange-100 text-orange-600 text-xs font-semibold rounded mb-2">{{ $alamat->label }}</span>
                                                @endif
                                                <p class="text-sm text-gray-700">
                                                    {{ $alamat->detail ?? '' }}
                                                    {{ $alamat->desa ? ', ' . $alamat->desa : '' }}
                                                    {{ $alamat->kecamatan ? ', ' . $alamat->kecamatan : '' }}
                                                    {{ $alamat->kota ? ', ' . $alamat->kota : '' }}
                                                    {{ $alamat->provinsi ? ', ' . $alamat->provinsi : '' }}
                                                    {{ $alamat->kode_pos ? ' ' . $alamat->kode_pos : '' }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                <div>
                    <button data-modal-target="add_alamat-modal" data-modal-toggle="add_alamat-modal" type="button"
                        class="flex items-center justify-between border border-orange-500 rounded-md w-full px-4 py-3 text-orange-500 font-semibold hover:bg-orange-50 transition duration-300">
                        <span>Tambahkan Alamat</span>
                        <span class="text-2xl font-bold">+</span>
                    </button>
                </div>
            </div>

            <!-- Organisasi Section -->
            <div class="grid grid-cols-1 gap-6 mb-8">
                <div>
                    <h2 class="text-xl font-semibold text-gray-700 mb-4 border-b border-gray-200 pb-2">Data Tambahan</h2>
                </div>
                @if ($Data->organisasi->count() > 0)
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Organisasi</label>
                        <div class="flex gap-2 w-full">
                            <div class="bg-gray-50 rounded-lg w-full border border-gray-200">
                                @foreach ($Data->organisasi as $or)
                                    <div class="p-3 {{ !$loop->last ? 'border-b border-gray-200' : '' }}">
                                        {{ $or->jabatan }} - {{ $or->nama_organisasi }}
                                        ({{ $or->tahun_awal }} – {{ $or->tahun_akhir }})
                                        <p class="font-normal text-gray-400">{{ $or->deskripsi }}</p>
                                    </div>
                                @endforeach
                            </div>
                            <div>
                                <button data-modal-target="detail_organisasi-modal" type="button"
                                    data-modal-toggle="detail_organisasi-modal"
                                    class="ph-fill ph-pencil-simple text-orange-500"></button>
                            </div>
                        </div>
                    </div>
                @else
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Organisasi</label>
                        <button data-modal-target="add_organisasi-modal" data-modal-toggle="add_organisasi-modal"
                            type="button"
                            class="flex items-center justify-between border border-orange-500 rounded-md w-full px-4 py-3 text-orange-500 font-semibold hover:bg-orange-50 transition duration-300">
                            <span>Tambahkan Organisasi</span>
                            <span class="text-2xl font-bold">+</span>
                        </button>
                    </div>
                @endif

                @if ($Data->riwayat_pendidikan->count() > 0)
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Riwayat Pendidikan</label>
                        <div class="flex gap-2 w-full">
                            <div class="bg-gray-50 rounded-lg w-full border border-gray-200">
                                @foreach ($Data->riwayat_pendidikan as $r)
                                    <div class="p-3 {{ !$loop->last ? 'border-b border-gray-200' : '' }}">
                                        {{ $r->pendidikan }} - {{ $r->asal_pendidikan }}
                                        ({{ $r->tahun_awal }} – {{ $r->tahun_akhir }})
                                    </div>
                                @endforeach
                            </div>
                            <div>
                                <button data-modal-target="detail_riwayat_pendidikan" type="button"
                                    data-modal-toggle="detail_riwayat_pendidikan"
                                    class="ph-fill ph-pencil-simple text-orange-500"></button>
                            </div>
                        </div>
                    </div>
                @else
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Riwayat Pendidikan</label>
                        <button type="button" data-modal-target="add_riwayat_pendidikan"
                            data-modal-toggle="add_riwayat_pendidikan"
                            class="flex items-center justify-between border border-orange-500 rounded-md w-full px-4 py-3 text-orange-500 font-semibold hover:bg-orange-50 transition duration-300">
                            <span>Tambahkan Riwayat Pendidikan</span>
                            <span class="text-2xl font-bold">+</span>
                        </button>
                    </div>
                @endif

                @if ($Data->pengalaman_kerja->count() > 0)
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Pengalaman Kerja</label>
                        <div class="flex gap-2 w-full">
                            <div class="bg-gray-50 rounded-lg w-full border border-gray-200">
                                @foreach ($Data->pengalaman_kerja as $kerja)
                                    <div class="p-3 {{ !$loop->last ? 'border-b border-gray-200' : '' }}">
                                        {{ $kerja->posisi_kerja }} - {{ $kerja->nama_perusahaan }}
                                        ({{ $kerja->tahun_awal }} – {{ $kerja->tahun_akhir }})
                                        <p class="font-normal text-gray-400">{{ $kerja->deskripsi }}</p>
                                    </div>
                                @endforeach
                            </div>
                            <div>
                                <button data-modal-target="detail_pengalaman_kerja" type="button"
                                    data-modal-toggle="detail_pengalaman_kerja"
                                    class="ph-fill ph-pencil-simple text-orange-500"></button>
                            </div>
                        </div>
                    </div>
                @else
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Pengalaman Kerja</label>
                        <button type="button" data-modal-target="add_pengalaman-modal"
                            data-modal-toggle="add_pengalaman-modal"
                            class="flex items-center justify-between border border-orange-500 rounded-md w-full px-4 py-3 text-orange-500 font-semibold hover:bg-orange-50 transition duration-300">
                            <span>Tambahkan Pengalaman Kerja</span>
                            <span class="text-2xl font-bold">+</span>
                        </button>
                    </div>
                @endif

                @if ($Data->skill->count() > 0)
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Skill</label>
                        <div class="flex gap-2 w-full">
                            <div class="bg-gray-50 rounded-lg w-full border border-gray-200">
                                @foreach ($Data->skill as $s)
                                    <div class="p-3 {{ !$loop->last ? 'border-b border-gray-200' : '' }}">
                                        {{ $s->skill }}
                                        <p class="font-normal text-gray-400">{{ $s->experience_level }}</p>
                                    </div>
                                @endforeach
                            </div>
                            <div>
                                <button data-modal-target="detail_skill" type="button" data-modal-toggle="detail_skill"
                                    class="ph-fill ph-pencil-simple text-orange-500"></button>
                            </div>
                        </div>
                    </div>
                @else
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Skill <span
                                class="text-red-500">*</span></label>
                        <button data-modal-target="add_skill" type="button" data-modal-toggle="add_skill"
                            class="flex items-center justify-between border border-orange-500 rounded-md w-full px-4 py-3 text-orange-500 font-semibold hover:bg-orange-50 transition duration-300">
                            <span>Tambahkan Skill</span>
                            <span class="text-2xl font-bold">+</span>
                        </button>
                    </div>
                @endif
            </div>

            <div class="flex justify-end gap-4">
                <button type="reset"
                    class="px-6 py-2 border border-gray-300 text-gray-600 rounded-md hover:bg-gray-50 transition duration-300">Reset</button>
                <button type="submit"
                    class="bg-orange-400 px-6 text-white rounded-md py-2 cursor-pointer hover:bg-orange-500 transition duration-300">Simpan</button>
            </div>
        </form>
    </div>

    {{-- Modal Tambah Alamat --}}
    <div id="add_alamat-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Tambah Alamat
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="add_alamat-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="p-4 md:p-5">
                    <form class="space-y-4" action="/dashboard/superadmin/pelamar/create/alamat" method="POST">
                        @csrf
                        <input type="hidden" name="pelamar_id" value="{{ $Data->id ?? '' }}">
                        <div>
                            <label for="label"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Label
                                Alamat</label>
                            <input type="text" name="label" id="label"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Contoh: Rumah, Kos, Kantor" />
                        </div>
                        <div>
                            <label for="alamat_provinsi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi <span class="text-red-500">*</span></label>
                            <select id="alamat_provinsi" name="provinsi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                <option value="" selected disabled>Pilih Provinsi</option>
                                @foreach ($Provinsi as $p)
                                    <option value="{{ $p->name }}" data-id="{{ $p->id }}">{{ $p->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="alamat_kota"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota /
                                Kabupaten <span class="text-red-500">*</span></label>
                            <select id="alamat_kota" name="kota"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                <option value="" selected disabled>Pilih Kota / Kabupaten</option>
                            </select>
                        </div>
                        <div>
                            <label for="alamat_kecamatan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan <span class="text-red-500">*</span></label>
                            <select id="alamat_kecamatan" name="kecamatan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                <option value="" selected disabled>Pilih Kecamatan</option>
                            </select>
                        </div>
                        <div>
                            <label for="desa"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Desa /
                                Kelurahan</label>
                            <input type="text" name="desa" id="desa"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Desa / Kelurahan" />
                        </div>
                        <div>
                            <label for="kode_pos"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Pos</label>
                            <input type="text" name="kode_pos" id="kode_pos"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Kode Pos" />
                        </div>
                        <div>
                            <label for="detail"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Detail
                                Alamat</label>
                            <textarea name="detail" id="detail"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Detail alamat lengkap"></textarea>
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-orange-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Organisasi --}}
    <div id="detail_organisasi-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Organisasi
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="detail_organisasi-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="p-4 w-full md:p-5">
                    <div class="flex justify-between w-full">
                        <div class="space-y-2 w-full">
                            @foreach ($Data->organisasi as $or)
                                <div class="flex bg-gray-100 rounded-lg justify-between px-2">
                                    <div class="p-3">{{ $or->jabatan }} -
                                        {{ $or->nama_organisasi }} ({{ $or->tahun_awal }} – {{ $or->tahun_akhir }})
                                        <p class="font-normal text-gray-400">{{ $or->deskripsi }}</p>
                                    </div>
                                    <div>
                                        <a href="/edit/superadmin/kandidat/organisasi/{{ $or->id }}">
                                            <button class="ph ph-pencil-simple text-2xl text-orange-500"></button>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <button data-modal-target="add_organisasi-modal" data-modal-toggle="add_organisasi-modal"
                        data-modal-hide="detail_organisasi-modal" type="button"
                        class="w-full text-white border mt-5 border-orange-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        <div class="flex justify-between items-center text-orange-500">
                            <span>Tambahkan Organisasi</span>
                            <span class="text-2xl font-bold">+</span>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="add_organisasi-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Tambah Organisasi
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="add_organisasi-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="p-4 md:p-5">
                    <form class="space-y-4" action="/dashboard/superadmin/pelamar/create/organisasi" method="POST">
                        @csrf
                        <input type="hidden" name="pelamar_id" value="{{ $Data->id ?? '' }}">
                        <div>
                            <label for="nama_organisasi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Organisasi</label>
                            <input type="text" name="nama_organisasi" id="nama_organisasi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Nama Organisasi" required />
                        </div>
                        <div>
                            <label for="jabatan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan</label>
                            <input type="text" name="jabatan" id="jabatan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Jabatan" required />
                        </div>
                        <div>
                            <label for="tahun_awal"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun Awal</label>
                            <input type="text" name="tahun_awal" id="tahun_awal"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Tahun Awal" required />
                        </div>
                        <div>
                            <label for="tahun_akhir"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun
                                Akhir</label>
                            <input type="text" name="tahun_akhir" id="tahun_akhir"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Tahun Akhir" required />
                        </div>
                        <div>
                            <label for="deskripsi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Deskripsi" required></textarea>
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-orange-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- Pendidikan --}}

    <div id="detail_riwayat_pendidikan" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Riwayat Pendidikan
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="detail_riwayat_pendidikan">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="p-4 w-full md:p-5">
                    <div class="flex justify-between w-full">
                        <div class="space-y-2 w-full">
                            @foreach ($Data->riwayat_pendidikan as $r)
                                <div class="flex bg-gray-100 rounded-lg justify-between px-2">
                                    <div class="p-3">{{ $r->pendidikan }} -
                                        {{ $r->asal_pendidikan }} ({{ $r->tahun_awal }} – {{ $r->tahun_akhir }})
                                    </div>
                                    <div>
                                        <a href="/edit/superadmin/kandidat/pendidikan/{{ $r->id }}">
                                            <button class="ph ph-pencil-simple text-2xl text-orange-500"></button>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <button data-modal-target="add_riwayat_pendidikan" data-modal-toggle="add_riwayat_pendidikan"
                        data-modal-hide="detail_riwayat_pendidikan" type="button"
                        class="w-full text-white border mt-5 border-orange-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        <div class="flex justify-between items-center text-orange-500">
                            <span>Tambahkan Pendidikan</span>
                            <span class="text-2xl font-bold">+</span>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="add_riwayat_pendidikan" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Tambah Riwayat Pendidikan
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="add_riwayat_pendidikan">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="p-4 md:p-5">
                    <form class="space-y-4" action="/dashboard/superadmin/pelamar/create/pendidikan" method="POST">
                        @csrf
                        <input type="hidden" name="pelamar_id" value="{{ $Data->id ?? '' }}">
                        <div>
                            <label for="pendidikan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pendidikan</label>
                            <input type="text" name="pendidikan" id="pendidikan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Pendidikan" required />
                        </div>
                        <div>
                            <label for="jurusan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jurusan</label>
                            <input type="text" name="jurusan" id="jurusan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Jurusan" required />
                        </div>
                        <div>
                            <label for="asal_pendidikan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Asal
                                Pendidikan</label>
                            <input type="text" name="asal_pendidikan" id="asal_pendidikan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Asal Pendidikan" required />
                        </div>
                        <div>
                            <label for="tahun_awal"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun Awal</label>
                            <input type="text" name="tahun_awal" id="tahun_awal"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Tahun Awal" required />
                        </div>
                        <div>
                            <label for="tahun_akhir"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun
                                Akhir</label>
                            <input type="text" name="tahun_akhir" id="tahun_akhir"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Tahun Akhir" required />
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-orange-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- pengalaman Kerja --}}

    <div id="detail_pengalaman_kerja" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Pengalaman Kerja
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="detail_pengalaman_kerja">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="p-4 w-full md:p-5">
                    <div class="flex justify-between w-full">
                        <div class="space-y-2 w-full">
                            @foreach ($Data->pengalaman_kerja as $kerja)
                                <div class="flex bg-gray-100 rounded-lg justify-between px-2">
                                    <div class="bg-gray-100 p-3 rounded-md">{{ $kerja->posisi_kerja }} -
                                        {{ $kerja->nama_perusahaan }} ({{ $kerja->tahun_awal }} –
                                        {{ $kerja->tahun_akhir }})

                                        <p class="font-normal text-gray-400">{{ $kerja->deskripsi }}</p>
                                    </div>
                                    <div>
                                        <a href="/edit/superadmin/kandidat/pengalaman/{{ $kerja->id }}">
                                            <button class="ph ph-pencil-simple text-2xl text-orange-500"></button>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <button data-modal-target="add_pengalaman-modal" data-modal-toggle="add_pengalaman-modal"
                        data-modal-hide="detail_pengalaman_kerja" type="button"
                        class="w-full text-white border mt-5 border-orange-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        <div class="flex justify-between items-center text-orange-500">
                            <span>Tambahkan Pengalaman Kerja</span>
                            <span class="text-2xl font-bold">+</span>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="add_pengalaman-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Tambah Pengalaman Kerja
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="add_pengalaman-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="p-4 md:p-5">
                    <form class="space-y-4" action="/dashboard/superadmin/pelamar/create/pengalaman" method="POST">
                        @csrf
                        <input type="hidden" name="pelamar_id" value="{{ $Data->id ?? '' }}">
                        <div>
                            <label for="posisi_kerja"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Posisi
                                Kerja</label>
                            <input type="text" name="posisi_kerja" id="posisi_kerja"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Posisi Kerja" required />
                        </div>
                        <div>
                            <label for="jabatan_kerja"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan
                                Kerja</label>
                            <input type="text" name="jabatan_kerja" id="jabatan_kerja"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Jabatan Kerja" required />
                        </div>
                        <div>
                            <label for="nama_perusahaan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Perusahaan</label>
                            <input type="text" name="nama_perusahaan" id="nama_perusahaan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Nama Perusahaan" required />
                        </div>
                        <div>
                            <label for="tahun_awal"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun Awal</label>
                            <input type="text" name="tahun_awal" id="tahun_awal"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Tahun Awal" required />
                        </div>
                        <div>
                            <label for="tahun_akhir"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun
                                Akhir</label>
                            <input type="text" name="tahun_akhir" id="tahun_akhir"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Tahun Akhir" required />
                        </div>
                        <div>
                            <label for="deskripsi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Deskripsi" required></textarea>
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-orange-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Skill --}}
    <div id="detail_skill" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Skills
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="detail_skill">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="p-4 w-full md:p-5">
                    <div class="flex justify-between w-full">
                        <div class="space-y-2 w-full">
                            @foreach ($Data->skill as $s)
                                <div class="flex bg-gray-100 rounded-lg justify-between px-2">
                                    <div class="bg-gray-100 p-3 rounded-md">{{ $s->skill }}
                                        <p class="font-normal text-gray-400">{{ $s->experience_level }}</p>
                                    </div>
                                    <div>
                                        <a href="/edit/superadmin/kandidat/skill/{{ $s->id }}">
                                            <button class="ph ph-pencil-simple text-2xl text-orange-500"></button>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <button data-modal-target="add_skill" data-modal-toggle="add_skill"
                        data-modal-hide="detail_skill" type="button"
                        class="w-full text-white border mt-5 border-orange-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        <div class="flex justify-between items-center text-orange-500">
                            <span>Tambahkan Skill</span>
                            <span class="text-2xl font-bold">+</span>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="add_skill" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Skill
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="add_skill">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="p-4 md:p-5">
                    <form class="space-y-4" action="/dashboard/superadmin/pelamar/create/skill" method="POST">
                        @csrf
                        <input type="hidden" name="pelamar_id" value="{{ $Data->id ?? '' }}">
                        <div>
                            <label for="skill"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Skill</label>
                            <input type="text" name="skill" id="skill"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Skill" required />
                        </div>
                        <div>
                            <label for="experience_level"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Experience
                                Level</label>
                            <input type="text" name="experience_level" id="experience_level"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Experience Level" required />
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-orange-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const fileInput = document.getElementById('foto');
        const previewImage = document.getElementById('previewImage');
        const defaultImageUrl =
            'https://static.vecteezy.com/system/resources/thumbnails/005/544/718/small_2x/profile-icon-design-free-vector.jpg';

        fileInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                previewImage.src = URL.createObjectURL(file);
            }
        });

        function removeImage() {
            fileInput.value = '';
            previewImage.src = defaultImageUrl;
        }

        // Cascading dropdown untuk Alamat
        const kabupatenData = @json($Kabupaten);
        const kecamatanData = @json($Daerah);

        const provinsiSelect = document.getElementById('alamat_provinsi');
        const kotaSelect = document.getElementById('alamat_kota');
        const kecamatanSelect = document.getElementById('alamat_kecamatan');

        provinsiSelect.addEventListener('change', function() {
            const provinsiId = this.selectedOptions[0].getAttribute('data-id');

            // Reset kota dan kecamatan
            kotaSelect.innerHTML = '<option value="" selected disabled>Pilih Kota / Kabupaten</option>';
            kecamatanSelect.innerHTML = '<option value="" selected disabled>Pilih Kecamatan</option>';

            const filteredKota = kabupatenData.filter(k => k.provinsi_id == provinsiId);

            filteredKota.forEach(k => {
                const option = document.createElement('option');
                option.value = k.name;
                option.setAttribute('data-id', k.id);
                option.textContent = k.name;
                kotaSelect.appendChild(option);
            });
        });

        kotaSelect.addEventListener('change', function() {
            const kotaId = this.selectedOptions[0].getAttribute('data-id');

            // Reset kecamatan
            kecamatanSelect.innerHTML = '<option value="" selected disabled>Pilih Kecamatan</option>';

            const filteredKecamatan = kecamatanData.filter(kec => kec.kabupaten_id == kotaId);

            filteredKecamatan.forEach(kec => {
                const option = document.createElement('option');
                option.value = kec.name;
                option.textContent = kec.name;
                kecamatanSelect.appendChild(option);
            });
        });
    </script>
@endsection
