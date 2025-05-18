@extends('layouts.app')

@section('content')
<div class="p-6">
    <div class="bg-white rounded shadow p-6">
        <h3 class="text-xl font-semibold text-gray-800 mb-4">Tambah Buku Baru</h3>

        <form action="{{ route('bukus.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="idbuku" class="block text-gray-700 mb-1">ID Buku</label>
                <input type="text" name="idbuku" id="idbuku" class="w-full border-gray-300 rounded p-2" required>
            </div>

            <div class="mb-4">
                <label for="judulbuku" class="block text-gray-700 mb-1">Judul Buku</label>
                <input type="text" name="judulbuku" id="judulbuku" class="w-full border-gray-300 rounded p-2" required>
            </div>

            <div class="mb-4">
                <label for="kategori" class="block text-gray-700 mb-1">Kategori</label>
                <input type="text" name="kategori" id="kategori" class="w-full border-gray-300 rounded p-2" required>
            </div>

            <div class="mb-4">
                <label for="pengarang" class="block text-gray-700 mb-1">Pengarang</label>
                <input type="text" name="pengarang" id="pengarang" class="w-full border-gray-300 rounded p-2" required>
            </div>

            <div class="mb-4">
                <label for="penerbit" class="block text-gray-700 mb-1">Penerbit</label>
                <input type="text" name="penerbit" id="penerbit" class="w-full border-gray-300 rounded p-2" required>
            </div>

            <div class="mb-4">
                <label for="status" class="block text-gray-700 mb-1">Status</label>
                <select name="status" id="status" class="w-full border-gray-300 rounded p-2" required>
                    <option value="">-- Pilih --</option>
                    <option value="Tersedia">Tersedia</option>
                    <option value="Dipinjam">Dipinjam</option>
                </select>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('bukus.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded mr-2 hover:bg-gray-600">Batal</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
