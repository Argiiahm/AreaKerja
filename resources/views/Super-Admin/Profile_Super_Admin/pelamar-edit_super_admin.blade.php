@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="p-6 mt-8 px-5 lg:px-20 md:px-5 border-2">
        <h2 class="text-lg font-semibold mb-6">Edit Profile</h2>
        <form action="/dashboard/superadmin/profile/update" method="POST" class="space-y-5" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex items-center gap-4 mb-6">
                <div class="flex items-center gap-4">
                    <div class="modal" id="imgModal">
                        <img id="modalImg" alt="Zoomed" class="w-40 h-40 sm:w-40 object-cover rounded-full">
                    </div>
                    @if (Auth::user()->superadmins->img_profile)
                        <img id="previewImagesuperadmin" class="w-20 h-20 rounded-full object-cover border"
                            src="{{ asset('storage/' . Auth::user()->superadmins->img_profile) }}" alt=""
                            alt="Profile">
                    @else
                        <img id="previewImagesuperadmin" class="w-20 h-20 rounded-full object-cover border"
                            src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                            alt="" alt="Profile">
                    @endif
                    <div>
                        <h3 class="font-semibold text-lg">{{ Auth::user()->username }}</h3>
                        <p class="text-gray-500 text-sm">{{ Auth::user()->email }}</p>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label
                        class="flex items-center gap-1 bg-[#fa6601] hover:bg-gray-700 text-white px-4 py-2 rounded-md text-sm cursor-pointer">
                        <i class="ph ph-upload-simple text-2xl"></i>
                        <span class="text-white">Upload</span>
                        <input type="file" id="fileInputsp" name="img_profile" accept="image/*" class="hidden">
                    </label>

                    <button form="hapus-profile" type="submit"
                        class="flex items-center gap-1 border border-[#fa6601] text-[#fa6601] hover:bg-gray-100 px-4 py-2 rounded-md text-sm">
                        <i class="ph ph-trash text-2xl"></i>
                        <span>Remove</span>
                    </button>
                </div>
            </div>


            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Email</label>
                    <input type="email" name="email" value="{{ Auth::user()->email }}"
                        class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Username</label>
                    <input type="text" name="username" value="{{ Auth::user()->username }}"
                        class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" value="{{ Auth::user()->superadmins->nama_lengkap }}"
                    class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Provinsi</label>
                    <select id="provinsi" name="provinsi" class="w-full border rounded-md p-2">
                        <option value="" disabled {{ !Auth::user()->superadmins->provinsi ? 'selected' : '' }}>Pilih
                            Provinsi</option>
                        @foreach ($Provinsi as $p)
                            <option value="{{ $p->name }}" data-id="{{ $p->id }}"
                                {{ Auth::user()->superadmins->provinsi == $p->name ? 'selected' : '' }}>
                                {{ $p->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Kota/Kabupaten</label>
                    <select id="kota" name="kota" class="w-full border rounded-md p-2">
                        <option value="" disabled {{ !Auth::user()->superadmins->kota ? 'selected' : '' }}>Pilih Kota /
                            Kabupaten</option>
                        @foreach ($Kabupaten as $k)
                            @if (Auth::user()->superadmins->kota == $k->name)
                                <option value="{{ $k->name }}" data-id="{{ $k->id }}" selected>
                                    {{ $k->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Kecamatan</label>
                    <select id="kecamatan" name="kecamatan" class="w-full border rounded-md p-2">
                        <option value="" disabled {{ !Auth::user()->superadmins->kecamatan ? 'selected' : '' }}>Pilih
                            Kecamatan</option>
                        @foreach ($Daerah as $d)
                            @if (Auth::user()->superadmins->kecamatan == $d->name)
                                <option value="{{ $d->name }}" selected>{{ $d->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Desa</label>
                    @if (Auth::user()->superadmins->desa == null)
                        <input type="text" name="desa"
                            class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300"
                            placeholder="Data masih Kosong" value="">
                    @else
                        <input type="text" name="desa"
                            class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300"
                            value="{{ Auth::user()->superadmins->desa }}">
                    @endif

                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Kode Pos</label>
                    @if (Auth::user()->superadmins->kode_pos == null)
                        <input type="text" name="kode_pos" value="" placeholder="Data Kosong"
                            class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300">
                    @else
                        <input type="text" name="kode_pos" value="{{ Auth::user()->superadmins->kode_pos }}"
                            class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300">
                    @endif
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Detail Lainnya</label>
                @if (Auth::user()->superadmins->detail_alamat == null)
                    <input type="text" name="detail_alamat" value=""
                        placeholder="Contoh: Jl. Perintis Kemerdekaan No. 11B, Gg. Cendrawasih"
                        class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300">
                @else
                    <input type="text" name="detail_alamat" value="{{ Auth::user()->superadmins->detail_alamat }}"
                        class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300">
                @endif
            </div>

            <div class="flex justify-center gap-4 pt-4">
                <button type="submit" class="bg-[#fa6601] hover:bg-green-700 text-white px-8 py-2 rounded-md">
                    Simpan
                </button>
                <a href="/dashboard/superadmin/profile"
                    class="border border-[#fa6601] text-[#fa6601] px-8 py-2 rounded-md">
                    Batal
                </a>
            </div>
        </form>
    </div>

    <script>
        const kabupatenData = @json($Kabupaten);
        const kecamatanData = @json($Daerah);

        const provinsiSelect = document.getElementById('provinsi');
        const kotaSelect = document.getElementById('kota'); 
        const kecamatanSelect = document.getElementById('kecamatan');

        provinsiSelect.addEventListener('change', function() {
            const provinsiId = this.selectedOptions[0].getAttribute('data-id');
            kotaSelect.innerHTML = '<option value="" disabled selected>Pilih Kota / Kabupaten</option>';
            kecamatanSelect.innerHTML = '<option value="" disabled selected>Pilih Kecamatan</option>';

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
            kecamatanSelect.innerHTML = '<option value="" disabled selected>Pilih Kecamatan</option>';

            const filteredKecamatan = kecamatanData.filter(kec => kec.kabupaten_id == kotaId);
            filteredKecamatan.forEach(kec => {
                const option = document.createElement('option');
                option.value = kec.name;
                option.textContent = kec.name;
                kecamatanSelect.appendChild(option);
            });
        });


        const profileImg = document.getElementById("previewImagesuperadmin");
        const imgModalp = document.getElementById("imgModal");
        const modalImgp = document.getElementById("modalImg");

        profileImg.onclick = () => {
            imgModalp.style.display = "flex";
            modalImgp.src = profileImg.src;
        };

        imgModalp.onclick = () => {
            imgModalp.style.display = "none";
        };

        document
            .getElementById("fileInputsp")
            .addEventListener("change", function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById("previewImagesuperadmin").src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
    </script>
@endsection
