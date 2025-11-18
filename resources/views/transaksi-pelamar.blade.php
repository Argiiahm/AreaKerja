@extends('layouts.index')

@section('content')

    @if ($Data)
        <section class="container max-w-screen-lg mx-auto mt-32 md:mt-40 px-4">
            <div class="flex flex-col gap-4 shadow-md p-4 rounded-lg bg-white">
                <div class="w-full">
                    <p class="font-bold text-xl md:text-2xl break-words">
                        {{ $Data->pesanan }}
                    </p>

                    <span class="text-gray-400 text-sm md:text-base block mt-1">
                        <span>No Referensi: </span>{{ $Data->no_referensi }}
                    </span>

                    <div class="mt-5 flex flex-col md:flex-row lg:flex-row justify-between items-start md:items-center w-full gap-3">
                        <span class="px-3 py-2 bg-orange-500 text-white capitalize rounded-md text-sm md:text-base">
                            {{ $Data->status ?? 'Tidak ada status' }}
                        </span>

                        <span class="text-[#565656] text-sm md:text-base">
                            {{ $Data->created_at->diffForHumans() }}
                        </span>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="container max-w-screen-lg mx-auto mt-48 md:mt-60 px-4">
            <div class="shadow-md p-4 rounded-lg bg-white">
                <span class="text-zinc-500 block text-center text-sm md:text-base">
                    Belum Ada Transaksi.
                </span>
            </div>
        </section>
    @endif

@endsection
