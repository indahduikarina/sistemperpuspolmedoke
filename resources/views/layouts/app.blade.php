<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Perpustakaan Umum POLMED</title>
    @vite('resources/css/app.css')
     <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="flex h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-gray-200 flex flex-col">
            <div class="p-4 bg-purple-400">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-[150px] mx-auto">
            </div>
            <div class="bg-purple-300 text-white p-2 font-bold font-xl text-center">
                <h1>Hai Admin !</h1>
            </div>
            <nav class="flex-1 p-2 space-y-1 text-sm bg-purple-300">
                <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded-lg {{ request()->is('dashboard') ? 'bg-purple-200 transform transoition-all duration-300 hover:bg-purple-400 hover:scale-[103%] font-bold' : '' }}">Beranda</a>
                <div class="bg-amber-900 text-white font-bold px-4 py-2 rounded-lg bg-purple-400">Entry Data Dan Transaksi</div>
                <a href="{{ route('anggotas.index') }}" class="block px-4 py-2 bg-purple-200 transform transoition-all duration-300 hover:bg-purple-400 hover:scale-[103%] font-bold rounded-lg">Data Anggota</a>
                <a href="{{ route('bukus.index') }}" class="block px-4 py-2 bg-purple-200 transform transoition-all duration-300 hover:bg-purple-400 hover:scale-[103%] font-bold rounded-lg">Data Buku</a>
                <a href="{{ route('transaksis.index') }}" class="block px-4 py-2 bg-purple-200 transform transoition-all duration-300 hover:bg-purple-400 hover:scale-[103%] font-bold rounded-lg">Transaksi Peminjaman</a>
                <div class="bg-purple-400 rounded-lg text-white font-bold px-4 py-2 ">Laporan</div>
                <li class="list-none flex justify-center align-center"><a href="{{ route('laporan.anggota.pdf') }}" class="px-8 py-2 bg-purple-200 transform transoition-all duration-300 hover:bg-purple-400 hover:scale-[103%] font-bold rounded-lg">Laporan Anggota</a></li>
                <li class="list-none flex justify-center align-center"><a href="{{ route('laporan.buku.pdf') }}" class="px-8 py-2 bg-purple-200 transform transoition-all duration-300 hover:bg-purple-400 hover:scale-[103%] font-bold rounded-lg">Laporan Buku</a></li>
            <form method="POST" action="{{ route('logout') }}" class="mt-4">  @csrf
              <button type="submit" class="w-full px-4 py-2 bg-purple-600 text-white rounded hover:bg-red-700">Logout</button></form>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">

            <!-- Header -->
            <header class="bg-purple-500 p-4 text-center shadow">
                <h1 class="text-2xl font-bold">PERPUSTAKAAN UMUM POLMED</h1>
                <p>Jl. Almamater No. 1 Kampus USU Medan – Sumatera Utara +62 61-821 0463 info@polmed.ac.id</p>
            </header>

            <!-- Page Content -->
            <main class="p-10 bg-neutral-200 flex-1 overflow-y-auto">
                @yield('content')
            </main>
        </div>
    </div>

    @yield('scripts') {{-- Untuk script tambahan seperti Chart.js --}}
</body>
</html>
