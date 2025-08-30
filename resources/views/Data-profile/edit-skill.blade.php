@extends('layouts.index')

@section('content')
    <section class="pt-40 mx-10">
        <h1 class="font-semibold">Profile Akun</h1>
        <div class="mt-10 border-2 border-orange-500 p-6 sm:p-10 rounded-lg">
            <div class="flex flex-col lg:flex-row lg:items-center gap-6 lg:gap-10">
                <div class="flex flex-col items-center">
                    <img class="w-32 sm:w-40 rounded-full mb-3"
                        src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                        alt="">
                    <div>
                        <select class="border-2 border-orange-500 w-32 sm:w-40 p-2 rounded-md text-orange-500 font-semibold">
                            <option value="">Pelamar Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="flex flex-col lg:flex-row items-center w-full justify-between gap-6">
                    <div class="flex flex-col sm:flex-row gap-4 items-center w-full sm:w-auto">
                        <button
                            class="flex items-center gap-2 border-2 border-orange-500 px-6 py-2 rounded-lg w-full sm:w-auto justify-center">
                            <i class="ph ph-upload-simple text-2xl text-orange-500"></i>
                            <span class="text-orange-500">Upload</span>
                        </button>
                        <button class="flex items-center gap-2 border px-6 py-2 rounded-lg w-full sm:w-auto justify-center">
                            <i class="ph ph-trash text-2xl"></i>
                            <span>Remove</span>
                        </button>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
                        <div class="bg-orange-500 px-6 py-2 rounded-lg text-center w-full sm:w-auto">
                            <span class="text-white font-semibold">Simpan</span>
                        </div>
                        <div class="bg-green-500 px-6 py-2 rounded-lg text-center w-full sm:w-auto">
                            <span class="text-white font-semibold">Unduh CV</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=" mx-auto bg-white p-6">
            <h2 class="text-xl font-semibold text-gray-800 border-b-2 border-orange-500 pb-1 mb-6">
                Edit Skill
            </h2>
            <form class="space-y-4" action="/update/skill/{{  $data->id }}" method="POST">
                @csrf
                @method('PUT')
                <div>
                    <label for="skill" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Skill</label>
                    <input type="text" name="skill" id="skill"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5" placeholder="skill"
                        value="{{ $data->skill }}">
                </div>
                <div>
                    <label for="experience_level"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Experience Level</label>
                    <input type="text" name="experience_level" id="experience_level"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                        placeholder="experience_level" value="{{ $data->experience_level }}">
                </div>
                <button type="submit"
                    class="w-full text-white bg-orange-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan</button>
            </form>
        </div>

    </section>
@endsection
