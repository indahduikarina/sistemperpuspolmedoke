@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-3xl font-bold mb-6 text-indigo-700">Tambah Transaksi Peminjaman</h2>

    <form action="{{ route('pinjam.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label for="idbuku" class="block mb-2 font-semibold text-gray-700">Pilih Buku</label>
            <select name="idbuku" id="idbuku" required
                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <option value="">-- Pilih Buku --</option>
                @foreach($bukus as $buku)
                    <option value="{{ $buku->idbuku }}">{{ $buku->judulbuku }} ({{ $buku->kategori }})</option>
                @endforeach
            </select>
            @error('idbuku') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="idanggota" class="block mb-2 font-semibold text-gray-700">Pilih Anggota</label>
            <select name="idanggota" id="idanggota" required
                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <option value="">-- Pilih Anggota --</option>
                @foreach($anggotas as $anggota)
                    <option value="{{ $anggota->idanggota }}">{{ $anggota->nama }}</option>
                @endforeach
            </select>
            @error('idanggota') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="tgl_pinjam" class="block mb-2 font-semibold text-gray-700">Tanggal Pinjam</label>
            <input type="date" name="tgl_pinjam" id="tgl_pinjam" required
                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            @error('tgl_pinjam') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="tgl_kembali" class="block mb-2 font-semibold text-gray-700">Tanggal Kembali</label>
            <input type="date" name="tgl_kembali" id="tgl_kembali" required
                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            @error('tgl_kembali') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <button type="submit"
            class="px-6 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">
            Tambah Transaksi
        </button>
    </form>
</div>
@endsection
