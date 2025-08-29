<div id="add_pengalaman-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <div
                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Tambah Pengalaman Kerja
                </h3>
                <button type="button"
                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="detail_perusahaan-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5">
                <form class="space-y-4" action="/tambah/pengalaman/kerja" method="POST">
                    @csrf
                    <div>
                        <label for="posisi_kerja"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Posisi Kerja</label>
                        <input type="text" name="posisi_kerja" id="posisi_kerja"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="posisi_kerja" required />
                    </div>
                    <div>
                        <label for="jabatan_kerja"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">jabatan_kerja
                            Kerja</label>
                        <input type="text" name="jabatan_kerja" id="jabatan_kerja"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="jabatan_kerja" required />
                    </div>
                    <div>
                        <label for="nama_perusahaan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Perusahaan</label>
                        <input type="text" name="nama_perusahaan" id="nama_perusahaan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="nama_perusahaan" required />
                    </div>
                    <div>
                        <label for="tahun_awal"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun Awal</label>
                        <input type="text" name="tahun_awal" id="tahun_awal"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="tahun_awal" required />
                    </div>
                    <div>
                        <label for="tahun_akhir"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun Akhir</label>
                        <input type="text" name="tahun_akhir" id="tahun_akhir"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="tahun_akhir" required />
                    </div>
                    <div>
                        <label for="deskripsi"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="deskripsi" required></textarea>
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-orange-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
