@extends('layouts.index')

@section('content')
    <section class="pt-26 pb-20 bg-gray-50/50">
        <form id="hapus-profile" action="/hapus/profile/{{ Auth::user()->pelamars->id }}" class="hidden" method="POST">
            @csrf
            @method('PUT')
        </form>

        {{-- Form Utama --}}
        <form action="/lengkapi/profile/{{ Auth::user()->pelamars->id }}" method="POST" class="space-y-8"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div
                class="mt-6 bg-white border border-gray-100 p-8 sm:p-12 rounded-3xl mx-4 sm:mx-10 transition-all">
                <div class="flex flex-col lg:flex-row lg:items-center gap-8 lg:gap-14">

                    <div class="flex flex-col items-center group">
                        <div class="relative">
                            <div
                                class="w-44 h-44 rounded-full p-1  transition-all duration-500 overflow-hidden  bg-gray-50">
                                @if (Auth::user()->pelamars->img_profile)
                                    <img id="previewImage"
                                        class="w-full h-full object-cover rounded-full profile-img  cursor-pointer"
                                        src="{{ asset('storage/' . Auth::user()->pelamars->img_profile) }}" alt="Profile">
                                @else
                                    <img id="previewImage"
                                        class="w-full h-full object-cover rounded-full  cursor-pointer"
                                        src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=f97316&color=fff&size=256"
                                        alt="Avatar">
                                @endif

                                <label for="fileInput"
                                    class="absolute inset-0 flex items-center justify-center bg-black/40 rounded-full opacity-0 group-hover:opacity-100 cursor-pointer transition-opacity duration-300">
                                    <i class="ph ph-camera text-3xl text-white"></i>
                                </label>
                            </div>
                        </div>

                        <div class="mt-6 relative w-full flex justify-center">
                            @php
                                $current = Auth::user()->pelamars->kategori;
                                if ($current === null || $current === 'pelamar') {
                                    $kategoris = ['pelamar'];
                                } elseif ($current === 'calon kandidat') {
                                    $kategoris = ['calon kandidat'];
                                } elseif ($current === 'kandidat aktif') {
                                    $kategoris = ['kandidat aktif', 'kandidat nonaktif'];
                                } elseif ($current === 'kandidat nonaktif') {
                                    $kategoris = ['kandidat nonaktif'];
                                }

                                $alias = [
                                    'pelamar' => 'Pelamar',
                                    'calon kandidat' => 'Calon Kandidat',
                                    'kandidat aktif' => 'Pekerja Aktif',
                                    'kandidat nonaktif' => 'Bekerja',
                                ];
                            @endphp

                            <div class="relative w-full max-w-[180px]">
                                <select id="kategoriSelect"
                                    class="appearance-none w-full bg-orange-50 border border-orange-200 text-orange-700 py-2 px-4 pr-8 rounded-full text-sm font-bold focus:outline-none focus:ring-2 focus:ring-orange-500 transition-all cursor-pointer text-center">
                                    @foreach ($kategoris as $k)
                                        <option value="{{ $k }}" {{ $current === $k ? 'selected' : '' }}>
                                            {{ $alias[$k] }}
                                        </option>
                                    @endforeach
                                </select>
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-orange-500">
                                    <i class="ph ph-caret-down-bold text-xs"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col w-full">
                        <div class="mb-6 text-center lg:text-left">
                            <h2 class="text-2xl font-bold text-gray-800">Foto Profile</h2>
                            <p class="text-gray-500 text-sm">Gunakan foto formal untuk meningkatkan kredibilitas CV Anda.
                            </p>
                        </div>

                        <div
                            class="flex flex-col lg:flex-row items-center w-full justify-between gap-6 bg-gray-50/50 p-6 rounded-2xl border border-dashed border-gray-200">
                            <div class="flex flex-col sm:flex-row gap-3 items-center w-full sm:w-auto">
                                <label
                                    class="flex items-center gap-2 bg-orange-500 hover:bg-orange-600 px-6 py-2.5 rounded-xl w-full sm:w-auto justify-center cursor-pointer transition-all shadow-lg shadow-orange-200 group">
                                    <i class="ph ph-upload-simple text-xl text-white group-hover:bounce"></i>
                                    <span class="text-white font-medium">Ganti Foto</span>
                                    <input type="file" id="fileInput" name="img_profile" accept="image/*" class="hidden">
                                </label>

                                <button form="hapus-profile" type="submit"
                                    class="flex items-center gap-2 bg-white border border-red-200 hover:border-red-500 hover:text-red-500 px-6 py-2.5 rounded-xl w-full sm:w-auto justify-center transition-all text-gray-600">
                                    <i class="ph ph-trash text-xl"></i>
                                    <span class="font-medium">Hapus</span>
                                </button>
                            </div>

                            <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                                <button type="submit"
                                    class="bg-white border-2 border-orange-500 px-8 py-2.5 rounded-xl text-center w-full sm:w-auto hover:bg-orange-50 transition-all group">
                                    <span class="text-orange-600 font-bold group-hover:tracking-wider transition-all">Simpan
                                        Perubahan</span>
                                </button>

                                <a href="/cv/{{ Auth::user()->pelamars->id }}/unduh"
                                    class="flex items-center justify-center gap-2 bg-emerald-500 hover:bg-emerald-600 px-8 py-2.5 rounded-xl text-center w-full sm:w-auto shadow-lg shadow-emerald-100 transition-all transform hover:-translate-y-1">
                                    <i class="ph ph-file-pdf text-white text-xl"></i>
                                    <span class="text-white font-bold">Unduh CV</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mx-auto px-4 sm:px-10">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                    {{-- Kolom Kiri: Data Diri --}}
                    <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm space-y-6">
                        <h2 class="text-xl font-bold text-gray-800 border-b-2 border-orange-500 pb-2 mb-4">Data Diri</h2>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap <span
                                    class="text-red-500">*</span></label>
                            <input type="text" value="{{ Auth::user()->pelamars->nama_pelamar ?? '' }}"
                                name="nama_pelamar"
                                class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-orange-400 focus:outline-none transition-all"
                                placeholder="Nama Lengkap">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Gender <span
                                    class="text-red-500">*</span></label>
                            <div class="flex space-x-6 mt-2">
                                <label class="flex items-center space-x-2 cursor-pointer group">
                                    <input type="radio" name="gender" value="Laki-laki"
                                        class="w-5 h-5 text-orange-500 focus:ring-orange-500 border-gray-300"
                                        {{ optional(Auth::user()->pelamars)->gender === 'Laki-laki' || optional(Auth::user()->pelamars)->gender === 'laki-laki' ? 'checked' : '' }}>
                                    <span
                                        class="text-gray-600 group-hover:text-orange-500 transition-colors">Laki-laki</span>
                                </label>
                                <label class="flex items-center space-x-2 cursor-pointer group">
                                    <input type="radio" name="gender" value="Perempuan"
                                        class="w-5 h-5 text-orange-500 focus:ring-orange-500 border-gray-300"
                                        {{ optional(Auth::user()->pelamars)->gender === 'Perempuan' || optional(Auth::user()->pelamars)->gender === 'perempuan' ? 'checked' : '' }}>
                                    <span
                                        class="text-gray-600 group-hover:text-orange-500 transition-colors">Perempuan</span>
                                </label>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Tanggal Lahir <span
                                    class="text-red-500">*</span></label>
                            <input type="date" name="tanggal_lahir"
                                value="{{ Auth::user()->pelamars->tanggal_lahir ?? '' }}"
                                class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-orange-400 focus:outline-none transition-all">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">No. Tlp <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="telepon_pelamar"
                                value="{{ Auth::user()->pelamars->telepon_pelamar ?? '' }}"
                                class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-orange-400 focus:outline-none transition-all"
                                placeholder="Contoh: 08123456789">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi Diri <span
                                    class="text-red-500">*</span></label>
                            <textarea name="deskripsi_diri" rows="4"
                                class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-orange-400 focus:outline-none transition-all"
                                placeholder="Deskripsikan diri anda secara singkat">{{ Auth::user()->pelamars->deskripsi_diri ?? '' }}</textarea>
                        </div>

                        {{-- Alamat --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 mb-2">Alamat <span
                                    class="text-red-500">*</span></label>
                            <a href="{{ Auth::user()->pelamars->alamat_pelamars->count() >= 1 ? '/alamat' : '/data/alamat' }}"
                                class="flex items-center justify-between w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 px-6 rounded-xl transition-all  shadow-orange-100">
                                <span>Kelola Alamat</span>
                                <i class="ph ph-map-pin text-xl"></i>
                            </a>
                        </div>

                        {{-- Dinamis: Organisasi, Pendidikan, Kerja, Skill --}}
                        @php
                            $sections = [
                                [
                                    'label' => 'Organisasi',
                                    'data' => Auth::user()->pelamars->organisasi,
                                    'modal' => 'organisasi',
                                    'add_modal' => 'add_organisasi-modal',
                                    'detail_modal' => 'detail_organisasi-modal',
                                ],
                                [
                                    'label' => 'Riwayat Pendidikan',
                                    'data' => Auth::user()->pelamars->riwayat_pendidikan,
                                    'modal' => 'riwayat_pendidikan',
                                    'add_modal' => 'add_riwayat_pendidikan',
                                    'detail_modal' => 'detail_riwayat_pendidikan',
                                ],
                                [
                                    'label' => 'Pengalaman Kerja',
                                    'data' => Auth::user()->pelamars->pengalaman_kerja,
                                    'modal' => 'pengalaman_kerja',
                                    'add_modal' => 'add_pengalaman-modal',
                                    'detail_modal' => 'detail_pengalaman_kerja',
                                ],
                                [
                                    'label' => 'Skill',
                                    'data' => Auth::user()->pelamars->skill,
                                    'modal' => 'skill',
                                    'add_modal' => 'add_skill',
                                    'detail_modal' => 'detail_skill',
                                ],
                            ];
                        @endphp

                        @foreach ($sections as $sec)
                            <div class="pt-2">
                                <label class="block text-sm font-semibold text-gray-800 mb-2">{{ $sec['label'] }}</label>
                                @if ($sec['data']->count() > 0)
                                    <div class="flex gap-3">
                                        <div class="bg-gray-50 border border-gray-100 rounded-2xl p-4 w-full space-y-3">
                                            @foreach ($sec['data'] as $item)
                                                <div
                                                    class="text-sm text-gray-700 border-b border-gray-200 pb-2 last:border-0 last:pb-0">
                                                    <span class="font-bold text-orange-600">
                                                        {{ $item->jabatan ?? ($item->pendidikan ?? ($item->posisi_kerja ?? $item->skill)) }}
                                                    </span>
                                                    @if (isset($item->nama_organisasi) || isset($item->asal_pendidikan) || isset($item->nama_perusahaan))
                                                        at
                                                        {{ $item->nama_organisasi ?? ($item->asal_pendidikan ?? $item->nama_perusahaan) }}
                                                    @endif
                                                    <p class="text-xs text-gray-400 mt-1">
                                                        {{ $item->experience_level ?? $item->tahun_awal . ' - ' . $item->tahun_akhir }}
                                                    </p>
                                                </div>
                                            @endforeach
                                        </div>
                                        <button data-modal-target="{{ $sec['detail_modal'] }}"
                                            data-modal-toggle="{{ $sec['detail_modal'] }}" type="button"
                                            class="flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-full bg-orange-50 text-orange-500 hover:bg-orange-500 hover:text-white transition-all">
                                            <i class="ph-fill ph-pencil-simple"></i>
                                        </button>
                                    </div>
                                @else
                                    <button data-modal-target="{{ $sec['add_modal'] }}"
                                        data-modal-toggle="{{ $sec['add_modal'] }}" type="button"
                                        class="flex items-center justify-between border-2 border-dashed border-orange-200 hover:border-orange-500 rounded-xl w-full px-5 py-3 text-orange-500 font-semibold transition-all group">
                                        <span>Tambah {{ $sec['label'] }}</span>
                                        <i
                                            class="ph ph-plus-circle text-2xl group-hover:rotate-90 transition-transform"></i>
                                    </button>
                                @endif
                            </div>
                        @endforeach

                        {{-- Sosmed --}}
                        <div class="pt-6 border-t border-gray-100">
                            <h2 class="text-xl font-bold text-gray-800 mb-4">Sosial Media</h2>
                            <div class="space-y-4">
                                @foreach (['instagram', 'linkedin', 'website', 'twitter'] as $social)
                                    <div>
                                        <label
                                            class="block text-xs font-bold text-gray-400 uppercase mb-1">{{ $social }}</label>
                                        <div class="relative">
                                            <input type="text" name="{{ $social }}"
                                                value="{{ Auth::user()->pelamars->sosmed()->latest()->first()->$social ?? '' }}"
                                                class="w-full border border-gray-300 rounded-xl p-3 pl-10 focus:ring-2 focus:ring-orange-400 focus:outline-none transition-all text-sm"
                                                placeholder="URL {{ ucfirst($social) }}">
                                            {{-- <i class="ph ph-{{ $social === 'website' ? 'globe' : $social }} absolute left-3 top-3.5 text-gray-400 text-lg"></i> --}}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- Kolom Kanan: Informasi Akun --}}
                    <div class="space-y-8">
                        <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm space-y-6">
                            <h2 class="text-xl font-bold text-gray-800 border-b-2 border-orange-500 pb-2 mb-4">Informasi
                                Akun</h2>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">ID Pengguna</label>
                                <input type="text" value="{{ Auth::user()->id }}" readonly
                                    class="w-full border border-gray-100 rounded-xl p-3 bg-gray-50 text-gray-400 cursor-not-allowed">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Pengguna <span
                                        class="text-red-500">*</span></label>
                                <input type="text" value="{{ Auth::user()->username }}" readonly
                                    class="w-full border border-gray-100 rounded-xl p-3 bg-gray-50 text-gray-400 cursor-not-allowed">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Email <span
                                        class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="email" value="{{ Auth::user()->email }}" readonly
                                        class="w-full border border-gray-100 rounded-xl p-3 bg-gray-50 text-gray-400 cursor-not-allowed">
                                    <i class="ph ph-lock absolute right-4 top-3.5 text-gray-300"></i>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Kata Sandi <span
                                        class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="password" value="********" readonly
                                        class="w-full border border-gray-100 rounded-xl p-3 bg-gray-50 text-gray-400 cursor-not-allowed">
                                    <i class="ph ph-eye-closed absolute right-4 top-3.5 text-gray-300"></i>
                                </div>
                            </div>

                            {{-- Gaji --}}
                            <div class="pt-6 border-t border-gray-100">
                                <h2 class="text-xl font-bold text-gray-800 mb-4">Ekspektasi Gaji</h2>
                                <div class="flex items-center gap-4">
                                    <div class="w-1/2">
                                        <input type="number" name="gaji_minimal"
                                            value="{{ Auth::user()->pelamars->gaji_minimal ?? '' }}"
                                            class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                                            placeholder="Minimal">
                                    </div>
                                    <span class="text-gray-400">—</span>
                                    <div class="w-1/2">
                                        <input type="number" name="gaji_maksimal"
                                            value="{{ Auth::user()->pelamars->gaji_maksimal ?? '' }}"
                                            class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                                            placeholder="Maksimal">
                                    </div>
                                </div>

                                <div class="mt-6 space-y-4">
                                    <div
                                        class="flex items-start gap-4 p-4 bg-orange-50 rounded-2xl border border-orange-100">
                                        <i class="ph ph-check-circle-fill text-orange-500 text-2xl mt-0.5"></i>
                                        <p class="text-sm text-orange-800 leading-relaxed">Setelah menjadi kandidat
                                            Areakerja, CV anda akan otomatis terunggah ke etalase perusahaan.</p>
                                    </div>
                                    <div
                                        class="flex items-start gap-4 p-4 bg-orange-50 rounded-2xl border border-orange-100">
                                        <i class="ph ph-check-circle-fill text-orange-500 text-2xl mt-0.5"></i>
                                        <p class="text-sm text-orange-800 leading-relaxed">Range gaji akan tampil pada
                                            profil anda di etalase perusahaan.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>

    <div id="imgModal"
        class="hidden fixed inset-0 bg-black/65/90 z-[100] flex items-center justify-center p-4 cursor-pointer">
        <img id="modalImg" alt="Zoomed"
            class="max-w-full max-h-full rounded-lg shadow-2xl transition-transform duration-300">
    </div>

    <div id="modalKategori"
        class="hidden fixed inset-0 bg-black/65/60 flex items-center justify-center z-[110] backdrop-blur-sm p-4">
        <div class="bg-white rounded-3xl p-8 max-w-sm w-full text-center shadow-2xl transform transition-all scale-100">
            <div class="w-20 h-20 bg-red-50 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="ph ph-warning-octagon text-5xl text-red-500"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-2">Peringatan Status</h3>
            <p class="text-gray-500 mb-6">Akun Anda akan menjadi <strong>Non-Aktif</strong> jika sudah dinyatakan bekerja.
                Yakin ingin merubah status?</p>

            <div class="flex gap-3 justify-center">
                <form action="/update-kategori/{{ Auth::user()->pelamars->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="kategori" value="kandidat nonaktif">
                    <button type="submit"
                        class="bg-emerald-500 hover:bg-emerald-600 text-white px-8 py-2.5 rounded-xl font-bold transition-all">Ya,
                        Yakin</button>
                </form>
                <button id="btnKategoriNo"
                    class="bg-gray-100 hover:bg-gray-200 text-gray-600 px-8 py-2.5 rounded-xl font-bold transition-all">Batal</button>
            </div>
        </div>
    </div>

    @if (session('sucess_modal_kategori'))
        <div id="NotifmodalKategori"
            class="fixed inset-0 bg-black/65/60 flex items-center justify-center z-[120] backdrop-blur-sm p-4">
            <div class="bg-white rounded-3xl p-8 max-w-sm w-full text-center shadow-2xl">
                <div class="w-20 h-20 bg-emerald-50 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="ph ph-check-circle text-5xl text-emerald-500"></i>
                </div>
                <p class="text-lg font-bold text-gray-800 mb-6">Akun Anda Sudah Dinyatakan tidak Aktif</p>
                <button id="closeYakategori" type="button"
                    class="w-full bg-emerald-500 hover:bg-emerald-600 text-white py-3 rounded-xl font-bold transition-all shadow-lg shadow-emerald-100">Oke,
                    Mengerti</button>
            </div>
        </div>
    @endif

    <script>
        // Logic Preview Foto & Modal Zoom
        const profileImg = document.getElementById("previewImage");
        const imgModal = document.getElementById("imgModal");
        const modalImg = document.getElementById("modalImg");

        profileImg.onclick = () => {
            imgModal.classList.remove('hidden');
            modalImg.src = profileImg.src;
        };

        imgModal.onclick = () => {
            imgModal.classList.add('hidden');
        };

        // Preview File Upload (Langsung berubah saat pilih file)
        document.getElementById("fileInput").addEventListener("change", function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    profileImg.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        // Modal Status Kategori
        const selectKategori = document.getElementById('kategoriSelect');
        const modalKategori = document.getElementById('modalKategori');
        const btnNo = document.getElementById('btnKategoriNo');
        let lastValue = selectKategori.value;

        selectKategori.addEventListener('change', function() {
            modalKategori.classList.remove('hidden');
        });

        btnNo.addEventListener('click', function() {
            modalKategori.classList.add('hidden');
            selectKategori.value = lastValue;
        });

        // Close Notif Modal
        const NotifmodalKategori = document.getElementById('NotifmodalKategori');
        const closeYakategori = document.getElementById('closeYakategori');

        if (closeYakategori) {
            closeYakategori.addEventListener('click', () => {
                NotifmodalKategori.classList.add('hidden');
            });
        }
    </script>
@endsection
