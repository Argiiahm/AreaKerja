@extends('Dashboard-finance.layouts.index')

@section('finance-content')
    <div class="p-6">
        <div class="flex justify-between items-center">
            <h2 class="text-base font-semibold mb-4">Tampilkan Omset Perusahaan</h2>

            <form method="GET" action="/dashboard/finance/omset" class="flex items-center gap-2 mb-3">
                <select name="filter"
                    class="border border-orange-500 rounded-md px-3 py-1 text-sm focus:ring-2 focus:ring-orange-400"
                    onchange="this.form.submit()">
                    @foreach (['Bulan ini', '1 Bulan Terakhir', '3 Bulan Terakhir', '6 Bulan Terakhir', '1 Tahun Terakhir', '2 Tahun Terakhir'] as $opsi)
                        <option value="{{ $opsi }}" {{ $filter === $opsi ? 'selected' : '' }}>
                            {{ $opsi }}
                        </option>
                    @endforeach
                </select>

                <button type="submit" class="bg-orange-500 text-white px-8 py-1 rounded-lg hover:bg-orange-600 transition">
                    Cari
                </button>
            </form>
        </div>

        <div class="rounded-2xl border border-gray-300 overflow-hidden">
            <div class="bg-orange-500 text-white text-center font-semibold py-2 rounded-t-2xl">
                Daftar Omset Perusahaan - {{ $filter }}
            </div>

            <table class="w-full text-sm text-black border-collapse">
                <tbody>
                    @forelse ($listOmset as $item)
                        <tr class="border-b">
                            <td class="px-4 py-3 border-r border-gray-300 w-1/2 font-medium">
                                {{ $item['periode'] }}
                            </td>
                            <td class="px-4 py-3 text-right font-semibold w-1/2">
                                Rp {{ number_format($item['total'], 0, ',', '.') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center py-6 text-gray-500">
                                Tidak ada transaksi pada periode ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6 text-sm font-medium">
            <p class="flex justify-between max-w-md">
                <span>Total Omset</span>
                <span>: Rp {{ number_format($totalOmset, 0, ',', '.') }}</span>
            </p>
            <p class="flex justify-between max-w-md mt-1">
                <span>Rata-rata</span>
                <span>: Rp {{ number_format($rataRata, 0, ',', '.') }}</span>
            </p>
        </div>

        <div class="border-t border-orange-400 mt-4"></div>

        <div class="mt-4">
            <a href="{{ route('finance.omset.pdf', ['filter' => $filter]) }}"
                class="bg-orange-500 text-white px-6 py-1 rounded-full text-sm hover:bg-orange-600 transition">
                Unduh
            </a>
        </div>
    </div>
@endsection
