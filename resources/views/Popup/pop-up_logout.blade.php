 <div id="popup-modal-logout" tabindex="-1"
     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-auto max-h-full">
     <div class="relative p-4 w-full max-w-md max-h-full">
         <div class="relative bg-white rounded-lg ">
             <button type="button"
                 class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                 data-modal-hide="popup-modal-logout">
                 <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 14 14">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                 </svg>
                 <span class="sr-only">Close modal</span>
             </button>
             <div class="p-4 md:p-5 text-center">
                 <img class="mx-auto mb-4 text-gray-400" src="{{ asset('Icon/poplogout.png') }}" alt="">
                 <h3 class="mb-2 text-lg font-bold text-gray-800">
                     Konfirmasi Keluar</h3>
                 <h3 class="mb-5 text-lg font-normal text-gray-500">
                     Apakah anda yakin untuk keluar dari Userxxx</h3>
                 <div class="flex items-center gap-2 justify-center">
                     <form action="">
                         @csrf
                         @method('DELETE')
                         <button type="submit"
                             class="py-2.5 px-10 ms-3 text-sm font-medium bg-orange-500 rounded-md text-white">
                             Keluar
                         </button>
                     </form>
                     <button data-modal-hide="popup-modal-logout" type="button"
                         class="py-2.5 px-10 ms-3 text-sm font-medium bg-orange-500 rounded-md text-white">
                         Batal</button>
                 </div>
             </div>
         </div>
     </div>
 </div>
