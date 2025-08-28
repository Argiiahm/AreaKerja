@extends('layouts.index')
@section('content')
    <section class="relative w-full h-[70vh] lg:h-screen pt-24">
        <div class="absolute inset-0">
            <img src="https://png.pngtree.com/background/20240507/original/pngtree-digital-marketing-website-displayed-on-rendered-office-desktop-picture-image_8837781.jpg"
                alt="Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-60"></div>
        </div>
        <div class="relative z-10 flex items-center justify-start h-full px-6 lg:px-20">
            <div class="max-w-lg">
                <h1 class="text-4xl lg:text-6xl font-bold text-white mb-4">Laporan Pekerja</h1>
                <p class="text-white text-base lg:text-lg mb-6 leading-relaxed">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia vero veritatis eum quidem quia odio dolorum aut ratione voluptas atque sapiente nam eos vitae, quos animi facilis voluptatum? Dignissimos, inventore.
                </p>
            </div>
        </div>
    </section>

<section class="max-w-4xl mx-auto px-6 py-12 bg-white">
  <h3 class="text-xl font-semibold mb-6">Laporan Pekerja</h3>
  
  <form class="space-y-6">
    <div>
      <label class="block text-sm font-medium mb-2">Nama Pekerja</label>
      <input type="text" placeholder="Masukkan nama pekerja"
             class="w-full border rounded-md px-3 py-2 focus:ring-2 focus:ring-orange-400 focus:outline-none"/>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <div>
        <label class="block text-sm font-medium mb-2">Upload Bukti Pendukung</label>
        <input type="text" placeholder="Contoh: Absensi Kerja_Nama_.pdf"
               class="w-full border rounded-md px-3 py-2 focus:ring-2 focus:ring-orange-400 focus:outline-none"/>
      </div>

      <div>
        <label class="block text-sm font-medium mb-2">Gender</label>
        <div class="flex items-center gap-6 mt-2">
          <label class="flex items-center gap-2 cursor-pointer">
            <input type="radio" name="gender" class="text-orange-500 focus:ring-orange-400 border border-gray-600">
            <span>Laki-Laki</span>
          </label>
          <label class="flex items-center gap-2 cursor-pointer">
            <input type="radio" name="gender" class="text-orange-500 focus:ring-orange-400 border border-gray-600">
            <span>Perempuan</span>
          </label>
        </div>
      </div>
    </div>

    <div>
      <label class="block text-sm font-medium mb-2">Alasan Pelaporan</label>
      <textarea rows="4" placeholder="Contoh : Nama jarang sekali datang tepat waktu dan sering bolos kerja"
                class="w-full border rounded-md px-3 py-2 focus:ring-2 focus:ring-orange-400 focus:outline-none"></textarea>
    </div>

    <div class="flex justify-end">
      <button type="submit" 
              class="bg-orange-500 text-white px-6 py-2 rounded-md font-medium hover:bg-orange-600">
        Simpan
      </button>
    </div>
  </form>
</section>

@endsection