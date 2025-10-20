@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="mx-auto mt-10">
        <div class="p-6">
            <div class="flex items-center justify-between border-b pb-4 mb-6 relative">
                <div class="w-24 h-24 flex items-center justify-center rounded-md overflow-hidden">
                    <img src="{{ asset('storage/' . $Data->perusahaan->img_profile) }}" alt="Logo" class="object-contain">
                </div>
                <h2 class="text-lg font-semibold absolute left-1/2 transform -translate-x-1/2">
                    {{ $Data->nama }}
                </h2>
            </div>


            <div class="space-y-5 text-sm text-gray-800 leading-relaxed">
                <div class="flex justify-between items-center">
                    <h3 class="font-semibold">Detail Lowongan</h3>
                    <div class="flex items-center gap-8">
                        <button class="text-red-500 flex items-center gap-1">
                            <i class="ph ph-trash"></i> Report Lowongan
                        </button>
                        <button class="text-orange-500 flex items-center gap-1">
                            <a href="/dashboard/superadmin/perusahaan/lowongan/edit/{{ $Data->id }}">
                                <i class="ph ph-pencil"></i> Edit Lowongan
                            </a>
                        </button>
                    </div>
                </div>

                <div>
                    <h4 class="font-semibold">Gaji</h4>
                    Rp. {{ number_format($Data->gaji_awal, 0, ',', '.') }} - Rp.
                    {{ number_format($Data->gaji_akhir, 0, ',', '.') }} Per Bulan
                </div>

                <div>
                    <h4 class="font-semibold">Jenis Lowongan</h4>
                    <p>{{ $Data->jenis }}</p>
                </div>

                <div>
                    <h4 class="font-semibold">Deskripsi Pekerjaan</h4>
                    <ul class="list-disc list-inside">
                        @foreach (explode("\n", $Data->deskripsi) as $baris)
                            @if (trim($baris) != '')
                                <li>{{ $baris }}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>

                <div>
                    <h4 class="font-semibold">Syarat Pekerjaan</h4>
                    <ul class="list-disc list-inside">
                        <li>Minimal pendidikan SMA/SMK</li>
                        <li>Laki-laki/Perempuan</li>
                        <li>Umur 18-30</li>
                        <li>Batas lamaran hingga dd/mm/yyyy</li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-semibold">Aktivitas Lowongan</h4>
                    <p>Lowongan dipasang {{ $Data->created_at->diffForHumans() }}</p>
                </div>
            </div>

            <div class="flex flex-col items-center gap-3 mt-8">
                @if ($Data->paket_id === null)
                    <button type="button" class="bg-orange-500 text-white py-2 px-10 rounded-md w-fit">Lowongan Belum Memiliki Paket.</button>
                @else
                    @if ($Data->rekomendasi)
                        <button type="button" class="bg-orange-500 text-white py-2 px-10 rounded-md w-fit">Sudah Di
                            Rekomendasikan.</button>
                    @else
                        <form action="/jadikan/rekomendasi/{{ $Data->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="bg-orange-500 text-white py-2 px-10 rounded-md w-fit">Jadikan
                                Rekomendasi</button>
                        </form>
                    @endif
                @endif
                <button class="bg-orange-500 text-white py-2 px-28 rounded-md">Kembali</button>
            </div>
        </div>
    </div>
@endsection
