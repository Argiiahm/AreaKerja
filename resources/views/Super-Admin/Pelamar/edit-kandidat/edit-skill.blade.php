@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <section class="min-h-screen bg-gray-50 pt-20 px-6">
        <div class="max-w-7xl mx-auto">
            <!-- Card -->
            <div class="p-8">

                <!-- Header -->
                <div class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-800">
                        Edit Skill
                    </h2>
                    <p class="text-sm text-gray-500 mt-1">
                        Update skill dan level pengalaman kandidat
                    </p>
                    <div class="w-12 h-1 bg-orange-500 rounded-full mt-3"></div>
                </div>

                <!-- Form -->
                <form class="space-y-6" action="/update/superadmin/kandidat/skill/{{ $data->id }}" method="POST">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="pelamar_id" value="{{ $data->pelamar_id ?? '' }}">

                    <!-- Skill -->
                    <div>
                        <label for="skill" class="block text-sm font-medium text-gray-700 mb-2">
                            Skill
                        </label>
                        <input type="text" name="skill" id="skill" value="{{ $data->skill }}"
                            placeholder="Contoh: Laravel, React, UI Design"
                            class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl bg-gray-50 focus:bg-white focus:border-orange-500 focus:ring-2 focus:ring-orange-100 outline-none transition">
                    </div>

                    <!-- Experience -->
                    <div>
                        <label for="experience_level" class="block text-sm font-medium text-gray-700 mb-2">
                            Experience Level
                        </label>
                        <input type="text" name="experience_level" id="experience_level"
                            value="{{ $data->experience_level }}" placeholder="Contoh: Beginner / Intermediate / Expert"
                            class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl bg-gray-50 focus:bg-white focus:border-orange-500 focus:ring-2 focus:ring-orange-100 outline-none transition">
                    </div>

                    <!-- Button -->
                    <div class="flex justify-end gap-3 pt-4">
                        <a href="{{ $back_url }}"
                            class="px-6 py-3 border border-gray-300 text-gray-600 font-medium rounded-xl text-sm text-center hover:bg-gray-50 transition duration-200">Kembali</a>
                        <button type="submit"
                            class="px-6 py-3 bg-orange-500 hover:bg-orange-600 text-white text-sm font-medium rounded-xl transition duration-200 shadow-sm">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </section>
@endsection
