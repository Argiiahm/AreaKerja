@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="mx-auto border rounded-xl p-6">
        @if ($pelamar)
            <button  onclick="window.location='/dashboard/superadmin/pelamar'" type="submit"
                class="px-6 py-2 mb-5 bg-orange-500 text-white rounded-md"><i class="ph ph-arrow-left"></i></button>
        @endif
        <div class="flex items-center gap-2 mb-5">
            <img id="previewImage"
                src="{{ $pelamar && $pelamar->img_profile 
                    ? asset('storage/' . $pelamar->img_profile)
                    : 'https://static.vecteezy.com/system/resources/thumbnails/005/544/718/small_2x/profile-icon-design-free-vector.jpg' }}"
                class="w-24 h-24 rounded-full object-cover mb-2">


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

        <form id="kandidatForm" action="/dashboard/superadmin/pelamar/create/kandidat" method="POST" class="space-y-4"
            enctype="multipart/form-data">
            @csrf

            <div>
                <label class="block text-sm mb-1">Pelamar ID *</label>
                <input type="text" value="{{ $pelamar->id ?? '' }}" disabled class="w-full border rounded-md px-3 py-2">
                <input type="hidden" name="pelamar_id" value="{{ $pelamar->id ?? '' }}">
            </div>

            <div>
                <label class="block text-sm mb-1">Email *</label>
                <input type="email" name="email" class="w-full border rounded-md px-3 py-2"
                    value="{{ $pelamar->users->email ?? '' }}" @if (isset($pelamar)) disabled @endif>
            </div>

            <div>
                <label class="block text-sm mb-1">Username *</label>
                <input type="text" name="username" class="w-full border rounded-md px-3 py-2"
                    value="{{ $pelamar->users->username ?? '' }}" @if (isset($pelamar)) disabled @endif>
            </div>

            <div>
                <label class="block text-sm mb-1">Nama Lengkap *</label>
                <input type="text" name="nama_pelamar" class="w-full border rounded-md px-3 py-2"
                    value="{{ $pelamar->nama_pelamar ?? '' }}" @if (isset($pelamar)) disabled @endif>
            </div>

            <div>
                <label class="block text-sm mb-1">Kata Sandi *</label>
                <input type="password" name="password" class="w-full border rounded-md px-3 py-2"
                    value="{{ $pelamar->users->password ?? '' }}" @if (isset($pelamar)) disabled @endif>
            </div>

            <input type="hidden" name="role" value="pelamar">
            <input type="hidden" name="kategori" value="kandidat aktif">

            <div>
                <label class="block text-sm mb-1">Gender *</label>
                <div class="flex gap-4">
                    <label class="flex items-center gap-2">
                        <input type="radio" name="gender" value="laki-laki" class="accent-orange-500"
                            {{ isset($pelamar) && $pelamar->gender == 'laki-laki' ? 'checked' : '' }}
                            @if (isset($pelamar)) disabled @endif>
                        <span>Laki-Laki</span>
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="radio" name="gender" value="perempuan" class="accent-orange-500"
                            {{ isset($pelamar) && $pelamar->gender == 'perempuan' ? 'checked' : '' }}
                            @if (isset($pelamar)) disabled @endif>
                        <span>Perempuan</span>
                    </label>
                </div>
            </div>

            <div>
                <label class="block text-sm mb-1">No Telepon *</label>
                <input type="text" name="telepon_pelamar" class="w-full border rounded-md px-3 py-2"
                    value="{{ $pelamar->telepon_pelamar ?? '' }}" @if (isset($pelamar)) disabled @endif>
            </div>


            @php
                $alamat = App\Models\Alamatpelamar::where('pelamar_id', optional($pelamar)->id)->first();
                $pendidikan = App\Models\RiwayatPendidikan::where('pelamar_id', optional($pelamar)->id)->first();
                $organisasi = App\Models\Organisasi::where('pelamar_id', optional($pelamar)->id)->first();
                $pengalaman = App\Models\Pengalamankerja::where('pelamar_id', optional($pelamar)->id)->first();
                $skill = App\Models\Skill::where('pelamar_id', optional($pelamar)->id)->first();
            @endphp


            <div class="space-y-3">
                @if ($alamat)
                    <button type="button" disabled
                        class="w-full flex justify-between items-center bg-zinc-500 text-white px-4 py-2 rounded-md">
                        <span>Alamat Sudah Terisi</span>
                    </button>
                @else
                    <button type="button" onclick="cekUser('modalAlamat')"
                        class="w-full flex justify-between items-center bg-orange-500 text-white px-4 py-2 rounded-md">
                        <span>Tambah Alamat</span>
                        <span class="text-xl">+</span>
                    </button>
                @endif

                {{-- Pendidikan --}}
                @if ($pendidikan)
                    <button type="button" disabled
                        class="w-full flex justify-between items-center bg-zinc-500 text-white px-4 py-2 rounded-md">
                        <span>Pendidikan Sudah Terisi</span>
                    </button>
                @else
                    <button type="button" onclick="cekUser('modalPendidikan')"
                        class="w-full flex justify-between items-center bg-orange-500 text-white px-4 py-2 rounded-md">
                        <span>Tambah Pendidikan</span>
                        <span class="text-xl">+</span>
                    </button>
                @endif

                {{-- Organisasi --}}
                @if ($organisasi)
                    <button type="button" disabled
                        class="w-full flex justify-between items-center bg-zinc-500 text-white px-4 py-2 rounded-md">
                        <span>Organisasi Sudah Terisi</span>
                    </button>
                @else
                    <button type="button" onclick="cekUser('modalOrganisasi')"
                        class="w-full flex justify-between items-center bg-orange-500 text-white px-4 py-2 rounded-md">
                        <span>Tambah Organisasi</span>
                        <span class="text-xl">+</span>
                    </button>
                @endif

                {{-- Pengalaman --}}
                @if ($pengalaman)
                    <button type="button" disabled
                        class="w-full flex justify-between items-center bg-zinc-500 text-white px-4 py-2 rounded-md">
                        <span>Pengalaman Sudah Terisi</span>
                    </button>
                @else
                    <button type="button" onclick="cekUser('modalPengalaman')"
                        class="w-full flex justify-between items-center bg-orange-500 text-white px-4 py-2 rounded-md">
                        <span>Tambah Pengalaman Kerja</span>
                        <span class="text-xl">+</span>
                    </button>
                @endif

                {{-- Skill --}}
                @if ($skill)
                    <button type="button" disabled
                        class="w-full flex justify-between items-center bg-zinc-500 text-white px-4 py-2 rounded-md">
                        <span>Skill Sudah Terisi</span>
                    </button>
                @else
                    <button type="button" onclick="cekUser('modalSkill')"
                        class="w-full flex justify-between items-center bg-orange-500 text-white px-4 py-2 rounded-md">
                        <span>Tambah Skill</span>
                        <span class="text-xl">+</span>
                    </button>
                @endif
            </div>

            <div class="flex justify-center gap-4 pt-4">
                @if ($pelamar)
                    <button onclick="window.location='/dashboard/superadmin/pelamar'" type="submit"
                        class="px-6 py-2 bg-orange-500 text-white rounded-md">Simpan & Kembali</button>
                @else
                    <button type="submit" class="px-6 py-2 bg-orange-500 text-white rounded-md">Simpan</button>
                    <button type="reset" class="px-6 py-2 border border-gray-300 rounded-md">Batal</button>
                @endif
            </div>
        </form>
    </div>

    {{-- Modal Notifikasi --}}
    <div id="modalNotif" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
        <div class="bg-white p-6 rounded-lg w-full max-w-sm text-center">
            <h2 class="text-lg font-semibold mb-3 text-red-600">Data User Belum Disimpan</h2>
            <p class="mb-5 text-gray-600">Simpan data akun terlebih dahulu sebelum menambahkan detail lainnya.</p>
            <button onclick="closeModal('modalNotif')" class="px-4 py-2 bg-orange-500 text-white rounded-md">OK</button>
        </div>
    </div>

    {{-- Modal Alamat --}}
    <div id="modalAlamat" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
        <div class="bg-white p-6 rounded-lg w-full max-w-md">
            <h2 class="text-lg font-semibold mb-4">Tambah Alamat</h2>
            <form action="/dashboard/superadmin/pelamar/create/alamat" method="POST">
                @csrf
                <input type="hidden" name="pelamar_id" value="{{ $pelamar->id ?? '' }}">
                <div class="mb-2">
                    <label class="block text-sm">Label</label>
                    <input type="text" name="label" class="w-full border rounded-md px-3 py-2">
                </div>
                <div class="mb-2">
                    <label class="block text-sm">Desa</label>
                    <input type="text" name="desa" class="w-full border rounded-md px-3 py-2">
                </div>
                <div class="mb-2">
                    <label class="block text-sm">Kecamatan</label>
                    <input type="text" name="kecamatan" class="w-full border rounded-md px-3 py-2">
                </div>
                <div class="mb-2">
                    <label class="block text-sm">Kota</label>
                    <input type="text" name="kota" class="w-full border rounded-md px-3 py-2">
                </div>
                <div class="mb-2">
                    <label class="block text-sm">Provinsi</label>
                    <input type="text" name="provinsi" class="w-full border rounded-md px-3 py-2">
                </div>
                <div class="mb-2">
                    <label class="block text-sm">Kode Pos</label>
                    <input type="text" name="kode_pos" class="w-full border rounded-md px-3 py-2">
                </div>
                <div class="mb-2">
                    <label class="block text-sm">Detail Lainnya</label>
                    <textarea name="detail" class="w-full border rounded-md px-3 py-2"></textarea>
                </div>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" onclick="closeModal('modalAlamat')"
                        class="px-4 py-2 border rounded-md">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded-md">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    {{-- Modal Pendidikan --}}
    <div id="modalPendidikan" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
        <div class="bg-white p-6 rounded-lg w-full max-w-md">
            <h2 class="text-lg font-semibold mb-4">Tambah Pendidikan</h2>
            <form action="/dashboard/superadmin/pelamar/create/pendidikan" method="POST">
                @csrf
                <input type="hidden" name="pelamar_id" value="{{ $pelamar->id ?? '' }}">
                <div class="mb-2"> <label class="block text-sm">Pendidikan</label> <input type="text"
                        name="pendidikan" class="w-full border rounded-md px-3 py-2"> </div>
                <div class="mb-2"> <label class="block text-sm">Jurusan</label> <input type="text" name="jurusan"
                        class="w-full border rounded-md px-3 py-2"> </div>
                <div class="mb-2"> <label class="block text-sm">Asal Pendidikan</label> <input type="text"
                        name="asal_pendidikan" class="w-full border rounded-md px-3 py-2"> </div>
                <div class="mb-2"> <label class="block text-sm">Tahun Awal</label> <input type="text"
                        name="tahun_awal" class="w-full border rounded-md px-3 py-2"> </div>
                <div class="mb-2"> <label class="block text-sm">Tahun Akhir</label> <input type="text"
                        name="tahun_akhir" class="w-full border rounded-md px-3 py-2"> </div>
                <div class="flex justify-end gap-2 mt-4"> <button type="button" onclick="closeModal('modalPendidikan')"
                        class="px-4 py-2 border rounded-md">Batal</button> <button type="submit"
                        class="px-4 py-2 bg-orange-500 text-white rounded-md">Simpan</button> </div>
            </form>
        </div>
    </div>
    {{-- Modal Organisasi --}}
    <div id="modalOrganisasi" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
        <div class="bg-white p-6 rounded-lg w-full max-w-md">
            <h2 class="text-lg font-semibold mb-4">Tambah Organisasi</h2>
            <form action="/dashboard/superadmin/pelamar/create/organisasi" method="POST">
                @csrf
                <input type="hidden" name="pelamar_id" value="{{ $pelamar->id ?? '' }}">
                <div class="mb-2"> <label class="block text-sm">Nama Organisasi</label> <input name="nama_organisasi"
                        type="text" class="w-full border rounded-md px-3 py-2"> </div>
                <div class="mb-2"> <label class="block text-sm">Jabatan</label> <input name="jabatan" type="text"
                        class="w-full border rounded-md px-3 py-2"> </div>
                <div class="mb-2"> <label class="block text-sm">Tahun Awal</label> <input name="tahun_awal"
                        type="text" class="w-full border rounded-md px-3 py-2"> </div>
                <div class="mb-2"> <label class="block text-sm">Tahun Akhir</label> <input name="tahun_akhir"
                        type="text" class="w-full border rounded-md px-3 py-2"> </div>
                <div class="mb-2"> <label class="block text-sm">Deskripsi</label>
                    <textarea name="deskripsi" class="w-full border rounded-md px-3 py-2"></textarea>
                </div>
                <div class="flex justify-end gap-2 mt-4"> <button type="button" onclick="closeModal('modalOrganisasi')"
                        class="px-4 py-2 border rounded-md">Batal</button> <button type="submit"
                        class="px-4 py-2 bg-orange-500 text-white rounded-md">Simpan</button> </div>
            </form>
        </div>
    </div>
    {{-- Modal Pengalaman --}}
    <div id="modalPengalaman" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
        <div class="bg-white p-6 rounded-lg w-full max-w-md">
            <h2 class="text-lg font-semibold mb-4">Tambah Pengalaman Kerja</h2>
            <form action="/dashboard/superadmin/pelamar/create/pengalaman" method="POST">
                @csrf
                <input type="hidden" name="pelamar_id" value="{{ $pelamar->id ?? '' }}">
                <div class="mb-2"> <label class="block text-sm">Posisi Kerja</label> <input type="text"
                        name="posisi_kerja" class="w-full border rounded-md px-3 py-2"> </div>
                <div class="mb-2"> <label class="block text-sm">Jabatan Kerja</label> <input type="text"
                        name="jabatan_kerja" class="w-full border rounded-md px-3 py-2"> </div>
                <div class="mb-2"> <label class="block text-sm">Nama Perusahaan</label> <input type="text"
                        name="nama_perusahaan" class="w-full border rounded-md px-3 py-2"> </div>
                <div class="mb-2"> <label class="block text-sm">Tahun Awal</label> <input type="text"
                        name="tahun_awal" class="w-full border rounded-md px-3 py-2"> </div>
                <div class="mb-2"> <label class="block text-sm">Tahun Akhir</label> <input type="text"
                        name="tahun_akhir" class="w-full border rounded-md px-3 py-2"> </div>
                <div class="mb-2"> <label class="block text-sm">Deskripsi</label>
                    <textarea name="deskripsi" class="w-full border rounded-md px-3 py-2"></textarea>
                </div>
                <div class="flex justify-end gap-2 mt-4"> <button type="button" onclick="closeModal('modalPengalaman')"`
                        class="px-4 py-2 border rounded-md">Batal</button> <button type="submit"
                        class="px-4 py-2 bg-orange-500 text-white rounded-md">Simpan</button> </div>
            </form>
        </div>
    </div>
    {{-- Modal Skill --}}
    <div id="modalSkill" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
        <div class="bg-white p-6 rounded-lg w-full max-w-md">
            <h2 class="text-lg font-semibold mb-4">Tambah Skill</h2>
            <form action="/dashboard/superadmin/pelamar/create/skill" method="POST">
                @csrf
                <input type="hidden" name="pelamar_id" value="{{ $pelamar->id ?? '' }}">S
                <div class="mb-2">
                    <label class="block text-sm">Skill</label>
                    <input type="text" name="skill" class="w-full border rounded-md px-3 py-2">
                </div>
                <div class="mb-2">
                    <label class="block text-sm">Experience</label>
                    <input type="text" name="experience_level" class="w-full border rounded-md px-3 py-2">
                </div>
                <div class="flex justify-end gap-2 mt-4"> <button type="button" onclick="closeModal('modalSkill')"
                        class="px-4 py-2 border rounded-md">Batal</button> <button type="submit"
                        class="px-4 py-2 bg-orange-500 text-white rounded-md">Simpan</button> </div>
            </form>
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

        function cekUser(modalId) {
            let pelamarId = document.querySelector('input[name="pelamar_id"]').value;

            if (pelamarId) {
                openModal(modalId);
            } else {
                openModal('modalNotif');
            }
        }

        function openModal(id) {
            document.getElementById(id).classList.remove('hidden');
            document.getElementById(id).classList.add('flex');
        }

        function closeModal(id) {
            document.getElementById(id).classList.remove('flex');
            document.getElementById(id).classList.add('hidden');
        }
    </script>
@endsection
