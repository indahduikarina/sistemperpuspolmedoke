@extends('layouts.app')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-2xl font-semibold text-gray-800">Transaksi Peminjaman</h3>
        <a href="{{ route('transaksis.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Tambah Transaksi
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 px-4 py-2 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-purple-400 text-white uppercase">
                <tr>
                    <th class="py-3 px-4">No</th>
                    <th class="py-3 px-4">Nama Anggota</th>
                    <th class="py-3 px-4">Judul Buku</th>
                    <th class="py-3 px-4">Tanggal Pinjam</th>
                    <th class="py-3 px-4">Tanggal Kembali</th>
                    <th class="py-3 px-4">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transaksis as $index => $transaksi)
                <tr class="border-t hover:bg-gray-50">
                    <td class="py-2 px-4">{{ $index + 1 }}</td>
                   <td class="py-2 px-4">{{ $transaksi->anggota->nama ?? '-' }}</td>
                    <td class="py-2 px-4">{{ $transaksi->buku->judulbuku }}</td>
                    <td class="py-2 px-4">{{ $transaksi->tglpinjam }}</td>
                    <td class="py-2 px-4">{{ $transaksi->tglkembali }}</td>
                    <td class="py-2 px-4 text-center">
                        <a href="{{ route('transaksis.edit', $transaksi->idtransaksi) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('transaksis.destroy', $transaksi->idtransaksi) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Hapus transaksi ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline bg-transparent border-none">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center py-4 text-gray-500">Belum ada transaksi.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
