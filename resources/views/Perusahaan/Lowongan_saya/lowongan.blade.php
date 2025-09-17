@extends('layouts.index')

@section('content')
    @if (Auth::user()->perusahaan->pasanglowongan->count() > 0)
        <div class="max-w-6xl mx-auto px-4 sm:px-6 py-8 mt-24">
            <div class="flex items-start gap-4 w-full py-5 justify-between">
                <div class="flex gap-5 justify-between w-10/12 md:w-11/12 lg:w-11/12 items-center">
                    <div class="flex">
                        @if (Auth::user()->perusahaan->img_profile)
                            <div class="w-32 h-32  flex items-center justify-center">
                                <img class="object-contain w-full"
                                    src="{{ asset('storage/' . Auth::user()->perusahaan->img_profile) }}" alt="">
                            </div>
                        @else
                            <div class="w-32 h-32  flex justify-center">
                                <img class="w-20 h-20 rounded-full"
                                    src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                                    alt="">
                            </div>
                        @endif

                        <div>
                            <h2 class="text-lg font-bold">{{ Auth::user()->perusahaan->nama_perusahaan }}</h2>
                            <p class="text-sm text-gray-600">Jasa TI dan Konsultan TI</p>
                            <p class="text-sm text-gray-500">Jakarta Timur, DKI Jakarta, Indonesia</p>
                        </div>
                    </div>
                    <div>
                        <a href="/dashboard/perusahaan/isi/lowongan"
                            class="absolute w-16 h-16 border border-orange-500 rounded-md flex items-center justify-center text-orange-500 hover:bg-orange-50">
                            <i class="ph ph-plus text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="mt-8">
                <div class="flex justify-between items-end text-center gap-3 mb-3">
                    <h3 class="font-semibold text-center">Lowongan</h3>
                    <div>
                        <select class="border rounded-md px-6 lg:px-10 md:px-10 py-2 text-sm">
                            <option>Jenis Paket</option>
                            <option>Paket A</option>
                            <option>Paket B</option>
                        </select>
                        <select class="border rounded-md px-6 lg:px-10 md:px-10 py-2 text-sm">
                            <option>Jenis Lowongan</option>
                            <option>Fulltime</option>
                            <option>Part-time</option>
                            <option>Freelance</option>
                        </select>
                    </div>
                </div>

                @forelse ($Data as $d)
                    @if ($d->paket_id)
                        <a href="/dashboard/perusahaan/lowongan/detail/{{ $d->id }}">
                            <div class="flex shadow-md p-4">
                                <div>
                                    <img src="{{ asset('Icon/seveninc.png') }}" alt="">
                                </div>
                                <div class="w-full">
                                    <p>Seven Inc</p>
                                    <h1 class="font-semibold">{{ $d->nama }} - {{ $d->jenis }}</h1>
                                    <span>Yogyakarta</span>
                                    <div class="mt-5 block lg:flex md:flex justify-between items-center w-full">
                                        <span class="px-3 bg-[#d7d6d6] text-[#565656] py-2 rounded-md">
                                            Rp.{{ $d->gaji_awal }} - Rp.{{ $d->gaji_akhir }} per bulan
                                        </span>
                                        <span class="block mt-3 text-[#565656] pl-0 lg:pl-10 md:pl-10">
                                            <p class="countdown text-red-500 font-medium"
                                                data-expired="{{ $d->expired_date }}"></p>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @else
                        <div class="flex justify-between items-end text-center gap-3 my-5">
                            <h3 class="font-semibold text-center text-orange-500">Lowongan Non Publish</h3>
                        </div>
                        <div class="flex shadow-md p-4">
                            <div>
                                <img src="{{ asset('Icon/seveninc.png') }}" alt="">
                            </div>
                            <div class="w-full">
                                <a href="/dashboard/perusahaan/lowongan/detail/{{ $d->id }}">
                                    <p>{{ Auth::user()->perusahaan->nama_perusahaan }}</p>
                                    <h1 class="font-semibold">{{ $d->nama }} - {{ $d->jenis }}</h1>
                                    <span>Yogyakarta</span>
                                    <div class="mt-5 block lg:flex md:flex justify-between items-center w-full">
                                        <span class="px-3 bg-[#d7d6d6] text-[#565656] py-2 rounded-md">
                                            Rp.{{ $d->gaji_awal }} - Rp.{{ $d->gaji_akhir }} per bulan
                                        </span>
                                </a>
                                <button type="button"
                                    class="publish-btn block mt-3 pl-0 lg:pl-10 md:pl-10 bg-orange-500 px-10 py-2 rounded-md text-white"
                                    data-id="{{ $d->id }}">
                                    Publish
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
            @empty
           <p class="text-center text-gray-500 mt-6">Belum ada lowongan.</p>
           @endforelse
       </div>
    </div>
    <div class="flex justify-center mt-8">
        <button class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-2 rounded-lg shadow">
            Memuat
        </button>
    </div>
    </div>
@else
    <div class="max-w-6xl mx-auto px-4 sm:px-6 py-8 mt-24">
        <div class="flex items-start gap-4 w-full py-5">
            <div class="w-32 h-32  flex items-center justify-center">
                @if (Auth::user()->perusahaan->img_profile)
                    <img class="object-contain w-full"
                        src="{{ asset('storage/' . Auth::user()->perusahaan->img_profile) }}" alt="">
                @else
                    <img class="object-contain w-full"
                        src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                        alt="">
                @endif
            </div>
            <div>
                <h2 class="text-lg font-bold">Seven_Inc</h2>
                <p class="text-sm text-gray-600">Jasa TI dan Konsultan TI</p>
                <p class="text-sm text-gray-500">Jakarta Timur, DKI Jakarta, Indonesia</p>
            </div>
        </div>

        <div class="mt-8">
            <div class="flex justify-between items-end text-center gap-3 mb-3">
                <h3 class="font-semibold text-center">Lowongan</h3>
                <div>
                    <select class="border rounded-md px-10 py-2 text-sm">
                        <option>Jenis Paket</option>
                        <option>Paket A</option>
                        <option>Paket B</option>
                    </select>
                    <select class="border rounded-md px-10 py-2 text-sm">
                        <option>Jenis Lowongan</option>
                        <option>Fulltime</option>
                        <option>Part-time</option>
                        <option>Freelance</option>
                    </select>
                </div>
            </div>

            <div class="border rounded-xl p-6 min-h-[250px] flex flex-col items-center justify-center relative">
                <a href="/dashboard/perusahaan/isi/lowongan"
                    class="absolute top-4 left-4 w-10 h-10 border border-orange-500 rounded-md flex items-center justify-center text-orange-500 hover:bg-orange-50">
                    <i class="ph ph-plus text-xl"></i>
                </a>
                <div class="flex flex-col items-center justify-center text-gray-500">
                    <i class="ph ph-file text-4xl mb-2"></i>
                    <p class="text-sm">Lowongan Kosong</p>
                </div>
            </div>
        </div>
    </div>
    @endif 
    <div id="publishModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
        <div class="bg-white p-6 rounded-md w-96 relative">
            <h2 class="text-lg font-bold mb-4">Konfirmasi Publish</h2>
            <p>Apakah Anda yakin ingin mem-publish lowongan ini?</p>

            <div class="mt-4 flex justify-end gap-3">
                <button type="button" id="closeModal" class="px-4 py-2 border rounded-md">Batal</button>
                <a href="/pasanglowongan" class="px-4 py-2 bg-orange-500 text-white rounded-md">Ya, Publish</a>
            </div>
        </div>
    </div> 
       
    <script>
        const publishButtons = document.querySelectorAll('.publish-btn');
        const modal = document.getElementById('publishModal');
        const closeModal = document.getElementById('closeModal');

        function startCountdown(element) {
            const expiredAt = new Date(element.dataset.expired).getTime();

            function updateCountdown() {
                const now = new Date().getTime();
                const distance = expiredAt - now;

                if (distance < 0) {
                    element.innerHTML = "Expired";
                    return;
                }

                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                element.innerHTML =
                    days + " Hari " + hours + " Jam " + minutes + " Menit " + seconds + " Detik";
            }

            setInterval(updateCountdown, 1000);
            updateCountdown();
        }

        document.querySelectorAll('.countdown').forEach(startCountdown);

        publishButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            });
        });

        closeModal.addEventListener('click', () => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        });

        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }
        });
    </script>
@endsection
