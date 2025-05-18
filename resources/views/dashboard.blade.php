@extends('layouts.app')

@section('content')
    <h2 class="text-center text-2xl font-bold mb-6">SELAMAT DATANG DI SISTEM INFORMASI PERPUSTAKAAN</h2>
    <p class="text-center text-red-600 font-bold text-lg">"MEMBACA ADALAH JENDELA DUNIA"</p>

    <div class="mt-10 grid grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded shadow hover:shadow-lg">
            <h2 class="text-xl font-bold text-blue-900">Jumlah Anggota</h2>
            <p class="text-2xl font-semibold text-gray-800 mt-2">120</p>
        </div>
        <div class="bg-white p-6 rounded shadow hover:shadow-lg">
            <h2 class="text-xl font-bold text-blue-900">Jumlah Buku</h2>
            <p class="text-2xl font-semibold text-gray-800 mt-2">350</p>
        </div>
        <div class="bg-white p-6 rounded shadow hover:shadow-lg">
            <h2 class="text-xl font-bold text-blue-900">Peminjaman Aktif</h2>
            <p class="text-2xl font-semibold text-gray-800 mt-2">45</p>
        </div>
    </div>

    <div class="mt-10 bg-white p-6 rounded shadow">
        <h2 class="text-xl font-bold text-blue-900 mb-4">Statistik Peminjaman Bulanan</h2>
        <canvas id="borrowChart" height="100"></canvas>
    </div>
@endsection

@section('scripts')
<script>
    const ctx = document.getElementById('borrowChart').getContext('2d');
    const borrowChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
            datasets: [{
                label: 'Jumlah Peminjaman',
                data: [12, 19, 10, 5, 8, 15],
                backgroundColor: 'rgba(59, 130, 246, 0.7)',
                borderColor: 'rgba(59, 130, 246, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
@endsection
