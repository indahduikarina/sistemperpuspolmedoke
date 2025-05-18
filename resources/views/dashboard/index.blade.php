@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-5">
    <h2 class="text-center mb-4 font-bold text-blue-600 text-3xl">📊DASHBOARD PERPUSTAKAAN </h2>

    {{-- Summary cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 text-center">
        <div class="bg-white shadow-md rounded-lg p-4">
            <h5 class="text-blue-600">👤 Total Anggota</h5>
            <h3 class="font-bold text-2xl">{{ $jumlahAnggota }}</h3>
        </div>
        <div class="bg-white shadow-md rounded-lg p-4">
            <h5 class="text-green-600">📚 Total Buku</h5>
            <h3 class="font-bold text-2xl">{{ $jumlahBuku }}</h3>
        </div>
    </div>

    {{-- Chart --}}
    <div class="flex justify-center mb-3">
        <div class="max-w-xs w-full">
            <canvas id="dashboardChart" width="250" height="250"></canvas>
        </div>
    </div>

    {{-- Progress Bar --}}
    <div class="text-center mb-4">
        <p class="font-semibold mb-1 text-gray-500">📈 Rasio Anggota vs Buku</p>
        @php
            $total = $jumlahAnggota + $jumlahBuku;
            $anggotaPersen = $total > 0 ? round(($jumlahAnggota / $total) * 100) : 0;
            $bukuPersen = 100 - $anggotaPersen;
        @endphp
        <div class="relative pt-1">
            <div class="flex mb-2 items-center justify-between">
                <div>
                    <span class="text-blue-600">{{ $anggotaPersen }}% Anggota</span>
                </div>
                <div>
                    <span class="text-green-600">{{ $bukuPersen }}% Buku</span>
                </div>
            </div>
            <div class="flex h-4 bg-gray-200 rounded">
                <div class="bg-blue-600 h-full" style="width: {{ $anggotaPersen }}%"></div>
                <div class="bg-green-600 h-full" style="width: {{ $bukuPersen }}%"></div>
            </div>
        </div>
    </div>

    {{-- Footer Info --}}
    <div class="text-center text-gray-500 text-sm mt-4">
        Terakhir diperbarui: {{ now()->format('d M Y, H:i') }}
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('dashboardChart').getContext('2d');

    const chart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Anggota', 'Buku'],
            datasets: [{
                data: [{{ $jumlahAnggota }}, {{ $jumlahBuku }}],
                backgroundColor: ['#007bff', '#28a745'],
                borderColor: ['#ffffff', '#ffffff'],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        font: {
                            size: 14
                        }
                    }
                }
            }
        }
    });
</script>
@endsection