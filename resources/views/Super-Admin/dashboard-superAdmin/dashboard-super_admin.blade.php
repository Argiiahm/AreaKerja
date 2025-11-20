@extends('Super-Admin.layouts.index')

@section('super_admin-content')
    <div class="px-4 mt-10 flex justify-center">
        <div class="w-full max-w-7xl">

            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
                <p class="text-gray-500 text-sm mt-1">Overview aktivitas super admin</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

                <div
                    class="bg-white shadow-md p-6 rounded-[28px] border border-emerald-100 hover:shadow-xl hover:-translate-y-1 transition">
                    <div class="flex justify-between items-center">
                        <h3 class="font-semibold text-emerald-600">Perusahaan</h3>
                        <span class="bg-emerald-100 text-emerald-600 text-xs px-2 py-1 rounded-full">
                            +{{ $Perusahaan / 5 }}%
                        </span>
                    </div>
                    <h2 class="text-4xl font-bold text-emerald-700 mt-3">{{ $Perusahaan }}</h2>
                </div>

                <div
                    class="bg-white shadow-md p-6 hover:shadow-xl hover:-translate-y-1 transition rounded-l-[40px] rounded-r-[16px] border border-blue-100 relative overflow-hidden">
                    <div class="absolute left-0 top-0 h-full w-3 bg-blue-500"></div>
                    <div class="pl-3">
                        <h3 class="font-semibold text-blue-600">Kandidat</h3>
                        <span class="bg-blue-100 text-blue-600 text-xs px-2 py-1 rounded-full">
                            +{{ $Kandidat / 5 }}%
                        </span>
                        <h2 class="text-4xl font-bold text-blue-700 mt-3">{{ $Kandidat }}</h2>
                    </div>
                </div>

                <div
                    class="bg-white shadow-md overflow-hidden rounded-[22px] hover:shadow-xl hover:-translate-y-1 transition">
                    <div class="h-16 bg-gradient-to-r from-rose-400 to-rose-600 wave-top"></div>
                    <div class="p-6">
                        <h3 class="font-semibold text-rose-600">Non Kandidat</h3>
                        <h2 class="text-4xl font-bold text-rose-700 mt-2">{{ $Pelamar }}</h2>
                    </div>
                </div>

                <div
                    class="relative bg-white border border-yellow-200 rounded-[24px] shadow-md p-6 hover:-translate-y-1 hover:shadow-xl transition overflow-hidden">
                    <div class="absolute top-0 right-0 bg-yellow-400 w-12 h-12 rotate-45 translate-x-6 -translate-y-6">
                    </div>
                    <h3 class="font-semibold text-yellow-600">Lowongan</h3>
                    <h2 class="text-4xl font-bold text-yellow-700 mt-3">{{ $Lowongan }}</h2>
                </div>

                <div
                    class="relative bg-white rounded-t-[50px] rounded-b-[26px] shadow-md p-6 hover:-translate-y-1 hover:shadow-xl transition overflow-hidden">
                    <div
                        class="absolute top-0 right-0 w-20 h-20 bg-purple-300 opacity-40 rounded-full translate-x-5 -translate-y-5">
                    </div>
                    <h3 class="font-semibold text-purple-600 relative z-10">Data Pelamar</h3>
                    <h2 class="text-4xl font-bold text-purple-700 mt-3 relative z-10">{{ $DataPelamar ?? 0 }}</h2>
                </div>

                <div
                    class="backdrop-blur-lg bg-white/60 border border-teal-200/40 rounded-[28px] shadow-lg p-6 hover:-translate-y-1 hover:shadow-2xl transition">
                    <h3 class="font-semibold text-teal-600">Finance</h3>
                    <h2 class="text-4xl font-bold text-teal-700 mt-3">{{ $Finance ?? 0 }}</h2>
                </div>

                <div
                    class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-[32px] shadow-md p-6 hover:-translate-y-1 hover:shadow-xl transition">
                    <h3 class="font-semibold text-gray-600">Akun Freeze</h3>
                    <h2 class="text-4xl font-bold text-gray-700 mt-3">{{ $Freeze ?? 0 }}</h2>
                </div>

                <div
                    class="bg-white rounded-[28px] shadow-[0_10px_30px_rgba(255,170,80,0.2)] p-6 hover:-translate-y-1 hover:shadow-[0_14px_38px_rgba(255,170,80,0.3)] transition">
                    <h3 class="font-semibold text-orange-600">Event</h3>
                    <h2 class="text-4xl font-bold text-orange-700 mt-3">{{ $Event ?? 0 }}</h2>
                </div>

            </div>


            <div class="mt-12 grid grid-cols-1 lg:grid-cols-2 gap-8">

                <div class="bg-white p-6 rounded-[28px] shadow-md border border-gray-100">
                    <h3 class="font-semibold text-gray-700 mb-4">Statistik Lowongan / Bulan</h3>
                    <canvas id="barChart" height="120"></canvas>
                </div>

                <div class="bg-white p-6 rounded-[28px] shadow-md border border-gray-100">
                    <h3 class="font-semibold text-gray-700 mb-4">Pertumbuhan Kandidat</h3>
                    <canvas id="lineChart" height="120"></canvas>
                </div>

            </div>

        </div>
    </div>

    <style>
        .wave-top {
            border-bottom-left-radius: 50% 35%;
            border-bottom-right-radius: 50% 35%;
        }
    </style>

    {{-- SCRIPT CHART.JS --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Bar Chart
        const barCtx = document.getElementById('barChart').getContext('2d');
        new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                datasets: [{
                    label: 'Lowongan',
                    data: [12, 19, 7, 14, 22, 18],
                    backgroundColor: 'rgba(255, 159, 64, 0.6)',
                    borderColor: 'rgba(255, 159, 64, 1)',
                    borderWidth: 1,
                    borderRadius: 8,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Line Chart
        const lineCtx = document.getElementById('lineChart').getContext('2d');
        new Chart(lineCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                datasets: [{
                    label: 'Kandidat Baru',
                    data: [5, 12, 9, 15, 18, 25],
                    borderWidth: 3,
                    tension: 0.4,
                    borderColor: 'rgba(99, 102, 241, 1)',
                    backgroundColor: 'rgba(99, 102, 241, 0.2)',
                    fill: true,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
