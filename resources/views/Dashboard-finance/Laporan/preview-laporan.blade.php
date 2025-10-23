 <div class="rounded-2xl border border-gray-300 overflow-hidden shadow-sm">
     <h2 class="text-base font-semibold m-3">
         Laporan Transaksi Penghasilan — {{ \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }}
     </h2>
     <div class="overflow-x-auto">
         <table class="w-full text-sm text-gray-700 border-collapse min-w-[600px]">
             <thead class="bg-orange-500 text-white font-semibold text-center">
                 <tr>
                     <th class="px-3 py-2">Transaksi</th>
                     <th class="px-3 py-2">Perusahaan</th>
                     <th class="px-3 py-2">Jenis Transaksi</th>
                     <th class="px-3 py-2">Sumber Dana</th>
                     <th class="px-3 py-2">Nominal IDR</th>
                     <th class="px-3 py-2">Transaksi Koin</th>
                 </tr>
             </thead>
             <tbody class="text-center">
                 @php
                     use App\Models\HargaKoin;

                     $totalKoin = 0;
                 @endphp
                 @forelse ($detail as $item)
                     @php
                         $koin = HargaKoin::where('nama', $item->pesanan)->first();
                         if ($koin && isset($koin->harga)) {
                             $totalKoin += $koin->harga;
                         }
                     @endphp
                     <tr class="border-b">
                         <td class="px-3 py-2">{{ $item->id }}</td>
                         <td class="px-3 py-2">{{ $item->perusahaan ?? '-' }}</td>
                         <td class="px-3 py-2">{{ $item->pesanan }}</td>
                         <td class="px-3 py-2">{{ $item->sumber_dana }}</td>
                         <td class="px-3 py-2">
                             {{ $item->harga ? 'Rp ' . number_format($item->harga, 0, ',', '.') : '-' }}
                         </td>
                         <td class="px-3 py-2">{{ $koin->harga ?? '-' }}</td>
                     </tr>
                 @empty
                     <tr>
                         <td colspan="6" class="py-4 text-gray-500">Tidak ada transaksi pada tanggal ini.</td>
                     </tr>
                 @endforelse
             </tbody>
         </table>
     </div>
     <div class="m-4 text-sm font-medium space-y-1">
         <p class="flex justify-between max-w-xs">
             <span>Total Tunai</span>
             <span>: Rp {{ number_format($totalTunai, 0, ',', '.') }}</span>
         </p>
         <p class="flex justify-between max-w-xs">
             <span>Total Koin</span>
             <span>: {{ number_format($totalKoin, 0, ',', '.') }} Koin</span>
         </p>
     </div>
 </div>
