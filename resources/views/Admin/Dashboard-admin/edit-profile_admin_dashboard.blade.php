@extends('Admin.Dashboard-admin.layouts.index')

@section('admin-content')
    <div class="p-6 mt-8 px-5 lg:px-20 md:px-5 border-2">
        <h2 class="text-lg font-semibold mb-6">Edit Profile</h2>

        <form action="/dashboard/admin/profile/update/{{ Auth::user()->admin->id }}" method="POST" class="space-y-5" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- Foto Profil --}}
            <div class="flex items-center gap-4 mb-6">
                <div class="flex items-center gap-4">
                    <div class="modal" id="imgModal">
                        <img id="modalImg" alt="Zoomed" class="w-40 h-40 sm:w-40 object-cover rounded-full">
                    </div>
                    @if (Auth::user()->admin->img_profile)
                        <img id="previewImageadmin" class="w-20 h-20 rounded-full object-cover border profile-img"
                            src="{{ asset('storage/' . Auth::user()->admin->img_profile) }}" alt="">
                    @else
                        <img id="previewImageadmin" class="w-20 h-20 rounded-full object-cover border profile-img"
                            src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                            alt="">
                    @endif
                    <div>
                        <h3 class="font-semibold text-lg">{{ Auth::user()->username }}</h3>
                        <p class="text-gray-500 text-sm">{{ Auth::user()->email }}</p>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label
                        class="flex items-center gap-2 bg-gray-500  px-6 py-2 rounded-lg w-full sm:w-auto justify-center cursor-pointer">
                        <i class="ph ph-upload-simple text-2xl text-white"></i>
                        <span class="text-white">Upload</span>
                        <input value="" type="file" id="fileInput" name="img_profile" accept="image/*"
                            class="hidden">
                    </label>

                    <button form="hapus-profile" type="submit"
                        class="flex items-center gap-2 border px-6 py-2 rounded-lg w-full sm:w-auto justify-center">
                        <i class="ph ph-trash text-2xl"></i>
                        <span>Remove</span>
                    </button>
                </div>
            </div>

            {{-- Email & Username --}}
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

            {{-- Nama Lengkap --}}
            <div>
                <label class="block text-sm font-medium mb-1">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" value="{{ Auth::user()->admin->nama_lengkap }}"
                    class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300">
            </div>

            {{-- Alamat: Provinsi, Kota, Kecamatan --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Provinsi</label>
                    <select id="provinsi" name="provinsi" class="w-full border rounded-md p-2">
                        <option value="" disabled {{ !Auth::user()->admin->provinsi ? 'selected' : '' }}>Pilih Provinsi</option>
                        @foreach ($Provinsi as $p)
                            <option value="{{ $p->name }}" data-id="{{ $p->id }}"
                                {{ Auth::user()->admin->provinsi == $p->name ? 'selected' : '' }}>
                                {{ $p->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Kota/Kabupaten</label>
                    <select id="kota" name="kota" class="w-full border rounded-md p-2">
                        <option value="" disabled {{ !Auth::user()->admin->kota ? 'selected' : '' }}>Pilih Kota / Kabupaten</option>
                        @foreach ($Kabupaten as $k)
                            @if (Auth::user()->admin->kota == $k->name)
                                <option value="{{ $k->name }}" data-id="{{ $k->id }}" selected>{{ $k->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Kecamatan</label>
                    <select id="kecamatan" name="kecamatan" class="w-full border rounded-md p-2">
                        <option value="" disabled {{ !Auth::user()->admin->kecamatan ? 'selected' : '' }}>Pilih Kecamatan</option>
                        @foreach ($Daerah as $d)
                            @if (Auth::user()->admin->kecamatan == $d->name)
                                <option value="{{ $d->name }}" selected>{{ $d->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Desa & Kode Pos --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Desa</label>
                    <input type="text" name="desa" value="{{ Auth::user()->admin->desa }}"
                        class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Kode Pos</label>
                    <input type="text" name="kode_pos" value="{{ Auth::user()->admin->kode_pos }}"
                        class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300">
                </div>
            </div>

            {{-- Detail Alamat --}}
            <div>
                <label class="block text-sm font-medium mb-1">Detail Lainnya</label>
                <input type="text" name="detail_alamat" value="{{ Auth::user()->admin->detail__alamat }}"
                    class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-gray-300">
            </div>

            {{-- Tombol --}}
            <div class="flex justify-center gap-4 pt-4">
                <button type="button" class="bg-red-600 hover:bg-red-700 text-white px-8 py-2 rounded-md">
                    Batal
                </button>
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-8 py-2 rounded-md">
                    Simpan
                </button>
            </div>
        </form>
    </div>

    {{-- SCRIPT DROPDOWN --}}
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

        // PREVIEW IMAGE
        const profileImg = document.getElementById("previewImageadmin");
        const imgModal = document.getElementById("imgModal");
        const modalImg = document.getElementById("modalImg");

        profileImg.onclick = () => {
            imgModal.style.display = "flex";
            modalImg.src = profileImg.src;
        };

        imgModal.onclick = () => {
            imgModal.style.display = "none";
        };

        document.getElementById("fileInput").addEventListener("change", function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById("previewImageadmin").src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
