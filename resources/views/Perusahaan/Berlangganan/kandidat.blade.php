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
             <img src="data:image/jpeg;base64,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"
                 alt="Background" class="absolute inset-0 w-full h-full object-cover opacity-60">
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
