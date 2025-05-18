@extends('layouts.app')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-2xl font-semibold text-gray-800">Data Transaksi Peminjaman</h3>
        <a href="{{ route('peminjamans.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
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
                    <th class="py-3 px-4 text-center">No</th>
                    <th class="py-3 px-4">ID Peminjaman</th>
                    <th class="py-3 px-4">Nama Anggota</th>
                    <th class="py-3 px-4">Judul Buku</th>
                    <th class="py-3 px-4">Tanggal Pinjam</th>
                    <th class="py-3 px-4">Tanggal Kembali</th>
                    <th class="py-3 px-4">Status</th>
                    <th class="py-3 px-4 text-center">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($peminjamans as $index => $peminjaman)
                <tr class="border-t">
                    <td class="py-2 px-4 text-center">{{ $index + 1 }}</td>
                    <td class="py-2 px-4">{{ $peminjaman->id }}</td>
                    <td class="py-2 px-4">{{ $peminjaman->anggota->nama }}</td>
                    <td class="py-2 px-4">{{ $peminjaman->buku->judul }}</td>
                    <td class="py-2 px-4">{{ $peminjaman->tgl_pinjam }}</td>
                    <td class="py-2 px-4">{{ $peminjaman->tgl_kembali }}</td>
                    <td class="py-2 px-4">{{ $peminjaman->status }}</td>
                    <td class="text-center">
                        <a href="{{ route('peminjamans.edit', $peminjaman->id) }}" class="text-sm text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('peminjamans.destroy', $peminjaman->id) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Yakin ingin menghapus transaksi ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-sm text-red-600 hover:underline bg-transparent border-none p-0 m-0">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center py-4 text-gray-500">Belum ada data transaksi.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
