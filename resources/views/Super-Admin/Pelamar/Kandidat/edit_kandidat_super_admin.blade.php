    @extends('Super-Admin.layouts.index')

    @section('super_admin-content')
        <div class="mx-auto bg-white shadow-md rounded-xl p-6">

            <div class="flex items-center gap-2 mb-5">
                @if ($Data->img_profile)
                    <img id="previewImage" src="{{ asset('storage/' . $Data->img_profile) }}"
                        class="w-24 h-24 rounded-full object-cover mb-2">
                @else
                    <img id="previewImage"
                        src="https://static.vecteezy.com/system/resources/thumbnails/005/544/718/small_2x/profile-icon-design-free-vector.jpg"
                        class="w-24 h-24 rounded-full object-cover mb-2">
                @endif
                <div class="flex gap-2">
                    <label
                        class="flex items-center gap-2 border-2 bg-orange-500 px-6 py-2 rounded-lg w-full sm:w-auto justify-center cursor-pointer">
                        <i class="ph ph-upload-simple text-2xl text-white"></i>
                        <span class="text-white">Upload</span>
                        <input type="file" name="img_profile" id="foto" class="hidden" accept="image/*"
                            form="kandidatForm">
                    </label>
                    <button type="button" onclick="removeImage()"
                        class="flex items-center gap-2 border border-orange-500 px-6 py-2 rounded-lg w-full sm:w-auto justify-center">
                        <i class="ph ph-trash text-2xl text-orange-500"></i>
                        <span class="text-orange-500">Remove</span>
                    </button>
                </div>
            </div>

        </div>

        <form id="kandidatForm" action="/edit/kandidat/{{ $Data->id }}" method="POST" class="space-y-4" enctype="multipart/form-data">
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
                <div class="bg-gray-100 p-3 rounded-md">
                    {{ $Data->alamat_pelamars()->latest()->first()->detail ?? 'Data Belum Di Isi' }}</div>
            </div>

            <div>
                <label class="block text-sm mb-1">No. Telepon *</label>
                <input type="text" name="telepon_pelamar" value="{{ $Data->telepon_pelamar ?? '' }}"
                    class="w-full border rounded-md px-3 py-2">
            </div>

            @if ($Data->organisasi->count() > 0)
                <div>
                    <label class="block text-sm font-semibold text-gray-800 mb-1">Organisasi</label>
                    <div class="flex gap-2 w-full">
                        <div class="bg-gray-100 rounded-lg w-full">
                            @foreach ($Data->organisasi as $or)
                                <div class="bg-gray-100 p-3 rounded-md">{{ $or->jabatan }} -
                                    {{ $or->nama_organisasi }} ({{ $or->tahun_awal }} –
                                    {{ $or->tahun_akhir }})

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
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-800 mb-1">Organisasi</label>
                    <button data-modal-target="add_organisasi-modal" data-modal-toggle="add_organisasi-modal" type="button"
                        class="flex items-center justify-between border border-orange-500 rounded-md w-full px-4 py-3 text-orange-500 font-semibold">
                        <span>Tambahkan Organisasi</span>
                        <span class="text-2xl font-bold">+</span>
                    </button>
                </div>
            @endif

            @if ($Data->riwayat_pendidikan->count() > 0)
                <div>
                    <label class="block text-sm font-semibold text-gray-800 mb-1">Riwayat
                        Pendidikan</label>
                    <div class="flex gap-2 w-full">
                        <div class="bg-gray-100 rounded-lg w-full">
                            @foreach ($Data->riwayat_pendidikan as $r)
                                <div class="bg-gray-100 p-3 rounded-md">{{ $r->pendidikan }} -
                                    {{ $r->asal_pendidikan }} ({{ $r->tahun_awal }} –
                                    {{ $r->tahun_akhir }})
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
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-800 mb-1">Riwayat
                        Pendidikan</label>
                    <button type="button" data-modal-target="add_riwayat_pendidikan"
                        data-modal-toggle="add_riwayat_pendidikan"
                        class="flex items-center justify-between border border-orange-500 rounded-md w-full px-4 py-3 text-orange-500 font-semibold">
                        <span>Tambahkan Riwayat Pendidikan</span>
                        <span class="text-2xl font-bold">+</span>
                    </button>
                </div>
            @endif

            @if ($Data->pengalaman_kerja->count() > 0)
                <div>
                    <label class="block text-sm font-semibold text-gray-800 mb-1">Pengalaman Kerja</label>
                    <div class="flex gap-2 w-full">
                        <div class="bg-gray-100 rounded-lg w-full">
                            @foreach ($Data->pengalaman_kerja as $kerja)
                                <div class="bg-gray-100 p-3 rounded-md">{{ $kerja->posisi_kerja }} -
                                    {{ $kerja->nama_perusahaan }} ({{ $kerja->tahun_awal }} –
                                    {{ $kerja->tahun_akhir }})

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
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-800 mb-1">Pengalaman Kerja</label>
                    <button type="button" data-modal-target="add_pengalaman-modal"
                        data-modal-toggle="add_pengalaman-modal"
                        class="flex items-center justify-between border border-orange-500 rounded-md w-full px-4 py-3 text-orange-500 font-semibold">
                        <span>Tambahkan Pengalaman Kerja</span>
                        <span class="text-2xl font-bold">+</span>
                    </button>
                </div>
            @endif

            @if ($Data->skill->count() > 0)
                <div>
                    <label class="block text-sm font-semibold text-gray-800 mb-1">Skill</label>
                    <div class="flex gap-2 w-full">
                        <div class="bg-gray-100 rounded-lg w-full">
                            @foreach ($Data->skill as $s)
                                <div class="bg-gray-100 p-3 rounded-md">{{ $s->skill }}
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
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-800 mb-1">Skill <span
                            class="text-red-500">*</span></label>
                    <button data-modal-target="add_skill" type="button" data-modal-toggle="add_skill"
                        class="flex items-center justify-between border border-orange-500 rounded-md w-full px-4 py-3 text-orange-500 font-semibold">
                        <span>Tambahkan Skill</span>
                        <span class="text-2xl font-bold">+</span>
                    </button>
                </div>
            @endif
            <div class="flex justify-center gap-4 pt-4">
                <button type="submit" class="px-6 py-2 bg-orange-500 text-white rounded-md">Simpan</button>
                <button type="reset" class="px-6 py-2 border border-gray-300 rounded-md">Reset</button>
            </div>
        </form>
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
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="nama_organisasi" required />
                            </div>
                            <div>
                                <label for="jabatan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan</label>
                                <input type="text" name="jabatan" id="jabatan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="jabatan" required />
                            </div>
                            <div>
                                <label for="tahun_awal"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun Awal</label>
                                <input type="text" name="tahun_awal" id="tahun_awal"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="tahun_awal" required />
                            </div>
                            <div>
                                <label for="tahun_akhir"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun
                                    Akhir</label>
                                <input type="text" name="tahun_akhir" id="tahun_akhir"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="tahun_akhir" required />
                            </div>
                            <div>
                                <label for="deskripsi"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="deskripsi" required></textarea>
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
                            Organisasi
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
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="pendidikan" required />
                            </div>
                            <div>
                                <label for="jurusan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">jurusan</label>
                                <input type="text" name="jurusan" id="jurusan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="jurusan" required />
                            </div>
                            <div>
                                <label for="asal_pendidikan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Asal
                                    Pendidikan</label>
                                <input type="text" name="asal_pendidikan" id="asal_pendidikan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="asal_pendidikan" required />
                            </div>
                            <div>
                                <label for="tahun_awal"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun Awal</label>
                                <input type="text" name="tahun_awal" id="tahun_awal"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="tahun_awal" required />
                            </div>
                            <div>
                                <label for="tahun_akhir"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun
                                    Akhir</label>
                                <input type="text" name="tahun_akhir" id="tahun_akhir"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="tahun_akhir" required />
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
                            data-modal-hide="detail_perusahaan-modal">
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
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="posisi_kerja" required />
                            </div>
                            <div>
                                <label for="jabatan_kerja"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">jabatan_kerja
                                    Kerja</label>
                                <input type="text" name="jabatan_kerja" id="jabatan_kerja"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="jabatan_kerja" required />
                            </div>
                            <div>
                                <label for="nama_perusahaan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                    Perusahaan</label>
                                <input type="text" name="nama_perusahaan" id="nama_perusahaan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="nama_perusahaan" required />
                            </div>
                            <div>
                                <label for="tahun_awal"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun Awal</label>
                                <input type="text" name="tahun_awal" id="tahun_awal"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="tahun_awal" required />
                            </div>
                            <div>
                                <label for="tahun_akhir"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun
                                    Akhir</label>
                                <input type="text" name="tahun_akhir" id="tahun_akhir"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="tahun_akhir" required />
                            </div>
                            <div>
                                <label for="deskripsi"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="deskripsi" required></textarea>
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
                            Skils
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
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="skill" required />
                            </div>
                            <div>
                                <label for="experience_level"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Experience
                                    Level</label>
                                <input type="text" name="experience_level" id="experience_level"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="experience_level" required />
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

            fileInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    previewImage.src = URL.createObjectURL(file);
                }
            });

            function removeImage() {
                fileInput.value = '';
                previewImage.src =
                    'https://static.vecteezy.com/system/resources/thumbnails/005/544/718/small_2x/profile-icon-design-free-vector.jpg';
            }
        </script>
    @endsection
