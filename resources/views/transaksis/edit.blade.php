@extends('layouts.app')

@section('content')
<div class="p-6 rounded max-w-xl mx-auto shadow" style="background: linear-gradient(135deg, #eef1fb, #fdfbff);">
    <h2 class="text-2xl font-bold mb-6 text-indigo-700">📘 Edit Data Transaksi</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc pl-5 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('transaksis.update', $transaksi->idtransaksi) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Anggota --}}
        <div class="mb-4">
            <label for="idanggota" class="block font-semibold text-blue-600 mb-1">👤 Anggota</label>
            <select name="idanggota" id="idanggota" class="w-full border border-blue-200 bg-white rounded px-4 py-2 focus:ring focus:ring-blue-300" required>
                <option value="">-- Pilih Anggota --</option>
                @foreach ($anggotas as $anggota)
                    <option value="{{ $anggota->idanggota }}" {{ $anggota->idanggota == $transaksi->idanggota ? 'selected' : '' }}>
                        {{ $anggota->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Buku --}}
        <div class="mb-4">
            <label for="idbuku" class="block font-semibold text-green-600 mb-1">📖 Buku</label>
            <select name="idbuku" id="idbuku" class="w-full border border-green-200 bg-white rounded px-4 py-2 focus:ring focus:ring-green-300" required>
                <option value="">-- Pilih Buku --</option>
                @foreach ($bukus as $buku)
                    <option value="{{ $buku->idbuku }}" {{ $buku->idbuku == $transaksi->idbuku ? 'selected' : '' }}>
                        {{ $buku->judulbuku }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Tanggal Pinjam --}}
        <div class="mb-4">
            <label for="tglpinjam" class="block font-semibold text-yellow-600 mb-1">📅 Tanggal Pinjam</label>
            <input type="date" name="tglpinjam" id="tglpinjam"
                value="{{ \Carbon\Carbon::parse($transaksi->tglpinjam)->format('Y-m-d') }}"
                class="w-full border border-yellow-200 rounded px-4 py-2 focus:ring focus:ring-yellow-300" required>
        </div>

        {{-- Tanggal Kembali --}}
        <div class="mb-4">
            <label for="tglkembali" class="block font-semibold text-pink-600 mb-1">📆 Tanggal Kembali</label>
            <input type="date" name="tglkembali" id="tglkembali"
                value="{{ \Carbon\Carbon::parse($transaksi->tglkembali)->format('Y-m-d') }}"
                class="w-full border border-pink-200 rounded px-4 py-2 focus:ring focus:ring-pink-300" required>
        </div>

        {{-- Tombol --}}
        <div class="flex justify-start gap-3">
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">💾 Simpan</button>
            <a href="{{ route('transaksis.index') }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 transition">↩️ Batal</a>
        </div>
    </form>
</div>
@endsection
