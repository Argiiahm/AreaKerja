@extends('Admin.Dashboard-admin.layouts.index')

@section('admin-content')
    <div class="container max-w-screen-lg mx-auto mt-30">
        <div class="bg-gray-600 rounded-lg shadow-md p-16">
            <div class="flex items-center">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/005/544/718/small_2x/profile-icon-design-free-vector.jpg"
                    alt="Profile" class="w-20 h-20 rounded-full object-cover border-4 border-gray-600">
                <h2 class="text-white text-xl font-bold ml-4">{{ $Data->nama_pelamar }}</h2>
            </div>

            <form class="grid grid-cols-3 gap-4 mt-6 text-white text-sm" id="autoSaveForm"
                action="/dashboard/admin/status/calonkandidat/{{ $Data->id }}" method="POST">
                @csrf
                @method('PUT')

                <div>
                    <p class="opacity-80">Divisi</p>
                    @php
                        $divisi = json_decode($Data->divisi, true);
                    @endphp

                    <p class="font-medium">
                        @if (is_array($divisi))
                            {{ implode(', ', $divisi) }}
                        @else
                            {{ $Data->divisi }}
                        @endif
                    </p>

                </div>

                <input type="hidden" name="kategori" value="{{ $Data->kategori }}">

                <div>
                    <p class="opacity-80">Mulai Pelatihan</p>
                    <input type="date" name="mulai_pelatihan" class="text-zinc-800 px-5 py-2 rounded-md auto-save-input"
                        value="{{ $Data->mulai_pelatihan }}">
                </div>
                <div>
                    <p class="opacity-80">Selesai Pelatihan</p>
                    <input type="date" name="selesai_pelatihan"
                        class="text-zinc-800 px-5 py-2 rounded-md auto-save-input" value="{{ $Data->selesai_pelatihan }}">
                </div>
            </form>
        </div>
    </div>

    <div class="flex flex-col items-center gap-3 mt-6">
        <form action="/dashboard/admin/status/calonkandidat/{{ $Data->id }}" method="POST" class="w-60">
            @csrf
            @method('PUT')
            <input type="hidden" name="kategori" value="kandidat aktif">
            <button type="submit"
                class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 rounded-md w-full shadow">
                Lulus
            </button>
        </form>

        <form action="/dashboard/admin/status/calonkandidat/{{ $Data->id }}" method="POST" class="w-60">
            @csrf
            @method('PUT')
            <input type="hidden" name="kategori" value="pelamar">
            <button type="submit"
                class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 rounded-md w-full shadow">
                Gugur
            </button>
        </form>
    </div>

    <script>
        document.querySelectorAll(".auto-save-input").forEach(input => {
            input.addEventListener("change", function() {
                document.getElementById("autoSaveForm").submit();
            });
        });
    </script>
@endsection
