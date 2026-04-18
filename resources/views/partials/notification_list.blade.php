@php
    $user = Auth::user();
    $isPelamar = $user->role === 'pelamar';
    $isPerusahaan = $user->role === 'perusahaan';
@endphp

{{-- NOTIFIKASI UNTUK PELAMAR --}}
@if ($isPelamar)
    @foreach ($Pesan as $p)
        @if ($p->status !== 'pending' && $p->pelamar_id === $user->pelamars->id)
            @php $lowongan = \App\Models\LowonganPerusahaan::find($p->lowongan_id); @endphp
            <li
                class="px-4 py-3 {{ $p->is_read === 0 ? 'bg-gray-100' : 'border-b border-gray-200' }} hover:bg-gray-50 transition">
                <form action="/detail/notif/read/{{ $p->id }}" method="POST">
                    @csrf @method('PUT')
                    <button type="submit" class="text-left w-full flex items-start gap-3">
                        <img class="w-10 h-10 rounded-full object-cover"
                            src="{{ asset('storage/' . $lowongan->perusahaan->img_profile) }}" alt="Logo">
                        <div class="flex-1">
                            <p class="text-sm text-gray-700">
                                <span
                                    class="font-bold text-gray-900">{{ $p->status === 'diterima' ? 'Selamat!' : 'Mohon Maaf!' }}</span>
                                Lamaran Anda ke <span
                                    class="font-semibold">{{ $lowongan->perusahaan->nama_perusahaan }}</span>
                                divisi <span class="font-semibold">{{ $lowongan->nama }}</span>
                                <span
                                    class="{{ $p->status === 'diterima' ? 'text-green-600' : 'text-red-600' }} font-medium">
                                    {{ $p->status === 'diterima' ? 'Diterima' : 'Belum Bisa Kami Terima' }}
                                </span>.
                            </p>
                            <span class="text-xs text-gray-400">{{ $p->updated_at->diffForHumans() }}</span>
                        </div>
                    </button>
                </form>
            </li>
        @endif
    @endforeach

    {{-- Notifikasi Rekrutmen (Kandidat Aktif) --}}
    @if ($user->pelamars->kategori === 'kandidat aktif')
        @foreach ($PesanPerusahaan as $pp)
            @if ($pp->status === 'pending' && $pp->pelamar_id === $user->pelamars->id)
                @php $lowongan = \App\Models\LowonganPerusahaan::find($pp->lowongan_id); @endphp
                <li
                    class="px-4 py-3 {{ $pp->is_read === 0 ? 'bg-gray-100' : 'border-b border-gray-200' }} hover:bg-gray-50 transition">
                    <button onclick="window.location='/kandidat/rekrut'"
                        class="text-left w-full flex items-start gap-3">
                        <img class="w-10 h-10 rounded-full object-cover"
                            src="{{ asset('storage/' . $lowongan->perusahaan->img_profile) }}" alt="Logo">
                        <div class="flex-1">
                            <p class="text-sm text-gray-700">
                                <span class="font-bold text-gray-900">Selamat!</span> Anda telah direkrut oleh
                                <span class="font-semibold">{{ $lowongan->perusahaan->nama_perusahaan }}</span>
                                di bagian <span class="font-semibold">{{ $lowongan->nama }}</span>.
                            </p>
                            <span class="text-xs text-gray-400">{{ $pp->updated_at->diffForHumans() }}</span>
                        </div>
                    </button>
                </li>
            @endif
        @endforeach
    @endif

    {{-- NOTIFIKASI UNTUK PERUSAHAAN --}}
@elseif ($isPerusahaan)
    @foreach ($PesanPerusahaan as $pp)
        @if ($pp->status !== 'pending' && $pp->lowongan_perusahaan->perusahaan->id === $user->perusahaan->id)
            @php $pelamar = \App\Models\Pelamar::find($pp->pelamar_id); @endphp
            <li
                class="px-4 py-3 {{ $pp->is_read === 0 ? 'bg-gray-100' : 'border-b border-gray-200' }} hover:bg-gray-50 transition">
                <form action="/detail/notif/read/perusahaan/{{ $pp->id }}" method="POST">
                    @csrf @method('PUT')
                    <button type="submit" class="text-left w-full flex items-start gap-3">
                        <img class="w-10 h-10 rounded-full object-cover"
                            src="{{ asset('storage/' . $pelamar->img_profile) }}" alt="Foto">
                        <div class="flex-1">
                            <p class="text-sm text-gray-700">
                                <span class="font-bold text-gray-900">Update!</span> Lamaran
                                <span class="font-semibold">{{ $pelamar->nama_pelamar }}</span>
                                pada lowongan <span class="font-semibold">{{ $pp->lowongan_perusahaan->nama }}</span>
                                statusnya menjadi <span class="font-medium text-blue-600">{{ $pp->status }}</span>.
                            </p>
                            <span class="text-xs text-gray-400">{{ $pp->updated_at->diffForHumans() }}</span>
                        </div>
                    </button>
                </form>
            </li>
        @endif
    @endforeach
@endif

{{-- Footer Notifikasi (Tandai Baca) --}}
<div class="flex items-center justify-end px-5 py-3 gap-2 bg-gray-50 rounded-b-lg">
    <i class="ph ph-checks text-blue-500 font-bold text-lg"></i>
    <button class="text-xs font-semibold text-gray-600 hover:text-blue-600">
        Tandai Semua Telah Baca
    </button>
</div>
