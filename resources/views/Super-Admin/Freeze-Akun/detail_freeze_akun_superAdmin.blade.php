    @extends('Super-Admin.layouts.index')

    @section('super_admin-content')
        <div class="mx-auto mt-10">
            <div class=" border-2 rounded-xl relative">
                <div class="flex items-center space-x-4 mb-6 pb-3 p-10 border-b rounded-b-2xl shadow-md">
                    <div class="modal" id="imgModal">
                        <img id="modalImg" alt="Zoomed" class="w-40 h-40 sm:w-40 object-cover rounded-full">
                    </div>
                    @if ($data->pelamars)
                        @if ($data->pelamars->img_profile)
                            <img id="previewImage" class="w-40 h-40 sm:w-40 object-cover rounded-full mb-3 profile-img"
                                src="{{ asset('storage/' . $data->pelamars->img_profile) }}" alt="" alt="Profile">
                        @else
                            <img id="previewImage" class="w-40 h-40 sm:w-40 object-cover rounded-full mb-3"
                                src="https://ui-avatars.com/api/?name={{ urlencode($data->username) }}&background=random&color=fff&size=128"
                                alt="">
                        @endif
                    @elseif($data->perusahaan)
                        @if ($data->perusahaan->img_profile)
                            <img id="previewImage" class="w-40 h-40 sm:w-40 object-cover rounded-full mb-3 profile-img"
                                src="{{ asset('storage/' . $data->perusahaan->img_profile) }}" alt=""
                                alt="Profile">
                        @else
                            <img id="previewImage" class="w-40 h-40 sm:w-40 object-cover rounded-full mb-3"
                                src="https://ui-avatars.com/api/?name={{ urlencode($data->username) }}&background=random&color=fff&size=128"
                                alt="">
                        @endif
                    @elseif($data->finance)
                        @if ($data->finance->img_profile)
                            <img id="previewImage" class="w-40 h-40 sm:w-40 object-cover rounded-full mb-3 profile-img"
                                src="{{ asset('storage/' . $data->finance->img_profile) }}" alt="" alt="Profile">
                        @else
                            <img id="previewImage" class="w-40 h-40 sm:w-40 object-cover rounded-full mb-3"
                                src="https://ui-avatars.com/api/?name={{ urlencode($data->username) }}&background=random&color=fff&size=128"
                                alt="">
                        @endif
                    @elseif($data->admin)
                        @if ($data->admin->img_profile)
                            <img id="previewImage" class="w-40 h-40 sm:w-40 object-cover rounded-full mb-3 profile-img"
                                src="{{ asset('storage/' . $data->admin->img_profile) }}" alt="" alt="Profile">
                        @else
                            <img id="previewImage" class="w-40 h-40 sm:w-40 object-cover rounded-full mb-3"
                                src="https://ui-avatars.com/api/?name={{ urlencode($data->username) }}&background=random&color=fff&size=128"
                                alt="">
                        @endif
                    @elseif($data->superadmins)
                        @if ($data->superadmins->img_profile)
                            <img id="previewImage" class="w-40 h-40 sm:w-40 object-cover rounded-full mb-3 profile-img"
                                src="{{ asset('storage/' . $data->superadmins->img_profile) }}" alt=""
                                alt="Profile">
                        @else
                            <img id="previewImage" class="w-40 h-40 sm:w-40 object-cover rounded-full mb-3"
                                src="https://ui-avatars.com/api/?name={{ urlencode($data->username) }}&background=random&color=fff&size=128"
                                alt="">
                        @endif
                    @endif


                    <form id="hapus" action="/dashboard/superadmin/hapus/{{ $data->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>

                    <form id="unbanned" action="/dashboard/superadmin/unbanned/{{ $data->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="number" name="status" value="0" hidden>
                    </form>

                    <form id="banned" action="/dashboard/superadmin/banned/{{ $data->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="number" name="status" hidden value="1">
                    </form>

                    <div class="flex space-x-2">
                        @if ($data->status === 0)
                            <button form="banned" type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-1.5 rounded-lg">
                                Banned
                            </button>
                        @else
                            <button form="unbanned" type="submit"
                                class="bg-green-500 hover:bg-green-600 text-white px-4 py-1.5 rounded-lg">
                                Unbanned
                            </button>
                        @endif
                        <button  onclick="openDeleteModal()" type="submit"
                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-1.5 rounded-lg">
                            Hapus Akun
                        </button>
                    </div>
                </div>
                <div class="p-10">

                    <div class="flex space-x-3 mb-3">
                        <div class="flex-1 bg-gray-200 rounded-md py-2 text-center text-sm text-gray-800">
                            {{ $data->username }}
                        </div>
                        <div class="flex-1 bg-gray-200 rounded-md py-2 text-center text-sm text-gray-800">
                            {{ $data->email }}
                        </div>
                    </div>

                    <div class="bg-gray-200 text-center rounded-md py-2 mb-3 text-sm text-gray-800">
                        @if ($data->role == 'pelamar')
                            {{ $data->pelamars->telepon_pelamar ?? '-' }}
                        @elseif($data->role == 'perusahaan')
                            {{ $data->perusahaan->telepon_perusahaan ?? '-' }}
                        @elseif($data->role == 'finance')
                            -
                        @elseif($data->role == 'admin')
                            -
                        @elseif($data->role == 'superadmin')
                            -
                        @endif
                    </div>

                    <div class="bg-gray-200 rounded-md py-12 text-center text-sm text-gray-800">
                        @if ($data->role == 'pelamar')
                            {{ $data->pelamars()->latest()->first()->alamat_pelamars()->latest()->first()->detail ?? '-' }}
                        @elseif($data->role == 'perusahaan')
                            {{ $data->perusahaan()->latest()->first()->alamatperusahaan()->latest()->first()->detail ?? '-' }}
                        @elseif($data->role == 'finance')
                            {{ $data->finance->detail_alamat ?? '-' }}
                        @elseif($data->role == 'admin')
                            {{ $data->admin->detail_alamat ?? '-' }}
                        @elseif($data->role == 'superadmin')
                            {{ $data->superadmins->detail_alamat ?? '-' }}
                        @endif
                    </div>
                </div>
            </div>

            <!-- Modal Hapus Akun -->
            <div id="modalDelete"
                class="fixed inset-0 bg-black/40 backdrop-blur-sm hidden items-center justify-center z-[9999] transition-opacity">

                <div id="modalBox"
                    class="bg-white rounded-xl w-[350px] md:w-[420px] shadow-xl p-6 
               transform scale-90 opacity-0 transition-all duration-300">

                    <h2 class="text-lg font-bold text-gray-800 mb-2">Yakin hapus akun ini?</h2>

                    <p class="text-gray-500 text-sm mb-5 leading-relaxed">
                        Tindakan ini bersifat permanen. Semua data terkait akun akan dihapus dan tidak dapat dikembalikan.
                    </p>

                    <div class="flex justify-end gap-3 mt-4">
                        <button onclick="closeDeleteModal()"
                            class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 transition">
                            Batal
                        </button>

                        <form action="/dashboard/superadmin/hapus/{{ $data->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-4 py-2 rounded-lg bg-red-600 text-white font-semibold hover:bg-red-700 transition">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
                <script>
                    function openDeleteModal() {
                        const modal = document.getElementById("modalDelete");
                        const box = document.getElementById("modalBox");

                        modal.classList.remove("hidden");
                        setTimeout(() => {
                            modal.classList.add("flex");
                            box.classList.remove("scale-90", "opacity-0");
                            box.classList.add("scale-100", "opacity-100");
                        }, 20);
                    }

                    function closeDeleteModal() {
                        const modal = document.getElementById("modalDelete");
                        const box = document.getElementById("modalBox");

                        box.classList.remove("scale-100", "opacity-100");
                        box.classList.add("scale-90", "opacity-0");

                        setTimeout(() => {
                            modal.classList.remove("flex");
                            modal.classList.add("hidden");
                        }, 200);
                    }
                </script>

            </div>

        </div>
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
