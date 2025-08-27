@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="mx-auto p-6">
        <div class="overflow-hidden">
            <div class="text-white py-3 flex items-center gap-2">
                <a href="/dashboard/superadmin/akun/add"
                    class="bg-orange-500 hover:bg-orange-700 px-3 py-1 rounded text-sm font-medium flex items-center gap-1">
                    Tambah User
                    <i class="ph ph-plus text-xs"></i>
                </a>
            </div>

            <div class="overflow-x-auto rounded-lg">
                <table class="w-full">
                    <thead class="bg-orange-500 text-white">
                        <tr>
                            <th class="px-4 py-3 text-left text-sm font-medium">ID</th>
                            <th class="px-4 py-3 text-left text-sm font-medium">User</th>
                            <th class="px-4 py-3 text-left text-sm font-medium">Email</th>
                            <th class="px-4 py-3 text-left text-sm font-medium">Username</th>
                            <th class="px-4 py-3 text-left text-sm font-medium">Region</th>
                            <th class="px-4 py-3 text-left text-sm font-medium">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="px-4 py-3 text-sm text-gray-900">1</td>
                            <td class="px-4 py-3 text-sm text-gray-900">Admin</td>
                            <td class="px-4 py-3 text-sm text-gray-900">useradmin5@gmail.com</td>
                            <td class="px-4 py-3 text-sm text-gray-900">useradmin</td>
                            <td class="px-4 py-3 text-sm text-gray-900">D.I Yogyakarta</td>
                            <td class="px-4 py-3 text-sm">
                                <div class="flex gap-1">
                                    <a href="/dashboard/superadmin/akun/edit" class="bg-orange-500 hover:bg-orange-600 text-white p-1.5 rounded text-xs">
                                        <i class="ph ph-pencil"></i>
                                    </a>
                                    <a href="/dashboard/superadmin/akun/view" class="bg-orange-500 hover:bg-orange-600 text-white p-1.5 rounded text-xs">
                                        <i class="ph ph-eye"></i>
                                    </a>
                                    <button class="bg-orange-500 hover:bg-orange-600 text-white p-1.5 rounded text-xs">
                                        <i class="ph ph-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
