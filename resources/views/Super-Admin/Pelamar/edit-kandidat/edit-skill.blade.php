@extends('Super-Admin.layouts.index')
@section('super_admin-content')
    <section class="pt-40 mx-10">
        <div class=" mx-auto bg-white p-6">
            <h2 class="text-xl font-semibold text-gray-800 border-b-2 border-orange-500 pb-1 mb-6">
                Edit Skill
            </h2>
            <form class="space-y-4" action="/update/superadmin/kandidat/skill/{{ $data->id }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="pelamar_id" value="{{ $data->pelamar_id ?? '' }}">
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
