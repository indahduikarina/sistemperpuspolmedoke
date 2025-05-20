@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white rounded shadow">
    <h2 class="text-2xl font-bold mb-6">Tambah Transaksi Baru</h2>

    <form action="{{ route('transaksis.store') }}" method="POST">
        @csrf

        <div class="mb-4">
                <label for="idbuku" class="block text-gray-700 mb-1">ID Transaksi</label>
                <input type="text" name="idtransaksi" id="idtransaksi" class="w-full border-gray-300 rounded p-2" required>

        <div class="mb-4">
            <label for="idanggota" class="block text-gray-700 font-semibold">Anggota</label>
            <select name="idanggota" id="idanggota" class="w-full border rounded px-3 py-2">
                <option value="">-- Pilih Anggota --</option>
                @foreach($anggotas as $anggota)
                    <option value="{{ $anggota->idanggota }}">{{ $anggota->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="idbuku" class="block text-gray-700 font-semibold">Buku</label>
            <select name="idbuku" id="idbuku" class="w-full border rounded px-3 py-2">
                <option value="">-- Pilih Buku --</option>
                @foreach($bukus as $buku)
                    <option value="{{ $buku->idbuku }}">{{ $buku->judulbuku }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="tglpinjam" class="block text-gray-700 font-semibold">Tanggal Pinjam</label>
            <input type="date" name="tglpinjam" id="tglpinjam" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label for="tglkembali" class="block text-gray-700 font-semibold">Tanggal Kembali</label>
            <input type="date" name="tglkembali" id="tglkembali" class="w-full border rounded px-3 py-2">
        </div>

        <div class="flex justify-start gap-3">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan</button>
            <a href="{{ route('transaksis.index') }}" class="bg-gray-300 hover:bg-gray-400 text-black px-4 py-2 rounded">Batal</a>
        </div>
    </form>
</div>
@endsection
