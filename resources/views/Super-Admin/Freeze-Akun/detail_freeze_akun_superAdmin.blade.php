@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="mx-auto mt-10">
        <div class=" border-2 rounded-xl relative">
            <div class="flex items-center space-x-4 mb-6 pb-3 p-10 border-b rounded-b-2xl shadow-md">
                <img src="https://via.placeholder.com/100" alt="Profile" class="w-20 h-20 rounded-full border" />

                <div class="flex space-x-2">
                    <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-1.5 rounded-lg">
                        Unbanned
                    </button>
                    <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-1.5 rounded-lg">
                        Hapus Akun
                    </button>
                </div>
            </div>
            <div class="p-10">
                <div class="bg-gray-200 text-center rounded-md py-2 mb-3 text-sm font-medium text-gray-800">
                    Has been exploited with Am
                </div>

                <div class="flex space-x-3 mb-3">
                    <div class="flex-1 bg-gray-200 rounded-md py-2 text-center text-sm text-gray-800">
                        ramadwi@gmail.com
                    </div>
                    <div class="flex-1 bg-gray-200 rounded-md py-2 text-center text-sm text-gray-800">
                        ramadwi@gmail.com
                    </div>
                </div>

                <div class="bg-gray-200 text-center rounded-md py-2 mb-3 text-sm text-gray-800">
                    Sleman, Yogyakarta
                </div>

                <div class="bg-gray-200 rounded-md py-12 text-center text-sm text-gray-800">
                </div>
            </div>
        </div>
    </div>
@endsection
