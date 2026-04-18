@extends('Super-Admin.layouts.index')

@section('super_admin-content')
<div class="p-8 bg-[#F9FAFB] min-h-screen">
    <div class="max-w-4xl mx-auto">
        {{-- Header Section --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div class="flex items-center gap-4">
                <a href="/dashboard/superadmin/freeze" class="p-2 bg-white border border-gray-200 rounded-xl text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                    <i class="ph ph-arrow-left text-xl"></i>
                </a>
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Detail Pengguna</h1>
                    <p class="text-sm text-gray-500 mt-1">Kelola akun dan status pengguna ini.</p>
                </div>
            </div>
            
            <div class="flex items-center gap-3">
                <button onclick="openDeleteModal()" type="button" 
                    class="px-5 py-2.5 text-sm font-semibold text-red-600 bg-red-50 hover:bg-red-100 border border-red-100 rounded-xl transition-colors">
                    <i class="ph ph-trash align-middle mr-1"></i> Hapus Akun
                </button>
            </div>
        </div>

        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">
            <div class="p-8 border-b border-gray-100">
                <div class="flex flex-col md:flex-row items-center md:items-start gap-8">
                    {{-- Profile Picture --}}
                    <div class="relative group shrink-0">
                        @php
                            $imgSrc = "https://ui-avatars.com/api/?name=" . urlencode($data->username) . "&background=random&color=fff&size=128";
                            if ($data->role == 'pelamar' && $data->pelamars?->img_profile) $imgSrc = asset('storage/' . $data->pelamars->img_profile);
                            elseif ($data->role == 'perusahaan' && $data->perusahaan?->img_profile) $imgSrc = asset('storage/' . $data->perusahaan->img_profile);
                            elseif ($data->role == 'finance' && $data->finance?->img_profile) $imgSrc = asset('storage/' . $data->finance->img_profile);
                            elseif ($data->role == 'admin' && $data->admin?->img_profile) $imgSrc = asset('storage/' . $data->admin->img_profile);
                            elseif ($data->role == 'superadmin' && $data->superadmins?->img_profile) $imgSrc = asset('storage/' . $data->superadmins->img_profile);
                        @endphp
                        
                        <div class="w-32 h-32 rounded-full ring-4 ring-gray-50 overflow-hidden bg-gray-100 cursor-pointer" id="profileImgContainer">
                            <img id="previewImage" src="{{ $imgSrc }}" alt="Profile" class="w-full h-full object-cover">
                        </div>
                    </div>
                    
                    {{-- Basic Info --}}
                    <div class="flex-1 text-center md:text-left space-y-4 w-full">
                        <div>
                            <div class="flex flex-col md:flex-row md:items-center gap-3 mb-2">
                                <h2 class="text-2xl font-bold text-gray-900">{{ $data->username }}</h2>
                                <span class="inline-flex max-w-fit items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider
                                    @if ($data->role === 'superadmin') bg-purple-50 text-purple-600 border border-purple-100
                                    @elseif ($data->role === 'admin') bg-green-50 text-green-600 border border-green-100
                                    @elseif ($data->role === 'perusahaan') bg-blue-50 text-blue-600 border border-blue-100
                                    @elseif ($data->role === 'pelamar') bg-yellow-50 text-yellow-600 border border-yellow-100
                                    @else bg-gray-50 text-gray-600 border border-gray-100 @endif mx-auto md:mx-0">
                                    {{ $data->role }}
                                </span>
                                @if ($data->status === 0)
                                    <span class="inline-flex max-w-fit items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-green-50 text-green-600 border border-green-100 mx-auto md:mx-0">
                                        Aktif
                                    </span>
                                @else
                                    <span class="inline-flex max-w-fit items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-red-50 text-red-600 border border-red-100 mx-auto md:mx-0">
                                        Banned
                                    </span>
                                @endif
                            </div>
                            <p class="text-gray-500 text-sm flex items-center justify-center md:justify-start gap-2">
                                <i class="ph ph-envelope-simple text-lg text-gray-400"></i> {{ $data->email }}
                            </p>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="flex flex-wrap items-center justify-center md:justify-start gap-3 pt-2">
                            <form id="unbanned" action="/dashboard/superadmin/unbanned/{{ $data->id }}" method="POST" class="m-0">
                                @csrf
                                @method('PUT')
                                <input type="number" name="status" value="0" hidden>
                            </form>

                            <form id="banned" action="/dashboard/superadmin/banned/{{ $data->id }}" method="POST" class="m-0">
                                @csrf
                                @method('PUT')
                                <input type="number" name="status" hidden value="1">
                            </form>

                            @if ($data->status === 0)
                                <button form="banned" type="submit" class="bg-red-600 hover:bg-red-700 text-white px-6 py-2.5 rounded-xl text-sm font-semibold transition-all shadow-sm">
                                    <i class="ph ph-prohibit mr-1 align-bottom text-base"></i> Freeze Akun
                                </button>
                            @else
                                <button form="unbanned" type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2.5 rounded-xl text-sm font-semibold transition-all shadow-sm">
                                    <i class="ph ph-check-circle mr-1 align-bottom text-base"></i> Unfreeze Akun
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-8 bg-gray-50/30">
                <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-4">Informasi Lengkap</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm">
                        <p class="text-xs font-medium text-gray-500 mb-1">Nomor Telepon</p>
                        <p class="text-sm font-semibold text-gray-900">
                            @if ($data->role == 'pelamar')
                                {{ $data->pelamars->telepon_pelamar ?? '-' }}
                            @elseif($data->role == 'perusahaan')
                                {{ $data->perusahaan->telepon_perusahaan ?? '-' }}
                            @else
                                -
                            @endif
                        </p>
                    </div>

                    <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm md:col-span-2">
                        <p class="text-xs font-medium text-gray-500 mb-1">Alamat Lengkap</p>
                        <p class="text-sm font-semibold text-gray-900 leading-relaxed max-w-2xl">
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
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Hapus Akun -->
    <div id="modalDelete" class="fixed inset-0 bg-black/40 backdrop-blur-sm hidden items-center justify-center z-[9999] transition-opacity">
        <div id="modalBox" class="bg-white rounded-2xl w-[90%] max-w-md shadow-2xl p-6 transform scale-90 opacity-0 transition-all duration-300">
            <div class="w-12 h-12 rounded-full bg-red-100 flex items-center justify-center mb-4 mx-auto">
                <i class="ph ph-warning text-red-600 text-2xl"></i>
            </div>
            
            <h2 class="text-xl font-bold text-gray-900 mb-2 text-center">Yakin hapus akun ini?</h2>
            <p class="text-gray-500 text-sm mb-6 text-center leading-relaxed">
                Tindakan ini bersifat permanen. Semua data terkait akun akan dihapus dan tidak dapat dikembalikan lagi kedepannya.
            </p>

            <div class="flex flex-col-reverse md:flex-row justify-center gap-3 w-full">
                <button onclick="closeDeleteModal()" class="w-full md:w-auto px-6 py-2.5 rounded-xl font-semibold text-gray-700 bg-gray-100 hover:bg-gray-200 transition-colors">
                    Batal
                </button>

                <form action="/dashboard/superadmin/hapus/{{ $data->id }}" method="POST" class="m-0 w-full md:w-auto">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full md:w-auto px-6 py-2.5 rounded-xl bg-red-600 text-white font-semibold hover:bg-red-700 transition-colors">
                        Ya, Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Image Zoom Modal -->
    <div class="modal hidden fixed inset-0 z-[1000] bg-black/80 flex items-center justify-center backdrop-blur-sm" id="imgModal">
        <div class="relative">
            <button onclick="document.getElementById('imgModal').style.display='none'" class="absolute -top-10 right-0 text-white hover:text-gray-300">
                <i class="ph ph-x text-2xl"></i>
            </button>
            <img id="modalImg" alt="Zoomed" class="max-w-[90vw] max-h-[80vh] object-contain rounded-xl shadow-2xl">
        </div>
    </div>

    <script>
        // Modal Delete
        function openDeleteModal() {
            const modal = document.getElementById("modalDelete");
            const box = document.getElementById("modalBox");

            modal.classList.remove("hidden");
            setTimeout(() => {
                modal.classList.add("flex");
                box.classList.remove("scale-90", "opacity-0");
                box.classList.add("scale-100", "opacity-100");
            }, 50);
        }

        function closeDeleteModal() {
            const modal = document.getElementById("modalDelete");
            const box = document.getElementById("modalBox");

            box.classList.remove("scale-100", "opacity-100");
            box.classList.add("scale-90", "opacity-0");

            setTimeout(() => {
                modal.classList.remove("flex");
                modal.classList.add("hidden");
            }, 300);
        }

        // Image View Modal
        const profileImgContainer = document.getElementById("profileImgContainer");
        const profileImg = document.getElementById("previewImage");
        const imgModal = document.getElementById("imgModal");
        const modalImg = document.getElementById("modalImg");

        profileImgContainer.onclick = () => {
            imgModal.style.display = "flex";
            modalImg.src = profileImg.src;
        };

        imgModal.onclick = (e) => {
            if(e.target === imgModal) {
                imgModal.style.display = "none";
            }
        };
    </script>
</div>
@endsection