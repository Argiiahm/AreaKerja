@extends('layouts.index')

@section('content')
    <section class="pt-40 mx-10">

        <form id="hapus-profile" action="/hapus/profile/{{ Auth::user()->pelamars->id }}" class="hidden" method="POST">
            @csrf
            @method('PUT')
        </form>

        <form action="/lengkapi/profile/{{ Auth::user()->pelamars->id }}" method="POST" class="space-y-4"
            enctype="multipart/form-data">
            <h1 class="font-semibold">Profile Akun</h1>
            <div class="mt-10 border-2 border-orange-500 p-6 sm:p-10 rounded-lg">
                <div class="flex flex-col lg:flex-row lg:items-center gap-6 lg:gap-10">
                    <div class="flex flex-col items-center">
                        <div class="modal" id="imgModal">
                            <img id="modalImg" alt="Zoomed" class="w-40 h-40 sm:w-40 object-cover rounded-full">
                        </div>

                        @if (Auth::user()->pelamars->img_profile)
                            <img id="previewImage" class="w-40 h-40 sm:w-40 object-cover rounded-full mb-3 profile-img"
                                src="{{ asset('storage/' . Auth::user()->pelamars->img_profile) }}" alt=""
                                alt="Profile">
                        @else
                            <img id="previewImage" class="w-40 h-40 sm:w-40 object-cover rounded-full mb-3"
                                src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                                alt="">
                        @endif
                        <div>
                            <select
                                class="border-2 border-orange-500 w-32 sm:w-40 p-2 rounded-md text-orange-500 font-semibold">
                                <option value="">Pelamar Aktif</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex flex-col lg:flex-row items-center w-full justify-between gap-6">
                        <div class="flex flex-col sm:flex-row gap-4 items-center w-full sm:w-auto">
                            <label
                                class="flex items-center gap-2 border-2 border-orange-500 px-6 py-2 rounded-lg w-full sm:w-auto justify-center cursor-pointer">
                                <i class="ph ph-upload-simple text-2xl text-orange-500"></i>
                                <span class="text-orange-500">Upload</span>
                                <input value="" type="file" id="fileInput"
                                    name="img_profile" accept="image/*" class="hidden">
                            </label>

                            <button form="hapus-profile" type="submit"
                                class="flex items-center gap-2 border px-6 py-2 rounded-lg w-full sm:w-auto justify-center">
                                <i class="ph ph-trash text-2xl"></i>
                                <span>Remove</span>
                            </button>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
                            <button type="submit" class="bg-orange-500 px-6 py-2 rounded-lg text-center w-full sm:w-auto">
                                <span class="text-white font-semibold">Simpan</span>
                            </button>

                            <div class="bg-green-500 px-6 py-2 rounded-lg text-center w-full sm:w-auto">
                                <span class="text-white font-semibold">Unduh CV</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mx-auto p-6">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div class="bg-white p-6 space-y-5">
                        <h2 class="text-lg font-bold text-gray-800 border-b-2 border-orange-500 pb-2 mb-4">Data Diri</h2>
                        @if (Auth::user()->pelamars->nama_pelamar)
                            <div>
                                <label class="block text-sm font-semibold text-gray-700">Nama Lengkap <span
                                        class="text-red-500">*</span></label>
                                <input type="text" value="{{ Auth::user()->pelamars->nama_pelamar }}" name="nama_pelamar"
                                    class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-orange-400 focus:outline-none">
                            </div>
                        @else
                            <div>
                                <label class="block text-sm font-semibold text-gray-700">Nama Lengkap <span
                                        class="text-red-500">*</span></label>
                                <input type="text" name="nama_pelamar"
                                    class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                                    placeholder="Nama Lengkap">
                            </div>
                        @endif

                        @if (Auth::user()->pelamars && Auth::user()->pelamars->gender)
                            <div>
                                <label class="block text-sm font-semibold text-gray-700">
                                    Gender <span class="text-red-500">*</span>
                                </label>
                                <div class="flex space-x-6 mt-1">
                                    <label class="flex items-center space-x-2 cursor-pointer">
                                        <input type="radio" name="gender" value="Laki-laki"
                                            class="w-4 h-4 text-orange-500 focus:ring-orange-500 border-gray-300"
                                            {{ Auth::user()->pelamars->gender === 'laki-laki' ? 'checked' : '' }}>
                                        <span>Laki - Laki</span>
                                    </label>

                                    <label class="flex items-center space-x-2 cursor-pointer">
                                        <input type="radio" name="gender" value="Perempuan"
                                            class="w-4 h-4 text-orange-500 focus:ring-orange-500 border-gray-300"
                                            {{ Auth::user()->pelamars->gender === 'perempuan' ? 'checked' : '' }}>
                                        <span>Perempuan</span>
                                    </label>
                                </div>
                            </div>
                        @else
                            <div>
                                <label class="block text-sm font-semibold text-gray-700">Gender <span
                                        class="text-red-500">*</span></label>
                                <div class="flex space-x-6 mt-1">
                                    <label class="flex items-center space-x-2 cursor-pointer">
                                        <input type="radio" name="gender" value="Laki-laki"
                                            class="w-4 h-4 border-2 border-gray-400 text-orange-500 focus:ring-orange-400 focus:outline-none rounded-full">
                                        <span>Laki - Laki</span>
                                    </label>

                                    <label class="flex items-center space-x-2 cursor-pointer">
                                        <input type="radio" name="gender" value="Perempuan"
                                            class="w-4 h-4 border-2 border-gray-400 text-orange-500 focus:ring-orange-400 focus:outline-none rounded-full">
                                        <span>Perempuan</span>
                                    </label>
                                </div>
                            </div>
                        @endif

                        @if (Auth::user()->pelamars->tanggal_lahir)
                            <div>
                                <label class="block text-sm font-semibold text-gray-700">Tanggal Lahir <span
                                        class="text-red-500">*</span></label>
                                <input type="date"
                                    class="w-full border border-gray-300 rounded-md p-2 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                                    value="{{ Auth::user()->pelamars->tanggal_lahir }}">
                            </div>
                        @else
                            <div>
                                <label class="block text-sm font-semibold text-gray-700">Tanggal Lahir <span
                                        class="text-red-500">*</span></label>
                                <input type="date" name="tanggal_lahir"
                                    class="w-full border border-gray-300 rounded-md p-2 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                                    value="">
                            </div>
                        @endif

                        @if (Auth::user()->pelamars->telepon_pelamar)
                            <div>
                                <label class="block text-sm font-semibold text-gray-700">No. Tlp <span
                                        class="text-red-500">*</span></label>
                                <input type="text"
                                    class="w-full border border-gray-300 rounded-md p-2 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                                    placeholder="No. Tlp" value="{{ Auth::user()->pelamars->telepon_pelamar }}">
                            </div>
                        @else
                            <div>
                                <label class="block text-sm font-semibold text-gray-700">No. Tlp <span
                                        class="text-red-500">*</span></label>
                                <input type="text" name="telepon_pelamar"
                                    class="w-full border border-gray-300 rounded-md p-2 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                                    placeholder="No. Tlp" value="">
                            </div>
                        @endif

                        @if (Auth::user()->pelamars->deskripsi_diri)
                            <div>
                                <label class="block text-sm font-semibold text-gray-700">Deskripsi Diri <span
                                        class="text-red-500">*</span></label>
                                <input
                                    class="w-full border border-gray-300 rounded-md p-2 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                                    placeholder="Deskripsikan diri anda secara singkat"
                                    value="{{ Auth::user()->pelamars->deskripsi_diri }}">
                            </div>
                        @else
                            <div>
                                <label class="block text-sm font-semibold text-gray-700">Deskripsi Diri <span
                                        class="text-red-500">*</span></label>
                                <textarea name="deskripsi_diri" rows="3"
                                    class="w-full border border-gray-300 rounded-md p-2 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                                    placeholder="Deskripsikan diri anda secara singkat"></textarea>
                            </div>
                        @endif

                        <div>
                            @if (Auth::user()->pelamars->alamat_pelamars->count() >= 1)
                                <a href="/alamat">
                                    <label class="block text-sm font-semibold text-gray-800 mb-1">Alamat <span
                                            class="text-red-500">*</span></label>
                                    <div class="w-full bg-orange-500 text-white border border-orange-500 rounded-md p-2">
                                        <span class="" href="">Alamat</span>
                                    </div>
                                </a>
                            @else
                                <a href="/data/alamat">
                                    <label class="block text-sm font-semibold text-gray-800 mb-1">Alamat <span
                                            class="text-red-500">*</span></label>
                                    <div class="w-full bg-orange-500 text-white border border-orange-500 rounded-md p-2">
                                        <span class="" href="">Alamat</span>
                                    </div>
                                </a>
                            @endif

                        </div>

                        @if (Auth::user()->pelamars->organisasi->count() > 0)
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-1">Organisasi</label>
                                <div class="flex gap-2 w-full">
                                    <div class="bg-gray-100 rounded-lg w-full">
                                        @foreach (Auth::user()->pelamars->organisasi as $or)
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
                                <button data-modal-target="add_organisasi-modal" data-modal-toggle="add_organisasi-modal"
                                    type="button"
                                    class="flex items-center justify-between border border-orange-500 rounded-md w-full px-4 py-3 text-orange-500 font-semibold">
                                    <span>Tambahkan Organisasi</span>
                                    <span class="text-2xl font-bold">+</span>
                                </button>
                            </div>
                        @endif

                        @if (Auth::user()->pelamars->pengalaman_kerja->count() > 0)
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-1">Pengalaman Kerja</label>
                                <div class="flex gap-2 w-full">
                                    <div class="bg-gray-100 rounded-lg w-full">
                                        @foreach (Auth::user()->pelamars->pengalaman_kerja as $kerja)
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
                        @if (Auth::user()->pelamars->skill->count() > 0)
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-1">Skill</label>
                                <div class="flex gap-2 w-full">
                                    <div class="bg-gray-100 rounded-lg w-full">
                                        @foreach (Auth::user()->pelamars->skill as $s)
                                            <div class="bg-gray-100 p-3 rounded-md">{{ $s->skill }}
                                                <p class="font-normal text-gray-400">{{ $s->experience_level }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div>
                                        <button data-modal-target="detail_skill" type="button"
                                            data-modal-toggle="detail_skill"
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


                        {{-- Sosial Media --}}
                        <div class="mt-6">
                            <h1 class="text-lg font-bold text-gray-800 mb-2">Sosial Media</h1>
                            <div class="border-t-2 border-orange-500 mb-4"></div>

                            <div class="mb-2">
                                <label class="block text-sm font-semibold text-gray-800 mb-1">Instagram</label>
                                <input type="text" name="instagram"
                                    class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                                    placeholder="Instagram"
                                    value="{{ Auth::user()->pelamars->sosmed()->latest()->first()->instagram ?? '' }}">
                            </div>

                            <div class="mb-2">
                                <label class="block text-sm font-semibold text-gray-800 mb-1">LinkedIn</label>
                                <input type="text" name="linkedin"
                                    class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                                    placeholder="LinkedIn"
                                    value="{{ Auth::user()->pelamars->sosmed()->latest()->first()->linkedin ?? '' }}">
                            </div>

                            <div class="mb-2">
                                <label class="block text-sm font-semibold text-gray-800 mb-1">Website</label>
                                <input type="text" name="website"
                                    class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                                    placeholder="Website"
                                    value="{{ Auth::user()->pelamars->sosmed()->latest()->first()->website ?? '' }}">
                            </div>

                            <div class="mb-2">
                                <label class="block text-sm font-semibold text-gray-800 mb-1">Twitter</label>
                                <input type="text" name="twitter"
                                    class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                                    placeholder="Twitter"
                                    value="{{ Auth::user()->pelamars->sosmed()->latest()->first()->twitter ?? '' }}">
                            </div>
                        </div>
                    </div>

                    {{-- Informasi Akun --}}
                    <div class="bg-white  p-6">
                        <h2 class="text-lg font-bold text-gray-800 border-b-2 border-orange-500 pb-2 mb-4">Informasi Akun
                        </h2>

                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700">ID Pengguna</label>
                                <input type="text" value="{{ Auth::user()->id }}" readonly
                                    class="w-full border border-gray-200 rounded-md p-2 bg-gray-100 text-gray-500">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700">Nama Pengguna <span
                                        class="text-red-500">*</span></label>
                                <input type="text"
                                    class="w-full border border-gray-300 rounded-md p-2 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                                    placeholder="Nama Pengguna" value="{{ Auth::user()->username }}" readonly>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700">Email <span
                                        class="text-red-500">*</span></label>
                                <input type="email"
                                    class="w-full border border-gray-300 rounded-md p-2 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                                    placeholder="Email" value="{{ Auth::user()->email }}" readonly>
                            </div>

                            <label class="block text-sm font-semibold text-gray-700">
                                Kata Sandi <span class="text-red-500">*</span>
                            </label>
                            <input type="password" id="password"
                                class="w-full border border-gray-300 rounded-md p-2 pr-10 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                                placeholder="Kata Sandi" value="{{ Auth::user()->password }}" readonly>
                            <div>
                               <div class="mt-6 border-b border-gray-300 pb-4">
                               <h1 class="text-lg font-bold text-gray-800 mb-2">Ekspetasi Gaji</h1>
                              <div class="border-t-2 border-orange-500 mb-4"></div>
                              <div class="flex items-center space-x-2">
                              <input type="number" name="gaji_minimal"
                                     class="w-1/2 border border-gray-300 rounded-md p-2 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                                     placeholder="Rp. -" value="{{ Auth::user()->pelamars->gaji_minimal ?? '' }}">
                                      <span>—</span>
                                    <input type="number" name="gaji_maksimal"
                                     class="w-1/2 border border-gray-300 rounded-md p-2 placeholder-gray-400 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                                       placeholder="Rp. -" value="{{ Auth::user()->pelamars->gaji_maksimal ?? '' }}">
                              </div>
                                </div>


                                <div class="text-sm text-orangea-500 mt-3 space-y-5">
                                    <p><i
                                            class="ph ph-check border w-fit p-2 bg-orange-500 text-white rounded-full mr-3"></i>Setelah
                                        menjadi kandidat Areakerja, CV anda akan otomatis terunggah ke etalase perusahaan
                                    </p>
                                    <p><i
                                            class="ph ph-check border w-fit p-2 bg-orange-500 text-white rounded-full mr-3"></i>Range
                                        gaji akan tampil pada profil anda di etalase perusahaan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </form>

    </section>
    <script>
        const profileImg = document.getElementById("previewImage");
        const imgModal = document.getElementById("imgModal");
        const modalImg = document.getElementById("modalImg");

        profileImg.onclick = () => {
            imgModal.style.display = "flex";
            modalImg.src = profileImg.src;
        };

        imgModal.onclick = () => {
            imgModal.style.display = "none";
        };

        document
            .getElementById("fileInput")
            .addEventListener("change", function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById("previewImage").src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
    </script>
@endsection
