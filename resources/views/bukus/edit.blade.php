@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10 p-6 bg-gradient-to-r from-blue-100 via-indigo-100 to-purple-100 rounded-xl shadow-lg">
    <h2 class="text-3xl font-bold text-indigo-700 mb-6 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-2 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 20h9" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4h9m-9 8h9M3 6h.01M3 10h.01M3 14h.01M3 18h.01" />
        </svg>
        Edit Data Buku
    </h2>

    <form action="{{ route('bukus.update', $buku->idbuku) }}" method="POST" class="space-y-6 bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <div>
            <label for="judulbuku" class="block mb-2 text-indigo-700 font-semibold">📘 Judul Buku</label>
            <input type="text" name="judulbuku" id="judulbuku" value="{{ $buku->judulbuku }}" required
                class="w-full px-4 py-2 border-2 border-indigo-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition" />
        </div>

        <div>
            <label for="kategori" class="block mb-2 text-green-700 font-semibold">🏷️ Kategori</label>
            <input type="text" name="kategori" id="kategori" value="{{ $buku->kategori }}" required
                class="w-full px-4 py-2 border-2 border-green-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 transition" />
        </div>

        <div>
            <label for="pengarang" class="block mb-2 text-red-700 font-semibold">✍️ Pengarang</label>
            <input type="text" name="pengarang" id="pengarang" value="{{ $buku->pengarang }}" required
                class="w-full px-4 py-2 border-2 border-red-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 transition" />
        </div>

        <div>
            <label for="penerbit" class="block mb-2 text-yellow-700 font-semibold">🏢 Penerbit</label>
            <input type="text" name="penerbit" id="penerbit" value="{{ $buku->penerbit }}" required
                class="w-full px-4 py-2 border-2 border-yellow-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 transition" />
        </div>

        <div>
            <label for="status" class="block mb-2 text-blue-700 font-semibold">📦 Status</label>
            <select name="status" id="status" required
                class="w-full px-4 py-2 border-2 border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                <option value="Tersedia" {{ $buku->status == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="Dipinjam" {{ $buku->status == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
            </select>
        </div>

        <div class="flex justify-between items-center pt-4 border-t border-indigo-200">
            <a href="{{ route('bukus.index') }}"
               class="px-5 py-2 bg-gray-300 hover:bg-gray-400 rounded-lg font-semibold text-gray-700 transition">
               ← Kembali
            </a>
            <button type="submit"
                class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg font-semibold transition">
                💾 Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
