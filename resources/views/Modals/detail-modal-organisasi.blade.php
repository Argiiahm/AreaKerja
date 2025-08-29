@if(Auth::check())
<div id="detail_organisasi-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <div
                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Organisasi
                </h3>
                <button type="button"
                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="detail_organisasi-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 w-full md:p-5">
                <div class="flex justify-between w-full">
                    <div class="space-y-2 w-full">
                        @if(Auth::user()->role !== 'superadmin')
                        @foreach (Auth::user()->pelamars->organisasi as $or)
                            <div class="flex bg-gray-100 rounded-lg justify-between px-2">
                                <div class="p-3">{{ $or->jabatan }} -
                                    {{ $or->nama_organisasi }} ({{ $or->tahun_awal }} – {{ $or->tahun_akhir }})
                                    <p class="font-normal text-gray-400">{{ $or->deskripsi }}</p>
                                </div>
                                <div>
                                    <a href="/edit/organisasi/{{ $or->id }}">
                                        <button class="ph ph-pencil-simple text-2xl text-orange-500"></button>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                        @endif
                    </div>
                </div>
                <button data-modal-target="add_organisasi-modal" data-modal-toggle="add_organisasi-modal"
                        data-modal-hide="detail_organisasi-modal" type="button" class="w-full text-white border mt-5 border-orange-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    <div class="flex justify-between items-center text-orange-500">
                        <span>Tambahkan Organisasi</span>
                        <span class="text-2xl font-bold">+</span>
                    </div>
                </button>
            </div>
        </div>
    </div>
</div>
@endif
