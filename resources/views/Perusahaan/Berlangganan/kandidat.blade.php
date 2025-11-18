 @extends('layouts.index')
 @section('content')
     @php
         $nomorWA = '6287874732189';
         $pesan =
             'Halo admin, saya ingin Bertanya Tentang Diskon Ketika Sudah Berlangganan.%0A' .
             'Nama Perusahaan: ' .
             Auth::user()->perusahaan->nama_perusahaan .
             '%0A' .
             'Email: ' .
             Auth::user()->email .
             '%0A' .
             'Terima kasih.';
     @endphp
     <div class="font-sans mt-24">

         <section class="relative bg-gray-900 text-white">
             <img src="{{ $link_sosial['berlangganan_header']->link ?? 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD...' }}"
                 class="absolute inset-0 w-full h-full object-cover opacity-60" alt="Background">

             <div class="relative max-w-4xl mx-auto px-6 py-24 text-center md:text-left">
                 <h1 class="text-3xl md:text-4xl font-bold mb-4">Selamat Datang</h1>
                 <p class="text-lg text-gray-200">
                     Sambutlah hari ini dengan semangat, dan manfaatkan sepenuhnya fasilitas yang kami
                     berikan demi kenyamanan anda.
                 </p>
             </div>
         </section>

         <section class="bg-white py-12 px-6">
             <div>
                 <div class="max-w-5xl mx-auto flex justify-end md:grid-cols-2 gap-8 mb-5">
                     <div class="flex flex-col md:flex-row-reverse bg-white  rounded-lg overflow-hidden w-8/12">
                         <img src="https://cdn1-production-images-kly.akamaized.net/FhktzaqFN8LXxbS41Ajv3qNsQVs=/800x450/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/3520746/original/058679800_1627264785-green-chameleon-s9CC2SKySJM-unsplash_Fotor.jpg"
                             alt="Request Data" class="w-full md:w-40 object-cover">
                         <div class="p-4 flex flex-col justify-between text-center md:text-left">
                             <div>
                                 <h3 class="font-semibold text-gray-800 mb-2">Request Data Pekerja</h3>
                                 <p class="text-gray-600 text-sm">
                                     Dapatkan akses untuk bisa melihat statistik para pekerja seperti list pekerja
                                     yang bermasalah, list pekerja yang handal, hingga membuat laporan harian pekerja.
                                 </p>
                             </div>
                             <a href="/dashboard/perusahaan/berlangganan/kandidat/info"
                                 class="text-orange-500 text-sm font-medium mt-2 hover:underline">
                                 &gt; Lebih Detail
                             </a>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="max-w-5xl mx-auto flex justify-start md:grid-cols-2 gap-8">


                 <div class="flex flex-col md:flex-row bg-white  rounded-lg overflow-hidden w-8/12 py-5 ">
                     <img src="https://cdn1-production-images-kly.akamaized.net/FhktzaqFN8LXxbS41Ajv3qNsQVs=/800x450/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/3520746/original/058679800_1627264785-green-chameleon-s9CC2SKySJM-unsplash_Fotor.jpg"
                         alt="Diskon Fitur" class="w-full md:w-40 object-cover">
                     <div class="p-4 flex flex-col justify-between text-center md:text-left">
                         <div>
                             <h3 class="font-semibold text-gray-800 mb-2">Diskon Fitur Area Kerja</h3>
                             <p class="text-gray-600 text-sm">
                                 Dengan berlangganan, Anda mendapatkan diskon fitur serta berbagai manfaat tambahan
                                 dan informasi terbaru setiap saat.
                             </p>
                         </div>
                         <a href="https://wa.me/{{ $nomorWA }}?text={{ $pesan }}" target="_blank"
                             class="text-orange-500 text-sm font-medium mt-2 hover:underline">
                             &gt; Lebih Detail
                         </a>
                     </div>
                 </div>

             </div>
         </section>


     </div>
 @endsection
