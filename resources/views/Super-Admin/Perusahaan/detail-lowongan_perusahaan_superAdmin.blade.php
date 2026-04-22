@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="mx-auto mt-10">
        <div class="p-6">
            <div class="space-y-5 text-sm text-gray-800 leading-relaxed">
                <div class="flex justify-between items-center">
                    <h3 class="font-semibold">Detail Lowongan</h3>
                    <div class="flex items-center gap-8">
                        <button class="text-orange-500 flex items-center gap-1">
                            <a href="/dashboard/superadmin/perusahaan/lowongan/edit/{{ $Data->id }}">
                                <i class="ph ph-pencil"></i> Edit Lowongan
                            </a>
                        </button>
                    </div>
                </div>

                <div>
                    <h4 class="font-semibold">Nama Perusahaan</h4>
                    <p>{{ $Data->perusahaan->nama_perusahaan ?? 'N/A' }}</p>
                </div>

                <div>
                    <h4 class="font-semibold">Nama Lowongan</h4>
                    <p>{{ $Data->nama }}</p>
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
                    @php
                        $syarats = is_array($Data->syarat_pekerjaan) ? $Data->syarat_pekerjaan : [$Data->syarat_pekerjaan];
                    @endphp
                    <ul class="list-disc list-inside">
                        @foreach($syarats as $syarat)
                            <li>{{ $syarat }}</li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <h4 class="font-semibold mt-4">Batas Lamaran</h4>
                    <p>{{ $Data->batas_lamaran }}</p>
                </div>

                <div>
                    <h4 class="font-semibold">Aktivitas Lowongan</h4>
                    <p>Lowongan dipasang {{ $Data->created_at->diffForHumans() }}</p>
                </div>
            </div>

            <div class="flex items-center gap-3 mt-8">
                @if ($Data->paket_id === null)
                    <button type="button" class="bg-zinc-500 text-white py-2 px-10 rounded-md w-fit">Lowongan Belum
                        Memiliki Paket.</button>
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
                <a href="/dashboard/superadmin/perusahaan" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-md">Kembali ke
                    halaman</a>
            </div>
        </div>
    </div>
@endsection
